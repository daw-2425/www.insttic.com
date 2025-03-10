
<?php
include "../../conexion/conexion.php";

// Inicializamos variables
$mensaje = '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
$id_alumno = isset($_POST['id_alumno']) ? $_POST['id_alumno'] : '';

// Obtener roles para el select
function obtenerRoles($conexion) {
    $stmt = $conexion->prepare("SELECT id_rol, rol FROM rol");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener especialidades para el select
function obtenerEspecialidades($conexion) {
    $stmt = $conexion->prepare("SELECT id_especialidad, denominacion FROM especialidad");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener generaciones para el select
function obtenerGeneraciones($conexion) {
    $stmt = $conexion->prepare("SELECT id_generacion, nombre FROM generacion");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener empleados para el select
function obtenerEmpleados($conexion) {
    $stmt = $conexion->prepare("SELECT id_empleado, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM empleado");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para procesar y guardar la imagen
function procesarImagen($foto) {
    $directorio_destino = "fotos/";
    
    // Crear directorio si no existe
    if (!file_exists($directorio_destino)) {
        mkdir($directorio_destino, 0777, true);
    }
    
    $nombre_archivo = uniqid() . "_" . basename($foto["name"]);
    $ruta_completa = $directorio_destino . $nombre_archivo;
    
    // Validar que sea una imagen
    $es_imagen = getimagesize($foto["tmp_name"]);
    if(!$es_imagen) {
        return false;
    }
    
    // Mover el archivo al directorio
    if (move_uploaded_file($foto["tmp_name"], $ruta_completa)) {
        return $nombre_archivo;
    } else {
        return false;
    }
}

// Acciones CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Registrar nuevo alumno y matrícula
        if ($accion === 'crear') {
            // Procesamos la imagen
            $foto_nombre = "";
            if(isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
                $foto_nombre = procesarImagen($_FILES["foto"]);
                if(!$foto_nombre) {
                    throw new Exception("Error al procesar la imagen");
                }
            } else {
                throw new Exception("Debe seleccionar una foto");
            }
            
            // Iniciamos una transacción
            $conexion->beginTransaction();
            
            // Insertamos el alumno
            $sqlAlumno = "INSERT INTO alumno (foto, nombre, apellidos, fecha_nacimiento, contacto_emergencia, genero, id_rol) 
                          VALUES (:foto, :nombre, :apellidos, :fecha_nacimiento, :contacto_emergencia, :genero, :id_rol)";
            
            $stmtAlumno = $conexion->prepare($sqlAlumno);
            $stmtAlumno->bindParam(':foto', $foto_nombre);
            $stmtAlumno->bindParam(':nombre', $_POST['nombre']);
            $stmtAlumno->bindParam(':apellidos', $_POST['apellidos']);
            $stmtAlumno->bindParam(':fecha_nacimiento', $_POST['fecha_nacimiento']);
            $stmtAlumno->bindParam(':contacto_emergencia', $_POST['contacto_emergencia']);
            $stmtAlumno->bindParam(':genero', $_POST['genero']);
            $stmtAlumno->bindParam(':id_rol', $_POST['id_rol']);
            $stmtAlumno->execute();
            
            // Obtenemos el ID del alumno insertado
            $id_alumno_nuevo = $conexion->lastInsertId();
            
            // Calculamos el restante de la matrícula
            $total_matricula = $_POST['total_matricula'];
            $total_pagada = $_POST['total_pagada'];
            $matricula_restante = $total_matricula - $total_pagada;
            
            // Insertamos la matrícula
            $sqlMatricula = "INSERT INTO matricula (fecha_matricula, total_matricula, total_pagada, matricula_restante, id_empleado, id_alumno, id_especialidad, id_generacion) 
                            VALUES (:fecha_matricula, :total_matricula, :total_pagada, :matricula_restante, :id_empleado, :id_alumno, :id_especialidad, :id_generacion)";
            
            $stmtMatricula = $conexion->prepare($sqlMatricula);
            $stmtMatricula->bindParam(':fecha_matricula', $_POST['fecha_matricula']);
            $stmtMatricula->bindParam(':total_matricula', $total_matricula);
            $stmtMatricula->bindParam(':total_pagada', $total_pagada);
            $stmtMatricula->bindParam(':matricula_restante', $matricula_restante);
            $stmtMatricula->bindParam(':id_empleado', $_POST['id_empleado']);
            $stmtMatricula->bindParam(':id_alumno', $id_alumno_nuevo);
            $stmtMatricula->bindParam(':id_especialidad', $_POST['id_especialidad']);
            $stmtMatricula->bindParam(':id_generacion', $_POST['id_generacion']);
            $stmtMatricula->execute();
            
            // Confirmamos la transacción
            $conexion->commit();
            $mensaje = "Alumno y matrícula registrados correctamente";
        }
        
        // Actualizar alumno y matrícula
        else if ($accion === 'actualizar' && !empty($id_alumno)) {
            // Iniciamos una transacción
            $conexion->beginTransaction();
            
            // Procesamos la imagen si se subió una nueva
            $foto_nombre = $_POST['foto_actual'];
            if(isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
                $foto_nombre = procesarImagen($_FILES["foto"]);
                if(!$foto_nombre) {
                    throw new Exception("Error al procesar la imagen");
                }
            }
            
            // Actualizamos el alumno
            $sqlAlumno = "UPDATE alumno SET 
                          foto = :foto,
                          nombre = :nombre, 
                          apellidos = :apellidos, 
                          fecha_nacimiento = :fecha_nacimiento, 
                          contacto_emergencia = :contacto_emergencia, 
                          genero = :genero, 
                          id_rol = :id_rol 
                          WHERE id_alumno = :id_alumno";
            
            $stmtAlumno = $conexion->prepare($sqlAlumno);
            $stmtAlumno->bindParam(':foto', $foto_nombre);
            $stmtAlumno->bindParam(':nombre', $_POST['nombre']);
            $stmtAlumno->bindParam(':apellidos', $_POST['apellidos']);
            $stmtAlumno->bindParam(':fecha_nacimiento', $_POST['fecha_nacimiento']);
            $stmtAlumno->bindParam(':contacto_emergencia', $_POST['contacto_emergencia']);
            $stmtAlumno->bindParam(':genero', $_POST['genero']);
            $stmtAlumno->bindParam(':id_rol', $_POST['id_rol']);
            $stmtAlumno->bindParam(':id_alumno', $id_alumno);
            $stmtAlumno->execute();
            
            // Calculamos el restante de la matrícula
            $total_matricula = $_POST['total_matricula'];
            $total_pagada = $_POST['total_pagada'];
            $matricula_restante = $total_matricula - $total_pagada;
            
            // Verificamos si existe una matrícula para este alumno
            $stmtVerifica = $conexion->prepare("SELECT id_matricula FROM matricula WHERE id_alumno = :id_alumno");
            $stmtVerifica->bindParam(':id_alumno', $id_alumno);
            $stmtVerifica->execute();
            
            if ($stmtVerifica->rowCount() > 0) {
                // Actualizamos la matrícula existente
                $row = $stmtVerifica->fetch(PDO::FETCH_ASSOC);
                $id_matricula = $row['id_matricula'];
                
                $sqlMatricula = "UPDATE matricula SET 
                                fecha_matricula = :fecha_matricula,
                                total_matricula = :total_matricula,
                                total_pagada = :total_pagada,
                                matricula_restante = :matricula_restante,
                                id_empleado = :id_empleado,
                                id_especialidad = :id_especialidad,
                                id_generacion = :id_generacion
                                WHERE id_matricula = :id_matricula";
                
                $stmtMatricula = $conexion->prepare($sqlMatricula);
                $stmtMatricula->bindParam(':fecha_matricula', $_POST['fecha_matricula']);
                $stmtMatricula->bindParam(':total_matricula', $total_matricula);
                $stmtMatricula->bindParam(':total_pagada', $total_pagada);
                $stmtMatricula->bindParam(':matricula_restante', $matricula_restante);
                $stmtMatricula->bindParam(':id_empleado', $_POST['id_empleado']);
                $stmtMatricula->bindParam(':id_especialidad', $_POST['id_especialidad']);
                $stmtMatricula->bindParam(':id_generacion', $_POST['id_generacion']);
                $stmtMatricula->bindParam(':id_matricula', $id_matricula);
                $stmtMatricula->execute();
            } else {
                // Creamos una nueva matrícula
                $sqlMatricula = "INSERT INTO matricula (fecha_matricula, total_matricula, total_pagada, matricula_restante, id_empleado, id_alumno, id_especialidad, id_generacion) 
                                VALUES (:fecha_matricula, :total_matricula, :total_pagada, :matricula_restante, :id_empleado, :id_alumno, :id_especialidad, :id_generacion)";
                
                $stmtMatricula = $conexion->prepare($sqlMatricula);
                $stmtMatricula->bindParam(':fecha_matricula', $_POST['fecha_matricula']);
                $stmtMatricula->bindParam(':total_matricula', $total_matricula);
                $stmtMatricula->bindParam(':total_pagada', $total_pagada);
                $stmtMatricula->bindParam(':matricula_restante', $matricula_restante);
                $stmtMatricula->bindParam(':id_empleado', $_POST['id_empleado']);
                $stmtMatricula->bindParam(':id_alumno', $id_alumno);
                $stmtMatricula->bindParam(':id_especialidad', $_POST['id_especialidad']);
                $stmtMatricula->bindParam(':id_generacion', $_POST['id_generacion']);
                $stmtMatricula->execute();
            }
            
            // Confirmamos la transacción
            $conexion->commit();
            $mensaje = "Alumno y matrícula actualizados correctamente";
        }
        
        // Eliminar alumno y matrícula
        else if ($accion === 'eliminar' && !empty($id_alumno)) {
            // Iniciamos una transacción
            $conexion->beginTransaction();
            
            // Primero eliminamos las matrículas relacionadas
            $sqlMatricula = "DELETE FROM matricula WHERE id_alumno = :id_alumno";
            $stmtMatricula = $conexion->prepare($sqlMatricula);
            $stmtMatricula->bindParam(':id_alumno', $id_alumno);
            $stmtMatricula->execute();
            
            // Luego eliminamos el alumno
            $sqlAlumno = "DELETE FROM alumno WHERE id_alumno = :id_alumno";
            $stmtAlumno = $conexion->prepare($sqlAlumno);
            $stmtAlumno->bindParam(':id_alumno', $id_alumno);
            $stmtAlumno->execute();
            
            // Confirmamos la transacción
            $conexion->commit();
            $mensaje = "Alumno y matrícula eliminados correctamente";
        }
    } catch(Exception $e) {
        // Si hay un error, revertimos la transacción
        if ($conexion->inTransaction()) {
            $conexion->rollBack();
        }
        $mensaje = "Error: " . $e->getMessage();
    }
}

// Obtener datos para el formulario de edición
$alumno_data = [];
$matricula_data = [];

if (isset($_GET['editar']) && !empty($_GET['editar'])) {
    $id_editar = $_GET['editar'];
    
    // Obtenemos los datos del alumno
    $stmt_alumno = $conexion->prepare("SELECT * FROM alumno WHERE id_alumno = :id_alumno");
    $stmt_alumno->bindParam(':id_alumno', $id_editar);
    $stmt_alumno->execute();
    $alumno_data = $stmt_alumno->fetch(PDO::FETCH_ASSOC);
    
    // Obtenemos los datos de la matrícula
    $stmt_matricula = $conexion->prepare("SELECT * FROM matricula WHERE id_alumno = :id_alumno");
    $stmt_matricula->bindParam(':id_alumno', $id_editar);
    $stmt_matricula->execute();
    $matricula_data = $stmt_matricula->fetch(PDO::FETCH_ASSOC);
}

// Cargar datos para la tabla
$query_alumnos = "SELECT a.id_alumno, a.foto, a.nombre, a.apellidos, a.fecha_nacimiento, a.contacto_emergencia, 
                        a.genero, r.rol, m.fecha_matricula, m.total_matricula, m.total_pagada, m.matricula_restante,
                        e.denominacion as especialidad, g.nombre as generacion
                 FROM alumno a
                 LEFT JOIN rol r ON a.id_rol = r.id_rol
                 LEFT JOIN matricula m ON a.id_alumno = m.id_alumno
                 LEFT JOIN especialidad e ON m.id_especialidad = e.id_especialidad
                 LEFT JOIN generacion g ON m.id_generacion = g.id_generacion
                 ORDER BY a.id_alumno DESC";

$stmt_alumnos = $conexion->prepare($query_alumnos);
$stmt_alumnos->execute();
$alumnos = $stmt_alumnos->fetchAll(PDO::FETCH_ASSOC);

// Cargamos datos para los selects
$roles = obtenerRoles($conexion);
$especialidades = obtenerEspecialidades($conexion);
$generaciones = obtenerGeneraciones($conexion);
$empleados = obtenerEmpleados($conexion);





// Procesamiento para AJAX
if (isset($_GET['ajax']) && $_GET['ajax'] == 'filtrarPorEspecialidad') {
    $id_especialidad = isset($_GET['id_especialidad']) ? $_GET['id_especialidad'] : '';
    
    // Query para filtrar por especialidad
    if (!empty($id_especialidad) && $id_especialidad != 'todas') {
        $query_alumnos = "SELECT a.id_alumno, a.foto, a.nombre, a.apellidos, a.fecha_nacimiento, a.contacto_emergencia, 
                          a.genero, r.rol, m.fecha_matricula, m.total_matricula, m.total_pagada, m.matricula_restante,
                          e.denominacion as especialidad, g.nombre as generacion
                          FROM alumno a
                          LEFT JOIN rol r ON a.id_rol = r.id_rol
                          LEFT JOIN matricula m ON a.id_alumno = m.id_alumno
                          LEFT JOIN especialidad e ON m.id_especialidad = e.id_especialidad
                          LEFT JOIN generacion g ON m.id_generacion = g.id_generacion
                          WHERE m.id_especialidad = :id_especialidad
                          ORDER BY a.id_alumno DESC";
        
        $stmt_alumnos = $conexion->prepare($query_alumnos);
        $stmt_alumnos->bindParam(':id_especialidad', $id_especialidad);
    } else {
        // Mostrar todos los alumnos
        $query_alumnos = "SELECT a.id_alumno, a.foto, a.nombre, a.apellidos, a.fecha_nacimiento, a.contacto_emergencia, 
                          a.genero, r.rol, m.fecha_matricula, m.total_matricula, m.total_pagada, m.matricula_restante,
                          e.denominacion as especialidad, g.nombre as generacion
                          FROM alumno a
                          LEFT JOIN rol r ON a.id_rol = r.id_rol
                          LEFT JOIN matricula m ON a.id_alumno = m.id_alumno
                          LEFT JOIN especialidad e ON m.id_especialidad = e.id_especialidad
                          LEFT JOIN generacion g ON m.id_generacion = g.id_generacion
                          ORDER BY a.id_alumno DESC";
        
        $stmt_alumnos = $conexion->prepare($query_alumnos);
    }
    
    $stmt_alumnos->execute();
    $alumnos = $stmt_alumnos->fetchAll(PDO::FETCH_ASSOC);
    
    // Construir tabla HTML
    $html = '';
    if (!empty($alumnos)) {
        foreach ($alumnos as $alumno) {
            $html .= '<tr>';
            $html .= '<td>' . $alumno['id_alumno'] . '</td>';
            $html .= '<td><img src="fotos/' . $alumno['foto'] . '" class="foto-thumbnail rounded-circle" alt="Foto de ' . $alumno['nombre'] . '" style="width: 50px; height: 50px; object-fit: cover;"></td>';
            $html .= '<td>' . $alumno['nombre'] . '</td>';
            $html .= '<td>' . $alumno['apellidos'] . '</td>';
            $html .= '<td>' . date('d/m/Y', strtotime($alumno['fecha_nacimiento'])) . '</td>';
            $html .= '<td>' . $alumno['contacto_emergencia'] . '</td>';
            $html .= '<td>' . $alumno['genero'] . '</td>';
            $html .= '<td>' . $alumno['rol'] . '</td>';
            $html .= '<td>' . ($alumno['especialidad'] ?? 'No asignada') . '</td>';
            $html .= '<td>' . ($alumno['generacion'] ?? 'No asignada') . '</td>';
            
            // Información de matrícula
            $html .= '<td>';
            if (isset($alumno['total_matricula'])) {
                $html .= '<span data-bs-toggle="tooltip" data-bs-placement="top" title="Total: ' . $alumno['total_matricula'] . ' - Pagado: ' . $alumno['total_pagada'] . ' - Restante: ' . $alumno['matricula_restante'] . '">';
                $html .= $alumno['fecha_matricula'] ? date('d/m/Y', strtotime($alumno['fecha_matricula'])) : 'Sin matrícula';
                $html .= '</span>';
            } else {
                $html .= 'Sin matrícula';
            }
            $html .= '</td>';
            
            // Botones de acción
            $html .= '<td>';
            $html .= '<div class="btn-group" role="group">';
            $html .= '<a href="?editar=' . $alumno['id_alumno'] . '" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">';
            $html .= '<i class="fas fa-edit"></i>';
            $html .= '</a>';
            $html .= '<button class="btn btn-danger btn-sm" onclick="confirmarEliminar(' . $alumno['id_alumno'] . ')" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">';
            $html .= '<i class="fas fa-trash"></i>';
            $html .= '</button>';
            $html .= '</div>';
            $html .= '</td>';
            $html .= '</tr>';
        }
    } else {
        $html .= '<tr><td colspan="12" class="text-center">No hay registros disponibles</td></tr>';
    }
    
    // Devolvemos sólo el HTML
    echo $html;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/dashboard.css">
 
   
</head>


<body>
    
<div class="general conteiner-fluid d-flex">

    
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/secretaria/components/aside.php" ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] ."/www.insttic.com/admin/secretaria/components/asideResponsive.php" ?>

    <div class="main">
        <div class="container-fluid encabezado d-flex d-lg-none ">
                 <header class="encabezado  col-12 d-flex justify-content-between">
                    <a class="btn logo">
                        <img src="./img/logoi.png" alt="">
                    </a>
                    <a class="btn d-flex d-lg-none text-white" data-bs-toggle="offcanvas" data-bs-target="#menuBar" aria-controls="offcanvasScrolling">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </header>
        </div>

        <div class="main-header container pt-4 d-flex">
            <!-- <header class="header">
                <a class="btn logo">
                    <img src="./img/logoi.png" alt="">
                </a>
                
            </header> -->
            <div class="buscardor col-lg-9 d-none d-lg-block">
                <!-- <div class="lupa">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Buscar...">
                </div> -->
            </div>
            <div class="perfil col-2 d-none d-lg-flex">
                <div class="imagen">
                    <img src="./img/perfil/perfil.jpg" alt="">
                </div>
                <div class="nombre d-none d-lg-block">
                    <span>Admin</span>
                </div>
                <i class="fa-regular fa-bell d-none d-lg-block"></i>
            </div>
                
        </div>


       
        <div class="container">

     <div class="container mt-4">
        <h1 class="text-center mb-4">Gestión de Alumnos y Matrículas</h1>
        
       
        
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                  
                </div>
            </div>
            
            <div class="card-body">
   
</div>

        </div>
    </div>
    
   

    <div class="container mt-4 mb-4">
    <h4>Alumnos por especialidad:</h4>
    <div class="btn-group" role="group" aria-label="Filtro de especialidades">
        <button type="button" class="btn btn-primary" onclick="filtrarPorEspecialidad('todas')">
            Todas
        </button>
        <?php foreach($especialidades as $especialidad): ?>
            <button type="button" class="btn btn-outline-primary" onclick="filtrarPorEspecialidad('<?php echo $especialidad['id_especialidad']; ?>')">
                <?php echo $especialidad['denominacion']; ?>
            </button>
        <?php endforeach; ?>
    </div>
</div>

<div class="mb-4">
        <h4> Alumnos Por Generaciones:</h4>
        <div class="btn-group" role="group" aria-label="Filtro de generaciones" id="filtroGeneraciones">
            <button type="button" class="btn btn-primary" onclick="filtrarPorGeneracion('todas')">Todas</button>
            <?php foreach($generaciones as $generacion): ?>
                <button type="button" class="btn btn-outline-primary" onclick="filtrarPorGeneracion('<?php echo $generacion['id_generacion']; ?>')">
                    <?php echo $generacion['nombre']; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>




    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registros</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="accion" value="<?php echo (empty($alumno_data)) ? 'crear' : 'actualizar'; ?>">
                            <?php if(!empty($alumno_data)): ?>
                                <input type="hidden" name="id_alumno" value="<?php echo $alumno_data['id_alumno']; ?>">
                                <input type="hidden" name="foto_actual" value="<?php echo $alumno_data['foto']; ?>">
                            <?php endif; ?>
                            
                            <h4 class="mb-3">Datos del Alumno</h4>
                            
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <?php if(!empty($alumno_data)): ?>
                                    <div>
                                        <img src="fotos/<?php echo $alumno_data['foto']; ?>" class="foto-preview" id="previewImg">
                                    </div>
                                <?php else: ?>
                                    <div>
                                        <img src="placeholder.jpg" class="foto-preview" id="previewImg">
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="previewImage(this)">
                            </div>
                            
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo !empty($alumno_data) ? $alumno_data['nombre'] : ''; ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required value="<?php echo !empty($alumno_data) ? $alumno_data['apellidos'] : ''; ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required value="<?php echo !empty($alumno_data) ? $alumno_data['fecha_nacimiento'] : ''; ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="contacto_emergencia" class="form-label">Contacto de Emergencia</label>
                                <input type="text" class="form-control" id="contacto_emergencia" name="contacto_emergencia" required value="<?php echo !empty($alumno_data) ? $alumno_data['contacto_emergencia'] : ''; ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="genero" class="form-label">Género</label>
                                <select class="form-select" id="genero" name="genero" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Masculino" <?php echo (!empty($alumno_data) && $alumno_data['genero'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="Femenino" <?php echo (!empty($alumno_data) && $alumno_data['genero'] == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
                                    <option value="Otro" <?php echo (!empty($alumno_data) && $alumno_data['genero'] == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="id_rol" class="form-label">Rol</label>
                                <select class="form-select" id="id_rol" name="id_rol" required>
                                    <option value="">Seleccione...</option>
                                    <?php foreach($roles as $rol): ?>
                                        <option value="<?php echo $rol['id_rol']; ?>" <?php echo (!empty($alumno_data) && $alumno_data['id_rol'] == $rol['id_rol']) ? 'selected' : ''; ?>>
                                            <?php echo $rol['rol']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <h4 class="mb-3 mt-4">Datos de la Matrícula</h4>
                            
                            <div class="mb-3">
                                <label for="fecha_matricula" class="form-label">Fecha de Matrícula</label>
                                <input type="date" class="form-control" id="fecha_matricula" name="fecha_matricula" required value="<?php echo !empty($matricula_data) ? $matricula_data['fecha_matricula'] : date('Y-m-d'); ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="total_matricula" class="form-label">Total Matrícula</label>
                                <input type="number" class="form-control" id="total_matricula" name="total_matricula" required value="<?php echo !empty($matricula_data) ? $matricula_data['total_matricula'] : ''; ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="total_pagada" class="form-label">Total Pagado</label>
                                <input type="number" class="form-control" id="total_pagada" name="total_pagada" required value="<?php echo !empty($matricula_data) ? $matricula_data['total_pagada'] : ''; ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="id_empleado" class="form-label">Empleado</label>
                                <select class="form-select" id="id_empleado" name="id_empleado" required>
                                    <option value="">Seleccione...</option>
                                    <?php foreach($empleados as $empleado): ?>
                                        <option value="<?php echo $empleado['id_empleado']; ?>" <?php echo (!empty($matricula_data) && $matricula_data['id_empleado'] == $empleado['id_empleado']) ? 'selected' : ''; ?>>
                                            <?php echo $empleado['nombre_completo']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="id_especialidad" class="form-label">Especialidad</label>
                                <select class="form-select" id="id_especialidad" name="id_especialidad" required>
                                    <option value="">Seleccione...</option>
                                    <?php foreach($especialidades as $especialidad): ?>
                                        <option value="<?php echo $especialidad['id_especialidad']; ?>" <?php echo (!empty($matricula_data) && $matricula_data['id_especialidad'] == $especialidad['id_especialidad']) ? 'selected' : ''; ?>>
                                            <?php echo $especialidad['denominacion']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="id_generacion" class="form-label">Generación</label>
                                <select class="form-select" id="id_generacion" name="id_generacion" required>
                                    <option value="">Seleccione...</option>
                                    <?php foreach($generaciones as $generacion): ?>
                                        <option value="<?php echo $generacion['id_generacion']; ?>" <?php echo (!empty($matricula_data) && $matricula_data['id_generacion'] == $generacion['id_generacion']) ? 'selected' : ''; ?>>
                                            <?php echo $generacion['nombre']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo (empty($alumno_data)) ? 'Registrar' : 'Actualizar'; ?>
                                </button>
                                <?php if(!empty($alumno_data)): ?>
                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                <?php endif; ?>
                            </div>
                        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
</div>






    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha Nac.</th>
                    <th>Contacto</th>
                    <th>Género</th>
                    <th>Rol</th>
                    <th>Especialidad</th>
                    <th>Generación</th>
                    <th>Matrícula</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alumnos as $alumno): ?>
                    <tr>
                        <td><?php echo $alumno['id_alumno']; ?></td>
                        <td><img src="<?= $alumno['foto'] ?>" alt="Foto" style="width: 50px; height: auto;"></td>
                        <td><?php echo $alumno['nombre']; ?></td>
                        <td><?php echo $alumno['apellidos']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($alumno['fecha_nacimiento'])); ?></td>
                        <td><?php echo $alumno['contacto_emergencia']; ?></td>
                        <td><?php echo $alumno['genero']; ?></td>
                        <td><?php echo $alumno['rol']; ?></td>
                        <td><?php echo $alumno['especialidad'] ?? 'No asignada'; ?></td>
                        <td><?php echo $alumno['generacion'] ?? 'No asignada'; ?></td>
                        <td>
                            <?php if(isset($alumno['total_matricula'])): ?>
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Total: <?php echo $alumno['total_matricula']; ?> - Pagado: <?php echo $alumno['total_pagada']; ?> - Restante: <?php echo $alumno['matricula_restante']; ?>">
                                    <?php echo $alumno['fecha_matricula'] ? date('d/m/Y', strtotime($alumno['fecha_matricula'])) : 'Sin matrícula'; ?>
                                </span>
                            <?php else: ?>
                                Sin matrícula
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="?editar=<?php echo $alumno['id_alumno']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="confirmarEliminar(<?php echo $alumno['id_alumno']; ?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($alumnos)): ?>
                    <tr>
                        <td colspan="12" class="text-center">No hay registros disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


    </div>

</div>

<script src="../js/chart.umd.js"></script>
<script src="../js/chartjs-plugin-datalabels.js"></script>
<script src="../js/aside.js"></script>
<script src="../js/all.js"></script>
<script src="../js/grafico.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="../js/bootstrap.bundle.min.js"></script>


<script>
function filtrarPorEspecialidad(idEspecialidad) {
    const botones = document.querySelectorAll('.btn-group[aria-label="Filtro de especialidades"] button');
    botones.forEach(boton => {
        boton.classList.remove('btn-primary');
        boton.classList.add('btn-outline-primary');
    });
    
    // Resaltar el botón activo
    event.target.classList.remove('btn-outline-primary');
    event.target.classList.add('btn-primary');
    
    // Iniciar la petición AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `?ajax=filtrarPorEspecialidad&id_especialidad=${idEspecialidad}`, true);
    
    // Mostrar un indicador de carga
    const tbody = document.querySelector('tbody');
    tbody.innerHTML = '<tr><td colspan="12" class="text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div></td></tr>';
    
    xhr.onload = function() {
        if (this.status === 200) {
            // Actualizar el contenido de la tabla
            tbody.innerHTML = this.responseText;
            
            // Reiniciar los tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        } else {
            tbody.innerHTML = '<tr><td colspan="12" class="text-center text-danger">Error al cargar los datos</td></tr>';
        }
    };
    
    xhr.onerror = function() {
        tbody.innerHTML = '<tr><td colspan="12" class="text-center text-danger">Error de conexión</td></tr>';
    };
    
    xhr.send();
}


function confirmarEliminar(idAlumno) {
    if (confirm('¿Está seguro de que desea eliminar este registro? Esta acción no se puede deshacer.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.style.display = 'none';
        
        const accionInput = document.createElement('input');
        accionInput.type = 'hidden';
        accionInput.name = 'accion';
        accionInput.value = 'eliminar';
        
        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id_alumno';
        idInput.value = idAlumno;
        
        form.appendChild(accionInput);
        form.appendChild(idInput);
        document.body.appendChild(form);
        form.submit();
    }
}

// Función para previsualizar la imagen seleccionada
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Inicializar tooltips de Bootstrap
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

function filtrarPorGeneracion(idGeneracion) {
    const alumnos = document.querySelectorAll('tbody tr');

    // Filtrar alumnos por generación
    alumnos.forEach(alumno => {
        const especialidadAlumno = alumno.getAttribute('data-especialidad');
        const generacionAlumno = alumno.getAttribute('data-generacion');

        if ((idGeneracion === 'todas' || generacionAlumno === idGeneracion) && 
            (especialidadAlumno === document.querySelector('.btn-primary[data-especialidad]').getAttribute('data-especialidad'))) {
            alumno.style.display = 'table-row'; // Mostrar el alumno
        } else {
            alumno.style.display = 'none'; // Ocultar el alumno
        }
    });
}
</script>
</body>
</html>
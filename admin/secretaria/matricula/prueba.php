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

// Procesamiento para AJAX por generación
if (isset($_GET['ajax']) && $_GET['ajax'] == 'filtrarPorGeneracion') {
    $id_generacion = isset($_GET['id_generacion']) ? $_GET['id_generacion'] : '';
    
    // Query para filtrar por generación
    if (!empty($id_generacion) && $id_generacion != 'todas') {
        $query_alumnos = "SELECT a.id_alumno, a.foto, a.nombre, a.apellidos, a.fecha_nacimiento, a.contacto_emergencia, 
                          a.genero, r.rol, m.fecha_matricula, m.total_matricula, m.total_pagada, m.matricula_restante,
                          e.denominacion as especialidad, g.nombre as generacion
                          FROM alumno a
                          LEFT JOIN rol r ON a.id_rol = r.id_rol
                          LEFT JOIN matricula m ON a.id_alumno = m.id_alumno
                          LEFT JOIN especialidad e ON m.id_especialidad = e.id_especialidad
                          LEFT JOIN generacion g ON m.id_generacion = g.id_generacion
                          WHERE m.id_generacion = :id_generacion
                          ORDER BY a.id_alumno DESC";
        
        $stmt_alumnos = $conexion->prepare($query_alumnos);
        $stmt_alumnos->bindParam(':id_generacion', $id_generacion);
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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Alumnos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Gestión de Alumnos</h1>
    <?php if ($mensaje): ?>
        <div class="alert alert-info"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <div class="mb-4">
        <h4>Filtrar por Especialidad:</h4>
        <div class="btn-group" role="group" aria-label="Filtro de especialidades" id="filtroEspecialidades">
            <button type="button" class="btn btn-primary" onclick="filtrarPorEspecialidad('todas')">Todas</button>
            <?php foreach($especialidades as $especialidad): ?>
                <button type="button" class="btn btn-outline-primary" onclick="filtrarPorEspecialidad('<?php echo $especialidad['id_especialidad']; ?>')">
                    <?php echo $especialidad['denominacion']; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="mb-4">
        <h4>Filtrar por Generación:</h4>
        <div class="btn-group" role="group" aria-label="Filtro de generaciones" id="filtroGeneraciones">
            <button type="button" class="btn btn-primary" onclick="filtrarPorGeneracion('todas')">Todas</button>
            <?php foreach($generaciones as $generacion): ?>
                <button type="button" class="btn btn-outline-primary" onclick="filtrarPorGeneracion('<?php echo $generacion['id_generacion']; ?>')">
                    <?php echo $generacion['nombre']; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha de Nacimiento</th>
                <th>Contacto de Emergencia</th>
                <th>Género</th>
                <th>Rol</th>
                <th>Especialidad</th>
                <th>Generación</th>
                <th>Fecha de Matrícula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
                <tr>
                    <td><?php echo $alumno['id_alumno']; ?></td>
                    <td><img src="fotos/<?php echo $alumno['foto']; ?>" class="foto-thumbnail rounded-circle" alt="Foto de <?php echo $alumno['nombre']; ?>" style="width: 50px; height: 50px; object-fit: cover;"></td>
                    <td><?php echo $alumno['nombre']; ?></td>
                    <td><?php echo $alumno['apellidos']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($alumno['fecha_nacimiento'])); ?></td>
                    <td><?php echo $alumno['contacto_emergencia']; ?></td>
                    <td><?php echo $alumno['genero']; ?></td>
                    <td><?php echo $alumno['rol']; ?></td>
                    <td><?php echo ($alumno['especialidad'] ?? 'No asignada'); ?></td>
                    <td><?php echo ($alumno['generacion'] ?? 'No asignada'); ?></td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="?editar=<?php echo $alumno['id_alumno']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="confirmarEliminar(<?php echo $alumno['id_alumno']; ?>)" data-bs-toggle="tooltip" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function filtrarPorEspecialidad(idEspecialidad) {
    const botones = document.querySelectorAll('.btn-group[aria-label="Filtro de especialidades"] button');
    botones.forEach(boton => {
        boton.classList.remove('btn-primary');
        boton.classList.add('btn-outline-primary');
    });
    
    event.target.classList.remove('btn-outline-primary');
    event.target.classList.add('btn-primary');
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `?ajax=filtrarPorEspecialidad&id_especialidad=${idEspecialidad}`, true);
    
    const tbody = document.querySelector('tbody');
    tbody.innerHTML = '<tr><td colspan="12" class="text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div></td></tr>';
    
    xhr.onload = function() {
        if (this.status === 200) {
            tbody.innerHTML = this.responseText;
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

function filtrarPorGeneracion(idGeneracion) {
    const botones = document.querySelectorAll('.btn-group[aria-label="Filtro de generaciones"] button');
    botones.forEach(boton => {
        boton.classList.remove('btn-primary');
        boton.classList.add('btn-outline-primary');
    });
    
    event.target.classList.remove('btn-outline-primary');
    event.target.classList.add('btn-primary');
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `?ajax=filtrarPorGeneracion&id_generacion=${idGeneracion}`, true);
    
    const tbody = document.querySelector('tbody');
    tbody.innerHTML = '<tr><td colspan="12" class="text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div></td></tr>';
    
    xhr.onload = function() {
        if (this.status === 200) {
            tbody.innerHTML = this.responseText;
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
    if (confirm("¿Estás seguro de que deseas eliminar este alumno?")) {
        window.location.href = "?accion=eliminar&id_alumno=" + idAlumno;
    }
}
</script>
</body>
</html>

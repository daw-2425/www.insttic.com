<?php
include "../../conexion/conexion.php";

// Inicializamos variables
$mensaje = '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
$id_alumno = isset($_POST['id_alumno']) ? $_POST['id_alumno'] : '';

// Funciones para obtener datos
function obtenerRoles($conexion) {
    $stmt = $conexion->prepare("SELECT id_rol, rol FROM rol");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerEspecialidades($conexion) {
    $stmt = $conexion->prepare("SELECT id_especialidad, denominacion FROM especialidad");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerGeneraciones($conexion) {
    $stmt = $conexion->prepare("SELECT id_generacion, nombre FROM generacion");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerEmpleados($conexion) {
    $stmt = $conexion->prepare("SELECT id_empleado, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM empleado");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function procesarImagen($foto) {
    $directorio_destino = "fotos/";
    if (!file_exists($directorio_destino)) {
        mkdir($directorio_destino, 0777, true);
    }
    $nombre_archivo = uniqid() . "_" . basename($foto["name"]);
    $ruta_completa = $directorio_destino . $nombre_archivo;
    if (getimagesize($foto["tmp_name"])) {
        return move_uploaded_file($foto["tmp_name"], $ruta_completa) ? $nombre_archivo : false;
    }
    return false;
}

// Acciones CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if ($accion === 'crear') {
            $foto_nombre = "";
            if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
                $foto_nombre = procesarImagen($_FILES["foto"]);
                if (!$foto_nombre) throw new Exception("Error al procesar la imagen");
            } else {
                throw new Exception("Debe seleccionar una foto");
            }
            $conexion->beginTransaction();
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
            $id_alumno_nuevo = $conexion->lastInsertId();
            $sqlMatricula = "INSERT INTO matricula (fecha_matricula, total_matricula, total_pagada, matricula_restante, id_empleado, id_alumno, id_especialidad, id_generacion) 
                            VALUES (:fecha_matricula, :total_matricula, :total_pagada, :matricula_restante, :id_empleado, :id_alumno, :id_especialidad, :id_generacion)";
            $stmtMatricula = $conexion->prepare($sqlMatricula);
            $total_matricula = $_POST['total_matricula'];
            $total_pagada = $_POST['total_pagada'];
            $matricula_restante = $total_matricula - $total_pagada;
            $stmtMatricula->bindParam(':fecha_matricula', $_POST['fecha_matricula']);
            $stmtMatricula->bindParam(':total_matricula', $total_matricula);
            $stmtMatricula->bindParam(':total_pagada', $total_pagada);
            $stmtMatricula->bindParam(':matricula_restante', $matricula_restante);
            $stmtMatricula->bindParam(':id_empleado', $_POST['id_empleado']);
            $stmtMatricula->bindParam(':id_alumno', $id_alumno_nuevo);
            $stmtMatricula->bindParam(':id_especialidad', $_POST['id_especialidad']);
            $stmtMatricula->bindParam(':id_generacion', $_POST['id_generacion']);
            $stmtMatricula->execute();
            $conexion->commit();
            $mensaje = "Alumno y matrícula registrados correctamente";
        }
    } catch (Exception $e) {
        if ($conexion->inTransaction()) {
            $conexion->rollBack();
        }
        $mensaje = "Error: " . $e->getMessage();
    }
}

// Cargar datos para la tabla
$query_alumnos = "SELECT a.id_alumno, a.foto, a.nombre, a.apellidos, a.fecha_nacimiento, a.contacto_emergencia, 
                        a.genero, r.rol, m.fecha_matricula, m.total_matricula, m.total_pagada, m.matricula_restante,
                        e.denominacion as especialidad, g.nombre as generacion, e.id_especialidad, g.id_generacion
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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alumnos</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/all.min.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Gestión de Alumnos y Matrículas</h1>
    <div class="alert alert-info"><?php echo $mensaje; ?></div>

    <div class="mb-4">
        <h4>Alumnos por especialidad:</h4>
        <div class="btn-group" role="group" aria-label="Filtro de especialidades">
            <button type="button" class="btn btn-primary" onclick="filtrarPorEspecialidad('todas')">Todas</button>
            <?php foreach($especialidades as $especialidad): ?>
                <button type="button" class="btn btn-outline-primary" onclick="filtrarPorEspecialidad('<?php echo $especialidad['id_especialidad']; ?>')">
                    <?php echo $especialidad['denominacion']; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="mb-4">
        <h4>Generaciones:</h4>
        <div class="btn-group" role="group" aria-label="Filtro de generaciones" id="filtroGeneraciones">
            <button type="button" class="btn btn-primary" onclick="filtrarPorGeneracion('todas')">Todas</button>
            <?php foreach($generaciones as $generacion): ?>
                <button type="button" class="btn btn-outline-primary" onclick="filtrarPorGeneracion('<?php echo $generacion['id_generacion']; ?>')">
                    <?php echo $generacion['nombre']; ?>
                </button>
            <?php endforeach; ?>
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
                    <tr data-especialidad="<?php echo $alumno['id_especialidad'] ?? 'No asignada'; ?>" 
                        data-generacion="<?php echo $alumno['id_generacion'] ?? 'No asignada'; ?>">
                        <td><?php echo $alumno['id_alumno']; ?></td>
                        <td><img src="fotos/<?php echo $alumno['foto']; ?>" alt="Foto" style="width: 50px; height: auto;"></td>
                        <td><?php echo $alumno['nombre']; ?></td>
                        <td><?php echo $alumno['apellidos']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($alumno['fecha_nacimiento'])); ?></td>
                        <td><?php echo $alumno['contacto_emergencia']; ?></td>
                        <td><?php echo $alumno['genero']; ?></td>
                        <td><?php echo $alumno['rol']; ?></td>
                        <td><?php echo $alumno['especialidad'] ?? 'No asignada'; ?></td>
                        <td><?php echo $alumno['generacion'] ?? 'No asignada'; ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="?editar=<?php echo $alumno['id_alumno']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="confirmarEliminar(<?php echo $alumno['id_alumno']; ?>)">
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

<script src="../js/bootstrap.bundle.min.js"></script>
<script>
function filtrarPorEspecialidad(idEspecialidad) {
    const alumnos = document.querySelectorAll('tbody tr');

    // Filtrar alumnos por especialidad
    alumnos.forEach(alumno => {
        const especialidadAlumno = alumno.getAttribute('data-especialidad');
        if (idEspecialidad === 'todas' || especialidadAlumno === idEspecialidad) {
            alumno.style.display = 'table-row'; // Mostrar el alumno
        } else {
            alumno.style.display = 'none'; // Ocultar el alumno
        }
    });

    // Resetear el filtro de generaciones
    filtrarPorGeneracion('todas');
}

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

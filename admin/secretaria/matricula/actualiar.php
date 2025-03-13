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

function procesarImagen($foto) {
    $directorio_destino = "fotos/";
    if (!file_exists($directorio_destino)) {
        mkdir($directorio_destino, 0777, true);
    }
    $nombre_archivo = uniqid() . "_" . basename($foto["name"]);
    $ruta_completa = $directorio_destino . $nombre_archivo;
    $es_imagen = getimagesize($foto["tmp_name"]);
    if (!$es_imagen) {
        return false;
    }
    if (move_uploaded_file($foto["tmp_name"], $ruta_completa)) {
        return $nombre_archivo;
    } else {
        return false;
    }
}

// Manejar la acción de crear o actualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if ($accion === 'crear' || $accion === 'actualizar') {
            $foto_nombre = $_POST['foto_actual'] ?? '';
            if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
                $foto_nombre = procesarImagen($_FILES["foto"]);
                if (!$foto_nombre) {
                    throw new Exception("Error al procesar la imagen");
                }
            }

            if ($accion === 'actualizar') {
                // Actualizar alumno
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
                $mensaje = "Alumno actualizado correctamente.";
            } else {
                // Crear nuevo alumno
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
                $mensaje = "Alumno registrado correctamente.";
            }
        } elseif ($accion === 'eliminar' && !empty($id_alumno)) {
            // Eliminar alumno
            $sqlAlumno = "DELETE FROM alumno WHERE id_alumno = :id_alumno";
            $stmtAlumno = $conexion->prepare($sqlAlumno);
            $stmtAlumno->bindParam(':id_alumno', $id_alumno);
            $stmtAlumno->execute();
            $mensaje = "Alumno eliminado correctamente.";
        }
    } catch (Exception $e) {
        $mensaje = "Error: " . $e->getMessage();
    }
}

// Obtener datos para el formulario de edición
$alumno_data = [];
if (isset($_GET['editar']) && !empty($_GET['editar'])) {
    $id_alumno = $_GET['editar'];
    $stmt_alumno = $conexion->prepare("SELECT * FROM alumno WHERE id_alumno = :id_alumno");
    $stmt_alumno->bindParam(':id_alumno', $id_alumno);
    $stmt_alumno->execute();
    $alumno_data = $stmt_alumno->fetch(PDO::FETCH_ASSOC);
}

// Cargar datos para la tabla
$query_alumnos = "SELECT * FROM alumno ORDER BY id_alumno DESC";
$stmt_alumnos = $conexion->prepare($query_alumnos);
$stmt_alumnos->execute();
$alumnos = $stmt_alumnos->fetchAll(PDO::FETCH_ASSOC);

// Cargar datos para los selects
$roles = obtenerRoles($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alumnos</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Gestión de Alumnos y Matrículas</h1>
        <div class="alert alert-info"><?php echo $mensaje; ?></div>
        
        <!-- Formulario para crear o actualizar alumno -->
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="accion" value="<?php echo empty($alumno_data) ? 'crear' : 'actualizar'; ?>">
            <input type="hidden" name="id_alumno" value="<?php echo $alumno_data['id_alumno'] ?? ''; ?>">
            <input type="hidden" name="foto_actual" value="<?php echo $alumno_data['foto'] ?? ''; ?>">

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $alumno_data['nombre'] ?? ''; ?>">
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required value="<?php echo $alumno_data['apellidos'] ?? ''; ?>">
            </div>

            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required value="<?php echo $alumno_data['fecha_nacimiento'] ?? ''; ?>">
            </div>

            <div class="mb-3">
                <label for="contacto_emergencia" class="form-label">Contacto de Emergencia</label>
                <input type="text" class="form-control" id="contacto_emergencia" name="contacto_emergencia" required value="<?php echo $alumno_data['contacto_emergencia'] ?? ''; ?>">
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

            <button type="submit" class="btn btn-primary">
                <?php echo empty($alumno_data) ? 'Registrar' : 'Actualizar'; ?>
            </button>
        </form>

        <!-- Tabla de alumnos -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumnos as $alumno): ?>
                        <tr>
                            <td><?php echo $alumno['id_alumno']; ?></td>
                            <td><?php echo $alumno['nombre']; ?></td>
                            <td><?php echo $alumno['apellidos']; ?></td>
                            <td>
                                <a href="?editar=<?php echo $alumno['id_alumno']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="confirmarEliminar(<?php echo $alumno['id_alumno']; ?>)">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
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
    </script>
</body>
</html>

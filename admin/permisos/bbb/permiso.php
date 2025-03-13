<?php
// permiso.php
include 'db.php';

// Manejo de la inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo']) && $_POST['tipo'] === 'permiso') {
    $motivo = $_POST['motivo'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $fecha_salida = $_POST['fecha_salida'];
    $id_alumno = $_POST['id_alumno'];
    $estado = $_POST['estado'];
    $archivo_adjuntado = $_POST['archivo_adjuntado'];

    $stmt = $pdo->prepare("INSERT INTO permiso (motivo, fecha_entrada, fecha_salida, id_alumno, estado, archivo_adjuntado) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$motivo, $fecha_entrada, $fecha_salida, $id_alumno, $estado, $archivo_adjuntado]);
}

// Manejo de la actualización del estado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $id_permiso = $_POST['id_permiso'];
    $nuevo_estado = $_POST['nuevo_estado'];

    $stmt = $pdo->prepare("UPDATE permiso SET estado = ? WHERE id_permiso = ?");
    $stmt->execute([$nuevo_estado, $id_permiso]);
}

// Obtener todos los permisos con información del alumno y especialidad
$stmt = $pdo->query("
    SELECT p.*, a.nombre, a.apellidos, a.foto, e.denominacion AS especialidad
    FROM permiso p
    JOIN alumno a ON p.id_alumno = a.id_alumno
    JOIN especialidad e ON a.id_especialidad = e.id_especialidad
");
$permisos = $stmt->fetchAll();

// Obtener todos los alumnos para el select
$alumnos = $pdo->query("SELECT * FROM alumno")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Permisos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .badge-warning {
            background-color: #ffc107; /* Color de la insignia "Debe Regresar" */
        }
        .badge-success {
            background-color: #28a745; /* Color de la insignia "Regresado" */
        }
        .badge-danger {
            background-color: #dc3545; /* Color de la insignia "Denegado" */
        }
        .badge-info {
            background-color: #17a2b8; /* Color de la insignia "Aprobado" */
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Registro de Permisos</h2>
    <form id="permisoForm">
        <input type="hidden" name="tipo" value="permiso">
        <div class="form-group">
            <label for="motivo">Motivo:</label>
            <textarea class="form-control" id="motivo" name="motivo" required></textarea>
        </div>
        <div class="form-group">
            <label for="fecha_entrada">Fecha de Entrada:</label>
            <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" required>
        </div>
        <div class="form-group">
            <label for="fecha_salida">Fecha de Salida:</label>
            <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" required>
        </div>
        <div class="form-group">
            <label for="id_alumno">Alumno:</label>
            <select class="form-control" id="id_alumno" name="id_alumno" required>
                <?php foreach ($alumnos as $alumno): ?>
                    <option value="<?= $alumno['id_alumno'] ?>"><?= $alumno['nombre'] . ' ' . $alumno['apellidos'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="aprobado">Aprobado</option>
                <option value="denegado">Denegado</option>
                <option value="pendiente">Pendiente</option>
            </select>
        </div>
        <div class="form-group">
            <label for="archivo_adjuntado">Archivo Adjunto:</label>
            <input type="text" class="form-control" id="archivo_adjuntado" name="archivo_adjuntado">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    <h2>Lista de Permisos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Motivo</th>
                <th>Fecha de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Alumno</th>
                <th>Especialidad</th>
                <th>Foto</th>
                <th>Estado</th>
                <th>Acciones</th> <!-- Nueva columna para acciones -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permisos as $permiso): ?>
                <tr>
                    <td><?= $permiso['id_permiso'] ?></td>
                    <td><?= $permiso['motivo'] ?></td>
                    <td><?= $permiso['fecha_entrada'] ?></td>
                    <td><?= $permiso['fecha_salida'] ?></td>
                    <td>
                        <?= $permiso['nombre'] . ' ' . $permiso['apellidos'] ?>
                        <?php
                        // Comprobar si la fecha de salida ha pasado y el estado no es "regresado"
                        if (strtotime($permiso['fecha_salida']) < time() && $permiso['estado'] !== 'regresado'): ?>
                            <span class="badge badge-warning">Debe Regresar</span> <!-- Insignia -->
                        <?php endif; ?>
                    </td>
                    <td><?= $permiso['especialidad'] ?></td>
                    <td><img src="<?= $permiso['foto'] ?>" alt="Foto" style="width: 50px; height: auto;"></td>
                    <td>
                        <?php
                        // Mostrar el estado con colores
                        if ($permiso['estado'] === 'denegado'): ?>
                            <span class="badge badge-danger">Denegado</span>
                        <?php elseif ($permiso['estado'] === 'aprobado'): ?>
                            <span class="badge badge-success">Aprobado</span>
                        <?php elseif ($permiso['estado'] === 'regresado'): ?>
                            <span class="badge badge-success">Regresado</span>
                        <?php else: ?>
                            <?php
                        // Comprobar si la fecha de salida ha pasado y el estado no es "regresado"
                        if (strtotime($permiso['fecha_salida']) < time() && $permiso['estado'] !== 'regresado'): ?>
                            <span class="badge badge-warning">Debe Regresar</span> <!-- Insignia -->
                        <?php endif; ?>
                            <span class="badge badge-info"><?= ucfirst($permiso['estado']) ?></span> <!-- Para otros estados -->
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($permiso['estado'] !== 'denegado' && $permiso['estado'] !== 'pendiente'): ?>
                            <button class="btn btn-success" onclick="actualizarEstado(<?= $permiso['id_permiso'] ?>, 'regresado')">Regresado</button>
                            <button class="btn btn-warning" onclick="actualizarEstado(<?= $permiso['id_permiso'] ?>, 'fuera')">Sigue Fuera</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.getElementById('permisoForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'permiso.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                location.reload(); // Recargar la página para ver el nuevo registro
            }
        };
        xhr.send(formData);
    });

    function actualizarEstado(id_permiso, nuevo_estado) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'permiso.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                location.reload(); // Recargar la página para ver el nuevo estado
            }
        };
        xhr.send('action=update&id_permiso=' + id_permiso + '&nuevo_estado=' + nuevo_estado);
    }
</script>
</body>
</html>
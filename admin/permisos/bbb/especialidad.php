<?php
// especialidad.php
include 'db.php';

// Manejo de la inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo']) && $_POST['tipo'] === 'especialidad') {
    $denominacion = $_POST['denominacion'];
    $descripcion = $_POST['descripcion'];
    $id_sala = $_POST['id_sala'];

    $stmt = $pdo->prepare("INSERT INTO especialidad (denominacion, descripcion, id_sala) VALUES (?, ?, ?)");
    $stmt->execute([$denominacion, $descripcion, $id_sala]);
}

// Obtener todas las especialidades
$stmt = $pdo->query("SELECT * FROM especialidad");
$especialidades = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Especialidades</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Registro de Especialidades</h2>
    <form id="especialidadForm">
        <input type="hidden" name="tipo" value="especialidad">
        <div class="form-group">
            <label for="denominacion">Denominación:</label>
            <input type="text" class="form-control" id="denominacion" name="denominacion" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="id_sala">Sala:</label>
            <select class="form-control" id="id_sala" name="id_sala" required>
                <?php
                $salas = $pdo->query("SELECT * FROM sala")->fetchAll();
                foreach ($salas as $sala) {
                    echo "<option value='{$sala['id_sala']}'>{$sala['numero']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    <h2>Lista de Especialidades</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Denominación</th>
                <th>Descripción</th>
                <th>ID Sala</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($especialidades as $especialidad): ?>
                <tr>
                    <td><?= $especialidad['id_especialidad'] ?></td>
                    <td><?= $especialidad['denominacion'] ?></td>
                    <td><?= $especialidad['descripcion'] ?></td>
                    <td><?= $especialidad['id_sala'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.getElementById('especialidadForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'especialidad.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                location.reload(); // Recargar la página para ver el nuevo registro
            }
        };
        xhr.send(formData);
    });
</script>
</body>
</html>
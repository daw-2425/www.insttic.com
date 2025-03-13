<?php
// sala.php
include 'db.php';

// Manejo de la inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo']) && $_POST['tipo'] === 'sala') {
    $numero = $_POST['numero'];
    $capacidad = $_POST['capacidad'];
    $planta = $_POST['planta'];

    $stmt = $pdo->prepare("INSERT INTO sala (numero, capacidad, planta) VALUES (?, ?, ?)");
    $stmt->execute([$numero, $capacidad, $planta]);
}

// Obtener todas las salas
$stmt = $pdo->query("SELECT * FROM sala");
$salas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Salas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Registro de Salas</h2>
    <form id="salaForm">
        <input type="hidden" name="tipo" value="sala">
        <div class="form-group">
            <label for="numero">Número:</label>
            <input type="number" class="form-control" id="numero" name="numero" required>
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad:</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" required>
        </div>
        <div class="form-group">
            <label for="planta">Planta:</label>
            <input type="text" class="form-control" id="planta" name="planta" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    <h2>Lista de Salas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Capacidad</th>
                <th>Planta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salas as $sala): ?>
                <tr>
                    <td><?= $sala['id_sala'] ?></td>
                    <td><?= $sala['numero'] ?></td>
                    <td><?= $sala['capacidad'] ?></td>
                    <td><?= $sala['planta'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.getElementById('salaForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'sala.php', true);
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
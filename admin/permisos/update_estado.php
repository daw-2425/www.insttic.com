<?php
$host = 'localhost';  // Cambia esto por el nombre de tu servidor de base de datos
$dbname = 'insttic';
$username = 'root';  // Cambia esto por tu usuario de base de datos
$password = '';  // Cambia esto por tu contraseña de base de datos


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recibir datos del POST
    $id_permiso = $_POST['id_permiso'];
    $nuevo_estado = $_POST['nuevo_estado'];

    // Consulta SQL para actualizar el estado
    $sql = "UPDATE permiso SET estado = :nuevo_estado WHERE id_permiso = :id_permiso";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nuevo_estado' => $nuevo_estado, 'id_permiso' => $id_permiso]);

    echo "Estado actualizado correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

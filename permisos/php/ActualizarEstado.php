<?php

include ('../../conexion/conexion.php');

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recibir datos del POST
    $id_permiso = $_POST['id_permiso'];
    $nuevo_estado = $_POST['nuevo_estado'];

    // Consulta SQL para actualizar el estado
    $sql = "UPDATE permiso SET estado = :nuevo_estado WHERE id_permiso = :id_permiso";
    $stmt = $conexion->prepare($sql);
    $stmt->execute(['nuevo_estado' => $nuevo_estado, 'id_permiso' => $id_permiso]);


?>

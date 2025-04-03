<?php
require_once 'db_connection.php';

try {
    $id_sala = $_POST['id_sala'];
    $denominacion = $_POST['denominacion'];
    
    $sql = "INSERT INTO especialidad (id_sala, denominacion) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id_sala, $denominacion);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        throw new Exception("Error executing query: " . $stmt->error);
    }
} catch (Exception $e) {
    error_log("Error in add_especialidad.php: " . $e->getMessage());
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?> 
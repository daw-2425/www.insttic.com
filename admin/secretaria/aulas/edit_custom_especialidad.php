<?php
require_once 'db_connection.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

try {
    $stmt = $conn->prepare("UPDATE custom_especialidades SET nombre = ? WHERE id = ?");
    $stmt->bind_param("si", $data['nombre'], $data['id']);
    $success = $stmt->execute();
    
    echo json_encode(['success' => $success]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
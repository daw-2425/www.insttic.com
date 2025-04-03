<?php
require_once 'db_connection.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

$sql = "DELETE FROM sala WHERE id_sala = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
?>
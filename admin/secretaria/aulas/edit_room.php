<?php
require_once 'db_connection.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$numero = $data['numero_sala'];
$planta = $data['piso'];
$capacidad = $data['capacidad'];

$sql = "UPDATE sala SET numero = ?, planta = ?, capacidad = ? WHERE id_sala = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isii", $numero, $planta, $capacidad, $id);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
?>
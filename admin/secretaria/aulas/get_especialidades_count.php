<?php
require_once 'db_connection.php';
header('Content-Type: application/json');

$sql = "SELECT COUNT(*) as total FROM custom_especialidades";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo json_encode(['total' => $row['total']]);
?>
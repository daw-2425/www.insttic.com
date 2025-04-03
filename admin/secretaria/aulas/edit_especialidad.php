<?php
require_once 'db_connection.php';

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (editEspecialidad($data['id'], $data['sala_id'], $data['denominacion'])) {
        $response['success'] = true;
    }
}

echo json_encode($response);
?>
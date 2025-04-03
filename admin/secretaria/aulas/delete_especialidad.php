<?php
require_once 'db_connection.php';

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (deleteEspecialidad($data['id'])) {
        $response['success'] = true;
    }
}

echo json_encode($response);
?>
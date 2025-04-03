<?php
ob_clean();
header('Content-Type: application/json');
error_reporting(0);

require_once 'db_connection.php';

$response = ['success' => false];

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero = $_POST['numero_sala'];
        $capacidad = $_POST['capacidad'];
        $planta = $_POST['piso'];
        
        if (addRoom($numero, $capacidad, $planta)) {
            $response['success'] = true;
        } else {
            throw new Exception("Failed to add room");
        }
    }
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
exit;
?>
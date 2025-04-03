<?php
require_once 'db_connection.php';
header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sala_id = $_POST['id_sala'];
        $denominacion = $_POST['denominacion'];
        
        if(empty($sala_id) || empty($denominacion)) {
            throw new Exception('Missing required fields');
        }
        
        $sql = "INSERT INTO especialidad (id_sala, denominacion) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $sala_id, $denominacion);
        $success = $stmt->execute();
        
        echo json_encode([
            'success' => $success,
            'message' => $success ? 'Especialidad agregada exitosamente' : 'Error al agregar especialidad'
        ]);
        exit;
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
    exit;
}
?>
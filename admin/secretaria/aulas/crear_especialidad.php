<?php
require_once 'db_connection.php';
header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        
        if(empty($nombre)) {
            throw new Exception('El nombre es requerido');
        }
        
        $sql = "INSERT INTO custom_especialidades (nombre) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombre);
        $success = $stmt->execute();
        
        echo json_encode([
            'success' => $success,
            'message' => $success ? 'Especialidad creada exitosamente' : 'Error al crear especialidad'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>
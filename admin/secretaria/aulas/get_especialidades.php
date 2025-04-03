<?php
require_once 'db_connection.php';
header('Content-Type: application/json');

try {
    $sql = "SELECT 
        e.id_especialidad,
        e.denominacion,
        e.descripcion,
        CONCAT('Número ', s.numero, ' - Piso ', s.planta) as sala_info,
        s.id_sala,
        s.numero,
        s.planta
    FROM especialidad e
    JOIN sala s ON e.id_sala = s.id_sala
    ORDER BY s.numero, e.denominacion";
    
    $result = $conn->query($sql);
    
    $especialidades = [];
    while ($row = $result->fetch_assoc()) {
        $especialidades[] = $row;
    }
    
    echo json_encode($especialidades);
} catch (Exception $e) {
    error_log("Error in get_especialidades.php: " . $e->getMessage());
    echo json_encode(['error' => $e->getMessage()]);
}
?>
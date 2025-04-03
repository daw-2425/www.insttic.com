<?php
include "../../conexion/conexion.php";

// Establecer cabecera JSON
header('Content-Type: application/json');

try {
    $consulta = $conexion->prepare("
        SELECT a.*, al.nombre, al.apellidos 
        FROM amonestacion a 
        INNER JOIN alumno al ON a.id_alumno = al.id_alumno 
        ORDER BY a.fecha DESC
    ");
    
    $consulta->execute();
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    // No es necesario el while ya que fetchAll() ya obtiene todos los registros
    // Enviar respuesta estructurada
    echo json_encode([
        'status' => 'success',
        'data' => $datos
    ]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Error: ' . $e->getMessage()
    ]);
}
?>


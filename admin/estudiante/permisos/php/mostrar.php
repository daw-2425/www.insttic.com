<?php
include '../conexion/conexion.php';
session_start();

$id = $_SESSION["id_alumno"];

$stmt = $con->prepare("SELECT e.nombre, p.fecha_entrada, p.fecha_salida, p.motivo, p.estado, p.archivo_adjuntado 
                       FROM permiso p
                       INNER JOIN alumno e ON p.id_alumno = e.id_alumno 
                       WHERE e.id_alumno = :id");

$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// Obtener todos los resultados
$json = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($json);
?>

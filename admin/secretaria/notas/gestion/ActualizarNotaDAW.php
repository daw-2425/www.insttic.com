<?php
require_once('conexion.php');

$id_alumno = $_POST['id_alumno'];
$materias = $_POST['Materiadaw'];
$notas = $_POST['notaDaw'];


try {
    $conexion = $conectar->getConexion(); // Guardar la conexión en una variable
    $stmt = $conexion->prepare("UPDATE nota SET nota=:nota WHERE id_materia = :id_materia");

    $stmt->bindParam(':id_alumno', $id_alumno);
    $stmt->bindParam(':id_materia', $materias);
    $stmt->bindParam(':nota', $notas);
    $stmt->execute();

    echo json_encode($stmt);
 
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
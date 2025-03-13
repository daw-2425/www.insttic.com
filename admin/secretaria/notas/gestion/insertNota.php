<?php
require_once('conexion.php');

$id_alumno = $_POST['id_alumno'];
$materias = $_POST['Materiadaw'];
$notas = $_POST['notaDaw'];

try {
    $conexion = $conectar->getConexion(); 

    
    $stmt = $conexion->prepare("SELECT COUNT(*) FROM nota WHERE id_alumno = :id_alumno AND id_materia = :id_materia");
    $stmt->bindParam(':id_alumno', $id_alumno);
    $stmt->bindParam(':id_materia', $materias);
    $stmt->execute();
    
    $count = $stmt->fetchColumn(); 

    if ($count > 0) {
        
        // echo json_encode(['success' => false, 'message' => 'Ya existe una nota para esta materia.']);
        echo 1;

    } else {
        
        $stmt = $conexion->prepare("INSERT INTO nota (id_alumno, id_materia, nota) VALUES (:id_alumno, :id_materia, :nota)");
        $stmt->bindParam(':id_alumno', $id_alumno);
        $stmt->bindParam(':id_materia', $materias);
        $stmt->bindParam(':nota', $notas);
        $stmt->execute();

        // echo json_encode(['success' => true, 'message' => 'Nota insertada correctamente.']);
    }
 
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
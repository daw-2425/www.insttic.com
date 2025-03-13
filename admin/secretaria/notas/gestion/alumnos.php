<?php

require_once('conexion.php');

    

try {

    $conectar->getConexion();
    
    $queryEstudiante = "SELECT * FROM alumno";
    $stmt = $conectar->getConexion()->prepare($queryEstudiante);
    $stmt->execute();

    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($alumnos);

} catch ( PDOException $e ) {
    
    echo json_encode(array('Se ha producido un Error' => $e->getMessage()));
    
}
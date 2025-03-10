<?php


require_once("conexion.php");

try {

    $id_Alumno = $_GET['id_alumno'];

    $conectar->getConexion();

    $Alumno_notas = "SELECT n.nota, a.nombre , m.nombre FROM nota n
    INNER JOIN alumno a ON n.id_alumno = a.id_alumno
    INNER JOIN materia m ON m.id_materia = n.id_materia
    WHERE a.id_alumno = '$id_Alumno'";

    $stmt = $conectar->getConexion()->prepare($Alumno_notas);
    $stmt->execute();

    $alumnos_notas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($alumnos_notas);

} catch (PDOException $e) {

    echo json_encode(array('Se ha producido un Error' => $e->getMessage()));
}

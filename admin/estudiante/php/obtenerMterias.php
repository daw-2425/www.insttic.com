<?php 
require("../../conexion/conexion.php");


$especialidad = $_POST['especialidad'];

$query = "SELECT m.nombre as materia, em.nombre, em.apellido FROM materia m 
 INNER JOIN profesor p ON p.id_profesor = m.id_profesor
 INNER JOIN empleado em ON  em.id_empleado = p.id_empleado
 INNER JOIN especialidad es on m.id_especialidad = es.id_especialidad
 WHERE es.denominacion = '$especialidad'";

    $stmt = $conexion->prepare($query);
   $stmt->execute();
   $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode($materias);

?>
<?php  

require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/Admin/conexion/conexion.php";

$sql = "SELECT a.foto,a.nombre AS Alumno ,a.id_alumno,a.apellidos,a.contacto_emergencia,es.denominacion, g.nombre,g.año_inicio,g.año_fin,a.DIP, a.edad FROM matricula ma inner join alumno a on ma.id_alumno = a.id_alumno INNER join generacion g on ma.id_generacion = g.id_generacion INNER join especialidad es on ma.id_especialidad = es.id_especialidad where es.denominacion = 'TSDAW'";
$resultado = $conexion->prepare($sql);
$resultado->execute();


echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));


?>
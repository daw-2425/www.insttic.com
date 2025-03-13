<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/Admin/conexion/conexion.php";

$id = $_COOKIE['valor'];
// setcookie("idioma",$_GET['pagina_a'], time()+3600);


// echo $_COOKIE["idioma"];

$sql = "SELECT ma.nombre as materia, AVG(nota) as media, a.nombre, a.apellidos FROM nota n inner join alumno a on n.id_alumno = a.id_alumno INNER join materia ma on n.id_materia = ma.id_materia
 where a.id_alumno = '$id' GROUP by a.nombre, ma.nombre";
$resultado = $conexion->prepare($sql);
$resultado->execute();


echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));

?>
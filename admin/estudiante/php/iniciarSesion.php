<?php
require("../../conexion/conexion.php");

$nombre = $_POST['nombre'];

$passwd = $_POST['password'];

$stmt = $conexion->prepare('SELECT * FROM usuario WHERE nombre = :email AND passwd = :passwd');

$stmt->bindParam(':email', $nombre);

$stmt->bindParam(':passwd', $passwd);

$stmt->execute();
$dato = $stmt->fetch(PDO::FETCH_ASSOC);

if ($dato['id_empleado'] == '') {
    $query = "SELECT e.denominacion AS especialidad, a.nombre FROM matricula m
   INNER JOIN especialidad e ON m.id_especialidad = e.id_especialidad
   INNER JOIN alumno a ON a.id_alumno = m.id_alumno
   WHERE a.id_alumno = 1;
   ;";
   $stmt = $conexion->prepare($query);
   $stmt->execute();
   $especialidad = $stmt->fetch(PDO::FETCH_ASSOC);
    $especia = $especialidad["especialidad"];
   $query2 ="  SELECT COUNT(*) AS total_materias FROM materia m
   INNER JOIN especialidad e ON m.id_especialidad = e.id_especialidad
   WHERE e.denominacion='$especia'
   ;";

   $stmt2 = $conexion->prepare($query2);
   $stmt2->execute();
   $total_materias = $stmt2->fetch(PDO::FETCH_ASSOC);
    
    session_start();
    $_SESSION['id_alumno'] = $dato['id_alumno'];
    $_SESSION['nombre'] = $especialidad['nombre'];
    $_SESSION['especialidad'] = $especialidad['especialidad'];
    $_SESSION['total_materias'] = $total_materias['total_materias'];

    echo 1;
}

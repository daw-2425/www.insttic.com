<?php
include '../conexion/conexion.php';
session_start();

$id = $_SESSION["id"];
// $motivo = $_POST['motivo'];
// echo [".substr($motivo,0,9)."];

$stmt = $con->prepare("SELECT e.nombre, p.entrada, p.salida, p.motivo, p.estado,p.arch_adjuntado FROM permiso p
INNER JOIN estudiante e ON p.alumno = e.idAlumno WHERE idAlumno ='$id'");

$stmt->setFetchMode(PDO::FETCH_ASSOC);

$stmt->execute();

while($row = $stmt->fetch())
$json [] = $row;



echo json_encode($json);
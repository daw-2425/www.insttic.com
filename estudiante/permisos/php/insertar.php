<?php
include '../conexion/conexion.php';
session_start();
$sqlInsert = $con->prepare("INSERT INTO permiso (alumno,entrada,salida,motivo, arch_adjuntado) VALUES (:alumno,:entrada,:salida,:motivo,:arch_adjuntado)");

$id =$_SESSION['id'];

$archivo = $_FILES['archivo']['name'];
$dir_temp = $_FILES['archivo']['tmp_name'];
$descripcion = $_POST['archivo'];
$ruta = "../img/".$archivo;
$tipo_archivo = $_FILES['archivo']['type'];
$nombreArchivo = explode(".",$archivo);
$extension_archivo = strtolower(end($nombreArchivo));
$extensiones = array("doc","pdf");

if(in_array($extension_archivo,$extensiones)){
echo 'El archivo es admitido';
if(move_uploaded_file($dir_temp,$ruta)){
    echo 'archivo guardao con exito';
}
}else{
    echo 'No se admite ese tipo de archivo';
}





$entradas = $_POST['entrada'];
$salida = $_POST['salida'];
$motivo = $_POST['motivo'];

$sqlInsert->bindParam(':arch_adjuntado',$archivo);
$sqlInsert->bindParam(':alumno',$id);
$sqlInsert->bindParam(':entrada',$entradas);
$sqlInsert->bindParam(':salida',$salida);
$sqlInsert->bindParam(':motivo',$motivo);

$sqlInsert->execute();
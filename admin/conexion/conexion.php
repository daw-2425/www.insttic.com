<?php 
$servidor = "localhost";
$usuario = "root";
$passwd = "608347rAm";
$BaseDatos = "insttic";

$dsn = "mysql:host=$servidor;dbname=$BaseDatos";

$conexion = new PDO ("$dsn","$usuario","$passwd");
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// if($conexion){
//     echo "conexion exitosa";
// }


?>
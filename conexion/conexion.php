<?php 
$servidor = "localhost";
$usuario = "root";
$passwd = "608347rAm";
$BaseDatos = "insttic";

$dsn = "mysql:host=$servidor;dbname=$BaseDatos";

$conexion = new PDO ("$dsn","$usuario","$passwd");
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

<<<<<<< HEAD
// if($conexion){
//     echo "conexion exitosa";
// }
=======
>>>>>>> 9fa87639fa8fabad038dae4f53f16bb0f550c2ba


?>
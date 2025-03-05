<?php 

$__host = 'localhost';
$__user = 'root';
$__passwd = '';
$__bd = 'insttic';

$conexion = new PDO("mysql:host=$__host;dbname=$__bd",$__user,$__passwd);
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);

// if($conexion){
//     echo "conexion exitosa";
// }

?>
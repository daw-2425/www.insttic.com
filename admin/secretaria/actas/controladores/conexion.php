<?php
$host = "localhost";  // Cambia si es necesario
$dbname = "insttic";    // Nombre de la base de datos
$username = "root";   // Usuario de MySQL
$password = "";       // Contraseña de MySQL

try {
   
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
    
}
?>

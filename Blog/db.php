<?php
// Conexión a la base de datos con PDO



$host = "localhost";
$user = "root";  // Cambia si es necesario
$pass = "";      // Pon tu contraseña si tienes una
$dbname = "insttic";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
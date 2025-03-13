<?php 
$servidor = "localhost";
$usuario = "root";
$passwd = "608347rAm";
$BaseDatos = "insttic";

$dsn = "mysql:host=$servidor;dbname=$BaseDatos";

// $conexion = new PDO ("$dsn","$usuario","$passwd");
// $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// if($conexion){
//     echo "conexion exitosa";
// }



try {
    $conexion = new PDO ("$dsn","$usuario","$passwd");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET utf8");
   
} catch (Exception $th) {
    echo "<h1>hubo un error❌ " . $th->getMessage()." </h1>";
   if ($th->getCode() === 1045) {
    echo "<h1>La contraseña o el nombre del Usuario de tu BBDD no es corecta o hubo un problema con tus credenciales, verifiquelos e intentalo de nuevo❌</h1>";
   }else if ($th->getCode() === 1049) {
    echo "<h1>El nombre de la BBDD no es corecta, Verifique el nombre de tu BBDD❌</h1>";
   }else if ($th->getCode() === 2002) {
    echo "<h1>Hubo un problema con el nombre del Servidor, verifique el nombre e intentalo de nuevo❌</h1>";
   }
}



?>
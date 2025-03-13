<?php
    $host ="localhost";
    $db ="sistema_insttic";
    $user ="root";
    $pass ="";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db",$user, $pass);

        // if ($pdo) {
        //     echo("conexion exitosa");
        // }
            
    }catch (PDOException $e) {
        echo $e->getMessage();
    }
        
?>
<?php
$host = 'localhost';
$usuario = 'root';
$pass = '';
$db = 'insttic';
try{
    $dns = ("mysql:host=$host; dbname=$db");

    $con = new PDO($dns, $usuario, $pass);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($con){
//  echo "coneccion";
    }else{
echo "error";
    }
}catch(PDOException $e){
echo $e->getMessage();
}
<?php
$servidor = "localhost";
$usuario = "root";
$passwd = "";
$BaseDatos = "insttic";

$dsn = "mysql:host=$servidor;dbname=$BaseDatos";

$pdo = new PDO ("$dsn","$usuario","$passwd");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>

<?php
       require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";


       $mostrarRol = $conexion->prepare("SELECT * FROM rol");

       $mostrarRol->setFetchMode(PDO::FETCH_ASSOC);

       $mostrarRol->execute();
       
       while($rol = $mostrarRol->fetch())
       $json [] = $rol;
       
       
       echo json_encode($json);
?>
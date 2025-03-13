
<?php
       require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";


       $mostrarCategoria = $conexion->prepare("SELECT * FROM categoria_noticia");

       $mostrarCategoria->setFetchMode(PDO::FETCH_ASSOC);

       $mostrarCategoria->execute();
       
       while($categoria = $mostrarCategoria->fetch())
       $json [] = $categoria;
       
       
       echo json_encode($json);
?>
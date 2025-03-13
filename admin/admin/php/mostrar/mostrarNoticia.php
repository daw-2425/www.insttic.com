

<?php
       require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";


       $mostrarNoticia = $conexion->prepare("SELECT n.id_noticia, n.imagen, n.titulo, n.descripcion, n.fecha_suceso,
       n.id_categoria, c.id_categoria as cod_categoria, c.tipo_categoria as nomCat FROM noticias n INNER JOIN categoria_noticia c ON n.id_categoria = c.id_categoria");

       $mostrarNoticia->setFetchMode(PDO::FETCH_ASSOC);

       $mostrarNoticia->execute();
       
       while($noticia = $mostrarNoticia->fetch())
       $json [] = $noticia;
       
       
       echo json_encode($json);
?>
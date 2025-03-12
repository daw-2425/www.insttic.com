
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";
    
    
    $titulo = $_POST['tit'];
    $descripcion = $_POST['des'];
    $fechaSuceso = $_POST['fecha'];
    $categoria = $_POST['cat'];
    $foto = $_FILES['foto']['name'];

    $destino = "../../img/noticias/";
    $dirTemp = $_FILES['foto']['tmp_name'];

    $nombreFoto = explode('.' ,$foto);
    $extendFoto = strtolower(end($nombreFoto));
    $extendAdmitidas = array('jpg','webp','jpeg','png');

    if(in_array($extendFoto, $extendAdmitidas)){
        if(move_uploaded_file($dirTemp, $destino .$foto)){

            $stmInsertar = $conexion ->prepare(" INSERT INTO noticias (imagen,titulo,descripcion,fecha_suceso,id_categoria) VALUES(?,?,?,?,?) ");

            $stmInsertar -> bindParam(1, $foto);
            $stmInsertar -> bindParam(2, $titulo);
            $stmInsertar -> bindParam(3, $descripcion);
            $stmInsertar -> bindParam(4, $fechaSuceso);
            $stmInsertar -> bindParam(5, $categoria);
            

            $resultRegistrar = $stmInsertar->fetchAll(PDO::FETCH_ASSOC);
            if( $resultRegistrar){
                echo "No se pudo Registrar la noticia";
            }
            else{
                echo "noticia Registrado Exitosamente";
            }

        }else{
            echo "No se pudo subir la foto";
        }
        $stmInsertar -> execute();
    }
      
      
?>
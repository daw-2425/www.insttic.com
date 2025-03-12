
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";
    
    
    $codCategroria = $_POST['codigoCat'];
    $tipoCategoria = $_POST['cat'];
    

            $stmInsertar = $conexion ->prepare(" INSERT INTO categoria_noticia (id_categoria,tipo_categoria) VALUES(?,?) ");
            $stmInsertar -> bindParam(1, $codCategroria);
            $stmInsertar -> bindParam(2, $tipoCategoria);
           
            

            $resultRegistrar = $stmInsertar->fetchAll(PDO::FETCH_ASSOC);
            if( $resultRegistrar){
                echo "No se pudo Registrar al empleado";
            }
            else{
                echo "Empleado Registrado Exitosamente";
            }

        
        $stmInsertar -> execute();
    
      
      
?>
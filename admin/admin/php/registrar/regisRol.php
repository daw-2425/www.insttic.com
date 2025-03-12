
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";
    
    
    $codRol = $_POST['codigoRol'];
    $tipoRol = $_POST['rol'];
    

            $stmInsertar = $conexion ->prepare(" INSERT INTO rol (id_rol,rol) VALUES(?,?) ");

            $stmInsertar -> bindParam(1, $codRol);
            $stmInsertar -> bindParam(2, $tipoRol);
           
            

            $resultRegistrar = $stmInsertar->fetchAll(PDO::FETCH_ASSOC);
            if( $resultRegistrar){
                echo "No se pudo Registrar el rol";
            }
            else{
                echo "Rol Registrado Exitosamente";
            }

        
        $stmInsertar -> execute();
    
      
      
?>
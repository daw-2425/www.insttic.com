
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";
    
    
    $nombre = $_POST['nom'];
    $apellido = $_POST['apel'];
    $telefono = $_POST['tel'];
    $correo = $_POST['correo'];
    $genero = $_POST['gen'];
    $rol = $_POST['rol']; 
    $foto = $_FILES['foto']['name'];

    $destino = "../../img/empleados/";
    $dirTemp = $_FILES['foto']['tmp_name'];

    $nombreFoto = explode('.' ,$foto);
    $extendFoto = strtolower(end($nombreFoto));
    $extendAdmitidas = array('jpg','webp','jpeg','png');

    if(in_array($extendFoto, $extendAdmitidas)){
        if(move_uploaded_file($dirTemp, $destino .$foto)){

            $stmInsertar = $conexion ->prepare(" INSERT INTO empleado (foto,nombre,apellido,telefono,correo,genero,id_rol) VALUES(?,?,?,?,?,?,?) ");

            $stmInsertar -> bindParam(1, $foto);
            $stmInsertar -> bindParam(2, $nombre);
            $stmInsertar -> bindParam(3, $apellido);
            $stmInsertar -> bindParam(4, $telefono);
            $stmInsertar -> bindParam(5, $correo);
            $stmInsertar -> bindParam(6, $genero);
            $stmInsertar -> bindParam(7, $rol);
            

            $resultRegistrar = $stmInsertar->fetchAll(PDO::FETCH_ASSOC);
            if( $resultRegistrar){
                echo "No se pudo Registrar al empleado";
            }
            else{
                echo "Empleado Registrado Exitosamente";
            }

        }else{
            echo "No se pudo subir la foto";
        }
        $stmInsertar -> execute();
    }
      
      
?>
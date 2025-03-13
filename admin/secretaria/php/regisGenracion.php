
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";
    
    
    $nombre = $_POST['nom'];
    $anInicio = $_POST['anInicio'];
    $anFin = $_POST['anFin'];
    $sala = $_POST['sala'];
    $especialidad = $_POST['esp'];

            $stmInsertar = $conexion ->prepare(" INSERT INTO generacion (nombre,año_inicio,año_fin,id_especialidad,id_sala) 
            VALUES(?,?,?,?,?) ");

            $stmInsertar -> bindParam(1, $nombre);
            $stmInsertar -> bindParam(2, $anInicio);
            $stmInsertar -> bindParam(3, $anFin);
            $stmInsertar -> bindParam(4, $sala);
            $stmInsertar -> bindParam(5, $especialidad);
            

            $resultRegistrar = $stmInsertar->fetchAll(PDO::FETCH_ASSOC);
            if( $resultRegistrar){
                echo "No se pudo Registrar la generacion";
            }
            else{
                echo "Generacion Registrada Exitosamente";
            }
     $stmInsertar -> execute();
    
      
      
?>
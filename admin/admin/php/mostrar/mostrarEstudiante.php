
<?php
       require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";


       $mostrarEstudiante = $conexion->prepare("SELECT a.foto, a.nombre, a.apellidos, a.fecha_nacimiento, a.contacto_emergencia,
       a.genero, a.id_rol, r.id_rol as cod_rol, r.rol as nomRol FROM alumno a INNER JOIN rol r ON a.id_rol = r.id_rol");

       $mostrarEstudiante->setFetchMode(PDO::FETCH_ASSOC);

       $mostrarEstudiante->execute();
       
       while($estud = $mostrarEstudiante->fetch())
       $json [] = $estud;
       
       
       echo json_encode($json);
?>
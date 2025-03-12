

<?php
       require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";


       $mostrarUsuario = $conexion->prepare(" SELECT u.cod_usuario, u.nombre, u.passwd, u.id_alumno, u.id_empleado, a.id_alumno, e.id_empleado
        FROM usuario u INNER JOIN alumno a ON u.cod_usuario = a.id_alumno INNER JOIN empleado e ON u.cod_usuario = e.id_empleado");

       $mostrarUsuario->setFetchMode(PDO::FETCH_ASSOC);

       $mostrarUsuario->execute();
       
       while($usuario = $mostrarUsuario->fetch())
       $json [] = $usuario;
       
       
       echo json_encode($json);
?>
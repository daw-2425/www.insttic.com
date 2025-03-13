
<?php
       require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";


       $mostrarEmpleado = $conexion->prepare("SELECT e.foto, e.nombre, e.apellido, e.telefono, e.correo,
       e.genero, e.id_rol, r.id_rol as cod_rol, r.rol as nomRol FROM empleado e INNER JOIN rol r ON e.id_rol = r.id_rol");

       $mostrarEmpleado->setFetchMode(PDO::FETCH_ASSOC);

       $mostrarEmpleado->execute();
       
       while($empleado = $mostrarEmpleado->fetch())
       $json [] = $empleado;
       
       
       echo json_encode($json);
?>
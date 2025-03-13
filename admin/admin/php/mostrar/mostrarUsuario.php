

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";


$mostrarUsuario = $conexion->prepare(" SELECT u.cod_usuario, u.correo, u.passwd, u.id_alumno, u.id_empleado, r.rol, r.id_rol
FROM usuario u
LEFT JOIN empleado e ON u.cod_usuario = e.id_empleado
LEFT JOIN alumno a ON a.id_alumno = u.id_alumno
LEFT JOIN rol r ON (e.id_rol = r.id_rol OR a.id_rol = r.id_rol);");

$mostrarUsuario->setFetchMode(PDO::FETCH_ASSOC);

$mostrarUsuario->execute();

while ($usuario = $mostrarUsuario->fetch())
       $json[] = $usuario;


echo json_encode($json);
?>
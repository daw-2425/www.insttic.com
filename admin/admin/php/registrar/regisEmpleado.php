
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

$nombreFoto = explode('.', $foto);
$extendFoto = strtolower(end($nombreFoto));
$extendAdmitidas = array('jpg', 'webp', 'jpeg', 'png');

if (in_array($extendFoto, $extendAdmitidas)) {
    if (move_uploaded_file($dirTemp, $destino . $foto)) {

        $stmInsertar = $conexion->prepare(" INSERT INTO empleado (foto,nombre,apellido,telefono,correo,genero,id_rol) VALUES(?,?,?,?,?,?,?) ");

        $stmInsertar->bindParam(1, $foto);
        $stmInsertar->bindParam(2, $nombre);
        $stmInsertar->bindParam(3, $apellido);
        $stmInsertar->bindParam(4, $telefono);
        $stmInsertar->bindParam(5, $correo);
        $stmInsertar->bindParam(6, $genero);
        $stmInsertar->bindParam(7, $rol);


        $resultRegistrar = $stmInsertar->fetchAll(PDO::FETCH_ASSOC);
        if ($resultRegistrar) {
            // echo "No se pudo Registrar al empleado";
        } else {
            // echo "Empleado Registrado Exitosamente";
        }
    } else {
        echo "No se pudo subir la foto";
    }
    $stmInsertar->execute();
    $id_empleado = $conexion->lastInsertId();
    $verificarRol = "SELECT rol FROM rol WHERE id_rol= $rol";
    $stmtRol = $conexion->prepare($verificarRol);
    $stmtRol->execute();
    $rolEmpleado = $stmtRol->fetch(PDO::FETCH_ASSOC);
    if ($rolEmpleado['rol'] == 'Profesor') {
        $insertarProfesor = $conexion->prepare("INSERT INTO profesor (id_profesor, id_empleado) VALUES (null, '$id_empleado');");
        $insertarProfesor->execute();
    }
       $contraseña_plana = bin2hex(random_bytes(4));
       $contraseña_encriptada = password_hash($contraseña_plana, PASSWORD_DEFAULT);

       $sql = $conexion ->prepare("INSERT INTO usuario (correo, passwd, id_empleado) VALUES ('$correo', '$contraseña_encriptada', '$id_empleado');");

       $sql->execute();
       if ($sql) {
        $asunto = "Bienvenido a la Plataforma";
        $para = $correo;
    
        // Configurar los encabezados del email
        $encabezado = "MIME-Version: 1.0" . "\r\n";
        $encabezado .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $encabezado .= "From: Sistema de Gestión <noreply@tuservidor.com>" . "\r\n";
    
        
        // Cuerpo del mensaje HTML con estilo minimalista e inclusión de credenciales
        $cuerpo = '
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bienvenido</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f1f1f1;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f1f1f1; padding: 20px;">
    <tr>
        <td align="center">
            <table role="presentation" width="500" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px; text-align: center;">
                <tr>
                    <td>
                        <h1>Bienvenido,'.$nombre.'</h1>
                        <p>Gracias por registrarte en nuestra plataforma. A continuación, tus datos de acceso:</p>
                        <p>
                            <strong>Usuario:</strong> '.$correo.'<br>
                            <strong>Contraseña:</strong> '.$contraseña_plana.'
                        </p>
                        <a href="#" style="display: inline-block; margin-top: 20px; padding: 12px; background-color: turquoise; border: none; color: white; font-size: 17px; text-decoration: none; border-radius: 5px;">Confirmar Cuenta</a>
                        <p>Si no has solicitado la verificación, ignora este mensaje.</p>
                        <p>Para cualquier consulta, contáctanos.</p>
                        <p style="margin-top: 20px; font-weight: bold;">INSTTIC</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
';

    if (mail($para, $asunto, $cuerpo, $encabezado)) {
       echo 1;
    } else {
        echo 2;
    }
       }
}


?>
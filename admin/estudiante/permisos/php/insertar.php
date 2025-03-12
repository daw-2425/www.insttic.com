<!-- -- Active: 1738527463871@@127.0.0.1@3306@insttic
<?php
// include '../conexion/conexion.php';
// session_start();
// $sqlInsert = $con->prepare("INSERT INTO permiso (id_alumno ,fecha_entrada,fecha_salida,motivo, archivo_adjuntado)
//  VALUES (:alumno,:entrada,:salida,:motivo,:archivo_adjuntado)");

// $id =$_SESSION['id_alumno'];

// $archivo = $_FILES['archivo']['name'];
// $dir_temp = $_FILES['archivo']['tmp_name'];
// $descripcion = $_POST['archivo'];
// $ruta = "../img/".$archivo;
// $tipo_archivo = $_FILES['archivo']['type'];
// $nombreArchivo = explode(".",$archivo);
// $extension_archivo = strtolower(end($nombreArchivo));
// $extensiones = array("doc","pdf");

// if(in_array($extension_archivo,$extensiones)){
// echo 'El archivo es admitido';
// if(move_uploaded_file($dir_temp,$ruta)){
//     echo 'archivo guardao con exito';
// }
// }else{
//     echo 'No se admite ese tipo de archivo';
// }





// $entradas = $_POST['entrada'];
// $salida = $_POST['salida'];
// $motivo = $_POST['motivo'];

// $sqlInsert->bindParam(':archivo_adjuntado',$archivo);
// $sqlInsert->bindParam(':	id_alumno ',$id);
// $sqlInsert->bindParam(':fecha_entrada',$entradas);
// $sqlInsert->bindParam(':fecha_salida',$salida);
// $sqlInsert->bindParam(':motivo',$motivo);

// $sqlInsert->execute();


include '../conexion/conexion.php';
session_start();

$sqlInsert = $con->prepare("INSERT INTO permiso (id_alumno, fecha_entrada, fecha_salida, motivo, archivo_adjuntado) 
                            VALUES (:id_alumno, :fecha_entrada, :fecha_salida, :motivo, :archivo_adjuntado)");

$id = $_SESSION['id_alumno'];

// Verificar si se subió un archivo
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
    $archivo = $_FILES['archivo']['name'];
    $dir_temp = $_FILES['archivo']['tmp_name'];
    $ruta = "../img/" . basename($archivo);
    $tipo_archivo = $_FILES['archivo']['type'];
    
    $nombreArchivo = explode(".", $archivo);
    $extension_archivo = strtolower(end($nombreArchivo));
    $extensiones = array("doc", "pdf");

    if (in_array($extension_archivo, $extensiones)) {
        echo 'El archivo es admitido.<br>';
        if (move_uploaded_file($dir_temp, $ruta)) {
            echo 'Archivo guardado con éxito.<br>';
        } else {
            echo 'Error al mover el archivo.<br>';
            $archivo = null; // No guardar el nombre si el archivo no se movió
        }
    } else {
        echo 'No se admite ese tipo de archivo.<br>';
        $archivo = null; // No guardar el archivo si la extensión no es válida
    }
} else {
    echo 'No se subió ningún archivo.<br>';
    $archivo = null;
}

// Obtener datos del formulario
$entrada = $_POST['entrada'] ?? null;
$salida = $_POST['salida'] ?? null;
$motivo = $_POST['motivo'] ?? null;

// Bind de parámetros en la consulta
$sqlInsert->bindParam(':id_alumno', $id, PDO::PARAM_INT);
$sqlInsert->bindParam(':fecha_entrada', $entrada);
$sqlInsert->bindParam(':fecha_salida', $salida);
$sqlInsert->bindParam(':motivo', $motivo);
$sqlInsert->bindParam(':archivo_adjuntado', $archivo);

// Ejecutar la consulta
if ($sqlInsert->execute()) {
    echo 'Registro insertado correctamente.';
} else {
    echo 'Error al insertar el registro.';
}
?>



<?php
// permiso.php
include '../../conexion/conexion.php';

// Manejo de la inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo']) && $_POST['tipo'] === 'permiso') {
    $motivo = $_POST['motivo'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $fecha_salida = $_POST['fecha_salida'];
    $id_alumno = $_POST['id_alumno'];
    $estado = $_POST['estado'];
    $archivo_adjuntado = $_POST['archivo_adjuntado'];

    $stmt = $conexion->prepare("INSERT INTO permiso (motivo, fecha_entrada, fecha_salida, id_alumno, estado, archivo_adjuntado) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$motivo, $fecha_entrada, $fecha_salida, $id_alumno, $estado, $archivo_adjuntado]);
}

// Manejo de la actualización del estado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $id_permiso = $_POST['id_permiso'];
    $nuevo_estado = $_POST['nuevo_estado'];

    $stmt = $conexion->prepare("UPDATE permiso SET estado = ? WHERE id_permiso = ?");
    $stmt->execute([$nuevo_estado, $id_permiso]);
}

// Obtener todos los permisos con información del alumno y especialidad
$stmt = $conexion->query("SELECT p.*, a.nombre, a.apellidos, a.foto, e.denominacion AS especialidad
    FROM permiso p
    JOIN alumno a ON p.id_alumno = a.id_alumno
    JOIN especialidad e ON a.id_especialidad = e.id_especialidad");

$permisos = $stmt->fetchAll();

// Obtener todos los alumnos para el select
$alumnos = $conexion->query("SELECT * FROM alumno")->fetchAll();
?>
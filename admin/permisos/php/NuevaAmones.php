<?php
include "../../conexion/conexion.php";


    // Obtener datos del formulario
    $estudiante = $_POST['__estudiante'];
    $motivo = $_POST['motivo_amonestacion'];
    $descripcion = $_POST['descripcion_amonestacion'];
    $fecha = $_POST['fecha'];

    // Consulta corregida - eliminamos el 'null' que estaba causando el error
    $consulta = $conexion->prepare(
        "INSERT INTO amonestacion (motivo, descripcion, fecha, id_alumno) 
         VALUES (:motivo, :descripcion, :fecha, :estudiante)"
    );

    // Vincular parámetros
    $consulta->bindParam(':motivo', $motivo);
    $consulta->bindParam(':descripcion', $descripcion);
    $consulta->bindParam(':fecha', $fecha);
    $consulta->bindParam(':estudiante', $estudiante);

    // Ejecutar la consulta
    $consulta->execute();

 


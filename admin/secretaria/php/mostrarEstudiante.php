<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";

    // Preparar la consulta
    $mostrarEstudiante = $conexion->prepare("SELECT * FROM alumno");
    $mostrarEstudiante->setFetchMode(PDO::FETCH_ASSOC);
    $mostrarEstudiante->execute();

    $json = []; // Inicializar el array

    while ($estud = $mostrarEstudiante->fetch()) {
        $json[] = $estud; // Agregar cada fila al array
    }

    echo json_encode($json);
?>

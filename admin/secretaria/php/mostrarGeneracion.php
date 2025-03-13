<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";

    $mostrarGeneracion = $conexion->prepare("
        SELECT g.id_generacion, g.nombre, g.año_inicio, g.año_fin, 
               g.id_especialidad, g.id_sala, 
               e.denominacion, s.numero 
        FROM generacion g
        INNER JOIN especialidad e ON g.id_especialidad = e.id_especialidad
        INNER JOIN sala s ON g.id_sala = s.id_sala
    ");

    $mostrarGeneracion->setFetchMode(PDO::FETCH_ASSOC);
    $mostrarGeneracion->execute();

    $json = []; // Inicializar el array para evitar errores

    while ($gen = $mostrarGeneracion->fetch()) {
        $json[] = $gen;
    }

    echo json_encode($json);
?>

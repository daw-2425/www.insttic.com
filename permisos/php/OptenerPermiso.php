<?php

include ("../../conexion/conexion.php");

    // Filtrar por estado, si no se recibe se traen todos
    $estado = isset($_GET['estado']) ? $_GET['estado'] : 'todos';
    
    // Consulta SQL para obtener los permisos según el estado
    $sql = "SELECT p.id_permiso, a.foto, a.nombre, a.apellidos, p.fecha_entrada, p.fecha_salida, p.motivo, p.estado, p.archivo_adjuntado
            FROM permiso p
            INNER JOIN alumno a ON p.id_alumno = a.id_alumno
            WHERE p.estado LIKE :estado";

    // Modificar la consulta según el estado
    if ($estado !== 'todos') {
        $stmt = $conexion->prepare($sql);
        $stmt->execute(['estado' => $estado]);
    } else {
        // Si el estado es "todos", se traen todos los permisos sin filtrar
        $stmt = $conexion->query("SELECT p.id_permiso, a.foto, a.nombre, a.apellidos, p.fecha_entrada, p.fecha_salida, p.motivo, p.estado, p.archivo_adjuntado
                             FROM permiso p
                             INNER JOIN alumno a ON p.id_alumno = a.id_alumno");
    }

    $permisos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retornar la respuesta en formato JSON
    echo json_encode($permisos);

//

?>

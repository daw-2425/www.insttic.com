<?php





include("../controladores/conexion.php");



// Preparar la consulta con parámetros.
$sql = "SELECT g.nombre, e.denominacion, g.año_inicio, g.año_fin 
        FROM generacion g 
        INNER JOIN especialidad e 
        ON g.id_especialidad = e.id_especialidad 
        WHERE g.id_especialidad = g.id_generacion";

// Preparar y ejecutar la consulta
$stmt = $conexion->prepare($sql);
// $stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// Obtener todos los resultados en formato asociativo
$actas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si hay resultados, devolverlos en formato JSON
if ($actas) {
    echo json_encode($actas);
} else {
    echo json_encode([]); // Devolver un array vacío si no hay resultados
}



?>


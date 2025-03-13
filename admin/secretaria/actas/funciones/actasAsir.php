<?php
include("../controladores/conexion.php");

// Consulta para obtener las materias de la especialidad TSDAWEB
$sqlMateria = "SELECT DISTINCT m.id_materia, m.nombre   
               FROM nota n 
               INNER JOIN alumno a ON n.id_alumno = a.id_alumno 
               INNER JOIN materia m ON n.id_materia = m.id_materia 
               INNER JOIN especialidad e ON m.id_especialidad = e.id_especialidad 
               WHERE e.denominacion = 'TSASIR'";

$stmtMateria = $conexion->prepare($sqlMateria);
$stmtMateria->execute();
$materias = $stmtMateria->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener las notas de los alumnos junto con sus nombres y apellidos
$sqlNotas = "SELECT DISTINCT a.id_alumno, a.nombre AS nombre_alumno, a.apellidos, m.id_materia, m.nombre AS nombre_materia, n.nota   
             FROM nota n 
             INNER JOIN alumno a ON n.id_alumno = a.id_alumno 
             INNER JOIN materia m ON n.id_materia = m.id_materia 
             INNER JOIN especialidad e ON m.id_especialidad = e.id_especialidad 
             WHERE e.denominacion = 'TSASIR'";

$stmtNotas = $conexion->prepare($sqlNotas);
$stmtNotas->execute();
$notas = $stmtNotas->fetchAll(PDO::FETCH_ASSOC);

// Procesar los datos para agrupar las notas por alumno
$alumnos = [];
foreach ($notas as $nota) {
    $idAlumno = $nota['id_alumno'];
    if (!isset($alumnos[$idAlumno])) {
        $alumnos[$idAlumno] = [
            'nombre' => $nota['nombre_alumno'],
            'apellidos' => $nota['apellidos'],
            'notas' => [],
            'nota_media' => 0,
            'num_notas' => 0
        ];
    }
    $alumnos[$idAlumno]['notas'][] = [
        'materia_id' => $nota['id_materia'],
        'nota' => $nota['nota']
    ];
    // Sumar las notas para calcular la media
    $alumnos[$idAlumno]['nota_media'] += $nota['nota'];
    $alumnos[$idAlumno]['num_notas']++;
}

// Calcular la nota media para cada alumno
foreach ($alumnos as &$alumno) {
    if ($alumno['num_notas'] > 0) {
        $alumno['nota_media'] /= $alumno['num_notas'];
    }
}

// Convertir el array asociativo de alumnos a un array indexado
$alumnosArray = array_values($alumnos);

// Devolver los datos como JSON
echo json_encode([
    "mat" => $materias,
    "notas" => $alumnosArray
]);
?>
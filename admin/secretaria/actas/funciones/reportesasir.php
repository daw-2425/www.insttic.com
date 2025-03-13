<?php
include("../librerias/fpdf/fpdf.php");
include("../controladores/conexion.php");

$pdf = new FPDF('L', 'mm', 'A4'); // Orientación horizontal para manejar tablas grandes
$pdf->AddPage();

// Título del reporte
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 10, 'ACTA DE NOTAS DE TSASIR', 0, 1, 'C');
$pdf->Ln(10);

// Obtener las materias para los encabezados dinámicos
$sqlMateria = "SELECT DISTINCT m.id_materia, m.nombre FROM nota n 
INNER JOIN alumno a ON n.id_alumno = a.id_alumno INNER JOIN 
materia m ON n.id_materia = m.id_materia INNER JOIN especialidad e 
ON m.id_especialidad = e.id_especialidad WHERE e.denominacion = 'TSASIR'";
$stmtMateria = $conexion->prepare($sqlMateria);
$stmtMateria->execute();
$materias = $stmtMateria->fetchAll(PDO::FETCH_ASSOC);

// Ajustar el ancho de las celdas dinámicamente
$cellWidth = max(30, 250 / (count($materias) + 2)); // Ajusta dinámicamente según la cantidad de materias (nota media)

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(0, 102, 204);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(50, 10, 'Alumno', 1, 0, 'C', true);

foreach ($materias as $materia) {
    $pdf->Cell($cellWidth, 10, utf8_decode($materia['nombre']), 1, 0, 'C', true);
}
$pdf->Cell($cellWidth, 10, 'Nota Media', 1, 0, 'C', true); // Columna para la nota media
$pdf->Ln();
$pdf->SetTextColor(0, 0, 0);

// Obtener las notas de los alumnos
$sqlNotas = "SELECT DISTINCT a.id_alumno, a.nombre AS nombre_alumno, a.apellidos, m.id_materia, n.nota 
FROM nota n INNER JOIN alumno a ON n.id_alumno = a.id_alumno 
INNER JOIN materia m ON n.id_materia = m.id_materia 
INNER JOIN especialidad e ON m.id_especialidad = e.id_especialidad WHERE e.denominacion = 'TSASIR'";
$stmtNotas = $conexion->prepare($sqlNotas);
$stmtNotas->execute();
$notas = $stmtNotas->fetchAll(PDO::FETCH_ASSOC);

// Agrupar notas por alumno
$alumnos = [];
foreach ($notas as $nota) {
    $idAlumno = $nota['id_alumno'];
    if (!isset($alumnos[$idAlumno])) {
        $alumnos[$idAlumno] = [
            'nombre' => $nota['nombre_alumno'] . ' ' . $nota['apellidos'],
            'notas' => [],
            'nota_media' => 0, // Inicializar la nota media
            'num_notas' => 0 // Inicializar el contador de notas
        ];
    }
    $alumnos[$idAlumno]['notas'][$nota['id_materia']] = $nota['nota'];
    $alumnos[$idAlumno]['nota_media'] += $nota['nota']; // Sumar la nota para la media
    $alumnos[$idAlumno]['num_notas']++; // Contar el número de materias
}

// Calcular la nota media para cada alumno
foreach ($alumnos as &$alumno) {
    if ($alumno['num_notas'] > 0) {
        $alumno['nota_media'] /= $alumno['num_notas']; // Calcular la media
    }
}

$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(240, 240, 240);
$fill = false;

foreach ($alumnos as $alumno) {
    $pdf->Cell(50, 10, utf8_decode($alumno['nombre']), 1, 0, 'C', $fill);
    foreach ($materias as $materia) {
        $nota = isset($alumno['notas'][$materia['id_materia']]) ? $alumno['notas'][$materia['id_materia']] : '-';
        $pdf->Cell($cellWidth, 10, $nota, 1, 0, 'C', $fill);
    }
    // Mostrar la nota media en la tabla
    $pdf->Cell($cellWidth, 10, number_format($alumno['nota_media'], 2), 1, 0, 'C', $fill);
    $pdf->Ln();
    $fill = !$fill;
}

if (empty($alumnos)) {
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'No hay registros disponibles', 0, 1, 'C');
}

$pdf->Output('I', 'reporte_notasasir.pdf');
?>
<?php
require('./fpdf/fpdf.php'); 


include "../../conexion/conexion.php";


$pdf = new FPDF();
$pdf->AddPage();

// Título del reporte
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 10, 'Reporte de Alumnos Matriculados', 0, 1, 'C');
$pdf->Ln(10);

// Agregar encabezados de la tabla con estilos mejorados
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(0, 102, 204); 
$pdf->SetTextColor(255, 255, 255); 
$pdf->Cell(30, 10, 'Nombre', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Apellidos', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Fecha Nac.', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Contacto', 1, 0, 'C', true);
$pdf->Cell(20, 10, utf8_decode('Género'), 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Especialidad', 1, 1, 'C', true);


$pdf->SetTextColor(0, 0, 0);

// Obtener los alumnos matriculados
$sql = "SELECT a.id_alumno, a.foto, a.nombre, a.apellidos, a.fecha_nacimiento, a.contacto_emergencia, a.genero, e.denominacion AS especialidad, m.fecha_matricula, m.total_matricula, m.total_pagada, m.matricula_restante
        FROM alumno a
        LEFT JOIN matricula m ON a.id_alumno = m.id_alumno
        LEFT JOIN especialidad e ON m.id_especialidad = e.id_especialidad";

$stmt = $conexion->prepare($sql);
$stmt->execute();
$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);


$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(240, 240, 240); 

$fill = false;

foreach ($alumnos as $alumno) {
    // Cada fila de datos
    $pdf->Cell(30, 10, $alumno['nombre'], 1, 0, 'C', $fill);
    $pdf->Cell(30, 10, $alumno['apellidos'], 1, 0, 'C', $fill);
    $pdf->Cell(30, 10, date('d/m/Y', strtotime($alumno['fecha_nacimiento'])), 1, 0, 'C', $fill);
    $pdf->Cell(30, 10, $alumno['contacto_emergencia'], 1, 0, 'C', $fill);
    $pdf->Cell(20, 10, $alumno['genero'], 1, 0, 'C', $fill);
    $pdf->Cell(30, 10, $alumno['especialidad'] ?? 'No asignada', 1, 1, 'C', $fill);
    
   
    $fill = !$fill;
}


if (empty($alumnos)) {
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'No hay registros disponibles', 0, 1, 'C');
}


$pdf->Output('I', 'reporte_alumnos_matriculados.pdf');
?>

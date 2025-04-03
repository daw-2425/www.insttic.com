<?php
require('../fpdf/fpdf.php');
include "../../conexion/conexion.php";

if (!isset($_GET['id'])) {
    die('ID no proporcionado');
}

try {
    $id = $_GET['id'];
    
    $consulta = $conexion->prepare("
        SELECT a.*, al.nombre, al.apellidos, al.foto
        FROM amonestacion a 
        INNER JOIN alumno al ON a.id_alumno = al.id_alumno 
        WHERE a.id_amonestacion = :id
    ");
    
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $amonestacion = $consulta->fetch(PDO::FETCH_ASSOC);

    if (!$amonestacion) {
        die('Amonestación no encontrada');
    }

    class PDF extends FPDF {
        function Header() {
            $this->Image('../img/logoi.png', 10, 10, 30);
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(0, 10, 'INFORME DE AMONESTACIÓN', 0, 1, 'C');
            $this->Ln(20);
        }
    }

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Información del estudiante
    $pdf->Cell(0, 10, 'DATOS DEL ESTUDIANTE:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Nombre: ' . $amonestacion['nombre'] . ' ' . $amonestacion['apellidos'], 0, 1);
    $pdf->Cell(0, 10, 'Fecha: ' . date('d/m/Y', strtotime($amonestacion['fecha'])), 0, 1);

    // Detalles de la amonestación
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'MOTIVO:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $amonestacion['motivo']);

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'DESCRIPCIÓN:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $amonestacion['descripcion']);

    // Espacio para firmas
    $pdf->Ln(30);
    $pdf->Cell(95, 10, '________________', 0, 0, 'C');
    $pdf->Cell(95, 10, '________________', 0, 1, 'C');
    $pdf->Cell(95, 10, 'Firma del Director', 0, 0, 'C');
    $pdf->Cell(95, 10, 'Firma del Tutor', 0, 1, 'C');

    $pdf->Output('Amonestacion_' . $id . '.pdf', 'I');

} catch(PDOException $e) {
    die('Error: ' . $e->getMessage());
}
?>
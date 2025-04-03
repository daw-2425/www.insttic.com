<?php
require('../fpdf/fpdf.php');
require('../../conexion/conexion.php');

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

    class PDF extends FPDF {
        function Header() {
            // Logo
            $this->Image('../img/logoi.png', 10, 10, 30);
            // Título
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(0, 10, utf8_decode('INFORME DE AMONESTACIÓN'), 0, 1, 'C');
            $this->SetFont('Arial', '', 10);
            $this->Cell(0, 10, utf8_decode('INSTTIC - Instituto Tecnologico'), 0, 1, 'C');
            $this->Ln(10);
        }

        function Footer() {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo(), 0, 0, 'C');
        }
    }

    // Crear PDF
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetMargins(20, 20, 20);

    // Datos del estudiante
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'DATOS DEL ESTUDIANTE:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Nombre: ' . utf8_decode($amonestacion['nombre'] . ' ' . $amonestacion['apellidos']), 0, 1);
    $pdf->Cell(0, 10, 'Fecha: ' . date('d/m/Y', strtotime($amonestacion['fecha'])), 0, 1);

    // Motivo
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'MOTIVO:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, utf8_decode($amonestacion['motivo']));

    // Descripción
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, utf8_decode('DESCRIPCIÓN:'), 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, utf8_decode($amonestacion['descripcion']));

    // Firmas
    $pdf->Ln(30);
    $pdf->Cell(85, 10, '_____________________', 0, 0, 'C');
    $pdf->Cell(85, 10, '_____________________', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(85, 10, 'Firma del Director', 0, 0, 'C');
    $pdf->Cell(85, 10, 'Firma del Tutor', 0, 1, 'C');

    // Generar PDF
    $pdf->Output('Amonestacion_' . $id . '.pdf', 'I');

} catch(PDOException $e) {
    die('Error en la base de datos: ' . $e->getMessage());
}
?>
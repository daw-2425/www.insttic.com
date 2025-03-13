<?php
include("../librerias/fpdf/fpdf.php");
include("../controladores/conexion.php");

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(0, 10, utf8_decode('Reporte de Generaciones'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Consulta SQL
$sql = "SELECT g.nombre AS generacion, e.denominacion AS especialidad, 
               g.año_inicio, g.año_fin 
        FROM generacion g 
        INNER JOIN especialidad e ON g.id_especialidad = e.id_especialidad 
        WHERE g.id_especialidad = g.id_generacion";

$stmt = $conexion->prepare($sql);
$stmt->execute();
$generaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Configuración de la tarjeta
$cardWidth = 90;
$cardHeight = 40;
$gap = 10;
$cardsPerRow = 2; // Cantidad de tarjetas por fila
$currentCard = 0;
$xStart = 10;
$yStart = $pdf->GetY();

foreach ($generaciones as $gen) {
    if ($currentCard % $cardsPerRow == 0) {
        $pdf->Ln($gap); // Espacio entre filas de tarjetas
        $xStart = 10;  // Reinicia la posición en X
        $yStart = $pdf->GetY(); // Ajusta la posición en Y
    }

    $pdf->SetXY($xStart, $yStart);

    // Dibujar la tarjeta
    $pdf->SetFillColor(200, 220, 255); // Color de fondo de la tarjeta
    $pdf->Rect($xStart, $yStart, $cardWidth, $cardHeight, 'DF');

    // Agregar texto dentro de la tarjeta
    $pdf->SetXY($xStart + 5, $yStart + 5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell($cardWidth - 10, 8, utf8_decode("Generación: ") . utf8_decode($gen['generacion']), 0, 1, 'L');

    $pdf->SetXY($xStart + 5, $pdf->GetY());
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell($cardWidth - 10, 6, utf8_decode("Especialidad: ") . utf8_decode($gen['especialidad']), 0, 1, 'L');

    $pdf->SetXY($xStart + 5, $pdf->GetY());
    $pdf->Cell($cardWidth - 10, 6, utf8_decode("Año Inicio: ") . $gen['año_inicio'], 0, 1, 'L');

    $pdf->SetXY($xStart + 5, $pdf->GetY());
    $pdf->Cell($cardWidth - 10, 6, utf8_decode("Año Fin: ") . $gen['año_fin'], 0, 1, 'L');

    $xStart += $cardWidth + $gap; // Moverse a la siguiente posición en X
    $currentCard++;
}

$pdf->Output('I', 'reporte_generaciones.pdf');
?>
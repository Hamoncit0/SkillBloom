<?php
// Importar la biblioteca FPDF
require 'libraries/fpdf/fpdf.php';

// Crear una nueva instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Establecer el fondo de la página (usar una imagen local)
$pdf->Image('https://static.vecteezy.com/system/resources/previews/027/231/618/non_2x/illustration-graphic-of-aesthetic-background-template-with-subtle-pastel-colors-and-nature-motifs-vector.jpg', 0, 0, 210, 297); // Tamaño A4 (210x297 mm)

// Establecer el título del certificado
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Certificate of Completion', 0, 1, 'C');
$pdf->Ln(10);

// Imagen del logo
//pdf->Image('../images/SkillBloom_icon.png', 90, 30, 30); // Asegúrate de que la ruta sea correcta
//$pdf->Ln(40);

// Texto del certificado
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'It is certified that', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Nombre', 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'has successfully completed the course', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Java the final course', 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Termination Date:', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, '10/10/2003', 0, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Certified by:', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Gandalf', 0, 1, 'C');

// Salida del archivo
$pdf->Output('D', 'Certificate.pdf');
?>

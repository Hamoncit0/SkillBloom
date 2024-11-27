<?php
require 'clases/controllers/KardexController.php';
require 'clases/controllers/UserController.php';

$kardexController = new KardexController();
$userController = new UserController();
// Verifica si el usuario está logueado// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    // Obtener el ID del usuario desde la sesión
    $userId = $_SESSION['user']->id;

    $idKardex = $_GET['id'] ?? null;
    
    if (!$idKardex) {
        // Manejar el caso en el que no se proporciona un ID válido
        die('Invalid kardex ID');
    }

    $user = $userController->getUserById($userId);
    $kardex = $kardexController->getDiploma($idKardex);

}

// Importar la biblioteca FPDF
require 'libraries/fpdf/fpdf.php';

// Crear una nueva instancia de FPDF
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

// Establecer el fondo de la página (usar una imagen local)
$pdf->Image('images/Certificate.jpg', 0, 0, 297, 210); // Tamaño A4 (210x297 mm)

// Establecer el título del certificado
// $pdf->SetFont('Arial', 'B', 16);
// $pdf->Cell(0, 10, 'Certificate of Completion', 0, 1, 'C');
$pdf->Ln(80);

// Imagen del logo
// $pdf->Image('images/SkillBloom_icon.png', 120, 30, 30); // Asegúrate de que la ruta sea correcta
// $pdf->Ln(40);

// Texto del certificado
// $pdf->SetFont('Arial', '', 12);
// $pdf->Cell(0, 10, 'It is certified that', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 32);
$pdf->Cell(0, 10, $user->firstName . ' ' . $user->lastName, 0, 1, 'C');
$pdf->Ln(50);
// $pdf->SetFont('Arial', '', 12);
// $pdf->Cell(0, 10, 'has successfully completed the course', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 20);
$pdf->SetX(50);
$pdf->Cell(0, 0,$kardex->course, 0, 5, 'L');
$pdf->SetX(190);
$pdf->Cell(0, 0, $kardex->instructor , 0, 1, '');
$pdf->Ln(7);
$pdf->SetX(140);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, $kardex->endDate, 0, 1, 'C');


// Salida del archivo
$pdf->Output('D', 'Certificate.pdf');
?>
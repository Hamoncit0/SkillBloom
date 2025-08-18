<?php
require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';

// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userId = $user->id;

    // Verificar que la solicitud sea POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Content-Type: application/json'); // Asegúrate de establecer el encabezado correcto

        $total = $_POST['total'] ?? 0;
        $paymentMethod = $_POST['paymentMethod'] ?? null;
        $courses = $_POST['courses'] ?? '';

        if (empty($total) || empty($paymentMethod) || empty($courses)) {
            echo json_encode(['success' => false, 'message' => 'erm what the sigma.']);
            exit;
        }

        $courseController = new CourseController();

        // Procesar la compra
        try {
            $courseController->buyCourse($userId, $total, $paymentMethod, $courses);

            echo json_encode(['success' => true, 'message' => 'Order placed successfully.']);
            exit;
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            exit;
        }
    }

}

require 'views/checkout.view.php';
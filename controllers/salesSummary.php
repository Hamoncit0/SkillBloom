<?php

require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';

// Verifica si el usuario está logueado// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// if(isset($_SESSION['user'])){
//     $userId = $_SESSION['user']->id;
//     $courseController = new CourseController();
    
//     $sales= $courseController->getSalesSummary($userId);
    
//     require 'views/salesSummary.view.php';  
// }
if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']->id;
    $courseController = new CourseController();

    // Obtener el parámetro de ordenamiento de la solicitud
    $sort = isset($_GET['sort']) ? $_GET['sort'] : null;

    // Pasar el parámetro al modelo
    $sales = $courseController->getSalesSummaryFilters($userId, $sort);

    require 'views/salesSummary.view.php';
}

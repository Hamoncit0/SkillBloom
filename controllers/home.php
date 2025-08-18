<?php


require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';
$courseController = new CourseController();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    $userRole = $_SESSION['user_role']; 
    if($userRole == 1){ 

    }
    else if($userRole == 2){

    }
    else if($userRole == 3){
        // Obtener el ID del usuario desde la sesión
        $userId = $_SESSION['user']->id;
        $courseList = $courseController->getMyCourses($userId);

    }
}
require 'views/home.view.php';
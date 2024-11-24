<?php

require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';

$courseController = new CourseController();
// Verifica si el usuario está logueado// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    
    $courseList = $courseController->getAllCoursesAdmin();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'];
        $courseId = $_POST['userId'];
    
        if($action == "ban"){
            $changed = $courseController->deleteCourse($courseId);
            if($changed){
    
                header("Location: /courseList");
            }
        }
        else if($action == "unban"){
            $changed = $courseController->reviveCoure($courseId);
            if($changed){
    
                header("Location: /courseList");
            }
        }
    
    }
} 


require 'views/courseList.view.php';
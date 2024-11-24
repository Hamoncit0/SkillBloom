<?php
require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';
$courseController = new CourseController();
// Verifica si el usuario está logueado// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    
    // Obtener el ID del usuario desde la sesión
    $userId = $_SESSION['user']->id;
    $courseList = $courseController->getAllCoursesByInstructor($userId);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'];
    
        if($action == "ban"){

            $categoryId = $_POST['categoryId'];
            $changed = $courseController->deleteCourse($categoryId);

            if($changed){
    
                header("Location: /myCourses");
            }
        }
    }
} 

require 'views/coursesInstructor.view.php';
<?php
require 'clases/controllers/CourseController.php';
require 'clases/controllers/CategoryController.php';
require 'clases/entities/User.php';
$categoryController = new CategoryController();

$categoryList = $categoryController->getCategories();
$courseController = new CourseController();
// Verifica si el usuario está logueado// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    
    // Obtener el ID del usuario desde la sesión
    $userId = $_SESSION['user']->id;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $filters = [
            'status' => $_GET['status'] ?? null,
            'category' => $_GET['category'] ?? null,
            'search' => $_GET['search'] ?? null,
            'sort' => $_GET['sort'] ?? null
        ];
        
        $courseList = $courseController->getFilteredCoursesByInstructor($userId, $filters);
        
    
    } else {
        $courseList = $courseController->getAllCoursesByInstructor($userId);
    }

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
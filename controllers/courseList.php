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

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $status = $_GET['status'] ?? null;
        $category = $_GET['category'] ?? null;
        $sort = $_GET['sort'] ?? null;
        $search = $_GET['search'] ?? null;
    
        $courseList = $courseController->getFilteredCoursesAdmin($status, $category, $sort, $search);
    } else {
        $courseList = $courseController->getAllCoursesAdmin();
    }
    

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
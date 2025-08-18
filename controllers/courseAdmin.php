<?php

require 'clases/controllers/CategoryController.php';
require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';
require 'clases/controllers/ReviewController.php';

$categoryController = new CategoryController();
$categoryList = $categoryController->getCategories();

// Capturar el ID del curso desde la URL
$courseId = $_GET['id'] ?? null;

if (!$courseId) {
    // Manejar el caso en el que no se proporciona un ID válido
    die('Invalid course ID');
}

$courseController = new CourseController();
$reviewController = new ReviewController();

// Obtener los detalles del curso
$course = $courseController->getCourseById($courseId);
$reviews = $reviewController->getReviewsAdmin($courseId);

if (!$course) {
    // Manejar el caso en el que no se encuentra el curso
    die('Course not found');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $reviewId = $_POST['userId'];

    if($action == "ban"){
        $changed = $reviewController->banReview($reviewId);
        if($changed){

            header("Location: /courseAdmin?id=". $courseId);
        }
    }
    else if($action == "unban"){
        $changed = $reviewController->unbanReview($reviewId);
        if($changed){

            header("Location: /courseAdmin?id=". $courseId);
        }
    }

}


require 'views/courseAdmin.view.php';
<?php

require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';

require 'clases/controllers/CategoryController.php';

$categoryController = new CategoryController();

$categoryList = $categoryController->getCategories();
$courseController = new CourseController();
    
// Recibir los filtros de la solicitud GET
$priceMin = isset($_GET['price_min']) ? $_GET['price_min'] : '';
$priceMax = isset($_GET['price_max']) ? $_GET['price_max'] : '';
$review = isset($_GET['role']) ? $_GET['role'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$title = isset($_GET['title']) ? $_GET['title'] : '';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$userId = 0;
if( isset($_SESSION['user'])){
    $userId = $_SESSION['user']->id;
}
    
$courseList = $courseController->getFilteredCourses($title, $category, $review, $priceMax, $priceMin, $userId);


require 'views/advancedSearch.view.php';
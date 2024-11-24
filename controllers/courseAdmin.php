<?php

require 'clases/controllers/CategoryController.php';
require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';

$categoryController = new CategoryController();
$categoryList = $categoryController->getCategories();

// Capturar el ID del curso desde la URL
$courseId = $_GET['id'] ?? null;

if (!$courseId) {
    // Manejar el caso en el que no se proporciona un ID válido
    die('Invalid course ID');
}

$courseController = new CourseController();

// Obtener los detalles del curso
$course = $courseController->getCourseById($courseId);

if (!$course) {
    // Manejar el caso en el que no se encuentra el curso
    die('Course not found');
}


require 'views/courseAdmin.view.php';
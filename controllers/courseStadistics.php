<?php

require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';
require 'clases/controllers/ReviewController.php';

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
$reviews = $reviewController->getReviews($courseId);
$stadistics = $courseController->getCourseStadistics($courseId);

if (!$course) {
    // Manejar el caso en el que no se encuentra el curso
    die('Course not found');
}


require 'views/courseStadistics.view.php';
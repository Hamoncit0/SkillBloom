<?php

require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$courseController = new CourseController();
$userId = 0;

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']->id;
}
// Obtén el valor del filtro desde la URL, si está presente
$filter = isset($_GET['filter']) ? $_GET['filter'] : null;

// Inicializa la lista de cursos
$courseList = [];
$header="Explore Courses";

if ($filter === 'most_sold') {
    $courseList = $courseController->getMostSoldCourses($userId);
    $header="Most sold";
} elseif ($filter === 'best_rated') {
    $courseList = $courseController->getBestRatedCourses($userId);
    $header="Best rated";
} elseif ($filter === 'newest') {
    $courseList = $courseController->getNewestCourses($userId);
    $header="Newest";
} else {
    $courseList = $courseController->getAllCoursesNotInKardex($userId);
}

require 'views/exploreCourses.view.php';

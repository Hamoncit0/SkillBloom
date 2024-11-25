<?php

require 'clases/controllers/CourseController.php';
require 'clases/controllers/UserController.php';

// Capturar el ID del curso desde la URL
$courseId = $_GET['course'] ?? null;
$idLevelOrder = $_GET['level'] ?? null;

if (!$courseId && !$idLevelOrder) {
    // Manejar el caso en el que no se proporciona un ID válido
    die('Invalid course ID and level ID');
}

$courseController = new CourseController();
$userController = new UserController();

// Obtener los detalles del curso
$level = $courseController->getLevelInfo($idLevelOrder, $courseId);
$user = $userController->getUserById($level->idInstructor);

if (!$level) {
    // Manejar el caso en el que no se encuentra el curso
    die('Course not found');
}


require 'views/course-level.view.php';
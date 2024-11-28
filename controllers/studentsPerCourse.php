<?php

require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';


// Verifica si el usuario está logueado// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']->id;
    $courseController = new CourseController();

    // Recoge los filtros desde el formulario
    $filters = [
        'course' => $_GET['course'] ?? null,
        'state' => $_GET['state'] ?? null,
        'sort' => $_GET['sort'] ?? null,
    ];
    $courses = $courseController->getAllCoursesByInstructor($userId);

    // Llama al método con los filtros
    $studentsPerCourse = $courseController->getFilteredStudents($userId, $filters);

    require 'views/studentsPerCourse.view.php';
}
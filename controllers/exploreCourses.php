<?php

require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$courseController = new CourseController();
$userId = 0;

if( isset($_SESSION['user'])){
    $userId = $_SESSION['user']->id;
}
$courseList = $courseController->getAllCoursesNotInKardex($userId);


require 'views/exploreCourses.view.php';
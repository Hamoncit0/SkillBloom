<?php

require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';
$courseController = new CourseController();

$courseList = $courseController->getAllCourses();


require 'views/exploreCourses.view.php';
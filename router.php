<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/login.php',
    '/dashboard' => 'controllers/dashboard.php',
    '/kardex' => 'controllers/kardex.php',
    '/advancedSearch' => 'controllers/advancedSearch.php',
    '/signup' => 'controllers/signup.php',
    '/messages' => 'controllers/messages.php',
    '/recoverPassword' => 'controllers/recoverPassword.php',
    '/courseSeeMore' => 'controllers/courseInfo.php',
    '/updateUser' => 'controllers/updateUser.php',
    '/rateCourse' => 'controllers/rateCourse.php',
    '/diploma' => 'controllers/diploma.php',
    '/newCourse' => 'controllers/newCourse.php',
    '/myCourses' => 'controllers/studentCourses.php',
    '/courseStadistics' => 'controllers/courseStadistics.php',
    '/availableCourses' => 'controllers/availableCourses.php',
    '/courseLevel' => 'controllers/courseLevel.php',
    '/salesSummary' => 'controllers/salesSummary.php',
    '/studentsPerCourse' => 'controllers/studentsPerCourse.php',
    '/paymentMethod' => 'controllers/paymentMethod.php',
    '/paypal' => 'controllers/paypal.php',
    '/transferencia' => 'controllers/transferencia.php',
];

function abort($code = 404)
{
    http_response_code($code);
    require "views/$code.php";
    die();
}


if(array_key_exists($uri, $routes)) {
    require $routes[$uri];
}else{
    abort();
}
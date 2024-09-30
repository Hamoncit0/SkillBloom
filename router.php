<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/home.php',
    '/login' => 'controllers/login.php',
    '/signup' => 'controllers/signup.php',
    '/exploreCourses' => 'controllers/exploreCourses.php',
    '/cart' => 'controllers/cart.php',
    '/editProfile' => 'controllers/updateUser.php',
    '/newCourse' => 'controllers/newCourse.php',
    '/courseInfo' => 'controllers/courseInfo.php',
    '/yourCourses' => 'controllers/yourCourses.php',
    '/courseLevel' => 'controllers/course-level.php',
    '/passwordReset' => 'controllers/passwordReset.php',
    '/chat' => 'controllers/chat.php',
    '/kardex' => 'controllers/kardex.php',
    '/studentsPerCourse' => 'controllers/studentsPerCourse.php',
    '/salesSummary' => 'controllers/salesSummary.php',
    '/courseStadistics' => 'controllers/courseStadistics.php',
    '/diploma' => 'controllers/diploma.php',
    '/advancedSearch' => 'controllers/advancedSearch.php',
    '/checkout' => 'controllers/checkout.php',
    '/paymentCompleted' => 'controllers/paymentCompleted.php',
    '/userList' => 'controllers/userList.php',
    '/courseList' => 'controllers/courseList.php',
    '/courseAdmin' => 'controllers/courseAdmin.php',
    '/category' => 'controllers/category.php',
    '/myCourses' => 'controllers/coursesInstructor.php',
    '/editCourse' => 'controllers/editCourse.php',
    '/seeProfile' => 'controllers/seeProfile.php',
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
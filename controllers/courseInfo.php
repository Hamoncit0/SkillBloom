<?php

require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';
require 'clases/controllers/ReviewController.php';
require 'clases/controllers/ChatController.php';

// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
        
$chatController = new ChatController();
if(isset($_SESSION['user'])){

    $userId = $_SESSION['user']->id;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        // Recuperar los valores del formulario
        $idInstructor = $_POST['idInstructor'];
    
        $chatExists = $chatController->getChatByUsersId($userId, $idInstructor);
        if($chatExists){

            header("Location: /chat?id=". $chatExists->id);
            exit; // Detener el procesamiento adicional
        }
        else{
            // Actualizar el usuario en la base de datos
            $created = $chatController->createChat($userId, $idInstructor);
            if($created){
                $chatCreated = $chatController->getChatByUsersId($userId, $idInstructor);
                header("Location: /chat?id=". $chatCreated->id);
                exit; // Detener el procesamiento adicional
            }

        }
        
    }
    
    

}

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

if (!$course) {
    // Manejar el caso en el que no se encuentra el curso
    die('Course not found');
}


require 'views/courseInfo.view.php';
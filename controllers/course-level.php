<?php

require 'clases/controllers/CourseController.php';
require 'clases/controllers/ChatController.php';
require 'clases/controllers/KardexController.php';
require 'clases/controllers/UserController.php';
require 'clases/controllers/ReviewController.php';

// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['user'])){

    $userId = $_SESSION['user']->id;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['rating'])){

            $reviewController = new ReviewController();
            
            // Recuperar los valores del formulario
            $review = $_POST['review'];
            $rating = $_POST['rating'];
            $newReview = new Review(0, $userId, $courseId, $review, $rating);
            
            // Actualizar el usuario en la base de datos
            $updated = $reviewController->createReview($newReview);
        }
        if(isset($_POST['idInstructor'])){
            $chatController = new ChatController();
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
    $courseId = $_GET['course'] ?? null;
    $idLevelOrder = $_GET['level'] ?? null;
    
    if (!$courseId && !$idLevelOrder) {
        // Manejar el caso en el que no se proporciona un ID válido
        die('Invalid course ID and level ID');
    }

    $courseController = new CourseController();
    $userController = new UserController();
    
    //obtener el total de niveles para limitar el ver sig curso
    $kardexController = new KardexController();
    $totalLevels = $kardexController->getTotalLevels($courseId);
    
    // Obtener los detalles del curso
    $level = $courseController->getLevelInfo($idLevelOrder, $courseId);
    $user = $userController->getUserById($level->idInstructor);
    
    if (!$level) {
        // Manejar el caso en el que no se encuentra el curso
        die('Course not found');
    }
    //checar que el level que esta viendo sea +1 del last level para q sea valido el progreso
    $lastLevel = $kardexController->getLastLevel($userId, $courseId);
    if($idLevelOrder >= $lastLevel+1 && $lastLevel <= $totalLevels || $lastLevel == 1){
        $updated = $kardexController->updateKardex($courseId, $userId, $idLevelOrder);
    }



    require 'views/course-level.view.php';

}

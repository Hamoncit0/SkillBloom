<?php

require 'clases/controllers/CourseController.php';
require 'clases/controllers/KardexController.php';
require 'clases/controllers/UserController.php';
// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['user'])){

    $userId = $_SESSION['user']->id;

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
    if($idLevelOrder >= $lastLevel+1 && $lastLevel <= $totalLevels){
        $updated = $kardexController->updateKardex($courseId, $userId, $idLevelOrder);
    }
    require 'views/course-level.view.php';

}

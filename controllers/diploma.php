<?php
require 'clases/controllers/KardexController.php';
require 'clases/controllers/UserController.php';

$kardexController = new KardexController();
$userController = new UserController();
// Verifica si el usuario está logueado// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    // Obtener el ID del usuario desde la sesión
    $userId = $_SESSION['user']->id;

    $idKardex = $_GET['id'] ?? null;
    
    if (!$idKardex) {
        // Manejar el caso en el que no se proporciona un ID válido
        die('Invalid kardex ID');
    }

    $user = $userController->getUserById($userId);
    $kardex = $kardexController->getDiploma($idKardex);

}
else{
    echo 'huh';
}


require 'views/diploma.view.php';
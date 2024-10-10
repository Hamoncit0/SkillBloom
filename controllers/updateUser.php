<?php
    require 'clases/controllers/UserController.php';
// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario está logueado
if (isset($_SESSION['user'])) {
    // Incluye el controlador de usuario


    $userController = new UserController();

    // Obtener el ID del usuario desde la sesión
    $userId = $_SESSION['user']->id;

    // Obtener información del usuario usando el UserController
    $user = $userController->getUserById($userId); // Necesitarás implementar este método

    if ($user) {
        // Aquí puedes cargar la vista y pasar los datos del usuario
        require 'views/updateUser.view.php';
    } else {
        die('Error al recuperar la información del usuario.');
    }
} else {
    die('Usuario no logueado.');
}
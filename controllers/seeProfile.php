<?php

require_once  'clases/controllers/UserController.php';

// Capturar el ID del curso desde la URL
$userId = $_GET['id'] ?? null;
$userController = new UserController();
    
if (!$userId) {
    // Manejar el caso en el que no se proporciona un ID válido
    die('Invalid userId ID');
}
// Volver a obtener la información actualizada del usuario
$user = $userController->getUserById($userId);

if ($user) {
    // Aquí puedes cargar la vista y pasar los datos del usuario
    require 'views/seeProfile.view.php';

} else {
    die('Error al recuperar la información del usuario.');
}



// require 'views/seeProfile.view.php';
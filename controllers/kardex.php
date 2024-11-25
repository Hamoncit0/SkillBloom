<?php
require 'clases/controllers/KardexController.php';
require 'clases/entities/User.php';

$kardexController = new KardexController();
// Verifica si el usuario está logueado// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    // Obtener el ID del usuario desde la sesión
    $userId = $_SESSION['user']->id;
    $kardexList = $kardexController->getUserKardex($userId);

}
else{
    echo 'huh';
}


require 'views/kardex.view.php';
<?php

$heading = 'Log In';

require 'clases/controllers/UserController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los valores del formulario
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    // Instanciar el controlador
    $userController = new UserController();

    // Verificar si el usuario existe y si la contraseña es correcta
    $user = $userController->logIn($email, $password);

    if ($user) {
        // Guardar el usuario en la sesión
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['user_role'] = $user->idRol; 
        $_SESSION['user_avatar']= $user->pfpPath;
        // Redireccionar a la página principal
        header("Location: /myCourses");
        exit();
    } else {
        $loginError = "Invalid user.";
    }
}

require 'views/login.view.php';
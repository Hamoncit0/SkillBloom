<?php
if (!isset($_SESSION['user'])) {
    // Redirige si esta loggeado
    header("Location: /");
    exit();
}

$heading = 'Log In';

require 'clases/controllers/UserController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los valores del formulario
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    // Instanciar el controlador
    $userController = new UserController();

    // Verificar si el usuario existe y si la contraseña es correcta
    $user = $userController->getUser($email, $password);

    if ($user) {
        // Guardar el usuario en la sesión
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['user_role'] = $user->idRol; 

        // Redireccionar a la página principal
        header("Location: /myCourses");
        exit();
    } else {
        $loginError = "Invalid email or password.";
    }
}

require 'views/login.view.php';
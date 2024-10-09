<?php

$heading = 'Sign Up';


require 'clases/controllers/UserController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los valores del formulario
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
    $gender = $_POST['gender'];
    $rol = $_POST['rol'];

    // Instanciar el controlador
    $userController = new UserController();

    $newUser = new User($firstName, $lastName, $email, $password, $birthdate, $gender, $rol);
    // Verificar si el usuario existe y si la contraseña es correcta
    $registered = $userController->signUp($newUser);

    if ($registered ) {
        $signupStatus = "Registered successfully!!";
    } else {
        $signupStatus = "Couldn't be registered.";
    }
}

require 'views/signup.view.php';
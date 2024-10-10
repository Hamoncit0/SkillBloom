<?php
    require 'clases/controllers/UserController.php';
// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario está logueado
if (isset($_SESSION['user'])) {
    $userController = new UserController();
    
    // Obtener el ID del usuario desde la sesión
    $userId = $_SESSION['user']->id;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset( $_POST['updateUserForm'])){
            // Recuperar los valores del formulario
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
            $gender = $_POST['gender'];

            // Instanciar el controlador
            $newUser = new User($firstName, $lastName, '', '', $birthdate, $gender, '');
            $newUser->id = $userId;

            // Actualizar el usuario en la base de datos
            $updated = $userController->updateUser($newUser);

            if ($updated) {
                // Actualizar la sesión con los nuevos datos del usuario
                $_SESSION['user']->firstName = $firstName;
                $_SESSION['user']->lastName = $lastName;
                $_SESSION['user']->birthdate = $birthdate;
                $_SESSION['user']->gender = $gender;

                $updateStatus = "Updated successfully!";
            } else {
                $updateStatus = "Couldn't be updated.";
            }
        }
        if(isset( $_POST['changePassword'])){
            $password = $_POST['newPassword'];

            $changed = $userController->changePassword($userId, $password);
            if($changed){
                $passwordStatus = "Updated successfully!";

            }else{
                $passswordStatus = "Couldn't be updated.";

            }
        }
    }

    // Volver a obtener la información actualizada del usuario
    $user = $userController->getUserById($userId);

    if ($user) {
        // Aquí puedes cargar la vista y pasar los datos del usuario
        require 'views/updateUser.view.php';
    } else {
        die('Error al recuperar la información del usuario.');
    }
} else {
    die('Usuario no logueado.');
}
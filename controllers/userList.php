<?php
require 'clases/controllers/UserController.php';

$userController = new UserController();

$usersList = $userController->getAllUsers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $userId = $_POST['userId'];

    if($action == "ban"){
        $changed = $userController->changeStatus($userId, 'blocked');
        if($changed){

            header("Location: /userList");
        }
    }
    else if($action == "unban"){
        $changed = $userController->changeStatus($userId, 'active');
        if($changed){

            header("Location: /userList");
        }
    }

}
    $userController = new UserController();
    
    // Recibir los filtros de la solicitud GET
    $status = isset($_GET['status']) ? $_GET['status'] : '';
    $role = isset($_GET['role']) ? $_GET['role'] : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    
    $usersList = $userController->getFilteredUsers($status, $role, $sort, $email);


require 'views/userList.view.php';
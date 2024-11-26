<?php

$heading = 'Chat';

include_once 'clases/Database.php';
require_once 'clases/controllers/UserController.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUser1 = $_POST['user_id'] ?? null; // Usuario logeado
    $idUser2 = $_POST['instructor_id'] ?? null; // Instructor con el que se inicia el chat

    if ($idUser1 && $idUser2) {
        require_once 'ChatsController.php'; // Asegúrate de cargar el archivo que contiene la clase
        $chatController = new ChatsController($db);
        $result = $chatController->createChat($idUser1, $idUser2);

        if ($result) {
            // Retorna la información del chat
            echo json_encode(['success' => true, 'message' => 'Chat creado']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error al crear el chat']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Faltan parámetros']);
    }
}

require 'views/chat.view.php';
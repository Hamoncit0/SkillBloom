<?php
    require 'clases/controllers/ChatController.php';
    require 'clases/entities/User.php';
    // Iniciar la sesión si no está ya iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
        
    if(isset($_SESSION['user'])){

        $currentUserId = $_SESSION['user']->id;

         // Capturar el ID del curso desde la URL
        $chatId = $_GET['id'] ?? null;
        if (!$chatId) {
            // Manejar el caso en el que no se proporciona un ID válido
            die('Invalid chat ID');
        }

        $chatController = new ChatController();
        
        $chat = $chatController->getChatById($chatId);
        $messages = $chatController->getMessages($chatId);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Recuperar los valores del formulario
            $content = $_POST['content'];
    
            // Actualizar el usuario en la base de datos
            $sent = $chatController->sendMessage($chatId, $currentUserId, $content);
            
            header("Location: ?id=$chatId");
            exit; // Detener el procesamiento adicional
            
        }
        
        
    }

require 'views/chat.view.php';
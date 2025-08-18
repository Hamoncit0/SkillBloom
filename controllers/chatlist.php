<?php
    require 'clases/controllers/ChatController.php';
    require 'clases/entities/User.php';
    // Iniciar la sesión si no está ya iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
        
    if(isset($_SESSION['user'])){

        $currentUserId = $_SESSION['user']->id;
        
        $chatController = new ChatController();
        
        $chatList = $chatController->getChats($currentUserId);
        $chatListnoChat = $chatController->getUsersWithoutChat($currentUserId);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Recuperar los valores del formulario
            $idNewUserChat = $_POST['idNewUserChat'];
    
            // Actualizar el usuario en la base de datos
            $created = $chatController->createChat($currentUserId, $idNewUserChat);
            if($created){
                header("Location: ?id=$chatId");
                exit; // Detener el procesamiento adicional
            }
            
        }
        
        
    }
    require 'views/chatlist.view.php';
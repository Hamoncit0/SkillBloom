<?php
include_once 'clases/Database.php';
include_once 'clases/entities/Chat.php';
include_once 'clases/entities/Message.php';
 

class ChatController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function createChat($idUser1, $idUser2){
        $query = "CALL create_chat(:idUser1, :idUser2)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':idUser1', $idUser1); 
        $stmt->bindParam(':idUser2', $idUser2); 
    
        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
        return false;
    }

    public function sendMessage($idChat, $idSender, $content){
        $query = "CALL send_message(:idChat, :idSender, :content)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':idChat', $idChat);
        $stmt->bindParam(':idSender', $idSender); 
        $stmt->bindParam(':content', $content); 
    
        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
        return false;
        
    }

    public function getChats($id){
        // Consulta para obtener todos los usuarios
        $query = "SELECT * FROM v_chats WHERE idUser1 = :id OR idUser2 = :id ORDER BY createdAt DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        // Array para almacenar los usuarios
        $chats = [];
    
        // Recuperar los datos de los usuarios y almacenarlos en el array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crear un nuevo objeto User con los datos de la fila
            $chats[] = new Chat(
                $row['id'],
                $row['idUser1'],
                $row['idUser2'],
                $row['user1'],
                $row['user2'],
                $row['createdAt'],

            );
        }
    
        return $chats;
    }
    public function getChatByUsersId($idUser1, $idUser2){
        // Consulta para obtener todos los usuarios
        $query = "SELECT * FROM v_chats WHERE idUser1 = :idUser1 AND idUser2 = :idUser2 OR idUser1 = :idUser2 AND idUser2 = :idUser1 ORDER BY createdAt DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idUser1', $idUser1);
        $stmt->bindParam(':idUser2', $idUser2);
        $stmt->execute();
        
        $chat = null;
        // Recuperar los datos de los usuarios y almacenarlos en el array
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            $chat = new Chat(
                    $row['id'],
                    $row['idUser1'],
                    $row['idUser2'],
                    $row['user1'],
                    $row['user2'],
                    $row['createdAt']
            );

        }
        return $chat;
    }
    
    public function getChatById($id){
        // Consulta para obtener todos los usuarios
        $query = "SELECT * FROM v_chats WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        // Recuperar los datos de los usuarios y almacenarlos en el array
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Crear un nuevo objeto User con los datos de la fila
        $chat = new Chat(
                $row['id'],
                $row['idUser1'],
                $row['idUser2'],
                $row['user1'],
                $row['user2'],
                $row['createdAt']
        );
    
        return $chat;
    }
    public function getMessages($idChat){
        // Consulta para obtener todos los usuarios
        $query = "SELECT * FROM messages WHERE idChat = :idChat ORDER BY createdAt ASC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idChat', $idChat);
        $stmt->execute();
    
        // Array para almacenar los usuarios
        $messages = [];
    
        // Recuperar los datos de los usuarios y almacenarlos en el array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crear un nuevo objeto User con los datos de la fila
            $messages[] = new Message(
                $row['id'],
                $row['idSender'],
                '',
                $row['content'],
                $row['createdAt']
            );
        }
    
        return $messages;
    }
    
    public function getUsersWithoutChat($idUser){
        // Consulta para obtener todos los usuarios
        $query = "SELECT user.id, CONCAT(user.firstName, ' ', user.lastName) AS fullName
                    FROM user
                    WHERE user.id != :id
                    AND user.id NOT IN (
                        SELECT idUser1 FROM chat WHERE idUser2 = :id
                        UNION
                        SELECT idUser2 FROM chat WHERE idUser1 = :id);";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $idUser);
        $stmt->execute();
    
        // Array para almacenar los usuarios
        $chats = [];
    
        // Recuperar los datos de los usuarios y almacenarlos en el array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crear un nuevo objeto User con los datos de la fila
            $chats[] = new Chat(
                '',
                $row['id'],
                '',
                $row['fullName']
            );
        }
    
        return $chats;
    }
}
<?php
include_once 'clases/Database.php';
include_once 'clases/entities/User.php';

include_once 'clases/entities/Chats.php';
include_once 'clases/entities/Message.php';

class ChatController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    //obtener instructores
    public function getInstructors() {
        $query = "SELECT id, firstName, lastName, email FROM user WHERE idRol = 2 AND status = 'active'";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve una lista de instructores
    }
    // Enviar mensaje
    public function sendMessage($idChat, $idSender, $content) {
        $query = "INSERT INTO messages (idChat, idSender, content) VALUES (:idChat, :idSender, :content)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idChat', $idChat);
        $stmt->bindParam(':idSender', $idSender);
        $stmt->bindParam(':content', $content);
        
        return $stmt->execute();
    }

    public function getChatsByUserId($userId) {
        $query = "SELECT c.id AS chatId, u.id AS otherUserId, CONCAT(u.firstName, ' ', u.lastName) AS otherUserName, 
                         (SELECT content FROM messages WHERE idChat = c.id ORDER BY createdAt DESC LIMIT 1) AS lastMessage,
                         (SELECT createdAt FROM messages WHERE idChat = c.id ORDER BY createdAt DESC LIMIT 1) AS lastMessageTime
                  FROM chat c
                  JOIN user u ON (u.id = c.idUser1 AND c.idUser2 = :userId) OR (u.id = c.idUser2 AND c.idUser1 = :userId)
                  WHERE u.status = 'active'
                  ORDER BY lastMessageTime DESC";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener ID del usuario por email
    public function getUserIdByEmail($email) {
        $query = "SELECT id FROM user WHERE email = :email AND status = 'active'";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result['id']; // Retorna el ID si se encuentra
            } else {
                return null; // No se encontró el usuario o está inactivo
            }
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }


    public function getMessagesByChatId($idChat) {
        $query = "SELECT m.id, m.content, m.idSender, m.createdAt, u.firstName, u.lastName
                  FROM messages m
                  JOIN user u ON m.idSender = u.id
                  WHERE m.idChat = :idChat
                  ORDER BY m.createdAt ASC";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idChat', $idChat);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createChat($idUser1, $idUser2) {
        $query = "INSERT IGNORE INTO chat (idUser1, idUser2) VALUES (:idUser1, :idUser2)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idUser1', $idUser1);
        $stmt->bindParam(':idUser2', $idUser2);
        
        return $stmt->execute();
    }

    // Obtener mensajes entre dos usuarios
    public function getMessages($user1Id, $user2Id) {
        $query = "CALL get_messages(:user1Id, :user2Id)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user1Id', $user1Id);
        $stmt->bindParam(':user2Id', $user2Id);
        
        $stmt->execute();
        $messages = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $newMessage = new Message();
            $newMessage->id = $row['id'];
            $newMessage->senderId = $row['senderId'];
            $newMessage->receiverId = $row['receiverId'];
            $newMessage->content = $row['content'];
            $newMessage->timestamp = $row['timestamp'];
            $messages[] = $newMessage;
        }

        return $messages;
    }

    // Obtener las conversaciones pendientes de un usuario
    public function getPendingConversations($userId) {
        $query = "CALL get_pending_conversations(:userId)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        
        $stmt->execute();
        $conversations = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $conversations[] = [
                'conversationId' => $row['conversationId'],
                'userId' => $row['userId'],
                'userName' => $row['userName'],
                'lastMessage' => $row['lastMessage'],
                'timestamp' => $row['timestamp']
            ];
        }

        return $conversations;
    }

    // Marcar un mensaje como leído
    public function markAsRead($messageId) {
        $query = "CALL mark_message_as_read(:messageId)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':messageId', $messageId);

        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
    }

    // Eliminar un mensaje
    public function deleteMessage($messageId) {
        $query = "CALL delete_message(:messageId)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':messageId', $messageId);

        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
    }

    // Obtener el último mensaje de una conversación
    public function getLastMessage($user1Id, $user2Id) {
        $query = "CALL get_last_message(:user1Id, :user2Id)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user1Id', $user1Id);
        $stmt->bindParam(':user2Id', $user2Id);
        
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $lastMessage = new Message();
            $lastMessage->id = $result['id'];
            $lastMessage->senderId = $result['senderId'];
            $lastMessage->receiverId = $result['receiverId'];
            $lastMessage->content = $result['content'];
            $lastMessage->timestamp = $result['timestamp'];
            return $lastMessage;
        }

        return null;
    }
}
?>

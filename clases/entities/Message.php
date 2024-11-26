<?php

class Message {
    public $id;
    public $idChat;
    public $idSender;
    public $content;
    public $createdAt;

    // Constructor
    function __construct($id = null, $idChat = null, $idSender = null, $content = null, $createdAt = null) {
        $this->id = $id;
        $this->idChat = $idChat;
        $this->idSender = $idSender;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    // Método para obtener el mensaje completo
    public function getMessageInfo() {
        return [
            'id' => $this->id,
            'idChat' => $this->idChat,
            'idSender' => $this->idSender,
            'content' => $this->content,
            'createdAt' => $this->createdAt
        ];
    }
}
?>

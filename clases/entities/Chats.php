<?php

class Chat {
    public $id;
    public $idUser1;
    public $idUser2;
    public $createdAt;

    // Constructor
    function __construct($id = null, $idUser1 = null, $idUser2 = null, $createdAt = null) {
        $this->id = $id;
        $this->idUser1 = $idUser1;
        $this->idUser2 = $idUser2;
        $this->createdAt = $createdAt;
    }
    
    // Método para obtener información básica del chat
    public function getChatInfo() {
        return [
            'id' => $this->id,
            'idUser1' => $this->idUser1,
            'idUser2' => $this->idUser2,
            'createdAt' => $this->createdAt
        ];
    }
}
?>

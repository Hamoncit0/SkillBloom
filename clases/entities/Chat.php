<?php
    class Chat{
        public $id;
        public $idUser1;
        public $idUser2;
        public $nameUser1;
        public $nameUser2;
        public $createdAt;

        function __construct($id = null, $idUser1 = null, $idUser2 = null, $nameUser1 = null, $nameUser2 = null, $createdAt = null ) {
            $this->id = $id;
            $this->idUser1 = $idUser1;
            $this->idUser2 = $idUser2;
            $this->nameUser1 = $nameUser1;
            $this->nameUser2 = $nameUser2;
            $this->createdAt = $createdAt;
        }
    }
?>
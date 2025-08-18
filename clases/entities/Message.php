<?php
    class Message{
        public $id;
        public $idSender;
        public $nameSender;
        public $content;
        public $createdAt;

        function __construct($id = null, $idSender = null, $nameSender = null, $content = null, $createdAt = null ) {
            $this->id = $id;
            $this->idSender = $idSender;
            $this->nameSender = $nameSender;
            $this->content = $content;
            $this->createdAt = $createdAt;
        }
    }
?>

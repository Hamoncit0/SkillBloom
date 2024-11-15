<?php
    class Category{
        public $id;
        public $name;
        public $description;
        public $createdAt;
        public $deletedAt;

        function __construct($id = null, $name = null, $description = null, $createdAt = null, $deletedAt = null ) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->createdAt = $createdAt;
            $this->deletedAt = $deletedAt;
        }
    }
?>
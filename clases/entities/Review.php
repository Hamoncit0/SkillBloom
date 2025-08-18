<?php
    class Review{
        public $id;
        public $idUser;
        public $idCourse;
        public $review;
        public $rating;
        public $createdAt;
        public $deletedAt;
        public $name;
        public $pfp;

        function __construct($id = null, $idUser = null, $idCourse = null, $review = null, $rating = null, $createdAt = null, $deletedAt = null, $name = null, $pfp = null ) {
            $this->id = $id;
            $this->idUser = $idUser;
            $this->idCourse = $idCourse;
            $this->review = $review;
            $this->rating = $rating;
            $this->createdAt = $createdAt;
            $this->deletedAt = $deletedAt;
            $this->name = $name;
            $this->pfp = $pfp;
        }
    }
?>
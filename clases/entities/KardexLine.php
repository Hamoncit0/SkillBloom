<?php
    class KardexLine{
        public $id;
        public $course;
        public $instructor;
        public $category;
        public $progress;
        public $enrolledAt;
        public $lastEntry;
        public $endDate;
        public $status;
        public $idCourse;
        public $lastLevel;
        public $idUser;

        
        public function __construct($id = null, $course = null, $instructor = null, $category = null, $progress=null, $enrolledAt = null,
                                    $lastEntry = null, $endDate = null, $status = null, $idCourse = null, $lastLevel = null, $idUser = null ) {
            $this->id = $id;
            $this->course = $course;
            $this->instructor = $instructor;
            $this->category = $category;
            $this->progress = $progress;
            $this->enrolledAt = $enrolledAt;
            $this->lastEntry = $lastEntry;
            $this->endDate = $endDate;
            $this->status = $status;
            $this->idCourse = $idCourse;
            $this->lastLevel = $lastLevel;
            $this->idUser = $idUser;
        }
    }
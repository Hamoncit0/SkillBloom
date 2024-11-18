<?php
    class Level{
        public $id;
        public $title;
        public $description;
        public $contentPath;

        
        public function __construct($title = null, $description = null, $contentPath = null, $id = null) {
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->contentPath = $contentPath;
        }
    }
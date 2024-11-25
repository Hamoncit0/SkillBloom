<?php
class Course {
    private $conn;
    private $table_name = "course";

    public $id;
    public $title;
    public $description;
    public $previewImage;
    public $previewVideoPath;
    public $price;
    public $idCategory;
    public $idInstructor;
    public $createdAt;
    public $deletedAt;
    public $levels;
    public $instructor;
    public $category;
    public $progress;
    public $lastLevel;

    public function __construct($id = null, $title = null, $description = null, $previewImage = null, $previewVideoPath = null, $price = null,
                                $idCategory = null, $idInstructor = null, $createdAt = null,  $levels = null, $instructor = null, $category = null, 
                                $deletedAt = null, $progress = null, $lastLevel = null) 
    {
        $this->id = $id ;
        $this->title = $title ;
        $this->description = $description;
        $this->previewImage = $previewImage;
        $this->previewVideoPath = $previewVideoPath;
        $this->price = $price;
        $this->idCategory = $idCategory;
        $this->idInstructor = $idInstructor;
        $this->createdAt = $createdAt;
        $this->levels = $levels;
        $this->instructor = $instructor;
        $this->category = $category;
        $this->deletedAt = $deletedAt;
        $this->progress = $progress;
        $this->lastLevel = $lastLevel;
    }

}
?>

<?php
class Course {
    private $conn;
    private $table_name = "course";

    public $id;
    public $title;
    public $description;
    public $previewImagePath;
    public $previewVideoPath;
    public $price;
    public $idCategory;
    public $idInstructor;
    public $createdAt;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear curso
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET title=:title, description=:description, previewImagePath=:previewImagePath, previewVideoPath=:previewVideoPath, price=:price, idCategory=:idCategory, idInstructor=:idInstructor";

        $stmt = $this->conn->prepare($query);

        // Vincular valores
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":previewImagePath", $this->previewImagePath);
        $stmt->bindParam(":previewVideoPath", $this->previewVideoPath);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":idCategory", $this->idCategory);
        $stmt->bindParam(":idInstructor", $this->idInstructor);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Obtener todos los cursos
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>

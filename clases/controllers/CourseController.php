<?php
include_once '../models/Database.php';
include_once '../models/Course.php';

class CourseController {
    private $db;
    private $course;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->course = new Course($this->db);
    }

    // Crear curso
    public function createCourse($data) {
        $this->course->title = $data['title'];
        $this->course->description = $data['description'];
        $this->course->previewImagePath = $data['previewImagePath'];
        $this->course->previewVideoPath = $data['previewVideoPath'];
        $this->course->price = $data['price'];
        $this->course->idCategory = $data['idCategory'];
        $this->course->idInstructor = $data['idInstructor'];

        if ($this->course->create()) {
            echo "Curso creado correctamente.";
        } else {
            echo "Error al crear el curso.";
        }
    }

    // Obtener todos los cursos
    public function getCourses() {
        $stmt = $this->course->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

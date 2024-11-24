<?php
include_once 'clases/Database.php';
include_once 'clases/entities/Course.php';
include_once 'clases/entities/Level.php';
 

class CourseController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function createCourse($course){
        $query = "CALL register_course(:title, :description, :previewImage, 
                :previewVideoPath, :price, :idCategory, :idInstructor)";
 
        $stmt = $this->db->prepare($query);
 
        $stmt->bindParam(':title', $course->title);
        $stmt->bindParam(':description', $course->description);
        $stmt->bindParam(':previewImage', $course->previewImage);
        $stmt->bindParam(':previewVideoPath', $course->previewVideoPath);
        $stmt->bindParam(':price', $course->price);
        $stmt->bindParam(':idCategory', $course->idCategory);
        $stmt->bindParam(':idInstructor', $course->idInstructor);
        
        if ($stmt->execute()) {
            // Fetch the last inserted ID from the procedure's output
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $idCourse = $result['courseId']; // Return the course ID
        
            return $idCourse;

            $levelsUploaded = createLevel($course->levels);

            if ($levelsUploaded !== false) {
                // Bind levels to the course
                $this->bindLevelToCourse($idCourse, $levelsUploaded);
            } else {
                throw new Exception("Error creating levels.");
            }
            return $idCourse;

        } else {
            return 0; // Handle error if needed
        }
    }

    public function createLevel($levels){
        $idLevels = [];
        $query = "CALL register_level(:title, :description, :contentPath)";

        foreach($levels as $level){
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':title', $level->title);
            $stmt->bindParam(':description', $level->description);
            $stmt->bindParam(':contentPath', $level->contentPath);
    
            if ($stmt->execute()) {
                // Fetch the last inserted ID from the procedure's output
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $idLevels[] = $result['levelId']; // Return the course ID
            } else {
                return false; // Handle error if needed
            }

        }

        return $idLevels;
        
    }

    public function bindLevelToCourse($idCourse, $idLevels) {
        // Convert the levels array into a comma-separated string
        $idLevelsString = implode(',', $idLevels);

        // SQL query for calling the stored procedure
        $query = "CALL register_course_level(:idCourse, :idLevels)";

        $stmt = $this->db->prepare($query);

        // Bind the parameters
        $stmt->bindParam(':idCourse', $idCourse, PDO::PARAM_INT);
        $stmt->bindParam(':idLevels', $idLevelsString, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            throw new Exception("Error binding levels to the course.");
        }
    }

    public function getAllCourses(){
         // Consulta para obtener todos los usuarios
         $query = "SELECT * FROM v_courses WHERE deletedAt IS NULL";
         $stmt = $this->db->prepare($query);
         $stmt->execute();
     
         // Array para almacenar los usuarios
         $courses = [];
     
         // Recuperar los datos de los usuarios y almacenarlos en el array
         // Recuperar los datos de los usuarios y almacenarlos en el array
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             // Crear un nuevo objeto User con los datos de la fila
             $instructor =  $row['firstName'] . ' ' . $row['lastName'];
             
             $courses[] = new Course(
                 $row['id'],
                 $row['title'],
                 $row['description'],
                 $row['previewImage'],
                 $row['previewVideoPath'],
                 $row['price'],
                 $row['idCategory'],
                 $row['idInstructor'],
                 $row['createdAt'],
                 '',
                 $instructor
             );
        }
     
        return $courses;
    }

    public function getAllCoursesByInstructor($id){
         // Consulta para obtener todos los usuarios
         $query = "SELECT * FROM v_courses WHERE idInstructor = :id";
         $stmt = $this->db->prepare($query);
         // Bind the parameters
         $stmt->bindParam(':id', $id);

         $stmt->execute();
     
         // Array para almacenar los usuarios
         $courses = [];
     
         // Recuperar los datos de los usuarios y almacenarlos en el array
         // Recuperar los datos de los usuarios y almacenarlos en el array
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             // Crear un nuevo objeto User con los datos de la fila
             $instructor =  $row['firstName'] . ' ' . $row['lastName'];
             
             $courses[] = new Course(
                 $row['id'],
                 $row['title'],
                 $row['description'],
                 $row['previewImage'],
                 $row['previewVideoPath'],
                 $row['price'],
                 $row['idCategory'],
                 $row['idInstructor'],
                 $row['createdAt'],
                 '',
                 $instructor,
                 '',
                 $row['deletedAt']
             );
        }
     
        return $courses;
    }


    public function getCourseById($id){
        // SQL query for calling the stored procedure
        $query = "SELECT * FROM v_courses_levels WHERE id = :id";

        $stmt = $this->db->prepare($query);

        // Bind the parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $course = null; //para guardar el curso
        $levels = []; //array para guardar los niveles

        //cambiar esto para conseguir cada level
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //me guarda el curso si todavia no lo guarda
            if ($course === null) {
                $instructor = $row['firstName'] . ' ' . $row['lastName'];
                
                $course = new Course(
                    $row['id'],
                    $row['title'],
                    $row['description'],
                    $this->convertBlobToBase64($row['previewImage']),
                    $row['previewVideoPath'],
                    $row['price'],
                    $row['idCategory'],
                    $row['idInstructor'],
                    $row['createdAt'],
                    '', // Este campo parece vacío
                    $instructor,
                    $row['category']
                );
            }

            // Agregar el nivel actual al array de niveles
            $levels[] = new Level(
                $row['levelTitle'],
                $row['levelDescription'],
                $row['contentPath'],
                $row['idLevel']
            );
       }

       if ($course !== null) {
            $course->levels = $levels;
        }

        return $course;

    }

    public function deleteCourse($id){
        $query = "CALL deleteCourse(:id)";

        $stmt = $this->db->prepare($query);

        // Bind the parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
        return false;

    }

    public function getFilteredCourses($title, $category, $review, $priceMax, $priceMin){
        // Construir la consulta con filtros dinámicos
        $query = "SELECT * FROM v_courses WHERE deletedAt IS NULL ";
        
        if ($category) {
            $query .= " AND idCategory = :category";
        }
        if ($priceMax) {
            $query .= " AND price <= :priceMax";
        }
        if ($priceMin) {
            $query .= " AND price >= :priceMin";
        }
        if ($title) {
            $query .= " AND title LIKE :title";
        }

        $stmt = $this->db->prepare($query);
        
        // Asignar valores a los parámetros de la consulta
        if ($category) {
            $stmt->bindParam(':category', $category);
        }
        if ($priceMax) {
            $stmt->bindParam(':priceMax', $priceMax);
        }
        if ($priceMin) {
            $stmt->bindParam(':priceMin', $priceMin);
        }
        if ($title) {
            $title = "%$title%"; // Usar LIKE
            $stmt->bindParam(':title', $title);
        }
        
        $stmt->execute();
    
        // Array para almacenar los usuarios
        $courses = [];
    
        // Recuperar los datos de los usuarios y almacenarlos en el array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $instructor = $row['firstName'] . ' ' . $row['lastName'];

            // Crear un nuevo objeto User con los datos de la fila
            $users[] = new Course(
                $row['id'],
                $row['title'],
                $row['description'],
                $row['previewImage'],
                $row['previewVideoPath'],
                $row['price'],
                $row['idCategory'],
                $row['idInstructor'],
                $row['createdAt'],
                '',
                $instructor,
                $row['name'],
                $row['deletedAt'],
            );
        }


        return $users;
    }

    // Función para convertir Blob a Base64
    private function convertBlobToBase64($blob) {
        if ($blob) {
            return 'data:image/jpeg;base64,' . base64_encode($blob); // Ajusta el tipo MIME según sea necesario
        }
        return null;
    }

}
?>

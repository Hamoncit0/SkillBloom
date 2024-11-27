<?php
include_once 'clases/Database.php';
include_once 'clases/entities/Course.php';
include_once 'clases/entities/Level.php';
include_once 'clases/entities/Sales.php';
include_once 'clases/entities/StudentsPC.php';


class CourseController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function createCourse($course){

        $binaryImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $course->previewImage));

        $query = "CALL register_course(:title, :description, :previewImage, 
                :previewVideoPath, :price, :idCategory, :idInstructor)";
 
        $stmt = $this->db->prepare($query);
 
        $stmt->bindParam(':title', $course->title);
        $stmt->bindParam(':description', $course->description);
        $stmt->bindParam(':previewImage', $binaryImage, PDO::PARAM_LOB);
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

    public function editCourse($course){

        $binaryImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $course->previewImage));

        $query = "CALL UpdateCourse(:id, :title, :description, :previewImage, 
                :previewVideoPath, :price, :idCategory)";
 
        $stmt = $this->db->prepare($query);
 
        $stmt->bindParam(':id', $course->id);
        $stmt->bindParam(':title', $course->title);
        $stmt->bindParam(':description', $course->description);
        $stmt->bindParam(':previewImage', $binaryImage, PDO::PARAM_LOB);
        $stmt->bindParam(':previewVideoPath', $course->previewVideoPath);
        $stmt->bindParam(':price', $course->price);
        $stmt->bindParam(':idCategory', $course->idCategory);
        
        if ($stmt->execute()) {
            // Fetch the last inserted ID from the procedure's output
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return true;

        } else {
            return false; // Handle error if needed
        }
    }
    public function editLevel($level){
        $query = "CALL UpdateLevel(:id, :title, :description, :contentPath)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $level->id);
        $stmt->bindParam(':title', $level->title);
        $stmt->bindParam(':description', $level->description);
        $stmt->bindParam(':contentPath', $level->contentPath);
    
        if ($stmt->execute()) {
            // Fetch the last inserted ID from the procedure's output
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
           return true;
        } else {
            return false; // Handle error if needed
        }

        return false;
        
    }
    public function deleteLevel($id){
        $query = "CALL delete_level(:id)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            // Fetch the last inserted ID from the procedure's output
           return true;
        } else {
            return false; // Handle error if needed
        }

        return false;
        
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

    public function createLevelSingle($level){
        $query = "CALL register_level(:title, :description, :contentPath)";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':title', $level->title);
            $stmt->bindParam(':description', $level->description);
            $stmt->bindParam(':contentPath', $level->contentPath);
    
            if ($stmt->execute()) {
                // Fetch the last inserted ID from the procedure's output
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $idLevel = $result['levelId']; // Return the course ID
            } else {
                return false; // Handle error if needed
            }


        return $idLevel;
        
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

    public function deleteOrder($idCourse) {

        // SQL query for calling the stored procedure
        $query = "CALL delete_order(:idCourse)";

        $stmt = $this->db->prepare($query);

        // Bind the parameters
        $stmt->bindParam(':idCourse', $idCourse, PDO::PARAM_INT);

        if (!$stmt->execute()) {
            throw new Exception("Error binding levels to the course.");
        }
    }

    public function getAllCoursesNotInKardex($id){
         // Consulta para obtener todos los usuarios
         $query = " SELECT v_courses.* FROM v_courses LEFT JOIN kardex ON v_courses.id = kardex.idCourse AND kardex.idUser = :id WHERE kardex.id IS NULL AND deletedAt IS NULL;";
         $stmt = $this->db->prepare($query);
         $stmt->bindParam(':id', $id);
         $stmt->execute();
     
         // Array para almacenar los usuarios
         $courses = [];
     
         // Recuperar los datos de los usuarios y almacenarlos en el array
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             // Crear un nuevo objeto User con los datos de la fila
             $instructor =  $row['firstName'] . ' ' . $row['lastName'];
             $courses[] = new Course(
                 $row['id'],
                 $row['title'],
                 $row['description'],
                 $this->convertBlobToBase64($row['previewImage']),
                 $row['previewVideoPath'],
                 $row['price'],
                 $row['idCategory'],
                 $row['idInstructor'],
                 $row['createdAt'],
                 '',
                 $instructor,
                 '',
                 '',
                 '',
                 '',
                 $row['rating']
             );
        }
     
        return $courses;
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
                 $this->convertBlobToBase64($row['previewImage']),
                 $row['previewVideoPath'],
                 $row['price'],
                 $row['idCategory'],
                 $row['idInstructor'],
                 $row['createdAt'],
                 '',
                 $instructor,
                 '',
                 '',
                 '',
                 '',
                 $row['rating']
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
                 $this->convertBlobToBase64($row['previewImage']),
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

    public function getCourseStadistics($id){
        // SQL query for calling the stored procedure
        $query = "SELECT * FROM v_course_stadistics WHERE id = :id";

        $stmt = $this->db->prepare($query);

        // Bind the parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        //cambiar esto para conseguir cada level
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $course = new Sales();

        $course->id = $row['id'];
        $course->rating = $row['rating'];
        $course->students = $row['enrolledStudents'];
        $course->finishedStudents = $row['finishedStudents'];
        $course->total = $row['total'];
       

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

    public function reviveCoure($id){
        $query = "CALL reviveCourse(:id)";

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

    public function getFilteredCourses($title, $category, $review, $priceMax, $priceMin, $idUser = 0){
        // Construir la consulta con filtros dinámicos
        $query = "SELECT v_courses.* FROM v_courses LEFT JOIN kardex ON v_courses.id = kardex.idCourse AND kardex.idUser = :idUser WHERE  kardex.id IS NULL AND deletedAt IS NULL ";
        
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
        $stmt->bindParam(':idUser', $idUser);
        
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
            $courses[] = new Course(
                $row['id'],
                $row['title'],
                $row['description'],
                $this->convertBlobToBase64($row['previewImage']),
                $row['previewVideoPath'],
                $row['price'],
                $row['idCategory'],
                $row['idInstructor'],
                $row['createdAt'],
                '',
                $instructor,
                $row['name'],
                $row['deletedAt'],
                '',
                '',
                $row['rating']
            );
        }


        return $courses;
    }

    public function getAllCoursesAdmin(){
         // Consulta para obtener todos los usuarios
         $query = "SELECT * FROM v_courses";
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
                 $this->convertBlobToBase64($row['previewImage']),
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

    public function buyCourse($userId, $total, $paymentMethod, $idCourses){
        $query = "CALL makeASale(:userId, :total, :paymentMethod, 
        :idCourses)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':paymentMethod', $paymentMethod);
        $stmt->bindParam(':idCourses', $idCourses);

        if ($stmt->execute()) {
           return true;
        } else {
            return false; 
        }
    }

    public function getMyCourses($id){
        $query = "SELECT * FROM v_course_with_progress WHERE idUser = :id";
        $stmt = $this->db->prepare($query);
 
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $courses = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crear un nuevo objeto User con los datos de la fila
            $instructor =  $row['firstName'] . ' ' . $row['lastName'];
            
            $courses[] = new Course(
                $row['id'],
                $row['title'],
                $row['description'],
                $this->convertBlobToBase64($row['previewImage']),
                $row['previewVideoPath'],
                $row['price'],
                $row['idCategory'],
                $row['idInstructor'],
                $row['createdAt'],
                '',
                $instructor,
                '',
                $row['deletedAt'],
                $row['progress'],
                $row['lastLevel']
            );
        }
        
        return $courses;
    }

    public function getStudentsPerCourse($id){
        $query = "SELECT * FROM v_students_per_course WHERE id = :id";
        $stmt = $this->db->prepare($query);
 
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $studentsPerCourse = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crear un nuevo objeto User con los datos de la fila
            $name =  $row['firstName'] . ' ' . $row['lastName'];
            
            $studentsPerCourse[] = new StudentsPC(
                $row['id'],
                $name,
                $row['title'],
                $row['progress'],
                $row['enrolledAt'],
                $row['status'],
                $row['price'],
                $row['name']
            );
        }
        
        return $studentsPerCourse;
    }

    public function getSalesSummary($id){
        $query = "SELECT * FROM v_sales_summary WHERE idInstructor = :id";
        $stmt = $this->db->prepare($query);
 
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $sales = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            $sales[] = new Sales(
                $row['idInstructor'],
                $row['title'],
                $row['students'],
                $row['rating'],
                $row['price'],
                $row['per_month'],
                $row['total']
            );
        }
        
        return $sales;
    }

    public function getLevelInfo($levelOrder, $idCourse) {
        $query = "SELECT * FROM v_getLevelContent WHERE levelOrder = :levelOrder AND idCourse = :idCourse";
        $stmt = $this->db->prepare($query);
    
        $stmt->bindParam(':levelOrder', $levelOrder, PDO::PARAM_INT);
        $stmt->bindParam(':idCourse', $idCourse, PDO::PARAM_INT);
        $stmt->execute();
       
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Verificar si se encontró un resultado
        if (!$result) {
            // Aquí puedes manejar la situación según sea necesario
            // Por ejemplo, lanzar una excepción o devolver null
            throw new Exception("No se encontró información para el nivel con levelOrder={$levelOrder} e idCourse={$idCourse}");
        }
        
        // Crear la instancia del nivel si se encontró el resultado
        $level = new Level(
            $result['title'],
            $result['description'],
            $result['contentPath'],
            $result['id'],
            $result['idInstructor'],
        );
    
        return $level;
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

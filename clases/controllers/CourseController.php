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
        
    }

}
?>

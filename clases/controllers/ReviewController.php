<?php
include_once 'clases/Database.php';
include_once 'clases/entities/Review.php';
 

class ReviewController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function createReview($review){
        $query = "CALL new_review(:idUser, :idCourse, :review, :rating)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':idUser', $review->idUser); 
        $stmt->bindParam(':idCourse', $review->idCourse); 
        $stmt->bindParam(':review', $review->review); 
        $stmt->bindParam(':rating', $review->rating); 
    
        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
        return false;
    }

    public function banReview($id){
        $query = "CALL ban_review(:id)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
        return false;
        
    }

    public function unbanReview($id){
        $query = "CALL unban_review(:id)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
        return false;
    }

    public function getReviews($id){
        // Consulta para obtener todos los usuarios
        $query = "SELECT * FROM v_reviews WHERE deletedAt IS NULL AND idCourse = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    
        // Array para almacenar los usuarios
        $reviews = [];
    
        // Recuperar los datos de los usuarios y almacenarlos en el array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $fullName =  $row['firstName'] . ' ' .  $row['lastName'];
            // Crear un nuevo objeto User con los datos de la fila
            $reviews[] = new Review(
                $row['id'],
                $row['idUser'],
                $row['idCourse'],
                $row['review'],
                $row['rating'],
                $row['createdAt'],
                $row['deletedAt'],
                $fullName,
                $this->convertBlobToBase64($row['pfp'])
            );
        }
    
        return $reviews;
    }
    
    public function getReviewsAdmin(){
        // Consulta para obtener todos los usuarios
        $query = "SELECT * FROM v_reviews";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        // Array para almacenar los usuarios
        $reviews = [];
    
        // Recuperar los datos de los usuarios y almacenarlos en el array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $fullName =  $row['firstName'] . ' ' .  $row['lastName'];
            // Crear un nuevo objeto User con los datos de la fila
            $reviews[] = new Review(
                $row['id'],
                $row['idUser'],
                $row['idCourse'],
                $row['review'],
                $row['rating'],
                $row['createdAt'],
                $row['deletedAt'],
                $fullName,
                $this->convertBlobToBase64($row['pfp'])
            );
        }
    
        return $reviews;
    }
    // Función para convertir Blob a Base64
    private function convertBlobToBase64($blob) {
        if ($blob) {
            return 'data:image/jpeg;base64,' . base64_encode($blob); // Ajusta el tipo MIME según sea necesario
        }
        return null;
    }
}
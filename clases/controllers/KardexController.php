<?php
include_once 'clases/Database.php';
include_once 'clases/entities/KardexLine.php';
include_once 'clases/entities/Course.php';

class KardexController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getUserKardex($id){
        $query = "SELECT * FROM v_kardex WHERE idUser = :id";
        $stmt = $this->db->prepare($query);
 
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $kardex = [];
     
        // Recuperar los datos de los usuarios y almacenarlos en el array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crear un nuevo objeto User con los datos de la fila
            $instructor =  $row['firstName'] . ' ' . $row['lastName'];
            
            $kardex[] = new KardexLine(
                $row['id'],
                $row['title'],
                $instructor,
                $row['category'],
                $row['progress'],
                $row['enrolledAt'],
                $row['lastEntry'],
                $row['endDate'],
                $row['status'],
                $row['idCourse'],
                $row['lastLevel'],
                $row['idUser']
            );
       }
    
       return $kardex;
    }

}
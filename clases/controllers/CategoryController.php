<?php
include_once 'clases/Database.php';
include_once 'clases/entities/Category.php';
 

class CategoryController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function createCategory($name, $description){
        $query = "CALL create_category(:name, :description)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':name', $name); 
        $stmt->bindParam(':description', $description); 
    
        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
        return false;
    }

    public function updateCategory($id, $name, $description){
        $query = "CALL update_category(:id, :name, :description)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name); 
        $stmt->bindParam(':description', $description); 
    
        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
        return false;
        
    }

    public function deleteCategory($id){
        $query = "CALL delete_category(:id)";
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

    public function getCategories(){
        // Consulta para obtener todos los usuarios
        $query = "SELECT * FROM v_categories";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        // Array para almacenar los usuarios
        $categories = [];
    
        // Recuperar los datos de los usuarios y almacenarlos en el array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crear un nuevo objeto User con los datos de la fila
            $categories[] = new Category(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['createdAt'],
                $row['deletedAt'],

            );
        }
    
        return $categories;
    }
}
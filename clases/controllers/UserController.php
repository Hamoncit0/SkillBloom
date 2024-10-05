<?php
include_once 'clases/Database.php';
include_once 'clases/entities/User.php';

class UserController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Crear usuario
    public function createUser($user) {
        $query = "INSERT INTO user (firstName, lastName, email, gender, password, birthdate, idRol) 
                  VALUES (:firstName, :lastName, :email, :gender, :password, :birthdate, :idRol)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':firstName', $user->firstName);
        $stmt->bindParam(':lastName', $user->lastName);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':gender', $user->gender);
        $stmt->bindParam(':password', $user->password);
        $stmt->bindParam(':birthdate', $user->birthdate);
        $stmt->bindParam(':idRol', $user->idRol);

        return $stmt->execute();
    }

    public function getUser($email, $password) {
        $query = "SELECT * FROM user WHERE email = :email AND password = :password";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // Si se encuentra el usuario, crea una instancia de User y asigna las propiedades
        if ($result) {
            $newUser = new User();
            $newUser->id = $result['id'];
            $newUser->firstName = $result['firstName'];
            $newUser->lastName = $result['lastName'];
            $newUser->email = $result['email'];
            $newUser->gender = $result['gender'];
            $newUser->password = $result['password'];  // Esto no es recomendable devolverlo tal cual
            $newUser->birthdate = $result['birthdate'];
            $newUser->pfpPath = $result['pfpPath'];
            $newUser->idRol = $result['idRol'];
            $newUser->status = $result['status'];
            $newUser->createdAt = $result['createdAt'];
            $newUser->updatedAt = $result['updatedAt'];
            $newUser->deletedAt = $result['deletedAt'];

            return $newUser;
        } else {
            return null;  // Devuelve null si no se encuentra el usuario
        }
    }
}
?>

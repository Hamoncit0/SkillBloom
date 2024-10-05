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
    public function signUp($user) {
        $query = "CALL register_user(:firstName, :lastName, :email, :gender, :password, :birthdate, :idRol)";

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

    public function logIn($email, $password) {
        $query = "CALL login_user(:email, :password);";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si el resultado contiene el id del usuario y si está activo
        if (isset($result['id']) && $result['status'] === 'activo') {
            // El usuario está activo, procedemos a obtener la información completa
            $query = "CALL getinfo_user(:id);";
        
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $result['id']);

            $stmt->execute();
            $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

            // Crear y devolver la instancia del usuario con la información completa
            if ($userInfo) {
                $newUser = new User();
                $newUser->id = $userInfo['id'];
                $newUser->firstName = $userInfo['firstName'];
                $newUser->lastName = $userInfo['lastName'];
                $newUser->email = $userInfo['email'];
                $newUser->gender = $userInfo['gender'];
                $newUser->birthdate = $userInfo['birthdate'];
                $newUser->pfpPath = $userInfo['pfpPath'];
                $newUser->idRol = $userInfo['idRol'];
                $newUser->status = $userInfo['status'];
                $newUser->createdAt = $userInfo['createdAt'];
                $newUser->updatedAt = $userInfo['updatedAt'];
                $newUser->deletedAt = $userInfo['deletedAt'];

                return $newUser;
            } else {
                return null;  // Error al obtener la información completa del usuario
            }
        } elseif (isset($result['status']) && $result['status'] === 'inactivo') {
            // El usuario está inactivo, devolver el mensaje o manejarlo como prefieras
            return 'Usuario inactivo';
        } else {
            return null;  // Devuelve null si no se encuentra el usuario o no está activo
        }
    }
}
?>

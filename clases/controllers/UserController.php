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

       
 
        try {
            return $stmt->execute();  // true si fue exitoso, false si falló
        } catch (PDOException $e) {
            // Loguea el error o maneja la excepción según sea necesario
            error_log("Error al registrar usuario: " . $e->getMessage());
            return false;
        }
    }
 
    public function logIn($email, $password) {
        $query = "CALL login_user(:email, :password);";
       
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
 
        $stmt->execute();
 
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // Verificar si el resultado contiene el id del usuario y si está activo
        if (isset($result['userId']) ) {
            // El usuario está activo, procedemos a obtener la información completa
            $query = "CALL getinfo_user(:id);";
       
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $result['userId']);

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
                $newUser->pfpPath = $this->convertBlobToBase64($userInfo['pfp']);
                $newUser->idRol = $userInfo['idRol'];
                $newUser->status = $userInfo['status'];
                $newUser->createdAt = $userInfo['createdAt'];
                $newUser->updatedAt = $userInfo['updatedAt'];
                $newUser->deletedAt = $userInfo['deletedAt'];
 
                return $newUser;
            } else {
                return null;  // Error al obtener la información completa del usuario
            }
        } elseif (isset($result['status']) && $result['status'] === 'blocked') {
            // El usuario está inactivo, devolver el mensaje o manejarlo como prefieras
            return 'Usuario inactivo';
        } else {
            return null;  // Devuelve null si no se encuentra el usuario o no está activo
        }
    }

    public function getUserById($id) {
        $query = "CALL getinfo_user(:id);"; // Asegúrate de que este llamado sea correcto
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
        $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        if($userInfo){
            $newUser = new User();
            $newUser->id = $userInfo['id'];
            $newUser->firstName = $userInfo['firstName'];
            $newUser->lastName = $userInfo['lastName'];
            $newUser->email = $userInfo['email'];
            $newUser->gender = $userInfo['gender'];
            $newUser->birthdate = $userInfo['birthdate'];
            $newUser->pfpPath = $this->convertBlobToBase64($userInfo['pfp']);
            $newUser->idRol = $userInfo['idRol'];
            $newUser->status = $userInfo['status'];
            $newUser->createdAt = $userInfo['createdAt'];
            $newUser->updatedAt = $userInfo['updatedAt'];
            $newUser->deletedAt = $userInfo['deletedAt'];
 
            return $newUser;// Retorna los datos del usuario
        }
        else{
            return null;
        }
    }
    public function getAllUsers() {
        // Consulta para obtener todos los usuarios
        $query = "SELECT * FROM v_users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        // Array para almacenar los usuarios
        $users = [];
    
        // Recuperar los datos de los usuarios y almacenarlos en el array
        // Recuperar los datos de los usuarios y almacenarlos en el array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crear un nuevo objeto User con los datos de la fila
            $users[] = new User(
                $row['firstName'],
                $row['lastName'],
                $row['email'],
                '',
                $row['birthdate'],
                $row['gender'],
                $row['id'],
                $row['idRol'],
                $row['pfp'],
                $row['status'],
                $row['createdAt'],
                $row['updatedAt'],
                $row['deletedAt']
            );
        }
    
        return $users;
    }

    public function getFilteredUsers($status, $role, $sort, $email) {
        // Construir la consulta con filtros dinámicos
        $query = "SELECT * FROM v_users WHERE 1";
        
        if ($status) {
            $query .= " AND status = :status";
        }
        if ($role) {
            $query .= " AND idRol = :role";
        }
        if ($email) {
            $query .= " AND email LIKE :email";
        }
        
        // Ordenar los resultados
        if ($sort) {
            switch ($sort) {
                case '1':
                    $query .= " ORDER BY email ASC";  // A-z
                    break;
                case '2':
                    $query .= " ORDER BY email DESC"; // z-A
                    break;
                case '3':
                    $query .= " ORDER BY updatedAt DESC"; // Last Entry Date
                    break;
            }
        }

        $stmt = $this->db->prepare($query);
        
        // Asignar valores a los parámetros de la consulta
        if ($status) {
            $stmt->bindParam(':status', $status);
        }
        if ($role) {
            $stmt->bindParam(':role', $role);
        }
        if ($email) {
            $email = "%$email%"; // Usar LIKE
            $stmt->bindParam(':email', $email);
        }
        
        $stmt->execute();
    
        // Array para almacenar los usuarios
        $users = [];
    
        // Recuperar los datos de los usuarios y almacenarlos en el array
        // Recuperar los datos de los usuarios y almacenarlos en el array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Crear un nuevo objeto User con los datos de la fila
            $users[] = new User(
                $row['firstName'],
                $row['lastName'],
                $row['email'],
                '',
                $row['birthdate'],
                $row['gender'],
                $row['id'],
                $row['idRol'],
                $row['pfp'],
                $row['status'],
                $row['createdAt'],
                $row['updatedAt'],
                $row['deletedAt']
            );
        }


        return $users;
    }

    public function updateUser($user) {
        $query = "CALL update_user(:id, :firstName, :lastName, :gender, :birthdate)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $user->id);
        $stmt->bindParam(':firstName', $user->firstName);
        $stmt->bindParam(':lastName', $user->lastName);
        $stmt->bindParam(':gender', $user->gender);
        $stmt->bindParam(':birthdate', $user->birthdate);
        
        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
    }
    public function changePassword($id, $password){
        $query = "CALL change_password(:id, :password)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
    }

    public function changePfp($id, $picture){
        // Decodificar el Base64 a binario
        $binaryImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $picture));
        
        $query = "CALL change_pfp(:id, :picture)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':picture', $binaryImage, PDO::PARAM_LOB);  // Usamos PARAM_LOB para datos binarios
    
        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
        return false;
    }
    public function changeStatus($id, $status){

        $query = "CALL change_userStatus(:id, :status)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status);  // Usamos PARAM_LOB para datos binarios
    
        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo()); // Mostrar errores
            return false; 
        }
        return false;
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
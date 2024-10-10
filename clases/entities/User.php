<?php
class User {
 
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $gender;
    public $password;
    public $birthdate;
    public $pfpPath;
    public $idRol;
    public $status;
    public $createdAt;
    public $updatedAt;
    public $deletedAt;

    //constructor signup
    function __construct($firstName = null, $lastName = null, $email = null, $password = null, $birthdate = null, $gender = null, $rol = null) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
        $this->idRol = $rol;
    }
 
}
?>
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
    public $tries;
    //constructor signup
    function __construct($firstName = null, $lastName = null, $email = null, $password = null, 
                         $birthdate = null, $gender = null, $id = null, $rol = null, $pfpPath=null, 
                         $status= null, $createdAt = null, $updatedAt = null, $deletedAt = null,
                         $tries = 0 ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
        $this->pfpPath = $pfpPath;
        $this->idRol = $rol;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
        $this->tries = $tries;
    }
 
}
?>
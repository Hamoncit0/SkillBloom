<?php
class StudentsPC {
    private $conn;

    public $id;
    public $name;
    public $course;
    public $progress;
    public $inscriptionDate;
    public $state;
    public $total;
    public $paymentMethod;

    public function __construct($id = null, $name = null, $course = null, $progress = null, $inscriptionDate = null, $state = null, $total = null, $paymentMethod = null) 
    {
        $this->id = $id ;
        $this->name = $name ;
        $this->course = $course ;
        $this->progress = $progress ;
        $this->inscriptionDate = $inscriptionDate ;
        $this->state = $state;
        $this->total = $total;
        $this->paymentMethod = $paymentMethod;
    }

}
?>

<?php
class Sales {
    private $conn;

    public $id;
    public $course;
    public $students;
    public $rating;
    public $price;
    public $month;
    public $total;

    public function __construct($id = null, $course = null, $students = null, $rating = null, $price = null, $month = null, $total = null) 
    {
        $this->id = $id;
        $this->course = $course ;
        $this->students = $students ;
        $this->rating = $rating ;
        $this->price = $price;
        $this->month = $month;
        $this->total = $total;
    }

}
?>

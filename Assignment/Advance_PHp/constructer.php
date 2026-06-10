<?php

// Question:
// Create a class with a constructor that initializes properties when an object is created.

// Class with constructor
class Student
{
    public $name;
    public $age;

    // constructor method
    public function __construct($name, $age)
    {
        // initializing properties
        $this->name = $name;
        $this->age = $age;
    }

    // method to display data
    public function show()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
    }
}

// creating object and passing values to constructor
$obj = new Student("Rahul", 20);

// calling method
$obj->show();

?>
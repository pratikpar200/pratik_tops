<?php

// Question:
// Write a PHP script to create a class representing a "Car" with properties like make, model, and year, and a method to display the car details.

// Class representing Car
class Car
{
    // properties of car
    public $make;
    public $model;
    public $year;

    // method to set car details
    public function setCarDetails($make, $model, $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // method to display car details
    public function displayCarDetails()
    {
        echo "Car Make: " . $this->make . "<br>";
        echo "Car Model: " . $this->model . "<br>";
        echo "Car Year: " . $this->year . "<br>";
    }
}

// creating object of Car class
$car1 = new Car();

// setting values
$car1->setCarDetails("Toyota", "Fortuner", 2023);

// displaying values
$car1->displayCarDetails();

?>
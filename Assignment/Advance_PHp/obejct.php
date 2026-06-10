<?php

// Question:
// Instantiate multiple objects of the "Car" class and demonstrate how to access their properties and methods

// Class representing Car
class Car
{
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
        echo "Car Year: " . $this->year . "<br><br>";
    }
}

// creating first object of Car class
$car1 = new Car();
$car1->setCarDetails("Toyota", "Fortuner", 2023);
$car1->displayCarDetails();

// creating second object of Car class
$car2 = new Car();
$car2->setCarDetails("Honda", "City", 2022);
$car2->displayCarDetails();

// creating third object of Car class
$car3 = new Car();
$car3->setCarDetails("BMW", "X5", 2024);
$car3->displayCarDetails();

?>
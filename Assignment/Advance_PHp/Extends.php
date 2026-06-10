<?php

// Question:
// Create a "Vehicle" class and extend it with a "Car" class. Include properties and methods in both classes, demonstrating inherited behavior.

// Parent class
class Vehicle
{
    public $brand;
    public $type;

    // method of parent class
    public function setVehicle($brand, $type)
    {
        $this->brand = $brand;
        $this->type = $type;
    }

    // method to display vehicle details
    public function showVehicle()
    {
        echo "Brand: " . $this->brand . "<br>";
        echo "Type: " . $this->type . "<br>";
    }
}

// Child class (inheritance)
class Car extends Vehicle
{
    public $model;
    public $year;

    // method of child class
    public function setCar($model, $year)
    {
        $this->model = $model;
        $this->year = $year;
    }

    // method to display car details (uses parent + child data)
    public function showCar()
    {
        // calling parent method
        $this->showVehicle();

        echo "Model: " . $this->model . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
}

// creating object of child class
$car1 = new Car();

// setting parent class data
$car1->setVehicle("Toyota", "SUV");

// setting child class data
$car1->setCar("Fortuner", 2023);

// displaying all data
$car1->showCar();

?>
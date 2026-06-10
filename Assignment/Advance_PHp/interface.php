<?php

// Question:
// Define an interface named VehicleInterface with methods like start(), stop(),
// and implement this interface in multiple classes

// Interface definition
interface VehicleInterface
{
    public function start();
    public function stop();
}

// First class implementing interface
class Car implements VehicleInterface
{
    public function start()
    {
        echo "Car is starting<br>";
    }

    public function stop()
    {
        echo "Car is stopping<br>";
    }
}

// Second class implementing interface
class Bike implements VehicleInterface
{
    public function start()
    {
        echo "Bike is starting<br>";
    }

    public function stop()
    {
        echo "Bike is stopping<br>";
    }
}

// creating objects
$car = new Car();
$car->start();
$car->stop();

echo "<br>";

$bike = new Bike();
$bike->start();
$bike->stop();

?>
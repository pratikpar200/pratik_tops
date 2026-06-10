
<?php

// Question:
// Create a simple class in PHP that demonstrates encapsulation by using private and public properties and methods.

// Simple class to demonstrate Encapsulation in PHP

class Student
{
    // private properties (data hiding)
    private $name;
    private $age;

    // public method to set data (setter method)
    public function setData($name, $age)
    {
        // assigning values to private properties
        $this->name = $name;
        $this->age = $age;
    }

    // public method to get name (getter method)
    public function getName()
    {
        return $this->name;
    }

    // public method to get age (getter method)
    public function getAge()
    {
        return $this->age;
    }
}

// creating object of class
$obj = new Student();

// setting values using public method
$obj->setData("Rahul", 20);

// displaying values using getter methods
echo "Name: " . $obj->getName() . "<br>";
echo "Age: " . $obj->getAge();

?>

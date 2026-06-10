
<?php

// Question:
// Create a class that uses magic methods to handle property access and modification dynamically.

// Class using magic methods
class Student
{
    // private property (not directly accessible)
    private $data = [];

    // magic method for setting property value
    public function __set($name, $value)
    {
        // storing data dynamically in array
        $this->data[$name] = $value;
    }

    // magic method for getting property value
    public function __get($name)
    {
        // returning value if exists, otherwise null
        return isset($this->data[$name]) ? $this->data[$name] : "Property not found";
    }
}

// creating object
$obj = new Student();

// setting properties dynamically
$obj->name = "Rahul";
$obj->age = 20;

// getting properties dynamically
echo "Name: " . $obj->name . "<br>";
echo "Age: " . $obj->age;

?>

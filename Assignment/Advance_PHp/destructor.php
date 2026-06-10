
<?php

// Question:
// Write a class that implements a destructor to perform cleanup tasks when an object is destroyed.

// Class with constructor and destructor
class Demo
{
    public $name;

    // constructor method
    public function __construct($name)
    {
        $this->name = $name;
        echo "Object Created: " . $this->name . "<br>";
    }

    // destructor method (cleanup task)
    public function __destruct()
    {
        echo "Object Destroyed: " . $this->name . "<br>";
    }
}

// creating object
$obj = new Demo("Test Object");

// object will be automatically destroyed at end of script

?>


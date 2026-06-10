<?php

// Question:
// Write a class that shows examples of each visibility type and how they restrict access to properties and methods.

// Class demonstrating visibility types
class Demo
{
    // public property (accessible everywhere)
    public $publicVar = "I am Public";

    // private property (accessible only inside class)
    private $privateVar = "I am Private";

    // protected property (accessible in class and child class)
    protected $protectedVar = "I am Protected";

    // public method
    public function showPublic()
    {
        echo "Public Method Accessing Public Var: " . $this->publicVar . "<br>";
    }

    // private method
    private function showPrivate()
    {
        echo "Private Method: " . $this->privateVar . "<br>";
    }

    // protected method
    protected function showProtected()
    {
        echo "Protected Method: " . $this->protectedVar . "<br>";
    }

    // public function to access private and protected methods internally
    public function accessInside()
    {
        $this->showPrivate();
        $this->showProtected();
    }
}

// Child class to show protected access
class ChildDemo extends Demo
{
    public function showChildAccess()
    {
        echo "Child accessing protected var: " . $this->protectedVar . "<br>";
        $this->showProtected();
    }
}

// creating object
$obj = new Demo();

// accessing public property and method
echo $obj->publicVar . "<br>";
$obj->showPublic();

// accessing private and protected via public method
$obj->accessInside();

echo "<br>";

// child class object
$child = new ChildDemo();
$child->showChildAccess();

?>
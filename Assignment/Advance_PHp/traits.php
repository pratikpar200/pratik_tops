<?php

// Question:
// Create two traits and use them in a class to demonstrate how to include multiple behaviors.

// First trait
trait MessageTrait
{
    public function showMessage()
    {
        echo "Hello from Message Trait<br>";
    }
}

// Second trait
trait LogTrait
{
    public function logMessage()
    {
        echo "Logging from Log Trait<br>";
    }
}

// Class using multiple traits
class User
{
    use MessageTrait;
    use LogTrait;

    public function userInfo()
    {
        echo "User information method<br>";
    }
}

// creating object
$obj = new User();

// calling methods from both traits and class
$obj->showMessage();
$obj->logMessage();
$obj->userInfo();

?>
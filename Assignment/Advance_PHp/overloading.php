
<?php

// Question:
// Create a class that demonstrates method overloading by defining multiple methods with the same name but different parameters.

// Note:
// PHP does not support method overloading directly like Java/C++,
// but we can achieve it using a special magic method __call()

class Calculator
{
    // magic method to handle method overloading
    public function __call($name, $arguments)
    {
        // checking method name
        if ($name == "add")
        {
            // if 2 arguments are passed
            if (count($arguments) == 2)
            {
                return $arguments[0] + $arguments[1];
            }

            // if 3 arguments are passed
            if (count($arguments) == 3)
            {
                return $arguments[0] + $arguments[1] + $arguments[2];
            }
        }
    }
}

// creating object
$obj = new Calculator();

// calling same method with different number of parameters
echo "Sum of 2 numbers: " . $obj->add(10, 20) . "<br>";
echo "Sum of 3 numbers: " . $obj->add(10, 20, 30);

?>


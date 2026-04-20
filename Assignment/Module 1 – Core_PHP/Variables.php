<?php
// 3) LAB EXERCISE:
// Create a PHP script to declare and initialize different types of variables (integer, float, string, boolean). Display them using echo.

// Integer
$age = 20;

// Float
$price = 99.99;

// String
$name = "Darshan";

// Boolean
$isStudent = true;

echo "<h3>PHP Variables</h3>";

// Display values
echo "Age (Integer): " . $age . "<br>";
echo "Price (Float): $" . $price . "<br>";
echo "Name (String): " . $name . "<br>";
// Boolean values print as 1 for true, "" for false. Using ternary for better visibility.
echo "Is Student (Boolean): " . ($isStudent ? 'Yes/True' : 'No/False') . "<br>";
?>

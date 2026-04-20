<?php
// 7. If Condition and If-Else If 
// LAB EXERCISE: Write a PHP program to determine if a number is even or odd using if conditions

$number = 7; // Try changing this number

echo "<h3>Even or Odd Checker</h3>";
echo "Number: $number <br>";

if (is_numeric($number)) { // Optimization: check if valid number first
    if ($number % 2 == 0) {
        echo "<strong>Result:</strong> The number is Even";
    } else {
        echo "<strong>Result:</strong> The number is Odd";
    }
} else {
    echo "<strong>Result:</strong> Invalid Input. Please provide a valid number.";
}
?>

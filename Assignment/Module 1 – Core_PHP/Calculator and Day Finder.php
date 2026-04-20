<?php
// 8. Practical Example: Calculator and Day Finder
// LAB EXERCISE

// 1. Simple Calculator: Create a calculator using if-else conditions that takes two inputs and an operator (+, -, *, /)

$num1 = 10;
$num2 = 5;
$operator = "+";  // change +, -, *, /

echo "<h3>Calculator</h3>";
if ($operator == "+") {
    echo "Result: " . ($num1 + $num2);
} elseif ($operator == "-") {
    echo "Result: " . ($num1 - $num2);
} elseif ($operator == "*") {
    echo "Result: " . ($num1 * $num2);
} elseif ($operator == "/") {
    if ($num2 != 0) {
        echo "Result: " . ($num1 / $num2);
    } else {
        echo "Cannot divide by zero";
    }
} else {
    echo "Invalid Operator";
}

echo "<hr>";

// 2. Day Finder: Write a script that finds the current day. If it is Sunday, print "Happy Sunday".
echo "<h3>Day Finder</h3>";
if (date("l") == "Sunday") {
    echo "Happy Sunday";
} else {
    echo "Today is " . date("l") . ", not Sunday";
}
?>

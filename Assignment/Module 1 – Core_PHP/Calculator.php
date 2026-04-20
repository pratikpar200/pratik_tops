<?php
// 15. Practical Example: Calculator, Factorial, String Reverse 
// LAB EXERCISE: 

// 1. Calculator: Create a calculator using user-defined functions.
function calculator($a, $b, $op) {
    if ($op == "+") return $a + $b;
    elseif ($op == "-") return $a - $b;
    elseif ($op == "*") return $a * $b;
    elseif ($op == "/") return ($b != 0) ? $a / $b : "Cannot divide by zero";
    else return "Invalid Operator";
}

echo "<h3>1. Calculator Function</h3>";
echo "Result: " . calculator(10, 5, "+");

// 2. Factorial: Write a function that finds the factorial of a number using recursion.
function factorial($n) {
    if ($n < 0) return "Invalid input"; // Handle negative numbers
    if ($n == 0 || $n == 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

echo "<h3>2. Factorial Function</h3>";
echo "Factorial of 5 = " . factorial(5);

// 3. String Reverse: Reverse a string without using built-in functions.
$str = "Hello";
$rev = "";

// Ensure string length logic handles multi-byte/standard properly, but keeping simple for this exercise
for ($i = strlen($str) - 1; $i >= 0; $i--) {
    $rev .= $str[$i];
}

echo "<h3>3. String Reverse</h3>";
echo "Original: $str <br>";
echo "Reversed String: " . $rev;

// 4. Download File: Create a button that allows users to download a file.
echo "<h3>4. File Download</h3>";
?>
<!DOCTYPE html>
<html>
<body>
    <!-- Standard HTML5 approach for download link styled as button -->
    <a href="sample.txt" download style="padding: 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; display: inline-block;">Download File</a>
</body>
</html>

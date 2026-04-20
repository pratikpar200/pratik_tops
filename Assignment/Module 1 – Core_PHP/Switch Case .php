<?php
// 9. Switch Case and Ternary Operator
// LAB EXERCISE: 

// 1. Restaurant Food Category Program: Use a switch case to display the category (Starter/Main Course/Dessert) and dish based on user selection.
$food = "pizza"; 

echo "<h3>1. Restaurant Food Category Program</h3>";
switch (strtolower($food)) { // Added strtolower for robustness
    case "soup":
        echo "Food: $food -> Category: Starter";
        break;
    case "pizza":
        echo "Food: $food -> Category: Main Course";
        break;
    case "icecream":
        echo "Food: $food -> Category: Dessert";
        break;
    default:
        echo "Invalid Food";
}

echo "<hr>";

// 2. Ternary Operator Example: Write a script using the ternary operator to display a message if the age is greater than 18.
$age = 20;

echo "<h3>2. Ternary Operator Example</h3>";
echo "Age: $age -> ";
echo ($age >= 18) ? "You are an Adult" : "You are a Minor"; // Updated to >= 18.

echo "<hr>";

// 3. Color Selector: Write a program to display the name of a color based on user input.
$color = "red"; 

echo "<h3>3. Color Selector</h3>";
switch (strtolower($color)) { // Added strtolower for robustness
    case "red":
        echo "You selected <span style='color:red;'>Red</span> color";
        break;
    case "green":
        echo "You selected <span style='color:green;'>Green</span> color";
        break;
    case "blue":
        echo "You selected <span style='color:blue;'>Blue</span> color";
        break;
    default:
        echo "Invalid Color";
}
?>

<?php
// 11) LAB EXERCISE
echo "<h3>Q1. Display the value of an array.</h3>";

$arr1 = array(10, 20, 30, 40);
foreach ($arr1 as $value) {
    echo $value . " ";
}

echo "<h3>Q2. Find and display the number of odd and even elements in an array.</h3>";

$arr2 = array(1, 2, 3, 4, 5, 6);
$even = 0;
$odd = 0;

foreach ($arr2 as $num) {
    if ($num % 2 == 0) {
        $even++;
    } else {
        $odd++;
    }
}

echo "Even = " . $even . "<br>";
echo "Odd = " . $odd;

echo "<h3>Q3. Create an associative array for user details (name, email, age) and display them.</h3>";

$user = array(
    "name" => "Darshan",
    "email" => "darshan@gmail.com",
    "age" => 20
);

// Escaping output to prevent potential XSS if data was user-supplied
echo "Name: " . htmlspecialchars($user["name"]) . "<br>";
echo "Email: " . htmlspecialchars($user["email"]) . "<br>";
echo "Age: " . htmlspecialchars($user["age"]);

echo "<h3>Q4. Write a script to shift all zero values to the bottom of an array.</h3>";

$arr3 = array(0, 1, 0, 3, 12, 0, 5);
$result = array();
$zeros = array();

foreach ($arr3 as $value) {
    if ($value === 0) { // Strict comparison is better
        $zeros[] = $value;
    } else {
        $result[] = $value;
    }
}

$final = array_merge($result, $zeros);

foreach ($final as $v) {
    echo $v . " ";
}
?>
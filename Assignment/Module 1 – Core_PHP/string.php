<?php
// 16) LAB EXERCISE:
// Write a script to perform various string operations like concatenation, substring extraction, and string length check.

$str1 = "Hello";
$str2 = "World";

echo "<h3>String Operations</h3>";

// Concatenation
echo "Concatenation: " . $str1 . " " . $str2 . "<br>";

// String Length
echo "Length of '$str1': " . strlen($str1) . "<br>";
echo "Length of '$str2': " . strlen($str2) . "<br>";

// Substring (Extracts from World, starts at 0, 3 characters: "Wor")
echo "Substring (from '$str2', 0, 3): " . substr($str2, 0, 3) . "<br>";

// Additional useful operation: strtolower and strtoupper
echo "Uppercase: " . strtoupper($str1) . "<br>";
echo "Lowercase: " . strtolower($str2) . "<br>";

?>

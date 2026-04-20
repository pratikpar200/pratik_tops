<?php
// 14) LAB EXERCISE: Use include and require to insert common header and footer files into multiple PHP pages.
// Here we are creating dummy files temporarily to prevent errors if they don't exist.

// Simulating header.php creation dynamically for the sake of the exercise
file_put_contents('header.php', '<html><body><h2>My Website Header</h2><hr>');

// Simulating footer.php creation dynamically
file_put_contents('footer.php', '<hr><h3>My Website Footer</h3></body></html>');

// main.php logic
echo "<h3>Demonstrating Include and Require</h3>";

// require stops execution with a fatal error if file is not found
require "header.php";

echo "<p>This is the main content area of the webpage.</p>";

// include throws a warning but continues execution if file is not found
include "footer.php";

echo "<br><small>Note: header.php and footer.php were auto-generated to demonstrate this.</small>";
?>

<?php
// 12. PHP Date-Time Function
// LAB EXERCISE: Write a script to display the current date and time in different formats

// Set timezone (Best Practice)
date_default_timezone_set('Asia/Kolkata');

echo "<h3>PHP Date-Time Formats</h3>";
echo "Default Date & Time: " . date("Y-m-d H:i:s") . "<br>";
echo "Date (DD-MM-YYYY): " . date("d-m-Y") . "<br>";
echo "Date (Month Day, Year): " . date("M d, Y") . "<br>";
echo "Time (12-hour format): " . date("h:i:s A") . "<br>";
echo "Day: " . date("l");
?>

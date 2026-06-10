<?php

// Question:
// Write a function that sanitizes email input and validates it before sending.

// function to sanitize and validate email
function checkEmail($email)
{
    // remove unwanted spaces and characters
    $email = trim($email);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);

    // validate email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Valid Email: " . $email;
    } else {
        echo "Invalid Email";
    }
}

// example input
$email = "  test@example.com  ";

// calling function
checkEmail($email);

?>
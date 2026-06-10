<?php

// Question:
// Write a script to establish a database connection and handle any errors during the connection process.

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "test_db";

// creating connection using mysqli
$conn = new mysqli($host, $username, $password, $database);

// checking connection error
if ($conn->connect_error) {
    // error handling
    die("Database Connection Failed: " . $conn->connect_error);
} else {
    echo "Database Connected Successfully";
}

// closing connection
$conn->close();

?>
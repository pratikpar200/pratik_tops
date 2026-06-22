<?php
// config/db.php
// Beginner-friendly Core PHP database connection using mysqli.

// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "smartstore_db";

// Helper function to send standard JSON responses consistently
if (!function_exists('sendResponse')) {
    function sendResponse($statusCode, $status, $message, $data = null) {
        // Clear any previous output to ensure pure JSON response
        if (ob_get_length()) {
            ob_clean();
        }
        
        http_response_code($statusCode);
        header('Content-Type: application/json');
        
        $response = [
            "status" => $status,
            "message" => $message
        ];
        
        if ($data !== null) {
            $response['data'] = $data;
        }
        
        echo json_encode($response);
        exit;
    }
}

// Establish a connection to the MySQL server
$conn = new mysqli($host, $username, $password);

// Verify connection
if ($conn->connect_error) {
    sendResponse(500, false, "Database server connection failed: " . $conn->connect_error);
}

// Automatically create the database if it doesn't exist
$dbQuery = "CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
if ($conn->query($dbQuery) === TRUE) {
    // Select the database
    $conn->select_db($dbname);
} else {
    sendResponse(500, false, "Failed to create database: " . $conn->error);
}

// Automatically create tables if they do not exist
$tables = [
    "users" => "CREATE TABLE IF NOT EXISTS `users` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(50) NOT NULL UNIQUE,
        `email` VARCHAR(100) NOT NULL UNIQUE,
        `password` VARCHAR(255) NOT NULL,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
    
    "products" => "CREATE TABLE IF NOT EXISTS `products` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(100) NOT NULL,
        `description` TEXT,
        `price` DECIMAL(10, 2) NOT NULL,
        `stock` INT NOT NULL DEFAULT 0,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
    
    "orders" => "CREATE TABLE IF NOT EXISTS `orders` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `user_id` INT NOT NULL,
        `product_id` INT NOT NULL,
        `quantity` INT NOT NULL DEFAULT 1,
        `total_price` DECIMAL(10, 2) NOT NULL,
        `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
        FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
];

foreach ($tables as $name => $sql) {
    if (!$conn->query($sql)) {
        sendResponse(500, false, "Failed to create table '$name': " . $conn->error);
    }
}

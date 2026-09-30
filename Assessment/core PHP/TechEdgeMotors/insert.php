<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if (isset($_POST['submit'])) {

    // Get form data
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $vehicle_details = trim($_POST['vehicle_details']);
    $complaint = trim($_POST['complaint']);

    // 1. Validation: Check required fields
    if (empty($name) || empty($phone) || empty($email) || empty($vehicle_details) || empty($complaint)) {
        header("Location: index.php?error=All fields are required.");
        exit();
    }

    // 2. Validation: Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=Invalid email format.");
        exit();
    }

    // 3. Validation: Simple phone validation (10 digits)
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        header("Location: index.php?error=Phone number must be a valid 10-digit number.");
        exit();
    }

    // Simple sanitization for student level Core PHP
    $name = mysqli_real_escape_string($conn, $name);
    $phone = mysqli_real_escape_string($conn, $phone);
    $email = mysqli_real_escape_string($conn, $email);
    $vehicle_details = mysqli_real_escape_string($conn, $vehicle_details);
    $complaint = mysqli_real_escape_string($conn, $complaint);

    // Simple INSERT query
    $sql = "INSERT INTO complaints (name, phone, email, vehicle_details, complaint) 
            VALUES ('$name', '$phone', '$email', '$vehicle_details', '$complaint')";

    // Execute query
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?error=Failed to insert data: " . mysqli_error($conn));
        exit();
    }

} else {
    // If accessed directly without submitting form
    header("Location: index.php");
    exit();
}
?>

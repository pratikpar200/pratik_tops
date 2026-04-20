<?php
// 4) LAB EXERCISE:
// Create a form that takes a user's name and email. Use the $_POST super global to display the entered data.
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
</head>
<body>

<h2>User Information Form</h2>

<!-- Added htmlspecialchars to PHP_SELF to prevent XSS attacks in the action attribute -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // SECURITY FIX: Strip unnecessary characters & prevent XSS via htmlspecialchars
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    // Basic Validation
    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h3>Entered Data Received Successfully:</h3>";
        echo "<strong>Name:</strong> " . $name . "<br>";
        echo "<strong>Email:</strong> " . $email;
    } else {
        echo "<h3 style='color:red;'>Invalid Input! Please check your details.</h3>";
    }
}
?>

</body>
</html>

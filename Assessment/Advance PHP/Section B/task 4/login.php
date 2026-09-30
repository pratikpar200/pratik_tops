<?php

session_start();

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "1234") {

        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit();

    } else {

        $error = "Invalid username or password.";

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Login</title>
</head>

<body>

<h2>Creator Login</h2>

<p><?php echo $error; ?></p>

<form method="POST">

    <label>Username:</label>
    <input type="text" name="username">

    <br><br>

    <label>Password:</label>
    <input type="password" name="password">

    <br><br>

    <button type="submit" name="login">Login</button>

</form>

</body>
</html>
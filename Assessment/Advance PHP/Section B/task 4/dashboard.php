<?php

session_start();

if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Dashboard</title>
</head>

<body>

<h2>Creator Dashboard</h2>

<p>
    Welcome,
    <?php echo $_SESSION['username']; ?>
</p>

<a href="logout.php">Logout</a>

</body>
</html>
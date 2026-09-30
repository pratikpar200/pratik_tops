<?php

session_start();

include 'Creator.php';

// Check if creator profile exists
if (!isset($_SESSION['creator'])) {
    header("Location: index.php");
    exit();
}

$creator = $_SESSION['creator'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Dashboard</title>

    <style>
        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        h1 {
            text-align: center;
        }

        .profile {
            padding: 20px;
            background-color: #f4f4f4;
        }

        .edit {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: black;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Creator Dashboard</h1>

    <div class="profile">

        <?php
        $creator->render();
        ?>

    </div>

    <a href="index.php" class="edit">Edit Profile</a>

</div>

</body>
</html>
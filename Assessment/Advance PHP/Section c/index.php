<?php

session_start();

include 'Creator.php';

$message = "";

$name = "";
$bio = "";
$category = "";

// If profile already exists, show old data in form
if (isset($_SESSION['creator'])) {

    $creator = $_SESSION['creator'];

    $name = $creator->name;
    $bio = $creator->bio;
    $category = $creator->category;
}

// Save or Update Profile
if (isset($_POST['save'])) {

    $name = trim($_POST['name']);
    $bio = trim($_POST['bio']);
    $category = trim($_POST['category']);

    if (empty($name) || empty($bio) || empty($category)) {

        $message = "Please complete all profile fields before saving.";

    } else {

        $name = htmlspecialchars($name);
        $bio = htmlspecialchars($bio);
        $category = htmlspecialchars($category);

        $creator = new Creator($name, $bio, $category);

        $_SESSION['creator'] = $creator;

        header("Location: dashboard.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Profile Hub</title>

    <style>
        .container {
            width: 400px;
            margin: 50px auto;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            padding: 10px 20px;
        }

        .message {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Creator Profile Hub</h2>

    <p class="message">
        <?php echo $message; ?>
    </p>

    <form method="POST">

        <label>Name:</label>
        <input type="text" name="name"
               value="<?php echo $name; ?>">

        <br><br>

        <label>Category:</label>
        <input type="text" name="category"
               value="<?php echo $category; ?>">

        <br><br>

        <label>Bio:</label>
        <textarea name="bio" rows="5"><?php echo $bio; ?></textarea>

        <br><br>

        <button type="submit" name="save">
            Save Profile
        </button>

    </form>

</div>

</body>
</html>
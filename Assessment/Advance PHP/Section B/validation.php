<?php

$message = "";

if (isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $platform = trim($_POST['platform']);
    $bio = trim($_POST['bio']);

    if (empty($name) || empty($platform) || empty($bio)) {

        $message = "Please complete all profile fields before saving.";

    } else {

        $name = htmlspecialchars($name);
        $platform = htmlspecialchars($platform);
        $bio = htmlspecialchars($bio);

        $message = "Profile saved successfully!";

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Profile</title>
</head>

<body>

<h2>Creator Profile Form</h2>

<p><?php echo $message; ?></p>

<form method="POST">

    <label>Name:</label>
    <input type="text" name="name">

    <br><br>

    <label>Platform:</label>
    <input type="text" name="platform">

    <br><br>

    <label>Bio:</label>
    <textarea name="bio"></textarea>

    <br><br>

    <button type="submit" name="submit">
        Save Profile
    </button>

</form>

</body>
</html>
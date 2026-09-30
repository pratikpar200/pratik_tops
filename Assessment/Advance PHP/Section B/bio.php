<?php

$message = "";

if (isset($_POST['submit'])) {

    $bio = trim($_POST['bio']);

    if (empty($bio)) {
        $message = "Please enter creator bio.";
    }
    else {

        $bio = htmlspecialchars($bio);

        $file = fopen("registry.txt", "a");

        fwrite($file, $bio . PHP_EOL);

        fclose($file);

        $message = "Bio saved successfully!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Bio</title>

    <style>
        .container {
            width: 400px;
            margin: 50px auto;
        }

        textarea {
            width: 100%;
            padding: 10px;
        }

        button {
            margin-top: 10px;
            padding: 10px 20px;
        }

        .message {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Creator Bio Form</h2>

    <div class="message">
        <?php echo $message; ?>
    </div>

    <form method="POST">

        <label>Creator Bio:</label>
        <br><br>

        <textarea name="bio" rows="5"></textarea>

        <br>

        <button type="submit" name="submit">
            Save Bio
        </button>

    </form>

</div>

</body>
</html>
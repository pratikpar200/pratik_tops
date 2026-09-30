<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechEdge Motors - Customer Complaint Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>TechEdge Motors</h2>
    <p style="text-align: center; margin-bottom: 20px; color: #666;">Customer Interaction & Complaint Form</p>

    <a href="view.php" class="nav-link">View All Submissions &rarr;</a>

    <?php
    // Display Success Message
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        echo '<div class="alert alert-success">Complaint submitted successfully!</div>';
    }

    // Display Error Message
    if (isset($_GET['error'])) {
        echo '<div class="alert alert-error">' . htmlspecialchars($_GET['error']) . '</div>';
    }
    ?>

    <form action="insert.php" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter 10-digit phone number" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" required>
        </div>

        <div class="form-group">
            <label for="vehicle_details">Vehicle Details:</label>
            <input type="text" id="vehicle_details" name="vehicle_details" placeholder="e.g. Model, Reg. Number" required>
        </div>

        <div class="form-group">
            <label for="complaint">Complaint:</label>
            <textarea id="complaint" name="complaint" rows="5" placeholder="Describe your issue or complaint here..." required></textarea>
        </div>

        <button type="submit" name="submit">Submit Complaint</button>
    </form>
</div>

</body>
</html>

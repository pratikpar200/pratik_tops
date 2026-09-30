<?php
// Include database connection
include 'db.php';

// Fetch all records from database
$sql = "SELECT * FROM complaints ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechEdge Motors - View Complaints</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container-wide">
    <h2>Submitted Customer Complaints</h2>
    <p style="text-align: center; margin-bottom: 20px; color: #666;">TechEdge Motors - Customer Interaction Database</p>

    <a href="index.php" class="nav-link">&larr; Back to Complaint Form</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Vehicle Details</th>
                <th>Complaint</th>
                <th>Submitted On</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are records in the database
            if (mysqli_num_rows($result) > 0) {
                // Loop through each record
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['vehicle_details']) . "</td>";
                    echo "<td>" . nl2br(htmlspecialchars($row['complaint'])) . "</td>";
                    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='no-data'>No complaints found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

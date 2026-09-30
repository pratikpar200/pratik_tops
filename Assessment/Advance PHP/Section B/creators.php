<?php

$creators = [
    [
        "name" => "Rahul",
        "platform" => "Instagram",
        "followers" => 5000
    ],
    [
        "name" => "Priya",
        "platform" => "YouTube",
        "followers" => 15000
    ],
    [
        "name" => "Amit",
        "platform" => "Facebook",
        "followers" => 8000
    ]
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Profiles</title>

    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 30px auto;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: lightgray;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

<h2>Creator Profiles</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Platform</th>
        <th>Followers</th>
    </tr>

    <?php foreach ($creators as $creator) { ?>

        <tr>
            <td><?php echo $creator['name']; ?></td>
            <td><?php echo $creator['platform']; ?></td>
            <td><?php echo $creator['followers']; ?></td>
        </tr>

    <?php } ?>

</table>

</body>
</html>
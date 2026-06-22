<?php
/*
Q5. Add error handling to your readSongs.php endpoint so that if the database connection fails, it returns a JSON error message with HTTP status code 500 instead of crashing.
*/

$conn2 = mysqli_connect("localhost","root","","music_db");

if(!$conn2)
{
    http_response_code(500);

    echo json_encode([
        "error"=>"Database Connection Failed"
    ]);

    exit;
}

$result = mysqli_query($conn2,"SELECT * FROM songs");

$songs = [];

while($row = mysqli_fetch_assoc($result))
{
    $songs[] = $row;
}

echo json_encode($songs);

?>
?>
<?php

/*
Q1. Create a PHP REST API endpoint called createSong.php that accepts POST requests to add a new song to a MySQL table 'songs' with columns: id, title, artist, and duration (in seconds).
*/

$conn = mysqli_connect("localhost","root","","music_db");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $duration = $_POST['duration'];

    mysqli_query($conn,"INSERT INTO songs(title,artist,duration)
    VALUES('$title','$artist','$duration')");

    echo json_encode([
        "message"=>"Song Added Successfully"
    ]);
}

?>
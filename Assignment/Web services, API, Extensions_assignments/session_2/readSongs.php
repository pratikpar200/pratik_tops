<?php
/*
Q2. Build a readSongs.php endpoint that handles GET requests and returns all songs from the 'songs' table as a JSON array.
*/

if($_SERVER['REQUEST_METHOD'] == "GET")
{
    $result = mysqli_query($conn,"SELECT * FROM songs");

    $songs = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $songs[] = $row;
    }

    echo json_encode($songs);
}
?>
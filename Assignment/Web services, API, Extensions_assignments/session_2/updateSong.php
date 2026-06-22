<?php
/*
Q3. Implement an updateSong.php endpoint that uses the PUT method to update the title and duration of a song by its id in the 'songs' table.
*/

if($_SERVER['REQUEST_METHOD'] == "PUT")
{
    $data = json_decode(file_get_contents("php://input"),true);

    $id = $data['id'];
    $title = $data['title'];
    $duration = $data['duration'];

    mysqli_query($conn,
    "UPDATE songs SET
    title='$title',
    duration='$duration'
    WHERE id='$id'");

    echo json_encode([
        "message"=>"Song Updated Successfully"
    ]);
}

?>
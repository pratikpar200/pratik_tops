<?php
$conn = new mysqli("localhost", "root", "", "spotify_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CREATE
function createPlaylist($conn, $name, $description) {
    $sql = "INSERT INTO playlist (name, description) VALUES ('$name', '$description')";
    $conn->query($sql);
    echo "Playlist Created<br>";
}

// READ
function readPlaylists($conn) {
    $sql = "SELECT * FROM playlist";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " | Name: " . $row['name'] . " | Description: " . $row['description'] . "<br>";
    }
}

// UPDATE
function updatePlaylist($conn, $id, $name, $description) {
    $sql = "UPDATE playlist SET name='$name', description='$description' WHERE id=$id";
    $conn->query($sql);
    echo "Playlist Updated<br>";
}

// DELETE
function deletePlaylist($conn, $id) {
    $sql = "DELETE FROM playlist WHERE id=$id";
    $conn->query($sql);
    echo "Playlist Deleted<br>";
}

// TEST ALL OPERATIONS
createPlaylist($conn, "Workout Hits", "High energy songs");
createPlaylist($conn, "Chill Vibes", "Relaxing music");

echo "<br>--- After Create ---<br>";
readPlaylists($conn);

updatePlaylist($conn, 1, "Workout Hits 2.0", "Updated high energy songs");

echo "<br>--- After Update ---<br>";
readPlaylists($conn);

deletePlaylist($conn, 2);

echo "<br>--- After Delete ---<br>";
readPlaylists($conn);

$conn->close();
?>
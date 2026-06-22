<?php

/*
Q1. Create a PHP API endpoint called /api/playlist that returns a hardcoded list of 3 Spotify-style playlists in JSON format, but only if the request includes a valid Basic Auth header with username 'musicfan' and password 'topstraining'.
*/

$user = $_SERVER['PHP_AUTH_USER'] ?? '';
$pass = $_SERVER['PHP_AUTH_PW'] ?? '';

if($user == "musicfan" && $pass == "topstraining")
{
    $playlists = [
        ["id"=>1,"name"=>"Bollywood Hits"],
        ["id"=>2,"name"=>"Workout Mix"],
        ["id"=>3,"name"=>"Chill Vibes"]
    ];

    echo json_encode($playlists);
}
else
{
    header("HTTP/1.1 401 Unauthorized");

    echo json_encode([
        "message"=>"Invalid Username or Password"
    ]);
}

?>
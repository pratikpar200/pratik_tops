<?php

/*
Q1. Create a PHP API endpoint called getTopSongs.php that returns a JSON array of 5 trending song names.
*/

/*
Q2. Return HTTP status code 400 if genre parameter is missing.
*/

/*
Q3. Implement simple rate limiting.
*/

/*
Q4. Allow only HTTPS requests.
*/

header("Content-Type: application/json");

/* HTTPS Check */
if(empty($_SERVER['HTTPS']))
{
    http_response_code(403);

    echo json_encode([
        "error"=>"HTTPS Required"
    ]);

    exit;
}

/* Genre Check */
if(!isset($_GET['genre']))
{
    http_response_code(400);

    echo json_encode([
        "error"=>"Genre Parameter Required"
    ]);

    exit;
}

/* Rate Limiting */
session_start();

$ip = $_SERVER['REMOTE_ADDR'];

if(!isset($_SESSION[$ip]))
{
    $_SESSION[$ip] = [
        "count"=>0,
        "time"=>time()
    ];
}

if(time() - $_SESSION[$ip]['time'] < 60)
{
    $_SESSION[$ip]['count']++;
}
else
{
    $_SESSION[$ip]['count'] = 1;
    $_SESSION[$ip]['time'] = time();
}

if($_SESSION[$ip]['count'] > 3)
{
    http_response_code(429);

    echo json_encode([
        "error"=>"Rate Limit Exceeded"
    ]);

    exit;
}

/* Songs Response */
$songs = [
    "Kesariya",
    "Apna Bana Le",
    "Heeriye",
    "Satranga",
    "Tum Kya Mile"
];

echo json_encode($songs);

?>
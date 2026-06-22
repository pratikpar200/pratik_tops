<?php

/*
Q5. Simulate an API client in PHP that calls your getTopSongs.php endpoint and handles different status codes.
*/

$url = "https://localhost/session_5/getTopSongs.php?genre=bollywood";

$response = @file_get_contents($url);

$status = $http_response_header[0];

if(strpos($status,"200"))
{
    echo "Songs Loaded Successfully";
}
elseif(strpos($status,"400"))
{
    echo "Genre Parameter Missing";
}
elseif(strpos($status,"403"))
{
    echo "HTTPS Required";
}
elseif(strpos($status,"429"))
{
    echo "Too Many Requests";
}
else
{
    echo "Unknown Error";
}

?>
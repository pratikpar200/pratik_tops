<?php

/*
Q2. Write a PHP script using cURL to get latitude and longitude from OpenCage API.
*/

$city = "Ahmedabad";
$apiKey = "YOUR_OPENCAGE_API_KEY";

$url = "https://api.opencagedata.com/geocode/v1/json?q=".$city."&key=".$apiKey;

$ch = curl_init($url);

curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response,true);

echo "Latitude : ".$data['results'][0]['geometry']['lat']."<br>";
echo "Longitude : ".$data['results'][0]['geometry']['lng'];

?>
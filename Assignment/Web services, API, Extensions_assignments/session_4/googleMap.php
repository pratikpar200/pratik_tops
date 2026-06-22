<?php

/*
Q3. Display Google Static Map using city coordinates.
*/

if(isset($_POST['city']))
{
    $city = $_POST['city'];

    $apiKey = "YOUR_OPENCAGE_API_KEY";

    $url = "https://api.opencagedata.com/geocode/v1/json?q=".$city."&key=".$apiKey;

    $response = file_get_contents($url);

    $data = json_decode($response,true);

    $lat = $data['results'][0]['geometry']['lat'];
    $lng = $data['results'][0]['geometry']['lng'];

    echo "<img src='https://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=12&size=600x300&markers=color:red|$lat,$lng&key=YOUR_GOOGLE_MAP_API_KEY'>";
}
?>

<form method="post">
    City Name :
    <input type="text" name="city">

    <input type="submit" value="Show Map">
</form>
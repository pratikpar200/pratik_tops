<?php

/*
Q5. Handle API errors gracefully.
*/

$apiKey = "YOUR_WEATHER_API_KEY";

$url = "https://api.openweathermap.org/data/2.5/weather?q=Ahmedabad&appid=".$apiKey;

$response = @file_get_contents($url);

if($response == false)
{
    echo "Unable To Fetch Weather Data Right Now.";
}
else
{
    $data = json_decode($response,true);

    if(isset($data['main']))
    {
        echo "Temperature : ".$data['main']['temp'];
    }
    else
    {
        echo "Weather Information Not Available.";
    }
}

?>
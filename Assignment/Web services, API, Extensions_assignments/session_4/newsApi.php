<?php

/*
Q1. Use file_get_contents() in PHP to fetch the latest top headlines from the NewsAPI.
*/

$apiKey = "YOUR_NEWS_API_KEY";

$url = "https://newsapi.org/v2/top-headlines?country=in&apiKey=".$apiKey;

$response = file_get_contents($url);

$data = json_decode($response,true);

echo "<h3>Top 5 Headlines</h3>";

for($i=0;$i<5;$i++)
{
    echo ($i+1).". ".$data['articles'][$i]['title']."<br><br>";
}

?>
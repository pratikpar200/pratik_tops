<?php

/*
Q4. Build a Flipkart-style Deal Of The Day widget.
*/

$response = file_get_contents(
    "https://dummyjson.com/products"
);

$data = json_decode($response,true);

$product = $data['products'][rand(0,29)];

echo "<h2>Deal Of The Day</h2>";

echo "<h3>".$product['title']."</h3>";

echo "Price : ₹".$product['price']."<br><br>";

echo "<img src='".$product['thumbnail']."' width='200'>";

?>
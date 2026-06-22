<?php

/*
Q2. Build a PHP API endpoint /api/orders that requires an API key to access.
*/

$api_key = $_GET['api_key'] ?? '';

if($api_key == "MYSECRET123")
{
    $orders = [
        ["id"=>1,"food"=>"Pizza"],
        ["id"=>2,"food"=>"Burger"],
        ["id"=>3,"food"=>"Pasta"]
    ];

    echo json_encode($orders);
}
else
{
    header("HTTP/1.1 401 Unauthorized");

    echo json_encode([
        "message"=>"Invalid API Key"
    ]);
}

?>
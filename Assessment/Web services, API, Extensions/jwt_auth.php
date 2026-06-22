<?php

/*
Q3. Secure POST, PUT, DELETE routes using JWT.
Allow GET without authentication.
*/

$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET")
{
    echo json_encode([
        "message" => "Public Access"
    ]);
}
else
{
    $token = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

    if($token == "Bearer mytoken123")
    {
        echo json_encode([
            "message" => "Authorized User"
        ]);
    }
    else
    {
        http_response_code(401);

        echo json_encode([
            "message" => "Unauthorized"
        ]);
    }
}

?>
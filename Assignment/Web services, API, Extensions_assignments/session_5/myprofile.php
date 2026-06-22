<?php

/*
Q4. Create a secure PHP API endpoint /api/myprofile that only allows access if the client sends a valid JWT token.
*/

require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = "topssecretkey";

$headers = getallheaders();

if(isset($headers['Authorization']))
{
    $jwt = str_replace("Bearer ","",$headers['Authorization']);

    try
    {
        JWT::decode($jwt,new Key($key,'HS256'));

        $profile = [
            "username"=>"musicfan",
            "followers"=>2500,
            "posts"=>120
        ];

        echo json_encode($profile);
    }
    catch(Exception $e)
    {
        header("HTTP/1.1 401 Unauthorized");

        echo json_encode([
            "message"=>"Invalid Token"
        ]);
    }
}
else
{
    echo json_encode([
        "message"=>"Token Required"
    ]);
}

?>
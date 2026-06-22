<?php

/*
Q3. Install the firebase/php-jwt package using Composer and create a PHP script that generates a JWT token.
*/

require 'vendor/autoload.php';

use Firebase\JWT\JWT;

$email = "user@gmail.com";
$password = "123456";

if($email=="user@gmail.com" && $password=="123456")
{
    $key = "topssecretkey";

    $payload = [
        "email"=>$email,
        "time"=>time()
    ];

    $token = JWT::encode($payload,$key,'HS256');

    echo json_encode([
        "token"=>$token
    ]);
}

?>
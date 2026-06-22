<?php

/*
Q5. Write a PHP function to validate a JWT token and return the email claim.
*/

require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function validateToken($token)
{
    $key = "topssecretkey";

    try
    {
        $data = JWT::decode(
            $token,
            new Key($key,'HS256')
        );

        return $data->email;
    }
    catch(Exception $e)
    {
        return "Invalid Token";
    }
}

?>
<?php

/*
Q2. Create a PHP script that uses the Twilio SMS API to send a welcome message to your own mobile number when a new user registers.
*/

require 'vendor/autoload.php';

use Twilio\Rest\Client;

$sid = "YOUR_ACCOUNT_SID";
$token = "YOUR_AUTH_TOKEN";

$client = new Client($sid, $token);

$client->messages->create(
    "+91XXXXXXXXXX",
    [
        "from" => "YOUR_TWILIO_NUMBER",
        "body" => "Welcome to our application."
    ]
);

echo "SMS Sent Successfully";

?>
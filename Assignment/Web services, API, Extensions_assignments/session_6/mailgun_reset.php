<?php

/*
Q3. Integrate Mailgun into a PHP file to send a password reset email to a user.
*/

require 'vendor/autoload.php';

use Mailgun\Mailgun;

$resetCode = uniqid();

$mg = Mailgun::create("YOUR_MAILGUN_API_KEY");

$mg->messages()->send(
    "YOUR_DOMAIN_NAME",
    [
        'from'    => 'admin@yourdomain.com',
        'to'      => 'user@gmail.com',
        'subject' => 'Password Reset',
        'text'    => 'Your Reset Code is : '.$resetCode
    ]
);

echo "Password Reset Email Sent";

?>
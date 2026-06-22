<?php

/*
Q1. Sign up for a free SendGrid account, generate an API key, and send a test email from your PHP script to your Gmail address using SendGrid's PHP library.
*/

require 'vendor/autoload.php';

$email = new \SendGrid\Mail\Mail();

$email->setFrom("yourmail@example.com", "TOPS");
$email->setSubject("Test Email");
$email->addTo("yourgmail@gmail.com");
$email->addContent(
    "text/plain",
    "Hello, this is a test email from SendGrid."
);

$sendgrid = new \SendGrid("YOUR_SENDGRID_API_KEY");

$response = $sendgrid->send($email);

echo "Email Sent Successfully";

?>
<?php

/*
Q4. Listen for Razorpay payment.captured webhook
and save details in payments.txt
*/

$data = file_get_contents("php://input");

$payment = json_decode($data,true);

$log =
"Payment ID : ".$payment['payload']['payment']['entity']['id'].
"\nAmount : ".$payment['payload']['payment']['entity']['amount'].
"\nStatus : ".$payment['payload']['payment']['entity']['status'].
"\n-------------------------\n";

file_put_contents(
    "payments.txt",
    $log,
    FILE_APPEND
);

echo "Webhook Received";

?>
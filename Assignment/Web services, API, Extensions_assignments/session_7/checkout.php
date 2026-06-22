<?php

/*
Q2. Create Razorpay Order using Orders API and return order_id.
*/

include("config.php");

$amount = $_POST['amount'] * 100;

$data = [
    "amount" => $amount,
    "currency" => "INR",
    "receipt" => "receipt_001"
];

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,"https://api.razorpay.com/v1/orders");
curl_setopt($ch,CURLOPT_USERPWD,$key_id.":".$key_secret);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data));
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

curl_setopt($ch,CURLOPT_HTTPHEADER,[
    "Content-Type: application/json"
]);

$response = curl_exec($ch);

curl_close($ch);

$order = json_decode($response,true);

echo "<h3>Order Created</h3>";

echo "Order ID : ".$order['id'];
?>
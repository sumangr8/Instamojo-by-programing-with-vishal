<?php
session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_801281ab3527ccf1c184b49ab8c",  //api key
                  "X-Auth-Token:test_d0d27a9a938355c620844cdbf18"));  //token key
$payload = Array(
    'purpose' => 'FIFA 16',
    'amount' => '2500',  //multiply by 100
    'phone' => '9999999999',
    'buyer_name' => 'John Doe',
    'redirect_url' => 'http://localhost/instamojo/return.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => 'foo@example.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch);
$response=json_decode($response);
// $_SESSION["TID"]=$response->payment_request->id;
$_SESSION["id"]='128';  //ye demo ke liye kiya hai
header("location:".$response->payment_request->longurl);   //ye page ko redirect ke liye jaha payement ka option aa sake



?>

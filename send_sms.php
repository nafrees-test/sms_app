<?php

$username = 'nafrees';
$password = '0715688986Nr@321';
$api_key = 'f6c492caf34a1a220dbc0816875adb9c-351f92ba-0c21-4816-96bc-524906da3ee5';

$to = $_POST['phone_number'];
$message = $_POST['message'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'k22jdx.api.infobip.com');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"from\":\"YourSenderID\",\"to\":\"$to\",\"text\":\"$message\"}");

$headers = array();
$headers[] = 'Authorization: Basic ' . base64_encode("$username:$password");
$headers[] = 'Content-Type: application/json';
$headers[] = 'x-api-key: ' . $api_key;

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo "Message sent successfully!";
}

curl_close($ch);

?>

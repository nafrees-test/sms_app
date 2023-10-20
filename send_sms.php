<?php

$username = 'nafrees-test';
$password = '0715688986Nr@321';
$api_key = 'e76c9ce4d18bada10d002925b40503da-a88b3198-4b5c-4e9f-b742-8af8b8c7d85c';

$to = $_POST['phone_number'];
$message = $_POST['message'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.infobip.com/sms/1/text/single');
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

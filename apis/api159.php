<?php

$apiUrl = 'https://api.kabbik.com/v1/auth/otpnew';
$msisdn = $_GET["phone"];


// Prepare the data for the POST request
$data = array(
    'msisdn' => "88".$msisdn,
    'currentTimeLong' =>"1709895970871",
);

// Encode the data for the POST request
$postData = json_encode($data);

// Set up cURL options
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'User-Agent: Mozilla/5.0',  // Replace this with your actual User-Agent
));

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

echo $response
?>

<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone number parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Define the API URL and token
$url = 'https://webapi.robi.com.bd/v1/account/register/otp';
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiJnaGd4eGM5NzZoaiIsImlhdCI6MTcyOTk0NDIzMiwibmJmIjoxNzI5OTQ0MjMyLCJleHAiOjE3Mjk5NDc4MzIsInVpZCI6IjU3OGpmZkBoZ2hoaiIsInN1YiI6IlJvYmlXZWJTaXRlVjIifQ.OazMyj3W7v8k5QN6qkfP7yR26hO3zURtTPzdTPKAWt8'; // Replace with actual token

// Initialize cURL session
$ch = curl_init();

// Prepare the data to be sent as JSON
$data = json_encode([
    'phone_number' => $phone
]);

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Authorization: Bearer ' . $token,
    'Connection: keep-alive',
    'Content-Type: application/json;charset=UTF-8',
    'Origin: https://www.robi.com.bd',
    'Referer: https://www.robi.com.bd/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'X-CSRF-TOKEN: ' . $token, // Ensure this matches with the Authorization token
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
]);

// Set the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

// Close the cURL session
curl_close($ch);
?>

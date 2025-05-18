<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone number parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Remove any non-digit characters from the phone number
$phone = preg_replace('/\D/', '', $phone);

// Check if the phone number is 11 digits and does not start with '0'
if (strlen($phone) !== 11 || $phone[0] === '0') {
    die('Invalid phone number. It must be an 11-digit number starting with 1.');
}

// Format the phone number to include the country code
$formattedPhone = '+880' . $phone;

// Define the API URL and token
$url = 'https://web-api.binge.buzz/api/v3/otp/send/' . $formattedPhone;
$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdGF0dXMiOiJGcmVlIiwiY3JlYXRlZEF0IjoiY3JlYXRlIGRhdGUiLCJ1cGRhdGVkQXQiOiJ1cGRhdGUgZGF0ZSIsInR5cGUiOiJ0b2tlbiIsImRldlR5cGUiOiJ3ZWIiLCJleHRyYSI6IjMxNDE1OTI2IiwiaWF0IjoxNzI5OTQ0NDg3LCJleHAiOjE3MzAxMTcyODd9.vKWYVBgVFmYuvwfCOLlLe5-99Q2HTR_rc641jUfLx_k'; // Replace with actual token

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Authorization: Bearer ' . $token,
    'Connection: keep-alive',
    'Device-Type: web',
    'Origin: https://binge.buzz',
    'Referer: https://binge.buzz/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
]);

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

<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Format the phone number to an 11-digit string
$phone = preg_replace('/\D/', '', $phone); // Remove non-digit characters

// Validate that the phone number is 11 digits and starts with 0
if (strlen($phone) !== 11 || $phone[0] !== '0') {
    die('Invalid phone number. It must be an 11-digit number starting with 0.');
}

// API endpoint
$url = 'https://app.ipay.com.bd/api/v1/signup/check/' . urlencode('+880' . substr($phone, 1)); // Format phone for API

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'accept: application/json, text/plain, */*',
    'accept-language: en-US,en;q=0.9,bn;q=0.8',
    'content-type: application/json',
    'cookie: cf_clearance=YOUR_CF_CLEARANCE; deviceId=browser-chrome-4220047e2de094007278b38cd27276c6', // Update with your cookie values
    'origin: https://app.ipay.com.bd',
    'priority: u=1, i',
    'referer: https://app.ipay.com.bd/signup/personal',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
]);

// Set an empty JSON body as per the original cURL command
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([]));

// Execute the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Output success response
    echo "Api Owner : Mɾ. Jҽɾɾყ 😈<br>";
    echo "Telegram : t.me/Mr_Jerry_Hacker";
}

// Close the cURL session
curl_close($ch);
?>

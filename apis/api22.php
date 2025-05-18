<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Remove any non-digit characters from the phone number
$phone = preg_replace('/\D/', '', $phone);

// Check if the phone number is 11 digits and starts with 0
if (strlen($phone) !== 11 || $phone[0] !== '0') {
    die('Invalid phone number. It must be an 11-digit number starting with 0.');
}

// API endpoint
$url = 'https://otithee.com/generate-otp';

// Initialize cURL session
$ch = curl_init($url);

// Set POST fields with the formatted phone number
$postFields = http_build_query([
    'mobile_number' => $phone,
    'form_type' => '2',
    'masking' => '0',
    '_token' => 'ZkJZHcX0ayPHJ8LevdosCBEBtZJnt9vZK6QDhx27'
]);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'accept: */*',
    'accept-language: en-US,en;q=0.9,bn;q=0.8',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'origin: https://otithee.com',
    'referer: https://otithee.com/user/register',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'x-requested-with: XMLHttpRequest'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

// Execute the request
$response = curl_exec($ch);

// Check for errors and print the custom success message
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

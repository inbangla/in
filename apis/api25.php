<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Format the phone number to an 11-digit string
$phone = preg_replace('/\D/', '', $phone);

// Validate that the phone number is 11 digits and starts with 0
if (strlen($phone) !== 11 || $phone[0] !== '0') {
    die('Invalid phone number. It must be an 11-digit number starting with 0.');
}

// API endpoint
$url = 'https://steadfast.com.bd/register';

// Prepare POST data
$postData = [
    '_token' => 'CAVoYSe2drNqbEFwA04BmrbBEBwK5YhERynrKB9P',
    'b_name' => 'dsadasd',
    'f_name' => 'Shahin Islam',
    'address' => 'Dhaka, Narayanganj\nDhaka',
    'mobile' => $phone,
    'email' => 'fayeh29389@jameagle.com',
    'password' => 'Shahin#@321',
    'password_confirmation' => 'Shahin#@321'
];

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'accept-language: en-US,en;q=0.9,bn;q=0.8',
    'content-type: application/x-www-form-urlencoded',
    'origin: https://steadfast.com.bd',
    'referer: https://steadfast.com.bd/register',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

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

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
$url = 'https://www.jilievo.club/wps/verification/sms/noLogin';

// Initialize cURL session
$ch = curl_init($url);

// Set the data to be sent in the request
$data = json_encode(['mobileNum' => $phone]); // Use the formatted phone number

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Content-Type: application/json',
    'Device: web',
    'Language: EN',
    'Merchant: evobdtf2',
    'Origin: https://www.jilievo.club',
    'Referer: https://www.jilievo.club/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'Sec-CH-UA: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'Sec-CH-UA-Mobile: ?0',
    'Sec-CH-UA-Platform: "Windows"',
    'X-Gateway-Version: 3',
]);

// Set the request body
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

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

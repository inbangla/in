<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone number parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Remove any non-digit characters from the phone number
$phone = preg_replace('/\D/', '', $phone);

// Check if the phone number is 11 digits
if (strlen($phone) !== 11) {
    die('Invalid phone number. It must be an 11-digit number.');
}

// Define the API URL
$url = 'https://api.garibookadmin.com/api/v2/user/login';

// Prepare the data as a JSON object
$data = json_encode([
    'mobile' => $phone,
    'recaptcha_token' => 'garibookcaptcha', // Replace with actual token if necessary
    'channel' => 'web',
]);

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Connection: keep-alive',
    'Origin: https://garibook.com',
    'Referer: https://garibook.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: cross-site',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'Accept: application/json',
    'Content-Type: application/json',
    'Sec-Ch-Ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'Sec-Ch-Ua-Mobile: ?0',
    'Sec-Ch-Ua-Platform: "Windows"',
]);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Output success response
    echo "Api Owner : @hasandeveloper00<br>";
    echo "Telegram : t.me/cyber24_bd";
}

// Close the cURL session
curl_close($ch);
?>

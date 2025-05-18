<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone number parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Remove any non-digit characters from the phone number
$phone = preg_replace('/\D/', '', $phone);

// Check if the phone number is 11 digits and starts with 0
if (strlen($phone) !== 11 || $phone[0] !== '0') {
    die('Invalid phone number. It must be an 11-digit number starting with 0.');
}

// Convert the phone number to international format
$msisdn = '+88' . substr($phone, 1); // Converts '01402715725' to '+8801402715725'

// Define the API URL
$url = 'https://prod-api.viewlift.com/identity/signup?site=hoichoitv&deviceId=browser-c7de6eee-ba73-0a9e-1c0d-67c1358f95d8';

// Prepare the JSON data for the POST request
$data = json_encode([
    'phoneNumber' => $msisdn,
    'requestType' => 'send',
    'whatsappConsent' => true,
]);

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Content-Type: application/json',
    'Origin: https://www.hoichoi.tv',
    'Referer: https://www.hoichoi.tv/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: cross-site',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'X-Api-Key: PBSooUe91s7RNRKnXTmQG7z3gwD2aDTA6TlJp6ef',
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
    echo "Api Owner : Mɾ. Jҽɾɾყ 😈<br>";
    echo "Telegram : t.me/Mr_Jerry_Hacker";
}

// Close the cURL session
curl_close($ch);
?>

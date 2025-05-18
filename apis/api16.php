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

// Convert the phone number to the required format
$username = '+88' . substr($phone, 1); // Converts '01402715725' to '+8801402715725'

// Define the API URL
$url = 'https://api.10minuteschool.com/auth/v1/userExists';

// Prepare the JSON data for the POST request
$data = json_encode([
    'username' => $username,
    'loginType' => 'phone',
    'g_recaptcha_token' => 'YOUR_RECAPTCHA_TOKEN', // Replace with a valid token or fetch dynamically
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
    'Origin: https://10minuteschool.com',
    'Referer: https://10minuteschool.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'X-Tenms-Source-Lang: bn',
    'X-Tenms-Source-Platform: web',
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

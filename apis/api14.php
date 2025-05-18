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

// Prepare user details
$name = "Md Shahin Islam";
$email = "mdshahinislam494@gmail.com";
$gender = 1; // 1 for male, you can adjust as needed
$password = "Shahin#@321";
$confirm_password = $password; // should match password
$r_token = "jycbgygsecsgcfhsgcvysegfgrr46rrgve4urv64iu6"; // use your actual token

// Convert to international format by adding the country code
$msisdn = '88' . substr($phone, 1); // Converts '01402715725' to '8801402715725'

// Define the API URL
$url = 'https://cineplex-ticket-api.cineplexbd.com/api/v1/register';

// Prepare the multipart/form-data for the POST request
$data = "--WebKitFormBoundaryyyqWZJWdNGhAnGOz\r\n" .
    "Content-Disposition: form-data; name=\"name\"\r\n\r\n" . $name . "\r\n" .
    "--WebKitFormBoundaryyyqWZJWdNGhAnGOz\r\n" .
    "Content-Disposition: form-data; name=\"msisdn\"\r\n\r\n" . $msisdn . "\r\n" .
    "--WebKitFormBoundaryyyqWZJWdNGhAnGOz\r\n" .
    "Content-Disposition: form-data; name=\"email\"\r\n\r\n" . $email . "\r\n" .
    "--WebKitFormBoundaryyyqWZJWdNGhAnGOz\r\n" .
    "Content-Disposition: form-data; name=\"gender\"\r\n\r\n" . $gender . "\r\n" .
    "--WebKitFormBoundaryyyqWZJWdNGhAnGOz\r\n" .
    "Content-Disposition: form-data; name=\"password\"\r\n\r\n" . $password . "\r\n" .
    "--WebKitFormBoundaryyyqWZJWdNGhAnGOz\r\n" .
    "Content-Disposition: form-data; name=\"confirm_password\"\r\n\r\n" . $confirm_password . "\r\n" .
    "--WebKitFormBoundaryyyqWZJWdNGhAnGOz\r\n" .
    "Content-Disposition: form-data; name=\"r_token\"\r\n\r\n" . $r_token . "\r\n" .
    "--WebKitFormBoundaryyyqWZJWdNGhAnGOz--\r\n";

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryyyqWZJWdNGhAnGOz',
    'Origin: https://ticket.cineplexbd.com',
    'Referer: https://ticket.cineplexbd.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
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
    echo "Api Owner : Mɾ. Jҽɾɾყ 😈<br>";
    echo "Telegram : t.me/Mr_Jerry_Hacker";
}

// Close the cURL session
curl_close($ch);
?>

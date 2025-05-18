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
$url = 'https://shopapp.self-shopping.com/public/webpost?random=461722&webpost=1';

// Prepare the form data for the POST request
$data = "--WebKitFormBoundary8epLQbpQYFXmduni\r\n" .
        "Content-Disposition: form-data; name=\"sendotp\"\r\n\r\n" .
        "$phone\r\n" .
        "--WebKitFormBoundary8epLQbpQYFXmduni\r\n" .
        "Content-Disposition: form-data; name=\"token\"\r\n\r\n" .
        "SlVSQkpMWlExMFJEN0czKl8qQVdHMEtFWjZCSElCM0Y2UFlWMzhPUUwzUldKRjhFV1ZBN05ORTQwTzg5RDNJQ0RXT1MqXyo1NDUxNDZiNWI3ZTg5N2JhNzAyMWU0ZWY4YWYwMTg4Ng==\r\n" .
        "--WebKitFormBoundary8epLQbpQYFXmduni--\r\n";

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Connection: keep-alive',
    'Content-Type: multipart/form-data; boundary=----WebKitFormBoundary8epLQbpQYFXmduni',
    'Origin: https://self-shopping.com',
    'Referer: https://self-shopping.com/',
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

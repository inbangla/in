<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone number parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Remove any non-digit characters from the phone number
$phone = preg_replace('/\D/', '', $phone);

// Check if the phone number is 11 digits and starts with '1'
if (strlen($phone) !== 11 || $phone[0] !== '1') {
    die('Invalid phone number. It must be an 11-digit number starting with 1.');
}

// Define the API URL
$url = 'https://mapi.toffeelive.com/re-registration-v2';

// Prepare the data
$data = '------WebKitFormBoundaryUExlnvfZs8dEOB2u' . "\r\n" .
        'Content-Disposition: form-data; name="data"' . "\r\n\r\n" .
        'GMKIN8gIyKHfjb/Xq30AEUo7i8vZpEfxsN6Ve5jm2Tu1XwBjMeRCuQCAG7J4wSSTQK3tEP0BIhraZRoPR+PPz9qXBi0Kil4Q2gXRj/8/9bGJxMstUMGXHAguj4PPYHWTTd3iYdTfdyj6ypYvVBowBJ1g410COB/n6cm/npWBeQDEcBCc1HtAtf/b4cSgQ9oF6jD9PD8tsM5qlvMqJFTYABY5hxJ/SOOLfM0sPsyVgo8Sdn2nJhxmYuTeeMVJ2Mh96EcWLs1uJc/F54epMXGhbD+NA/zwTQeU1PTeaByxIDdOB6t0BuPCrtYdd2PaK9M+QnBV3fUXqpUy+L4WViiObzUEg+/HSD9XB18isvagqBic9N6+Hz1IoNJDh4S7Gj8hCboKU2NEWtoxJUtmiih0bx1K50FY7XLjzbdhAFfsNtgRMikL83r6lRpamx5ydRLUgo0z3EvPMLyRccJ1tVw8LgbGl+IsZCoJ7j6YzfvRz4lrl19gruXE8Cn2V6YjWdEZWJYcWOQJEzVYHgv1c9xrZ8t8hhm+u1wTsSpzgfEZqCGSqkRX4w7efGMwxwW/1eluvV7mMuBC2O0tvULbtDwu5bAxXweNXvcjtweh8CdTtVIn9XcydWgnN1mzRfjXWCYmYzzGYa6PFFCMjJiRTKEDFQ==' . "\r\n" .
        '------WebKitFormBoundaryUExlnvfZs8dEOB2u--' . "\r\n";

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryUExlnvfZs8dEOB2u',
    'Origin: https://toffeelive.com',
    'Referer: https://toffeelive.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

// Close the cURL session
curl_close($ch);
?>

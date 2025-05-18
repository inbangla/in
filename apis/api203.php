<?php

// Check if the phone parameter is set
if (isset($_GET['Phone'])) {
    $phone = $_GET['Phone']; // Get the phone parameter from the URL
} else {
    die('Phone number is required.'); // Handle the case where the phone number is not provided
}

// Initialize a cURL session
$ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, 'https://suzuki.com.bd/signup?goback=%2F%3F');

// Set the request method to POST
curl_setopt($ch, CURLOPT_POST, true);

// Set the headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: text/x-component',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Connection: keep-alive',
    'Content-Type: text/plain;charset=UTF-8',
    'Cookie: _ga=GA1.1.1154586039.1729062397; _ga_0QSW52R6RR=GS1.1.1729062397.1.1.1729062404.0.0.0',
    'Next-Action: e477d214a1c0711c029104b03a20b344f78f7b40',
    'Next-Router-State-Tree: %5B%22%22%2C%7B%22children%22%3A%5B%22(authentication)%22%2C%7B%22children%22%3A%5B%22signup%22%2C%7B%22children%22%3A%5B%22__PAGE__%3F%7B%5C%22goback%5C%22%3A%5C%22%2F%3F%5C%22%7D%22%2C%7B%7D%5D%7D%5D%7D%2Cnull%2Cnull%2Ctrue%5D%7D%2Cnull%2Cnull%2Ctrue%5D',
    'Next-Url: /signup?goback=%2F%3F',
    'Origin: https://suzuki.com.bd',
    'Referer: https://suzuki.com.bd/signup?goback=%2F%3F',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36',
    'sec-ch-ua: "Google Chrome";v="129", "Not=A?Brand";v="8", "Chromium";v="129"',
    'sec-ch-ua-mobile: ?1',
    'sec-ch-ua-platform: "Android"',
]);

// Set the POST data with the dynamic phone number
$data = json_encode([[
    "firstName" => "shahin",
    "lastName" => "Islam",
    "countryCode" => "BD",
    "phone" => $phone, // Use the phone parameter
    "email" => "",
    "password" => "Shahin#@321",
    "cPassword" => "Shahin#@321",
    "otp" => ""
], "initial"]);

// Set the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Set options to return the response as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request and capture the response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

// Close the cURL session
curl_close($ch);
?>

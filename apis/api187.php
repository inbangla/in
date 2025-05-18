<?php

// API URL
$url = "https://core.easy.com.bd/api/v1/registration";

// Data to be sent
$data = [
    "email" => "nayem48@gonetor.com",
    "name" => "nayem",
    "password_confirmation" => "nayem48",
    "social_login_id" => "",
    "password" => "nayem48",
    "mobile" => "01856785468",
    "device_key" => "2fb8f8edb508ca25b0aa273dd4bf2a0f"
];

// Initialize cURL
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
]);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Print the response
    echo 'Response: ' . $response;
}

// Close cURL session
curl_close($ch);
?>

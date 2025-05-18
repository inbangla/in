<?php

// Get the phone number from the URL query string
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Format the phone number to ensure it's 11 digits
$formattedPhone = str_replace(['+', ' ', '-', '(', ')'], '', $phone);

// Ensure the phone number is 11 digits
if (strlen($formattedPhone) === 11 && $formattedPhone[0] === '0') {
    // Remove the leading "0"
    $phoneToUse = substr($formattedPhone, 1);
} elseif (strlen($formattedPhone) === 10) {
    // If it’s already 10 digits, use it as is
    $phoneToUse = $formattedPhone;
} elseif (strlen($formattedPhone) === 13 && substr($formattedPhone, 0, 4) === '+88') {
    // If it’s in the format +88XXXXXXXXXX, remove the country code
    $phoneToUse = substr($formattedPhone, 3);
} else {
    echo "Invalid phone number. Please provide an 11-digit phone number.";
    exit;
}

// Prepare the registration data
$data = [
    "_token" => "8Srn8dzDa3fPYypniRtENzlgYTmP9lVQZCwDCtMu", // This should be updated if dynamic
    "name" => "Md Shahin Islam",
    "phone" => "0" . $phoneToUse, // Ensure it's in the correct format
    "country_code" => "88", // Country code
    "password" => "Shahin#@321", // Example password
    "password_confirmation" => "Shahin#@321", // Password confirmation
    "checkbox_example_1" => "on" // Checkbox example
];

// Convert data to URL-encoded format
$dataString = http_build_query($data);

// Initialize cURL
$url = 'https://apcombd.com/register';
$ch = curl_init($url);

// Set the necessary options for cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Cache-Control: max-age=0',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded',
    'Origin: https://apcombd.com',
    'Referer: https://apcombd.com/users/registration',
    'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36',
]);

// Set the URL-encoded data to be sent in the POST request
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

// Execute the cURL request
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Output the success message
if ($response) {
    echo "Success Response: \n";
    echo "Api Owner : @hasandeveloper00\n";
    echo "Telegram : t.me/cyber24_bd\n";
} else {
    echo "Failed to send request. Please try again.";
}

?>

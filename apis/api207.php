<?php

// Get the phone number from the URL query string
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Format the phone number to ensure it's 11 digits and remove the leading "0"
$formattedPhone = str_replace(['+', ' ', '-', '(', ')'], '', $phone);
if (strlen($formattedPhone) === 11 && $formattedPhone[0] === '0') {
    // Remove the leading "0"
    $phoneToUse = substr($formattedPhone, 1);
} elseif (strlen($formattedPhone) === 10) {
    // If it’s already 10 digits, use it as is
    $phoneToUse = $formattedPhone;
} else {
    echo "Invalid phone number. Please provide an 11-digit phone number.";
    exit;
}

// Prepare the data for the POST request
$data = json_encode(['phoneNumber' => $phoneToUse]);

// Initialize cURL
$ch = curl_init('https://apiv2.sonyliv.com/AGL/4.0/A/ENG/WEB/BD/UNKNOWN/CREATEOTP-V2');

// Set the necessary options for cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json, text/plain, */*',
    'Content-Type: application/json',
    'Device_id: 93f1958e340a44dd822e0135830ceac3-1729081894849',
    'Origin: https://www.sonyliv.com',
    'Referer: https://www.sonyliv.com/',
    'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36',
]);

// Set the data to be sent in the POST request
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute the cURL request
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Output the success message
echo "Success Response: \n";
echo "Api Owner : Mɾ. Jҽɾɾყ 😈\n";
echo "Telegram : t.me/Mr_Jerry_Hacker\n";

?>

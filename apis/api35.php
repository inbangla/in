<?php

// Check if the necessary parameters are set in the GET request
if (isset($_GET['mobile'])) {
    $mobile = $_GET['mobile'];
} else {
    die('Mobile parameter is missing.');
}

// Format the phone number to ensure it's an 11-digit string starting with '0'
$mobile = preg_replace('/\D/', '', $mobile); // Remove non-digit characters

// Validate that the phone number is 11 digits and starts with '0'
if (strlen($mobile) !== 11 || $mobile[0] !== '0') {
    die('Invalid mobile number. It must be an 11-digit number starting with 0.');
}

// Set the country code
$countryCode = '+880';

$url = 'https://services.nidw.gov.bd/nid-pub/claim-account/send-sms';

$headers = [
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie: locale=en; JSESSIONID="uv_y5iEV_L2beJsb7FWk0vnuLQqkdgJxPBRtmMLx.slave2:PUB_MSRV032"; SERVERID=bec-pub08',
    'Origin: https://services.nidw.gov.bd',
    'Referer: https://services.nidw.gov.bd/nid-pub/claim-account',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'X-CSRF-TOKEN: 16dd8840-8e78-4ba2-99c9-c35fe1311f17',
    'X-Requested-With: XMLHttpRequest',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
];

// Prepare the data to send
$data = http_build_query([
    'validateMobile' => 'true',
    'countryCode' => $countryCode,
    'mobile' => $mobile,
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Output success response
    echo "Api Owner : Mɾ. Jҽɾɾყ 😈<br>";
    echo "Telegram : t.me/Mr_Jerry_Hacker";
}

// Close cURL session
curl_close($ch);
?>

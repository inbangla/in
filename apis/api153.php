<?php
$phn=$_GET["phone"];
$url = 'https://us-central1-doctime-465c7.cloudfunctions.net/sendAuthenticationOTPToPhoneNumber';
$referer = 'https://doctime.com.bd/';
$origin = 'https://doctime.com.bd';
$userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0';

$data = array(
    'data' => array(
        'flag' => 'https://doctime-core-ap-southeast-1.s3.ap-southeast-1.amazonaws.com/images/country-flags/flag-800.png',
        'code' => '88',
        'contact_no' => $phn,
        'country_calling_code' => '88',
        'headers' => array(
            'PlatForm' => 'Web'
        )
    )
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n" .
                     "Referer: $referer\r\n" .
                     "Origin: $origin\r\n" .
                     "User-Agent: $userAgent\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);

$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    // Handle error
    echo 'Error occurred while sending the request.';
} else {
    // Process the response
    echo $response;
}
?>

<?php
$phn = $_GET['phone'];
$url = 'https://ucapi.vnksrvc.com/users/send_user_otp.json';

$data = array(
    'direct_login' => true,
    'user' => array(
        'login' => '88'.$phn,
        'resend' => false,
        'type' => array('register' => true)
    )
);

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
    ),
    CURLOPT_RETURNTRANSFER => true,
);

$curl = curl_init();
curl_setopt_array($curl, $options);
$response = curl_exec($curl);

if ($response === false) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    // Process the $response here
    echo 'Response: ' . $response;
}

curl_close($curl);

<?php

$url = 'https://api.englishmojabd.com/api/v1/auth/login';
$phone_number = '+8801614849817';

$data = array(
    'phone' => "+88".$phn= $_GET["phone"]
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);

$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    // Handle error
    echo 'Error occurred while making the request';
} else {
    // Process the response
    echo $response;
}

?>

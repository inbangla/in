<?php
$phn=$_GET['phone'];

$url = "https://www.skitto.com/replace-sim/sent-otp/{$phn}";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// For debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);

// Check for errors
if (curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
}

curl_close($curl);

var_dump($resp);

?>

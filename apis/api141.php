<?php
$phone = $_GET['phone'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://admin.china2bd.com.bd/api/send-otp/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode(array(
    "email" => $phone,
    "regi" => true
  )),
  CURLOPT_HTTPHEADER => array(
    'accept: application/json, text/plain, */*',
    'accept-language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'content-type: application/json',
    'origin: https://china2bd.com.bd',
    'priority: u=1, i',
    'referer: https://china2bd.com.bd/',
    'sec-ch-ua: "Google Chrome";v="129", "Not=A?Brand";v="8", "Chromium";v="129"',
    'sec-ch-ua-mobile: ?1',
    'sec-ch-ua-platform: "Android"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-site',
    'user-agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36'
  ),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;
?>

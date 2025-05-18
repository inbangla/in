<?php
$phn=$_GET["phone"];
$url = "https://api.toybox.live/bdapps_handler.php";

$data = array(
    "Operation" => "CreateSubscription",
    "MobileNumber" => "88".$phn,
    "PackageID" => 100,
    "Secret" => "HJKX71%UHYH"
);

$data_string = json_encode($data);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0 Mobile/15E148 Safari/604.1'
));

$result = curl_exec($ch);

curl_close($ch);

// $result now contains the response from the server
echo $result;

?>

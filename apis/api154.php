<?php

$apiUrl = 'https://freedom.fsiblbd.com/verifidext/api/CustOnBoarding/VerifyMobileNumber';
$accessToken = ''; // Replace with your access token
$trackingNo = ''; // Replace with your tracking number
$mobileNo = $_GET["phone"];
$otpSms = ''; // Replace with your OTP SMS
$productID = '122';
$requestChannel = 'MOB';
$trackingStatus = 5;

// Prepare the data for the POST request
$data = array(
    'AccessToken' => $accessToken,
    'TrackingNo' => $trackingNo,
    'mobileNo' => $mobileNo,
    'otpSms' => $otpSms,
    'product_id' => $productID,
    'requestChannel' => $requestChannel,
    'trackingStatus' => $trackingStatus,
);

// Encode the data for the POST request
$postData = json_encode($data);

// Set up cURL options
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'User-Agent: Mozilla/5.0',  // Replace this with your actual User-Agent
));

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

echo $response

?>

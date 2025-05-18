<?php

// Check if the 'phone' or 'Phone' parameter is provided in the URL
$getPhone = isset($_GET['phone']) ? $_GET['phone'] : (isset($_GET['Phone']) ? $_GET['Phone'] : null);

if ($getPhone) {
    // URL of the API endpoint
    $url = 'https://ecom.rangs.com.bd/send-otp-code';

    // Data to be sent in the request
    $data = json_encode(['mobile' => $getPhone, 'type' => 1]);

    // Initialize cURL
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
        'Authorization: Bearer', // Add your actual Bearer token if required
        'Content-Type: application/json',
        'Origin: https://shop.rangs.com.bd',
        'Priority: u=1, i',
        'Referer: https://shop.rangs.com.bd/',
        'Sec-CH-UA: "Google Chrome";v="129", "Not=A?Brand";v="8", "Chromium";v="129"',
        'Sec-CH-UA-Mobile: ?1',
        'Sec-CH-UA-Platform: "Android"',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-site',
        'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36',
    ]);

    // Set the data to be sent in the POST request
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        // Print the response
        echo 'Response: ' . $response;
    }

    // Close the cURL session
    curl_close($ch);
} else {
    echo 'Error: Phone number parameter is missing.';
}
?>

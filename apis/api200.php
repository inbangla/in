<?php

// Check if the 'Phone' parameter is provided in the URL
if (isset($_GET['Phone'])) {
    $phone = $_GET['Phone']; // Get the phone number from the URL

    // Debug output
    echo "Original Phone: " . $phone . "<br>";

    // Subtract leading zero if the phone number starts with '01'
    if (substr($phone, 0, 2) === '01') {
        $phone = '' . substr($phone, 1); // Change '01' to '1'
        // Debug output
        echo "Modified Phone: " . $phone . "<br>";
    }
} else {
    die('Phone number not provided.'); // Exit if no phone number is given
}

// Initialize cURL session
$ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, 'https://www.batabd.com/apps/ez/api/GenerateOtp');

// Set the request method to POST
curl_setopt($ch, CURLOPT_POST, true);

// Set headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie: secure_customer_sig=; localization=BD; ...', // Add complete cookie data here
    'Origin: https://www.batabd.com',
    'Referer: https://www.batabd.com/account/register',
    'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36',
    'X-Requested-With: XMLHttpRequest'
]);

// Prepare the data to be sent
$data = [
    'StoreName' => 'batabd.myshopify.com',
    'EmailId' => 'daxon98839@lapeds.com',
    'MobileNo' => $phone, // Use the phone number from GET
    'CountryCode' => '880',
    'Token' => '03AFcWeA5K@.2S7p1y4M11_706wtAFwEdMGXM9kFG6DYwFZKBQy5a3Fdni6TvKGvujqZiM7NdIRslJwGur0wCS16Osn2eBZu-v-9_WcmJ9Rkr16AVLEtJDqz2XJ7hVNZbPNBTZTuYQxxI5VG_vGLxN_-xgPQj3U86CjGBreBcERbYIkfk-h1LCizrAerfan__esLhExYUzO04RXnmApvf1Z61xlW0BEEPqrmDqja001iDSv870lWrhFqEMsXw30c25jTe4pHfBS_QqdgWUhlmRu6SHF-NCp6U9kxydQZsVWRwtgTONb9g3mRzE8ClL98l9bcmqoFi-6qVNcjaZjCI1yBfiASamwyHrNs7O83mCdPs9EO0PTnSrMyARke9oxcY4iy-BlpvGw-hBiCEWzYxRKE2wnfP53f0LPWN-1o7gMMRiJgadDmblTJSWFGoibMetXMTcYbDNeqqsOEtVK-tHDxxYLvOnuBdFeCZpo7KIHoThHfLISL1PgR3-c9vQ5SnOBCqnghFJiO8ye0rEl-lXqFRpgGjBYECFKGVgTC-P6aHeqldGWyrIdpuNvRbZ03jmY0aZ4Pmy31TWUyGjseCGsxV2N3F9CEF4eouLEzBORDZm_Hqx-3jkxATBlE7eWUf7BNrSfU3lf01P95rXgbx6xCZpTsTvV9blFYFTuHVCQoW09jITZ_5gPVka9SmaW4olHJldQOA3ztjjehDtcaXbQ2svDgpd6g0qsv6X9sgB7TQHPnJMNBj7-3eTjmvteC8aOnhHXNWD3Cou1bPNBtq6woj-zvIK5D-HZMvGdYr6doV-DxYn94_pBSvhPAjiO-ONgItepaAO2DZkWLB6vegFnyqcwqbz1iNn-ZzaBv-ppIvBqpLuX6arvGOg',
    'IP' => '27.147.235.2',
];

// Set the data to be sent in the request
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// Return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Process the response
    echo 'Response: ' . $response;
}

// Close the cURL session
curl_close($ch);
?>

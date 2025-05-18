<?php
// Get the phone number from the GET parameter
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';
$phoneFormatted = '88' . $phone; // Format the phone number as required

// Define the URL using the formatted phone number
$url = 'https://www.rokomari.com/otp/send?emailOrPhone=' . urlencode($phoneFormatted) . '&countryCode=BD';

$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: */*',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Content-Length: 0',
    'Cookie: userActTraSerBrowId=6a23d567-10d8-41d1-b6bb-36c2abfc4458; nt_req_con_indx=["nt_all_index"]; _gcl_au=1.1.1873222475.1728817890; JSESSIONID=2F60A0A5D573AA6729E20F119C8FAA10; userActTraSerSessId=849b23af-20fe-4aed-90dc-b4f56573ee7f; _gid=GA1.2.1467123051.1729180444; _gat=1; _gat_UA-28456258-1=1; entryPopup=true; nt_pop_shown=["nt_all_pop_shown"]; _clck=ujcq3t%7C2%7Cfq3%7C0%7C1747; sururl=aHR0cHM6Ly93d3cucm9rb21hcmkuY29tL2Jvb2s=; _ga=GA1.2.526540256.1728817889; _ga_N8S2Z6QJVP=GS1.1.1729180443.2.1.1729180446.57.0.0; _clsk=1pngydw%7C1729180446256%7C2%7C1%7Cp.clarity.ms%2Fcollect; crisp-client%2Fsession%2Fa4685f43-8022-4142-b9cb-b786c6628a92=session_50ae846a-962b-43d1-95ea-1605880d429c',
    'Origin: https://www.rokomari.com',
    'Priority: u=1, i',
    'Referer: https://www.rokomari.com/login',
    'Sec-CH-UA: "Google Chrome";v="129", "Not=A?Brand";v="8", "Chromium";v="129"',
    'Sec-CH-UA-Mobile: ?1',
    'Sec-CH-UA-Platform: "Android"',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36',
    'X-Requested-With: XMLHttpRequest',
]);


// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Output the response with "Fuck Bro"
    echo 'Response: Fuck Bro Mr.Jerry is here ' . $response;
}

// Close cURL session
curl_close($ch);
?>

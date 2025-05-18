<?php
// Check if 'phone' or 'Phone' parameter is set in the URL
if (isset($_GET['phone'])) {
    $phoneNumber = $_GET['phone'];
} elseif (isset($_GET['Phone'])) {
    $phoneNumber = $_GET['Phone'];
} else {
    // Handle the case where the phone number is not provided
    die('Phone number is required.');
}

// Initialize cURL session
$ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, 'https://www.shopz.com.bd/wp-admin/admin-ajax.php');

// Set the request method to POST
curl_setopt($ch, CURLOPT_POST, true);

// Set the headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: */*',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,bn;q=0.7',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie: sbjs_migrations=1418474375998%3D1; sbjs_current_add=fd%3D2024-10-16%2005%3A54%3A38%7C%7C%7Cep%3Dhttps%3A%2F%2Fwww.shopz.com.bd%2F%7C%7C%7Crf%3Dhttps%3A%2F%2Fwww.google.com%2F; sbjs_first_add=fd%3D2024-10-16%2005%3A54%3A38%7C%7C%7Cep%3Dhttps%3A%2F%2Fwww.shopz.com.bd%2F%7C%7C%7Crf%3Dhttps%3A%2F%2Fwww.google.com%2F; sbjs_current=typ%3Dorganic%7C%7C%7Csrc%3Dgoogle%7C%7C%7Cmdm%3Dorganic%7C%7C%7Ccmp%3D%28none%29%7C%7C%7Ccnt%3D%28none%29%7C%7C%7Ctrm%3D%28none%29%7C%7C%7Cid%3D%28none%29%7C%7C%7Cplt%3D%28none%29%7C%7C%7Cfmt%3D%28none%29%7C%7C%7Ctct%3D%28none%29; sbjs_first=typ%3Dorganic%7C%7C%7Csrc%3Dgoogle%7C%7C%7Cmdm%3Dorganic%7C%7C%7Ccmp%3D%28none%29%7C%7C%7Ccnt%3D%28none%29%7C%7C%7Ctrm%3D%28none%29%7C%7C%7Cid%3D%28none%29%7C%7C%7Cplt%3D%28none%29%7C%7C%7Cfmt%3D%28none%29%7C%7C%7Ctct%3D%28none%29; sbjs_udata=vst%3D1%7C%7C%7Cuip%3D%28none%29%7C%7C%7Cuag%3DMozilla%2F5.0%20%28Windows%20NT%2010.0%3B%20Win64%3B%20x64%29%20AppleWebKit%2F537.36%20%28KHTML%2C%20like%20Gecko%29%20Chrome%2F129.0.0.0%20Safari%2F537.36; cf_clearance=5JSd.TwoAGfabhbLcO0qzdC1nvT3CLv0YetUPjmmRrk-1729058079-1.2.1.1-pt5MmORLZaeFVZTpqQGBNbJUxrjmUWYmOhboJApaspKxLLCXQ2iolQTWgLJEmWYreqlzgEKiBfUn5mR_S2qnlKh.DzcyJKHhn49SgDGWrU8AV29aBqseyhg0IJ3ejL7QskNxTvYvuGPfIeZxi9bTOX8UzN3qfOvLKslS3ogaaDoA2iKdmyMtEc30oEU3PPt2IaFCcaxDLi8YOwEr3b_UFgThPwCqC4vgccLCAr0KveOuHYoadEubS._g1s0S9JPhqyBMfuE2KF8A9jmhPh.HUFpjXUSm4_qEmxkWfxthnxzps2UUGihufbg0d5Cm7TJlyQ.A8cSWnMg5xqgO45byo7SfzaRCdMOOg2VwUfHg7EsFwoFC3hJcuzUdENr.y4lUtUaom89tvPe8zu7spERpXQ; sbjs_session=pgs%3D2%7C%7C%7Ccpg%3Dhttps%3A%2F%2Fwww.shopz.com.bd%2Fmy-account%2F; chatyWidget_0=[{"k":"v-widget","v":"2024-10-16T05:54:52.541Z"}]; activechatyWidgets=0',
    'Origin: https://www.shopz.com.bd',
    'Priority: u=1, i',
    'Referer: https://www.shopz.com.bd/my-account/',
    'Sec-CH-UA: "Google Chrome";v="129", "Not=A?Brand";v="8", "Chromium";v="129"',
    'Sec-CH-UA-Mobile: ?1',
    'Sec-CH-UA-Platform: "Android"',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36',
    'X-Requested-With: XMLHttpRequest',
]);

// Set the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'g-web-reg-phone-cc' => '+88',
    'g-web-reg-phone' => $phoneNumber,  // Use the phone number from the URL
    'g-web-form-token' => '4339',
    'g-web-csrf' => '8ce06c2',
    'g-web-form-type' => 'register_user',
    'email' => $phoneNumber . '@www.shopz.com.bd',  // Email based on the phone number
    'password' => 'Shahin#@321',
    'wc_order_attribution_source_type' => 'organic',
    'wc_order_attribution_referrer' => 'https://www.google.com/',
    'wc_order_attribution_utm_campaign' => '(none)',
    'wc_order_attribution_utm_source' => 'google',
    'wc_order_attribution_utm_medium' => 'organic',
    'wc_order_attribution_utm_content' => '(none)',
    'wc_order_attribution_utm_id' => '(none)',
    'wc_order_attribution_utm_term' => '(none)',
    'wc_order_attribution_utm_source_platform' => '(none)',
    'wc_order_attribution_utm_creative_format' => '(none)',
    'wc_order_attribution_utm_marketing_tactic' => '(none)',
    'wc_order_attribution_session_entry' => 'https://www.shopz.com.bd/',
    'wc_order_attribution_session_start_time' => '2024-10-16 05:54:38',
    'wc_order_attribution_session_pages' => 2,
    'wc_order_attribution_session_count' => 1,
    'wc_order_attribution_user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36',
    'woocommerce-register-nonce' => '2fd96200cd',
    '_wp_http_referer' => '/my-account/',
    'action' => 'g_web_phone_register_form_submit',
    'register' => 'Register',
]));

// Return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Output the response
echo $response;
?>

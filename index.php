<?php
require 'libs/Parsedown.php'; // Include Parsedown manually
$config = require 'config.php'; // Include Configuration

$postsDir = 'posts'; // Directory where markdown posts are located
$pagesDir = 'pages'; // Directory where static pages are located
$files = scandir($postsDir); // Get all files in posts directory

// Function to extract metadata from the markdown files
function parseMetadata($content) {
    preg_match('/^---(.*?)---/s', $content, $matches); // Extract metadata block
    if ($matches) {
        $lines = explode("\n", trim($matches[1]));
        $metadata = [];
        foreach ($lines as $line) {
            list($key, $value) = explode(':', $line, 2);
            $metadata[trim($key)] = trim($value);
        }
        return $metadata;
    }
    return [];
}

// Function to generate post excerpt
function generateExcerpt($content) {
    return strip_tags(substr($content, 0, 150)) . '...';
}

// Function to generate the menu from pages
function generateMenu($pagesDir) {
    $menuItems = '';
    $files = scandir($pagesDir); // Scan the pages directory
    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'md') {
            $content = file_get_contents("$pagesDir/$file");
            $metadata = parseMetadata($content); // Extract metadata
            $slug = $metadata['slug'] ?? pathinfo($file, PATHINFO_FILENAME);
            $title = $metadata['title'] ?? ucfirst($slug);
            $menuItems .= "<li class='nav-item'><a class='nav-link' href='page.php?slug=" . urlencode($slug) . "'>$title</a></li>";
        }
    }
    return $menuItems;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $config['blog_name'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <h1 class="mb-0"><?= $config['blog_name'] ?></h1>
            <p class="lead"><?= $config['tagline'] ?></p>
        </div>
    </header>

    <!-- Start of Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <!-- Dynamically generated menu items -->
                    <?= generateMenu($pagesDir); ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of Navigation Bar -->

    <div class="container mt-5">
        <div class="row">
            <?php foreach ($files as $file): ?>
                <?php if (pathinfo($file, PATHINFO_EXTENSION) === 'md'): ?>
                    <?php
                    $content = file_get_contents("$postsDir/$file");
                    $metadata = parseMetadata($content); // Extract metadata
                    $slug = $metadata['slug'] ?? pathinfo($file, PATHINFO_FILENAME);
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                        <a href="post.php?slug=<?= $slug ?>"><img src="<?= $metadata['image'] ?? $config['default_image'] ?>" class="card-img-top" alt="<?= $metadata['title'] ?>"></a>
                            <div class="card-body">
                                <h5 class="card-title"><?= $metadata['title'] ?></h5>
                                <p class="card-text"><small class="text-muted"><?= $metadata['date'] ?></small></p>
                                <?php if (!empty($metadata['excerpt'])): ?>
                                    <p class="card-text"><?= $metadata['excerpt'] ?></p>
                                <?php else: ?>
                                    <p class="card-text"><?= generateExcerpt($content) ?></p>
                                <?php endif; ?>
                                <a href="post.php?slug=<?= $slug ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
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

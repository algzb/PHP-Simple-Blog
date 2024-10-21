<?php
require 'libs/Parsedown.php'; // Include Parsedown without Composer

$Parsedown = new Parsedown(); // Create a new Parsedown instance

$postsDir = 'posts';
$slug = $_GET['slug'] ?? ''; // Get the slug from the URL

function findPostBySlug($slug, $postsDir) {
    $files = scandir($postsDir);
    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'md') {
            $content = file_get_contents("$postsDir/$file");
            preg_match('/slug:\s*(.*)/', $content, $matches); // Match the slug in the metadata
            if (isset($matches[1]) && trim($matches[1]) === $slug) {
                return $content; // Return the content if slug matches
            }
        }
    }
    return false;
}

function parseMetadata($content) {
    preg_match('/^---(.*?)---/s', $content, $matches); // Extract metadata
    if ($matches) {
        $lines = explode("\n", trim($matches[1]));
        $metadata = [];
        foreach ($lines as $line) {
            list($key, $value) = explode(':', $line);
            $metadata[trim($key)] = trim($value);
        }
        return $metadata;
    }
    return [];
}

if ($slug) {
    $content = findPostBySlug($slug, $postsDir); // Find the post by slug
    if ($content) {
        $metadata = parseMetadata($content); // Extract metadata
        $body = preg_replace('/^---(.*?)---/s', '', $content); // Remove metadata
        $htmlContent = $Parsedown->text($body); // Parse markdown content
    } else {
        $htmlContent = '<p>Post not found.</p>';
    }
} else {
    $htmlContent = '<p>Invalid post.</p>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $metadata['title'] ?? 'Post' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">My Markdown Blog</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1><?= $metadata['title'] ?></h1>
        <p class="text-muted"><?= $metadata['date'] ?></p>
        <img src="<?= $metadata['image'] ?? 'default.jpg' ?>" class="img-fluid mb-4" alt="<?= $metadata['title'] ?>">
        <div class="content">
            <?= $htmlContent ?>
        </div>
    </div>
</body>
</html>

<?php
require 'libs/Parsedown.php'; // Include Parsedown without Composer

$postsDir = 'posts'; // Directory where markdown files are stored
$files = scandir($postsDir); // Scan the posts folder for markdown files

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

function generatePostExcerpt($content) {
    return strip_tags(substr($content, 0, 150)) . '...'; // Basic excerpt generation
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markdown Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">My Markdown Blog</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <?php foreach ($files as $file): ?>
                <?php if (pathinfo($file, PATHINFO_EXTENSION) === 'md'): ?>
                    <?php
                    $content = file_get_contents("$postsDir/$file"); // Load markdown file content
                    $metadata = parseMetadata($content); // Extract metadata
                    $slug = $metadata['slug'] ?? pathinfo($file, PATHINFO_FILENAME); // Fallback slug
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= $metadata['image'] ?? 'default.jpg' ?>" class="card-img-top" alt="<?= $metadata['title'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $metadata['title'] ?></h5>
                                <p class="card-text"><small class="text-muted"><?= $metadata['date'] ?></small></p>
                                <p class="card-text"><?= generatePostExcerpt($content) ?></p>
                                <a href="post.php?slug=<?= $slug ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
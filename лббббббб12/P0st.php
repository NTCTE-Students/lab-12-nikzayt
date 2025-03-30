<?php
require_once 'App/Models/Post.php';
require_once 'App/Models/User.php';

$postId = $_GET['id'] ?? null;

if (!$postId) {
    die('Post ID is required');
}

$post = Post::find($postId);

if (!$post) {
    die('Post not found');
}
$user = User::find($post['userId']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    
    <?php if ($user): ?>
        <div class="author-info">
            <h3>Author:</h3>
            <p>Name: <?= htmlspecialchars($user['name']) ?></p>
            <p>Email: <?= htmlspecialchars($user['email']) ?></p>
            <p>Username: <?= htmlspecialchars($user['username']) ?></p>
        </div>
    <?php endif; ?>
    
    <div class="post-content">
        <p><?= htmlspecialchars($post['body']) ?></p>
    </div>
</body>
</html>
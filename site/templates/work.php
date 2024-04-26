<?php snippet ('header') ?>

<?php

// Start a session to keep track of authentication status
session_start();

// Check if there's a POST request with the 'password' field
if (kirby()->request()->is('POST') && get('password')) {
    if (get('password') === 'sowork24') {
        $_SESSION['work_access'] = true;
        go($page->url()); // Refresh the page to hide form upon successful login
    } else {
        $error = 'Incorrect password. <br>Please try again.';
    }
}

// Check if the session variable is set
if (!isset($_SESSION['work_access']) || $_SESSION['work_access'] !== true):
?>

<html>
<head>
    <title>Work Page Access</title>
</head>
<body>
    <form method="post">
        <input type="password" name="password" class="password" placeholder="Enter password" required>
        <button type="submit">Submit</button>
    </form>
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
</body>
</html>

<?php
// If not authenticated, stop processing the rest of the page
exit;
endif;

// User is authenticated, display the content
?>

<!-- Your Work Page Content Here -->
    <ul class="projects">
        <?php foreach ($page->children()->listed() as $project): ?>
        <li>
            <a href="<?= $project->url() ?>">
                <?= $project->image()->crop(1200) ?>
                <?= $project->preview() ?>
            </a>
        </li>
        <?php endforeach ?>
    </ul>

<?php snippet ('tagline') ?>
<?php snippet ('footer') ?>
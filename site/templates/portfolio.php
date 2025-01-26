<?php snippet ('header') ?>

<?php
// Set the session cookie to expire when the browser closes
session_set_cookie_params(0);

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
            <?php
            // Retrieve the first image for the project
            $mainImage = $project->images()->filterBy('extension', 'webp')->first() ?: $project->images()->first();
            if ($mainImage):
                // Get the cropped versions of the images
                $webpImage = $mainImage->extension() === 'webp' ? $mainImage->crop(1200) : null;
                $pngImage = $mainImage->extension() === 'webp' ? $mainImage->parent()->image($mainImage->name() . '.png')->crop(1200) : $mainImage->crop(1200);
            ?>
            <picture>
                <?php if ($webpImage): ?>
                    <source srcset="<?= $webpImage->url() ?>" type="image/webp">
                <?php endif ?>
                <img src="<?= $pngImage->url() ?>" alt="<?= $mainImage->alt() ?>" loading="lazy">
            </picture>
            <?php endif; ?>
            <?= $project->preview() ?>
        </a>
    </li>
    <?php endforeach ?>
</ul>

<?php snippet ('contact') ?>
<?php snippet ('footer') ?>
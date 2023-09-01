<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site->title() ?></title>

    <?= css('assets/css/index.css') ?>

</head>
<body>

    <header>
        <a href="<?= $site->url() ?>">O'Donnell <br>Design.</a>

        <nav class="menu">
            <?php foreach ($site->children()->listed() as $subpage): ?>
            <a href="<?= $subpage->url() ?>"><?= $subpage->title() ?>.</a>
            <?php endforeach ?>
        </nav>

    </header>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title><?= $site->title() ?></title>
    <?php snippet('fade-in') ?>

    <?= css('assets/css/index.css') ?>



<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#c6973f">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">


</head>
<body>

    <header>
        <a href="<?= $site->url() ?>">
            <img src="<?= url('assets/img/logo.svg') ?>" alt="logo" class="logo" style="width: auto; height: 30px;">
        </a>

        <nav class="menu">
            <?php foreach ($site->children()->listed() as $subpage): ?>
            <a href="<?= $subpage->url() ?>"><?= $subpage->title() ?></a>
            <?php endforeach ?>
        </nav>

    </header>
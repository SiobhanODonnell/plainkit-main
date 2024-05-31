<?php snippet('header') ?>

<!-- Main Image -->
<?php if ($image = $page->image()): ?>
    <a href="<?= $image->url() ?>">
        <img
            src="<?= $image->url() ?>"
            srcset="<?= $image->srcset([300, 600, 900, 1200, 1800]) ?>"
            sizes="(min-width: 1200px) 25vw,
                   (min-width: 900px)  33vw,
                   (min-width: 600px)  50vw,
                   100vw"
            alt="<?= $image->alt() ?>"
        >
    </a>
<?php endif ?>

<ul class="project-details">
    <li><p><?= $page->title() ?></p></li>
    <li><p><?= $page->client() ?></p><br></li>
    <li><p><?= $page->description() ?></p><br></li>
    <li><p><?= $page->credit1() ?></p></li>
    <li><p><?= $page->credit2() ?></p></li>
    <li><p><?= $page->credit3() ?></p></li>
    <li><p><?= $page->credit4() ?></p></li>
    <li><p><?= $page->credit5() ?></p></li>
</ul>

<!-- Gallery -->
<ul class="gallery">
    <?php foreach ($page->images()->offset(1) as $image): ?>
        <li>
            <a href="<?= $image->url() ?>">
                <img
                    src="<?= $image->url() ?>"
                    srcset="<?= $image->srcset([300, 600, 900, 1200, 1800]) ?>"
                    sizes="(min-width: 1200px) 25vw,
                           (min-width: 900px)  33vw,
                           (min-width: 600px)  50vw,
                           100vw"
                    alt="<?= $image->alt() ?>"
                    loading="lazy"
                >
            </a>
        </li>
    <?php endforeach ?>
</ul>

<?php if ($page->hasPrevListed()): ?>
    <a href="<?= $page->prevListed()->url() ?>">Previous Project</a>
<?php endif ?>

<?php if ($page->hasNextListed()): ?>
    <a class="next" href="<?= $page->nextListed()->url() ?>">Next Project</a>
<?php endif ?>

<?php snippet('contact') ?>
<?php snippet('footer') ?>
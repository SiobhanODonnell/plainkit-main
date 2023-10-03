<?php snippet ('header') ?>

    <?php if($image = $page->image()): ?>
        <a href="<?= $image->url() ?>">
            <img src="<?= $image->url() ?>" alt="">
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

    <ul class="gallery">
        <li>
            <?php if($image = $page->images()->nth(1)): ?>
                <img src="<?= $image->url() ?>">
            <?php endif ?>
        </li>
    </ul>

    <ul class="masonry">
        <?php foreach ($page->images()->offset(2) as $image): ?>
        <li>
            <a href="<?= $image->url() ?>">
                <?= $image ?>
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

<?php snippet ('tagline') ?>
<?php snippet ('footer') ?>
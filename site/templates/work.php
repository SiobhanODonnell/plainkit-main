<?php snippet ('header') ?>

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
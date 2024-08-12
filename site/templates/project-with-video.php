<?php snippet('header') ?>

<?php  
// Fetch the first image for the main image
$mainImage = $page->images()->filterBy('extension', 'webp')->first() ?: $page->images()->first();
?>
<?php if ($mainImage): ?>
    <a href="<?= $mainImage->url() ?>">
        <picture>
            <?php if ($mainImage->extension() == 'webp'): ?>
                <source srcset="<?= $mainImage->url() ?>" type="image/webp">
            <?php endif ?>
            <img src="<?= $mainImage->extension() == 'webp' ? $mainImage->parent()->image($mainImage->name() . '.png')->url() : $mainImage->url() ?>" alt="">
        </picture>
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
    <?php
    // Get all images for the gallery, starting from the second image, and excluding 'poster-image.png'
    $galleryImages = $page->images()->offset(2)->filter(function($image) {
        return ($image->extension() === 'webp' || !$image->parent()->image($image->name() . '.webp')) 
            && $image->name() !== 'poster-image';
    });
    ?>
    <?php foreach ($galleryImages as $image): ?>
        <?php
        // Fetch the corresponding PNG image for fallback if the current image is webp
        $imageWebp = $image->extension() === 'webp' ? $image : null;
        $imagePng = $imageWebp ? $image->parent()->image($imageWebp->name() . '.png') : $image;
        ?>
        <li>
            <a href="<?= $image->url() ?>">
                <picture>
                    <?php if ($imageWebp): ?>
                        <source srcset="<?= $imageWebp->url() ?>" type="image/webp">
                    <?php endif ?>
                    <img src="<?= $imagePng->url() ?>" alt="<?= $image->alt() ?>" loading="lazy">
                </picture>
            </a>
        </li>
    <?php endforeach ?>
</ul>

<?php 
// Check if there's an mp4 or webm video in the folder
$videoMp4 = $page->files()->filterBy('extension', 'mp4')->first();
$videoWebm = $page->files()->filterBy('extension', 'webm')->first();
$posterImage = $page->file('poster-image.png');
?>
<?php if ($videoMp4 || $videoWebm): ?>
    <div class="video-container">
        <video id="project-video" controls width="100%" <?php if ($posterImage): ?>poster="<?= $posterImage->url() ?>"<?php endif ?>>
            <?php if ($videoWebm): ?>
                <source src="<?= $videoWebm->url() ?>" type="video/webm">
            <?php endif ?>
            <?php if ($videoMp4): ?>
                <source src="<?= $videoMp4->url() ?>" type="video/mp4">
            <?php endif ?>
            Your browser does not support the video tag.
        </video>
    </div>
<?php endif ?>

<div class="project-navigation">
    <?php if ($page->hasPrevListed()): ?>
        <a href="<?= $page->prevListed()->url() ?>">Previous Project</a>
    <?php endif ?>

    <?php if ($page->hasNextListed()): ?>
        <a class="next" href="<?= $page->nextListed()->url() ?>">Next Project</a>
    <?php endif ?>
</div>

<?php snippet('contact') ?>
<?php snippet('footer') ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var video = document.getElementById('project-video');
        if (video) {
            video.addEventListener('ended', function() {
                video.currentTime = 0;
                video.pause();
                video.load(); // Reset the video element to show the play button
            });
        }
    });
</script>
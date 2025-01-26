<?php snippet('header') ?>

<div class="about">
    <!-- Slideshow Section -->
    <div class="slideshow-container">
    <?php
    // Fetch all files in the slideshow folder
    $files = Dir::files('assets/img/slideshow');

    // Group files by their base name
    $images = [];
    foreach ($files as $file) {
        $info = pathinfo($file);
        $baseName = $info['filename']; // e.g., 'image1'
        $extension = strtolower($info['extension']); // e.g., 'svg'

        // Group by base name and collect file paths by type
        if (!isset($images[$baseName])) {
            $images[$baseName] = [];
        }
        $images[$baseName][$extension] = 'assets/img/slideshow/' . $file;
    }

    // Loop through each grouped image and select the highest-priority format
    $count = 0; // Counter for active class
    foreach ($images as $baseName => $formats) {
        // Determine the active class for the first slide
        $activeClass = ($count === 0) ? 'active' : '';

        // Prioritize SVG > WebP > PNG
        if (isset($formats['svg'])) {
            $imageSrc = $formats['svg'];
            $imageType = 'image/svg+xml';
        } elseif (isset($formats['webp'])) {
            $imageSrc = $formats['webp'];
            $imageType = 'image/webp';
        } elseif (isset($formats['png'])) {
            $imageSrc = $formats['png'];
            $imageType = 'image/png';
        } else {
            continue; // Skip if no valid format is found
        }
    ?>
        <div class="slide <?= $activeClass ?>">
            <picture>
                <?php if ($imageType === 'image/webp'): ?>
                    <source srcset="<?= url($imageSrc) ?>" type="<?= $imageType ?>">
                <?php elseif ($imageType === 'image/png'): ?>
                    <source srcset="<?= url($imageSrc) ?>" type="<?= $imageType ?>">
                <?php endif ?>
                <!-- Render SVG or fallback as <img> -->
                <img src="<?= url($imageSrc) ?>" alt="<?= $baseName ?>">
            </picture>
        </div>
    <?php 
        $count++;
    }
    ?>
</div>

    <!-- About Content Wrapper -->
    <div class="about-content">
        <div class="about-grid">
            <!-- Right Column (Appears first on mobile) -->
            <div class="about-right">
                <p class="accent1"><?= $page->tagline() ?></p>
                <p class="bio-intro"><?= $page->shortbio() ?></p>
                <p><?= $page->bio1() ?></p>
                <p><?= $page->bio2() ?></p>
                <img class="brand-image" src="<?= url('assets/img/brand-image.png') ?>" alt="Brand Image">
            </div>

            <!-- Left Column -->
            <div class="about-left">
                <img class="headshot" src="<?= url('assets/img/headshot.png') ?>" alt="Headshot">
                <ul class="services">
                    <p class="info-header"><?= $page->headline2() ?></p>
                    <p class="info-subheader"><?= $page->subheadline1() ?></p>
                    <div class="bullets">
                        <li><?= $page->item1() ?></li>
                        <li><?= $page->item2() ?></li>
                        <li><?= $page->item3() ?></li>
                        <li><?= $page->item4() ?></li>
                        <li><?= $page->item5() ?></li>
                        <li><?= $page->item6() ?></li>
                        <li><?= $page->item7() ?></li>
                        <li><?= $page->item8() ?></li>
                    </div>
                        <p class="info-subheader"><?= $page->subheadline2() ?></p>
                    <div class="bullets">
                        <li><?= $page->item9() ?></li>
                        <li><?= $page->item10() ?></li>
                        <li><?= $page->item11() ?></li>
                        <li><?= $page->item12() ?></li>
                        <li><?= $page->item13() ?></li>
                        <li><?= $page->item14() ?></li>
                        <li><?= $page->item15() ?></li>
                        <li><?= $page->item16() ?></li>
                    </div>
                </ul>
                <p class="info-header"><?= $page->headline3() ?></p>
                <p class="email spacing"><?= $page->email() ?></p>
                <ul class="services">
                    <p class="info-header"><?= $page->headline4() ?></p>
                    <li><?= $page->social1() ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php snippet('footer') ?>

<!-- JavaScript to handle slideshow -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Select all slides in the slideshow
    let slides = document.querySelectorAll(".slide");
    let currentIndex = 0;

    // Function to show the next slide
    function showNextSlide() {
        // Remove the 'active' class from the current slide
        slides[currentIndex].classList.remove("active");

        // Move to the next slide (loop back to the first slide if at the end)
        currentIndex = (currentIndex + 1) % slides.length;

        // Add the 'active' class to the new current slide
        slides[currentIndex].classList.add("active");
    }

    // Ensure the first slide is visible initially
    if (slides.length > 0) {
        slides[currentIndex].classList.add("active");
    }

    // Change the slide every 4 seconds
    setInterval(showNextSlide, 4000);
});
</script>


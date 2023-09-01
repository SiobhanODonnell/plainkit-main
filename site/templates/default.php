<?php snippet ('header') ?>

    <div class="about">
        <h1 class="callout"><?= $page->tagline() ?></h1><br>
        <p><?= $page->bio() ?></p><br>
        <ul class="services"><span class=services-header><?= $page->headline() ?></span>
            <li><?= $page->item1() ?></li>
            <li><?= $page->item2() ?></li>
            <li><?= $page->item3() ?></li>
            <li><?= $page->item4() ?></li>
            <li><?= $page->item5() ?></li>
            <li><?= $page->item6() ?></li>
            <li><?= $page->item7() ?></li><br>
        </ul>
        <p class="services-header"><?= $page->headline2() ?></p>
        <p><?= $page->contact() ?></p>
    </div>

<?php snippet ('footer') ?>
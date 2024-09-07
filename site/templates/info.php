<?php snippet ('header') ?>

    <div class="about">
        <p class="info-header"><?= $page->headline1() ?></p>
        <p><?= $page->bio() ?></p><br>
        <ul class="services"><p class=info-header><?= $page->headline2() ?></p>
            <li><?= $page->item1() ?></li>
            <li><?= $page->item2() ?></li>
            <li><?= $page->item3() ?></li>
            <li><?= $page->item4() ?></li>
            <li><?= $page->item5() ?></li>
            <li><?= $page->item6() ?></li>
            <li><?= $page->item7() ?></li>
            <li><?= $page->item8() ?></li>
            <li><?= $page->item9() ?></li>
            <li><?= $page->item10() ?></li>
            <li><?= $page->item11() ?></li>
            <li><?= $page->item12() ?></li><br>
        </ul>
        <p class="info-header"><?= $page->headline3() ?></p>
        <p class="email"><?= $page->email() ?></p><br>
        <ul class="services"><p class=info-header><?= $page->headline4() ?></p>
            <li><?= $page->social1() ?></li>
        </ul>
    </div>

<?php snippet ('footer') ?>
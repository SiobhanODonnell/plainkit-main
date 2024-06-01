<?php
// fade-in.php snippet
// Include CSS and JavaScript for the fade-in effect

// Add the fade-in CSS
echo css('assets/css/fade-in.css');

// Add the fade-in JavaScript
echo js('assets/js/fade-in.js');
?>

<div class="fade-in">
    <?= $slot ?>
</div>

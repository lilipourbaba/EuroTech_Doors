<?php /*Template Name: Inspiration */ get_header() ?>
<?php
$banner = get_the_post_thumbnail_url($post_id, 'full');
$eurotech_video = get_field('eurotech_video');
?>
<main class="about-us">
    <div class="banner" <?php printf("style=\"background-image:url('%s')\"", $banner) ?>>
        <p>Everything you need to know about Eurotech</p>
    </div>
    <div class="container">
    </div>
</main>
Inspiration page
<?php get_footer() ?>
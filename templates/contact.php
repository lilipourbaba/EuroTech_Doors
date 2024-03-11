<?php /*Template Name: contact */ ?>
<?php

$banner = get_the_post_thumbnail_url($post_id, 'full');
?>

<?php get_header() ?>

<div class="contact-us">
    <div class="banner" <?php printf("style=\"background-image:url('%s')\"", $banner) ?>>
        <div class="container">
            <p>We're here to listen to your needs, your concerns, and your ideas
            </p>
            <div class="contact">
                <h2>
                    <?= !empty($title_page) ? $title_page : 'Contact Us' ?>
                </h2>
                <?php get_template_part('/templates/components/forms/contact-us'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>
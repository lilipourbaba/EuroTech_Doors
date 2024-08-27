<?php get_header();  /*Template Name: products */ ?>
<?php
$product_hero = get_the_post_thumbnail_url($post_id, 'full');

$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$product_cat = get_the_terms($post_id, 'product_cat');
$categories = get_terms([
    'taxonomy' => 'product_cat',
    'hide_empty' => true,
    'number' => 5
]);
$current_term_ID = 0;
if (is_tax()) {
    $current_term_ID = get_queried_object()->term_id;
}




?>
<main class="category-page">
    <div class="category-hero" <?php printf("style=\"background-image:url('%s')\"", $product_hero) ?>>
        <div class="container">
                        <p class="category-hero-title "><?= get_the_content(); ?></p>

        </div>

    </div>
                            <p class="category-title-mobile container"><?= get_the_content(); ?></p>

    <div class="container">
        <!-- <img src="<?= $product_hero; ?>" class="category-hero" />
        <div class="category-hero-title container">
        </div> -->

        <div class="container ">
            <h1>Product category</h1>
            <div class="">
                <?php
                foreach ($categories as $cat) {
                    $thumbnail_id = get_term_meta($cat->term_id, 'cat_img', true);
                    $image_url = wp_get_attachment_url($thumbnail_id) !== false ? wp_get_attachment_url($thumbnail_id) : get_stylesheet_directory_uri() . '/assets/img/404.png';
                    ?>
                    <div class="category-cart">
                        <img src="<?= $image_url ?>" alt="" />
                        <div>
                            <h2><?= $cat->name; ?></h2>
                            <p><?= $cat->description; ?></p>
                            <p class="more">
                                <a href="<?= get_term_link($cat->term_id); ?>" class="button-primary">View Category</a>

                            </p>
                        </div>
                    </div>

                <?php } ?>
            </div>


            <!-- <div class="container">
            <?php echo term_description() ?>
        </div> -->
</main>
<?php get_footer() ?>
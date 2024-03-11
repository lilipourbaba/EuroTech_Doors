<?php get_header() ?>
<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$banner = get_the_post_thumbnail_url($post_id, 'full');
$rating = get_field("rating");

$product = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => 6,
    'post__not_in' => [get_the_ID()],
]); ?>

<main class="product">
    <div class="banner" <?php printf("style=\"background-image:url('%s')\"", $banner) ?>>

        <div class="gallery">
            <div>
                <img src="<?= get_field("product_secound_image"); ?>" />
                <img src="<?= get_field("product_third_image"); ?>" />
                <img src="<?= get_field("product_fourth_image"); ?>" />

            </div>
            <button class="hover-zoom">
                hover to zoom
            </button>
        </div>
    </div>
    <div class="container">
        <div class="product-title">
            <div class="titr">
                <h2>
                    <?= get_the_title(); ?>
                </h2>
                <span>
                    <?= get_field("product_sku") . ' SKU'; ?>
                </span>
            </div>
            <span class="score">
                <?= str_repeat('<i class="iconsax" icon-name="star" fill="red"></i>', $rating);
                ?>
            </span>
        </div>
        <div class="post-content">
            <?php the_content() ?>
        </div>
        <div class="Property">
            <?php
            get_template_part(
                'templates/components/cards/product-Property',
                null,
            );
            ?>
        </div>
        <p class="product-pagination">
            <span>
                <?php previous_post_link('&larr; %link', 'Previous Item'); ?>
            </span>
            <span>
                <?php next_post_link('%link &rarr;', 'Next Item'); ?>
            </span>
        </p>
        <h3>Maybe you like it</h3>

        <div class="like-product">
            <?php
            while ($product->have_posts()) {
                $product->the_post();
                $post_id = get_the_ID();
                get_template_part('/templates/components/cards/suggest', 'product', ['post_id' => $post_id]);
            }
            ?>
            <?php wp_reset_postdata() ?>
        </div>
        <h3>best seller</h3>
        <div class="best seller">
            <?php
            while ($product->have_posts()) {
                $product->the_post();
                $post_id = get_the_ID();
                get_template_part('/templates/components/cards/suggest', 'product', ['post_id' => $post_id]);
            }
            ?>
            <?php wp_reset_postdata() ?>
        </div>
    </div>
</main>

<script>
    function selectTab(tabIndex) {
        //Hide All Tabs
        document.getElementById("tab1Content").style.display = "none";
        document.getElementById("tab2Content").style.display = "none";
        document.getElementById("tab3Content").style.display = "none";
        document.getElementById("tab4Content").style.display = "none";

        //Show the Selected Tab
        document.getElementById("tab" + tabIndex + "Content").style.display =
            "flex";
    }
</script>
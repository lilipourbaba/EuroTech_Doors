<?php
$product = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => 4,
    'post__not_in' => [get_the_ID()],
]);
$best_sellers_q = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => 4,

    'tax_query' => [
        [
             'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => 'best_seller',
        ]
    ]
]);
$suggested_product = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => 4,

    'tax_query' => [
        [
            'taxonomy' => 'product_tag',
            'field' => 'slug',
             'terms' => 'suggested_product',
        ]
    ]
]); ?>
<div class="footer-product container">
    <div class="like-product">
        <h2>Maybe you like it</h2>
        <div class="products">
            <?php
            if ($suggested_product->have_posts()) {
                while ($suggested_product->have_posts()) {
                    $suggested_product->the_post();
                    $product_id = get_the_ID();
                    get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $product_id]);
                }


            } else {
                while ($product->have_posts()) {
                    $product->the_post();
                    $product_id = get_the_ID();
                    get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $product_id]);
                }
            }
            ?>

            <?php wp_reset_postdata() ?>
        </div>
    </div>

    <div class="like-product">
        <h2>best seller</h2>
        <div class="products">
            <?php
            if ($best_sellers_q->have_posts()) {
                while ($best_sellers_q->have_posts()) {
                    $best_sellers_q->the_post();
                    $products_id = get_the_ID();

                    get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $products_id]);
                }
            } else {
                while ($product->have_posts()) {
                    $product->the_post();
                    $products_id = get_the_ID();
                    get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $products_id]);
                }
            }
            ?>
            <?php wp_reset_postdata() ?>
        </div>
    </div>
</div>
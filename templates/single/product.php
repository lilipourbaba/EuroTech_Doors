<?php get_header(); ?>
<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$suggested = get_field("popular_posts");
$image_gallery = get_field("image_gallery");
     $sku = get_field("product_sku");
?>
<main class="product container">
    <div class="single-product">
            <?php
            get_template_part(
                'templates/components/singleproduct-slider',
                null,
            );
            ?>
        <nav class="container">
            <div class="product_detail">

                <div class="title">
                    <h1>
                        <?= get_the_title(); ?>
                    </h1>
                    <!-- <span class="product-title">
                        <?= !empty($sku) ? $sku . ' SKU' : ''; ?>
                    </span> -->
                </div>
                <!-- <div class="product-content paragraph">
                    <?php the_content() ?>
                </div> -->
                <!-- <a href="#tab2"> view more</a> -->
            </div>
            <?php
            get_template_part(
                'templates/components/cards/product-cards/product-Property',
                null,
            );
            ?>
        </nav>
    </div>
  
    <?php
    get_template_part(
        'templates/components/cards/product-cards/product-description',
        null,
    );
    ?>

    <?php get_template_part('/templates/components/cards/product-cards/single-product', 'footer');
    ?>

</main>

<?php get_footer() ?>
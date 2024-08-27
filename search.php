<?php ?>
<?php
$front_page_id = get_option('page_on_front');
$banner = get_field('search_hero_image', $front_page_id);

$search_query = get_search_query();

$query_blog_args = [
    'post_type' => "post",
    's' => $search_query,
    'post_per_page' => -1

];
$query_blog = new WP_Query($query_blog_args);

$query_product_args = [
    'post_type' => "product",
    's' => $search_query,
    'post_per_page' => -1

];
$query_product = new WP_Query($query_product_args);

$categories = get_terms([
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
    'number' => 5
]);
?>

<?php get_header() ?>
<main class="search-result-page">
    <div class="banner" <?php printf("style=\"background-image:url('%s')\"", $banner) ?>>
        <p class="container">
            <?= get_field("search_hero_title", $front_page_id); ?>
        </p>
    </div>
    <p class="container title-mobile-search">
        <?= get_field("search_title", $front_page_id); ?>
    </p>
    <div class="search-result container">
        <div class="search_result_head">
            <ul class="category">
                <?php

                foreach ($categories as $cat) {
                    echo "<a href=" . get_term_link($cat->term_id) . '"><li>' . $cat->name;
                    echo "</li></a>";
                }

                ?>
            </ul>
            <div class="search-box ">

                <?php
                get_template_part(
                    'templates/components/forms/search-box',
                    null,
                );
                ?>
            </div>
        </div>
        <?php if (($query_product->have_posts()) || ($query_blog->have_posts())) : ?>

            <?php if ($query_product->have_posts()) : ?>
                <div class="product-result">
                    <h2>
                        Search results in products for <span>"
                            <?php echo get_search_query(); ?> "
                        </span>
                    </h2>
                    <div class="products">
                        <?php
                        if ($query_product->have_posts()) {
                            while ($query_product->have_posts()) {
                                $query_product->the_post();
                                get_template_part('templates/components/cards/product-cards/suggest', 'product');
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>


                </div>
            <?php endif ?>
            <?php if ($query_blog->have_posts()) : ?>

                <div class="blog-result">
                    <h2>Search results in blogs for <span>"
                            <?php echo get_search_query(); ?> "
                        </span></h2>
                    <div class="blog-desktop">
                        <?php

                        if ($query_blog->have_posts()) {
                            while ($query_blog->have_posts()) {
                                $query_blog->the_post();
                                get_template_part('templates/components/cards/blog-cards/blogpage', 'card');
                            }
                        }
                        wp_reset_postdata();

                        ?>
                    </div>

                </div>

            <?php endif ?>
        <?php else : ?>
            <div class="not-found-search">
                <h2>Search results for <span>"
                        <?php echo get_search_query(); ?> "
                    </span></h2>
                <div class="result-cant-found">
                    <div>
                        result not found!
                    </div>
                    <h4> whoops! this information is not available</h4>
                </div>
            </div>
        <?php endif ?>
    </div>

</main>
<?php get_footer() ?>
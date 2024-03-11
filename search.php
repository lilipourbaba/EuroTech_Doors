<?php /*Template Name: search */ ?>
<?php
$banner = get_the_post_thumbnail_url($post_id, 'full');

global $wp_query;

?>
<?php

//global $wp_query;

$searchQuery = get_search_query();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

if (isset($_GET['section']) && $_GET['section'] == 'blog') {
    $section = "blog";
} elseif (isset($_GET['section']) && $_GET['section'] == 'product') {
    $section = "product";
} else {
    $section = "all";
}

$productQuery = new WP_Query(
    array(
        'post_type' => 'product',
        // 's' => $searchQuery,
        'paged' => $paged,
        'posts_per_page' => 8,
    )
);

$postQuery = new WP_Query(
    array(
        'post_type' => 'post',
        // 's' => $searchQuery,
        'paged' => $paged,
        'posts_per_page' => 8,
    )
);

?>

<?php get_header() ?>
<main class="search-result">
    <div class="banner" <?php printf("style=\"background-image:url('%s')\"", $banner) ?>>
        <p>
            <?= get_field("search_title"); ?>
        </p>
    </div>
    <div class="container">
        <div class="search-menu">
            <ul class="product-cat">
                <!-- <?php
                $args = array(
                    'taxonomy' => 'post_cat',
                    'orderby' => 'name',
                    'title_li' => '',
                    'hide_empty' => 0
                );

                $all_categories = get_categories($args);
                foreach ($all_categories as $cat) {

                    if ($cat->category_parent == 0) {

                        $category_id = $cat->term_id;

                        echo '<li><a href="' . get_term_link($cat->slug, 'post_catproduct_cat') . '">' . $cat->name . '</a></li>';
                    }
                } ?> -->
                <?php wp_list_categories(
                    [
                        'orderby' => 'id',
                        'hide_empty' => false,
                        'title_li' => "",
                        'current_category' => 1
                    ]
                ) ?>
            </ul>
            <div class="search-box">
                <?php
                get_template_part(
                    'templates/components/forms/search-box',
                    null,
                );
                ?>
            </div>
        </div>
        <div class="searchPage">
            <h2 class="search-result-title">
                <?= 'Search results in services for' . ' :' . $searchQuery; ?>
            </h2>
        </div>
    </div>
    <section>


    </section>
</main>
<?php get_footer() ?>
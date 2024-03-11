<?php
$post_id = get_queried_object_id();
$banner = get_the_post_thumbnail_url($post_id, 'full');

/**
 * get category info
 * 
 * @todo change for custom taxonomy
 *
 * @param int $post_id
 * @param string $url_all
 * @param WP_TERM | string | int $taxonomy
 * 
 * 
 * @return array
 */
function cyn_category_info($post_id, $url_all, $taxonomy)
{
    $current_post_cat_ids = [];
    foreach (get_the_category($post_id) as $cat) {
        array_push($current_post_cat_ids, $cat->term_id);
    }

    $categories = get_categories([
        'orderby' => 'id',
        'hide_empty' => false,
        'taxonomy' => $taxonomy
    ]);

    $categories_link = [];
    foreach ($categories as $cat) {
        array_push($categories_link, get_category_link($cat->term_id));
    }

    $info_categories = [
        [
            'name' => 'All',
            'link' => $url_all,
            'in_category_exist' => true
        ]
    ];

    for ($i = 0; $i < count($categories); $i++) {
        array_push(
            $info_categories,
            [
                'name' => $categories[$i]->name,
                'link' => $categories_link[$i],
                'in_category_exist' => in_array($categories[$i]->term_id, $current_post_cat_ids)
            ]
        );
    }
    return $info_categories;
}


/**
 * CYN Reading Time
 *
 * @param int $id //post id
 * @return string //reading time + ' Min'
 */
function cyn_reading_time($id)
{
    $content = get_post_field('post_content', $id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 50);
    return $reading_time . ' Min';
}
// post view function 

function getPostViews($post_id)
{
    $count_key = 'post_view';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        return "0 view";
    }
    return $count . ' view';
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);













//Custom pagination
function the_pagination()
{
    if (is_singular())
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;
    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<ul class="pagination " itemscope itemtype="http://schema.org/SiteNavigationElement/Pagination">' . "\n";
    /** Previous Post Link */
    if (get_previous_posts_link())
        printf(' <li class="page-item">%s</li>
    ' . "\n", get_previous_posts_link('
    <span aria-hidden="true" class="page-link ripple">&laquo;</span>
    <span class="sr-only">Previous</span>
    '));
    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? '  class="page-item active"' : '';
        printf('<li%s class="page-item"><a href="%s" class="page-link ripple" itemprop="relatedLink/pagination">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if (!in_array(2, $links))
            echo '<li>…</li>';
    }
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? '  class="page-item active"' : '';
        printf('<li%s class="page-item"><a href="%s" class="page-link ripple" itemprop="relatedLink/pagination">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }
    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";
        $class = $paged == $max ? '  class="page-item active"' : '';
        printf('<li%s class="page-item"><a href="%s" class="page-link ripple" itemprop="relatedLink/pagination">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }
    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li class="page-item ">%s</li>
    ' . "\n", get_next_posts_link('<span aria-hidden="true" class="page-link ripple">&raquo;</span>
    <span class="sr-only">Next</span>'));
    echo '</ul>' . "\n";


}

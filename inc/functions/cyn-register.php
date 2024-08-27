<?php

add_action('init', 'cyn_taxonomy_register');
add_action('init', 'cyn_post_type_register');
add_action('init', 'cyn_term_register');



function cyn_post_type_register()
{
    $GLOBALS["form-post-type"] = $post_type = 'form';
    cyn_make_post_type('form ', $post_type, 'dashicons-email-alt2', true, ['title']);
    cyn_make_post_type('product', 'product', 'dashicons-archive', supports: ['title', 'editor', 'thumbnail', 'page-attributes']);
    cyn_make_post_type('inspiration', 'inspiration', 'dashicons-format-gallery', true, ['title', 'thumbnail', 'editor']);
}

function cyn_taxonomy_register()
{
    cyn_make_taxonomy('Category Form', 'form-cat', 'form', true);
    cyn_make_taxonomy('Product Category', 'product_cat', 'product', true , supports: ['title','thumbnail']);
    cyn_make_taxonomy('Product Tags', 'product_tag', 'product', true);



}
function cyn_term_register()
{
    wp_insert_term('contact us', 'form-cat', ['slug' => 'contact-us']);
    wp_insert_term('Membrane Doors ', 'product_cat', ['slug' => 'membrane_doors']);
    wp_insert_term('Flush Doors', 'product_cat', ['slug' => 'flush-doors']);
    wp_insert_term('Shaker Doors', 'product_cat', ['slug' => 'shaker-doors']);
    wp_insert_term('Best Seller', 'product_tag', ['slug' => 'best_seller']);
    wp_insert_term('suggested Product', 'product_tag', ['slug' => 'suggested_product']);
    wp_insert_term('subscribe', 'form-cat', ['slug' => 'subscribe']);


}


function cyn_make_post_type($name, $slug, $icon, $menu = true, $supports = ['title', 'thumbnail', 'editor'])
{
    $labels = [
        'name' => $name,
        'singular_name' => $name,
        'menu_name' => $name  . 's',
        'name_admin_bar' => $name,
        'add_new' => 'add ' . $name,
        'add_new_item' => 'add ' . $name . ' new',
        'new_item' => $name . ' new',
        'edit_item' => 'edit ' . $name,
        'view_item' => 'view ' . $name,
        'all_items' => 'all ' . $name . 's',
        'search_items' => 'search ' . $name,
        'not_found' => $name . 'not founded.',
        'not_found_in_trash' => $name . '  not founded.'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => $menu,
        'query_var' => true,
        'rewrite' => ['slug' => $slug],
        'exclude_from_search' => false,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => $icon,
        'supports' => $supports,

    ];

    register_post_type($slug, $args);
}

function cyn_make_taxonomy($name, $slug, $post_types, $is_hierarchical = true , $supports = ['title', 'thumbnail', 'editor'])
{
    $labels = [
        'name' => $name . 's',
        'singular_name' => $name,
        'search_items' => 's' . $name . ' search in',
        'all_items' => 'all' . $name . 's',
        'edit_item' => ' edit ' . $name,
        'update_item' => 'update' . $name,
        'add_new_item' => 'add ' . $name . ' new',
        'new_item_name' => $name . ' new',
        'menu_name' => $name,
    ];

    $args = [
        'hierarchical' => $is_hierarchical,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => $slug],
        'supports' => $supports,

    ];

    register_taxonomy($slug, $post_types, $args);
}

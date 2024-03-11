<?php

add_action('init', 'cyn_taxonomy_register');
add_action('init', 'cyn_post_type_register');
add_action('init', 'cyn_term_register');



function cyn_post_type_register()
{
    $GLOBALS["form-post-type"] = $post_type = 'form';
    cyn_make_post_type('form ', $post_type, 'dashicons-email-alt2', true, ['title']);
    cyn_make_post_type('product', 'product', '');
}

function cyn_taxonomy_register()
{
    cyn_make_taxonomy('category form', 'form-cat', 'form', true);
}
function cyn_term_register()
{
    wp_insert_term('contact us', 'form-cat', ['slug' => 'pricing']);
}


function cyn_make_post_type($name, $slug, $icon, $menu = true, $supports = ['title', 'thumbnail', 'editor'])
{
    $labels = [
        'name' => $name,
        'singular_name' => $name,
        'menu_name' => $name . '‌' . 's',
        'name_admin_bar' => $name,
        'add_new' => 'add ' . $name,
        'add_new_item' => 'add ' . $name . ' new',
        'new_item' => $name . ' new',
        'edit_item' => 'edit ' . $name,
        'view_item' => 'view ' . $name,
        'all_items' => 'all ' . $name . ' s',
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

function cyn_make_taxonomy($name, $slug, $post_types, $is_hierarchical = true)
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
    ];

    register_taxonomy($slug, $post_types, $args);
}



<?php
function cyn_post_type_product()
{
    $GLOBALS["fotyperm-post-"] = $post_type = 'page';
    cyn_make_post_type('prduct ', $post_type, 'dashicons-email-alt2', true, ['title']);
}
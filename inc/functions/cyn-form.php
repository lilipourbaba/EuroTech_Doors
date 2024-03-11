<?php
/**
 * register forms
 * 
 * 
 */

add_action('wp_ajax_send_contact_form', 'cyn_send_contact_form');
add_action('wp_ajax_nopriv_send_contact_form', 'cyn_send_contact_form');

function cyn_send_contact_form()
{


    wp_send_json($_POST);

    if (!wp_verify_nonce($_POST['_nonce'], 'ajax-nonce'))
        return wp_send_json_error(['verify_nonce' => false], 403);


    $data = $_POST['data'];
    $dbData = array(
        'name' => sanitize_text_field($data['name']),
        'family' => sanitize_text_field($data['family']),
        'email' => sanitize_text_field($data['email']),
        'describe' => sanitize_textarea_field($data['describe']),
    );

    $msg_content = "
                name: " . $dbData['name'] . "\n
                family: " . $dbData['family'] . "\n
                email: " . $dbData['email'] . "\n
                massage: " . $dbData['describe'] . "
            ";
    $new_post = array(
        'post_type' => $GLOBALS["form-post-type"],
        'post_title' => $dbData['name'],
        'post_content' => $msg_content,
        'post_status' => 'publish',
        'tax_input' => ['form-cat' => [get_term_by('slug', 'contact-us', 'form-cat')->term_id]],
        'post_author' => 1,
    );

    $insert_post = wp_insert_post($new_post);

    if (is_wp_error($insert_post))
        return wp_send_json_error(['insert_row' => false], 500);


    $send_email = wp_mail(
        'lili@gmail.com',
        'A Massage from: ' . $dbData['name'],
        $msg_content
    );

    if ($send_email == false)
        return wp_send_json_error(['name' => false], 500);

    return wp_send_json(['success' => true], 201);
}


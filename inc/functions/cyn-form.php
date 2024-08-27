<?php

/**
 * register forms
 * 
 * 
 */

add_action('wp_ajax_cyn_contact_us_form', 'cyn_contact_us_form');
add_action('wp_ajax_nopriv_cyn_contact_us_form', 'cyn_contact_us_form');


function cyn_contact_us_form()
{
    list(
        'describe' => $describe,
        'email' => $email,
        'number' => $number,
        'name' => $name,

        '_nonce' => $_nonce,
    ) = $_POST;

    $created_post = wp_insert_post([
        'post_type' => 'form',
        'post_title' => $email,
        'tax_input' => [
            'form-cat' => [
                get_term_by('slug', 'contact-us', 'form-cat')->term_id
            ]
        ],
    ]);

    add_post_meta($created_post, 'number', sanitize_text_field($number));
    add_post_meta($created_post, 'name', sanitize_text_field($name));
    add_post_meta($created_post, 'email', sanitize_email($email));
    add_post_meta($created_post, 'describe', sanitize_textarea_field($describe));
    $emailTo = "sales@eurotech.com";
    $subject = "Eurotech Contact Us form";
    $msgContent =
        "My name: " . $name . "   .     
        " .
        "My Email: " . $email . "   .     
        " .
        "My Phone is " . $number . "  .    
     " .
        "Message: " . $describe;
    $sendEmail = wp_mail(
        $emailTo,
        $subject,
        $msgContent
    );
    if ($sendEmail == false)
        return wp_send_json_error(['send_email' => false], 500);

    return wp_send_json(['success' => true], 201);
}

add_action('wp_ajax_cyn_subscribe_form', 'cyn_subscribe_form');
add_action('wp_ajax_nopriv_cyn_subscribe_form', 'cyn_subscribe_form');
function cyn_subscribe_form()
{
    list(
        'email' => $email,
        '_nonce' => $_nonce,
    ) = $_POST;

    $created_post = wp_insert_post([
        'post_type' => 'form',
        'post_title' => $email,
        'tax_input' => [
            'form-cat' => [
                get_term_by('slug', 'subscribe', 'form-cat')->term_id
            ]
        ],
    ]);



    add_post_meta($created_post, 'email', sanitize_email($email));
    $emailTo = "sales@eurotech.com";
    $subject = "Eurotech subscribe form";
    $msgContent =
        "My Email: " . $email;
    $sendEmail = wp_mail(
        $emailTo,
        $subject,
        $msgContent
    );
    if ($sendEmail == false)
        return wp_send_json_error(['send_email' => false], 500);

    return wp_send_json(['success' => true], 201);
}






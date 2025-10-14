<?php

function get_donor_name() {
    return $_GET['varName'] ?? '';
}

function get_donor_amount() {
    $amt = (float)($_GET['FloatAmount'] ?? 0);
    return 'RM' . number_format($amt, 2);
}

function get_donation_type($amount) {
    $amount = (float)$amount;
    if ($amount >= 100) return 'Major Donor';
    if ($amount >= 50)  return 'Supporter';
    if ($amount >= 1)   return 'Contributor';
    return 'Unknown';
}

add_filter('show_admin_bar', function ($show) {
    return is_admin() ? $show : false;
});

function shortcode_donor_ref_id() {
    return $_GET['ref_id'] ?? '';
}

add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style(
        'bootstrap-5',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );

    wp_enqueue_style(
        'style',
        get_stylesheet_directory_uri() . '/style.css',
        ['bootstrap-5'],
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    wp_enqueue_script(
        'bootstrap-5-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true
    );
});


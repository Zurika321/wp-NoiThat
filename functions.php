<?php
/* tên folder themes : themes_custom
file: functions.php */ 
// add_filter('show_admin_bar', '__return_false');
function mytheme_assets() {

    // CSS
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        '1.0'
    );

    wp_enqueue_style(
        'aos-css',
        'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css',
        [],
        '2.3.4'
    );

    // JS
    wp_enqueue_script(
        'aos-js',
        'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js',
        [],
        '2.3.4',
        true
    );

    wp_enqueue_script(
        'gsap-js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        [],
        '3.12.5',
        true
    );

    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        ['aos-js', 'gsap-js'],
        '1.0',
        true
    );
    // Trang chủ
    if (is_front_page()) {

        wp_enqueue_style(
            'home-css',
            get_template_directory_uri() . '/assets/css/index.css'
        );

        wp_enqueue_script(
            'home-js',
            get_template_directory_uri() . '/assets/js/index.js',
            [],
            '1.0',
            true
        );
    }

    // Trang Cart
    if (is_page('cart')) {

        wp_enqueue_style(
            'cart-css',
            get_template_directory_uri() . '/assets/css/cart.css'
        );

        wp_enqueue_script(
            'cart-js',
            get_template_directory_uri() . '/assets/js/cart.js',
            [],
            '1.0',
            true
        );
    }

    //Trang About
    if (is_page('about')) {
        wp_enqueue_style(
            'about-css',
            get_template_directory_uri() . '/assets/css/cart.css'
        );

        wp_enqueue_script(
            'about-js',
            get_template_directory_uri() . '/assets/js/cart.js',
            [],
            '1.0',
            true
        );  
    }

    //Trang Products
    if (is_page('products')) {
        wp_enqueue_style(
            'products-css',
            get_template_directory_uri() . '/assets/css/products.css'
        );
        wp_enqueue_script(
            'products-js',
            get_template_directory_uri() . '/assets/js/products.js',
            [],
            '1.0',
            true
        );
    }
}

add_action('wp_enqueue_scripts', 'mytheme_assets');
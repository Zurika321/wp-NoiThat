<?php
/* tên folder themes : themes_custom
file: functions.php */ 
// function mytheme_enqueue() { //css tổng

//     wp_enqueue_style(
//         'style',
//         get_stylesheet_uri()
//     );

// }

// add_action('wp_enqueue_scripts', 'mytheme_enqueue');
// add_filter('show_admin_bar', '__return_false');
function mytheme_assets() {

    // CSS
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/assets/css/style.css',
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
}

add_action('wp_enqueue_scripts', 'mytheme_assets');
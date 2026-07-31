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
            get_template_directory_uri() . '/assets/css/about.css'
        );

        wp_enqueue_script(
            'about-js',
            get_template_directory_uri() . '/assets/js/about.js',
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

    //Trang Blog 
    if (is_page('blog')) {
        wp_enqueue_style(
            'blog-css',
            get_template_directory_uri() . '/assets/css/blog.css'
        );
        wp_enqueue_script(
            'blog-js',
            get_template_directory_uri() . '/assets/js/blog.js',
            [],
            '1.0',
            true
        );
    }

    //Trang 404 
    if (is_404()) {
        wp_enqueue_style(
            '404-css',
            get_template_directory_uri() . '/assets/css/404.css'
        );
        wp_enqueue_script(
            '404-js',
            get_template_directory_uri() . '/assets/js/cart.js',
            [],
            '1.0',
            true
        );
    }
}

add_action('wp_enqueue_scripts', 'mytheme_assets');

add_action('template_redirect', 'my_protect_pages');

function my_protect_pages() {

    if (is_page('cart') && !is_user_logged_in()) {
        wp_redirect(wp_login_url());
        exit;
    }
}

// add_action('init', function () {
//     if (isset($_GET['testcart'])) {

//         $ok = WC()->cart->add_to_cart(
//     44,
//     1,
//     98,
//     [
//         'attribute_color' => 'Đen',
//         'attribute_size'  => 'M'
//     ]
// );

//         var_dump($ok);
//         print_r(wc_get_notices());
//         die();
//     }
// });

add_action('wp_ajax_my_add_to_cart', 'my_add_to_cart');
add_action('wp_ajax_nopriv_my_add_to_cart', 'my_add_to_cart');

function my_add_to_cart() {

    $product_id   = absint($_POST['product_id']);
    $variation_id = absint($_POST['variation_id']);
    $quantity     = max(1, absint($_POST['quantity']));
    $buy_now      = !empty($_POST['buy_now']);

    $variation = [
        'attribute_color' => sanitize_text_field($_POST['attribute_color'] ?? ''),
        'attribute_size'  => sanitize_text_field($_POST['attribute_size'] ?? ''),
    ];
if ($buy_now) {
    WC()->cart->empty_cart(true); // Xóa toàn bộ sản phẩm trong giỏ
}
    wc_clear_notices();

    $result = WC()->cart->add_to_cart(
        $product_id,
        $quantity,
        $variation_id,
        $variation
    );

    if (!$result) {

        $notices = wc_get_notices('error');
        $message = 'Có lỗi xảy ra';

        if (!empty($notices[0]['notice'])) {
            $message = wp_strip_all_tags($notices[0]['notice']);
        }

        wc_clear_notices();

        wp_send_json_error([
            'message' => $message,
        ]);
    }

    wc_clear_notices();

    wp_send_json_success([
        'message'      => 'Đã thêm vào giỏ hàng.',
        'redirect_url' => $buy_now ? 'http://localhost/wp-NoiThat/thanh-toan/' : "",
    ]);
}

// wp_enqueue_script(
//     'products',
//     get_template_directory_uri() . '/assets/js/products.js',
//     [],
//     '1.0',
//     true
// );

// wp_localize_script('products', 'myAjax', [
//     'ajaxurl' => admin_url('admin-ajax.php')
// ]);

add_action('wp_ajax_get_product_reviews', 'get_product_reviews');
add_action('wp_ajax_nopriv_get_product_reviews', 'get_product_reviews');

function get_product_reviews() {

    $product_id = absint($_POST['product_id'] ?? 0);

    if (!$product_id) {
        wp_send_json_error('Product not found');
    }

    global $product, $post;

    $product = wc_get_product($product_id);

    if (!$product) {
        wp_send_json_error('Product not found');
    }

    $post = get_post($product_id);
    setup_postdata($post);

    ob_start();

    comments_template('/woocommerce/single-product-reviews.php');

    $html = ob_get_clean();

    wp_reset_postdata();

    wp_send_json_success([
        'html' => $html
    ]);
}

function set_post_views($postID) {

    $key = 'post_views_count';

    $count = get_post_meta($postID, $key, true);

    if ($count == '') {

        $count = 0;

        delete_post_meta($postID, $key);

        add_post_meta($postID, $key, '0');

    } else {

        $count++;

        update_post_meta($postID, $key, $count);

    }

}

function get_post_views($postID){

    $key = 'post_views_count';

    $count = get_post_meta($postID, $key, true);

    if($count == ''){

        return 0;

    }

    return $count;

}
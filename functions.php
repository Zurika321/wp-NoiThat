<?php
/* tên folder themes : themes_custom
file: functions.php */ 
// add_filter('show_admin_bar', '__return_false');
function mytheme_assets() {

    // CSS dùng chung
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

    // JS dùng chung
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

    // Các trang có CSS/JS riêng
    $pages = [
        ''         => 'index',     // Trang chủ
        'cart'     => 'cart',
        'about'    => 'about',
        'products' => 'products',
        'blog'     => 'blog',
        'gallery'     => 'gallery',// trang collection
        'contact'     => 'contact',
    ];

    foreach ($pages as $slug => $file) {

        $match = $slug === ''
            ? is_front_page()
            : is_page($slug);

        if (!$match) {
            continue;
        }

        wp_enqueue_style(
            "{$file}-css",
            get_template_directory_uri() . "/assets/css/{$file}.css",
            [],
            '1.0'
        );

        $handle = "{$file}-js";

        wp_enqueue_script(
            $handle,
            get_template_directory_uri() . "/assets/js/{$file}.js",
            [],
            '1.0',
            true
        );

        if ($slug === "products") {
            wp_localize_script($handle, "myAjax", [
                "ajaxurl" => admin_url("admin-ajax.php"),
            ]);
        }
    }

    // Trang 404
    if (is_404()) {
        wp_enqueue_style(
            '404-css',
            get_template_directory_uri() . '/assets/css/404.css',
            [],
            '1.0'
        );

        wp_enqueue_script(
            '404-js',
            get_template_directory_uri() . '/assets/js/404.js',
            [],
            '1.0',
            true
        );
    }
}

add_action('wp_enqueue_scripts', 'mytheme_assets');

// sản phẩm
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















/// Đánh giá sản phẩm
add_action('wp_ajax_get_product_reviews', 'get_product_reviews');
add_action('wp_ajax_nopriv_get_product_reviews', 'get_product_reviews');

function get_product_reviews() {

    $product_id = absint($_POST['product_id'] ?? 0);

    if (!$product_id) {
        wp_send_json_error([
            'message' => 'Thiếu product_id'
        ]);
    }

    $product = wc_get_product($product_id);

    if (!$product) {
        wp_send_json_error([
            'message' => 'Không tìm thấy sản phẩm'
        ]);
    }

    if (get_post_field('comment_status', $product_id) !== 'open') {
        wp_send_json_error([
            'message' => 'Sản phẩm chưa bật đánh giá'
        ]);
    }

    global $post;

    $post = get_post($product_id);
    setup_postdata($post);

    ob_start();

    include get_template_directory() . '/template-parts/product-reviews.php';

    $html = ob_get_clean();

    wp_reset_postdata();

    wp_send_json_success([
        'html' => $html
    ]);
}
// add_action('wp_ajax_get_product_reviews', 'get_product_reviews');
// add_action('wp_ajax_nopriv_get_product_reviews', 'get_product_reviews');

// function get_product_reviews() {

//     $product_id = absint($_POST['product_id'] ?? 0);

//     if (!$product_id) {
//         wp_send_json_error([
//             'message' => 'Không nhận được product_id'
//         ]);
//     }

//     $product = wc_get_product($product_id);

//     if (!$product) {
//         wp_send_json_error([
//             'message' => 'Không tìm thấy sản phẩm'
//         ]);
//     }

//     // Debug
//     $debug = [
//         'product_id'        => $product_id,
//         'product_exists'    => (bool)$product,
//         'reviews_enabled'   => wc_review_ratings_enabled(),
//         'comment_status'    => get_post_field('comment_status', $product_id),
//         'comments_number'   => get_comments_number($product_id),
//         'post_type'         => get_post_type($product_id),
//     ];

//     // Chưa bật comment
//     if (get_post_field('comment_status', $product_id) !== 'open') {
//         wp_send_json_error([
//             'message' => 'Sản phẩm chưa bật comment.',
//             'debug'   => $debug
//         ]);
//     }

//     global $post, $product;

// $product = wc_get_product($product_id);
// $post = get_post($product_id);

// setup_postdata($post);

// $comments = get_comments([
//     'post_id' => $product_id,
//     'status'  => 'approve',
// ]);

// $debug['comments_found'] = count($comments);
// $debug['comments'] = array_map(function($c){
//     return [
//         'id' => $c->comment_ID,
//         'type' => $c->comment_type,
//         'approved' => $c->comment_approved,
//         'content' => $c->comment_content,
//     ];
// }, $comments);

//     ob_start();

// //     echo '<pre>';
// // var_dump(have_comments());
// // echo '</pre>';

//     // wc_get_template(
//     //     'single-product-reviews.php',
//     //     [],
//     //     '',
//     //     WC()->plugin_path() . '/templates/'
//     // );
// include get_template_directory() . '/template-parts/product-reviews.php';
//     $html = ob_get_clean();

//     wp_reset_postdata();

//     if (empty($html)) {
//         wp_send_json_error([
//             'message' => 'comments_template() trả về HTML rỗng.',
//             'debug'   => $debug
//         ]);
//     }

//     wp_send_json_success([
//         'html'  => $html,
//         'debug' => $debug
//     ]);
// }

// add_action('wp_ajax_submit_product_review', 'submit_product_review');
// add_action('wp_ajax_nopriv_submit_product_review', 'submit_product_review');

// function submit_product_review() {

//     if (empty($_POST['comment_post_ID'])) {
//         wp_send_json_error([
//             'message' => 'Thiếu comment_post_ID'
//         ]);
//     }

//     // WordPress xử lý như submit comment mặc định
//     $result = wp_handle_comment_submission(wp_unslash($_POST));

//     if (is_wp_error($result)) {
//         wp_send_json_error([
//             'message' => $result->get_error_message()
//         ]);
//     }

//     // WooCommerce lưu rating
//     if (!empty($_POST['rating'])) {
//         update_comment_meta(
//             $result->comment_ID,
//             'rating',
//             absint($_POST['rating'])
//         );
//     }

//     // cập nhật cache
//     clean_comment_cache($result->comment_ID);
//     clean_post_cache($result->comment_post_ID);
//     wp_update_comment_count_now($result->comment_post_ID);

//     wp_send_json_success([
//         'comment_id' => $result->comment_ID
//     ]);
// }
add_action('wp_ajax_submit_product_review', 'submit_product_review');
add_action('wp_ajax_nopriv_submit_product_review', 'submit_product_review');

function submit_product_review() {

    if (empty($_POST['comment_post_ID'])) {
        wp_send_json_error([
            'message' => 'Thiếu product_id'
        ]);
    }

    $comment = wp_handle_comment_submission(wp_unslash($_POST));

    if (is_wp_error($comment)) {

        wp_send_json_error([
            'message' => $comment->get_error_message()
        ]);

    }

    if (!empty($_POST['rating'])) {

        update_comment_meta(
            $comment->comment_ID,
            'rating',
            absint($_POST['rating'])
        );

    }

    clean_comment_cache($comment->comment_ID);

    clean_post_cache($comment->comment_post_ID);

    wp_update_comment_count_now($comment->comment_post_ID);

    wp_send_json_success([
        'message' => 'Đánh giá thành công'
    ]);

}























/// Bên Blog
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

require_once get_template_directory() . '/data/demo-config.php';
require_once get_template_directory() . '/data/demo-product.php';

add_action('init', 'demo_import_products');

function demo_import_products()
{
    static $imported = false;

    if ($imported || wp_doing_ajax()) {
        return;
    }

    $imported = true;

    $products = require get_template_directory() . '/data/demo-products.php';

    foreach ($products as $product) {

        if (wc_get_product_id_by_sku($product->sku)) {
            continue;
        }

        $ctx = demo_create_context($product);

        try {

            demo_create_product($ctx);

            demo_setup_product($ctx);

        } catch (Throwable $e) {

            demo_rollback($ctx);

            if (demo_config('debug')) {
                error_log($e->getMessage());
            }

        }

    }
}
<?php

$products = wc_get_products([
    'status' => 'publish',
    'limit'  => -1,
    'type'   => ['variable']
]);
$data_products = [];

foreach ($products as $product) {

    $attrs = $product->get_attributes();

    $colors = [];
    $sizes = [];
    $materials = [];

    $price = 0;
    $oldPrice = 0;

    // Color
    if (isset($attrs['color'])) {
        $colors = $attrs['color']->get_options();
    }

    // Size
    if (isset($attrs['size'])) {
        $sizes = $attrs['size']->get_options();
    }

    // Material
    if (isset($attrs['material'])) {
        $materials = $attrs['material']->get_options();
    }

    // Money
    if (isset($attrs['money'])) {
        $money = $attrs['money']->get_options();

        if (!empty($money)) {
            $price = (int)$money[0];
        }
    }

    // Old Money
    if (isset($attrs['old_money'])) {
        $money = $attrs['old_money']->get_options();

        if (!empty($money)) {
            $oldPrice = (int)$money[0];
        }
    }

    // Nếu chưa có thì lấy từ WooCommerce
    if (!$price) {
        $price = (int)$product->get_price();
    }

    if (!$oldPrice) {
        $oldPrice = (int)$product->get_regular_price();
    }

    $gallery = [];

    if ($product->get_image_id()) {
        $gallery[] = wp_get_attachment_url($product->get_image_id());
    }

    foreach ($product->get_gallery_image_ids() as $img) {
        $gallery[] = wp_get_attachment_url($img);
    }

    $cats = wp_get_post_terms(
        $product->get_id(),
        'product_cat',
        ['fields' => 'names']
    );

    $specs = [
        'Kích thước' => wc_format_dimensions($product->get_dimensions(false)) ?: 'Không áp dụng',
        'Khối lượng' => $product->get_weight() ?: 'Không áp dụng',
        'Chất liệu'  => $materials,
        'Màu'         => implode(', ', $colors),
        'Bảo hành'    => '24 tháng'
    ];

    $variations = [];

    foreach ($product->get_available_variations() as $v){

        $variation = wc_get_product($v['variation_id']);

        $variations[] = [
            'id' => $variation->get_id(),

            'price' => (float)$variation->get_price(),

            'regular_price' => (float)$variation->get_regular_price(),

            'stock' => $variation->is_in_stock(),

            'image' => wp_get_attachment_url(
                $variation->get_image_id()
            ),

            'attributes'=>[
                'color'=>$v['attributes']['attribute_pa_color'] ?? '',
                'size'=>$v['attributes']['attribute_pa_size'] ?? '',
                'material'=>$v['attributes']['attribute_pa_material'] ?? '',
            ]
        ];
    }

    $data_products[] = [

        'id' => $product->get_id(),

        'name' => $product->get_name(),

        'cat' => $cats[0] ?? 'Chưa phân loại',

        'price' => $price,

        'oldPrice' => $oldPrice,

        'rating' => (float)$product->get_average_rating(),

        'sold' => (int)$product->get_total_sales(),

        'colors' => $colors,

        'materials' => $materials,

        'sizes' => $sizes,

        'img' => wp_get_attachment_url($product->get_image_id()),

        'gallery' => $gallery,

        'desc' => wp_strip_all_tags($product->get_description()),

        'specs' => $specs,

        'link' => $product->get_permalink(),

        'stock' => $product->is_in_stock(),

        'reviewCount' => $product->get_review_count(),

        'variations' => $variations,
    ];
}
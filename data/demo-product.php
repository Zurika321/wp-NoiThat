<?php
class DemoProduct
{
    public string $sku = '';

    public string $name = '';

    public string $slug = '';

    public string $description = '';

    public string $category = '';

    public array $tags = [];

    public int $base_price = 0;

    public int $old_price = 0;

    public array $colors = [
        'Đen'
    ];

    public array $sizes = [
        'S',
        'M',
        'L'
    ];

    public string $image_folder = "";

    public string $status = 'publish';
}
function demo_config($key=null){

    static $config;

    if(!$config){

        $config=require __DIR__.'/demo-config.php';

    }

    if($key===null){

        return $config;

    }

    return $config[$key] ?? null;

}
function demo_setup_product(array &$ctx): void
{
    demo_create_category($ctx);

    demo_create_tags($ctx);

    demo_create_attributes($ctx);

    demo_create_variations($ctx);

    demo_upload_cover($ctx);

    demo_upload_gallery($ctx);
}

function demo_create_context(DemoProduct $demo): array
{
    return [

        'demo' => $demo,

        'wc' => [

            'id' => 0,

            'product' => null,

            'cover_id' => 0,

            'gallery_ids' => [],

            'variation_ids' => [],

            'images' => []

        ],

        'rollback' => []

    ];
}

function demo_create_product(array &$ctx): void
{
    $demo = $ctx['demo'];

    $product = new WC_Product_Variable();

    $product->set_slug(

    $demo->slug
        ?: sanitize_title($demo->name)

);

    $product->set_name($demo->name);
    // $product->set_slug($demo->slug);
    $product->set_sku($demo->sku);

    $product->set_status($demo->status);

    $product->set_description($demo->description);

    $product->set_catalog_visibility('visible');

    $product->set_manage_stock(false);

    $product->save();

    $ctx['wc']['id'] = $product->get_id();

    $ctx['wc']['product'] = $product;

    demo_track(
        $ctx,
        'post',
        $product->get_id()
    );
}

function demo_track(array &$ctx, string $type, int $id): void
{
    $ctx['rollback'][] = [

        'type' => $type,

        'id'   => $id

    ];
}

function demo_rollback(array $ctx): void
{
    foreach (array_reverse($ctx['rollback']) as $item) {

        switch ($item['type']) {

            case 'attachment':
                wp_delete_attachment($item['id'], true);
                break;

            case 'post':
                wp_delete_post($item['id'], true);
                break;

        }

    }
}
function demo_create_category(array &$ctx): void
{
    $demo = $ctx['demo'];

    $term = term_exists(
        $demo->category,
        'product_cat'
    );

    if (!$term) {

        $term = wp_insert_term(
            $demo->category,
            'product_cat'
        );

        if (is_wp_error($term)) {
            throw new Exception($term->get_error_message());
        }

        $term_id = $term['term_id'];

    } else {

        $term_id = is_array($term)
            ? $term['term_id']
            : $term;

    }

    wp_set_object_terms(
    $ctx['wc']['id'],
    [(int)$term_id],
    'product_cat'
);
}

function demo_create_attributes(array &$ctx): void
{
    $ctx['wc']['product']->set_attributes([

        demo_attribute(
            'color',
            $ctx['demo']->colors,
            true,0
        ),

        demo_attribute(
            'size',
            $ctx['demo']->sizes,
            true,1
        )

    ]);

    $ctx['wc']['product']->save();
}

function demo_attribute(
    string $name,
    array $options,
    bool $variation = false,
    bool $visible = true,
    int $position=0
): WC_Product_Attribute {

    $attribute = new WC_Product_Attribute();

    $attribute->set_id(0);               // Custom Attribute

    $attribute->set_name($name);

    $attribute->set_options($options);

    $attribute->set_position(0);

    $attribute->set_visible($visible);

    $attribute->set_variation($variation);
    $attribute->set_position($position);

    return $attribute;
}

function demo_create_variations(array &$ctx): void
{
    foreach ($ctx['demo']->colors as $color) {

        foreach ($ctx['demo']->sizes as $size) {

            demo_create_variation(
                $ctx,
                $color,
                $size
            );

        }

    }
//     $ctx['wc']['product']->set_regular_price(
//     $ctx['demo']->old_price
// );

// $ctx['wc']['product']->set_sale_price(
//     $ctx['demo']->base_price
// );

// $ctx['wc']['product']->save();
// WC_Product_Variable::sync(
//     $ctx['wc']['id']
// );
}

function demo_create_variation(
    array &$ctx,
    string $color,
    string $size
): void {

    $demo = $ctx['demo'];

    $variation = new WC_Product_Variation();

    $variation->set_parent_id(
        $ctx['wc']['id']
    );

    $variation->set_attributes([

        'color' => $color,

        'size'  => $size

    ]);

    $variation->set_manage_stock(true);

    $variation->set_stock_quantity(1);

    $variation->set_stock_status('instock');

    $variation->set_sku(sprintf(
    '%s-%s-%s',
    $demo->sku,
    sanitize_title($color),
    sanitize_title($size)));
    $config = demo_config();

    $step = $config['price_step'][$size] ?? 0;

    $price = $demo->base_price + $step;

    $regular_price = $demo->old_price + $step;

    $variation->set_regular_price($regular_price);

    $variation->set_sale_price($price);
    $variation->set_price($price);
    
    $folder = demo_image_folder($ctx);

    $file = sprintf(
        '%s-%s.jpg',
        sanitize_title($color),
        sanitize_title($size)
    );

    $image = demo_upload_image(
        $ctx,
        $folder,
        $file
    );

    $variation->set_image_id($image);

    $variation_id=$variation->get_id();

    $variation->save();

$ctx['wc']['variation_ids'][] = $variation->get_id();

demo_track(
    $ctx,
    'post',
    $variation->get_id()
);

}

function demo_image_folder(array $ctx): string
{
    $folder = trim($ctx['demo']->image_folder);

    if ($folder !== '') {
        return $folder;
    }

    return sanitize_title(
        $ctx['demo']->name
    );
}

function demo_media_upload(
    string $file,
    string $product_name = ''
): int
{
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $filename = pathinfo($file, PATHINFO_FILENAME);
    $extension = pathinfo($file, PATHINFO_EXTENSION);

    $new_filename = sprintf(
        '%s_%s.%s',
        $filename,
        sanitize_title($ctx['demo']->name),
        $extension
    );

    $upload = wp_upload_bits(
        $new_filename,
        null,
        file_get_contents($file)
    );

    if (!empty($upload['error'])) {
        throw new Exception($upload['error']);
    }

    $attachment = [
        'post_mime_type' => wp_check_filetype($upload['file'])['type'],
        'post_title'     => pathinfo($file, PATHINFO_FILENAME),
        'post_status'    => 'inherit',
    ];

    $attachment_id = wp_insert_attachment(
        $attachment,
        $upload['file']
    );

    if (is_wp_error($attachment_id)) {
        throw new Exception($attachment_id->get_error_message());
    }

    wp_update_attachment_metadata(
        $attachment_id,
        wp_generate_attachment_metadata(
            $attachment_id,
            $upload['file']
        )
    );

    return $attachment_id;
}
function demo_image_key(string $folder, string $file): string
{
    return $folder . '/' . $file;
}

function demo_upload_image(
    array &$ctx,
    string $folder,
    string $file
): int {

    $key = demo_image_key(
        $folder,
        $file
    );

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    */

    if (isset($ctx['wc']['images'][$key])) {
        return $ctx['wc']['images'][$key];
    }

    /*
    |--------------------------------------------------------------------------
    | Full Path
    |--------------------------------------------------------------------------
    */

    $path = demo_config('image_path')
        . '/'
        . $key;

    if (!file_exists($path)) {

        $path = demo_config('image_path')
            . '/no-image.jpg';

        $key = 'no-image.jpg';

        if (!file_exists($path)) {

            throw new Exception(
                'Thiếu file no-image.jpg'
            );

        }

    }
$filename = basename($path);

$attachment_id = demo_find_attachment($filename);

if ($attachment_id) {

    $ctx['wc']['images'][$key] = $attachment_id;

    return $attachment_id;
}
    /*
    |--------------------------------------------------------------------------
    | Upload
    |--------------------------------------------------------------------------
    */

    require_once ABSPATH . 'wp-admin/includes/image.php';

    $attachment_id = demo_media_upload(
    $path,
    $ctx['demo']->name
);

    if (is_wp_error($attachment_id)) {

        throw new Exception(
            $attachment_id->get_error_message()
        );

    }

    demo_track(
        $ctx,
        'attachment',
        $attachment_id
    );

    $ctx['wc']['images'][$key] = $attachment_id;

    return $attachment_id;
}

function demo_upload_cover(array &$ctx): void
{
    $folder = demo_image_folder($ctx);

    $image = demo_upload_image(
        $ctx,
        $folder,
        'main.jpg'
    );

    set_post_thumbnail(
        $ctx['wc']['id'],
        $image
    );

    $ctx['wc']['cover_id'] = $image;
}

function demo_upload_gallery(array &$ctx): void
{
    $folder = demo_image_folder($ctx);

    $gallery = demo_config('image_path')
        . '/'
        . $folder
        . '/gallery';

    if (!is_dir($gallery)) {
        return;
    }

    $ids = [];

    foreach (glob($gallery . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE) as $image) {

        $id = demo_upload_image(
            $ctx,
            $folder . '/gallery',
            basename($image)
        );

        $ids[] = $id;
    }

    if ($ids) {

        update_post_meta(
            $ctx['wc']['id'],
            '_product_image_gallery',
            implode(',', $ids)
        );

        $ctx['wc']['gallery_ids'] = $ids;

    }
}

function demo_create_tags(array &$ctx): void
{
    $demo = $ctx['demo'];

    if (empty($demo->tags)) {
        return;
    }

    $term_ids = [];

    foreach ($demo->tags as $tag) {

        $term = term_exists(
            $tag,
            'product_tag'
        );

        if (!$term) {

            $term = wp_insert_term(
                $tag,
                'product_tag'
            );

            if (is_wp_error($term)) {
                throw new Exception(
                    $term->get_error_message()
                );
            }

            $term_ids[] = $term['term_id'];

        } else {

            $term_ids[] = is_array($term)
                ? $term['term_id']
                : $term;
        }
    }

   wp_set_object_terms(
    $ctx['wc']['id'],
    array_map('intval', $term_ids),
    'product_tag'
);
}

function demo_find_attachment(string $filename): int
{
    $posts = get_posts([
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key'     => '_wp_attached_file',
                'value'   => '/' . $filename,
                'compare' => 'LIKE'
            ]
        ]
    ]);

    return $posts ? $posts[0]->ID : 0;
}
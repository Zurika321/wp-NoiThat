       <?php
require_once get_template_directory() . '/data/products-data.php';
function fmt_price($price){
    return number_format($price,0,",",".") . "₫";
}
?>
<!-- SECTION 3: PRODUCTS -->
<section class="products" id="products">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <span class="eyebrow">Sản phẩm</span>
      <h2>Sản phẩm nổi bật</h2>
      <p>Những thiết kế được yêu thích nhất tại MỘC.</p>
    </div>
    <div class="prod-grid" id="prodGrid">
    <?php foreach ($data_products as $i => $p): ?>
        <div class="prod-card"
             data-aos="zoom-in"
             data-aos-delay="<?= ($i % 4) * 100 ?>">

            <div class="prod-img">
                <img src="<?= esc_url($p['img']) ?>" alt="<?= esc_attr($p['name']) ?>">
                <div class="prod-overlay"></div>

                <div class="prod-icons">
                    <button aria-label="Yêu thích">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.8 4.6a5.5 5.5 0 00-7.8 0L12 5.6l-1-1a5.5 5.5 0 00-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 000-7.8z"/>
                        </svg>
                    </button>

                    <button aria-label="Xem chi tiết" >
                        <a href="<?= home_url('/products/?id=' . $p['id']) ?>">👁</a>
                    </button>
                </div>
            </div>

            <div class="prod-body">
                <span class="cat"><?= esc_html($p['cat']) ?></span>

                <h3><?= esc_html($p['name']) ?></h3>

                <?php

$star = round($p['rating']);

echo str_repeat("★",$star);

echo str_repeat("☆",5-$star);

?>

                <div class="prod-rating">(<?=$p['rating']?>)</div>

                <div class="prod-footer">

                    <span class="price">
                        <span class="p-price">

                    <?=fmt_price($p['price'])?>

                </span>

                <?php if($p['oldPrice']): ?>

                <span class="p-old-price">

                    <?=fmt_price($p['oldPrice'])?>

                </span>

                <?php endif; ?>
                    </span>

                    <!-- <button class="add-btn btn-ripple" aria-label="Thêm vào giỏ">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14"/>
                        </svg>
                    </button> -->

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
  </div>
</section>
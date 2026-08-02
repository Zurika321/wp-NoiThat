<?php get_header("chung"); ?>
       <?php
require_once get_template_directory() . '/data/products-data.php';

function fmt_price($price){
    return number_format($price,0,",",".") . "₫";
}
?>
<main class="error-404">
        <!-- HERO 404 -->
    <section class="hero404">
      <div
        class="hero404-bg"
        style="
          background-image: url(&quot;https://images.unsplash.com/photo-1618220179428-22790b461013?w=1920&h=1080&q=80&quot;);
        "
      ></div>
      <div class="hero404-overlay"></div>
      <div class="blob blob1"></div>
      <div class="blob blob2"></div>
      <div class="blob blob3"></div>

      <div class="container hero404-inner">
        <div class="h404-visual" data-aos="zoom-in">
          <span class="big404" id="big404">404</span>
          <div class="h404-img">
            <img
              src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=900&h=900&q=80"
              alt="Sofa MỘC"
            />
          </div>
        </div>

        <div class="h404-content" data-aos="fade-up" data-aos-delay="150">
          <span class="eyebrow">Lỗi 404</span>
          <h1>Rất tiếc! Trang bạn tìm không tồn tại.</h1>
          <p>
            Có thể đường dẫn đã bị thay đổi hoặc sản phẩm đã được gỡ bỏ. Đừng
            lo, bạn có thể quay về trang chủ hoặc tiếp tục khám phá những bộ sưu
            tập nội thất mới nhất của chúng tôi.
          </p>
          <div class="h404-btns">
            <a href="<?php echo home_url('/'); ?>" class="btn btn-primary btn-ripple pulse-btn"
              >Quay về Trang chủ</a
            >
            <a href="<?php echo home_url('/products'); ?>" class="btn btn-secondary btn-ripple"
              >Xem sản phẩm</a
            >
          </div>

          <div class="h404-search" id="searchBox">
            <svg
              width="16"
              height="16"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
            >
              <circle cx="11" cy="11" r="7" />
              <path d="M21 21l-4.3-4.3" />
            </svg>
            <input
              type="text"
              id="searchInput"
              placeholder="Sofa, bàn ăn, đèn trang trí..."
            />
            <button class="btn-ripple" id="searchBtn">Tìm kiếm</button>
          </div>

          <div class="mini-nav">
            <span>Truy cập nhanh:</span>
            <a href="<?php echo home_url('/'); ?>">Trang chủ</a><span class="dot">•</span>
            <a href="<?php echo home_url('/products'); ?>">Sản phẩm</a><span class="dot">•</span>
            <a href="<?php echo home_url('/about'); ?>">Giới thiệu</a><span class="dot">•</span>
            <a href="<?php echo home_url('/contact'); ?>">Liên hệ</a>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 2: SUGGESTED PRODUCTS -->
<section class="suggested">
    <div class="container">
        <div class="sec-head" data-aos="fade-up">
            <span class="eyebrow">Gợi ý cho bạn</span>
            <h2>Có thể bạn đang tìm</h2>
            <p>Một vài sản phẩm nổi bật đang được yêu thích tại MỘC.</p>
        </div>

        <div class="sugg-grid">
            <?php foreach (array_slice($data_products, 0, 4) as $i => $p): ?>
                <div class="sugg-card"
                     data-aos="fade-up"
                     data-aos-delay="<?= $i * 100 ?>">

                    <a href="<?= home_url('/products/?id=' . $p['id']) ?>">
                        <div class="sugg-img">
                            <img
                                src="<?= esc_url($p['img']) ?>"
                                alt="<?= esc_attr($p['name']) ?>"
                            >
                            <span class="sugg-view">Xem ngay →</span>
                        </div>

                        <div class="sugg-body">
                            <span class="cat"><?= esc_html($p['cat']) ?></span>
                            <h3><?= esc_html($p['name']) ?></h3>
                            <span class="sugg-price">
                                <?= fmt_price($p['price']) ?>
                            </span>
                        </div>
                    </a>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

    <?php
// Lấy tất cả category
$categories = array_unique(array_column($data_products, 'cat'));
sort($categories);

// Ảnh mặc định cho từng category
$category_images = [
    'Sofa'    => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&h=400&q=80',
    'Bàn'     => 'https://images.unsplash.com/photo-1617806118233-18e1de247200?w=400&h=400&q=80',
    'Ghế'     => 'https://images.unsplash.com/photo-1506439773649-6e0eb8cfb237?w=400&h=400&q=80',
    'Giường'  => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=400&h=400&q=80',
    'Tủ'      => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=400&q=80',
    'Đèn'     => 'https://images.unsplash.com/photo-1524484485831-a92ffc0de03f?w=400&h=400&q=80',
];
?>

<!-- SECTION 3: POPULAR CATEGORIES -->
<section class="pop-cats">
    <div class="container">

        <div class="sec-head" data-aos="fade-up">
            <span class="eyebrow">Khám phá thêm</span>
            <h2>Danh mục phổ biến</h2>
        </div>

        <div class="cat-grid6">

            <?php foreach ($categories as $i => $cat): ?>

                <a class="cat-tile"
                   href="<?= home_url('/products?category=' . urlencode($cat)) ?>"
                   data-cat="<?= esc_attr($cat) ?>"
                   data-aos="fade-up"
                   data-aos-delay="<?= $i * 60 ?>">

                    <div class="cat-tile-img">
                        <img src="<?= esc_url($category_images[$cat] ?? 'https://placehold.co/400x400?text=No+Image') ?>"
                             alt="<?= esc_attr($cat) ?>">
                    </div>

                    <h4><?= esc_html($cat) ?></h4>

                </a>

            <?php endforeach; ?>

        </div>

    </div>
</section>
</main>
<div id="backTop"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 19V5M5 12l7-7 7 7"/></svg></div>
<?php
get_footer(); ?>
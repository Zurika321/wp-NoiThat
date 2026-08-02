       <?php
require_once get_template_directory() . '/data/products-data.php';

?>
<!-- SECTION 1: CATEGORIES -->
<section class="categories" id="categories">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <span class="eyebrow">Bộ sưu tập</span>
      <h2>Khám phá bộ sưu tập</h2>
      <p>Mang phong cách hiện đại vào ngôi nhà của bạn.</p>
    </div>
    <div class="cat-grid">
      <?php
$categories = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
]);

$category_images = [
    'Sofa'    => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800&h=1000&q=80',
    'Bàn'     => 'https://images.unsplash.com/photo-1617806118233-18e1de247200?w=800&h=1000&q=80',
    'Ghế'     => 'https://images.unsplash.com/photo-1506439773649-6e0eb8cfb237?w=800&h=1000&q=80',
    'Giường'  => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=800&h=1000&q=80',
    'Tủ'      => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800&h=1000&q=80',
    'Đèn'     => 'https://images.unsplash.com/photo-1524484485831-a92ffc0de03f?w=800&h=1000&q=80',
];
?>

<?php foreach ($categories as $i => $cat): ?>

<?php
$thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);

$image = $thumbnail_id
    ? wp_get_attachment_image_url($thumbnail_id, 'large')
    : ($category_images[$cat->name] ?? 'https://placehold.co/800x1000?text=No+Image');
?>

<div class="cat-card"
     data-aos="fade-up"
     data-aos-delay="<?= $i * 100 ?>">

    <div class="cat-img">
        <img src="<?= esc_url($image) ?>" alt="<?= esc_attr($cat->name) ?>">
    </div>

    <div class="cat-body">
        <h3><?= esc_html($cat->name) ?></h3>

        <p>
            <?= esc_html($cat->description ?: 'Khám phá các sản phẩm nổi bật.') ?>
        </p>

        <a class="cat-link" href="<?= esc_url(get_term_link($cat)) ?>">
            Xem thêm
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6"/>
            </svg>
        </a>
    </div>

</div>

<?php endforeach; ?>
      <!-- <div class="cat-card" data-aos="fade-up" data-aos-delay="0">
        <div class="cat-img"><img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800&h=1000&q=80" alt="Sofa"></div>
        <div class="cat-body"><h3>Sofa</h3><p>Đường nét mềm mại, chất liệu bọc cao cấp cho phòng khách ấm cúng.</p><a class="cat-link" href="#products">Xem thêm <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div>
      </div>
      <div class="cat-card" data-aos="fade-up" data-aos-delay="100">
        <div class="cat-img"><img src="https://images.unsplash.com/photo-1617806118233-18e1de247200?w=800&h=1000&q=80" alt="Bàn ăn"></div>
        <div class="cat-body"><h3>Bàn ăn</h3><p>Gỗ tự nhiên nguyên khối, nơi sum họp của cả gia đình.</p><a class="cat-link" href="#products">Xem thêm <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div>
      </div>
      <div class="cat-card" data-aos="fade-up" data-aos-delay="200">
        <div class="cat-img"><img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=800&h=1000&q=80" alt="Giường ngủ"></div>
        <div class="cat-body"><h3>Giường ngủ</h3><p>Thiết kế tối giản, mang lại giấc ngủ trọn vẹn mỗi đêm.</p><a class="cat-link" href="#products">Xem thêm <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div>
      </div>
      <div class="cat-card" data-aos="fade-up" data-aos-delay="300">
        <div class="cat-img"><img src="https://images.unsplash.com/photo-1524484485831-a92ffc0de03f?w=800&h=1000&q=80" alt="Đèn trang trí"></div>
        <div class="cat-body"><h3>Đèn trang trí</h3><p>Ánh sáng ấm áp, điểm nhấn tinh tế cho mọi không gian.</p><a class="cat-link" href="#products">Xem thêm <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div>
      </div> -->
    </div>
  </div>
</section>
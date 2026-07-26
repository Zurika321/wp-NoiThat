<body>
   <?php get_header('chung'); ?>
<?php

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
);

$query = new WP_Query($args);

$blog_posts = [];

if($query->have_posts()) :

    while($query->have_posts()) :

        $query->the_post();

        $blog_posts[] = array(

            'id' => get_the_ID(),

            'title' => get_the_title(),

            'excerpt' => get_the_excerpt(),

            'date' => get_the_date('Y-m-d'),

            'author' => get_the_author(),

            'link' => get_permalink(),

            'thumbnail' => get_the_post_thumbnail_url(
                get_the_ID(),
                'large'
            ),

            'category' => get_the_category()
                ? get_the_category()[0]->name
                : 'Chưa phân loại'

        );

    endwhile;

endif;

wp_reset_postdata();
$featured_post = !empty($blog_posts) ? $blog_posts[0] : null;
?>

?>
<!-- HERO -->
    <section class="hero">
      <div
        class="hero-bg"
        style="
          background-image: url(&quot;https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1920&h=800&q=80&quot;);
        "
      ></div>
      <div class="hero-overlay"></div>
      <div class="container hero-content">
        <span class="eyebrow" data-aos="fade-up">Blog</span>
        <h1 data-aos="fade-up" data-aos-delay="100">
          Ý tưởng thiết kế cho<br />không gian sống hiện đại
        </h1>
        <p data-aos="fade-up" data-aos-delay="200">
          Cập nhật xu hướng, mẹo bài trí và những câu chuyện truyền cảm hứng từ
          thế giới nội thất — được MỘC chọn lọc mỗi tuần.
        </p>
        <a
          href="#featured"
          class="btn btn-primary btn-ripple"
          data-aos="zoom-in"
          data-aos-delay="300"
          >Khám phá</a
        >
      </div>
      <div class="scroll-ind"><div class="mouse"></div></div>
    </section>

    <!-- SECTION 1: FEATURED ARTICLE -->
    <section class="featured" id="featured">
      <div class="container">

<?php if($featured_post): ?>

<div class="featured-card">

<div class="featured-img">

<img
src="<?php echo esc_url($featured_post['thumbnail']); ?>"
alt="<?php echo esc_attr($featured_post['title']); ?>"
>

</div>

<div class="featured-body">

<div class="f-meta">

<span class="pill">
<?php echo esc_html($featured_post['category']); ?>
</span>

<span>
<?php echo esc_html($featured_post['date']); ?>
</span>

</div>

<h2>

<?php echo esc_html($featured_post['title']); ?>

</h2>

<p>

<?php echo esc_html($featured_post['excerpt']); ?>

</p>

<a
href="<?php echo esc_url($featured_post['link']); ?>"
class="btn btn-primary btn-ripple">

Đọc bài viết

</a>

</div>

</div>

<?php endif; ?>

</div>
    </section>

    <!-- TOOLBAR -->
    <div class="toolbar" id="toolbar">
      <div class="container toolbar-inner">
        <div class="search-box" id="searchBox">
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
          <input type="text" id="searchInput" placeholder="Tìm bài viết..." />
        </div>
        <select class="tb-select" id="sortSelect">
          <option value="newest">Mới nhất</option>
          <option value="oldest">Cũ nhất</option>
          <option value="featured">Nổi bật</option>
          <option value="views">Đọc nhiều</option>
        </select>
        <span class="result-count"
          >Hiển thị <strong id="resultCount">0</strong> bài viết</span
        >
      </div>
    </div>

    <!-- CATEGORY PILLS -->
    <div class="cat-pills-wrap">
      <div class="container">
        <div class="cat-pills" id="catPills"></div>
      </div>
    </div>

    <!-- LIST + SIDEBAR -->
    <section class="blog-layout">
      <div class="container blog-grid-wrap">
        <div>
          <div class="post-grid" id="postGrid"></div>
          <div class="pagination" id="pagination"></div>
        </div>

        <!-- SIDEBAR -->
        <aside class="sidebar">
          <div class="side-card" data-aos="fade-left">
            <h4>🔥 Xem nhiều nhất</h4>
            <div id="trendingList"></div>
          </div>
          <div class="side-card" data-aos="fade-left" data-aos-delay="100">
            <h4>⭐ Bài viết nổi bật</h4>
            <div id="featuredList"></div>
          </div>
          <div class="side-card" data-aos="fade-left" data-aos-delay="200">
            <h4>🕒 Mới nhất</h4>
            <div id="newestList"></div>
          </div>
          <div class="side-card" data-aos="fade-left" data-aos-delay="300">
            <h4>Tag phổ biến</h4>
            <div class="tag-cloud">
              <span class="tag-chip">Sofa</span
              ><span class="tag-chip">Minimal</span
              ><span class="tag-chip">Scandinavian</span>
              <span class="tag-chip">Luxury</span
              ><span class="tag-chip">Decor</span
              ><span class="tag-chip">Kitchen</span>
              <span class="tag-chip">Living Room</span
              ><span class="tag-chip">Wood</span
              ><span class="tag-chip">Office</span>
            </div>
          </div>
        </aside>
      </div>
    </section>

    <!-- NEWSLETTER -->
    <section class="newsletter-sec">
      <div class="container" data-aos="fade-up">
        <h2>Nhận xu hướng nội thất mới nhất mỗi tuần</h2>
        <div class="nl-form" id="nlForm">
          <input type="email" id="nlInput" placeholder="Nhập email của bạn" />
          <button class="btn-ripple" id="nlBtn">
            <svg
              width="15"
              height="15"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
            >
              <rect x="2" y="4" width="20" height="16" rx="2" />
              <path d="M2 6l10 7 10-7" /></svg
            >Đăng ký
          </button>
        </div>
      </div>
    </section>

    <!-- GALLERY -->
    <section class="insta">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">@moc.home</span>
          <h2>Cảm hứng từ Instagram</h2>
        </div>
        <div class="insta-grid" id="instaGrid"></div>
      </div>
    </section>

    <!-- CTA -->
    <section class="cta">
      <div class="container" data-aos="zoom-in">
        <h2>Bạn cần tư vấn thiết kế nội thất?</h2>
        <div
          style="
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
          "
        >
          <a href="index.html#footer" class="btn btn-primary btn-ripple"
            >Liên hệ ngay</a
          >
          <a href="products.html" class="btn btn-line btn-ripple"
            >Xem bộ sưu tập</a
          >
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer id="footer">
      <div class="container">
        <div class="footer-grid" data-aos="fade-up">
          <div class="footer-brand">
            <span class="brand">MỘC</span>
            <p>
              Nội thất hiện đại, kiến tạo không gian sống — chế tác thủ công từ
              gỗ tự nhiên cho ngôi nhà Việt.
            </p>
            <div class="socials">
              <a href="#" aria-label="Facebook"
                ><svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                >
                  <path
                    d="M22 12a10 10 0 10-11.5 9.9v-7H8v-2.9h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6v1.9H16l-.4 2.9h-2.1v7A10 10 0 0022 12z"
                  /></svg
              ></a>
              <a href="#" aria-label="Instagram"
                ><svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="1.8"
                >
                  <rect x="3" y="3" width="18" height="18" rx="5" />
                  <circle cx="12" cy="12" r="4" />
                  <circle cx="17.5" cy="6.5" r="1" /></svg
              ></a>
              <a href="#" aria-label="Pinterest"
                ><svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                >
                  <path
                    d="M12 2a10 10 0 00-3.6 19.3c0-.8 0-1.8.2-2.6l1.4-6s-.3-.7-.3-1.7c0-1.6.9-2.8 2.1-2.8 1 0 1.5.7 1.5 1.6 0 1-.6 2.5-1 3.9-.3 1.1.6 2.1 1.7 2.1 2 0 3.5-2.1 3.5-5.2 0-2.7-2-4.6-4.7-4.6-3.2 0-5.1 2.4-5.1 4.9 0 1 .3 1.6.8 2.2.1.1.1.2.1.3l-.3 1.1c0 .2-.2.3-.3.2-1.2-.5-1.8-1.9-1.8-3.5 0-2.6 2.2-5.7 6.5-5.7 3.5 0 5.8 2.5 5.8 5.2 0 3.6-1.9 6.2-4.8 6.2-1 0-1.9-.5-2.2-1.1l-.6 2.4c-.2.9-.7 1.9-1.1 2.6A10 10 0 1012 2z"
                  /></svg
              ></a>
            </div>
          </div>
          <div>
            <h4>Liên kết</h4>
            <ul>
              <li><a href="index.html">Trang chủ</a></li>
              <li><a href="products.html">Sản phẩm</a></li>
              <li><a href="about.html">Giới thiệu</a></li>
              <li><a href="blog.html">Tin tức</a></li>
            </ul>
          </div>
          <div>
            <h4>Liên hệ</h4>
            <ul class="contact-list">
              <li>123 Nguyễn Huệ, Quận 1, TP.HCM</li>
              <li>+84 28 3822 1234</li>
              <li>hello@mochome.vn</li>
              <li>Thứ 2–CN: 8:00–21:00</li>
            </ul>
          </div>
          <div class="newsletter">
            <h4>Đăng ký nhận tin</h4>
            <p>Nhận ưu đãi và xu hướng nội thất mới nhất mỗi tháng.</p>
            <div class="news-form">
              <input type="email" placeholder="Email của bạn" /><button
                class="btn-ripple"
              >
                Gửi
              </button>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <span>© 2026 MỘC Home. All rights reserved.</span
          ><span>Thiết kế với ♥ tại Việt Nam</span>
        </div>
      </div>
    </footer>

    <div id="toastWrap"></div>
    
//
<script>

const wpPosts = <?php
echo json_encode(
    $blog_posts,
    JSON_UNESCAPED_UNICODE
);
?>;

</script>
   <?php get_footer(); ?>
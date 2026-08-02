<?php
get_header("chung");?>
<!-- HERO -->
    <section class="hero">
      <div
        class="hero-bg"
        style="
          background-image: url(&quot;https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=1920&h=900&q=80&quot;);
        "
      ></div>
      <div class="hero-overlay"></div>
      <div class="container hero-content">
        <span class="eyebrow" data-aos="fade-down">Collection</span>
        <h1 data-aos="fade-down" data-aos-delay="100">
          Khám phá những không gian<br />sống đầy cảm hứng
        </h1>
        <p data-aos="fade-down" data-aos-delay="200">
          Bộ sưu tập hình ảnh không gian thực tế được MỘC tuyển chọn — nơi bạn
          có thể tìm thấy ý tưởng bài trí cho chính ngôi nhà của mình.
        </p>
        <a
          href="#gallery"
          class="btn btn-primary btn-ripple"
          data-aos="zoom-in"
          data-aos-delay="300"
          >Xem bộ sưu tập</a
        >
      </div>
      <div class="breadcrumb">
        <div class="container">
          <a href="index.html">Home</a> &gt; Collection
        </div>
      </div>
      <div class="scroll-ind"><div class="mouse"></div></div>
    </section>

    <!-- SECTION 1: FEATURED COLLECTION -->
    <section class="featured">
      <div class="container">
        <div class="featured-card">
          <div class="featured-img" data-aos="fade-right">
            <img
              src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=1600&h=1000&q=80"
              alt="Scandinavian Living"
            />
          </div>
          <div class="featured-body" data-aos="fade-left">
            <span class="eyebrow">Featured Collection</span>
            <h2>Scandinavian Living</h2>
            <p>
              Không gian phòng khách tối giản với tông màu trung tính, ánh sáng
              tự nhiên và chất liệu gỗ sồi — mang lại cảm giác ấm áp mà vẫn
              thanh lịch, hiện đại.
            </p>
            <div class="f-info">
              <div><strong>24</strong>Ảnh</div>
              <div>
                <strong>Living<br />Room</strong>Không gian
              </div>
              <div><strong>2026</strong>Collection</div>
            </div>
            <a
              href="#gallery"
              class="btn btn-primary btn-ripple"
              style="
                background: var(--wood);
                color: var(--white);
                width: fit-content;
              "
              >Khám phá ngay</a
            >
          </div>
        </div>
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
          <input type="text" id="searchInput" placeholder="Tìm bộ sưu tập..." />
        </div>
        <select class="tb-select" id="catSelect">
          <option value="all">Tất cả</option>
          <option value="Living Room">Living Room</option>
          <option value="Bedroom">Bedroom</option>
          <option value="Dining">Dining</option>
          <option value="Kitchen">Kitchen</option>
          <option value="Office">Office</option>
          <option value="Decor">Decor</option>
        </select>
        <select class="tb-select" id="sortSelect">
          <option value="newest">Mới nhất</option>
          <option value="featured">Nổi bật</option>
          <option value="az">Tên A-Z</option>
        </select>
        <div class="view-toggle">
          <button class="active" id="viewMasonry">
            <svg
              width="14"
              height="14"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
            >
              <rect x="3" y="3" width="7" height="9" />
              <rect x="14" y="3" width="7" height="5" />
              <rect x="14" y="12" width="7" height="9" />
              <rect x="3" y="16" width="7" height="5" /></svg
            >Masonry
          </button>
          <button id="viewGrid">
            <svg
              width="14"
              height="14"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
            >
              <rect x="3" y="3" width="7" height="7" />
              <rect x="14" y="3" width="7" height="7" />
              <rect x="3" y="14" width="7" height="7" />
              <rect x="14" y="14" width="7" height="7" /></svg
            >Grid
          </button>
        </div>
      </div>
    </div>

    <!-- SECTION 3: CATEGORY CARDS -->
    <section class="cat-section">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Danh mục</span>
          <h2>Khám phá theo không gian</h2>
        </div>
        <div class="catcard-grid" id="catCardGrid"></div>
      </div>
    </section>

    <!-- SECTION 4: GALLERY MASONRY -->
    <section class="gallery-sec" id="gallery">
      <div class="container">
        <div id="skeletonWrap" class="skel-masonry"></div>
        <div class="masonry" id="masonryGrid" style="display: none"></div>
        <div class="load-more-wrap" id="loadMoreWrap" style="display: none">
          <button
            class="btn btn-primary btn-ripple"
            id="loadMoreBtn"
            style="background: var(--wood); color: var(--white)"
          >
            Xem thêm ảnh
          </button>
        </div>
      </div>
    </section>

    <!-- LIGHTBOX -->
    <div class="lightbox" id="lightbox">
      <div class="lb-actions">
        <button id="lbZoom" title="Phóng to">
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
            <path d="M11 8v6M8 11h6" />
          </svg>
        </button>
        <button id="lbFullscreen" title="Toàn màn hình">
          <svg
            width="16"
            height="16"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              d="M8 3H5a2 2 0 00-2 2v3M16 3h3a2 2 0 012 2v3M8 21H5a2 2 0 01-2-2v-3M16 21h3a2 2 0 002-2v-3"
            />
          </svg>
        </button>
        <a id="lbDownload" title="Tải xuống" download
          ><svg
            width="16"
            height="16"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"
            /></svg
        ></a>
      </div>
      <span class="lb-close" id="lbClose">&times;</span>
      <div class="lb-body">
        <div class="lb-main">
          <div class="lb-nav lb-prev" id="lbPrev">
            <svg
              width="18"
              height="18"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
            >
              <path d="M15 18l-6-6 6-6" />
            </svg>
          </div>
          <div class="lb-imgwrap"><img id="lbImg" src="" alt="" /></div>
          <div class="lb-nav lb-next" id="lbNext">
            <svg
              width="18"
              height="18"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
            >
              <path d="M9 18l6-6-6-6" />
            </svg>
          </div>
          <div class="lb-thumbs" id="lbThumbs"></div>
        </div>
        <div class="lb-panel">
          <span class="eyebrow" id="lbCat">Category</span>
          <h3 id="lbTitle">Title</h3>
          <p id="lbDesc">Description</p>
          <div class="lb-meta-row">
            <span>Danh mục</span><span id="lbMetaCat">-</span>
          </div>
          <div class="lb-meta-row">
            <span>Năm</span><span id="lbMetaYear">2026</span>
          </div>
          <div class="lb-meta-row">
            <span>Chất liệu</span><span id="lbMetaMat">-</span>
          </div>
          <div class="lb-related">
            <h4>Sản phẩm liên quan</h4>
            <div id="lbRelated"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- SECTION 5: COLLECTION HIGHLIGHT -->
    <section class="highlight">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Nổi bật</span>
          <h2>Collection Highlight</h2>
        </div>
        <div class="hl-grid">
          <div class="hl-card" data-aos="fade-up" data-aos-delay="0">
            <span class="hl-badge">NEW</span>
            <img
              src="https://images.unsplash.com/photo-1615874959474-d609969a20ed?w=1000&h=1400&q=80"
              alt="Nordic Living"
            />
            <div class="hl-overlay">
              <h3>Nordic Living</h3>
              <span>18 không gian · 2026</span>
            </div>
          </div>
          <div class="hl-card" data-aos="fade-up" data-aos-delay="120">
            <span class="hl-badge">NEW</span>
            <img
              src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1000&h=1400&q=80"
              alt="Luxury Home"
            />
            <div class="hl-overlay">
              <h3>Luxury Home</h3>
              <span>22 không gian · 2026</span>
            </div>
          </div>
          <div class="hl-card" data-aos="fade-up" data-aos-delay="240">
            <span class="hl-badge">NEW</span>
            <img
              src="https://images.unsplash.com/photo-1615529182904-14819c35db37?w=1000&h=1400&q=80"
              alt="Minimal House"
            />
            <div class="hl-overlay">
              <h3>Minimal House</h3>
              <span>15 không gian · 2026</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 6: LOOKBOOK -->
    <section class="lookbook">
      <div class="container lb-grid">
        <div class="lb-img-wrap" data-aos="fade-right" id="lookbookImgWrap">
          <img
            src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=1200&h=1600&q=80"
            alt="Lookbook"
            id="lookbookImg"
          />
          <div
            class="hotspot"
            style="top: 38%; left: 32%"
            data-name="Sofa Milan"
            data-price="18.500.000₫"
            data-img="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=300&h=200&q=80"
          >
            <span></span>
          </div>
          <div
            class="hotspot"
            style="top: 62%; left: 58%"
            data-name="Bàn Osaka"
            data-price="12.900.000₫"
            data-img="https://images.unsplash.com/photo-1615066390971-03e4e1c36ddf?w=300&h=200&q=80"
          >
            <span></span>
          </div>
          <div
            class="hotspot"
            style="top: 20%; left: 70%"
            data-name="Đèn Aurora"
            data-price="2.450.000₫"
            data-img="https://images.unsplash.com/photo-1543198126-cdcb62dc4e00?w=300&h=200&q=80"
          >
            <span></span>
          </div>
          <div class="hotspot-card" id="hotspotCard"></div>
        </div>
        <div class="lb-content" data-aos="fade-left">
          <span class="eyebrow">Lookbook</span>
          <h2>Không gian phòng khách mùa hè</h2>
          <p>
            Một buổi chiều nắng nhẹ, ánh sáng len qua ô cửa kính lớn — nơi chiếc
            sofa Milan êm ái trở thành trung tâm của những cuộc trò chuyện. Chạm
            vào từng chấm tròn trên ảnh để khám phá các món đồ xuất hiện trong
            không gian này.
          </p>
          <ul class="lb-products">
            <li>
              <svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <path d="M20 6L9 17l-5-5" /></svg
              >Sofa Milan
            </li>
            <li>
              <svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <path d="M20 6L9 17l-5-5" /></svg
              >Bàn Osaka
            </li>
            <li>
              <svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <path d="M20 6L9 17l-5-5" /></svg
              >Đèn Aurora
            </li>
            <li>
              <svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <path d="M20 6L9 17l-5-5" /></svg
              >Thảm Linen
            </li>
          </ul>
          <a
            href="products.html"
            class="btn btn-primary btn-ripple"
            style="background: var(--wood); color: var(--white)"
            >Xem sản phẩm</a
          >
        </div>
      </div>
    </section>

    <!-- SECTION 7: INSTAGRAM -->
    <section class="insta">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">@moc.home</span>
          <h2>Instagram Inspiration</h2>
        </div>
        <div class="insta-grid" id="instaGrid"></div>
        <a
          href="#"
          class="btn btn-primary btn-ripple"
          style="background: var(--wood); color: var(--white)"
          data-aos="fade-up"
          >Theo dõi chúng tôi</a
        >
      </div>
    </section>

    <!-- SECTION 8: CTA -->
    <section class="cta">
      <div class="container" data-aos="fade-up">
        <h2>Bạn đã tìm thấy phong cách yêu thích?</h2>
        <div
          style="
            display: flex;
            gap: 18px;
            justify-content: center;
            flex-wrap: wrap;
          "
        >
          <a href="products.html" class="btn btn-primary btn-ripple pulse-btn"
            >Xem sản phẩm</a
          >
          <a href="index.html#footer" class="btn btn-outline btn-ripple"
            >Liên hệ tư vấn</a
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
  <?php wp_footer(); ?>

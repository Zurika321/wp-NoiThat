       <?php get_header('cart'); ?>
    <!-- BANNER -->
    <section class="p-banner">
      <div
        class="p-banner-bg"
        style="
          background-image: url(&quot;https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=1920&h=500&q=80&quot;);
        "
      ></div>
      <div class="p-banner-overlay"></div>
      <div class="container p-banner-content">
        <div class="breadcrumb" data-aos="fade-up">
          <a href="index.html">Home</a> / Products
        </div>
        <h1 data-aos="fade-up" data-aos-delay="100">Sản phẩm</h1>
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
          <input type="text" id="searchInput" placeholder="Tìm theo tên..." />
        </div>
        <button class="tb-btn" id="filterToggleBtn">
          <svg
            width="16"
            height="16"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
          >
            <path d="M4 6h16M7 12h10M10 18h4" />
          </svg>
          Lọc
        </button>
        <select class="tb-select" id="sortSelect">
          <option value="newest">Mới nhất</option>
          <option value="price-asc">Giá tăng</option>
          <option value="price-desc">Giá giảm</option>
          <option value="bestseller">Bán chạy</option>
          <option value="rating">Đánh giá</option>
        </select>
        <span class="result-count"
          >Đang hiển thị <strong id="resultCount">0</strong> sản phẩm</span
        >
      </div>
    </div>

    <!-- EXPLORER -->
    <section class="explorer">
      <div class="container">
        <div class="explorer-grid with-detail" id="explorerGrid">
          <!-- SIDEBAR -->
          <aside class="sidebar" id="sidebar">
            <div class="sidebar-head">
              <h3>Bộ lọc</h3>
              <span class="sidebar-close" id="sidebarClose">&times;</span>
            </div>

            <div class="acc-item open">
              <div class="acc-head">
                Danh mục
                <svg
                  width="14"
                  height="14"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.4"
                >
                  <path d="M6 9l6 6 6-6" />
                </svg>
              </div>
              <div class="acc-body">
                <div class="acc-inner" id="catFilters"></div>
              </div>
            </div>

            <div class="acc-item open">
              <div class="acc-head">
                Khoảng giá
                <svg
                  width="14"
                  height="14"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.4"
                >
                  <path d="M6 9l6 6 6-6" />
                </svg>
              </div>
              <div class="acc-body">
                <div class="acc-inner">
                  <div class="price-slider">
                    <div class="price-track">
                      <div class="price-range" id="priceRangeFill"></div>
                    </div>
                    <input
                      type="range"
                      id="priceMin"
                      min="0"
                      max="100000000"
                      step="500000"
                      value="0"
                    />
                    <input
                      type="range"
                      id="priceMax"
                      min="0"
                      max="100000000"
                      step="500000"
                      value="100000000"
                    />
                    <div class="price-vals">
                      <span id="priceMinLbl">0₫</span
                      ><span id="priceMaxLbl">100.000.000₫</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="acc-item open">
              <div class="acc-head">
                Màu sắc
                <svg
                  width="14"
                  height="14"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.4"
                >
                  <path d="M6 9l6 6 6-6" />
                </svg>
              </div>
              <div class="acc-body">
                <div class="acc-inner">
                  <div class="color-row" id="colorFilters"></div>
                </div>
              </div>
            </div>

            <div class="acc-item">
              <div class="acc-head">
                Chất liệu
                <svg
                  width="14"
                  height="14"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.4"
                >
                  <path d="M6 9l6 6 6-6" />
                </svg>
              </div>
              <div class="acc-body">
                <div class="acc-inner" id="matFilters"></div>
              </div>
            </div>

            <div class="acc-item">
              <div class="acc-head">
                Đánh giá
                <svg
                  width="14"
                  height="14"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.4"
                >
                  <path d="M6 9l6 6 6-6" />
                </svg>
              </div>
              <div class="acc-body">
                <div class="acc-inner" id="ratingFilters"></div>
              </div>
            </div>

            <div class="sidebar-actions">
              <button class="btn btn-clear btn-ripple" id="clearFiltersBtn">
                Xóa bộ lọc
              </button>
              <button class="btn btn-apply btn-ripple" id="applyFiltersBtn">
                Lọc
              </button>
            </div>
          </aside>

          <!-- PRODUCT GRID -->
          <div class="grid-wrap">
            <div class="product-grid" id="productGrid"></div>
            <div class="load-more-wrap" id="loadMoreWrap" style="display: none">
              <button
                class="btn btn-primary btn-ripple"
                id="loadMoreBtn"
                style="background: var(--wood); color: var(--white)"
              >
                Xem thêm sản phẩm
              </button>
            </div>

            <!-- Tablet inline detail target -->
            <div id="tabletDetailSlot"></div>

            <!-- Related products (desktop/tablet, appears after selecting) -->
            <div class="rel-wrap" id="relatedWrap" style="display: none">
              <div class="rel-head"><h3>Có thể bạn thích</h3></div>
              <div class="rel-slider" id="relatedSlider"></div>
            </div>
          </div>

          <!-- DETAIL PANEL (desktop) -->
          <aside class="detail-panel" id="detailPanel">
            <div class="detail-empty" id="detailEmpty">
              <img
                src="https://images.unsplash.com/photo-1567016432779-094069958ea5?w=800&h=800&q=80"
                alt=""
              />
              <p>Chọn sản phẩm để xem chi tiết</p>
            </div>
            <div class="detail-content" id="detailContent"></div>
          </aside>
        </div>
      </div>
    </section>

    <!-- RECENTLY VIEWED -->
    <section
      class="recently-section"
      id="recentlySection"
      style="display: none"
    >
      <div class="container">
        <div class="rel-head"><h3>Đã xem gần đây</h3></div>
        <div class="rel-slider" id="recentlySlider"></div>
      </div>
    </section>

    <!-- CTA -->
    <section class="p-cta">
      <div class="container" data-aos="zoom-in">
        <h2>
          Bạn chưa tìm được sản phẩm phù hợp?<br />Liên hệ tư vấn miễn phí ngay
          hôm nay.
        </h2>
        <a href="index.html#footer" class="btn btn-primary btn-ripple"
          >Liên hệ</a
        >
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
              <li><a href="index.html#brand">Giới thiệu</a></li>
              <li><a href="index.html#blog">Tin tức</a></li>
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

    <!-- BOTTOM SHEET (mobile) -->
    <div class="sheet-overlay" id="sheetOverlay"></div>
    <div class="bottom-sheet" id="bottomSheet">
      <div class="sheet-handle"></div>
      <div id="sheetContent"></div>
    </div>

    <!-- SIDEBAR OVERLAY -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div id="toastWrap"></div>

  <?php wp_footer(); ?>
</body>
</html>
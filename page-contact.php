<!-- HERO -->
    <section class="hero">
      <div
        class="hero-bg"
        style="
          background-image: url(&quot;https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1920&h=800&q=80&quot;);
        "
      ></div>
      <div class="hero-overlay"></div>
      <div class="container hero-content">
        <span class="eyebrow" data-aos="fade-up">Contact</span>
        <h1 data-aos="fade-up" data-aos-delay="100">
          Chúng tôi luôn sẵn sàng<br />lắng nghe bạn
        </h1>
        <p data-aos="fade-up" data-aos-delay="200">
          Dù bạn cần tư vấn thiết kế, đặt lịch tham quan showroom hay chỉ đơn
          giản là có một câu hỏi — đội ngũ MỘC luôn ở đây để hỗ trợ.
        </p>
        <a
          href="#form"
          class="btn btn-primary btn-ripple"
          data-aos="zoom-in"
          data-aos-delay="300"
          >Liên hệ ngay</a
        >
      </div>
      <div class="breadcrumb">
        <div class="container"><a href="index.html">Home</a> &gt; Contact</div>
      </div>
      <div class="scroll-ind"><div class="mouse"></div></div>
    </section>

    <!-- SECTION 1: QUICK INFO -->
    <section class="quick-info">
      <div class="container">
        <div class="qi-grid">
          <div class="qi-card" data-aos="fade-up" data-aos-delay="0">
            <div class="qi-ic">
              <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path
                  d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3 19.5 19.5 0 01-6-6 19.8 19.8 0 01-3-8.7A2 2 0 014.1 2h3a2 2 0 012 1.7c.1 1 .3 2 .7 3a2 2 0 01-.4 2.1L8 10.3a16 16 0 006 6l1.5-1.5a2 2 0 012.1-.4c1 .4 2 .6 3 .7a2 2 0 011.7 2z"
                />
              </svg>
            </div>
            <h4>Hotline</h4>
            <p>0900 000 000</p>
            <div class="live-badge">
              <span class="live-dot"></span>Đang trực tuyến
            </div>
          </div>
          <div class="qi-card" data-aos="fade-up" data-aos-delay="100">
            <div class="qi-ic">
              <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <rect x="2" y="4" width="20" height="16" rx="2" />
                <path d="M2 6l10 7 10-7" />
              </svg>
            </div>
            <h4>Email</h4>
            <p>contact@mochome.vn</p>
          </div>
          <div class="qi-card" data-aos="fade-up" data-aos-delay="200">
            <div class="qi-ic">
              <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0118 0z" />
                <circle cx="12" cy="10" r="3" />
              </svg>
            </div>
            <h4>Địa chỉ</h4>
            <p>123 Nguyễn Huệ, Q.1, TP.HCM</p>
          </div>
          <div class="qi-card" data-aos="fade-up" data-aos-delay="300">
            <div class="qi-ic">
              <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <circle cx="12" cy="12" r="9" />
                <path d="M12 7v5l3 3" />
              </svg>
            </div>
            <h4>Giờ làm việc</h4>
            <p>08:00 – 21:00</p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 2: FORM + COMPANY INFO -->
    <section class="form-sec" id="form">
      <div class="container form-grid">
        <div data-aos="fade-right">
          <span class="eyebrow">Gửi yêu cầu</span>
          <h2 style="font-size: clamp(24px, 2.8vw, 32px); margin-bottom: 26px">
            Điền thông tin liên hệ
          </h2>
          <form id="contactForm" novalidate>
            <div class="row2">
              <div class="field" id="f-name">
                <label>Họ tên *</label
                ><input
                  type="text"
                  name="name"
                  placeholder="Nguyễn Văn A"
                /><span class="err-msg">Vui lòng nhập họ tên</span>
              </div>
              <div class="field" id="f-email">
                <label>Email *</label
                ><input
                  type="email"
                  name="email"
                  placeholder="ban@email.com"
                /><span class="err-msg">Email không hợp lệ</span>
              </div>
            </div>
            <div class="row2">
              <div class="field" id="f-phone">
                <label>Số điện thoại *</label
                ><input
                  type="tel"
                  name="phone"
                  placeholder="09xx xxx xxx"
                /><span class="err-msg">Số điện thoại không hợp lệ</span>
              </div>
              <div class="field" id="f-subject">
                <label>Chủ đề</label>
                <select name="subject">
                  <option>Tư vấn sản phẩm</option>
                  <option>Báo giá thiết kế</option>
                  <option>Bảo hành</option>
                  <option>Khác</option>
                </select>
              </div>
            </div>
            <div class="field" id="f-message">
              <label>Nội dung *</label
              ><textarea
                name="message"
                placeholder="Bạn cần hỗ trợ điều gì..."
              ></textarea
              ><span class="err-msg">Vui lòng nhập nội dung</span>
            </div>
            <div class="chk-row">
              <input type="checkbox" id="agree" /><label for="agree"
                >Tôi đồng ý cho MỘC lưu trữ thông tin để liên hệ tư vấn theo
                <a
                  href="#"
                  style="color: var(--wood); text-decoration: underline"
                  >chính sách bảo mật</a
                >.</label
              >
            </div>
            <button
              type="submit"
              class="btn submit-btn btn-ripple"
              id="submitBtn"
            >
              <span class="spinner"></span
              ><span class="btn-txt">Gửi liên hệ</span>
            </button>
          </form>
        </div>

        <div class="company-card" data-aos="fade-left">
          <span class="brand">MỘC</span>
          <p>
            Nội thất hiện đại, kiến tạo không gian sống — chế tác thủ công từ gỗ
            tự nhiên cho ngôi nhà Việt, đồng hành cùng bạn từ ý tưởng đến hoàn
            thiện.
          </p>
          <div class="company-row">
            <span class="ic"
              ><svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3 19.5 19.5 0 01-6-6 19.8 19.8 0 01-3-8.7A2 2 0 014.1 2h3a2 2 0 012 1.7c.1 1 .3 2 .7 3a2 2 0 01-.4 2.1L8 10.3a16 16 0 006 6l1.5-1.5a2 2 0 012.1-.4c1 .4 2 .6 3 .7a2 2 0 011.7 2z"
                /></svg></span
            >0900 000 000
          </div>
          <div class="company-row">
            <span class="ic"
              ><svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <rect x="2" y="4" width="20" height="16" rx="2" />
                <path d="M2 6l10 7 10-7" /></svg></span
            >contact@mochome.vn
          </div>
          <div class="company-row">
            <span class="ic"
              ><svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <circle cx="12" cy="12" r="9" />
                <path
                  d="M2 12h20M12 3a15 15 0 010 18 15 15 0 010-18z"
                /></svg></span
            >mochome.vn
          </div>
          <div class="company-socials">
            <a href="#" aria-label="Facebook"
              ><svg
                width="15"
                height="15"
                viewBox="0 0 24 24"
                fill="currentColor"
              >
                <path
                  d="M22 12a10 10 0 10-11.5 9.9v-7H8v-2.9h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6v1.9H16l-.4 2.9h-2.1v7A10 10 0 0022 12z"
                /></svg
            ></a>
            <a href="#" aria-label="Instagram"
              ><svg
                width="15"
                height="15"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <rect x="3" y="3" width="18" height="18" rx="5" />
                <circle cx="12" cy="12" r="4" />
                <circle cx="17.5" cy="6.5" r="1" /></svg
            ></a>
            <a href="#" aria-label="Zalo"
              ><svg
                width="15"
                height="15"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path
                  d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"
                /></svg
            ></a>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 3: BOOKING -->
    <section class="booking">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Đặt lịch</span>
          <h2>Đặt lịch tư vấn</h2>
          <p>
            Chọn thời gian phù hợp, đội ngũ MỘC sẽ liên hệ xác nhận trong 24
            giờ.
          </p>
        </div>
        <div class="booking-card" data-aos="fade-up">
          <form id="bookingForm">
            <div class="booking-grid">
              <div class="field">
                <label>Họ tên *</label
                ><input type="text" placeholder="Họ và tên" required />
              </div>
              <div class="field">
                <label>Điện thoại *</label
                ><input type="tel" placeholder="Số điện thoại" required />
              </div>
              <div class="field">
                <label>Chi nhánh</label>
                <select>
                  <option>Hồ Chí Minh</option>
                  <option>Hà Nội</option>
                  <option>Đà Nẵng</option>
                </select>
              </div>
              <div class="field">
                <label>Ngày *</label><input type="date" required />
              </div>
              <div class="field">
                <label>Giờ *</label><input type="time" required />
              </div>
              <div class="field">
                <label>Ghi chú</label
                ><input type="text" placeholder="Ghi chú thêm (nếu có)" />
              </div>
              <div class="field service-pills">
                <label style="width: 100%">Loại dịch vụ</label>
                <span class="svc-pill sel">Thiết kế</span
                ><span class="svc-pill">Tư vấn</span
                ><span class="svc-pill">Bảo hành</span
                ><span class="svc-pill">Lắp đặt</span>
              </div>
            </div>
            <button
              type="submit"
              class="btn btn-primary btn-ripple"
              style="
                background: var(--wood);
                color: var(--white);
                margin-top: 10px;
              "
            >
              Đặt lịch
            </button>
          </form>
        </div>
      </div>
    </section>

    <!-- SECTION 4: SHOWROOM & MAP -->
    <section class="showroom-sec">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Showroom</span>
          <h2>Hệ thống showroom</h2>
        </div>
        <div class="sr-grid">
          <div class="sr-list" data-aos="fade-right">
            <div class="sr-city-tabs" id="srTabs"></div>
            <div id="srCards"></div>
          </div>
          <div class="sr-map" data-aos="fade-left">
            <iframe
              id="srMapFrame"
              src="https://www.google.com/maps?q=Nguyen+Hue+District+1+Ho+Chi+Minh+City&output=embed"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
      </div>
    </section>

    <!-- SUPPORT TIMELINE (bonus) -->
    <section class="support-timeline" id="supportTimeline">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Quy trình</span>
          <h2>Quy trình hỗ trợ khách hàng</h2>
        </div>
        <div class="st-line" id="stLine">
          <div class="st-fill" id="stFill"></div>
          <div class="st-step">
            <div class="st-num">1</div>
            <h4>Gửi yêu cầu</h4>
          </div>
          <div class="st-step">
            <div class="st-num">2</div>
            <h4>Xác nhận</h4>
          </div>
          <div class="st-step">
            <div class="st-num">3</div>
            <h4>Tư vấn</h4>
          </div>
          <div class="st-step">
            <div class="st-num">4</div>
            <h4>Hoàn thành</h4>
          </div>
        </div>
      </div>
    </section>

    <!-- COMMITMENT (bonus) -->
    <section class="commitment">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Cam kết</span>
          <h2>Cam kết dịch vụ</h2>
        </div>
        <div class="comm-grid">
          <div class="comm-card" data-aos="fade-up" data-aos-delay="0">
            <div class="comm-ic">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <circle cx="12" cy="12" r="9" />
                <path d="M12 7v5l3 3" />
              </svg>
            </div>
            <h4>Phản hồi trong 24 giờ</h4>
            <p>Đội ngũ tư vấn phản hồi nhanh chóng mọi yêu cầu.</p>
          </div>
          <div class="comm-card" data-aos="fade-up" data-aos-delay="100">
            <div class="comm-ic">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path
                  d="M20.8 4.6a5.5 5.5 0 00-7.8 0L12 5.6l-1-1a5.5 5.5 0 00-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 000-7.8z"
                />
              </svg>
            </div>
            <h4>Tư vấn miễn phí</h4>
            <p>Hỗ trợ tư vấn thiết kế và lựa chọn sản phẩm không tính phí.</p>
          </div>
          <div class="comm-card" data-aos="fade-up" data-aos-delay="200">
            <div class="comm-ic">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <rect x="3" y="7" width="18" height="13" rx="2" />
                <path d="M16 3H8v4h8V3z" />
              </svg>
            </div>
            <h4>Báo giá minh bạch</h4>
            <p>Không phát sinh chi phí ẩn, báo giá rõ ràng ngay từ đầu.</p>
          </div>
          <div class="comm-card" data-aos="fade-up" data-aos-delay="300">
            <div class="comm-ic">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              </svg>
            </div>
            <h4>Bảo hành chính hãng</h4>
            <p>Cam kết bảo hành 24 tháng cho toàn bộ sản phẩm.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 5: FAQ -->
    <section class="faq">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">FAQ</span>
          <h2>Câu hỏi thường gặp</h2>
        </div>
        <div class="faq-wrap" id="faqWrap"></div>
      </div>
    </section>

    <!-- TRUST STRIP (bonus) -->
    <section class="trust-strip">
      <div class="container trust-inner" data-aos="fade-up">
        <div class="trust-item">
          <div class="trust-stars">★★★★★</div>
          <strong>4.9/5</strong><span>Điểm đánh giá trung bình</span>
        </div>
        <div class="trust-item">
          <strong>12.000+</strong><span>Khách hàng đã phục vụ</span>
        </div>
        <div class="trust-item">
          <strong>10+</strong><span>Năm kinh nghiệm</span>
        </div>
        <div class="trust-item">
          <strong>20+</strong><span>Chi nhánh toàn quốc</span>
        </div>
      </div>
    </section>

    <!-- SECTION 6: SOCIAL -->
    <section class="social-sec">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Mạng xã hội</span>
          <h2>Kết nối với chúng tôi</h2>
        </div>
        <div class="soc-grid">
          <a class="soc-card fb" href="#" data-aos="fade-up" data-aos-delay="0"
            ><svg
              width="30"
              height="30"
              viewBox="0 0 24 24"
              fill="currentColor"
            >
              <path
                d="M22 12a10 10 0 10-11.5 9.9v-7H8v-2.9h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6v1.9H16l-.4 2.9h-2.1v7A10 10 0 0022 12z"
              />
            </svg>
            <h4>Facebook</h4>
            <span class="soc-follow">Theo dõi</span></a
          >
          <a
            class="soc-card ig"
            href="#"
            data-aos="fade-up"
            data-aos-delay="100"
            ><svg
              width="30"
              height="30"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <rect x="3" y="3" width="18" height="18" rx="5" />
              <circle cx="12" cy="12" r="4" />
              <circle cx="17.5" cy="6.5" r="1" />
            </svg>
            <h4>Instagram</h4>
            <span class="soc-follow">Theo dõi</span></a
          >
          <a
            class="soc-card pin"
            href="#"
            data-aos="fade-up"
            data-aos-delay="200"
            ><svg
              width="30"
              height="30"
              viewBox="0 0 24 24"
              fill="currentColor"
            >
              <path
                d="M12 2a10 10 0 00-3.6 19.3c0-.8 0-1.8.2-2.6l1.4-6s-.3-.7-.3-1.7c0-1.6.9-2.8 2.1-2.8 1 0 1.5.7 1.5 1.6 0 1-.6 2.5-1 3.9-.3 1.1.6 2.1 1.7 2.1 2 0 3.5-2.1 3.5-5.2 0-2.7-2-4.6-4.7-4.6-3.2 0-5.1 2.4-5.1 4.9 0 1 .3 1.6.8 2.2.1.1.1.2.1.3l-.3 1.1c0 .2-.2.3-.3.2-1.2-.5-1.8-1.9-1.8-3.5 0-2.6 2.2-5.7 6.5-5.7 3.5 0 5.8 2.5 5.8 5.2 0 3.6-1.9 6.2-4.8 6.2-1 0-1.9-.5-2.2-1.1l-.6 2.4c-.2.9-.7 1.9-1.1 2.6A10 10 0 1012 2z"
              />
            </svg>
            <h4>Pinterest</h4>
            <span class="soc-follow">Theo dõi</span></a
          >
          <a
            class="soc-card yt"
            href="#"
            data-aos="fade-up"
            data-aos-delay="300"
            ><svg
              width="30"
              height="30"
              viewBox="0 0 24 24"
              fill="currentColor"
            >
              <path
                d="M23 12s0-3.6-.5-5.3c-.3-1-1-1.8-2-2C18.9 4.2 12 4.2 12 4.2s-6.9 0-8.5.5c-1 .2-1.7 1-2 2C1 8.4 1 12 1 12s0 3.6.5 5.3c.3 1 1 1.7 2 2 1.6.5 8.5.5 8.5.5s6.9 0 8.5-.5c1-.3 1.7-1 2-2 .5-1.7.5-5.3.5-5.3zM9.7 15.3V8.7L15.8 12z"
              />
            </svg>
            <h4>YouTube</h4>
            <span class="soc-follow">Theo dõi</span></a
          >
        </div>
      </div>
    </section>

    <!-- SECTION 7: CTA -->
    <section class="cta">
      <div class="container" data-aos="zoom-in">
        <h2>Bạn cần tư vấn thiết kế miễn phí?</h2>
        <div
          style="
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
          "
        >
          <a href="tel:0900000000" class="btn btn-primary btn-ripple pulse-btn"
            >Gọi ngay</a
          >
          <a href="products.html" class="btn btn-outline btn-ripple"
            >Xem sản phẩm</a
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
              <li><a href="collection.html">Bộ sưu tập</a></li>
              <li><a href="contact.html">Liên hệ</a></li>
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

    <!-- FLOATING CONTACT HUB -->
    <div class="fab-wrap" id="fabWrap">
      <div class="fab-item" id="fabChat">
        <span class="fab-tooltip">Live Chat</span
        ><svg
          width="20"
          height="20"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="1.8"
        >
          <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
        </svg>
      </div>
      <a class="fab-item" href="tel:0900000000"
        ><span class="fab-tooltip">Gọi ngay</span
        ><svg
          width="20"
          height="20"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="1.8"
        >
          <path
            d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3 19.5 19.5 0 01-6-6 19.8 19.8 0 01-3-8.7A2 2 0 014.1 2h3a2 2 0 012 1.7c.1 1 .3 2 .7 3a2 2 0 01-.4 2.1L8 10.3a16 16 0 006 6l1.5-1.5a2 2 0 012.1-.4c1 .4 2 .6 3 .7a2 2 0 011.7 2z"
          /></svg
      ></a>
      <a class="fab-item" href="#" id="fabZalo"
        ><span class="fab-tooltip">Zalo</span
        ><svg
          width="20"
          height="20"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="1.8"
        >
          <rect x="3" y="3" width="18" height="18" rx="5" />
          <path d="M8 12h8M8 16h5M8 8h3" /></svg
      ></a>
      <a class="fab-item" href="mailto:contact@mochome.vn"
        ><span class="fab-tooltip">Email</span
        ><svg
          width="20"
          height="20"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="1.8"
        >
          <rect x="2" y="4" width="20" height="16" rx="2" />
          <path d="M2 6l10 7 10-7" /></svg
      ></a>
      <a class="fab-item" href="#booking"
        ><span class="fab-tooltip">Đặt lịch</span
        ><svg
          width="20"
          height="20"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="1.8"
        >
          <rect x="3" y="4" width="18" height="18" rx="2" />
          <path d="M16 2v4M8 2v4M3 10h18" /></svg
      ></a>
      <div class="fab-main" id="fabMain">
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
        >
          <path d="M12 5v14M5 12h14" />
        </svg>
      </div>
    </div>
  <?php wp_footer(); ?>

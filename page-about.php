<?php
get_header("chung");
?>
    <!-- HERO -->
    <section class="hero">
      <div
        class="hero-bg"
        style="
          background-image: url(&quot;https://images.unsplash.com/photo-1618220179428-22790b461013?w=1920&h=900&q=80&quot;);
        "
      ></div>
      <div class="hero-overlay"></div>
      <div class="container hero-content">
        <span class="eyebrow" data-aos="fade-up">About Us</span>
        <h1 data-aos="fade-up" data-aos-delay="100">
          Kiến tạo không gian sống<br />đẳng cấp và bền vững
        </h1>
        <p data-aos="fade-up" data-aos-delay="200">
          MỘC tin rằng một ngôi nhà đẹp không chỉ đến từ thẩm mỹ, mà còn từ sự
          tử tế trong từng chi tiết chế tác — nơi giá trị thủ công truyền thống
          gặp gỡ thiết kế đương đại.
        </p>
        <a
          href="#story"
          class="btn btn-primary btn-ripple"
          data-aos="zoom-in"
          data-aos-delay="300"
          >Khám phá</a
        >
      </div>
      <div class="breadcrumb">
        <div class="container"><a href="index.html">Home</a> &gt; About</div>
      </div>
    </section>

    <!-- SECTION 1: STORY -->
    <section class="story" id="story">
      <div class="container story-grid">
        <div class="story-img" data-aos="fade-right">
          <img
            src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=1000&h=1200&q=80"
            alt="Showroom MỘC"
          />
        </div>
        <div class="story-text" data-aos="fade-left">
          <span class="eyebrow">Câu chuyện thương hiệu</span>
          <h2 style="font-size: clamp(28px, 3.4vw, 38px); margin-bottom: 20px">
            Từ một xưởng mộc nhỏ đến thương hiệu nội thất được tin yêu
          </h2>
          <p>
            Năm 2014, MỘC bắt đầu từ một xưởng mộc nhỏ tại ngoại ô Sài Gòn, với
            chỉ ba người thợ và niềm tin rằng đồ gỗ Việt Nam xứng đáng có một vị
            trí riêng trong những ngôi nhà hiện đại.
          </p>
          <p>
            Chúng tôi không chạy theo số lượng, mà tập trung vào từng đường vân
            gỗ, từng mối ghép — để mỗi sản phẩm khi đến tay khách hàng đều mang
            một câu chuyện và giá trị sử dụng lâu bền.
          </p>
          <p>
            Hôm nay, MỘC tự hào đồng hành cùng hàng nghìn gia đình Việt trong
            hành trình kiến tạo không gian sống của riêng họ.
          </p>
          <div class="story-btns">
            <div class="video-thumb btn-ripple" id="videoThumb">
              <img
                src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=640&h=360&q=80"
                alt="Video giới thiệu MỘC"
              />
              <div class="play-ic">
                <span
                  ><svg
                    width="18"
                    height="18"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                  >
                    <path d="M8 5v14l11-7z" /></svg
                ></span>
              </div>
            </div>
            <a
              href="#company-timeline"
              class="btn btn-outline btn-ripple"
              style="border-color: var(--wood); color: var(--wood)"
              >Xem hành trình</a
            >
          </div>
        </div>
      </div>
    </section>

    <!-- VIDEO MODAL -->
    <div class="modal-overlay" id="videoModal">
      <div class="modal-box">
        <span class="modal-close" id="modalClose">&times;</span>
        <iframe
          src=""
          id="videoFrame"
          title="Video giới thiệu MỘC"
          allow="autoplay; encrypted-media"
          allowfullscreen
        ></iframe>
      </div>
    </div>

    <!-- SECTION 2: CORE VALUES -->
    <section class="values">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Giá trị cốt lõi</span>
          <h2>Điều làm nên MỘC</h2>
          <p>Bốn giá trị định hình mọi sản phẩm và dịch vụ của chúng tôi.</p>
        </div>
        <div class="values-grid">
          <div class="value-card" data-aos="fade-up" data-aos-delay="0">
            <div class="value-ic">
              <svg
                width="26"
                height="26"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path
                  d="M12 2l2.4 7.2H22l-6 4.6L18 21l-6-4.4L6 21l2-7.2-6-4.6h7.6z"
                />
              </svg>
            </div>
            <h3>Chất lượng vượt thời gian</h3>
            <p>
              Chọn lọc nguyên liệu gỗ tự nhiên, kiểm định nghiêm ngặt từng công
              đoạn.
            </p>
          </div>
          <div class="value-card" data-aos="fade-up" data-aos-delay="120">
            <div class="value-ic">
              <svg
                width="26"
                height="26"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path d="M12 3v18M3 12h18" />
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <h3>Thiết kế hiện đại</h3>
            <p>
              Cập nhật xu hướng quốc tế, tối giản nhưng vẫn giữ nét ấm áp của
              gỗ.
            </p>
          </div>
          <div class="value-card" data-aos="fade-up" data-aos-delay="240">
            <div class="value-ic">
              <svg
                width="26"
                height="26"
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
            <h3>Tận tâm với khách hàng</h3>
            <p>
              Tư vấn chân thành, đồng hành từ khâu chọn mẫu đến lắp đặt tận nơi.
            </p>
          </div>
          <div class="value-card" data-aos="fade-up" data-aos-delay="360">
            <div class="value-ic">
              <svg
                width="26"
                height="26"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path d="M12 22c5-3 8-7 8-12a8 8 0 10-16 0c0 5 3 9 8 12z" />
              </svg>
            </div>
            <h3>Phát triển bền vững</h3>
            <p>
              Nguồn gỗ có chứng nhận, quy trình sản xuất thân thiện với môi
              trường.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION: COMPANY TIMELINE (bonus) -->
    <section class="company-timeline" id="company-timeline">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Hành trình phát triển</span>
          <h2>Những cột mốc của MỘC</h2>
        </div>
        <div class="ct-line-wrap" id="ctWrap">
          <div class="ct-spine"></div>
          <div class="ct-spine-fill" id="ctSpineFill"></div>
          <div class="ct-item" data-aos="fade-right">
            <div class="ct-card">
              <h4>2014</h4>
              <p>Thành lập xưởng mộc nhỏ với 3 người thợ đầu tiên.</p>
            </div>
            <div class="ct-dot"></div>
            <div class="ct-spacer"></div>
          </div>
          <div class="ct-item" data-aos="fade-left">
            <div class="ct-spacer"></div>
            <div class="ct-dot"></div>
            <div class="ct-card">
              <h4>2017</h4>
              <p>Mở showroom đầu tiên tại TP. Hồ Chí Minh.</p>
            </div>
          </div>
          <div class="ct-item" data-aos="fade-right">
            <div class="ct-card">
              <h4>2019</h4>
              <p>Ra mắt bộ sưu tập Nordic — bước ngoặt thiết kế.</p>
            </div>
            <div class="ct-dot"></div>
            <div class="ct-spacer"></div>
          </div>
          <div class="ct-item" data-aos="fade-left">
            <div class="ct-spacer"></div>
            <div class="ct-dot"></div>
            <div class="ct-card">
              <h4>2021</h4>
              <p>Mở rộng hệ thống lên 10 chi nhánh toàn quốc.</p>
            </div>
          </div>
          <div class="ct-item" data-aos="fade-right">
            <div class="ct-card">
              <h4>2023</h4>
              <p>Đạt chứng nhận gỗ bền vững FSC.</p>
            </div>
            <div class="ct-dot"></div>
            <div class="ct-spacer"></div>
          </div>
          <div class="ct-item" data-aos="fade-left">
            <div class="ct-spacer"></div>
            <div class="ct-dot"></div>
            <div class="ct-card">
              <h4>2026</h4>
              <p>Hơn 20 chi nhánh, 12.000+ khách hàng tin dùng.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 3: PROCESS -->
    <section class="process">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Quy trình</span>
          <h2>Quy trình tạo ra sản phẩm</h2>
          <p>Sáu bước tỉ mỉ để mỗi sản phẩm đến tay bạn đều hoàn hảo.</p>
        </div>
        <div class="timeline" id="timeline">
          <div class="timeline-line" id="timelineLine"></div>
          <div class="step" data-aos="fade-up" data-aos-delay="0">
            <div class="step-num">
              <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path
                  d="M9 18h6M10 22h4M12 2a6 6 0 00-4 10.5c.6.5 1 1.3 1 2.5h6c0-1.2.4-2 1-2.5A6 6 0 0012 2z"
                />
              </svg>
            </div>
            <h4>Ý tưởng</h4>
            <p>Nghiên cứu xu hướng & nhu cầu</p>
          </div>
          <div class="step" data-aos="fade-up" data-aos-delay="100">
            <div class="step-num">
              <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path d="M12 20h9M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4z" />
              </svg>
            </div>
            <h4>Thiết kế</h4>
            <p>Phác thảo bản vẽ chi tiết</p>
          </div>
          <div class="step" data-aos="fade-up" data-aos-delay="200">
            <div class="step-num">
              <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path
                  d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.1-3.1a4 4 0 01-5.4 5.4L6 21H3v-3L12.6 8.4a4 4 0 015.4-5.4z"
                />
              </svg>
            </div>
            <h4>Gia công</h4>
            <p>Chế tác thủ công tỉ mỉ</p>
          </div>
          <div class="step" data-aos="fade-up" data-aos-delay="300">
            <div class="step-num">
              <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path d="M9 12l2 2 4-4M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h4>Kiểm định</h4>
            <p>Kiểm tra chất lượng nghiêm ngặt</p>
          </div>
          <div class="step" data-aos="fade-up" data-aos-delay="400">
            <div class="step-num">
              <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <path
                  d="M12 2l2.4 7.2H22l-6 4.6L18 21l-6-4.4L6 21l2-7.2-6-4.6h7.6z"
                />
              </svg>
            </div>
            <h4>Hoàn thiện</h4>
            <p>Sơn phủ & đóng gói cẩn thận</p>
          </div>
          <div class="step" data-aos="fade-up" data-aos-delay="500">
            <div class="step-num">
              <svg
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
              >
                <rect x="1" y="7" width="15" height="10" rx="1" />
                <path d="M16 10h4l3 3v4h-7z" />
                <circle cx="6" cy="19" r="1.6" />
                <circle cx="18" cy="19" r="1.6" />
              </svg>
            </div>
            <h4>Giao hàng</h4>
            <p>Vận chuyển & lắp đặt tận nơi</p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 4: SHOWROOM GALLERY -->
    <section class="showroom">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Không gian</span>
          <h2>Không gian showroom</h2>
          <p>Ghé thăm showroom MỘC để trải nghiệm sản phẩm trực tiếp.</p>
        </div>
        <div class="masonry" id="masonryGrid"></div>
      </div>
    </section>
    <div class="lightbox" id="lightbox">
      <span class="lightbox-close" id="lightboxClose">&times;</span>
      <img id="lightboxImg" src="" alt="" />
    </div>

    <!-- PARTNERS & CERTIFICATIONS (bonus) -->
    <section class="partners">
      <div class="container">
        <div class="sec-head">
          <span class="eyebrow">Đối tác & Chứng nhận</span>
          <h2 style="font-size: 26px">Được tin tưởng bởi</h2>
        </div>
      </div>
      <div class="marquee-wrap" style="overflow: hidden">
        <div class="marquee-track" id="marqueeTrack">
          <span class="plogo">FSC CERTIFIED</span
          ><span class="plogo">SCANDIC</span><span class="plogo">OAKWOOD</span
          ><span class="plogo">GREEN BUILD VN</span
          ><span class="plogo">NORDIC LIVING</span
          ><span class="plogo">ISO 9001</span
          ><span class="plogo">URBAN NEST</span>
          <span class="plogo">FSC CERTIFIED</span
          ><span class="plogo">SCANDIC</span><span class="plogo">OAKWOOD</span
          ><span class="plogo">GREEN BUILD VN</span
          ><span class="plogo">NORDIC LIVING</span
          ><span class="plogo">ISO 9001</span
          ><span class="plogo">URBAN NEST</span>
        </div>
      </div>
    </section>

    <!-- SECTION 5: ACHIEVEMENTS -->
    <section
      class="achievements"
      style="
        background-image: url(&quot;https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=1920&h=900&q=80&quot;);
      "
    >
      <div class="container ach-grid">
        <div class="ach-item" data-aos="fade-up" data-aos-delay="0">
          <div class="ach-ic">
            <svg
              width="30"
              height="30"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.6"
            >
              <circle cx="12" cy="12" r="9" />
              <path d="M12 7v5l3 3" />
            </svg>
          </div>
          <div class="ach-num" data-count="10">0</div>
          <p>Năm kinh nghiệm</p>
        </div>
        <div class="ach-item" data-aos="fade-up" data-aos-delay="100">
          <div class="ach-ic">
            <svg
              width="30"
              height="30"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.6"
            >
              <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
              <circle cx="9" cy="7" r="4" />
              <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
            </svg>
          </div>
          <div class="ach-num" data-count="12000">0</div>
          <p>Khách hàng</p>
        </div>
        <div class="ach-item" data-aos="fade-up" data-aos-delay="200">
          <div class="ach-ic">
            <svg
              width="30"
              height="30"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.6"
            >
              <rect x="3" y="7" width="18" height="13" rx="2" />
              <path d="M16 3H8v4h8V3z" />
            </svg>
          </div>
          <div class="ach-num" data-count="3500">0</div>
          <p>Đơn hàng</p>
        </div>
        <div class="ach-item" data-aos="fade-up" data-aos-delay="300">
          <div class="ach-ic">
            <svg
              width="30"
              height="30"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.6"
            >
              <path d="M20 6L9 17l-5-5" />
            </svg>
          </div>
          <div class="ach-num" data-count="40">0</div>
          <p>Đối tác</p>
        </div>
      </div>
    </section>

    <!-- SECTION 6: TEAM -->
    <section class="team">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Đội ngũ</span>
          <h2>Những người tạo nên thương hiệu</h2>
        </div>
        <div class="team-grid" id="teamGrid"></div>
      </div>
    </section>

    <!-- SECTION 7: TESTIMONIALS -->
    <section class="testimonials">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Khách hàng nói gì</span>
          <h2>Đánh giá từ khách hàng</h2>
        </div>
        <div class="test-slider" id="testSlider">
          <div class="test-card active">
            <img
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=120&h=120&q=80"
              alt=""
            />
            <div class="test-stars">★★★★★</div>
            <p>
              "MỘC không chỉ bán nội thất, họ mang đến cả một trải nghiệm tư vấn
              tận tâm. Sản phẩm hoàn thiện vượt mong đợi."
            </p>
            <strong>Nguyễn Thu Hà</strong>
          </div>
          <div class="test-card">
            <img
              src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=120&h=120&q=80"
              alt=""
            />
            <div class="test-stars">★★★★★</div>
            <p>
              "Chúng tôi đã trang bị toàn bộ văn phòng mới với nội thất từ MỘC.
              Chất lượng đồng đều, giao đúng tiến độ dự án."
            </p>
            <strong>Trần Minh Khôi</strong>
            <span class="test-badge">Giám đốc — Nam Long Corp</span>
          </div>
          <div class="test-card">
            <img
              src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=120&h=120&q=80"
              alt=""
            />
            <div class="test-stars">★★★★★</div>
            <p>
              "Thiết kế tối giản, chất gỗ thật, giá hợp lý. Đội thi công lắp đặt
              rất chuyên nghiệp và sạch sẽ."
            </p>
            <strong>Lê Phương Anh</strong>
          </div>
        </div>
        <div class="test-dots" id="testDots"></div>
      </div>
    </section>

    <!-- SECTION 8: FAQ -->
    <section class="faq">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">FAQ</span>
          <h2>Câu hỏi thường gặp</h2>
        </div>
        <div class="faq-wrap" id="faqWrap"></div>
      </div>
    </section>

    <!-- STORE LOCATOR (bonus) -->
    <section class="locator">
      <div class="container">
        <div class="sec-head" data-aos="fade-up">
          <span class="eyebrow">Hệ thống cửa hàng</span>
          <h2>Ghé thăm showroom gần bạn</h2>
        </div>
        <div class="locator-grid">
          <div class="locator-map" data-aos="fade-right">
            <iframe
              src="https://www.google.com/maps?q=Nguyen%20Hue%2C%20District%201%2C%20Ho%20Chi%20Minh%20City&output=embed"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
          <div class="store-list" data-aos="fade-left">
            <div class="store-card">
              <div>
                <h4>MỘC Showroom Quận 1</h4>
                <p>123 Nguyễn Huệ, Quận 1, TP.HCM</p>
                <p>Giờ mở cửa: 8:00 – 21:00 · Hotline: 028 3822 1234</p>
              </div>
              <a
                class="directions"
                href="https://www.google.com/maps?q=Nguyen+Hue+District+1+Ho+Chi+Minh+City"
                target="_blank"
                rel="noopener"
                aria-label="Chỉ đường"
                ><svg
                  width="18"
                  height="18"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path d="M3 11l19-9-9 19-2-8-8-2z" /></svg
              ></a>
            </div>
            <div class="store-card">
              <div>
                <h4>MỘC Showroom Hà Nội</h4>
                <p>45 Kim Mã, Ba Đình, Hà Nội</p>
                <p>Giờ mở cửa: 8:00 – 21:00 · Hotline: 024 3927 5678</p>
              </div>
              <a
                class="directions"
                href="https://www.google.com/maps?q=Kim+Ma+Ba+Dinh+Ha+Noi"
                target="_blank"
                rel="noopener"
                aria-label="Chỉ đường"
                ><svg
                  width="18"
                  height="18"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path d="M3 11l19-9-9 19-2-8-8-2z" /></svg
              ></a>
            </div>
            <div class="store-card">
              <div>
                <h4>MỘC Showroom Đà Nẵng</h4>
                <p>88 Bạch Đằng, Hải Châu, Đà Nẵng</p>
                <p>Giờ mở cửa: 8:00 – 21:00 · Hotline: 0236 3812 345</p>
              </div>
              <a
                class="directions"
                href="https://www.google.com/maps?q=Bach+Dang+Hai+Chau+Da+Nang"
                target="_blank"
                rel="noopener"
                aria-label="Chỉ đường"
                ><svg
                  width="18"
                  height="18"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path d="M3 11l19-9-9 19-2-8-8-2z" /></svg
              ></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 9: CTA -->
    <section class="cta">
      <div class="container" data-aos="zoom-in">
        <h2>Sẵn sàng kiến tạo<br />không gian mơ ước?</h2>
        <div
          style="
            display: flex;
            gap: 18px;
            justify-content: center;
            flex-wrap: wrap;
          "
        >
          <a
            href="index.html#footer"
            class="btn btn-primary btn-ripple pulse-btn"
            >Liên hệ</a
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

    <div id="toastWrap"></div>
    
<section class="contact-form">
    <h2>Liên hệ với chúng tôi</h2>

    <?php echo do_shortcode('[contact-form-7 id="8bbffb0" title="Form Liên Hệ"]'); ?>
</section>
<div id="backTop"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 19V5M5 12l7-7 7 7"/></svg></div>
<?php
get_footer();
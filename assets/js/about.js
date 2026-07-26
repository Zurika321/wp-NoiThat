      AOS.init({
        duration: 800,
        easing: "ease-out-cubic",
        once: true,
        offset: 50,
      });

      /* nav */
      document
        .getElementById("navToggle")
        .addEventListener("click", () =>
          document.getElementById("navLinks").classList.toggle("open"),
        );

      /* ripple */
      document.addEventListener("click", (e) => {
        const btn = e.target.closest(".btn-ripple");
        if (!btn) return;
        const r = document.createElement("span");
        r.className = "ripple";
        const rect = btn.getBoundingClientRect();
        r.style.left = e.clientX - rect.left + "px";
        r.style.top = e.clientY - rect.top + "px";
        btn.appendChild(r);
        setTimeout(() => r.remove(), 650);
      });

      /* video modal */
      const videoModal = document.getElementById("videoModal");
      const videoFrame = document.getElementById("videoFrame");
      document.getElementById("videoThumb").addEventListener("click", () => {
        videoFrame.src = "https://www.youtube.com/embed/aqz-KE-bpKQ?autoplay=1";
        videoModal.classList.add("open");
      });
      function closeVideoModal() {
        videoModal.classList.remove("open");
        videoFrame.src = "";
      }
      document
        .getElementById("modalClose")
        .addEventListener("click", closeVideoModal);
      videoModal.addEventListener("click", (e) => {
        if (e.target === videoModal) closeVideoModal();
      });

      /* company timeline draw */
      const ctObs = new IntersectionObserver(
        (entries) => {
          entries.forEach((en) => {
            if (en.isIntersecting) {
              document.getElementById("ctSpineFill").style.height = "100%";
              ctObs.disconnect();
            }
          });
        },
        { threshold: 0.15 },
      );
      ctObs.observe(document.getElementById("ctWrap"));

      /* process timeline draw */
      const timelineLine = document.getElementById("timelineLine");
      const stepsEls = document.querySelectorAll(".step");
      const isMobileTimeline = () => window.innerWidth <= 900;
      const procObs = new IntersectionObserver(
        (entries) => {
          entries.forEach((en) => {
            if (en.isIntersecting) {
              timelineLine.style[isMobileTimeline() ? "height" : "width"] =
                "100%";
              stepsEls.forEach((s, i) =>
                setTimeout(() => s.classList.add("active"), i * 220),
              );
              procObs.disconnect();
            }
          });
        },
        { threshold: 0.3 },
      );
      procObs.observe(document.getElementById("timeline"));

      /* showroom gallery + lightbox */
      const galleryImages = [
        "https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=1000&h=800&q=80",
        "https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=800&h=1200&q=80",
        "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=900&h=900&q=80",
        "https://images.unsplash.com/photo-1615874959474-d609969a20ed?w=800&h=1200&q=80",
        "https://images.unsplash.com/photo-1615529182904-14819c35db37?w=1000&h=800&q=80",
        "https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=900&h=900&q=80",
        "https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=1000&h=800&q=80",
        "https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=800&h=1200&q=80",
      ];
      const masonryGrid = document.getElementById("masonryGrid");
      galleryImages.forEach((src, i) => {
        const item = document.createElement("div");
        item.className = "masonry-item";
        item.setAttribute("data-aos", "fade-up");
        item.setAttribute("data-aos-delay", (i % 4) * 80);
        item.innerHTML = `<img src="${src}" alt="Showroom ${i + 1}" loading="lazy"><div class="m-overlay"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg></div>`;
        item.addEventListener("click", () => {
          document.getElementById("lightboxImg").src = src;
          document.getElementById("lightbox").classList.add("open");
        });
        masonryGrid.appendChild(item);
      });
      document
        .getElementById("lightboxClose")
        .addEventListener("click", () =>
          document.getElementById("lightbox").classList.remove("open"),
        );
      document.getElementById("lightbox").addEventListener("click", (e) => {
        if (e.target.id === "lightbox")
          e.currentTarget.classList.remove("open");
      });

      /* achievements counter */
      const achEls = document.querySelectorAll(".ach-num");
      const achObs = new IntersectionObserver(
        (entries) => {
          entries.forEach((en) => {
            if (en.isIntersecting) {
              const el = en.target,
                target = +el.dataset.count;
              let cur = 0;
              const step = Math.max(1, target / 60);
              const tick = () => {
                cur += step;
                if (cur >= target) {
                  el.textContent = target.toLocaleString("vi-VN") + "+";
                  return;
                }
                el.textContent = Math.floor(cur).toLocaleString("vi-VN");
                requestAnimationFrame(tick);
              };
              tick();
              achObs.unobserve(el);
            }
          });
        },
        { threshold: 0.5 },
      );
      achEls.forEach((el) => achObs.observe(el));

      /* team */
      const TEAM = [
        {
          name: "Nguyễn Minh Anh",
          role: "CEO",
          img: "https://images.unsplash.com/photo-1560250097-0b93528c311a?w=700&h=900&q=80",
        },
        {
          name: "Trần Hoàng Nam",
          role: "Creative Director",
          img: "https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=700&h=900&q=80",
        },
        {
          name: "Lê Thu Hà",
          role: "Interior Designer",
          img: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=700&h=900&q=80",
        },
        {
          name: "Phạm Quốc Bảo",
          role: "Project Manager",
          img: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=700&h=900&q=80",
        },
      ];
      const teamGrid = document.getElementById("teamGrid");
      TEAM.forEach((t, i) => {
        const card = document.createElement("div");
        card.className = "team-card";
        card.setAttribute("data-aos", "fade-up");
        card.setAttribute("data-aos-delay", i * 100);
        card.innerHTML = `<div class="team-img"><img src="${t.img}" alt="${t.name}">
    <div class="team-overlay"><div class="team-socials">
      <a href="#" aria-label="Facebook"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 10-11.5 9.9v-7H8v-2.9h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6v1.9H16l-.4 2.9h-2.1v7A10 10 0 0022 12z"/></svg></a>
      <a href="#" aria-label="LinkedIn"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5a2.5 2.5 0 11-.02 5 2.5 2.5 0 01.02-5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21H17.4v-5.6c0-1.35-.02-3.08-1.88-3.08-1.88 0-2.17 1.47-2.17 2.98V21H9z"/></svg></a>
      <a href="#" aria-label="Email"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 6l10 7 10-7"/></svg></a>
    </div></div></div>
    <div class="team-body"><h4>${t.name}</h4><span>${t.role}</span></div>`;
        teamGrid.appendChild(card);
      });

      /* testimonials slider */
      const testCards = document.querySelectorAll(".test-card");
      const testDotsWrap = document.getElementById("testDots");
      testCards.forEach((_, i) => {
        const d = document.createElement("span");
        if (i === 0) d.classList.add("active");
        d.addEventListener("click", () => showTest(i));
        testDotsWrap.appendChild(d);
      });
      let testIdx = 0;
      function showTest(i) {
        testCards[testIdx].classList.remove("active");
        testDotsWrap.children[testIdx].classList.remove("active");
        testIdx = i;
        testCards[testIdx].classList.add("active");
        testDotsWrap.children[testIdx].classList.add("active");
      }
      setInterval(() => showTest((testIdx + 1) % testCards.length), 5000);

      /* FAQ */
      const FAQ = [
        {
          q: "Sản phẩm được bảo hành bao lâu?",
          a: "Tất cả sản phẩm nội thất tại MỘC được bảo hành chính hãng từ 12 đến 24 tháng tùy dòng sản phẩm, bao gồm lỗi kỹ thuật và cấu trúc gỗ.",
        },
        {
          q: "Có giao hàng toàn quốc không?",
          a: "MỘC giao hàng toàn quốc thông qua hệ thống đối tác vận chuyển uy tín, đảm bảo đóng gói cẩn thận cho các sản phẩm nội thất cồng kềnh.",
        },
        {
          q: "Có nhận thiết kế theo yêu cầu không?",
          a: "Có. Đội ngũ thiết kế của chúng tôi nhận tùy chỉnh kích thước, chất liệu và màu sắc theo yêu cầu riêng của từng khách hàng.",
        },
        {
          q: "Thời gian giao hàng là bao lâu?",
          a: "Với sản phẩm có sẵn, thời gian giao hàng từ 3–7 ngày tùy khu vực. Với sản phẩm đặt riêng, thời gian sản xuất khoảng 3–4 tuần.",
        },
        {
          q: "Có hỗ trợ lắp đặt tận nơi không?",
          a: "MỘC có đội ngũ kỹ thuật lắp đặt chuyên nghiệp, hỗ trợ tận nơi miễn phí trong nội thành và tính phí nhỏ ngoài khu vực trung tâm.",
        },
        {
          q: "Chính sách đổi trả như thế nào?",
          a: "Khách hàng có thể đổi trả trong vòng 7 ngày nếu sản phẩm lỗi do nhà sản xuất, giữ nguyên tem mác và hóa đơn mua hàng.",
        },
      ];
      const faqWrap = document.getElementById("faqWrap");
      FAQ.forEach((f, i) => {
        const item = document.createElement("div");
        item.className = "faq-item";
        item.setAttribute("data-aos", "fade-up");
        item.setAttribute("data-aos-delay", i * 60);
        item.innerHTML = `<div class="faq-q">${f.q}<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg></div><div class="faq-a"><p>${f.a}</p></div>`;
        item
          .querySelector(".faq-q")
          .addEventListener("click", () => item.classList.toggle("open"));
        faqWrap.appendChild(item);
      });
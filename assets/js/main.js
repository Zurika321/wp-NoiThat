/* ================= PRELOADER ================= */
window.addEventListener("load", () => {
  let p = 0;
  const fill = document.getElementById("preloadFill");
  const iv = setInterval(() => {
    p += Math.random() * 18;
    if (p >= 100) {
      p = 100;
      clearInterval(iv);
    }
    fill.style.width = p + "%";
  }, 140);
  setTimeout(() => {
    document.getElementById("preloader").classList.add("hide");
    document.getElementById("navbar").classList.add("in");
    playHeroAnim();
  }, 1300);
});

/* ================= AOS ================= */
AOS.init({ duration: 800, easing: "ease-out-cubic", once: true, offset: 60 });

/* ================= CUSTOM CURSOR ================= */
const ring = document.getElementById("cursorRing");
const dot = document.getElementById("cursorDot");
let rx = 0,
  ry = 0,
  dx = 0,
  dy = 0;
window.addEventListener("mousemove", (e) => {
  dx = e.clientX;
  dy = e.clientY;
  dot.style.left = dx + "px";
  dot.style.top = dy + "px";
});
function loopCursor() {
  rx += (dx - rx) * 0.16;
  ry += (dy - ry) * 0.16;
  ring.style.left = rx + "px";
  ring.style.top = ry + "px";
  requestAnimationFrame(loopCursor);
}
loopCursor();
document
  .querySelectorAll("a, button, .cat-card, .prod-card, .masonry-item")
  .forEach((el) => {
    el.addEventListener("mouseenter", () => ring.classList.add("grow"));
    el.addEventListener("mouseleave", () => ring.classList.remove("grow"));
  });

/* ================= NAVBAR SCROLL + SCROLLSPY ================= */
const navbar = document.getElementById("navbar");
const navHeight = navbar ? navbar.offsetHeight : 0;
const navLinksEls = document.querySelectorAll(".nav-link");
const backTop = document.getElementById("backTop");
const sectionsForSpy = [...navLinksEls]
  .map((link) => {
    const id = link.getAttribute("href").substring(1);
    return document.getElementById(id);
  })
  .filter(Boolean);

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;

      navLinksEls.forEach((link) => {
        link.classList.toggle(
          "active",
          link.getAttribute("href") === "#" + entry.target.id,
        );
      });
    });
  },
  {
    root: null,
    rootMargin: `-${navHeight}px 0px -40% 0px`,
    threshold: 0,
  },
);

sectionsForSpy.forEach((sec) => observer.observe(sec));

window.addEventListener("scroll", () => {
  navbar.classList.toggle("scrolled", window.scrollY > 80);
  backTop.classList.toggle("show", window.scrollY > 500);
});

backTop.addEventListener("click", () =>
  window.scrollTo({ top: 0, behavior: "smooth" }),
);

/* Mobile menu */
const navToggle = document.getElementById("navToggle");
const navLinks = document.getElementById("navLinks");
navToggle.addEventListener("click", () => navLinks.classList.toggle("open"));
navLinksEls.forEach((l) =>
  l.addEventListener("click", () => navLinks.classList.remove("open")),
);

/* ================= HERO ENTRANCE (GSAP) ================= */
function playHeroAnim() {
  gsap
    .timeline()
    .to(
      '[data-anim="fade-up"]',
      { opacity: 1, y: 0, duration: 0.8, ease: "power3.out" },
      0.1,
    )
    .fromTo(
      '[data-anim="fade-up-h"]',
      { opacity: 0, y: 40 },
      { opacity: 1, y: 0, duration: 1, ease: "power3.out" },
      0.25,
    )
    .fromTo(
      '[data-anim="fade-up-p"]',
      { opacity: 0, y: 30 },
      { opacity: 1, y: 0, duration: 0.9, ease: "power3.out" },
      0.5,
    )
    .fromTo(
      '[data-anim="scale-in"]',
      { opacity: 0, scale: 0.85 },
      { opacity: 1, scale: 1, duration: 0.7, ease: "back.out(1.7)" },
      0.75,
    );
}
gsap.set(
  '[data-anim="fade-up"], [data-anim="fade-up-h"], [data-anim="fade-up-p"], [data-anim="scale-in"]',
  { opacity: 0, y: 20 },
);

/* ================= RIPPLE EFFECT ================= */
document.querySelectorAll(".btn-ripple").forEach((btn) => {
  btn.addEventListener("click", function (e) {
    const r = document.createElement("span");
    r.className = "ripple";
    const rect = this.getBoundingClientRect();
    r.style.left = e.clientX - rect.left + "px";
    r.style.top = e.clientY - rect.top + "px";
    this.appendChild(r);
    setTimeout(() => r.remove(), 650);
  });
});

/* ================= PRODUCTS (data-driven) ================= */
const products = [
  {
    name: "Sofa Milano 3 chỗ",
    cat: "Sofa",
    price: "18.500.000₫",
    img: "https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=600&h=700&q=80",
  },
  {
    name: "Bàn ăn Oak Solid",
    cat: "Bàn ăn",
    price: "12.900.000₫",
    img: "https://images.unsplash.com/photo-1615066390971-03e4e1c36ddf?w=600&h=700&q=80",
  },
  {
    name: "Giường Scandinavian",
    cat: "Giường ngủ",
    price: "15.200.000₫",
    img: "https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=600&h=700&q=80",
  },
  {
    name: "Đèn Pendant Vàng",
    cat: "Đèn trang trí",
    price: "2.450.000₫",
    img: "https://images.unsplash.com/photo-1543198126-cdcb62dc4e00?w=600&h=700&q=80",
  },
  {
    name: "Ghế Armchair Da",
    cat: "Ghế",
    price: "8.700.000₫",
    img: "https://images.unsplash.com/photo-1506439773649-6e0eb8cfb237?w=600&h=700&q=80",
  },
  {
    name: "Kệ TV Gỗ Sồi",
    cat: "Tủ kệ",
    price: "6.300.000₫",
    img: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&h=700&q=80",
  },
  {
    name: "Tủ Quần Áo Modern",
    cat: "Tủ kệ",
    price: "14.100.000₫",
    img: "https://images.unsplash.com/photo-1595428774223-ef52624120d2?w=600&h=700&q=80",
  },
  {
    name: "Bàn Trà Marble",
    cat: "Bàn trà",
    price: "5.600.000₫",
    img: "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=600&h=700&q=80",
  },
];
const prodGrid = document.getElementById("prodGrid");
products.forEach((p, i) => {
  const card = document.createElement("div");
  card.className = "prod-card";
  card.setAttribute("data-aos", "zoom-in");
  card.setAttribute("data-aos-delay", (i % 4) * 100);
  card.innerHTML = `
    <div class="prod-img">
      <img src="${p.img}" alt="${p.name}">
      <div class="prod-overlay"></div>
      <div class="prod-icons">
        <button aria-label="Yêu thích"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 00-7.8 0L12 5.6l-1-1a5.5 5.5 0 00-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 000-7.8z"/></svg></button>
        <button aria-label="Giỏ hàng"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 002 1.6h9.7a2 2 0 002-1.6L23 6H6"/></svg></button>
      </div>
    </div>
    <div class="prod-body">
      <span class="cat">${p.cat}</span>
      <h3>${p.name}</h3>
      <div class="prod-rating">★★★★★</div>
      <div class="prod-footer">
        <span class="price">${p.price}</span>
        <button class="add-btn btn-ripple" aria-label="Thêm vào giỏ"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg></button>
      </div>
    </div>`;
  prodGrid.appendChild(card);
});

/* ================= GALLERY MASONRY + LIGHTBOX ================= */
const galleryImages = [
  "https://images.unsplash.com/photo-1616137466211-f939a420be84?w=800&h=1000&q=80",
  "https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=1000&h=800&q=80",
  "https://images.unsplash.com/photo-1615874959474-d609969a20ed?w=800&h=800&q=80",
  "https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=800&h=1000&q=80",
  "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1000&h=800&q=80",
  "https://images.unsplash.com/photo-1615529182904-14819c35db37?w=800&h=1000&q=80",
  "https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=800&h=800&q=80",
  "https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=1000&h=800&q=80",
];
const masonryGrid = document.getElementById("masonryGrid");
galleryImages.forEach((src, i) => {
  const rot = (Math.random() * 6 - 3).toFixed(1);
  const item = document.createElement("div");
  item.className = "masonry-item";
  item.setAttribute("data-aos", "fade-up");
  item.setAttribute("data-aos-delay", (i % 4) * 80);
  item.style.setProperty("--r", rot + "deg");
  item.innerHTML = `<img src="${src}" alt="Không gian ${i + 1}" loading="lazy">
    <div class="m-overlay"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg></div>`;
  item.addEventListener("click", () => openLightbox(src));
  masonryGrid.appendChild(item);
});
const lightbox = document.getElementById("lightbox");
const lightboxImg = document.getElementById("lightboxImg");
function openLightbox(src) {
  lightboxImg.src = src;
  lightbox.classList.add("open");
}
document
  .getElementById("lightboxClose")
  .addEventListener("click", () => lightbox.classList.remove("open"));
lightbox.addEventListener("click", (e) => {
  if (e.target === lightbox) lightbox.classList.remove("open");
});

/* ================= TESTIMONIAL SLIDER ================= */
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

/* ================= PROCESS TIMELINE DRAW ================= */
const timelineLine = document.getElementById("timelineLine");
const steps = document.querySelectorAll(".step");
const timelineObs = new IntersectionObserver(
  (entries) => {
    entries.forEach((en) => {
      if (en.isIntersecting) {
        timelineLine.style.width = "100%";
        steps.forEach((s, i) =>
          setTimeout(() => s.classList.add("active"), i * 350),
        );
        timelineObs.disconnect();
      }
    });
  },
  { threshold: 0.4 },
);
timelineObs.observe(document.getElementById("timeline"));

/* ================= COUNT UP STATS ================= */
const statEls = document.querySelectorAll(".stat-num");
const statObs = new IntersectionObserver(
  (entries) => {
    entries.forEach((en) => {
      if (en.isIntersecting) {
        const el = en.target;
        const target = +el.dataset.count;
        let cur = 0;
        const step = Math.max(1, target / 60);
        const tick = () => {
          cur += step;
          if (cur >= target) {
            el.textContent = target + "+";
            return;
          }
          el.textContent = Math.floor(cur);
          requestAnimationFrame(tick);
        };
        tick();
        statObs.unobserve(el);
      }
    });
  },
  { threshold: 0.5 },
);
statEls.forEach((el) => statObs.observe(el));

/* ================= SMOOTH ANCHOR SCROLL OFFSET ================= */
document.querySelectorAll('a[href^="#"]').forEach((a) => {
  a.addEventListener("click", function (e) {
    const id = this.getAttribute("href");
    if (id.length > 1) {
      const target = document.querySelector(id);
      if (target) {
        e.preventDefault();
        window.scrollTo({ top: target.offsetTop - 84, behavior: "smooth" });
      }
    }
  });
});

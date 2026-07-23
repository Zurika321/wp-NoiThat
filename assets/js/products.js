window.addEventListener("load", () => {
  setTimeout(() => {
    navbar.classList.add("in");
  }, 500);
  window.addEventListener("scroll", () => {
    navbar.classList.toggle("scrolled", window.scrollY > 80);
    // backTop.classList.toggle("show", window.scrollY > 500);
  });
});

AOS.init({
  duration: 800,
  easing: "ease-out-cubic",
  once: true,
  offset: 40,
});

/* ================= MOBILE NAV ================= */
document
  .getElementById("navToggle")
  .addEventListener("click", () =>
    document.getElementById("navLinks").classList.toggle("open"),
  );

/* ================= RIPPLE ================= */
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

/* ================= DATA ================= */
const CATEGORIES = ["Sofa", "Ghế", "Bàn", "Giường", "Tủ", "Đèn", "Decor"];
const MATERIALS = ["Gỗ", "Kim loại", "Da", "Vải", "Kính"];
const COLORS = [
  { name: "Nâu gỗ", hex: "#8B6B4A" },
  { name: "Vàng nhạt", hex: "#D8B98A" },
  { name: "Đen", hex: "#1E1E1E" },
  { name: "Kem", hex: "#F8F6F2" },
  { name: "Xám", hex: "#9A9A94" },
];
const IMG_POOL = [
  "https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1615066390971-03e4e1c36ddf?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1543198126-cdcb62dc4e00?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1506439773649-6e0eb8cfb237?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1595428774223-ef52624120d2?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1550254478-ead40cc54513?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1519710164239-da123dc03ef4?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1533090161767-e6ffed986c88?w=600&h=700&q=80",
  "https://images.unsplash.com/photo-1567016432779-094069958ea5?w=600&h=700&q=80",
];
const RAW = [
  ["Sofa Milan Premium", "Sofa"],
  ["Sofa Nordic", "Sofa"],
  ["Sofa Osaka", "Sofa"],
  ["Sofa Verona", "Sofa"],
  ["Ghế Lounge Aura", "Ghế"],
  ["Ghế Accent Milan", "Ghế"],
  ["Ghế Dining Nordic", "Ghế"],
  ["Bàn trà Tokyo", "Bàn"],
  ["Bàn ăn Osaka", "Bàn"],
  ["Bàn Console Kyoto", "Bàn"],
  ["Kệ sách Scandinavian", "Tủ"],
  ["Tủ TV Premium", "Tủ"],
  ["Tủ quần áo Modern", "Tủ"],
  ["Giường Queen Aura", "Giường"],
  ["Giường King Premium", "Giường"],
  ["Đèn Aurora", "Đèn"],
  ["Đèn Luna", "Đèn"],
  ["Thảm Linen", "Decor"],
  ["Gương Decor", "Decor"],
  ["Tủ đầu giường Oak", "Tủ"],
  ["Ghế Bar Nordic", "Ghế"],
  ["Kệ treo tường", "Tủ"],
  ["Bàn làm việc Studio", "Bàn"],
  ["Ghế công thái học", "Ghế"],
];
function seededRand(seed) {
  const x = Math.sin(seed * 999) * 10000;
  return x - Math.floor(x);
}
const REVIEWERS = [
  {
    name: "Nguyễn Thu Hà",
    img: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=120&h=120&q=80",
  },
  {
    name: "Trần Minh Khôi",
    img: "https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=120&h=120&q=80",
  },
  {
    name: "Lê Phương Anh",
    img: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=120&h=120&q=80",
  },
];
const REVIEW_PHOTOS = [
  "https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=600&h=600&q=80",
  "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=600&h=600&q=80",
];

const PRODUCTS = RAW.map((r, i) => {
  const rnd = seededRand(i + 1),
    rnd2 = seededRand(i + 50),
    rnd3 = seededRand(i + 120);
  const price = Math.round(((1.5 + rnd * 17) * 1000000) / 100000) * 100000;
  const hasDiscount = rnd2 > 0.55;
  const oldPrice = hasDiscount
    ? Math.round((price * (1.15 + rnd3 * 0.25)) / 100000) * 100000
    : null;
  const rating = Math.round((3.6 + rnd * 1.4) * 10) / 10;
  const sold = Math.round(40 + rnd2 * 1800);
  const colors = COLORS.filter((c, ci) => seededRand(i * 7 + ci) > 0.45).map(
    (c) => c.hex,
  );
  const materials = MATERIALS.filter((m, mi) => seededRand(i * 13 + mi) > 0.6);
  const img = IMG_POOL[i % IMG_POOL.length];
  const gallery = [0, 1, 2, 3, 4].map(
    (g) => IMG_POOL[(i + g + 1) % IMG_POOL.length],
  );
  return {
    id: i + 1,
    name: r[0],
    cat: r[1],
    price,
    oldPrice,
    rating,
    sold,
    colors: colors.length ? colors : [COLORS[0].hex],
    materials: materials.length ? materials : [MATERIALS[0]],
    sizes: ["S", "M", "L"],
    img,
    gallery,
    desc: `${r[0]} được chế tác từ chất liệu cao cấp, thiết kế tối giản theo phong cách Modern Luxury — mang đến sự sang trọng tinh tế cho không gian sống của bạn. Sản phẩm được hoàn thiện thủ công tỉ mỉ, đảm bảo độ bền và tính thẩm mỹ lâu dài.`,
    specs: {
      "Chiều cao": `${70 + Math.round(rnd * 60)} cm`,
      "Chiều rộng": `${80 + Math.round(rnd2 * 120)} cm`,
      "Chất liệu": materials[0] || MATERIALS[0],
      Màu: "Theo lựa chọn",
      "Bảo hành": "24 tháng",
      "Khối lượng": `${8 + Math.round(rnd3 * 40)} kg`,
    },
    reviews: [
      {
        ...REVIEWERS[i % 3],
        stars: 5,
        text: "Sản phẩm đẹp hơn mong đợi, đóng gói cẩn thận, giao hàng đúng hẹn. Rất hài lòng!",
        photo: i % 2 === 0 ? REVIEW_PHOTOS[0] : null,
      },
      {
        ...REVIEWERS[(i + 1) % 3],
        stars: 4,
        text: "Chất lượng tốt, đúng như mô tả. Sẽ ủng hộ shop lần sau.",
        photo: null,
      },
      {
        ...REVIEWERS[(i + 2) % 3],
        stars: 5,
        text: "Nhân viên tư vấn nhiệt tình, sản phẩm chắc chắn, hoàn thiện tinh xảo.",
        photo: i % 3 === 0 ? REVIEW_PHOTOS[1] : null,
      },
    ],
  };
});
const fmt = (n) => n.toLocaleString("vi-VN") + "₫";

/* ================= STATE ================= */
let state = {
  search: "",
  cats: [],
  materials: [],
  colors: [],
  minRating: 0,
  priceMin: 0,
  priceMax: 100000000,
  sort: "newest",
  visibleCount: 12,
  selectedId: null,
};
let recentlyViewed = [];
let likedIds = new Set();

/* ================= BUILD SIDEBAR ================= */
const catFilters = document.getElementById("catFilters");
CATEGORIES.forEach((c) => {
  const cnt = PRODUCTS.filter((p) => p.cat === c).length;
  const label = document.createElement("label");
  label.className = "chk";
  label.innerHTML = `<input type="checkbox" value="${c}"><span>${c}</span><span class="cnt">${cnt}</span>`;
  label.querySelector("input").addEventListener("change", (e) => {
    if (e.target.checked) state.cats.push(c);
    else state.cats = state.cats.filter((x) => x !== c);
  });
  catFilters.appendChild(label);
});
const matFilters = document.getElementById("matFilters");
MATERIALS.forEach((m) => {
  const label = document.createElement("label");
  label.className = "chk";
  label.innerHTML = `<input type="checkbox" value="${m}"><span>${m}</span>`;
  label.querySelector("input").addEventListener("change", (e) => {
    if (e.target.checked) state.materials.push(m);
    else state.materials = state.materials.filter((x) => x !== m);
  });
  matFilters.appendChild(label);
});
const colorFilters = document.getElementById("colorFilters");
COLORS.forEach((c) => {
  const dot = document.createElement("div");
  dot.className = "color-dot";
  dot.style.background = c.hex;
  dot.title = c.name;
  if (c.hex === "#F8F6F2") dot.style.boxShadow = "inset 0 0 0 1px #e2ddd0";
  dot.addEventListener("click", () => {
    dot.classList.toggle("selected");
    if (dot.classList.contains("selected")) state.colors.push(c.hex);
    else state.colors = state.colors.filter((x) => x !== c.hex);
  });
  colorFilters.appendChild(dot);
});
const ratingFilters = document.getElementById("ratingFilters");
[5, 4, 3].forEach((r) => {
  const row = document.createElement("div");
  row.className = "rating-row";
  row.innerHTML = `<span class="stars">${"★".repeat(r)}${"☆".repeat(5 - r)}</span><span>trở lên</span>`;
  row.addEventListener("click", () => {
    state.minRating = state.minRating === r ? 0 : r;
    document
      .querySelectorAll(".rating-row")
      .forEach((el) => (el.style.color = "#666"));
    if (state.minRating === r) row.style.color = "var(--wood)";
  });
  ratingFilters.appendChild(row);
});
/* accordion */
document
  .querySelectorAll(".acc-head")
  .forEach((h) =>
    h.addEventListener("click", () => h.parentElement.classList.toggle("open")),
  );
/* price slider */
const priceMinEl = document.getElementById("priceMin"),
  priceMaxEl = document.getElementById("priceMax");
const priceMinLbl = document.getElementById("priceMinLbl"),
  priceMaxLbl = document.getElementById("priceMaxLbl");
const priceRangeFill = document.getElementById("priceRangeFill");
function updatePriceUI() {
  let mn = +priceMinEl.value,
    mx = +priceMaxEl.value;
  if (mn > mx - 500000) {
    mn = mx - 500000;
    priceMinEl.value = mn;
  }
  priceMinLbl.textContent = fmt(mn);
  priceMaxLbl.textContent = fmt(mx);
  priceRangeFill.style.left = (mn / 100000000) * 100 + "%";
  priceRangeFill.style.right = 100 - (mx / 100000000) * 100 + "%";
  state.priceMin = mn;
  state.priceMax = mx;
}
priceMinEl.addEventListener("input", updatePriceUI);
priceMaxEl.addEventListener("input", updatePriceUI);
updatePriceUI();

/* ================= FILTER / SORT LOGIC ================= */
function getFiltered() {
  let list = PRODUCTS.filter((p) => {
    if (
      state.search &&
      !p.name.toLowerCase().includes(state.search.toLowerCase())
    )
      return false;
    if (state.cats.length && !state.cats.includes(p.cat)) return false;
    if (
      state.materials.length &&
      !p.materials.some((m) => state.materials.includes(m))
    )
      return false;
    if (state.colors.length && !p.colors.some((c) => state.colors.includes(c)))
      return false;
    if (state.minRating && p.rating < state.minRating) return false;
    if (p.price < state.priceMin || p.price > state.priceMax) return false;
    return true;
  });
  switch (state.sort) {
    case "price-asc":
      list.sort((a, b) => a.price - b.price);
      break;
    case "price-desc":
      list.sort((a, b) => b.price - a.price);
      break;
    case "bestseller":
      list.sort((a, b) => b.sold - a.sold);
      break;
    case "rating":
      list.sort((a, b) => b.rating - a.rating);
      break;
    default:
      list.sort((a, b) => b.id - a.id);
  }
  return list;
}

/* ================= RENDER GRID ================= */
const productGrid = document.getElementById("productGrid");
const resultCount = document.getElementById("resultCount");
const loadMoreWrap = document.getElementById("loadMoreWrap");

function showSkeleton(n = 6) {
  productGrid.innerHTML = Array.from({ length: n })
    .map(
      () => `
    <div class="skel-card"><div class="skel-img"></div>
      <div class="skel-body"><div class="skel-line w60"></div><div class="skel-line w40"></div><div class="skel-line w80"></div></div>
    </div>`,
    )
    .join("");
}

function renderGrid() {
  const list = getFiltered();
  resultCount.textContent = list.length;
  if (list.length === 0) {
    productGrid.innerHTML = `<div class="empty-state">
      <svg width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/><path d="M8 11h6"/></svg>
      <h4>Không tìm thấy sản phẩm</h4><p>Thử điều chỉnh bộ lọc hoặc từ khóa tìm kiếm khác.</p></div>`;
    loadMoreWrap.style.display = "none";
    return;
  }
  const shown = list.slice(0, state.visibleCount);
  productGrid.innerHTML = shown.map((p) => cardHTML(p)).join("");
  requestAnimationFrame(() => {
    document
      .querySelectorAll(".p-card")
      .forEach((el, i) => setTimeout(() => el.classList.add("show"), i * 60));
  });
  loadMoreWrap.style.display =
    list.length > state.visibleCount ? "block" : "none";
  bindCardEvents();
}

function cardHTML(p) {
  const discount = p.oldPrice
    ? Math.round((1 - p.price / p.oldPrice) * 100)
    : 0;
  return `<div class="p-card ${state.selectedId === p.id ? "active" : ""}" data-id="${p.id}">
    <div class="p-img">
      <img src="${p.img}" alt="${p.name}" loading="lazy">
      ${discount > 0 ? `<span class="p-discount">-${discount}%</span>` : ""}
      <div class="p-icons">
        <button class="like-btn ${likedIds.has(p.id) ? "liked" : ""}" data-id="${p.id}" aria-label="Yêu thích" title="Yêu thích">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="${likedIds.has(p.id) ? "currentColor" : "none"}" stroke="currentColor" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 00-7.8 0L12 5.6l-1-1a5.5 5.5 0 00-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 000-7.8z"/></svg>
        </button>
        <button class="quick-btn" data-id="${p.id}" aria-label="Xem nhanh" title="Xem nhanh"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg></button>
        <button class="cart-btn" data-id="${p.id}" aria-label="Thêm giỏ hàng" title="Thêm giỏ hàng"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 002 1.6h9.7a2 2 0 002-1.6L23 6H6"/></svg></button>
      </div>
    </div>
    <div class="p-body">
      <span class="p-cat">${p.cat}</span>
      <h3 class="p-name">${p.name}</h3>
      <div class="p-rating">${"★".repeat(Math.round(p.rating))}${"☆".repeat(5 - Math.round(p.rating))}<span>(${p.rating})</span></div>
      <div class="p-footer">
        <div class="p-price-wrap"><span class="p-price">${fmt(p.price)}</span>${p.oldPrice ? `<span class="p-old-price">${fmt(p.oldPrice)}</span>` : ""}</div>
        <button class="add-btn cart-btn" data-id="${p.id}" aria-label="Thêm giỏ hàng"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg></button>
      </div>
    </div>
  </div>`;
}

function bindCardEvents() {
  document.querySelectorAll(".p-card").forEach((card) => {
    card.addEventListener("click", (e) => {
      if (e.target.closest("button")) return;
      selectProduct(+card.dataset.id);
    });
  });
  document.querySelectorAll(".quick-btn").forEach((b) =>
    b.addEventListener("click", (e) => {
      e.stopPropagation();
      selectProduct(+b.dataset.id);
    }),
  );
  document.querySelectorAll(".like-btn").forEach((b) =>
    b.addEventListener("click", (e) => {
      e.stopPropagation();
      const id = +b.dataset.id;
      if (likedIds.has(id)) likedIds.delete(id);
      else likedIds.add(id);
      b.classList.toggle("liked");
      b.classList.add("heart-pop");
      b.querySelector("svg").setAttribute(
        "fill",
        likedIds.has(id) ? "currentColor" : "none",
      );
      setTimeout(() => b.classList.remove("heart-pop"), 400);
    }),
  );
  document.querySelectorAll(".cart-btn").forEach((b) =>
    b.addEventListener("click", (e) => {
      e.stopPropagation();
      const id = +b.dataset.id;
      const p = PRODUCTS.find((x) => x.id === id);
      b.classList.add("cart-bounce");
      setTimeout(() => b.classList.remove("cart-bounce"), 500);
      showToast(`Đã thêm "${p.name}" vào giỏ hàng`);
    }),
  );
}

/* ================= TOAST ================= */
function showToast(msg) {
  const wrap = document.getElementById("toastWrap");
  const t = document.createElement("div");
  t.className = "toast";
  t.innerHTML = `<span class="tick"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg></span><span>${msg}</span>`;
  wrap.appendChild(t);
  requestAnimationFrame(() => t.classList.add("show"));
  setTimeout(() => {
    t.classList.remove("show");
    setTimeout(() => t.remove(), 500);
  }, 3000);
}

/* ================= DETAIL PANEL / SHEET ================= */
let activeGalleryIdx = 0,
  activeQty = 1,
  activeColor = null,
  activeSize = "M",
  activeTab = "desc";

function detailHTML(p) {
  const discount = p.oldPrice
    ? Math.round((1 - p.price / p.oldPrice) * 100)
    : 0;
  activeColor = p.colors[0];
  activeSize = "M";
  activeQty = 1;
  activeGalleryIdx = 0;
  activeTab = "desc";
  return `
    <div class="detail-main-img">
      <img id="detailMainImg" src="${p.gallery[0]}" alt="${p.name}">
      <div class="detail-close" id="detailCloseBtn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg></div>
    </div>
    <div class="detail-gallery" id="detailGallery">
      ${p.gallery.map((g, i) => `<img src="${g}" class="${i === 0 ? "active" : ""}" data-idx="${i}">`).join("")}
    </div>
    <div class="detail-body">
      <h2>${p.name}</h2>
      <div class="detail-meta"><span class="stars">${"★".repeat(Math.round(p.rating))}${"☆".repeat(5 - Math.round(p.rating))}</span><span>${p.rating}</span><span>·</span><span>Đã bán ${p.sold.toLocaleString("vi-VN")}</span></div>
      <div class="detail-price-row">
        <span class="detail-price">${fmt(p.price)}</span>
        ${p.oldPrice ? `<span class="detail-old">${fmt(p.oldPrice)}</span><span class="detail-off">-${discount}%</span>` : ""}
      </div>
      <p style="font-size:13.5px;color:#888;line-height:1.7;">${p.desc.slice(0, 110)}...</p>

      <div class="opt-label">Màu sắc</div>
      <div class="opt-colors" id="optColors">
        ${p.colors.map((c) => `<div class="opt-color ${c === activeColor ? "sel" : ""}" style="background:${c};${c === "#F8F6F2" ? "box-shadow:inset 0 0 0 1px #e2ddd0;" : ""}" data-color="${c}"></div>`).join("")}
      </div>

      <div class="opt-label">Kích thước</div>
      <div class="opt-sizes" id="optSizes">
        ${p.sizes.map((s) => `<div class="opt-size ${s === activeSize ? "sel" : ""}" data-size="${s}">${s}</div>`).join("")}
      </div>

      <div class="qty-row">
        <div class="qty-stepper">
          <button id="qtyMinus">−</button><span id="qtyVal">1</span><button id="qtyPlus">+</button>
        </div>
      </div>

      <div class="detail-btns">
        <button class="btn btn-buy btn-ripple" id="buyNowBtn">Mua ngay</button>
        <button class="btn btn-cart btn-ripple" id="addCartBtn">Thêm giỏ hàng</button>
      </div>

      <div class="tabs">
        <div class="tabs-head" id="tabsHead">
          <div class="tab-btn active" data-tab="desc">Mô tả</div>
          <div class="tab-btn" data-tab="specs">Thông số</div>
          <div class="tab-btn" data-tab="reviews">Đánh giá</div>
          <div class="tab-indicator" id="tabIndicator"></div>
        </div>
        <div class="tab-panels">
          <div class="tab-panel active" data-panel="desc">
            <div class="icon-line"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg><span>Chất liệu tự nhiên, an toàn cho sức khỏe</span></div>
            <div class="icon-line"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg><span>Thiết kế tối giản, dễ phối hợp không gian</span></div>
            <div class="icon-line"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg><span>Bảo hành chính hãng 24 tháng</span></div>
            <p style="margin-top:6px;">${p.desc}</p>
          </div>
          <div class="tab-panel" data-panel="specs">
            ${Object.entries(p.specs)
              .map(
                ([k, v]) =>
                  `<div class="spec-row"><span>${k}</span><span>${v}</span></div>`,
              )
              .join("")}
          </div>
          <div class="tab-panel" data-panel="reviews">
            ${p.reviews
              .map(
                (
                  r,
                ) => `<div class="review-item"><img src="${r.img}" alt="${r.name}">
              <div><div class="rname">${r.name}</div><div class="stars">${"★".repeat(r.stars)}${"☆".repeat(5 - r.stars)}</div><p>${r.text}</p>
              ${r.photo ? `<img class="review-photo" src="${r.photo}">` : ""}</div></div>`,
              )
              .join("")}
          </div>
        </div>
      </div>
    </div>`;
}

function bindDetailEvents(root, p) {
  root.querySelector("#detailGallery").addEventListener("click", (e) => {
    const img = e.target.closest("img");
    if (!img) return;
    activeGalleryIdx = +img.dataset.idx;
    const mainImg = root.querySelector("#detailMainImg");
    mainImg.style.opacity = 0;
    setTimeout(() => {
      mainImg.src = p.gallery[activeGalleryIdx];
      mainImg.style.opacity = 1;
    }, 200);
    root
      .querySelectorAll("#detailGallery img")
      .forEach((i) => i.classList.remove("active"));
    img.classList.add("active");
  });
  root.querySelectorAll(".opt-color").forEach((el) =>
    el.addEventListener("click", () => {
      root
        .querySelectorAll(".opt-color")
        .forEach((x) => x.classList.remove("sel"));
      el.classList.add("sel");
    }),
  );
  root.querySelectorAll(".opt-size").forEach((el) =>
    el.addEventListener("click", () => {
      root
        .querySelectorAll(".opt-size")
        .forEach((x) => x.classList.remove("sel"));
      el.classList.add("sel");
    }),
  );
  const qtyVal = root.querySelector("#qtyVal");
  root.querySelector("#qtyPlus").addEventListener("click", () => {
    activeQty++;
    qtyVal.textContent = activeQty;
  });
  root.querySelector("#qtyMinus").addEventListener("click", () => {
    if (activeQty > 1) activeQty--;
    qtyVal.textContent = activeQty;
  });
  root
    .querySelector("#buyNowBtn")
    .addEventListener("click", () =>
      showToast(`Đang chuyển đến thanh toán cho "${p.name}"`),
    );
  root.querySelector("#addCartBtn").addEventListener("click", (e) => {
    e.currentTarget.classList.add("cart-bounce");
    setTimeout(() => e.currentTarget.classList.remove("cart-bounce"), 500);
    showToast(`Đã thêm ${activeQty} × "${p.name}" vào giỏ hàng`);
  });
  const tabsHead = root.querySelector("#tabsHead"),
    indicator = root.querySelector("#tabIndicator");
  function moveIndicator(btn) {
    indicator.style.width = btn.offsetWidth + "px";
    indicator.style.left = btn.offsetLeft + "px";
  }
  const firstTab = root.querySelector(".tab-btn");
  requestAnimationFrame(() => moveIndicator(firstTab));
  root.querySelectorAll(".tab-btn").forEach((btn) =>
    btn.addEventListener("click", () => {
      root
        .querySelectorAll(".tab-btn")
        .forEach((b) => b.classList.remove("active"));
      root
        .querySelectorAll(".tab-panel")
        .forEach((pnl) => pnl.classList.remove("active"));
      btn.classList.add("active");
      root
        .querySelector(`.tab-panel[data-panel="${btn.dataset.tab}"]`)
        .classList.add("active");
      moveIndicator(btn);
    }),
  );
  const closeBtn = root.querySelector("#detailCloseBtn");
  if (closeBtn) closeBtn.addEventListener("click", () => deselectProduct());
}

/* ================= SELECTION FLOW ================= */
const detailEmpty = document.getElementById("detailEmpty");
const detailContent = document.getElementById("detailContent");
const bottomSheet = document.getElementById("bottomSheet");
const sheetOverlay = document.getElementById("sheetOverlay");
const sheetContent = document.getElementById("sheetContent");
const tabletDetailSlot = document.getElementById("tabletDetailSlot");
const relatedWrap = document.getElementById("relatedWrap");
const relatedSlider = document.getElementById("relatedSlider");

function currentBreakpoint() {
  const w = window.innerWidth;
  if (w >= 1280) return "desktop";
  if (w >= 768) return "tablet";
  return "mobile";
}

function selectProduct(id) {
  const p = PRODUCTS.find((x) => x.id === id);
  state.selectedId = id;
  document
    .querySelectorAll(".p-card")
    .forEach((c) => c.classList.toggle("active", +c.dataset.id === id));

  // recently viewed
  recentlyViewed = recentlyViewed.filter((x) => x.id !== id);
  recentlyViewed.unshift(p);
  if (recentlyViewed.length > 8) recentlyViewed.pop();
  renderRecentlyViewed();

  renderRelated(p);

  const bp = currentBreakpoint();
  if (bp === "desktop") {
    detailEmpty.style.display = "none";
    detailContent.innerHTML = detailHTML(p);
    detailContent.classList.add("show");
    bindDetailEvents(detailContent, p);
    tabletDetailSlot.innerHTML = "";
    bottomSheet.classList.remove("open");
    sheetOverlay.classList.remove("show");
  } else if (bp === "tablet") {
    tabletDetailSlot.innerHTML = `<div class="detail-panel" style="position:static;margin-top:32px;max-height:none;"><div class="detail-content show">${detailHTML(p)}</div></div>`;
    bindDetailEvents(tabletDetailSlot, p);
    tabletDetailSlot.scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
    detailContent.classList.remove("show");
  } else {
    sheetContent.innerHTML = detailHTML(p);
    bindDetailEvents(sheetContent, p);
    bottomSheet.classList.add("open");
    sheetOverlay.classList.add("show");
    detailContent.classList.remove("show");
    tabletDetailSlot.innerHTML = "";
  }
}
function deselectProduct() {
  state.selectedId = null;
  document
    .querySelectorAll(".p-card")
    .forEach((c) => c.classList.remove("active"));
  detailContent.classList.remove("show");
  detailEmpty.style.display = "block";
  tabletDetailSlot.innerHTML = "";
  relatedWrap.style.display = "none";
  bottomSheet.classList.remove("open");
  sheetOverlay.classList.remove("show");
}
sheetOverlay.addEventListener("click", deselectProduct);
/* swipe down to close sheet */
let sheetStartY = 0;
bottomSheet.addEventListener(
  "touchstart",
  (e) => (sheetStartY = e.touches[0].clientY),
);
bottomSheet.addEventListener("touchmove", (e) => {
  const dy = e.touches[0].clientY - sheetStartY;
  if (dy > 0) bottomSheet.style.transform = `translateY(${dy}px)`;
});
bottomSheet.addEventListener("touchend", (e) => {
  const dy = e.changedTouches[0].clientY - sheetStartY;
  bottomSheet.style.transform = "";
  if (dy > 100) deselectProduct();
});

function renderRelated(p) {
  const rel = PRODUCTS.filter((x) => x.cat === p.cat && x.id !== p.id).slice(
    0,
    6,
  );
  if (!rel.length) {
    relatedWrap.style.display = "none";
    return;
  }
  relatedWrap.style.display = "block";
  relatedSlider.innerHTML = rel
    .map(
      (r) => `
    <div class="rel-card" data-id="${r.id}">
      <img src="${r.img}" alt="${r.name}">
      <div class="rc-body"><h5>${r.name}</h5><span class="price">${fmt(r.price)}</span></div>
    </div>`,
    )
    .join("");
  relatedSlider
    .querySelectorAll(".rel-card")
    .forEach((c) =>
      c.addEventListener("click", () => selectProduct(+c.dataset.id)),
    );
}

const recentlySection = document.getElementById("recentlySection");
const recentlySlider = document.getElementById("recentlySlider");
function renderRecentlyViewed() {
  if (!recentlyViewed.length) {
    recentlySection.style.display = "none";
    return;
  }
  recentlySection.style.display = "block";
  recentlySlider.innerHTML = recentlyViewed
    .map(
      (r) => `
    <div class="rel-card" data-id="${r.id}">
      <img src="${r.img}" alt="${r.name}">
      <div class="rc-body"><h5>${r.name}</h5><span class="price">${fmt(r.price)}</span></div>
    </div>`,
    )
    .join("");
  recentlySlider
    .querySelectorAll(".rel-card")
    .forEach((c) =>
      c.addEventListener("click", () => selectProduct(+c.dataset.id)),
    );
}

/* ================= TOOLBAR EVENTS ================= */
const searchInput = document.getElementById("searchInput");
const searchBox = document.getElementById("searchBox");
searchInput.addEventListener("focus", () => searchBox.classList.add("focus"));
searchInput.addEventListener("blur", () => searchBox.classList.remove("focus"));
let searchDeb;
searchInput.addEventListener("input", (e) => {
  clearTimeout(searchDeb);
  searchDeb = setTimeout(() => {
    state.search = e.target.value;
    state.visibleCount = 12;
    applyFilters();
  }, 250);
});
document.getElementById("sortSelect").addEventListener("change", (e) => {
  state.sort = e.target.value;
  renderGrid();
});
document.getElementById("loadMoreBtn").addEventListener("click", () => {
  state.visibleCount += 9;
  renderGrid();
});

function applyFilters() {
  showSkeleton(6);
  setTimeout(renderGrid, 450);
}
document.getElementById("applyFiltersBtn").addEventListener("click", () => {
  state.visibleCount = 12;
  applyFilters();
  closeSidebar();
});
document.getElementById("clearFiltersBtn").addEventListener("click", () => {
  state = {
    ...state,
    search: "",
    cats: [],
    materials: [],
    colors: [],
    minRating: 0,
    priceMin: 0,
    priceMax: 100000000,
    visibleCount: 12,
  };
  searchInput.value = "";
  document
    .querySelectorAll("#catFilters input, #matFilters input")
    .forEach((i) => (i.checked = false));
  document
    .querySelectorAll(".color-dot")
    .forEach((d) => d.classList.remove("selected"));
  document
    .querySelectorAll(".rating-row")
    .forEach((r) => (r.style.color = "#666"));
  priceMinEl.value = 0;
  priceMaxEl.value = 100000000;
  updatePriceUI();
  applyFilters();
});

/* sidebar drawer (tablet/mobile) */
const sidebar = document.getElementById("sidebar");
const sidebarOverlay = document.getElementById("sidebarOverlay");
function openSidebar() {
  sidebar.classList.add("open");
  sidebarOverlay.classList.add("show");
}
function closeSidebar() {
  sidebar.classList.remove("open");
  sidebarOverlay.classList.remove("show");
}
document.getElementById("filterToggleBtn").addEventListener("click", () => {
  if (currentBreakpoint() === "desktop") {
    sidebar.scrollIntoView({ behavior: "smooth" });
  } else openSidebar();
});
document.getElementById("sidebarClose").addEventListener("click", closeSidebar);
sidebarOverlay.addEventListener("click", closeSidebar);

/* sticky toolbar shadow */
const toolbar = document.getElementById("toolbar");
window.addEventListener("scroll", () =>
  toolbar.classList.toggle("stuck", window.scrollY > 380),
);

/* re-layout on breakpoint change while a product is selected */
window.addEventListener(
  "resize",
  debounce(() => {
    if (state.selectedId !== null) selectProduct(state.selectedId);
  }, 250),
);
function debounce(fn, t) {
  let h;
  return (...a) => {
    clearTimeout(h);
    h = setTimeout(() => fn(...a), t);
  };
}

/* ================= INIT ================= */
showSkeleton(6);
setTimeout(renderGrid, 700);

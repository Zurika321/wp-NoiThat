document
  .getElementById("navToggle")
  .addEventListener("click", () =>
    document.getElementById("navLinks").classList.toggle("open"),
  );

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
window.addEventListener("scroll", () =>
  document
    .getElementById("toolbar")
    .classList.toggle("stuck", window.scrollY > 420),
);

/* ================= DATA ================= */
const CATS6 = [
  {
    name: "Phòng khách",
    cat: "Living Room",
    img: "https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=400&h=400&q=80",
    count: 12,
  },
  {
    name: "Phòng ngủ",
    cat: "Bedroom",
    img: "https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=400&h=400&q=80",
    count: 9,
  },
  {
    name: "Nhà bếp",
    cat: "Kitchen",
    img: "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&h=400&q=80",
    count: 7,
  },
  {
    name: "Văn phòng",
    cat: "Office",
    img: "https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=400&h=400&q=80",
    count: 6,
  },
  {
    name: "Decor",
    cat: "Decor",
    img: "https://images.unsplash.com/photo-1615529182904-14819c35db37?w=400&h=400&q=80",
    count: 10,
  },
  {
    name: "Ngoài trời",
    cat: "Dining",
    img: "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=400&h=400&q=80",
    count: 5,
  },
];
const catCardGrid = document.getElementById("catCardGrid");
CATS6.forEach((c, i) => {
  const el = document.createElement("div");
  el.className = "catcard";
  el.setAttribute("data-aos", "fade-up");
  el.setAttribute("data-aos-delay", i * 80);
  el.innerHTML = `<img src="${c.img}" alt="${c.name}"><div class="catcard-overlay"><h4>${c.name}</h4><span>${c.count} bộ sưu tập</span></div>`;
  el.addEventListener("click", () => {
    document.getElementById("catSelect").value = c.cat;
    state.cat = c.cat;
    state.page = 1;
    applyFilters();
    document.getElementById("gallery").scrollIntoView({ behavior: "smooth" });
  });
  catCardGrid.appendChild(el);
});

const IMG_POOL = [
  [
    "https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=800&h=1200&q=80",
    "Living Room 01",
    "Living Room",
    1,
  ],
  [
    "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1200&h=800&q=80",
    "Living Room 02",
    "Living Room",
    1,
  ],
  [
    "https://images.unsplash.com/photo-1615874959474-d609969a20ed?w=800&h=800&q=80",
    "Living Room 03",
    "Living Room",
    1,
  ],
  [
    "https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=1000&h=1400&q=80",
    "Living Room 04",
    "Living Room",
    1,
  ],
  [
    "https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=800&h=1200&q=80",
    "Bedroom 01",
    "Bedroom",
    2,
  ],
  [
    "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=1200&h=800&q=80",
    "Bedroom 02",
    "Bedroom",
    2,
  ],
  [
    "https://images.unsplash.com/photo-1615529182904-14819c35db37?w=800&h=800&q=80",
    "Bedroom 03",
    "Bedroom",
    2,
  ],
  [
    "https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=1000&h=1400&q=80",
    "Bedroom 04",
    "Bedroom",
    2,
  ],
  [
    "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=1200&q=80",
    "Dining 01",
    "Dining",
    3,
  ],
  [
    "https://images.unsplash.com/photo-1617806118233-18e1de247200?w=1200&h=800&q=80",
    "Dining 02",
    "Dining",
    3,
  ],
  [
    "https://images.unsplash.com/photo-1615066390971-03e4e1c36ddf?w=800&h=800&q=80",
    "Dining 03",
    "Dining",
    3,
  ],
  [
    "https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=1000&h=1400&q=80",
    "Dining 04",
    "Dining",
    3,
  ],
  [
    "https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=800&h=1200&q=80",
    "Kitchen 01",
    "Kitchen",
    1,
  ],
  [
    "https://images.unsplash.com/photo-1567016432779-094069958ea5?w=1200&h=800&q=80",
    "Kitchen 02",
    "Kitchen",
    1,
  ],
  [
    "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800&h=800&q=80",
    "Office 01",
    "Office",
    2,
  ],
  [
    "https://images.unsplash.com/photo-1618220179428-22790b461013?w=1000&h=1400&q=80",
    "Office 02",
    "Office",
    2,
  ],
  [
    "https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=800&h=1200&q=80",
    "Decor 01",
    "Decor",
    3,
  ],
  [
    "https://images.unsplash.com/photo-1543198126-cdcb62dc4e00?w=1200&h=800&q=80",
    "Decor 02",
    "Decor",
    3,
  ],
  [
    "https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=800&h=800&q=80",
    "Decor 03",
    "Decor",
    1,
  ],
  [
    "https://images.unsplash.com/photo-1595428774223-ef52624120d2?w=1000&h=1400&q=80",
    "Decor 04",
    "Decor",
    1,
  ],
  [
    "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=800&h=1200&q=80",
    "Living Room 05",
    "Living Room",
    2,
  ],
  [
    "https://images.unsplash.com/photo-1550254478-ead40cc54513?w=1200&h=800&q=80",
    "Bedroom 05",
    "Bedroom",
    3,
  ],
  [
    "https://images.unsplash.com/photo-1519710164239-da123dc03ef4?w=800&h=800&q=80",
    "Dining 05",
    "Dining",
    1,
  ],
  [
    "https://images.unsplash.com/photo-1533090161767-e6ffed986c88?w=1000&h=1400&q=80",
    "Kitchen 03",
    "Kitchen",
    2,
  ],
  [
    "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=800&h=1200&q=80",
    "Office 03",
    "Office",
    3,
  ],
  [
    "https://images.unsplash.com/photo-1560250097-0b93528c311a?w=1200&h=800&q=80",
    "Decor 05",
    "Decor",
    2,
  ],
  [
    "https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=800&h=800&q=80",
    "Living Room 06",
    "Living Room",
    3,
  ],
  [
    "https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=1000&h=1400&q=80",
    "Bedroom 06",
    "Bedroom",
    1,
  ],
];
const COLLECTIONS = {
  1: "Scandinavian Living",
  2: "Modern Bedroom",
  3: "Luxury Dining",
};
const MATERIALS = [
  "Gỗ sồi tự nhiên",
  "Vải linen",
  "Da thật",
  "Gỗ óc chó",
  "Kim loại sơn tĩnh điện",
];
function seededRand(seed) {
  const x = Math.sin(seed * 999) * 10000;
  return x - Math.floor(x);
}
const GALLERY = IMG_POOL.map((g, i) => ({
  id: i + 1,
  img: g[0],
  title: g[1],
  category: g[2],
  collectionId: g[3],
  year: 2026,
  material: MATERIALS[i % MATERIALS.length],
  desc: `Không gian ${g[2].toLowerCase()} được bài trí theo phong cách ${COLLECTIONS[g[3]]}, kết hợp ánh sáng tự nhiên và chất liệu mộc mạc để tạo cảm giác ấm cúng, tinh tế.`,
  related: [
    {
      name: "Sofa Milan",
      img: "https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=100&h=100&q=80",
    },
    {
      name: "Bàn Osaka",
      img: "https://images.unsplash.com/photo-1615066390971-03e4e1c36ddf?w=100&h=100&q=80",
    },
    {
      name: "Đèn Aurora",
      img: "https://images.unsplash.com/photo-1543198126-cdcb62dc4e00?w=100&h=100&q=80",
    },
  ],
}));

let state = {
  search: "",
  cat: "all",
  sort: "newest",
  page: 1,
  view: "masonry",
  perPage: 15,
};

/* toolbar */
const searchInput = document.getElementById("searchInput");
const searchBox = document.getElementById("searchBox");
searchInput.addEventListener("focus", () => searchBox.classList.add("focus"));
searchInput.addEventListener("blur", () => searchBox.classList.remove("focus"));
let searchDeb;
searchInput.addEventListener("input", (e) => {
  clearTimeout(searchDeb);
  searchDeb = setTimeout(() => {
    state.search = e.target.value;
    state.page = 1;
    applyFilters();
  }, 250);
});
document.getElementById("catSelect").addEventListener("change", (e) => {
  state.cat = e.target.value;
  state.page = 1;
  applyFilters();
});
document.getElementById("sortSelect").addEventListener("change", (e) => {
  state.sort = e.target.value;
  applyFilters();
});
document.getElementById("viewMasonry").addEventListener("click", function () {
  setView("masonry", this);
});
document.getElementById("viewGrid").addEventListener("click", function () {
  setView("grid", this);
});
function setView(v, btn) {
  state.view = v;
  document
    .querySelectorAll(".view-toggle button")
    .forEach((b) => b.classList.remove("active"));
  btn.classList.add("active");
  document
    .getElementById("masonryGrid")
    .classList.toggle("grid-mode", v === "grid");
}

function getFiltered() {
  let list = GALLERY.filter((g) => {
    if (
      state.search &&
      !g.title.toLowerCase().includes(state.search.toLowerCase()) &&
      !COLLECTIONS[g.collectionId]
        .toLowerCase()
        .includes(state.search.toLowerCase())
    )
      return false;
    if (state.cat !== "all" && g.category !== state.cat) return false;
    return true;
  });
  switch (state.sort) {
    case "az":
      list.sort((a, b) => a.title.localeCompare(b.title));
      break;
    case "featured":
      list.sort((a, b) => b.collectionId - a.collectionId);
      break;
    default:
      list.sort((a, b) => b.id - a.id);
  }
  return list;
}

const masonryGrid = document.getElementById("masonryGrid");
const skeletonWrap = document.getElementById("skeletonWrap");
const loadMoreWrap = document.getElementById("loadMoreWrap");

function showSkeleton() {
  masonryGrid.style.display = "none";
  skeletonWrap.style.display = "block";
  const heights = [220, 300, 180, 340, 260, 200, 320, 240];
  skeletonWrap.innerHTML = Array.from({ length: 10 })
    .map(
      (_, i) =>
        `<div class="skel-g" style="height:${heights[i % heights.length]}px;"></div>`,
    )
    .join("");
}

function renderGallery() {
  const list = getFiltered();
  skeletonWrap.style.display = "none";
  masonryGrid.style.display = state.view === "grid" ? "grid" : "block";
  if (!list.length) {
    masonryGrid.innerHTML = `<div class="empty-state">
      <svg width="66" height="66" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/><path d="M8 11h6"/></svg>
      <h4>Không tìm thấy hình ảnh phù hợp</h4><p>Thử từ khóa hoặc danh mục khác.</p></div>`;
    loadMoreWrap.style.display = "none";
    return;
  }
  const shown = list.slice(0, state.perPage);
  window.currentList = shown;
  masonryGrid.innerHTML = shown
    .map(
      (g, i) => `
    <div class="g-item" data-idx="${i}">
      <img src="${g.img}" alt="${g.title}" loading="lazy">
      <div class="g-plus"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg></div>
      <div class="g-overlay"><h5>${g.title}</h5><span>${g.category}</span></div>
    </div>`,
    )
    .join("");
  requestAnimationFrame(() =>
    document
      .querySelectorAll(".g-item")
      .forEach((el, i) => setTimeout(() => el.classList.add("show"), i * 45)),
  );
  document
    .querySelectorAll(".g-item")
    .forEach((el) =>
      el.addEventListener("click", () => openLightbox(+el.dataset.idx)),
    );
  loadMoreWrap.style.display = list.length > state.perPage ? "block" : "none";
}
document.getElementById("loadMoreBtn").addEventListener("click", () => {
  state.perPage += 10;
  renderGallery();
});

function applyFilters() {
  showSkeleton();
  setTimeout(renderGallery, 400);
}

/* ================= LIGHTBOX ================= */
const lightbox = document.getElementById("lightbox");
const lbImg = document.getElementById("lbImg");
let lbIdx = 0;
function openLightbox(idx) {
  lbIdx = idx;
  renderLightbox();
  lightbox.classList.add("open");
  document.body.style.overflow = "hidden";
}
function renderLightbox() {
  const list = window.currentList;
  const g = list[lbIdx];
  lbImg.src = g.img.replace(/w=\d+&h=\d+/, "w=1920&h=1080");
  lbImg.classList.remove("zoomed");
  document.getElementById("lbCat").textContent = g.category;
  document.getElementById("lbTitle").textContent = g.title;
  document.getElementById("lbDesc").textContent = g.desc;
  document.getElementById("lbMetaCat").textContent =
    COLLECTIONS[g.collectionId];
  document.getElementById("lbMetaYear").textContent = g.year;
  document.getElementById("lbMetaMat").textContent = g.material;
  document.getElementById("lbDownload").href = g.img;
  document.getElementById("lbRelated").innerHTML = g.related
    .map(
      (r) =>
        `<div class="lb-related-item"><img src="${r.img}" alt="${r.name}"><span>${r.name}</span></div>`,
    )
    .join("");
  const thumbs = document.getElementById("lbThumbs");
  thumbs.innerHTML = list
    .map(
      (t, i) =>
        `<img src="${t.img}" class="${i === lbIdx ? "active" : ""}" data-i="${i}">`,
    )
    .join("");
  thumbs.querySelectorAll("img").forEach((t) =>
    t.addEventListener("click", () => {
      lbIdx = +t.dataset.i;
      renderLightbox();
    }),
  );
}
document.getElementById("lbClose").addEventListener("click", closeLightbox);
function closeLightbox() {
  lightbox.classList.remove("open");
  document.body.style.overflow = "";
}
document.getElementById("lbPrev").addEventListener("click", () => {
  lbIdx = (lbIdx - 1 + window.currentList.length) % window.currentList.length;
  renderLightbox();
});
document.getElementById("lbNext").addEventListener("click", () => {
  lbIdx = (lbIdx + 1) % window.currentList.length;
  renderLightbox();
});
document
  .getElementById("lbZoom")
  .addEventListener("click", () => lbImg.classList.toggle("zoomed"));
lbImg.addEventListener("click", () => lbImg.classList.toggle("zoomed"));
document.getElementById("lbFullscreen").addEventListener("click", () => {
  if (!document.fullscreenElement) lightbox.requestFullscreen?.();
  else document.exitFullscreen?.();
});
document.addEventListener("keydown", (e) => {
  if (!lightbox.classList.contains("open")) return;
  if (e.key === "Escape") closeLightbox();
  if (e.key === "ArrowLeft") document.getElementById("lbPrev").click();
  if (e.key === "ArrowRight") document.getElementById("lbNext").click();
});
/* swipe */
let touchX = 0;
lightbox.addEventListener("touchstart", (e) => (touchX = e.touches[0].clientX));
lightbox.addEventListener("touchend", (e) => {
  const dx = e.changedTouches[0].clientX - touchX;
  if (dx > 60) document.getElementById("lbPrev").click();
  else if (dx < -60) document.getElementById("lbNext").click();
});

/* ================= LOOKBOOK HOTSPOTS ================= */
const hotspotCard = document.getElementById("hotspotCard");
document.querySelectorAll(".hotspot").forEach((hs) => {
  hs.addEventListener("click", (e) => {
    e.stopPropagation();
    const { name, price, img } = hs.dataset;
    hotspotCard.innerHTML = `<img src="${img}" alt="${name}"><h5>${name}</h5><span class="price">${price}</span>
      <div class="hc-btns"><button class="hc-view">Xem chi tiết</button><button class="hc-cart">Thêm giỏ</button></div>`;
    let top = parseFloat(hs.style.top),
      left = parseFloat(hs.style.left);
    hotspotCard.style.top = Math.min(top, 68) + "%";
    hotspotCard.style.left = left > 50 ? left - 24 + "%" : left + 4 + "%";
    hotspotCard.classList.add("show");
    hotspotCard
      .querySelector(".hc-view")
      .addEventListener(
        "click",
        () => (window.location.href = "products.html"),
      );
    hotspotCard.querySelector(".hc-cart").addEventListener("click", () => {
      showToast(`Đã thêm "${name}" vào giỏ hàng`);
      hotspotCard.classList.remove("show");
    });
  });
});
document.addEventListener("click", (e) => {
  if (!e.target.closest(".hotspot") && !e.target.closest(".hotspot-card"))
    hotspotCard.classList.remove("show");
});

/* subtle lookbook parallax on scroll */
const lookbookImg = document.getElementById("lookbookImg");
window.addEventListener("scroll", () => {
  const wrap = document.getElementById("lookbookImgWrap");
  const rect = wrap.getBoundingClientRect();
  if (rect.top < window.innerHeight && rect.bottom > 0) {
    const offset = (rect.top - window.innerHeight / 2) * 0.04;
    lookbookImg.style.transform = `translateY(${offset}px) scale(1.06)`;
  }
});

/* ================= INSTAGRAM ================= */
const instaGrid = document.getElementById("instaGrid");
[
  "https://images.unsplash.com/photo-1618220179428-22790b461013?w=800&h=800&q=80",
  "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=800&q=80",
  "https://images.unsplash.com/photo-1615874959474-d609969a20ed?w=800&h=800&q=80",
  "https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=800&h=800&q=80",
  "https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=800&h=800&q=80",
  "https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=800&h=800&q=80",
].forEach((src, i) => {
  const item = document.createElement("div");
  item.className = "insta-item";
  item.setAttribute("data-aos", "zoom-in");
  item.setAttribute("data-aos-delay", i * 60);
  item.innerHTML = `<img src="${src}" alt="Instagram ${i + 1}" loading="lazy"><div class="insta-overlay"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg></div>`;
  instaGrid.appendChild(item);
});

/* init */
showSkeleton();
setTimeout(renderGallery, 700);

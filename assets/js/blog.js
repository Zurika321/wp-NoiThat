AOS.init({
  duration: 800,
  easing: "ease-out-cubic",
  once: true,
  offset: 40,
});
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

/* ================= DATA ================= */
const CATEGORIES = [
  { id: 0, name: "Tất cả" },
  { id: 1, name: "Xu hướng" },
  { id: 2, name: "Phòng khách" },
  { id: 3, name: "Phòng ngủ" },
  { id: 4, name: "Nhà bếp" },
  { id: 5, name: "Decor" },
  { id: 6, name: "Mẹo hay" },
  { id: 7, name: "Dự án" },
  { id: 8, name: "Khuyến mãi" },
];
const IMG_POOL = [
  "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1567016432779-094069958ea5?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1618220179428-22790b461013?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1615874959474-d609969a20ed?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1615529182904-14819c35db37?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=900&h=600&q=80",
  "https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=900&h=600&q=80",
];
const TITLES = [
  ["10 xu hướng nội thất nổi bật năm 2026", 1, true],
  ["Bí quyết lựa chọn sofa cho phòng khách nhỏ", 2, false],
  ["5 mẫu giường ngủ tối giản được yêu thích", 3, false],
  ["Bố trí nhà bếp nhỏ gọn, tiện nghi", 4, false],
  ["Cách phối màu decor theo phong cách Nordic", 5, false],
  ["7 mẹo giữ nhà gọn gàng quanh năm", 6, false],
  ["Dự án cải tạo căn hộ 60m² tại Hà Nội", 7, false],
  ["Ưu đãi mùa hè: Giảm đến 30% bộ sưu tập Nordic", 8, false],
  ["Chất liệu gỗ nào phù hợp với khí hậu Việt Nam?", 1, false],
  ["Phối hợp sofa da và sofa vải trong cùng không gian", 2, false],
  ["Ánh sáng lý tưởng cho phòng ngủ thư giãn", 3, false],
  ["Xu hướng tủ bếp chữ L cho căn hộ hiện đại", 4, false],
  ["Trang trí phòng khách với cây xanh", 5, false],
  ["Cách vệ sinh và bảo quản đồ nội thất gỗ", 6, false],
  ["Dự án biệt thự phong cách Indochine", 7, false],
  ["Flash sale cuối tuần: Sofa giảm giá sốc", 8, false],
  ["Phong cách Japandi lên ngôi năm 2026", 1, true],
  ["Bố trí phòng khách theo phong thủy", 2, false],
  ["Chọn nệm phù hợp với dáng ngủ của bạn", 3, false],
  ["Bàn đảo bếp — xu hướng không thể bỏ lỡ", 4, false],
  ["Gương trang trí: điểm nhấn cho mọi không gian", 5, false],
  ["Bí quyết tận dụng ánh sáng tự nhiên", 6, false],
  ["Dự án văn phòng xanh tại TP.HCM", 7, true],
  ["Những sai lầm khi bố trí nội thất", 6, false],
];
function seededRand(seed) {
  const x = Math.sin(seed * 999) * 10000;
  return x - Math.floor(x);
}
const dates = [
  "2026-07-20",
  "2026-07-18",
  "2026-07-15",
  "2026-07-12",
  "2026-07-10",
  "2026-07-08",
  "2026-07-05",
  "2026-07-02",
  "2026-06-29",
  "2026-06-27",
  "2026-06-24",
  "2026-06-21",
  "2026-06-19",
  "2026-06-17",
  "2026-06-15",
  "2026-06-13",
  "2026-06-11",
  "2026-06-09",
  "2026-06-07",
  "2026-06-05",
  "2026-06-03",
  "2026-06-01",
  "2026-05-28",
  "2026-06-11",
];
const POSTS = TITLES.map((t, i) => {
  const rnd = seededRand(i + 1);
  return {
    id: i + 1,
    title: t[0],
    cat: t[1],
    featured: t[2],
    img: IMG_POOL[i % IMG_POOL.length],
    date: dates[i],
    views: Math.round(700 + rnd * 3400),
    readTime: 3 + Math.round(rnd * 5) + " phút",
    desc: "Khám phá những gợi ý thiết thực và cảm hứng thiết kế được MỘC chọn lọc, giúp không gian sống của bạn trở nên tinh tế và ấm cúng hơn mỗi ngày.",
  };
});
const catName = (id) => CATEGORIES.find((c) => c.id === id)?.name || "";
function fmtDate(d) {
  const [y, m, day] = d.split("-");
  return `${day} Th${+m}, ${y}`;
}

/* ================= STATE ================= */
let state = { search: "", cat: 0, sort: "newest", page: 1 };

/* category pills */
const catPills = document.getElementById("catPills");
CATEGORIES.forEach((c) => {
  const b = document.createElement("button");
  b.className = "pill-btn" + (c.id === 0 ? " active" : "");
  b.textContent = c.name;
  b.addEventListener("click", () => {
    document
      .querySelectorAll(".pill-btn")
      .forEach((p) => p.classList.remove("active"));
    b.classList.add("active");
    state.cat = c.id;
    state.page = 1;
    applyFilters();
  });
  catPills.appendChild(b);
});

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
document.getElementById("sortSelect").addEventListener("change", (e) => {
  state.sort = e.target.value;
  state.page = 1;
  applyFilters();
});
window.addEventListener("scroll", () =>
  document
    .getElementById("toolbar")
    .classList.toggle("stuck", window.scrollY > 420),
);

/* items per page by breakpoint */
function itemsPerPage() {
  const w = window.innerWidth;
  if (w >= 1280) return 9;
  if (w >= 768) return 6;
  return 4;
}

function getFiltered() {
  let list = POSTS.filter((p) => {
    if (
      state.search &&
      !p.title.toLowerCase().includes(state.search.toLowerCase())
    )
      return false;
    if (state.cat && p.cat !== state.cat) return false;
    return true;
  });
  switch (state.sort) {
    case "oldest":
      list.sort((a, b) => new Date(a.date) - new Date(b.date));
      break;
    case "featured":
      list.sort((a, b) => b.featured - a.featured);
      break;
    case "views":
      list.sort((a, b) => b.views - a.views);
      break;
    default:
      list.sort((a, b) => new Date(b.date) - new Date(a.date));
  }
  return list;
}

const postGrid = document.getElementById("postGrid");
const resultCount = document.getElementById("resultCount");
const pagination = document.getElementById("pagination");

function showSkeleton(n = 6) {
  postGrid.innerHTML = Array.from({ length: n })
    .map(
      () => `
    <div class="skel-card"><div class="skel-img"></div>
      <div class="skel-body"><div class="skel-line w40"></div><div class="skel-line w100"></div><div class="skel-line w80"></div></div>
    </div>`,
    )
    .join("");
}

function renderPosts() {
  const list = getFiltered();
  resultCount.textContent = list.length;
  const perPage = itemsPerPage();
  const totalPages = Math.max(1, Math.ceil(list.length / perPage));
  if (state.page > totalPages) state.page = totalPages;
  if (!list.length) {
    postGrid.innerHTML = `<div class="empty-state">
      <svg width="66" height="66" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/><path d="M8 11h6"/></svg>
      <h4>Không tìm thấy bài viết</h4><p>Thử từ khóa hoặc danh mục khác.</p></div>`;
    pagination.innerHTML = "";
    return;
  }
  const start = (state.page - 1) * perPage;
  const shown = list.slice(start, start + perPage);
  postGrid.innerHTML = shown.map((p) => postCardHTML(p)).join("");
  requestAnimationFrame(() =>
    document
      .querySelectorAll(".post-card")
      .forEach((el, i) => setTimeout(() => el.classList.add("show"), i * 70)),
  );
  renderPagination(totalPages);
}

function postCardHTML(p) {
  return `<a class="post-card" href="#">
    <div class="post-img"><img src="${p.img}" alt="${p.title}" loading="lazy"></div>
    <div class="post-body">
      <div class="post-meta"><span>${catName(p.cat)}</span><span class="dot">•</span><span class="date">${fmtDate(p.date)}</span></div>
      <h3 class="post-title">${p.title}</h3>
      <p class="post-desc">${p.desc}</p>
      <span class="post-read">Đọc tiếp <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
    </div>
  </a>`;
}

function renderPagination(totalPages) {
  let html = `<button class="page-btn" id="prevPage" ${state.page === 1 ? "disabled" : ""}><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></button>`;
  for (let i = 1; i <= totalPages; i++) {
    html += `<button class="page-btn ${i === state.page ? "active" : ""}" data-page="${i}">${i}</button>`;
  }
  html += `<button class="page-btn" id="nextPage" ${state.page === totalPages ? "disabled" : ""}><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></button>`;
  pagination.innerHTML = html;
  pagination.querySelectorAll("[data-page]").forEach((b) =>
    b.addEventListener("click", () => {
      state.page = +b.dataset.page;
      renderPosts();
      window.scrollTo({
        top: document.getElementById("featured").offsetTop,
        behavior: "smooth",
      });
    }),
  );
  const prev = document.getElementById("prevPage"),
    next = document.getElementById("nextPage");
  if (prev)
    prev.addEventListener("click", () => {
      if (state.page > 1) {
        state.page--;
        renderPosts();
      }
    });
  if (next)
    next.addEventListener("click", () => {
      if (state.page < totalPages) {
        state.page++;
        renderPosts();
      }
    });
}

function applyFilters() {
  showSkeleton(6);
  setTimeout(renderPosts, 400);
}

let bpDeb;
window.addEventListener("resize", () => {
  clearTimeout(bpDeb);
  bpDeb = setTimeout(() => {
    state.page = 1;
    renderPosts();
  }, 250);
});

/* ================= SIDEBAR ================= */
function renderSidebar() {
  const trending = [...POSTS].sort((a, b) => b.views - a.views).slice(0, 4);
  const featuredList = POSTS.filter((p) => p.featured).slice(0, 4);
  const newest = [...POSTS]
    .sort((a, b) => new Date(b.date) - new Date(a.date))
    .slice(0, 4);
  const build = (arr) =>
    arr
      .map(
        (p, i) =>
          `<div class="side-post"><span class="num">0${i + 1}</span><img src="${p.img}" alt=""><div><h5>${p.title}</h5><span>${p.views.toLocaleString("vi-VN")} lượt xem</span></div></div>`,
      )
      .join("");
  document.getElementById("trendingList").innerHTML = build(trending);
  document.getElementById("featuredList").innerHTML = build(
    featuredList.length ? featuredList : POSTS.slice(0, 4),
  );
  document.getElementById("newestList").innerHTML = build(newest);
}
renderSidebar();

/* ================= INSTAGRAM GALLERY ================= */
const instaGrid = document.getElementById("instaGrid");
IMG_POOL.slice(0, 6).forEach((src, i) => {
  const item = document.createElement("div");
  item.className = "insta-item";
  item.setAttribute("data-aos", "zoom-in");
  item.setAttribute("data-aos-delay", i * 60);
  item.innerHTML = `<img src="${src.replace("w=900&h=600", "w=800&h=800")}" alt="Instagram ${i + 1}" loading="lazy"><div class="insta-overlay"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg></div>`;
  instaGrid.appendChild(item);
});

/* ================= NEWSLETTER ================= */
const nlForm = document.getElementById("nlForm");
const nlInput = document.getElementById("nlInput");
nlInput.addEventListener("focus", () => nlForm.classList.add("glow"));
nlInput.addEventListener("blur", () => nlForm.classList.remove("glow"));
document.getElementById("nlBtn").addEventListener("click", () => {
  if (nlInput.value.trim()) {
    showToast("Đăng ký nhận tin thành công!");
    nlInput.value = "";
  } else showToast("Vui lòng nhập email hợp lệ");
});

/* init */
showSkeleton(6);
setTimeout(renderPosts, 600);

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
const POSTS = wpPosts;
function fmtDate(d) {
  const [y, m, day] = d.split("-");
  return `${day} Th${+m}, ${y}`;
}

/* ================= state_blog ================= */
let state_blog = {
  search: "",
  cat: "Tất cả",
  tag: "Tất cả",
  sort: "newest",
  page: 1,
};

/* category pills */
const catPills = document.getElementById("catPills");

const categories = ["Tất cả", ...new Set(POSTS.map((post) => post.category))];

categories.forEach((category) => {
  const button = document.createElement("button");

  button.className = "pill-btn";

  if (category === "Tất cả") button.classList.add("active");

  button.textContent = category;

  button.addEventListener("click", () => {
    document
      .querySelectorAll(".pill-btn")
      .forEach((btn) => btn.classList.remove("active"));

    button.classList.add("active");

    state_blog.cat = category;

    state_blog.page = 1;

    applyFilters();
  });

  catPills.appendChild(button);
});
/* tag filter */
document.querySelectorAll(".tag-chip").forEach((btn) => {
  btn.addEventListener("click", () => {
    document
      .querySelectorAll(".tag-chip")
      .forEach((t) => t.classList.remove("active"));

    btn.classList.add("active");

    state_blog.tag = btn.dataset.tag;

    state_blog.page = 1;

    applyFilters();
  });
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
    state_blog.search = e.target.value;
    state_blog.page = 1;
    applyFilters();
  }, 250);
});
document.getElementById("sortSelect").addEventListener("change", (e) => {
  state_blog.sort = e.target.value;
  state_blog.page = 1;
  applyFilters();
});
window.addEventListener("scroll", () =>
  document
    .getElementById("toolbar")
    .classList.toggle("stuck", window.scrollY > 420),
);

/* items per page by breakpoint */
function itemsPerPage() {
  return 4;
}

function getFiltered() {
  let list = POSTS.filter((p) => {
    if (
      state_blog.search &&
      !p.title.toLowerCase().includes(state_blog.search.toLowerCase())
    ) {
      return false;
    }

    if (state_blog.cat !== "Tất cả" && p.category !== state_blog.cat) {
      return false;
    }

    if (state_blog.tag !== "Tất cả" && !p.tags.includes(state_blog.tag)) {
      return false;
    }

    return true;
  });

  switch (state_blog.sort) {
    case "oldest":
      list.sort((a, b) => new Date(a.date) - new Date(b.date));
      break;

    case "featured":
      list.sort((a, b) => (b.featured || 0) - (a.featured || 0));
      break;

    case "views":
      list.sort((a, b) => (b.views || 0) - (a.views || 0));
      break;

    default:
      list.sort((a, b) => new Date(b.date) - new Date(a.date));
      break;
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
  if (state_blog.page > totalPages) state_blog.page = totalPages;
  if (!list.length) {
    postGrid.innerHTML = `<div class="empty-state_blog">
      <svg width="66" height="66" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/><path d="M8 11h6"/></svg>
      <h4>Không tìm thấy bài viết</h4><p>Thử từ khóa hoặc danh mục khác.</p></div>`;
    pagination.innerHTML = "";
    return;
  }
  const start = (state_blog.page - 1) * perPage;
  const shown = list.slice(start, start + perPage);
  postGrid.innerHTML = shown.map((p) => postCardHTML(p)).join("");
  requestAnimationFrame(() =>
    document
      .querySelectorAll(".post-card")
      .forEach((el, i) => setTimeout(() => el.classList.add("show"), i * 70)),
  );
  renderPagination(totalPages);
}

function postCardHTML(post) {
  return `

<a class="post-card" href="${post.link}">

<div class="post-img">

<img
src="${post.thumbnail}"
alt="${post.title}"
loading="lazy">

</div>

<div class="post-body">

<div class="post-meta">

<span>${post.category}</span>

<span class="dot">•</span>

<span>${fmtDate(post.date)}</span>

</div>

<h3 class="post-title">

${post.title}

</h3>

<p class="post-desc">

${post.excerpt}

</p>

<span class="post-read">

Đọc tiếp →

</span>

</div>

</a>

`;
}

function renderPagination(totalPages) {
  let html = `<button class="page-btn" id="prevPage" ${state_blog.page === 1 ? "disabled" : ""}><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></button>`;
  for (let i = 1; i <= totalPages; i++) {
    html += `<button class="page-btn ${i === state_blog.page ? "active" : ""}" data-page="${i}">${i}</button>`;
  }
  html += `<button class="page-btn" id="nextPage" ${state_blog.page === totalPages ? "disabled" : ""}><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></button>`;
  pagination.innerHTML = html;
  pagination.querySelectorAll("[data-page]").forEach((b) =>
    b.addEventListener("click", () => {
      state_blog.page = +b.dataset.page;
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
      if (state_blog.page > 1) {
        state_blog.page--;
        renderPosts();
      }
    });
  if (next)
    next.addEventListener("click", () => {
      if (state_blog.page < totalPages) {
        state_blog.page++;
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
    state_blog.page = 1;
    renderPosts();
  }, 250);
});

/* ================= SIDEBAR ================= */
function renderSidebar() {
  const trending = [...POSTS].sort((a, b) => b.views - a.views).slice(0, 4);

  const featured = POSTS.filter((p) => p.featured).slice(0, 4);

  const newest = [...POSTS]
    .sort((a, b) => new Date(b.date) - new Date(a.date))
    .slice(0, 4);

  const build = (arr) =>
    arr
      .map(
        (p, i) => `
      <a class="side-post" href="${p.link}">
          <span class="num">0${i + 1}</span>

          <img src="${p.thumbnail}" alt="${p.title}">

          <div>
              <h5>${p.title}</h5>
              <span>${fmtDate(p.date)}</span>
          </div>

      </a>
    `,
      )
      .join("");

  trendingList.innerHTML = build(trending);

  featuredList.innerHTML = build(
    featured.length ? featured : POSTS.slice(0, 4),
  );

  newestList.innerHTML = build(newest);
}

renderSidebar();

/* ================= INSTAGRAM GALLERY ================= */
const instaGrid = document.getElementById("instaGrid");
// IMG_POOL.slice(0, 6).forEach((src, i) => {
//   const item = document.createElement("div");
//   item.className = "insta-item";
//   item.setAttribute("data-aos", "zoom-in");
//   item.setAttribute("data-aos-delay", i * 60);
//   item.innerHTML = `<img src="${src.replace("w=900&h=600", "w=800&h=800")}" alt="Instagram ${i + 1}" loading="lazy"><div class="insta-overlay"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg></div>`;
//   instaGrid.appendChild(item);
// });

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

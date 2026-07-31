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
function showToast(msg, isError) {
  const wrap = document.getElementById("toastWrap");
  const t = document.createElement("div");
  t.className = "toast" + (isError ? " error" : "");
  t.innerHTML = `<span class="tick"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">${isError ? '<path d="M18 6L6 18M6 6l12 12"/>' : '<path d="M20 6L9 17l-5-5"/>'}</svg></span><span>${msg}</span>`;
  wrap.appendChild(t);
  requestAnimationFrame(() => t.classList.add("show"));
  setTimeout(() => {
    t.classList.remove("show");
    setTimeout(() => t.remove(), 500);
  }, 3500);
}

/* ================= CONTACT FORM VALIDATION ================= */
const form = document.getElementById("contactForm");
const submitBtn = document.getElementById("submitBtn");
function setError(id, show) {
  document.getElementById(id).classList.toggle("error", show);
}
function validEmail(v) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
}
function validPhone(v) {
  return /^[0-9+\s]{9,13}$/.test(v);
}

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const name = form.name.value.trim();
  const email = form.email.value.trim();
  const phone = form.phone.value.trim();
  const message = form.message.value.trim();
  const agree = document.getElementById("agree").checked;
  let valid = true;
  setError("f-name", !name);
  if (!name) valid = false;
  setError("f-email", !validEmail(email));
  if (!validEmail(email)) valid = false;
  setError("f-phone", !validPhone(phone));
  if (!validPhone(phone)) valid = false;
  setError("f-message", !message);
  if (!message) valid = false;
  if (!agree) {
    showToast("Vui lòng đồng ý với chính sách bảo mật", true);
    valid = false;
  }
  if (!valid) return;

  submitBtn.classList.add("loading");
  submitBtn.disabled = true;
  setTimeout(() => {
    submitBtn.classList.remove("loading");
    submitBtn.disabled = false;
    showToast("Gửi liên hệ thành công! Chúng tôi sẽ phản hồi sớm nhất.");
    form.reset();
  }, 1400);
});
/* realtime clear error */
["name", "email", "phone", "message"].forEach((f) => {
  form[f].addEventListener("input", () => setError("f-" + f, false));
});

/* ================= BOOKING FORM ================= */
document.querySelectorAll(".svc-pill").forEach((p) =>
  p.addEventListener("click", () => {
    document
      .querySelectorAll(".svc-pill")
      .forEach((x) => x.classList.remove("sel"));
    p.classList.add("sel");
  }),
);
document.getElementById("bookingForm").addEventListener("submit", (e) => {
  e.preventDefault();
  showToast("Đặt lịch tư vấn thành công! Chúng tôi sẽ gọi xác nhận sớm.");
  e.target.reset();
});

/* ================= SHOWROOM & MAP ================= */
const SHOWROOMS = [
  {
    id: 1,
    city: "Hồ Chí Minh",
    name: "Showroom Quận 1",
    address: "123 Nguyễn Huệ, Quận 1",
    phone: "0900 000 000",
    time: "08:00 - 21:00",
    q: "Nguyen+Hue+District+1+Ho+Chi+Minh+City",
  },
  {
    id: 2,
    city: "Hà Nội",
    name: "Showroom Cầu Giấy",
    address: "456 Trần Duy Hưng, Cầu Giấy",
    phone: "0900 000 001",
    time: "08:00 - 21:00",
    q: "Tran+Duy+Hung+Cau+Giay+Ha+Noi",
  },
  {
    id: 3,
    city: "Đà Nẵng",
    name: "Showroom Hải Châu",
    address: "789 Nguyễn Văn Linh, Hải Châu",
    phone: "0900 000 002",
    time: "08:00 - 21:00",
    q: "Nguyen+Van+Linh+Hai+Chau+Da+Nang",
  },
];
const cities = [...new Set(SHOWROOMS.map((s) => s.city))];
const srTabs = document.getElementById("srTabs");
const srCards = document.getElementById("srCards");
let activeCity = cities[0];
function renderTabs() {
  srTabs.innerHTML = cities
    .map(
      (c) =>
        `<div class="sr-tab ${c === activeCity ? "active" : ""}" data-city="${c}">${c}</div>`,
    )
    .join("");
  srTabs.querySelectorAll(".sr-tab").forEach((t) =>
    t.addEventListener("click", () => {
      activeCity = t.dataset.city;
      renderTabs();
      renderCards();
    }),
  );
}
function renderCards() {
  const list = SHOWROOMS.filter((s) => s.city === activeCity);
  srCards.innerHTML = list
    .map(
      (s) => `
    <div class="sr-card" data-q="${s.q}">
      <h4>${s.name}</h4><p>${s.address}</p><p>${s.phone} · ${s.time}</p>
      <a class="directions" href="https://www.google.com/maps?q=${s.q}" target="_blank" rel="noopener">Xem đường <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
    </div>`,
    )
    .join("");
  srCards.querySelectorAll(".sr-card").forEach((c) =>
    c.addEventListener("click", (e) => {
      if (e.target.closest(".directions")) return;
      document.getElementById("srMapFrame").src =
        `https://www.google.com/maps?q=${c.dataset.q}&output=embed`;
    }),
  );
  if (list.length)
    document.getElementById("srMapFrame").src =
      `https://www.google.com/maps?q=${list[0].q}&output=embed`;
}
renderTabs();
renderCards();

/* ================= SUPPORT TIMELINE DRAW ================= */
const stObs = new IntersectionObserver(
  (entries) => {
    entries.forEach((en) => {
      if (en.isIntersecting) {
        const isMobile = window.innerWidth <= 800;
        document.getElementById("stFill").style[isMobile ? "height" : "width"] =
          "100%";
        document
          .querySelectorAll(".st-step")
          .forEach((s, i) =>
            setTimeout(() => s.classList.add("active"), i * 220),
          );
        stObs.disconnect();
      }
    });
  },
  { threshold: 0.3 },
);
stObs.observe(document.getElementById("stLine"));

/* ================= FAQ ================= */
const FAQS = [
  {
    q: "Làm sao để đặt hàng?",
    a: "Bạn có thể đặt hàng trực tiếp trên website tại trang Sản phẩm, hoặc liên hệ hotline/Zalo để được tư vấn và đặt hàng nhanh chóng.",
  },
  {
    q: "Có hỗ trợ thiết kế nội thất không?",
    a: "MỘC có đội ngũ thiết kế chuyên nghiệp, hỗ trợ tư vấn miễn phí và thiết kế theo yêu cầu riêng cho không gian của bạn.",
  },
  {
    q: "Chính sách bảo hành như thế nào?",
    a: "Tất cả sản phẩm được bảo hành chính hãng từ 12–24 tháng tùy dòng sản phẩm, bao gồm lỗi kỹ thuật và cấu trúc.",
  },
  {
    q: "Có giao hàng toàn quốc không?",
    a: "MỘC giao hàng toàn quốc thông qua hệ thống đối tác vận chuyển uy tín, đóng gói cẩn thận cho nội thất cồng kềnh.",
  },
  {
    q: "Thời gian hoàn thành đơn hàng bao lâu?",
    a: "Với sản phẩm có sẵn từ 3–7 ngày; với đơn đặt riêng theo yêu cầu, thời gian sản xuất khoảng 3–4 tuần.",
  },
];
const faqWrap = document.getElementById("faqWrap");
FAQS.forEach((f, i) => {
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

/* ================= FLOATING CONTACT HUB ================= */
const fabWrap = document.getElementById("fabWrap");
document
  .getElementById("fabMain")
  .addEventListener("click", () => fabWrap.classList.toggle("open"));
document
  .getElementById("fabChat")
  .addEventListener("click", () =>
    showToast("Live Chat sẽ sớm ra mắt — vui lòng dùng Hotline hoặc Zalo!"),
  );
document.addEventListener("click", (e) => {
  if (!fabWrap.contains(e.target)) fabWrap.classList.remove("open");
});

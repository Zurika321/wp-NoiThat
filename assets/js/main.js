const backTop = document.getElementById("backTop") ?? null;
const navLinksEls = document.querySelectorAll(".nav-link");

window.addEventListener("scroll", () => {
  // navbar.classList.toggle("scrolled", window.scrollY > 80);
  backTop?.classList.toggle("show", window.scrollY > 500);
});

backTop?.addEventListener("click", () =>
  window.scrollTo({ top: 0, behavior: "smooth" }),
);

/* Mobile menu */
const navToggle = document.getElementById("navToggle");
const navLinks = document.getElementById("navLinks");
navToggle.addEventListener("click", () => navLinks.classList.toggle("open"));
navLinksEls.forEach((l) =>
  l.addEventListener("click", () => navLinks.classList.remove("open")),
);
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

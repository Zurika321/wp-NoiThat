setTimeout(() => {
  navbar.classList.add("in");
}, 500);
/* ================= NAVBAR SCROLL + SCROLLSPY ================= */

window.addEventListener("scroll", () => {
  navbar.classList.toggle("scrolled", window.scrollY > 80);
  // backTop.classList.toggle("show", window.scrollY > 500);
});

// backTop.addEventListener("click", () =>
//   window.scrollTo({ top: 0, behavior: "smooth" }),
// );
/* ============ ICONS ============ */
function furnitureIcon(type){
  const paths = {
    sofa: '<rect x="8" y="24" width="48" height="16" rx="5"/><rect x="8" y="15" width="48" height="14" rx="7"/><rect x="4" y="24" width="9" height="22" rx="3"/><rect x="51" y="24" width="9" height="22" rx="3"/><line x1="12" y1="46" x2="12" y2="52"/><line x1="52" y1="46" x2="52" y2="52"/>',
    chair: '<path d="M18 10h20v16H18z"/><rect x="14" y="26" width="28" height="9" rx="2"/><line x1="17" y1="35" x2="15" y2="54"/><line x1="39" y1="35" x2="41" y2="54"/>',
    table: '<rect x="6" y="16" width="44" height="7" rx="2"/><line x1="12" y1="23" x2="12" y2="50"/><line x1="44" y1="23" x2="44" y2="50"/><line x1="12" y1="36" x2="44" y2="36" stroke-dasharray="3 3"/>',
    cabinet: '<rect x="6" y="14" width="44" height="30" rx="3"/><line x1="28" y1="14" x2="28" y2="44"/><circle cx="22" cy="29" r="1.4" fill="currentColor" stroke="none"/><circle cx="34" cy="29" r="1.4" fill="currentColor" stroke="none"/><line x1="12" y1="44" x2="12" y2="50"/><line x1="44" y1="44" x2="44" y2="50"/>',
    shelf: '<rect x="10" y="8" width="36" height="46" rx="2"/><line x1="10" y1="21" x2="46" y2="21"/><line x1="10" y1="34" x2="46" y2="34"/><line x1="10" y1="47" x2="46" y2="47"/>',
    bed: '<rect x="6" y="24" width="44" height="16" rx="3"/><rect x="6" y="14" width="10" height="26" rx="3"/><line x1="10" y1="40" x2="10" y2="50"/><line x1="46" y1="40" x2="46" y2="50"/>',
    wardrobe: '<rect x="12" y="6" width="32" height="48" rx="3"/><line x1="28" y1="6" x2="28" y2="54"/><circle cx="24" cy="30" r="1.5" fill="currentColor" stroke="none"/><circle cx="32" cy="30" r="1.5" fill="currentColor" stroke="none"/>',
    lamp: '<path d="M18 20 L38 20 L32 4 L24 4 Z"/><line x1="28" y1="20" x2="28" y2="46"/><line x1="18" y1="54" x2="38" y2="54"/><line x1="28" y1="46" x2="20" y2="54"/><line x1="28" y1="46" x2="36" y2="54"/>',
    rug: '<rect x="6" y="14" width="44" height="30" rx="4"/><rect x="12" y="20" width="32" height="18" rx="2" stroke-dasharray="2 2"/>'
  };
  return `<svg width="42" height="42" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">${paths[type]||paths.sofa}</svg>`;
}
const iconCheck = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>';

/* ============ DATA ============ */
const PRODUCTS = [
  {id:'p1', name:'Sofa Milan Premium', cat:'sofa', color:'Nâu Caramel', hex:'#8A5A34', size:'220×90×85cm', price:18900000},
  {id:'p2', name:'Sofa Scandinavian', cat:'sofa', color:'Xám Than', hex:'#4B4B4B', size:'200×85×80cm', price:15500000},
  {id:'p3', name:'Ghế Lounge Nordic', cat:'chair', color:'Be Sữa', hex:'#E7DCC5', size:'75×80×95cm', price:4290000},
  {id:'p4', name:'Ghế Accent Velvet', cat:'chair', color:'Xanh Rêu', hex:'#4F5D45', size:'68×70×88cm', price:3590000},
  {id:'p5', name:'Bàn trà Modern Oak', cat:'table', color:'Gỗ Sồi', hex:'#B98A57', size:'100×55×40cm', price:3200000},
  {id:'p6', name:'Bàn ăn Osaka', cat:'table', color:'Gỗ Óc Chó', hex:'#5C3A26', size:'160×90×75cm', price:9800000},
  {id:'p7', name:'Tủ TV Kyoto', cat:'cabinet', color:'Trắng Vân Gỗ', hex:'#EDE8DC', size:'180×40×45cm', price:6450000},
  {id:'p8', name:'Kệ sách Nordic', cat:'shelf', color:'Gỗ Tần Bì', hex:'#C9A876', size:'90×30×180cm', price:4850000},
  {id:'p9', name:'Giường Queen Minimal', cat:'bed', color:'Xám Nhạt', hex:'#C9C4B8', size:'160×200×35cm', price:12900000},
  {id:'p10', name:'Tủ quần áo Premium', cat:'wardrobe', color:'Trắng Ngà', hex:'#F0EAD9', size:'150×60×220cm', price:14200000},
  {id:'p11', name:'Đèn thả trần Aurora', cat:'lamp', color:'Đồng Antique', hex:'#8C6A3F', size:'Ø35×60cm', price:1890000},
  {id:'p12', name:'Thảm phòng khách Linen', cat:'rug', color:'Kem Tự Nhiên', hex:'#E3D9C2', size:'160×230cm', price:2450000},
];
const byId = id => PRODUCTS.find(p=>p.id===id);

let cart = [
  {pid:'p1', qty:1, selected:true},
  {pid:'p3', qty:2, selected:true},
  {pid:'p5', qty:1, selected:true},
  {pid:'p7', qty:1, selected:false},
  {pid:'p11', qty:2, selected:true},
];
let coupon = null;
const cartPids = new Set(cart.map(c=>c.pid));
const suggested = PRODUCTS.filter(p=>!cartPids.has(p.id)).slice(0,4);

const ORDERS = [
  {code:'HD000254', date:'17/07/2026', status:'unpaid', label:'Chưa thanh toán',
    items:[{pid:'p2',qty:1},{pid:'p8',qty:1}], deadline: Date.now()+1000*60*47+16000},
  {code:'HD000251', date:'15/07/2026', status:'paid', label:'Đã thanh toán',
    items:[{pid:'p6',qty:1}]},
  {code:'HD000248', date:'14/07/2026', status:'preparing', label:'Đang chuẩn bị',
    items:[{pid:'p9',qty:1},{pid:'p12',qty:1}]},
  {code:'HD000245', date:'12/07/2026', status:'shipping', label:'Đang giao',
    items:[{pid:'p4',qty:2}], shipper:'Nguyễn Văn A', progress:70},
  {code:'HD000239', date:'08/07/2026', status:'delivered', label:'Đã giao',
    items:[{pid:'p10',qty:1}]},
  {code:'HD000230', date:'28/06/2026', status:'completed', label:'Hoàn thành',
    items:[{pid:'p1',qty:1},{pid:'p5',qty:1}]},
  {code:'HD000221', date:'20/06/2026', status:'cancelled', label:'Đã hủy',
    items:[{pid:'p3',qty:1}], reason:'Người mua đổi ý và hủy đơn trước khi giao hàng.'},
  {code:'HD000214', date:'12/06/2026', status:'returning', label:'Đổi trả',
    items:[{pid:'p7',qty:1}], returnStep:1},
  {code:'HD000209', date:'02/06/2026', status:'review', label:'Chờ đánh giá',
    items:[{pid:'p11',qty:1}]},
];

const STATUS_META = {
  unpaid:{cls:'st-unpaid'}, paid:{cls:'st-paid'}, preparing:{cls:'st-preparing', pulse:true},
  shipping:{cls:'st-shipping', pulse:true}, delivered:{cls:'st-delivered'}, completed:{cls:'st-completed'},
  cancelled:{cls:'st-cancelled'}, returning:{cls:'st-returning'}, review:{cls:'st-review'}
};

const SUBTABS = [
  {key:'all', label:'Tất cả'},
  {key:'unpaid', label:'Chưa thanh toán'},
  {key:'paid', label:'Đã thanh toán'},
  {key:'preparing', label:'Đang chuẩn bị'},
  {key:'shipping', label:'Đang giao'},
  {key:'delivered', label:'Đã giao'},
  {key:'completed', label:'Hoàn thành'},
  {key:'cancelled', label:'Đã hủy'},
  {key:'returning', label:'Đổi trả'},
  {key:'review', label:'Đánh giá'},
];

/* ============ STATE ============ */
let state = {
  tab: 'cart',
  ordersLoaded: false,
  cartLoaded: false,
  subtab: 'all',
  search: '',
};
const fmt = n => n.toLocaleString('vi-VN')+'₫';

/* ============ TOASTS ============ */
function toast(msg){
  const stack = document.getElementById('toast-stack');
  const el = document.createElement('div');
  el.className='toast';
  el.innerHTML = `<span class="tick">${iconCheck}</span><span>${msg}</span>`;
  stack.appendChild(el);
  setTimeout(()=>{ el.classList.add('hide'); setTimeout(()=>el.remove(),320); }, 2600);
}
function rippleAndToast(e, msg){
  spawnRipple(e);
  setTimeout(()=>toast(msg), 120);
}
function spawnRipple(e){
  const btn = e.currentTarget;
  const rect = btn.getBoundingClientRect();
  const size = Math.max(rect.width, rect.height)*1.4;
  const r = document.createElement('span');
  r.className='ripple';
  r.style.width=r.style.height=size+'px';
  r.style.left=(e.clientX-rect.left-size/2)+'px';
  r.style.top=(e.clientY-rect.top-size/2)+'px';
  const prevPos = getComputedStyle(btn).position;
  if(prevPos==='static') btn.style.position='relative';
  btn.style.overflow='hidden';
  btn.appendChild(r);
  setTimeout(()=>r.remove(),600);
}

/* ============ MAIN TAB SWITCH ============ */
function moveIndicator(){
  const active = document.querySelector('.maintab-btn.active');
  const ind = document.getElementById('maintab-indicator');
  if(!active) return;
  ind.style.left = active.offsetLeft+'px';
  ind.style.width = active.offsetWidth+'px';
}
document.getElementById('maintabs').addEventListener('click', e=>{
  const btn = e.target.closest('.maintab-btn');
  if(!btn) return;
  const tab = btn.dataset.tab;
  if(tab===state.tab) return;
  document.querySelectorAll('.maintab-btn').forEach(b=>b.classList.toggle('active', b===btn));
  moveIndicator();
  switchPanel(tab);
});
function switchPanel(tab){
  const vp = document.getElementById('panel-viewport');
  const current = vp.querySelector('.panel');
  state.tab = tab;
  if(current){
    current.classList.add('leaving');
    setTimeout(()=>{ render(); }, 180);
  } else {
    render();
  }
}

/* ============ RENDER ROOT ============ */
function render(){
  const vp = document.getElementById('panel-viewport');
  vp.innerHTML = `<div class="panel">${ state.tab==='cart' ? renderCartTab() : renderOrdersTab() }</div>`;
  if(state.tab==='cart'){
    if(!state.cartLoaded){
      setTimeout(()=>{ state.cartLoaded=true; render(); }, 900);
    } else {
      updateCheckoutBar();
    }
    document.getElementById('checkout-bar').classList.toggle('show', state.cartLoaded && cart.length>0);
  } else {
    document.getElementById('checkout-bar').classList.remove('show');
    if(!state.ordersLoaded){
      setTimeout(()=>{ state.ordersLoaded=true; render(); }, 900);
    } else {
      startCountdowns();
    }
  }
}

/* ============ CART TAB ============ */
function skeletonCards(n, thumbH){
  let out='';
  for(let i=0;i<n;i++){
    out += `<div class="sk-card"><div class="sk-block sk-thumb" style="height:${thumbH||104}px"></div>
      <div class="sk-lines"><div class="sk-line" style="width:60%"></div><div class="sk-line" style="width:35%"></div><div class="sk-line" style="width:80%"></div></div></div>`;
  }
  return `<div class="skeleton-wrap">${out}</div>`;
}

function renderCartTab(){
  if(!state.cartLoaded){
    return `<div class="section-head"><h2>Giỏ hàng của bạn</h2></div>${skeletonCards(4)}`;
  }
  if(cart.length===0){
    return `<div class="section-head"><h2>Giỏ hàng của bạn</h2></div>${emptyState('cart')}`;
  }
  const totalQty = cart.reduce((s,c)=>s+c.qty,0);
  const rows = cart.map(c=>{
    const p = byId(c.pid);
    return `<div class="cart-card" id="cc-${c.pid}">
      <div class="chk ${c.selected?'checked':''}" onclick="toggleItem('${c.pid}')">${iconCheck}</div>
      <div class="thumb" style="color:${p.hex}" onclick="toast('${p.name}')">${furnitureIcon(p.cat)}<span class="dim-label">${p.size}</span></div>
      <div class="item-body">
        <div class="item-top">
          <div>
            <p class="item-name">${p.name}</p>
            <div class="item-specs">
              <span class="spec-chip"><span class="swatch" style="background:${p.hex}"></span>${p.color}</span>
              <span class="spec-chip">${p.size}</span>
            </div>
          </div>
          <button class="remove-x" onclick="removeItem('${c.pid}')" title="Xóa">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
          </button>
        </div>
        <div class="item-bottom">
          <div class="qty-stepper">
            <button onclick="changeQty('${c.pid}',-1)">−</button>
            <span class="qty-val" id="qv-${c.pid}">${c.qty}</span>
            <button onclick="changeQty('${c.pid}',1)">+</button>
          </div>
          <div class="price-block">
            <span class="unit-price">${fmt(p.price)} / sp</span>
            <span class="subtotal mono" id="sub-${c.pid}">${fmt(p.price*c.qty)}</span>
          </div>
        </div>
      </div>
    </div>`;
  }).join('');

  const suggestCards = suggested.map(p=>`
    <div class="sg-card">
      <div class="sg-thumb" style="color:${p.hex}">${furnitureIcon(p.cat)}</div>
      <div class="sg-body">
        <p class="sg-name">${p.name}</p>
        <div class="sg-bottom">
          <span class="sg-price mono">${fmt(p.price)}</span>
          <button class="sg-add" onclick="addSuggested(event,'${p.id}')">+</button>
        </div>
      </div>
    </div>`).join('');

  return `
    <div class="section-head">
      <h2>Giỏ hàng của bạn <span class="count">${totalQty} sản phẩm</span></h2>
      <div class="head-actions">
        <button class="link-btn select-all" onclick="toggleSelectAll()">Chọn tất cả</button>
        <button class="link-btn" onclick="removeSelected()">Xóa đã chọn</button>
      </div>
    </div>
    <div class="cart-list">${rows}</div>

    <div class="coupon-card">
      <div class="coupon-icon">🎁</div>
      <div>
        <p class="coupon-title">Mã giảm giá</p>
        <p class="coupon-sub">Thử GIAM10, FREESHIP hoặc WELCOME50</p>
      </div>
      ${ coupon
        ? `<div class="coupon-applied" style="margin-left:auto">${iconCheck} Đã áp dụng "${coupon}"</div>`
        : `<div class="coupon-form">
            <input class="coupon-input" id="coupon-input" placeholder="Nhập mã giảm giá" maxlength="20">
            <button class="btn-apply" onclick="applyCoupon(event)">Áp dụng</button>
          </div>`
      }
    </div>

    <div class="suggest-wrap">
      <h3>Bạn có thể thích</h3>
      <p class="sub">Gợi ý dựa trên phong cách trong giỏ hàng của bạn</p>
      <div class="suggest-slider">${suggestCards}</div>
    </div>
  `;
}

function toggleItem(pid){
  const it = cart.find(c=>c.pid===pid); it.selected=!it.selected;
  document.getElementById(`cc-${pid}`).querySelector('.chk').classList.toggle('checked', it.selected);
  updateCheckoutBar();
}
function toggleSelectAll(){
  const allSel = cart.every(c=>c.selected);
  cart.forEach(c=>c.selected=!allSel);
  render();
}
function changeQty(pid, delta){
  const it = cart.find(c=>c.pid===pid);
  it.qty = Math.max(1, it.qty+delta);
  const p = byId(pid);
  document.getElementById(`qv-${pid}`).textContent = it.qty;
  const qv = document.getElementById(`qv-${pid}`); qv.classList.remove('bump'); void qv.offsetWidth; qv.classList.add('bump');
  document.getElementById(`sub-${pid}`).textContent = fmt(p.price*it.qty);
  updateCheckoutBar();
}
function removeItem(pid){
  const el = document.getElementById(`cc-${pid}`);
  el.classList.add('removing');
  toast('Đã xóa sản phẩm khỏi giỏ hàng');
  setTimeout(()=>{
    cart = cart.filter(c=>c.pid!==pid);
    render();
  }, 320);
}
function removeSelected(){
  const n = cart.filter(c=>c.selected).length;
  if(n===0){ toast('Chưa chọn sản phẩm nào'); return; }
  cart.filter(c=>c.selected).forEach(c=>{
    const el = document.getElementById(`cc-${c.pid}`);
    if(el) el.classList.add('removing');
  });
  toast(`Đã xóa ${n} sản phẩm`);
  setTimeout(()=>{
    cart = cart.filter(c=>!c.selected);
    render();
  }, 320);
}
function addSuggested(e, pid){
  spawnRipple(e);
  if(cart.find(c=>c.pid===pid)){ toast('Sản phẩm đã có trong giỏ'); return; }
  cart.push({pid, qty:1, selected:true});
  toast('Đã thêm vào giỏ hàng');
  render();
}
function applyCoupon(e){
  const input = document.getElementById('coupon-input');
  const val = input.value.trim().toUpperCase();
  const valid = ['GIAM10','FREESHIP','WELCOME50'];
  if(!val){ toast('Vui lòng nhập mã giảm giá'); return; }
  if(!valid.includes(val)){ toast('Mã giảm giá không hợp lệ'); input.style.borderColor='var(--danger)'; setTimeout(()=>input.style.borderColor='',900); return; }
  coupon = val;
  toast(`Áp dụng mã "${val}" thành công`);
  render();
}
function updateCheckoutBar(){
  const sel = cart.filter(c=>c.selected);
  const qty = sel.reduce((s,c)=>s+c.qty,0);
  const total = sel.reduce((s,c)=>s+byId(c.pid).price*c.qty,0);
  const countEl = document.getElementById('sticky-count');
  const totalEl = document.getElementById('sticky-total');
  if(countEl) countEl.textContent = qty;
  if(totalEl) animateCount(totalEl, total);
  const allChk = document.getElementById('chk-all-sticky');
  if(allChk) allChk.classList.toggle('checked', cart.length>0 && cart.every(c=>c.selected));
}
function animateCount(el, target){
  const start = parseInt((el.dataset.raw||'0'));
  const dur = 500, t0 = performance.now();
  function step(t){
    const p = Math.min(1,(t-t0)/dur);
    const eased = 1-Math.pow(1-p,3);
    const val = Math.round(start + (target-start)*eased);
    el.textContent = fmt(val);
    if(p<1) requestAnimationFrame(step); else el.dataset.raw=target;
  }
  requestAnimationFrame(step);
}

/* ============ ORDERS TAB ============ */
function renderOrdersTab(){
  const pillsHtml = SUBTABS.map(s=>`<button class="pill ${state.subtab===s.key?'active':''}" data-key="${s.key}" onclick="setSubtab('${s.key}')">${s.label}</button>`).join('');
  const body = !state.ordersLoaded ? skeletonCards(3, 60) : renderOrdersList();
  return `
    <div class="section-head"><h2>Đơn hàng của tôi</h2></div>
    <div class="orders-toolbar">
      <div class="search-box">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input placeholder="Nhập mã đơn, ví dụ HD000254" oninput="onSearch(this.value)" value="${state.search}">
      </div>
      <button class="filter-btn" onclick="toast('Bộ lọc nâng cao')">Lọc <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></button>
    </div>
    <div class="subtabs-wrap"><div class="subtabs">${pillsHtml}</div></div>
    <div class="orders-list" id="orders-list">${body}</div>
  `;
}
function setSubtab(key){
  state.subtab = key;
  document.querySelectorAll('.pill').forEach(p=>p.classList.toggle('active', p.dataset.key===key));
  document.getElementById('orders-list').innerHTML = renderOrdersList();
  startCountdowns();
}
function onSearch(v){ state.search=v; document.getElementById('orders-list').innerHTML = renderOrdersList(); startCountdowns(); }

function filteredOrders(){
  return ORDERS.filter(o=>{
    const matchTab = state.subtab==='all' || o.status===state.subtab;
    const matchSearch = !state.search || o.code.toLowerCase().includes(state.search.toLowerCase());
    return matchTab && matchSearch;
  });
}
function renderOrdersList(){
  const list = filteredOrders();
  if(list.length===0) return emptyState('orders');
  return list.map(renderOrderCard).join('');
}

function orderItemsHtml(o){
  return o.items.map(it=>{
    const p = byId(it.pid);
    return `<div class="order-item-row">
      <div class="oi-thumb" style="color:${p.hex}">${furnitureIcon(p.cat)}</div>
      <span class="oi-name">${p.name}</span>
      <span class="oi-qty">×${it.qty}</span>
      <span class="oi-price">${fmt(p.price*it.qty)}</span>
    </div>`;
  }).join('');
}
function orderTotal(o){ return o.items.reduce((s,it)=>s+byId(it.pid).price*it.qty,0); }

function renderOrderCard(o){
  const meta = STATUS_META[o.status];
  let extra = '';
  let actions = '';

  if(o.status==='unpaid'){
    extra = `<div class="countdown-card">
      <div class="cd-left"><p class="cd-t">Thanh toán trước khi hết giờ</p><p class="cd-s">Đơn sẽ tự động hủy sau thời gian trên</p></div>
      <div class="cd-timer" data-deadline="${o.deadline}" id="cd-${o.code}">--:--:--</div>
    </div>`;
    actions = `<button class="btn-solid btn-rust" onclick="rippleAndToast(event,'Đang chuyển đến cổng thanh toán…')">Thanh toán ngay</button>`;
  } else if(o.status==='paid'){
    actions = `<button class="btn-outline" onclick="rippleAndToast(event,'Đang mở hóa đơn')">Xem hóa đơn</button>`;
  } else if(o.status==='preparing'){
    extra = `<div class="prep-box"><div class="prep-icon">📦</div><p class="prep-text">Đang đóng gói<span class="dot-typing"></span></p></div>`;
  } else if(o.status==='shipping'){
    extra = `<div class="ship-card">
      <div class="ship-top"><div class="ship-avatar">🚚</div><div><p class="ship-name">${o.shipper}</p><p class="ship-status">Đang tới, dự kiến 2–5 ngày</p></div></div>
      <div class="progress-track"><div class="progress-fill" id="pf-${o.code}" style="width:0%"></div></div>
      <div class="progress-pct">${o.progress}%</div>
    </div>`;
    actions = `<button class="btn-outline" onclick="rippleAndToast(event,'Đang mở bản đồ theo dõi')">Theo dõi</button>`;
  } else if(o.status==='delivered'){
    extra = `<div style="display:flex;align-items:center;gap:8px;color:var(--accent);font-weight:600;font-size:13.5px;">✔ Đã giao thành công</div>`;
    actions = `<button class="btn-outline" onclick="rippleAndToast(event,'Đã thêm lại vào giỏ hàng')">Mua lại</button>`;
  } else if(o.status==='completed'){
    extra = `<div style="display:flex;align-items:center;gap:8px;color:var(--accent-ink);font-weight:600;font-size:13.5px;">✔ Hoàn tất</div>`;
    actions = `<button class="btn-outline" onclick="rippleAndToast(event,'Đã thêm lại vào giỏ hàng')">Mua lại</button><button class="btn-solid" onclick="rippleAndToast(event,'Mở form đánh giá')">Đánh giá</button>`;
  } else if(o.status==='cancelled'){
    extra = `<div class="cancel-box">❌<p><b>Lý do hủy:</b> ${o.reason}</p></div>`;
  } else if(o.status==='returning'){
    const steps = ['Đã gửi yêu cầu','Shop xác nhận','Hoàn tiền'];
    extra = `<div class="return-steps">${steps.map((s,i)=>`
      <div class="rs-step ${i<=o.returnStep?'done':''}">
        ${i<steps.length-1?'<div class="rs-line"></div>':''}
        <div class="rs-dot"></div><div class="rs-label">${s}</div>
      </div>`).join('')}</div>`;
  } else if(o.status==='review'){
    const p = byId(o.items[0].pid);
    extra = `<div class="review-form">
      <div class="review-product"><div class="oi-thumb" style="color:${p.hex}">${furnitureIcon(p.cat)}</div><span class="oi-name">${p.name}</span></div>
      <div class="stars" id="stars-${o.code}">${[1,2,3,4,5].map(n=>`<span class="star" data-n="${n}" onclick="setStars('${o.code}',${n})">★</span>`).join('')}</div>
      <textarea class="review-textarea" placeholder="Chia sẻ cảm nhận của bạn về sản phẩm này..."></textarea>
      <div class="review-actions">
        <button class="upload-btn">+ Thêm ảnh</button>
        <button class="btn-solid" onclick="rippleAndToast(event,'Đăng đánh giá thành công')">Đăng</button>
      </div>
    </div>`;
  }

  return `<div class="order-card">
    <div class="order-head">
      <div class="order-meta">
        <div class="meta-item"><div class="k">Mã đơn</div><div class="v code mono">#${o.code}</div></div>
        <div class="meta-item"><div class="k">Ngày</div><div class="v">${o.date}</div></div>
      </div>
      <span class="status-badge ${meta.cls} ${meta.pulse?'pulse':''}"><span class="status-dot"></span>${o.label}</span>
    </div>
    <div class="order-items">${orderItemsHtml(o)}</div>
    <div class="order-total-row"><span class="lbl">Tổng tiền</span><span class="val mono">${fmt(orderTotal(o))}</span></div>
    ${extra?`<div class="order-extra">${extra}</div>`:''}
    <div class="order-actions">
      <button class="btn-outline" onclick='openOrderModal(${JSON.stringify(o.code)})'>Xem chi tiết</button>
      ${actions}
    </div>
  </div>`;
}

function setStars(code, n){
  const wrap = document.getElementById(`stars-${code}`);
  [...wrap.children].forEach(s=>s.classList.toggle('filled', +s.dataset.n<=n));
}

/* countdown timers */
let countdownInterval = null;
function startCountdowns(){
  if(countdownInterval) clearInterval(countdownInterval);
  const tick = ()=>{
    document.querySelectorAll('[id^="cd-"]').forEach(el=>{
      const deadline = +el.dataset.deadline;
      let diff = Math.max(0, deadline-Date.now());
      const h = String(Math.floor(diff/3600000)).padStart(2,'0');
      const m = String(Math.floor((diff%3600000)/60000)).padStart(2,'0');
      const s = String(Math.floor((diff%60000)/1000)).padStart(2,'0');
      el.textContent = `${h}:${m}:${s}`;
    });
  };
  tick();
  countdownInterval = setInterval(tick, 1000);
  // animate shipping progress bars in
  setTimeout(()=>{
    document.querySelectorAll('[id^="pf-"]').forEach(el=>{
      const o = ORDERS.find(x=>`pf-${x.code}`===el.id);
      if(o) el.style.width = o.progress+'%';
    });
  }, 80);
}

/* ============ EMPTY STATE ============ */
function emptyState(kind){
  if(kind==='cart'){
    return `<div class="empty-state">
      <div class="empty-illustration">${furnitureIcon('sofa')}</div>
      <h3>Giỏ hàng của bạn đang trống</h3>
      <p>Hãy khám phá các món nội thất được tuyển chọn để lấp đầy không gian sống của bạn.</p>
      <button class="btn-solid" onclick="toast('Đang chuyển đến trang mua sắm')">Mua ngay</button>
    </div>`;
  }
  return `<div class="empty-state">
    <div class="empty-illustration"><svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 7h18l-1.5 12.5a2 2 0 01-2 1.5H6.5a2 2 0 01-2-1.5L3 7z"/><path d="M8 7V5a4 4 0 018 0v2"/></svg></div>
    <h3>Bạn chưa có đơn hàng nào</h3>
    <p>Các đơn hàng ở trạng thái này sẽ xuất hiện tại đây.</p>
    <button class="btn-solid" onclick="toast('Đang chuyển đến trang mua sắm')">Mua ngay</button>
  </div>`;
}

/* ============ MODAL ============ */
function openOrderModal(code){
  const o = ORDERS.find(x=>x.code===code);
  const overlay = document.getElementById('modal-overlay');
  const box = document.getElementById('modal-box');
  const stepsAll = [
    {key:'placed', title:'Đặt hàng', time:o.date},
    {key:'confirmed', title:'Đã xác nhận', time:o.date},
    {key:'packed', title:'Đóng gói', time:o.date},
    {key:'shipping', title:'Đang giao', time:'—'},
    {key:'received', title:'Đã nhận', time:'—'},
  ];
  const statusOrder = ['unpaid','paid','preparing','shipping','delivered'];
  let doneUpto = statusOrder.indexOf(o.status);
  if(o.status==='completed') doneUpto = 4;
  if(o.status==='cancelled' || o.status==='returning' || o.status==='review') doneUpto = o.status==='cancelled'? 1 : 4;

  const timelineHtml = stepsAll.map((s,i)=>{
    const done = i<=doneUpto;
    const current = i===doneUpto && o.status!=='completed' && o.status!=='cancelled';
    return `<div class="tl-step ${done?'done':''} ${current?'current':''}">
      <div class="tl-line"></div><div class="tl-dot"></div>
      <p class="tl-title">${s.title}</p><p class="tl-time">${done?s.time:'Chưa cập nhật'}</p>
    </div>`;
  }).join('');

  box.innerHTML = `
    <div class="modal-head"><h3>Chi tiết đơn #${o.code}</h3>
      <button class="modal-close" onclick="closeModal()"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
    </div>
    <div class="modal-section">
      <h4>Người nhận</h4>
      <div class="info-grid">
        <div class="row"><span class="k">Họ tên</span><span class="v">Zurika Nguyễn</span></div>
        <div class="row"><span class="k">Điện thoại</span><span class="v mono">090 123 4567</span></div>
        <div class="row" style="grid-column:1/-1"><span class="k">Địa chỉ</span><span class="v">45 Đường Nguyễn Huệ, Quận 1, TP. Hồ Chí Minh</span></div>
      </div>
    </div>
    <div class="modal-section">
      <h4>Sản phẩm</h4>
      <div class="order-items">${orderItemsHtml(o)}</div>
      <div class="order-total-row"><span class="lbl">Thanh toán</span><span class="val mono">${fmt(orderTotal(o)+50000)}</span></div>
      <div style="display:flex;justify-content:space-between;font-size:11.5px;color:var(--ink-faint);margin-top:4px;"><span>Phí vận chuyển</span><span class="mono">50.000₫</span></div>
    </div>
    <div class="modal-section" style="margin-bottom:0;">
      <h4>Trạng thái đơn hàng</h4>
      <div class="timeline">${timelineHtml}</div>
    </div>
  `;
  overlay.classList.add('show');
}
function closeModal(){ document.getElementById('modal-overlay').classList.remove('show'); }
document.addEventListener('keydown', e=>{ if(e.key==='Escape') closeModal(); });

/* ============ INIT ============ */
window.addEventListener('resize', moveIndicator);
moveIndicator();
render();
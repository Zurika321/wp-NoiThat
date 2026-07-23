<body>
   <?php get_header('cart'); ?>
<div id="app">
  <div class="panel-viewport" id="panel-viewport"></div>

  <div class="page-footer">
    <span class="brand">Atelier Home</span>
    <p>Đồ nội thất được tuyển chọn thủ công · Giao hàng toàn quốc trong 2–5 ngày</p>
  </div>
</div>

<div class="checkout-bar" id="checkout-bar">
  <div class="checkout-inner">
    <div class="checkout-left">
      <div class="chk" id="chk-all-sticky" onclick="toggleSelectAll()"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
      <span class="lbl">Chọn tất cả · <span id="sticky-count">0</span> sản phẩm</span>
    </div>
    <div class="checkout-total">
      <span class="t-lbl">Tổng cộng</span>
      <span class="t-val mono" id="sticky-total">0₫</span>
    </div>
    <button class="btn-checkout" onclick="rippleAndToast(event,'Đang chuyển đến trang thanh toán…')">Thanh toán</button>
  </div>
</div>

<div class="modal-overlay" id="modal-overlay" onclick="if(event.target===this) closeModal()">
  <div class="modal-box" id="modal-box"></div>
</div>

<div class="toast-stack" id="toast-stack"></div>

<?php wp_footer(); ?>
</body>
</html>
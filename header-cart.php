<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
    MỘC
    <?php
if (!is_front_page()) {
    echo ' | ';
    echo mb_strtoupper(get_the_title(), 'UTF-8');
}
?>
</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,500&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="cursor-ring" id="cursorRing"></div>
<div class="cursor-dot" id="cursorDot"></div>

<!-- NAVBAR -->
<header class="navbar" id="navbar">
  <div class="container nav-inner">
    <a href="<?php echo home_url('/'); ?>" class="brand">MỘC</a>
    <nav class="nav-links" id="navLinks">
    <!-- <nav class="nav-links"> -->

    <a href="<?php echo home_url('/'); ?>"
       class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>">
        Home
    </a>

    <a href="<?php echo home_url('/products'); ?>"
       class="nav-link <?php echo is_page('products') ? 'active' : ''; ?>">
        Products
    </a>

    <a href="<?php echo home_url('/gallery'); ?>"
       class="nav-link <?php echo is_page('gallery') ? 'active' : ''; ?>">
        Collection
    </a>

    <a href="<?php echo home_url('/about'); ?>"
       class="nav-link <?php echo is_page('about') ? 'active' : ''; ?>">
        About
    </a>

    <a href="<?php echo home_url('/blog'); ?>"
       class="nav-link <?php echo is_home() || is_single() ? 'active' : ''; ?>">
        Blog
    </a>

    <a href="<?php echo home_url('/contact'); ?>"
       class="nav-link <?php echo is_page('contact') ? 'active' : ''; ?>">
        Contact
    </a>

</nav>
    <?php if (is_user_logged_in()) : ?>

    <a href="<?php echo home_url('/cart'); ?>" class="nav-cta btn-ripple <?php echo is_page('cart') ? 'active' : ''; ?>">
        🛒 Giỏ hàng
    </a>

<?php else : ?>

    <a href="<?php echo wp_login_url(); ?>" class="nav-cta btn-ripple">
        Đăng nhập
    </a>

<?php endif; ?>
    <div class="nav-toggle" id="navToggle"><span></span><span></span><span></span></div>
  </div>
  </div>

<?php if (is_page('cart')) : ?>
<!-- <hr style="width: 100%;
    margin: 0 auto;
    border: none;
    transform: translateY(6px);
    border-top: 1px solid #000;"> -->
    <div class="maintabs" id="maintabs">
        <button class="maintab-btn active" data-tab="cart">Giỏ hàng</button>
        <button class="maintab-btn" data-tab="orders">Đơn hàng</button>
        <div class="maintab-indicator" id="maintab-indicator"></div>
    </div>

<?php endif; ?>

</header>

<?php if (!is_page('products')) : ?>

<div style="height:60px;background:black;"></div>
<div style="height:20px;"></div>

<?php endif; ?>
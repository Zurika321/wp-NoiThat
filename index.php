<?php get_header(); ?>
<!-- NAVBAR -->
<header class="navbar" id="navbar">
  <div class="container nav-inner">
    <a href="#home" class="brand">MỘC</a>
    <nav class="nav-links" id="navLinks">
      <a href="#home" class="nav-link active">Home</a>
      <a href="#products" class="nav-link">Products</a>
      <a href="#gallery" class="nav-link">Collection</a>
      <a href="#brand" class="nav-link">About</a>
      <a href="#blog" class="nav-link">Blog</a>
      <a href="#footer" class="nav-link">Contact</a>
    </nav>
    <?php if (is_user_logged_in()) : ?>

    <a href="<?php echo home_url('/cart'); ?>" class="nav-cta btn-ripple">
        🛒 Giỏ hàng
    </a>

<?php else : ?>

    <a href="<?php echo wp_login_url(); ?>" class="nav-cta btn-ripple">
        Đăng nhập
    </a>

<?php endif; ?>
    <div class="nav-toggle" id="navToggle"><span></span><span></span><span></span></div>
  </div>
</header>

<main>
    <?php get_template_part('template-parts/Main/hero'); ?>
    <?php get_template_part('template-parts/Main/categories'); ?>
    <?php get_template_part('template-parts/Main/brand'); ?>
    <?php get_template_part('template-parts/Main/products'); ?>
    <?php get_template_part('template-parts/Main/process'); ?>
    <?php get_template_part('template-parts/Main/gallery'); ?>
    <?php get_template_part('template-parts/Main/testimonials'); ?>
    <?php get_template_part('template-parts/Main/stats'); ?>
    <?php get_template_part('template-parts/Main/blog'); ?>
    <?php get_template_part('template-parts/Main/cta'); ?>
</main>
<?php wp_body_open(); ?>
<?php get_footer(); ?>
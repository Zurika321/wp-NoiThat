<?php get_header(); ?>

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
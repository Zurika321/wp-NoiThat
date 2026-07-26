<?php
get_header("chung"); ?>

<?php if (is_page('gio-hang')) : ?>
    <!-- get_template_part('template-parts/Cart/cart'); -->
     <div style="height:60px;background:black;"></div>
    <div style="height:20px;"></div>
<?php endif;

if (have_posts()) :
    while (have_posts()) : the_post();

        the_content();

    endwhile;
endif;



get_footer();
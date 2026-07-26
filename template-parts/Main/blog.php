<!-- SECTION 8: BLOG -->
<section class="blog" id="blog">
  <div class="blog-grid">

<?php

$query = new WP_Query(array(

    'post_type' => 'post',

    'posts_per_page' => 3,

    'post_status' => 'publish'

));

if($query->have_posts()) :

while($query->have_posts()) :

$query->the_post();

?>

<div class="blog-card">

    <div class="blog-img">

        <a href="<?php the_permalink(); ?>">

            <?php the_post_thumbnail('large'); ?>

        </a>

    </div>

    <div class="blog-body">

        <span class="blog-date">

            <?php echo get_the_date('d/m/Y'); ?>

        </span>

        <h3>

            <a href="<?php the_permalink(); ?>">

                <?php the_title(); ?>

            </a>

        </h3>

        <p>

            <?php echo wp_trim_words(get_the_excerpt(),20); ?>

        </p>

        <a
        href="<?php the_permalink(); ?>"
        class="blog-read">

            Đọc tiếp →

        </a>

    </div>

</div>

<?php

endwhile;

wp_reset_postdata();

endif;

?>

</div>
</section>
<?php get_header('chung'); ?>
<div style="height:60px;background:black;"></div>
<div style="height:20px;"></div>
<?php while (have_posts()) : the_post(); ?>

    <section class="single-post">
        <div class="container">

            <div class="post-header">
                <span class="post-category">
                    <?php the_category(', '); ?>
                </span>

                <h1 class="post-title">
                    <?php the_title(); ?>
                </h1>

                <div class="post-meta">
                    <span>👤 <?php the_author(); ?></span>
                    <span>📅 <?php echo get_the_date('d/m/Y'); ?></span>
                </div>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>
                <?php the_content(); ?>
        </div>
    </section>

<?php endwhile; ?>

<?php
get_footer();
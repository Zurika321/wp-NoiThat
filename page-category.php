<?php
get_header();
$categories = get_the_category();

if (!empty($categories)) {
    $cat = $categories[0];
    $url = home_url('/' . $cat->slug . '/' . $post->post_name . '/');
} else {
    $url = get_permalink();
}
?>
<main class="category-page">
    <h1><?php single_cat_title(); ?></h1>

    <?php if (have_posts()) : ?>

        <div class="posts">

        <?php while (have_posts()) : the_post(); ?>

            <article class="card">

                <a href="<?= esc_url($url); ?>">

                    <?php the_post_thumbnail('medium'); ?>

                    <h2><?php the_title(); ?></h2>

                    <p><?php the_excerpt(); ?></p>

                </a>

            </article>

        <?php endwhile; ?>

        </div>

    <?php endif; ?>
</main>

<?php
get_footer();
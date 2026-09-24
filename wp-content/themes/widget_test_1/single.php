<?php
/**
 * Single post template (Trang chi tiết bài viết)
 */

get_header(); ?>

<main class="site-main site-container">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-article' ); ?>>
            <h1 class="single-post-title"><?php the_title(); ?></h1>
            <div class="single-post-meta">
                <span>👤 Tác giả: <?php the_author(); ?></span> | 
                <span>📅 Ngày đăng: <?php echo get_the_date(); ?></span> | 
                <span>📂 Chuyên mục: <?php the_category( ', ' ); ?></span>
            </div>

            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'large', array( 'class' => 'single-post-thumb' ) ); ?>
            <?php endif; ?>

            <div class="single-post-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>

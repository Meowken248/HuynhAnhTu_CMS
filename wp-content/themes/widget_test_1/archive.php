<?php
/**
 * Archive template (Trang danh sách theo chuyên mục / lưu trữ)
 */

get_header(); ?>

<main class="site-main site-container">
    <h2 class="page-header-title">
        📂 Chuyên mục: <?php the_archive_title(); ?>
    </h2>

    <?php if ( have_posts() ) : ?>
        <div class="posts-grid">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'medium', array( 'class' => 'post-card-thumb' ) ); ?>
                        </a>
                    <?php endif; ?>
                    <div class="post-card-body">
                        <h3 class="post-card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="post-card-meta">
                            <span>📅 <?php echo get_the_date(); ?></span> | 
                            <span>📂 <?php the_category( ', ' ); ?></span>
                        </div>
                        <div class="post-card-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" style="font-weight:600; margin-top:auto;">Xem chi tiết &rarr;</a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div style="margin-top: 30px; text-align: center;">
            <?php the_posts_pagination( array(
                'prev_text' => '&larr; Trang trước',
                'next_text' => 'Trang sau &rarr;',
            ) ); ?>
        </div>

    <?php else : ?>
        <p>Không có bài viết nào trong chuyên mục này.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>

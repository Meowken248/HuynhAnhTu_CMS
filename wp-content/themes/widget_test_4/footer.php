<!-- ======================================================== -->
<!-- KHU VỰC: WIDGET_TEST_4 (PHÍA TRÊN FOOTER)                 -->
<!-- Hiển thị tại: Trang chủ, Trang danh sách, Trang chi tiết -->
<!-- ======================================================== -->
<?php if ( is_active_sidebar( 'widget_test_4' ) ) : ?>
    <section class="widget-test-4-section">
        <div class="site-container">
            <div class="widget-test-4-container-box">
                <?php dynamic_sidebar( 'widget_test_4' ); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<footer class="site-footer">
    <div class="site-container">
        <p>&copy; <?php echo date( 'Y' ); ?> - <?php bloginfo( 'name' ); ?>. CMS Lab 4.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

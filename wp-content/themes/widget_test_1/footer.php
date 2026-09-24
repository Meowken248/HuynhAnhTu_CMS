<!-- ======================================================== -->
<!-- KHU VỰC: WIDGET_TEST_1 (HIỂN THỊ PHÍA TRÊN FOOTER)       -->
<!-- Tự động hiện ở Trang chủ, Trang danh sách, Trang chi tiết -->
<!-- ======================================================== -->
<?php if ( is_active_sidebar( 'widget_test_1' ) ) : ?>
    <section class="widget-test-1-section">
        <div class="site-container">
            <div class="widget-section-header">
                <span>📌 KHU VỰC: WIDGET_TEST_1 (PHÍA TRÊN FOOTER)</span>
            </div>
            <div class="widget-test-1-inner">
                <?php dynamic_sidebar( 'widget_test_1' ); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<footer class="site-footer">
    <div class="site-container">
        <p>&copy; <?php echo date( 'Y' ); ?> - <?php bloginfo( 'name' ); ?>. CMS Lab Project.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

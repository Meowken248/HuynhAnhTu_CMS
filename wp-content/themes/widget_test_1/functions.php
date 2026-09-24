<?php
/**
 * Theme functions and definitions for widget_test_1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Ho tro Theme
function widget_test_1_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'widget_test_1_setup' );

// 2. Load CSS
function widget_test_1_scripts() {
    wp_enqueue_style( 'widget-test-1-style', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'widget_test_1_scripts' );

// 3. ĐĂNG KÝ WIDGET: widget_test_1 (Yêu cầu đề bài)
function widget_test_1_register_sidebars() {
    register_sidebar( array(
        'name'          => 'widget_test_1',
        'id'            => 'widget_test_1',
        'description'   => 'Khu vực hiển thị widget_test_1 phía trên Footer',
        'before_widget' => '<div id="%1$s" class="widget-test-1-item widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'widget_test_1_register_sidebars' );

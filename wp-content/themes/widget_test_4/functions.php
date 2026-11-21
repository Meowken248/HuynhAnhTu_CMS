<?php
/**
 * Theme functions and definitions for widget_test_4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Cấu hình hỗ trợ Theme
function widget_test_4_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'widget_test_4_setup' );

// 2. Nạp file CSS
function widget_test_4_scripts() {
    wp_enqueue_style( 'widget-test-4-style', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'widget_test_4_scripts' );

// 3. ĐĂNG KÝ VÙNG CHỨA: widget_test_4 (Yêu cầu mục #1)
function widget_test_4_register_sidebars() {
    register_sidebar( array(
        'name'          => 'widget_test_4',
        'id'            => 'widget_test_4',
        'description'   => 'Khu vực hiển thị widget_test_4 phía trên Footer',
        'before_widget' => '<div id="%1$s" class="widget-test-4-item widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-test-4-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'widget_test_4_register_sidebars' );

// 4. TẠO CUSTOM WIDGET THEO ĐÚNG HÌNH MẪU ĐỀ BÀI (Yêu cầu mục #3)
class Widget_Test_4_BaoMoi extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'widget_test_4_baomoi',
            'widget_test_4 (Tin Tức Theo Hình Mẫu)',
            array( 'description' => 'Widget hiển thị danh sách tin tức dạng Báo Mới ngẫu nhiên theo đúng hình mẫu' )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        // Lấy 6 bài viết ngẫu nhiên từ cơ sở dữ liệu
        $query = new WP_Query( array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 6,
            'orderby'        => 'rand',
        ) );

        // Danh sách nguồn báo theo hình mẫu
        $sources = array(
            array( 'name' => 'Quân đội nhân dân', 'color' => 'red' ),
            array( 'name' => 'Vietnam+', 'color' => 'red' ),
            array( 'name' => 'SAIGON Giải Phóng', 'color' => 'blue' ),
            array( 'name' => 'SAIGON Giải Phóng', 'color' => 'blue' ),
            array( 'name' => 'SAIGON Giải Phóng', 'color' => 'blue' ),
            array( 'name' => 'HàNộiMới', 'color' => 'red' ),
        );

        // Danh sách thời gian ngẫu nhiên theo hình mẫu
        $times = array( 'vài giây', '2 phút', '4 phút', '5 phút', '6 giờ', '15 phút' );

        // Danh sách số lượng tin liên quan theo hình mẫu
        $related_counts = array( '4231 liên quan', '1641 liên quan', '4 liên quan', '1239 liên quan', '49 liên quan', '9 liên quan' );

        if ( $query->have_posts() ) :
            echo '<ul class="baomoi-widget-list">';
            $index = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $source  = $sources[ $index % count( $sources ) ];
                $time    = $times[ $index % count( $times ) ];
                $related = $related_counts[ $index % count( $related_counts ) ];
                ?>
                <li class="baomoi-widget-item">
                    <div class="baomoi-widget-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                    <div class="baomoi-widget-meta">
                        <span class="baomoi-widget-source <?php echo esc_attr( $source['color'] ); ?>">
                            <?php echo esc_html( $source['name'] ); ?>
                        </span>
                        <span class="baomoi-widget-time">
                            <?php echo esc_html( $time ); ?>
                        </span>
                        <span class="baomoi-widget-related">
                            <?php echo esc_html( $related ); ?>
                        </span>
                    </div>
                </li>
                <?php
                $index++;
            endwhile;
            echo '</ul>';
            wp_reset_postdata();
        else :
            echo '<p>Chưa có bài viết nào để hiển thị.</p>';
        endif;

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        echo '<p>Widget này sẽ tự động lấy bài viết và hiển thị chính xác theo hình mẫu đề bài.</p>';
    }

    public function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
}

function register_widget_test_4_baomoi() {
    register_widget( 'Widget_Test_4_BaoMoi' );
}
add_action( 'widgets_init', 'register_widget_test_4_baomoi' );

<?php
/**
 * WhiskyTaste Pro Child Theme Functions
 *
 * @package WhiskyTaste_Child
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Constants
 */
define('WTP_CHILD_VERSION', '1.0.0');
define('WTP_CHILD_DIR', get_stylesheet_directory());
define('WTP_CHILD_URL', get_stylesheet_directory_uri());

/**
 * Theme Setup
 */
function wtp_child_theme_setup() {
    load_child_theme_textdomain('whiskytaste-child', WTP_CHILD_DIR . '/languages');
    
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    add_image_size('wtp-service-thumb', 400, 300, true);
    add_image_size('wtp-gallery-thumb', 600, 450, true);
    add_image_size('wtp-blog-featured', 800, 400, true);
    
    register_nav_menus(array(
        'footer-menu' => __('Footer Menu', 'whiskytaste-child'),
        'services-menu' => __('Services Menu', 'whiskytaste-child'),
    ));
}
add_action('after_setup_theme', 'wtp_child_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function wtp_enqueue_assets() {
    wp_enqueue_style(
        'wtp-parent-style',
        get_template_directory_uri() . '/style.css',
        array(),
        WTP_CHILD_VERSION
    );
    
    wp_enqueue_style(
        'wtp-child-style',
        get_stylesheet_uri(),
        array('wtp-parent-style'),
        WTP_CHILD_VERSION
    );
    
    wp_enqueue_style(
        'wtp-custom-styles',
        WTP_CHILD_URL . '/assets/css/custom.css',
        array('wtp-child-style'),
        WTP_CHILD_VERSION
    );
    
    if (is_page('booking') || is_page('services')) {
        wp_enqueue_style(
            'wtp-booking-styles',
            WTP_CHILD_URL . '/assets/css/booking.css',
            array('wtp-custom-styles'),
            WTP_CHILD_VERSION
        );
    }
    
    wp_enqueue_script(
        'wtp-custom-js',
        WTP_CHILD_URL . '/assets/js/custom.js',
        array('jquery'),
        WTP_CHILD_VERSION,
        true
    );
    
    wp_localize_script('wtp-custom-js', 'wtp_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('wtp_ajax_nonce'),
        'strings' => array(
            'loading' => __('Loading...', 'whiskytaste-child'),
            'error' => __('An error occurred. Please try again.', 'whiskytaste-child'),
        )
    ));
}
add_action('wp_enqueue_scripts', 'wtp_enqueue_assets');

/**
 * Custom Post Types
 */
function wtp_register_custom_post_types() {
    register_post_type('wtp_service', array(
        'labels' => array(
            'name' => __('Services', 'whiskytaste-child'),
            'singular_name' => __('Service', 'whiskytaste-child'),
            'add_new' => __('Add New Service', 'whiskytaste-child'),
            'add_new_item' => __('Add New Service', 'whiskytaste-child'),
            'edit_item' => __('Edit Service', 'whiskytaste-child'),
            'new_item' => __('New Service', 'whiskytaste-child'),
            'view_item' => __('View Service', 'whiskytaste-child'),
            'search_items' => __('Search Services', 'whiskytaste-child'),
            'not_found' => __('No services found', 'whiskytaste-child'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'services'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon' => 'dashicons-awards',
        'show_in_rest' => true,
    ));
    
    register_post_type('wtp_event', array(
        'labels' => array(
            'name' => __('Events', 'whiskytaste-child'),
            'singular_name' => __('Event', 'whiskytaste-child'),
            'add_new' => __('Add New Event', 'whiskytaste-child'),
            'add_new_item' => __('Add New Event', 'whiskytaste-child'),
            'edit_item' => __('Edit Event', 'whiskytaste-child'),
            'new_item' => __('New Event', 'whiskytaste-child'),
            'view_item' => __('View Event', 'whiskytaste-child'),
            'search_items' => __('Search Events', 'whiskytaste-child'),
            'not_found' => __('No events found', 'whiskytaste-child'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'events'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-calendar-alt',
        'show_in_rest' => true,
    ));
    
    register_post_type('wtp_testimonial', array(
        'labels' => array(
            'name' => __('Testimonials', 'whiskytaste-child'),
            'singular_name' => __('Testimonial', 'whiskytaste-child'),
            'add_new' => __('Add New Testimonial', 'whiskytaste-child'),
            'add_new_item' => __('Add New Testimonial', 'whiskytaste-child'),
            'edit_item' => __('Edit Testimonial', 'whiskytaste-child'),
            'new_item' => __('New Testimonial', 'whiskytaste-child'),
            'view_item' => __('View Testimonial', 'whiskytaste-child'),
            'search_items' => __('Search Testimonials', 'whiskytaste-child'),
            'not_found' => __('No testimonials found', 'whiskytaste-child'),
        ),
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
    ));
}
add_action('init', 'wtp_register_custom_post_types');

/**
 * Custom Taxonomies
 */
function wtp_register_taxonomies() {
    register_taxonomy('wtp_service_category', 'wtp_service', array(
        'labels' => array(
            'name' => __('Service Categories', 'whiskytaste-child'),
            'singular_name' => __('Service Category', 'whiskytaste-child'),
            'search_items' => __('Search Categories', 'whiskytaste-child'),
            'all_items' => __('All Categories', 'whiskytaste-child'),
            'edit_item' => __('Edit Category', 'whiskytaste-child'),
            'update_item' => __('Update Category', 'whiskytaste-child'),
            'add_new_item' => __('Add New Category', 'whiskytaste-child'),
            'new_item_name' => __('New Category Name', 'whiskytaste-child'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'service-category'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'wtp_register_taxonomies');

/**
 * Custom Widgets
 */
function wtp_register_widgets() {
    register_sidebar(array(
        'name' => __('Service Sidebar', 'whiskytaste-child'),
        'id' => 'wtp-service-sidebar',
        'description' => __('Sidebar for service pages', 'whiskytaste-child'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Booking Sidebar', 'whiskytaste-child'),
        'id' => 'wtp-booking-sidebar',
        'description' => __('Sidebar for booking pages', 'whiskytaste-child'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'wtp_register_widgets');

/**
 * AJAX Handlers
 */
function wtp_load_more_posts() {
    check_ajax_referer('wtp_ajax_nonce', 'nonce');
    
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $post_type = isset($_POST['post_type']) ? sanitize_text_field($_POST['post_type']) : 'post';
    
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => 6,
        'paged' => $paged,
        'post_status' => 'publish',
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', get_post_type());
        }
        wp_reset_postdata();
    } else {
        echo '<p>' . __('No more posts to load.', 'whiskytaste-child') . '</p>';
    }
    
    wp_die();
}
add_action('wp_ajax_wtp_load_more', 'wtp_load_more_posts');
add_action('wp_ajax_nopriv_wtp_load_more', 'wtp_load_more_posts');

/**
 * Customizer Options
 */
function wtp_customize_register($wp_customize) {
    $wp_customize->add_section('wtp_contact_info', array(
        'title' => __('Contact Information', 'whiskytaste-child'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('wtp_phone_number', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('wtp_phone_number', array(
        'label' => __('Phone Number', 'whiskytaste-child'),
        'section' => 'wtp_contact_info',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('wtp_email_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('wtp_email_address', array(
        'label' => __('Email Address', 'whiskytaste-child'),
        'section' => 'wtp_contact_info',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('wtp_business_hours', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('wtp_business_hours', array(
        'label' => __('Business Hours', 'whiskytaste-child'),
        'section' => 'wtp_contact_info',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'wtp_customize_register');

/**
 * Helper Functions
 */
function wtp_get_service_price($post_id) {
    $price = get_post_meta($post_id, 'wtp_service_price', true);
    return $price ? '$' . number_format($price, 2) : __('Contact for pricing', 'whiskytaste-child');
}

function wtp_get_event_date($post_id) {
    $date = get_post_meta($post_id, 'wtp_event_date', true);
    return $date ? date_i18n(get_option('date_format'), strtotime($date)) : '';
}

function wtp_is_booking_enabled() {
    return class_exists('AmeliaBooking') || class_exists('Bookly');
}

/**
 * Include Additional Files
 */
if (file_exists(WTP_CHILD_DIR . '/includes/elementor-widgets.php')) {
    require_once WTP_CHILD_DIR . '/includes/elementor-widgets.php';
}

if (file_exists(WTP_CHILD_DIR . '/includes/shortcodes.php')) {
    require_once WTP_CHILD_DIR . '/includes/shortcodes.php';
}

if (file_exists(WTP_CHILD_DIR . '/includes/template-functions.php')) {
    require_once WTP_CHILD_DIR . '/includes/template-functions.php';
}
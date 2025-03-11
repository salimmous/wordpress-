<?php
/**
 * CityClub Fitness Network functions and definitions
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define theme version
define( 'CITYCLUB_VERSION', '1.0.0' );

// Set up theme support
function cityclub_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'cityclub' ),
        'footer' => esc_html__( 'Footer Menu', 'cityclub' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
}
add_action( 'after_setup_theme', 'cityclub_setup' );

// Enqueue scripts and styles
function cityclub_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style( 'cityclub-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap', array(), null );
    
    // Enqueue Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0' );
    
    // Enqueue main stylesheet
    wp_enqueue_style( 'cityclub-style', get_stylesheet_uri(), array(), CITYCLUB_VERSION );
    
    // Enqueue Elementor compatibility styles
    if ( did_action( 'elementor/loaded' ) ) {
        wp_enqueue_style( 'cityclub-elementor', get_template_directory_uri() . '/assets/css/elementor.css', array(), CITYCLUB_VERSION );
    }
    
    // Enqueue custom scripts
    wp_enqueue_script( 'cityclub-navigation', get_template_directory_uri() . '/js/navigation.js', array(), CITYCLUB_VERSION, true );
    
    // Enqueue custom scripts
    wp_enqueue_script( 'cityclub-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), CITYCLUB_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'cityclub_scripts' );

/**
 * Register widget area.
 */
function cityclub_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'cityclub' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'cityclub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'cityclub' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'cityclub' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'cityclub' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'cityclub_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement Elementor Support.
 */
require get_template_directory() . '/inc/elementor-support.php';

/**
 * Implement Theme Options.
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cityclub_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'cityclub_pingback_header' );

/**
 * Excerpt length
 */
function cityclub_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'cityclub_excerpt_length', 999 );

/**
 * Excerpt more
 */
function cityclub_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'cityclub_excerpt_more' );

/**
 * Add custom image sizes
 */
function cityclub_add_image_sizes() {
    add_image_size( 'cityclub-featured', 1200, 600, true );
    add_image_size( 'cityclub-thumbnail', 350, 250, true );
    add_image_size( 'cityclub-square', 400, 400, true );
}
add_action( 'after_setup_theme', 'cityclub_add_image_sizes' );

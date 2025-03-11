<?php
/**
 * CityClub functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CityClub
 */

if ( ! defined( 'CITYCLUB_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CITYCLUB_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function cityclub_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'cityclub', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set default thumbnail size
	set_post_thumbnail_size( 1200, 675, true );

	// Add custom image sizes
	add_image_size( 'cityclub-hero', 1920, 800, true );
	add_image_size( 'cityclub-card', 600, 400, true );
	add_image_size( 'cityclub-square', 400, 400, true );

	// This theme uses wp_nav_menu() in multiple locations.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'cityclub' ),
			'footer'  => esc_html__( 'Footer Menu', 'cityclub' ),
			'social'  => esc_html__( 'Social Links Menu', 'cityclub' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'cityclub_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for custom line height controls.
	add_theme_support( 'custom-line-height' );

	// Add support for experimental link color control.
	add_theme_support( 'experimental-link-color' );

	// Add support for custom spacing.
	add_theme_support( 'custom-spacing' );

	// Add support for custom units.
	add_theme_support( 'custom-units' );
}
add_action( 'after_setup_theme', 'cityclub_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cityclub_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cityclub_content_width', 1200 );
}
add_action( 'after_setup_theme', 'cityclub_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cityclub_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cityclub' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cityclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'cityclub' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'cityclub' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'cityclub' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'cityclub' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'cityclub_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cityclub_scripts() {
	// Enqueue Google Fonts
	wp_enqueue_style( 'cityclub-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap', array(), null );

	// Enqueue main stylesheet
	wp_enqueue_style( 'cityclub-style', get_stylesheet_uri(), array(), CITYCLUB_VERSION );

	// Enqueue Elementor styles if needed
	if ( class_exists( '\Elementor\Plugin' ) ) {
		wp_enqueue_style( 'cityclub-elementor', get_template_directory_uri() . '/assets/css/elementor.css', array(), CITYCLUB_VERSION );
	}

	// Enqueue scripts
	wp_enqueue_script( 'cityclub-navigation', get_template_directory_uri() . '/js/navigation.js', array(), CITYCLUB_VERSION, true );
	wp_enqueue_script( 'cityclub-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), CITYCLUB_VERSION, true );

	// Conditionally load AOS animation library
	wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
	wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cityclub_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function cityclub_admin_scripts() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'cityclub-admin', get_template_directory_uri() . '/js/admin.js', array( 'jquery', 'wp-color-picker' ), CITYCLUB_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'cityclub_admin_scripts' );

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
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom Post Types.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Theme Options.
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Elementor Support.
 */
require get_template_directory() . '/inc/elementor-support.php';

/**
 * Demo Import.
 */
require get_template_directory() . '/inc/demo-import.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Bootstrap Nav Walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load Demo Importer Class.
 */
require get_template_directory() . '/inc/class-cityclub-demo-importer.php';

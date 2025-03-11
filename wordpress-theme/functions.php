<?php
/**
 * CityClub Modern functions and definitions
 */

// Define theme version
define('CITYCLUB_VERSION', '1.0.0');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function cityclub_setup() {
    /*
     * Make theme available for translation.
     */
    load_theme_textdomain('cityclub-modern', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'cityclub-modern'),
            'footer' => esc_html__('Footer Menu', 'cityclub-modern'),
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
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Enqueue editor styles
    add_editor_style('style-editor.css');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'cityclub_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function cityclub_content_width() {
    $GLOBALS['content_width'] = apply_filters('cityclub_content_width', 1200);
}
add_action('after_setup_theme', 'cityclub_content_width', 0);

/**
 * Register widget area.
 */
function cityclub_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'cityclub-modern'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'cityclub-modern'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    // Footer widget areas
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(
            array(
                'name'          => sprintf(esc_html__('Footer %d', 'cityclub-modern'), $i),
                'id'            => 'footer-' . $i,
                'description'   => esc_html__('Add widgets here.', 'cityclub-modern'),
                'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="footer-widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }
}
add_action('widgets_init', 'cityclub_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cityclub_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('cityclub-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap', array(), null);

    // Main stylesheet
    wp_enqueue_style('cityclub-style', get_stylesheet_uri(), array(), CITYCLUB_VERSION);

    // Navigation script
    wp_enqueue_script('cityclub-navigation', get_template_directory_uri() . '/js/navigation.js', array(), CITYCLUB_VERSION, true);

    // Main script
    wp_enqueue_script('cityclub-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), CITYCLUB_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cityclub_scripts');

/**
 * Custom template tags for this theme.
 */
if (file_exists(get_template_directory() . '/inc/template-tags.php')) {
    require get_template_directory() . '/inc/template-tags.php';
}

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
if (file_exists(get_template_directory() . '/inc/template-functions.php')) {
    require get_template_directory() . '/inc/template-functions.php';
}

/**
 * Customizer additions.
 */
if (file_exists(get_template_directory() . '/inc/customizer.php')) {
    require get_template_directory() . '/inc/customizer.php';
}

/**
 * Custom Post Types
 */
if (file_exists(get_template_directory() . '/inc/custom-post-types.php')) {
    require get_template_directory() . '/inc/custom-post-types.php';
}

/**
 * Theme Options
 */
if (file_exists(get_template_directory() . '/inc/theme-options.php')) {
    require get_template_directory() . '/inc/theme-options.php';
}

/**
 * Bootstrap Nav Walker
 */
if (file_exists(get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php')) {
    require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

/**
 * Demo Import
 */
if (file_exists(get_template_directory() . '/inc/demo-import.php')) {
    require get_template_directory() . '/inc/demo-import.php';
}

/**
 * Demo Content Preview
 */
if (file_exists(get_template_directory() . '/inc/demo-content.php')) {
    require get_template_directory() . '/inc/demo-content.php';
}

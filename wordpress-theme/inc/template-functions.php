<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cityclub_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'cityclub_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cityclub_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'cityclub_pingback_header');

/**
 * Change the excerpt length
 */
function cityclub_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'cityclub_excerpt_length');

/**
 * Change the excerpt more string
 */
function cityclub_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'cityclub_excerpt_more');

/**
 * Add custom image sizes
 */
function cityclub_add_image_sizes() {
    add_image_size('cityclub-featured', 1200, 600, true);
    add_image_size('cityclub-card', 600, 400, true);
    add_image_size('cityclub-square', 400, 400, true);
}
add_action('after_setup_theme', 'cityclub_add_image_sizes');

/**
 * Add custom image sizes to media library
 */
function cityclub_custom_image_sizes($sizes) {
    return array_merge($sizes, array(
        'cityclub-featured' => __('Featured Image', 'cityclub-modern'),
        'cityclub-card' => __('Card Image', 'cityclub-modern'),
        'cityclub-square' => __('Square Image', 'cityclub-modern'),
    ));
}
add_filter('image_size_names_choose', 'cityclub_custom_image_sizes');

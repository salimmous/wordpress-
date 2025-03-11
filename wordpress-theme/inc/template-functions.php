<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package CityClub
 */

/**
 * Add custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array Modified body classes.
 */
function cityclub_body_classes_inc( $classes ) {
    // Add a class if we're on the home page
    if ( is_front_page() ) {
        $classes[] = 'cityclub-home';
    }
    
    // Add class if no sidebar is present
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }
    
    // Add class for different page templates
    if ( is_page_template( 'template-home.php' ) ) {
        $classes[] = 'template-home';
    }
    
    return $classes;
}
add_filter( 'body_class', 'cityclub_body_classes_inc' );

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
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array Modified post classes.
 */
function cityclub_post_classes( $classes ) {
    // Add a class if post has a featured image
    if ( has_post_thumbnail() ) {
        $classes[] = 'has-thumbnail';
    }
    
    return $classes;
}
add_filter( 'post_class', 'cityclub_post_classes' );

/**
 * Modify the "read more" link text
 *
 * @return string Modified read more link.
 */
function cityclub_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">' . esc_html__( 'Lire la suite', 'cityclub' ) . ' <i class="fas fa-arrow-right"></i></a>';
}
add_filter( 'the_content_more_link', 'cityclub_read_more_link' );

/**
 * Modify the excerpt length
 *
 * @param int $length Excerpt length.
 * @return int Modified excerpt length.
 */
function cityclub_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'cityclub_excerpt_length' );

/**
 * Modify the excerpt more string
 *
 * @param string $more The string shown within the more link.
 * @return string Modified excerpt more string.
 */
function cityclub_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'cityclub_excerpt_more' );

/**
 * Add a wrapper around embedded media
 *
 * @param string $html The HTML output for the embedded element.
 * @return string The modified HTML output.
 */
function cityclub_embed_html( $html ) {
    return '<div class="responsive-embed">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'cityclub_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'cityclub_embed_html' ); // Jetpack

/**
 * Add a container around the gallery
 *
 * @param string $html The gallery output.
 * @return string The modified gallery output.
 */
function cityclub_gallery_wrapper( $html ) {
    return '<div class="gallery-container">' . $html . '</div>';
}
add_filter( 'post_gallery', 'cityclub_gallery_wrapper', 10, 2 );

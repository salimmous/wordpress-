<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package CityClub
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cityclub_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class if we're on the home page.
	if ( is_front_page() ) {
		$classes[] = 'cityclub-home';
	}

	// Adds a class if we're on a single post.
	if ( is_single() ) {
		$classes[] = 'cityclub-single';
	}

	// Adds a class if we're on a page.
	if ( is_page() ) {
		$classes[] = 'cityclub-page';
	}

	// Adds a class if we're on an archive page.
	if ( is_archive() ) {
		$classes[] = 'cityclub-archive';
	}

	// Adds a class if we're on a search page.
	if ( is_search() ) {
		$classes[] = 'cityclub-search';
	}

	// Adds a class if we're on a 404 page.
	if ( is_404() ) {
		$classes[] = 'cityclub-404';
	}

	return $classes;
}
add_filter( 'body_class', 'cityclub_body_classes' );

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
 * Enqueue Font Awesome.
 */
function cityclub_enqueue_font_awesome() {
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4' );
}
add_action( 'wp_enqueue_scripts', 'cityclub_enqueue_font_awesome' );

/**
 * Add custom CSS variables for theme colors.
 */
function cityclub_custom_css_variables() {
	$primary_color = get_theme_mod( 'cityclub_primary_color', '#f26f21' );
	$secondary_color = get_theme_mod( 'cityclub_secondary_color', '#000000' );
	$text_color = get_theme_mod( 'cityclub_text_color', '#333333' );
	$light_color = get_theme_mod( 'cityclub_light_color', '#f8f8f8' );
	$dark_color = get_theme_mod( 'cityclub_dark_color', '#222222' );

	$css = ":root {\n";
	$css .= "\t--primary-color: {$primary_color};\n";
	$css .= "\t--secondary-color: {$secondary_color};\n";
	$css .= "\t--text-color: {$text_color};\n";
	$css .= "\t--light-color: {$light_color};\n";
	$css .= "\t--dark-color: {$dark_color};\n";
	$css .= "}\n";

	wp_add_inline_style( 'cityclub-style', $css );
}
add_action( 'wp_enqueue_scripts', 'cityclub_custom_css_variables' );

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function cityclub_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'cityclub-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'cityclub_resource_hints', 10, 2 );

/**
 * Add a title to posts and pages that are missing titles.
 *
 * @param string $title The title.
 * @return string
 */
function cityclub_untitled_post( $title ) {
	// If the title is empty, return a default title.
	if ( '' === $title ) {
		return __( 'Untitled', 'cityclub' );
	}

	return $title;
}
add_filter( 'the_title', 'cityclub_untitled_post' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

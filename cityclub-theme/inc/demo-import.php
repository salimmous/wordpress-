<?php
/**
 * Demo Import Configuration
 *
 * @package CityClub
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Demo Import Setup
 */
function cityclub_demo_import_setup() {
	// Check if One Click Demo Import is active
	if ( ! class_exists( 'OCDI_Plugin' ) ) {
		return;
	}

	// Define demo import files
	add_filter( 'ocdi/import_files', 'cityclub_demo_import_files' );

	// After import setup
	add_action( 'ocdi/after_import', 'cityclub_after_import_setup' );

	// Disable generation of smaller images during import
	add_filter( 'ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

	// Change the location of the demo import files
	add_filter( 'ocdi/upload_file_path', 'cityclub_upload_file_path' );
}
add_action( 'after_setup_theme', 'cityclub_demo_import_setup' );

/**
 * Define demo import files
 */
function cityclub_demo_import_files() {
	return array(
		array(
			'import_file_name'           => 'CityClub Demo',
			'import_file_url'            => 'https://cityclub.ma/demo-content/demo-content.xml',
			'import_widget_file_url'     => 'https://cityclub.ma/demo-content/widgets.json',
			'import_customizer_file_url' => 'https://cityclub.ma/demo-content/customizer.dat',
			'import_preview_image_url'   => 'https://cityclub.ma/demo-content/preview.jpg',
			'preview_url'               => 'https://demo.cityclub.ma/',
		),
	);
}

/**
 * After import setup
 */
function cityclub_after_import_setup() {
	// Assign menus to their locations
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'primary' => $main_menu->term_id,
		'footer'  => $footer_menu->term_id,
	) );

	// Assign front page and posts page
	$front_page = get_page_by_title( 'Home' );
	$blog_page  = get_page_by_title( 'Blog' );

	if ( $front_page ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page->ID );
	}

	if ( $blog_page ) {
		update_option( 'page_for_posts', $blog_page->ID );
	}

	// Import Elementor settings
	cityclub_import_elementor_settings();

	// Update ACF field groups
	cityclub_update_acf_fields();

	// Flush rewrite rules
	flush_rewrite_rules();
}

/**
 * Import Elementor settings
 */
function cityclub_import_elementor_settings() {
	if ( ! class_exists( '\Elementor\Plugin' ) ) {
		return;
	}

	// Update Elementor settings
	update_option( 'elementor_disable_color_schemes', 'yes' );
	update_option( 'elementor_disable_typography_schemes', 'yes' );
	update_option( 'elementor_container_width', 1200 );

	// Add default Elementor colors
	$elementor_colors = array(
		1 => '#f26f21', // Primary
		2 => '#000000', // Secondary
		3 => '#333333', // Text
		4 => '#f8f8f8', // Light
		5 => '#222222', // Dark
	);

	update_option( 'elementor_scheme_color', $elementor_colors );
}

/**
 * Update ACF field groups
 */
function cityclub_update_acf_fields() {
	if ( ! class_exists( 'ACF' ) ) {
		return;
	}

	// Import ACF field groups if needed
	// This would typically be done via JSON files in the theme
}

/**
 * Change the location of the demo import files
 */
function cityclub_upload_file_path( $path ) {
	// Use the default path in the uploads directory
	return $path;
}

/**
 * Add admin notice if required plugins are not installed
 */
function cityclub_admin_notice_required_plugins() {
	$screen = get_current_screen();
	if ( $screen->id !== 'appearance_page_pt-one-click-demo-import' ) {
		return;
	}

	$required_plugins = array(
		'elementor' => 'Elementor Page Builder',
		'contact-form-7' => 'Contact Form 7',
		'advanced-custom-fields' => 'Advanced Custom Fields',
		'wp-google-maps' => 'WP Google Maps',
	);

	$missing_plugins = array();

	foreach ( $required_plugins as $slug => $name ) {
		if ( ! is_plugin_active( $slug . '/' . $slug . '.php' ) ) {
			$missing_plugins[] = $name;
		}
	}

	if ( empty( $missing_plugins ) ) {
		return;
	}

	$message = sprintf(
		/* translators: %s: list of missing plugins */
		__( 'The following plugins are required for the demo import: %s. Please install and activate them before importing the demo content.', 'cityclub' ),
		'<strong>' . implode( ', ', $missing_plugins ) . '</strong>'
	);

	echo '<div class="notice notice-warning"><p>' . $message . '</p></div>';
}
add_action( 'admin_notices', 'cityclub_admin_notice_required_plugins' );

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

// Include demo content functions
require get_template_directory() . '/inc/demo-content.php';

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
	
	// Modify plugin intro text
	add_filter( 'ocdi/plugin_intro_text', 'cityclub_plugin_intro_text' );
	
	// Enable the option to overwrite existing content
	add_filter( 'ocdi/enable_custom_menu_items_check', '__return_true' );
}
add_action( 'after_setup_theme', 'cityclub_demo_import_setup' );

/**
 * Modify plugin intro text
 */
function cityclub_plugin_intro_text( $default_text ) {
	$custom_text = '<div class="ocdi__intro-text">';
	$custom_text .= '<h2>' . esc_html__( 'CityClub Demo Import', 'cityclub' ) . '</h2>';
	$custom_text .= '<p>' . esc_html__( 'This will import the complete demo content including all pages with their designs, styles, and sections. Your site will look exactly like the demo.', 'cityclub' ) . '</p>';
	$custom_text .= '<p><strong>' . esc_html__( 'Important:', 'cityclub' ) . '</strong> ' . esc_html__( 'The import process may take a few minutes. Please be patient and do not close this page until the import is complete.', 'cityclub' ) . '</p>';
	$custom_text .= '</div>';
	
	return $custom_text;
}

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
			'import_redux'               => array(
				array(
					'file_url'    => 'https://cityclub.ma/demo-content/redux.json',
					'option_name' => 'cityclub_options',
				),
			),
			'import_preview_image_url'   => 'https://cityclub.ma/demo-content/preview.jpg',
			'preview_url'               => 'https://demo.cityclub.ma/',
			'import_notice'              => __( 'After importing this demo, you will have all pages with complete designs, styles and sections ready to use.', 'cityclub' ),
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

	if ( $main_menu && $footer_menu ) {
		set_theme_mod( 'nav_menu_locations', array(
			'primary' => $main_menu->term_id,
			'footer'  => $footer_menu->term_id,
		) );
	}

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
	
	// Import all Elementor templates
	cityclub_import_elementor_templates();
	
	// Create additional demo pages if they don't exist
	cityclub_create_demo_pages();

	// Flush rewrite rules
	flush_rewrite_rules();
	
	// Show success message
	add_action( 'admin_notices', 'cityclub_import_success_notice' );
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
	update_option( 'elementor_page_title_selector', '.entry-title' );
	update_option( 'elementor_viewport_lg', 1025 );
	update_option( 'elementor_viewport_md', 768 );
	update_option( 'elementor_global_image_lightbox', 'yes' );
	update_option( 'elementor_space_between_widgets', '20' );

	// Add default Elementor colors
	$elementor_colors = array(
		1 => '#f26f21', // Primary
		2 => '#000000', // Secondary
		3 => '#333333', // Text
		4 => '#f8f8f8', // Light
		5 => '#222222', // Dark
	);

	update_option( 'elementor_scheme_color', $elementor_colors );
	
	// Add default typography
	$elementor_typography = array(
		1 => array(
			'font_family' => 'Poppins',
			'font_weight' => '700',
		),
		2 => array(
			'font_family' => 'Poppins',
			'font_weight' => '600',
		),
		3 => array(
			'font_family' => 'Poppins',
			'font_weight' => '500',
		),
		4 => array(
			'font_family' => 'Poppins',
			'font_weight' => '400',
		),
	);
	
	update_option( 'elementor_scheme_typography', $elementor_typography );
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

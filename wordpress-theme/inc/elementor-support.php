<?php
/**
 * Elementor support for CityClub theme
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Elementor support
 */
function cityclub_elementor_support() {
	// Add support for Elementor Pro locations
	add_theme_support( 'elementor-pro' );

	// Register locations for Elementor Pro
	add_action( 'elementor/theme/register_locations', 'cityclub_register_elementor_locations' );

	// Register custom widgets
	add_action( 'elementor/widgets/widgets_registered', 'cityclub_register_elementor_widgets' );

	// Register custom categories
	add_action( 'elementor/elements/categories_registered', 'cityclub_register_elementor_categories' );
}
add_action( 'after_setup_theme', 'cityclub_elementor_support' );

/**
 * Register Elementor Pro Theme Builder locations
 *
 * @param \ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $locations_manager Locations manager.
 */
function cityclub_register_elementor_locations( $locations_manager ) {
	$locations_manager->register_all_core_location();

	// Register custom locations
	$locations_manager->register_location(
		'hero',
		[
			'label'    => __( 'Hero Section', 'cityclub' ),
			'multiple' => false,
			'edit_in_content' => true,
		]
	);

	$locations_manager->register_location(
		'stats',
		[
			'label'    => __( 'Stats Section', 'cityclub' ),
			'multiple' => false,
			'edit_in_content' => true,
		]
	);

	$locations_manager->register_location(
		'activities',
		[
			'label'    => __( 'Activities Section', 'cityclub' ),
			'multiple' => false,
			'edit_in_content' => true,
		]
	);

	$locations_manager->register_location(
		'membership',
		[
			'label'    => __( 'Membership Section', 'cityclub' ),
			'multiple' => false,
			'edit_in_content' => true,
		]
	);

	$locations_manager->register_location(
		'coaches',
		[
			'label'    => __( 'Coaches Section', 'cityclub' ),
			'multiple' => false,
			'edit_in_content' => true,
		]
	);
}

/**
 * Register custom Elementor widgets
 */
function cityclub_register_elementor_widgets() {
	// Make sure the Elementor autoloader is running
	if ( ! class_exists( '\Elementor\Widget_Base' ) ) {
		return;
	}

	// Include widget files
	require_once get_template_directory() . '/inc/elementor-widgets/class-cityclub-hero-widget.php';
	require_once get_template_directory() . '/inc/elementor-widgets/class-cityclub-stats-widget.php';
	require_once get_template_directory() . '/inc/elementor-widgets/class-cityclub-activities-widget.php';
	require_once get_template_directory() . '/inc/elementor-widgets/class-cityclub-membership-widget.php';
	require_once get_template_directory() . '/inc/elementor-widgets/class-cityclub-coaches-widget.php';
	require_once get_template_directory() . '/inc/elementor-widgets/class-cityclub-testimonials-widget.php';
	require_once get_template_directory() . '/inc/elementor-widgets/class-cityclub-club-map-widget.php';

	// Register widgets
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Hero_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Stats_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Activities_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Membership_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Coaches_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Testimonials_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Club_Map_Widget() );
}

/**
 * Register custom Elementor categories
 *
 * @param \Elementor\Elements_Manager $elements_manager Elements manager.
 */
function cityclub_register_elementor_categories( $elements_manager ) {
	$elements_manager->add_category(
		'cityclub',
		[
			'title' => __( 'CityClub', 'cityclub' ),
			'icon'  => 'fa fa-dumbbell',
		]
	);
}

/**
 * Add custom controls to Elementor
 */
function cityclub_add_elementor_controls( $controls_manager ) {
	// Add custom controls here
}
add_action( 'elementor/controls/controls_registered', 'cityclub_add_elementor_controls' );

/**
 * Enqueue Elementor styles and scripts
 */
function cityclub_elementor_scripts() {
	// Only load on Elementor edit mode
	if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		wp_enqueue_style( 'cityclub-elementor-editor', get_template_directory_uri() . '/assets/css/elementor-editor.css', [], CITYCLUB_VERSION );
	}
}
add_action( 'elementor/editor/after_enqueue_styles', 'cityclub_elementor_scripts' );

/**
 * Add custom fonts to Elementor
 *
 * @param array $fonts Default fonts.
 * @return array Modified fonts.
 */
function cityclub_elementor_fonts( $fonts ) {
	$custom_fonts = [
		'Poppins' => 'system',
	];

	return array_merge( $fonts, $custom_fonts );
}
add_filter( 'elementor/fonts/additional_fonts', 'cityclub_elementor_fonts' );

/**
 * Add default Elementor templates
 */
function cityclub_add_elementor_templates() {
	// Only run once
	if ( get_option( 'cityclub_elementor_templates_imported' ) ) {
		return;
	}

	// Check if Elementor is active
	if ( ! class_exists( '\Elementor\Plugin' ) ) {
		return;
	}

	// Import templates
	$templates_dir = get_template_directory() . '/inc/elementor-templates/';
	$templates = [
		'home' => [
			'title' => 'CityClub Home',
			'file' => $templates_dir . 'home.json',
		],
		'about' => [
			'title' => 'CityClub About',
			'file' => $templates_dir . 'about.json',
		],
		'contact' => [
			'title' => 'CityClub Contact',
			'file' => $templates_dir . 'contact.json',
		],
	];

	// Import each template
	foreach ( $templates as $template ) {
		if ( file_exists( $template['file'] ) ) {
			$template_data = json_decode( file_get_contents( $template['file'] ), true );
			
			$args = [
				'post_title' => $template['title'],
				'post_status' => 'publish',
				'post_type' => 'elementor_library',
			];
			
			$post_id = wp_insert_post( $args );
			
			if ( ! is_wp_error( $post_id ) ) {
				update_post_meta( $post_id, '_elementor_data', wp_slash( json_encode( $template_data ) ) );
				update_post_meta( $post_id, '_elementor_template_type', 'page' );
				update_post_meta( $post_id, '_elementor_edit_mode', 'builder' );
			}
		}
	}

	// Mark as imported
	update_option( 'cityclub_elementor_templates_imported', true );
}
add_action( 'admin_init', 'cityclub_add_elementor_templates' );

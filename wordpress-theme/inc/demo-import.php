<?php
/**
 * Demo Import functionality for CityClub theme
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Initialize the demo import functionality
 */
function cityclub_demo_import_setup() {
	// Check if One Click Demo Import plugin is active
	if ( ! class_exists( 'OCDI_Plugin' ) ) {
		// Add admin notice to install the plugin
		add_action( 'admin_notices', 'cityclub_demo_import_plugin_notice' );
		return;
	}

	// Register demo import
	add_filter( 'ocdi/register_demos', 'cityclub_register_demo_imports' );

	// Disable generation of smaller images during import
	add_filter( 'ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

	// Change the location of the local import files
	add_filter( 'ocdi/import_files', 'cityclub_import_files' );

	// Actions to perform after import
	add_action( 'ocdi/after_import', 'cityclub_after_import_setup' );

	// Add intro text to the demo import page
	add_filter( 'ocdi/plugin_intro_text', 'cityclub_demo_import_intro_text' );

	// Disable the branding notice
	add_filter( 'ocdi/disable_pt_branding', '__return_true' );
}
add_action( 'after_setup_theme', 'cityclub_demo_import_setup' );

/**
 * Admin notice to install One Click Demo Import plugin
 */
function cityclub_demo_import_plugin_notice() {
	$screen = get_current_screen();
	if ( $screen->id !== 'appearance_page_cityclub-demo-import' ) {
		return;
	}
	?>
	<div class="notice notice-warning is-dismissible">
		<p>
			<?php esc_html_e( 'Please install and activate the "One Click Demo Import" plugin to import the CityClub demo content.', 'cityclub' ); ?>
			<a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=one-click-demo-import&tab=search&type=term' ) ); ?>" class="button button-primary">
				<?php esc_html_e( 'Install Plugin', 'cityclub' ); ?>
			</a>
		</p>
	</div>
	<?php
}

/**
 * Register demo imports
 *
 * @param array $demos Demo imports.
 * @return array Modified demo imports.
 */
function cityclub_register_demo_imports( $demos ) {
	$demos['cityclub'] = array(
		'import_file_name'           => 'CityClub Demo',
		'categories'                 => array( 'Fitness', 'Gym' ),
		'import_file_url'            => 'https://cityclub.ma/demo-content/cityclub-demo-content.xml',
		'import_widget_file_url'     => 'https://cityclub.ma/demo-content/cityclub-widgets.wie',
		'import_customizer_file_url' => 'https://cityclub.ma/demo-content/cityclub-customizer.dat',
		'preview_url'               => 'https://cityclub.ma/demo/',
	);

	return $demos;
}

/**
 * Local import files
 *
 * @return array Import files.
 */
function cityclub_import_files() {
	return array(
		array(
			'import_file_name'             => 'CityClub Main Demo',
			'categories'                   => array( 'Fitness', 'Gym' ),
			'local_import_file'            => get_template_directory() . '/inc/demo-data/demo-content.xml',
			'local_import_widget_file'     => get_template_directory() . '/inc/demo-data/widgets.wie',
			'local_import_customizer_file' => get_template_directory() . '/inc/demo-data/customizer.dat',
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo-data/preview-main.jpg',
			'preview_url'                 => 'https://cityclub.ma/demo/',
		),
		array(
			'import_file_name'             => 'CityClub Dark Demo',
			'categories'                   => array( 'Fitness', 'Gym', 'Dark' ),
			'local_import_file'            => get_template_directory() . '/inc/demo-data/demo-content-dark.xml',
			'local_import_widget_file'     => get_template_directory() . '/inc/demo-data/widgets-dark.wie',
			'local_import_customizer_file' => get_template_directory() . '/inc/demo-data/customizer-dark.dat',
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo-data/preview-dark.jpg',
			'preview_url'                 => 'https://cityclub.ma/demo-dark/',
		),
		array(
			'import_file_name'             => 'CityClub Lady Demo',
			'categories'                   => array( 'Fitness', 'Gym', 'Women' ),
			'local_import_file'            => get_template_directory() . '/inc/demo-data/demo-content-lady.xml',
			'local_import_widget_file'     => get_template_directory() . '/inc/demo-data/widgets-lady.wie',
			'local_import_customizer_file' => get_template_directory() . '/inc/demo-data/customizer-lady.dat',
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo-data/preview-lady.jpg',
			'preview_url'                 => 'https://cityclub.ma/demo-lady/',
		),
	);
}

/**
 * Actions to perform after import
 *
 * @param array $selected_import Import data.
 */
function cityclub_after_import_setup( $selected_import ) {
	// Set up menu locations
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary' => $main_menu->term_id,
			'footer'  => $footer_menu->term_id,
		)
	);

	// Set front page and blog page
	$front_page = get_page_by_title( 'Home' );
	$blog_page = get_page_by_title( 'Blog' );

	if ( $front_page ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page->ID );
	}

	if ( $blog_page ) {
		update_option( 'page_for_posts', $blog_page->ID );
	}

	// Import Elementor settings
	cityclub_import_elementor_settings();

	// Assign Elementor templates to locations
	cityclub_assign_elementor_templates();

	// Regenerate Elementor CSS files
	if ( class_exists( '\Elementor\Plugin' ) ) {
		\Elementor\Plugin::instance()->files_manager->clear_cache();
	}

	// Show success message with links to demo pages
	add_action( 'admin_notices', 'cityclub_demo_import_success_notice' );
}

/**
 * Import Elementor settings
 */
function cityclub_import_elementor_settings() {
	if ( ! class_exists( '\Elementor\Plugin' ) ) {
		return;
	}

	$elementor_settings = array(
		'container_width' => 1200,
		'space_between_widgets' => 20,
		'page_title_selector' => 'h1.entry-title',
		'global_image_lightbox' => 'yes',
		'stretched_section_container' => 'body',
	);

	foreach ( $elementor_settings as $key => $value ) {
		update_option( 'elementor_' . $key, $value );
	}

	// Update Elementor color scheme
	$active_kit = get_option( 'elementor_active_kit' );
	if ( $active_kit ) {
		$kit_settings = get_post_meta( $active_kit, '_elementor_page_settings', true );
		if ( ! $kit_settings ) {
			$kit_settings = array();
		}

		$kit_settings['system_colors'] = array(
			array(
				'_id' => 'primary',
				'title' => 'Primary',
				'color' => '#f26f21',
			),
			array(
				'_id' => 'secondary',
				'title' => 'Secondary',
				'color' => '#000000',
			),
			array(
				'_id' => 'text',
				'title' => 'Text',
				'color' => '#333333',
			),
			array(
				'_id' => 'accent',
				'title' => 'Accent',
				'color' => '#e05a10',
			),
		);

		update_post_meta( $active_kit, '_elementor_page_settings', $kit_settings );
	}
}

/**
 * Assign Elementor templates to locations
 */
function cityclub_assign_elementor_templates() {
	if ( ! class_exists( '\ElementorPro\Modules\ThemeBuilder\Module' ) ) {
		return;
	}

	$header_template = get_page_by_title( 'CityClub Header', OBJECT, 'elementor_library' );
	$footer_template = get_page_by_title( 'CityClub Footer', OBJECT, 'elementor_library' );

	if ( $header_template && $footer_template ) {
		$locations = get_option( 'elementor_pro_theme_builder_conditions', array() );

		$locations['header'] = array(
			$header_template->ID => array(
				'include/general' => true,
			),
		);

		$locations['footer'] = array(
			$footer_template->ID => array(
				'include/general' => true,
			),
		);

		update_option( 'elementor_pro_theme_builder_conditions', $locations );
	}
}

/**
 * Demo import success notice
 */
function cityclub_demo_import_success_notice() {
	?>
	<div class="notice notice-success is-dismissible">
		<h3><?php esc_html_e( 'CityClub Demo Import Completed!', 'cityclub' ); ?></h3>
		<p>
			<?php esc_html_e( 'The demo content has been imported successfully. You can now explore the following pages:', 'cityclub' ); ?>
		</p>
		<ul style="list-style-type: disc; padding-left: 20px;">
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank"><?php esc_html_e( 'Home Page', 'cityclub' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" target="_blank"><?php esc_html_e( 'About Page', 'cityclub' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/activities/' ) ); ?>" target="_blank"><?php esc_html_e( 'Activities Page', 'cityclub' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/trainers/' ) ); ?>" target="_blank"><?php esc_html_e( 'Trainers Page', 'cityclub' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/clubs/' ) ); ?>" target="_blank"><?php esc_html_e( 'Clubs Page', 'cityclub' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/membership/' ) ); ?>" target="_blank"><?php esc_html_e( 'Membership Page', 'cityclub' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" target="_blank"><?php esc_html_e( 'Contact Page', 'cityclub' ); ?></a></li>
		</ul>
		<p>
			<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary">
				<?php esc_html_e( 'Customize Theme', 'cityclub' ); ?>
			</a>
			<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=page' ) ); ?>" class="button">
				<?php esc_html_e( 'View All Pages', 'cityclub' ); ?>
			</a>
			<?php if ( class_exists( '\Elementor\Plugin' ) ) : ?>
				<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=elementor_library' ) ); ?>" class="button">
					<?php esc_html_e( 'View Elementor Templates', 'cityclub' ); ?>
				</a>
			<?php endif; ?>
		</p>
	</div>
	<?php
}

/**
 * Demo import intro text
 *
 * @param string $default_text Default intro text.
 * @return string Modified intro text.
 */
function cityclub_demo_import_intro_text( $default_text ) {
	$output = '<div class="cityclub-demo-import-intro">';
	$output .= '<h2>' . esc_html__( 'CityClub Demo Import', 'cityclub' ) . '</h2>';
	$output .= '<p>' . esc_html__( 'Choose one of the pre-built demo layouts below to import. The import process will create pages, posts, menus, and widgets as shown in the demo.', 'cityclub' ) . '</p>';
	
	// Check if Elementor is active
	if ( ! class_exists( '\Elementor\Plugin' ) ) {
		$output .= '<div class="notice notice-warning inline"><p>';
		$output .= esc_html__( 'Elementor Page Builder is required for the full demo experience. Please install and activate Elementor before importing the demo.', 'cityclub' );
		$output .= ' <a href="' . esc_url( admin_url( 'plugin-install.php?s=elementor&tab=search&type=term' ) ) . '" class="button button-primary">' . esc_html__( 'Install Elementor', 'cityclub' ) . '</a>';
		$output .= '</p></div>';
	}
	
	// Check if Elementor Pro is active
	if ( ! class_exists( '\ElementorPro\Plugin' ) ) {
		$output .= '<div class="notice notice-info inline"><p>';
		$output .= esc_html__( 'Elementor Pro is recommended for the full demo experience. Some features may not be available without Elementor Pro.', 'cityclub' );
		$output .= ' <a href="https://elementor.com/pro/" target="_blank" class="button">' . esc_html__( 'Get Elementor Pro', 'cityclub' ) . '</a>';
		$output .= '</p></div>';
	}
	
	$output .= '<div class="cityclub-demo-preview">';
	$output .= '<h3>' . esc_html__( 'Demo Preview', 'cityclub' ) . '</h3>';
	$output .= '<div class="cityclub-demo-screenshots">';
	$output .= '<div class="cityclub-screenshot">';
	$output .= '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/demo/home-preview.jpg" alt="Home Page">';
	$output .= '<span>Home Page</span>';
	$output .= '</div>';
	$output .= '<div class="cityclub-screenshot">';
	$output .= '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/demo/about-preview.jpg" alt="About Page">';
	$output .= '<span>About Page</span>';
	$output .= '</div>';
	$output .= '<div class="cityclub-screenshot">';
	$output .= '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/demo/classes-preview.jpg" alt="Classes Page">';
	$output .= '<span>Classes Page</span>';
	$output .= '</div>';
	$output .= '<div class="cityclub-screenshot">';
	$output .= '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/demo/trainers-preview.jpg" alt="Trainers Page">';
	$output .= '<span>Trainers Page</span>';
	$output .= '</div>';
	$output .= '</div>'; // .cityclub-demo-screenshots
	$output .= '<a href="https://cityclub.ma/demo/" class="button button-primary" target="_blank">' . esc_html__( 'View Full Demo', 'cityclub' ) . '</a>';
	$output .= '</div>'; // .cityclub-demo-preview
	
	$output .= '</div>'; // .cityclub-demo-import-intro

	return $output;
}

/**
 * Add admin page for demo import
 */
function cityclub_add_demo_import_page() {
	add_theme_page(
		__( 'Import Demo Data', 'cityclub' ),
		__( 'Import Demo Data', 'cityclub' ),
		'manage_options',
		'cityclub-demo-import',
		'cityclub_demo_import_page_content'
	);
}
add_action( 'admin_menu', 'cityclub_add_demo_import_page' );

/**
 * Demo import page content
 */
function cityclub_demo_import_page_content() {
	// Check if One Click Demo Import plugin is active
	if ( class_exists( 'OCDI_Plugin' ) ) {
		// Redirect to the plugin's import page
		wp_redirect( admin_url( 'themes.php?page=one-click-demo-import' ) );
		exit;
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'CityClub Demo Import', 'cityclub' ); ?></h1>
		
		<div class="notice notice-warning">
			<p>
				<?php esc_html_e( 'The "One Click Demo Import" plugin is required to import the demo content.', 'cityclub' ); ?>
			</p>
			<p>
				<a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=one-click-demo-import&tab=search&type=term' ) ); ?>" class="button button-primary">
					<?php esc_html_e( 'Install & Activate Plugin', 'cityclub' ); ?>
				</a>
			</p>
		</div>
		
		<div class="cityclub-demo-preview">
			<h3><?php esc_html_e( 'Demo Preview', 'cityclub' ); ?></h3>
			<p><?php esc_html_e( 'Here\'s a preview of what you\'ll get after importing the demo content:', 'cityclub' ); ?></p>
			
			<div class="cityclub-demo-screenshots">
				<div class="cityclub-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/demo/home-preview.jpg" alt="Home Page">
					<span><?php esc_html_e( 'Home Page', 'cityclub' ); ?></span>
				</div>
				<div class="cityclub-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/demo/about-preview.jpg" alt="About Page">
					<span><?php esc_html_e( 'About Page', 'cityclub' ); ?></span>
				</div>
				<div class="cityclub-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/demo/classes-preview.jpg" alt="Classes Page">
					<span><?php esc_html_e( 'Classes Page', 'cityclub' ); ?></span>
				</div>
				<div class="cityclub-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/demo/trainers-preview.jpg" alt="Trainers Page">
					<span><?php esc_html_e( 'Trainers Page', 'cityclub' ); ?></span>
				</div>
			</div>
			
			<a href="https://cityclub.ma/demo/" class="button button-primary" target="_blank">
				<?php esc_html_e( 'View Full Demo', 'cityclub' ); ?>
			</a>
		</div>
		
		<div class="cityclub-demo-import-steps">
			<h3><?php esc_html_e( 'Import Steps', 'cityclub' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Install and activate the "One Click Demo Import" plugin', 'cityclub' ); ?></li>
				<li><?php esc_html_e( 'Return to this page and click on "Import Demo Data"', 'cityclub' ); ?></li>
				<li><?php esc_html_e( 'Choose the demo you want to import', 'cityclub' ); ?></li>
				<li><?php esc_html_e( 'Wait for the import process to complete', 'cityclub' ); ?></li>
				<li><?php esc_html_e( 'Customize your site as needed', 'cityclub' ); ?></li>
			</ol>
		</div>
	</div>
	<?php
}

/**
 * Enqueue demo import styles
 */
function cityclub_demo_import_styles() {
	$screen = get_current_screen();
	if ( $screen->id === 'appearance_page_cityclub-demo-import' || $screen->id === 'appearance_page_one-click-demo-import' ) {
		wp_enqueue_style( 'cityclub-demo-import', get_template_directory_uri() . '/assets/css/admin/demo-import.css', array(), CITYCLUB_VERSION );
	}

	// Also enqueue on the demo content preview page
	if ( $screen->id === 'appearance_page_pt-one-click-demo-import' ) {
		wp_enqueue_style( 'cityclub-demo-content-preview', get_template_directory_uri() . '/assets/css/admin/demo-content-preview.css', array(), CITYCLUB_VERSION );
		wp_enqueue_script( 'cityclub-demo-content-preview', get_template_directory_uri() . '/assets/js/admin/demo-content-preview.js', array( 'jquery' ), CITYCLUB_VERSION, true );

		// Localize the script with demo preview data
		wp_localize_script(
			'cityclub-demo-content-preview',
			'cityclubDemoPreview',
			array(
				'previewTitle'       => __( 'Demo Content Preview', 'cityclub' ),
				'previewDescription' => __( 'Here\'s a preview of what you\'ll get after importing the demo content:', 'cityclub' ),
				'homeScreenshot'     => get_template_directory_uri() . '/assets/images/demo/home-preview.jpg',
				'aboutScreenshot'    => get_template_directory_uri() . '/assets/images/demo/about-preview.jpg',
				'classesScreenshot'  => get_template_directory_uri() . '/assets/images/demo/classes-preview.jpg',
				'trainersScreenshot' => get_template_directory_uri() . '/assets/images/demo/trainers-preview.jpg',
				'demoUrl'            => 'https://cityclub.ma/demo/',
				'viewDemoText'       => __( 'View Full Demo', 'cityclub' ),
			)
		);
	}
}
add_action( 'admin_enqueue_scripts', 'cityclub_demo_import_styles' );

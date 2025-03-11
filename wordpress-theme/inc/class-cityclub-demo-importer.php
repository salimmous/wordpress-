<?php
/**
 * CityClub Demo Importer Class
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * CityClub Demo Importer Class
 */
class CityClub_Demo_Importer {

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;

	/**
	 * Demo data directory.
	 *
	 * @var string
	 */
	protected $demo_dir = '';

	/**
	 * Available demos.
	 *
	 * @var array
	 */
	protected $demos = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->demo_dir = get_template_directory() . '/inc/demo-data/';

		// Define available demos
		$this->demos = array(
			'main' => array(
				'name'        => __( 'Main Demo', 'cityclub' ),
				'description' => __( 'The main demo with all features.', 'cityclub' ),
				'preview'     => get_template_directory_uri() . '/inc/demo-data/preview-main.jpg',
				'demo_url'    => 'https://cityclub.ma/demo/',
				'files'       => array(
					'content'    => $this->demo_dir . 'demo-content.xml',
					'widgets'    => $this->demo_dir . 'widgets.wie',
					'customizer' => $this->demo_dir . 'customizer.dat',
				),
			),
			'dark' => array(
				'name'        => __( 'Dark Demo', 'cityclub' ),
				'description' => __( 'A dark version of the demo.', 'cityclub' ),
				'preview'     => get_template_directory_uri() . '/inc/demo-data/preview-dark.jpg',
				'demo_url'    => 'https://cityclub.ma/demo-dark/',
				'files'       => array(
					'content'    => $this->demo_dir . 'demo-content-dark.xml',
					'widgets'    => $this->demo_dir . 'widgets-dark.wie',
					'customizer' => $this->demo_dir . 'customizer-dark.dat',
				),
			),
			'lady' => array(
				'name'        => __( 'Lady Demo', 'cityclub' ),
				'description' => __( 'A women-focused version of the demo.', 'cityclub' ),
				'preview'     => get_template_directory_uri() . '/inc/demo-data/preview-lady.jpg',
				'demo_url'    => 'https://cityclub.ma/demo-lady/',
				'files'       => array(
					'content'    => $this->demo_dir . 'demo-content-lady.xml',
					'widgets'    => $this->demo_dir . 'widgets-lady.wie',
					'customizer' => $this->demo_dir . 'customizer-lady.dat',
				),
			),
		);

		// Add admin page
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );

		// Enqueue admin scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// AJAX handlers
		add_action( 'wp_ajax_cityclub_import_demo', array( $this, 'import_demo' ) );
	}

	/**
	 * Get instance of this class.
	 *
	 * @return CityClub_Demo_Importer
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Add admin menu item.
	 */
	public function add_admin_menu() {
		add_theme_page(
			__( 'Import Demo Content', 'cityclub' ),
			__( 'Import Demo Content', 'cityclub' ),
			'manage_options',
			'cityclub-demo-import',
			array( $this, 'admin_page' )
		);
	}

	/**
	 * Enqueue admin scripts.
	 *
	 * @param string $hook Hook suffix.
	 */
	public function enqueue_scripts( $hook ) {
		if ( 'appearance_page_cityclub-demo-import' !== $hook ) {
			return;
		}

		wp_enqueue_style( 'cityclub-demo-import', get_template_directory_uri() . '/assets/css/admin/demo-import.css', array(), CITYCLUB_VERSION );
		wp_enqueue_script( 'cityclub-demo-import', get_template_directory_uri() . '/assets/js/admin/demo-import.js', array( 'jquery' ), CITYCLUB_VERSION, true );

		wp_localize_script(
			'cityclub-demo-import',
			'cityclubDemoImport',
			array(
				'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
				'nonce'         => wp_create_nonce( 'cityclub-demo-import' ),
				'importingText' => __( 'Importing...', 'cityclub' ),
				'importedText'  => __( 'Imported!', 'cityclub' ),
				'errorText'     => __( 'Error!', 'cityclub' ),
			)
		);
	}

	/**
	 * Admin page content.
	 */
	public function admin_page() {
		?>
		<div class="wrap cityclub-demo-import-wrap">
			<h1><?php esc_html_e( 'Import Demo Content', 'cityclub' ); ?></h1>

			<div class="cityclub-demo-import-intro">
				<p><?php esc_html_e( 'Choose one of the pre-built demo layouts below to import. The import process will create pages, posts, menus, and widgets as shown in the demo.', 'cityclub' ); ?></p>
				
				<?php if ( ! class_exists( '\Elementor\Plugin' ) ) : ?>
					<div class="notice notice-warning">
						<p>
							<?php esc_html_e( 'Elementor Page Builder is required for the full demo experience. Please install and activate Elementor before importing the demo.', 'cityclub' ); ?>
							<a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=elementor&tab=search&type=term' ) ); ?>" class="button button-primary">
								<?php esc_html_e( 'Install Elementor', 'cityclub' ); ?>
							</a>
						</p>
					</div>
				<?php endif; ?>
				
				<?php if ( ! class_exists( '\ElementorPro\Plugin' ) ) : ?>
					<div class="notice notice-info">
						<p>
							<?php esc_html_e( 'Elementor Pro is recommended for the full demo experience. Some features may not be available without Elementor Pro.', 'cityclub' ); ?>
							<a href="https://elementor.com/pro/" target="_blank" class="button">
								<?php esc_html_e( 'Get Elementor Pro', 'cityclub' ); ?>
							</a>
						</p>
					</div>
				<?php endif; ?>
			</div>

			<div class="cityclub-demos-container">
				<?php foreach ( $this->demos as $demo_id => $demo ) : ?>
					<div class="cityclub-demo-item" data-demo-id="<?php echo esc_attr( $demo_id ); ?>">
						<div class="cityclub-demo-preview">
							<img src="<?php echo esc_url( $demo['preview'] ); ?>" alt="<?php echo esc_attr( $demo['name'] ); ?>">
							<div class="cityclub-demo-actions">
								<a href="<?php echo esc_url( $demo['demo_url'] ); ?>" class="button" target="_blank">
									<?php esc_html_e( 'Preview', 'cityclub' ); ?>
								</a>
								<button class="button button-primary cityclub-import-demo-button" data-demo-id="<?php echo esc_attr( $demo_id ); ?>">
									<?php esc_html_e( 'Import', 'cityclub' ); ?>
								</button>
							</div>
						</div>
						<h3><?php echo esc_html( $demo['name'] ); ?></h3>
						<p><?php echo esc_html( $demo['description'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="cityclub-import-modal" style="display: none;">
				<div class="cityclub-import-modal-content">
					<span class="cityclub-import-modal-close">&times;</span>
					<h2><?php esc_html_e( 'Importing Demo Content', 'cityclub' ); ?></h2>
					<p><?php esc_html_e( 'Please wait while we import the demo content. This may take a few minutes.', 'cityclub' ); ?></p>
					
					<div class="cityclub-import-progress">
						<div class="cityclub-import-progress-bar"></div>
						<div class="cityclub-import-progress-message">
							<?php esc_html_e( 'Preparing import...', 'cityclub' ); ?>
						</div>
					</div>
					
					<div class="cityclub-import-complete" style="display: none;">
						<h3><?php esc_html_e( 'Import Complete!', 'cityclub' ); ?></h3>
						<p><?php esc_html_e( 'The demo content has been imported successfully.', 'cityclub' ); ?></p>
						<div class="cityclub-import-actions">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button button-primary" target="_blank">
								<?php esc_html_e( 'View Site', 'cityclub' ); ?>
							</a>
							<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button">
								<?php esc_html_e( 'Customize', 'cityclub' ); ?>
							</a>
						</div>
					</div>
					
					<div class="cityclub-import-error" style="display: none;">
						<h3><?php esc_html_e( 'Import Failed', 'cityclub' ); ?></h3>
						<p class="cityclub-import-error-message"></p>
						<div class="cityclub-import-actions">
							<button class="button cityclub-import-close-button">
								<?php esc_html_e( 'Close', 'cityclub' ); ?>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Import demo content.
	 */
	public function import_demo() {
		// Check nonce
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'cityclub-demo-import' ) ) {
			wp_send_json_error( array( 'message' => __( 'Invalid nonce.', 'cityclub' ) ) );
		}

		// Check demo ID
		if ( ! isset( $_POST['demo_id'] ) || ! array_key_exists( sanitize_text_field( wp_unslash( $_POST['demo_id'] ) ), $this->demos ) ) {
			wp_send_json_error( array( 'message' => __( 'Invalid demo ID.', 'cityclub' ) ) );
		}

		$demo_id = sanitize_text_field( wp_unslash( $_POST['demo_id'] ) );
		$demo = $this->demos[ $demo_id ];

		// Check if required plugins are active
		if ( ! class_exists( '\Elementor\Plugin' ) ) {
			wp_send_json_error( array( 'message' => __( 'Elementor Page Builder is required for the demo import.', 'cityclub' ) ) );
		}

		// Import content
		$result = $this->import_content( $demo['files']['content'] );
		if ( is_wp_error( $result ) ) {
			wp_send_json_error( array( 'message' => $result->get_error_message() ) );
		}

		// Import widgets
		$result = $this->import_widgets( $demo['files']['widgets'] );
		if ( is_wp_error( $result ) ) {
			wp_send_json_error( array( 'message' => $result->get_error_message() ) );
		}

		// Import customizer settings
		$result = $this->import_customizer( $demo['files']['customizer'] );
		if ( is_wp_error( $result ) ) {
			wp_send_json_error( array( 'message' => $result->get_error_message() ) );
		}

		// Set up menus
		$this->setup_menus();

		// Set up home page
		$this->setup_home_page();

		// Set up Elementor settings
		$this->setup_elementor();

		// Success
		wp_send_json_success( array( 'message' => __( 'Demo content imported successfully.', 'cityclub' ) ) );
	}

	/**
	 * Import content.
	 *
	 * @param string $file File path.
	 * @return true|WP_Error True on success, WP_Error on failure.
	 */
	protected function import_content( $file ) {
		if ( ! file_exists( $file ) ) {
			return new WP_Error( 'file_not_found', __( 'Content file not found.', 'cityclub' ) );
		}

		// Load WordPress Importer
		if ( ! class_exists( 'WP_Importer' ) ) {
			require ABSPATH . '/wp-admin/includes/class-wp-importer.php';
		}

		if ( ! class_exists( 'WP_Import' ) ) {
			require get_template_directory() . '/inc/importers/wordpress-importer.php';
		}

		$importer = new WP_Import();
		$importer->fetch_attachments = true;

		// Import content
		ob_start();
		$importer->import( $file );
		ob_end_clean();

		return true;
	}

	/**
	 * Import widgets.
	 *
	 * @param string $file File path.
	 * @return true|WP_Error True on success, WP_Error on failure.
	 */
	protected function import_widgets( $file ) {
		if ( ! file_exists( $file ) ) {
			return new WP_Error( 'file_not_found', __( 'Widgets file not found.', 'cityclub' ) );
		}

		// Load Widget Importer
		if ( ! class_exists( 'CityClub_Widget_Importer' ) ) {
			require get_template_directory() . '/inc/importers/class-widget-importer.php';
		}

		$widget_importer = new CityClub_Widget_Importer();

		// Import widgets
		$result = $widget_importer->import( $file );

		if ( is_wp_error( $result ) ) {
			return $result;
		}

		return true;
	}

	/**
	 * Import customizer settings.
	 *
	 * @param string $file File path.
	 * @return true|WP_Error True on success, WP_Error on failure.
	 */
	protected function import_customizer( $file ) {
		if ( ! file_exists( $file ) ) {
			return new WP_Error( 'file_not_found', __( 'Customizer file not found.', 'cityclub' ) );
		}

		// Load Customizer Importer
		if ( ! class_exists( 'CityClub_Customizer_Importer' ) ) {
			require get_template_directory() . '/inc/importers/class-customizer-importer.php';
		}

		$customizer_importer = new CityClub_Customizer_Importer();

		// Import customizer settings
		$result = $customizer_importer->import( $file );

		if ( is_wp_error( $result ) ) {
			return $result;
		}

		return true;
	}

	/**
	 * Set up menus.
	 */
	protected function setup_menus() {
		// Get menus
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

		// Set menu locations
		if ( $main_menu && $footer_menu ) {
			set_theme_mod(
				'nav_menu_locations',
				array(
					'primary' => $main_menu->term_id,
					'footer'  => $footer_menu->term_id,
				)
			);
		}
	}

	/**
	 * Set up home page.
	 */
	protected function setup_home_page() {
		// Get home page
		$home_page = get_page_by_title( 'Home' );

		// Set front page
		if ( $home_page ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $home_page->ID );
		}

		// Get blog page
		$blog_page = get_page_by_title( 'Blog' );

		// Set blog page
		if ( $blog_page ) {
			update_option( 'page_for_posts', $blog_page->ID );
		}
	}

	/**
	 * Set up Elementor settings.
	 */
	protected function setup_elementor() {
		if ( ! class_exists( '\Elementor\Plugin' ) ) {
			return;
		}

		// Set default settings
		update_option( 'elementor_disable_color_schemes', 'yes' );
		update_option( 'elementor_disable_typography_schemes', 'yes' );
		update_option( 'elementor_container_width', 1200 );
		update_option( 'elementor_space_between_widgets', 20 );
		update_option( 'elementor_page_title_selector', 'h1.entry-title' );
		update_option( 'elementor_global_image_lightbox', 'yes' );
		update_option( 'elementor_stretched_section_container', 'body' );

		// Set Elementor Pro settings
		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			// Get templates
			$header_template = get_page_by_title( 'CityClub Header', OBJECT, 'elementor_library' );
			$footer_template = get_page_by_title( 'CityClub Footer', OBJECT, 'elementor_library' );

			// Set template locations
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

		// Regenerate CSS
		\Elementor\Plugin::instance()->files_manager->clear_cache();
	}
}

// Initialize the demo importer
CityClub_Demo_Importer::get_instance();

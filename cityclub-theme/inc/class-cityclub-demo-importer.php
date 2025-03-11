<?php
/**
 * Demo Importer Class
 *
 * @package CityClub
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'CityClub_Demo_Importer' ) ) :

	/**
	 * CityClub Demo Importer Class
	 */
	class CityClub_Demo_Importer {

		/**
		 * Instance
		 *
		 * @var CityClub_Demo_Importer The single instance of the class
		 */
		protected static $instance = null;

		/**
		 * Main CityClub_Demo_Importer Instance
		 *
		 * @return CityClub_Demo_Importer Main instance
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			// Add theme page
			add_action( 'admin_menu', array( $this, 'add_theme_page' ) );

			// Enqueue admin scripts
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			// AJAX handlers
			add_action( 'wp_ajax_cityclub_import_demo', array( $this, 'import_demo' ) );
			add_action( 'wp_ajax_cityclub_install_plugin', array( $this, 'install_plugin' ) );
			add_action( 'wp_ajax_cityclub_activate_plugin', array( $this, 'activate_plugin' ) );
		}

		/**
		 * Add theme page
		 */
		public function add_theme_page() {
			add_theme_page(
				__( 'Import Demo Data', 'cityclub' ),
				__( 'Import Demo Data', 'cityclub' ),
				'manage_options',
				'cityclub-demo-import',
				array( $this, 'render_theme_page' )
			);
		}

		/**
		 * Enqueue scripts
		 */
		public function enqueue_scripts( $hook ) {
			if ( 'appearance_page_cityclub-demo-import' !== $hook && 'appearance_page_pt-one-click-demo-import' !== $hook ) {
				return;
			}

			wp_enqueue_style(
				'cityclub-demo-import',
				get_template_directory_uri() . '/assets/css/admin/demo-import.css',
				array(),
				filemtime( get_template_directory() . '/assets/css/admin/demo-import.css' )
			);
			
			wp_enqueue_style(
				'cityclub-demo-content-preview',
				get_template_directory_uri() . '/assets/css/admin/demo-content-preview.css',
				array(),
				filemtime( get_template_directory() . '/assets/css/admin/demo-content-preview.css' )
			);

			wp_enqueue_script(
				'cityclub-demo-import',
				get_template_directory_uri() . '/assets/js/admin/demo-import.js',
				array( 'jquery' ),
				filemtime( get_template_directory() . '/assets/js/admin/demo-import.js' ),
				true
			);
			
			wp_enqueue_script(
				'cityclub-demo-content-preview',
				get_template_directory_uri() . '/assets/js/admin/demo-content-preview.js',
				array( 'jquery' ),
				filemtime( get_template_directory() . '/assets/js/admin/demo-content-preview.js' ),
				true
			);

			wp_localize_script(
				'cityclub-demo-import',
				'cityclubDemoImport',
				array(
					'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
					'nonce'     => wp_create_nonce( 'cityclub-demo-import' ),
					'installing' => __( 'Installing...', 'cityclub' ),
					'installed' => __( 'Installed', 'cityclub' ),
					'activating' => __( 'Activating...', 'cityclub' ),
					'activated' => __( 'Activated', 'cityclub' ),
					'importing' => __( 'Importing...', 'cityclub' ),
					'imported'  => __( 'Imported', 'cityclub' ),
					'error'     => __( 'Error', 'cityclub' ),
				)
			);
			
			wp_localize_script(
				'cityclub-demo-content-preview',
				'cityclubDemoPreview',
				array(
					'previewTitle' => __( 'Preview Demo Content', 'cityclub' ),
					'previewDescription' => __( 'Here\'s a preview of what your site will look like after importing the demo content.', 'cityclub' ),
					'homeScreenshot' => get_template_directory_uri() . '/assets/images/demo/home-preview.jpg',
					'aboutScreenshot' => get_template_directory_uri() . '/assets/images/demo/about-preview.jpg',
					'classesScreenshot' => get_template_directory_uri() . '/assets/images/demo/classes-preview.jpg',
					'trainersScreenshot' => get_template_directory_uri() . '/assets/images/demo/trainers-preview.jpg',
					'demoUrl' => 'https://demo.cityclub.ma/',
					'viewDemoText' => __( 'View Full Demo', 'cityclub' ),
				)
			);
		}

		/**
		 * Render theme page
		 */
		public function render_theme_page() {
			$plugins = $this->get_required_plugins();
			?>
			<div class="wrap cityclub-demo-import-wrap">
				<h1><?php esc_html_e( 'Import Demo Data', 'cityclub' ); ?></h1>

				<div class="cityclub-demo-import-container">
					<div class="cityclub-demo-import-header">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/demo/home-preview.jpg' ); ?>" alt="<?php esc_attr_e( 'Demo Preview', 'cityclub' ); ?>" class="cityclub-demo-preview">
						<div class="cityclub-demo-import-header-content">
							<h2><?php esc_html_e( 'CityClub Demo Import', 'cityclub' ); ?></h2>
							<p><?php esc_html_e( 'This will import the complete demo content including all pages with their designs, styles, and sections. Your site will look exactly like the demo.', 'cityclub' ); ?></p>
							<p><strong><?php esc_html_e( 'Important:', 'cityclub' ); ?></strong> <?php esc_html_e( 'The import process may take a few minutes. Please be patient and do not close this page until the import is complete.', 'cityclub' ); ?></p>
						</div>
					</div>

					<div class="cityclub-demo-import-plugins">
						<h3><?php esc_html_e( 'Required Plugins', 'cityclub' ); ?></h3>
						<p><?php esc_html_e( 'The following plugins are required for the demo import. Please install and activate them before importing the demo content.', 'cityclub' ); ?></p>

						<ul class="cityclub-plugin-list">
							<?php foreach ( $plugins as $plugin ) : ?>
								<li class="cityclub-plugin-item" data-slug="<?php echo esc_attr( $plugin['slug'] ); ?>">
									<div class="cityclub-plugin-name"><?php echo esc_html( $plugin['name'] ); ?></div>
									<div class="cityclub-plugin-status">
										<?php if ( $plugin['is_active'] ) : ?>
											<span class="cityclub-plugin-status-active"><?php esc_html_e( 'Activated', 'cityclub' ); ?></span>
										<?php elseif ( $plugin['is_installed'] ) : ?>
											<button class="button cityclub-activate-plugin" data-plugin="<?php echo esc_attr( $plugin['file'] ); ?>"><?php esc_html_e( 'Activate', 'cityclub' ); ?></button>
										<?php else : ?>
											<button class="button cityclub-install-plugin"><?php esc_html_e( 'Install', 'cityclub' ); ?></button>
										<?php endif; ?>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div class="cityclub-demo-import-actions">
						<button class="button button-primary cityclub-import-demo-button" <?php echo $this->all_plugins_active( $plugins ) ? '' : 'disabled'; ?>><?php esc_html_e( 'Import Demo Content', 'cityclub' ); ?></button>
						<div class="cityclub-import-progress" style="display: none;">
							<div class="cityclub-import-progress-bar"></div>
							<div class="cityclub-import-progress-message"><?php esc_html_e( 'Importing...', 'cityclub' ); ?></div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		/**
		 * Get required plugins
		 *
		 * @return array Required plugins
		 */
		public function get_required_plugins() {
			$plugins = array(
				array(
					'name'         => 'Elementor Page Builder',
					'slug'         => 'elementor',
					'file'         => 'elementor/elementor.php',
					'is_installed' => false,
					'is_active'    => false,
				),
				array(
					'name'         => 'Contact Form 7',
					'slug'         => 'contact-form-7',
					'file'         => 'contact-form-7/wp-contact-form-7.php',
					'is_installed' => false,
					'is_active'    => false,
				),
				array(
					'name'         => 'Advanced Custom Fields',
					'slug'         => 'advanced-custom-fields',
					'file'         => 'advanced-custom-fields/acf.php',
					'is_installed' => false,
					'is_active'    => false,
				),
				array(
					'name'         => 'WP Google Maps',
					'slug'         => 'wp-google-maps',
					'file'         => 'wp-google-maps/wpGoogleMaps.php',
					'is_installed' => false,
					'is_active'    => false,
				),
				array(
					'name'         => 'One Click Demo Import',
					'slug'         => 'one-click-demo-import',
					'file'         => 'one-click-demo-import/one-click-demo-import.php',
					'is_installed' => false,
					'is_active'    => false,
				),
			);

			// Check if plugins are installed and active
			foreach ( $plugins as $key => $plugin ) {
				$plugins[ $key ]['is_installed'] = $this->is_plugin_installed( $plugin['file'] );
				$plugins[ $key ]['is_active']    = is_plugin_active( $plugin['file'] );
			}

			return $plugins;
		}

		/**
		 * Check if all plugins are active
		 *
		 * @param array $plugins Plugins
		 * @return bool True if all plugins are active
		 */
		public function all_plugins_active( $plugins ) {
			foreach ( $plugins as $plugin ) {
				if ( ! $plugin['is_active'] ) {
					return false;
				}
			}

			return true;
		}

		/**
		 * Check if plugin is installed
		 *
		 * @param string $file Plugin file
		 * @return bool True if plugin is installed
		 */
		public function is_plugin_installed( $file ) {
			$installed_plugins = get_plugins();

			return isset( $installed_plugins[ $file ] );
		}

		/**
		 * Install plugin
		 */
		public function install_plugin() {
			// Check nonce
			if ( ! check_ajax_referer( 'cityclub-demo-import', 'nonce', false ) ) {
				wp_send_json_error( array( 'message' => __( 'Invalid nonce.', 'cityclub' ) ) );
			}

			// Check capabilities
			if ( ! current_user_can( 'install_plugins' ) ) {
				wp_send_json_error( array( 'message' => __( 'You do not have permission to install plugins.', 'cityclub' ) ) );
			}

			// Get plugin slug
			$slug = isset( $_POST['slug'] ) ? sanitize_text_field( wp_unslash( $_POST['slug'] ) ) : '';

			if ( empty( $slug ) ) {
				wp_send_json_error( array( 'message' => __( 'Invalid plugin slug.', 'cityclub' ) ) );
			}

			// Include plugin installer
			if ( ! function_exists( 'plugins_api' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
			}

			if ( ! class_exists( 'WP_Upgrader' ) ) {
				require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
			}

			// Get plugin info
			$api = plugins_api(
				'plugin_information',
				array(
					'slug'   => $slug,
					'fields' => array(
						'short_description' => false,
						'sections'          => false,
						'requires'          => false,
						'rating'            => false,
						'ratings'           => false,
						'downloaded'        => false,
						'last_updated'      => false,
						'added'             => false,
						'tags'              => false,
						'compatibility'     => false,
						'homepage'          => false,
						'donate_link'       => false,
					),
				)
			);

			if ( is_wp_error( $api ) ) {
				wp_send_json_error( array( 'message' => $api->get_error_message() ) );
			}

			// Install plugin
			$upgrader = new Plugin_Upgrader( new WP_Ajax_Upgrader_Skin() );
			$result   = $upgrader->install( $api->download_link );

			if ( is_wp_error( $result ) ) {
				wp_send_json_error( array( 'message' => $result->get_error_message() ) );
			}

			if ( is_wp_error( $upgrader->skin->result ) ) {
				wp_send_json_error( array( 'message' => $upgrader->skin->result->get_error_message() ) );
			}

			if ( $upgrader->skin->get_errors()->has_errors() ) {
				wp_send_json_error( array( 'message' => $upgrader->skin->get_error_messages() ) );
			}

			if ( false === $result ) {
				wp_send_json_error( array( 'message' => __( 'Plugin installation failed.', 'cityclub' ) ) );
			}

			// Get plugin file
			$plugin_file = $this->get_plugin_file( $slug );

			if ( empty( $plugin_file ) ) {
				wp_send_json_error( array( 'message' => __( 'Plugin file not found.', 'cityclub' ) ) );
			}

			// Activate plugin
			$activate = activate_plugin( $plugin_file );

			if ( is_wp_error( $activate ) ) {
				wp_send_json_error( array( 'message' => $activate->get_error_message() ) );
			}

			wp_send_json_success();
		}

		/**
		 * Activate plugin
		 */
		public function activate_plugin() {
			// Check nonce
			if ( ! check_ajax_referer( 'cityclub-demo-import', 'nonce', false ) ) {
				wp_send_json_error( array( 'message' => __( 'Invalid nonce.', 'cityclub' ) ) );
			}

			// Check capabilities
			if ( ! current_user_can( 'activate_plugins' ) ) {
				wp_send_json_error( array( 'message' => __( 'You do not have permission to activate plugins.', 'cityclub' ) ) );
			}

			// Get plugin file
			$plugin = isset( $_POST['plugin'] ) ? sanitize_text_field( wp_unslash( $_POST['plugin'] ) ) : '';

			if ( empty( $plugin ) ) {
				wp_send_json_error( array( 'message' => __( 'Invalid plugin file.', 'cityclub' ) ) );
			}

			// Activate plugin
			$activate = activate_plugin( $plugin );

			if ( is_wp_error( $activate ) ) {
				wp_send_json_error( array( 'message' => $activate->get_error_message() ) );
			}

			wp_send_json_success();
		}

		/**
		 * Import demo
		 */
		public function import_demo() {
			// Check nonce
			if ( ! check_ajax_referer( 'cityclub-demo-import', 'nonce', false ) ) {
				wp_send_json_error( array( 'message' => __( 'Invalid nonce.', 'cityclub' ) ) );
			}

			// Check capabilities
			if ( ! current_user_can( 'import' ) ) {
				wp_send_json_error( array( 'message' => __( 'You do not have permission to import content.', 'cityclub' ) ) );
			}

			// Check if One Click Demo Import is active
			if ( ! class_exists( 'OCDI_Plugin' ) ) {
				wp_send_json_error( array( 'message' => __( 'One Click Demo Import plugin is not active.', 'cityclub' ) ) );
			}

			// Import demo content
			try {
				// Get demo import files
				$import_files = apply_filters( 'ocdi/import_files', array() );

				if ( empty( $import_files ) ) {
					wp_send_json_error( array( 'message' => __( 'No demo import files defined.', 'cityclub' ) ) );
				}

				// Import content, widgets and customizer settings
				$ocdi = OCDI_Plugin::get_instance();
				$ocdi->append_to_frontend_error_messages( __( 'Importing demo content...', 'cityclub' ) );
				$ocdi->import_content( $import_files[0] );
				$ocdi->append_to_frontend_error_messages( __( 'Importing widgets...', 'cityclub' ) );
				$ocdi->import_widgets( $import_files[0] );
				$ocdi->append_to_frontend_error_messages( __( 'Importing customizer settings...', 'cityclub' ) );
				$ocdi->import_customizer_data( $import_files[0] );
				$ocdi->append_to_frontend_error_messages( __( 'Importing Redux settings...', 'cityclub' ) );
				$ocdi->import_redux_data( $import_files[0] );

				// Run after import action
				$ocdi->append_to_frontend_error_messages( __( 'Finalizing import...', 'cityclub' ) );
				do_action( 'ocdi/after_import', $import_files[0] );

				wp_send_json_success();
			} catch ( Exception $e ) {
				wp_send_json_error( array( 'message' => $e->getMessage() ) );
			}
		}

		/**
		 * Get plugin file from slug
		 *
		 * @param string $slug Plugin slug
		 * @return string Plugin file
		 */
		public function get_plugin_file( $slug ) {
			$plugins = get_plugins();

			foreach ( $plugins as $plugin_file => $plugin_data ) {
				$path_parts = explode( '/', $plugin_file );

				if ( $path_parts[0] === $slug ) {
					return $plugin_file;
				}
			}

			return '';
		}
	}

	// Initialize the class
	CityClub_Demo_Importer::instance();

endif;

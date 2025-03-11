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
			if ( 'appearance_page_cityclub-demo-import' !== $hook ) {
				return;
			}

			wp_enqueue_style(
				'cityclub-demo-import',
				get_template_directory_uri() . '/assets/css/admin/demo-import.css',
				array(),
				filemtime( get_template_directory() . '/assets/css/admin/demo-import.css' )
			);

			wp_enqueue_script(
				'cityclub-demo-import',
				get_template_directory_uri() . '/assets/js/admin/demo-import.js',
				array( 'jquery' ),
				filemtime( get_template_directory() . '/assets/js/admin/demo-import.js' ),
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
		}

		/**
		 * Render theme page
		 */
		public function render_theme_page() {
			$required_plugins = $this->get_required_plugins();
			$all_plugins_active = $this->check_all_plugins_active( $required_plugins );
			?>
			<div class="wrap cityclub-demo-import-wrap">
				<h1><?php esc_html_e( 'CityClub Demo Import', 'cityclub' ); ?></h1>

				<div class="cityclub-demo-import-container">
					<div class="cityclub-demo-import-header">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.png' ); ?>" alt="<?php esc_attr_e( 'CityClub Demo', 'cityclub' ); ?>" class="cityclub-demo-preview">
						<div class="cityclub-demo-import-header-content">
							<h2><?php esc_html_e( 'CityClub Fitness Network', 'cityclub' ); ?></h2>
							<p><?php esc_html_e( 'Import the demo content to make your site look like our demo. This will import posts, pages, images, theme options, widgets, menus and more.', 'cityclub' ); ?></p>
							<p><strong><?php esc_html_e( 'Important:', 'cityclub' ); ?></strong> <?php esc_html_e( 'Demo import is recommended for new websites. Importing demo content to an existing website may cause conflicts with current content.', 'cityclub' ); ?></p>
						</div>
					</div>

					<div class="cityclub-demo-import-plugins">
						<h3><?php esc_html_e( 'Required Plugins', 'cityclub' ); ?></h3>
						<p><?php esc_html_e( 'The following plugins are required for the demo import. Please install and activate them before importing the demo content.', 'cityclub' ); ?></p>

						<ul class="cityclub-plugin-list">
							<?php foreach ( $required_plugins as $plugin ) : ?>
								<li class="cityclub-plugin-item" data-slug="<?php echo esc_attr( $plugin['slug'] ); ?>">
									<span class="cityclub-plugin-name"><?php echo esc_html( $plugin['name'] ); ?></span>
									<span class="cityclub-plugin-status">
										<?php if ( $plugin['active'] ) : ?>
											<span class="cityclub-plugin-status-active"><?php esc_html_e( 'Active', 'cityclub' ); ?></span>
										<?php elseif ( $plugin['installed'] ) : ?>
											<button class="button cityclub-activate-plugin" data-plugin="<?php echo esc_attr( $plugin['file'] ); ?>"><?php esc_html_e( 'Activate', 'cityclub' ); ?></button>
										<?php else : ?>
											<button class="button cityclub-install-plugin"><?php esc_html_e( 'Install', 'cityclub' ); ?></button>
										<?php endif; ?>
									</span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div class="cityclub-demo-import-actions">
						<button class="button button-primary cityclub-import-demo-button" <?php echo $all_plugins_active ? '' : 'disabled'; ?>>
							<?php esc_html_e( 'Import Demo Content', 'cityclub' ); ?>
						</button>
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
		 * @return array
		 */
		public function get_required_plugins() {
			$plugins = array(
				array(
					'name'      => 'Elementor Page Builder',
					'slug'      => 'elementor',
					'file'      => 'elementor/elementor.php',
					'required'  => true,
				),
				array(
					'name'      => 'Contact Form 7',
					'slug'      => 'contact-form-7',
					'file'      => 'contact-form-7/wp-contact-form-7.php',
					'required'  => true,
				),
				array(
					'name'      => 'Advanced Custom Fields',
					'slug'      => 'advanced-custom-fields',
					'file'      => 'advanced-custom-fields/acf.php',
					'required'  => true,
				),
				array(
					'name'      => 'WP Google Maps',
					'slug'      => 'wp-google-maps',
					'file'      => 'wp-google-maps/wpGoogleMaps.php',
					'required'  => true,
				),
				array(
					'name'      => 'One Click Demo Import',
					'slug'      => 'one-click-demo-import',
					'file'      => 'one-click-demo-import/one-click-demo-import.php',
					'required'  => true,
				),
			);

			// Check if plugins are installed and active
			foreach ( $plugins as $key => $plugin ) {
				$plugins[ $key ]['installed'] = $this->is_plugin_installed( $plugin['file'] );
				$plugins[ $key ]['active']    = is_plugin_active( $plugin['file'] );
			}

			return $plugins;
		}

		/**
		 * Check if all required plugins are active
		 *
		 * @param array $plugins Plugins array
		 * @return bool
		 */
		public function check_all_plugins_active( $plugins ) {
			foreach ( $plugins as $plugin ) {
				if ( ! $plugin['active'] ) {
					return false;
				}
			}

			return true;
		}

		/**
		 * Check if plugin is installed
		 *
		 * @param string $file Plugin file
		 * @return bool
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
			check_ajax_referer( 'cityclub-demo-import', 'nonce' );

			// Check user capabilities
			if ( ! current_user_can( 'install_plugins' ) ) {
				wp_send_json_error( array(
					'message' => __( 'You do not have permission to install plugins.', 'cityclub' ),
				) );
			}

			// Get plugin slug
			$slug = isset( $_POST['slug'] ) ? sanitize_text_field( wp_unslash( $_POST['slug'] ) ) : '';

			if ( empty( $slug ) ) {
				wp_send_json_error( array(
					'message' => __( 'Plugin slug is required.', 'cityclub' ),
				) );
			}

			// Include necessary files
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
			require_once ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php';
			require_once ABSPATH . 'wp-admin/includes/plugin.php';

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
				wp_send_json_error( array(
					'message' => $api->get_error_message(),
				) );
			}

			// Install plugin
			$upgrader = new Plugin_Upgrader( new WP_Ajax_Upgrader_Skin() );
			$result   = $upgrader->install( $api->download_link );

			if ( is_wp_error( $result ) ) {
				wp_send_json_error( array(
					'message' => $result->get_error_message(),
				) );
			}

			if ( false === $result ) {
				wp_send_json_error( array(
					'message' => __( 'Plugin installation failed.', 'cityclub' ),
				) );
			}

			// Get plugin file
			$plugin_file = false;
			$plugin_info = $this->get_required_plugins();

			foreach ( $plugin_info as $plugin ) {
				if ( $plugin['slug'] === $slug ) {
					$plugin_file = $plugin['file'];
					break;
				}
			}

			if ( ! $plugin_file ) {
				wp_send_json_error( array(
					'message' => __( 'Plugin file not found.', 'cityclub' ),
				) );
			}

			// Activate plugin
			$activate = activate_plugin( $plugin_file );

			if ( is_wp_error( $activate ) ) {
				wp_send_json_error( array(
					'message' => $activate->get_error_message(),
				) );
			}

			wp_send_json_success( array(
				'message' => __( 'Plugin installed and activated successfully.', 'cityclub' ),
			) );
		}

		/**
		 * Import demo
		 */
		public function import_demo() {
			// Check nonce
			check_ajax_referer( 'cityclub-demo-import', 'nonce' );

			// Check user capabilities
			if ( ! current_user_can( 'import' ) ) {
				wp_send_json_error( array(
					'message' => __( 'You do not have permission to import content.', 'cityclub' ),
				) );
			}

			// Check if One Click Demo Import is active
			if ( ! class_exists( 'OCDI_Plugin' ) ) {
				wp_send_json_error( array(
					'message' => __( 'One Click Demo Import plugin is required.', 'cityclub' ),
				) );
			}

			// Trigger demo import
			do_action( 'ocdi/import_demo_data', 0 );

			wp_send_json_success( array(
				'message' => __( 'Demo content imported successfully.', 'cityclub' ),
			) );
		}
	}

	// Initialize the class
	CityClub_Demo_Importer::instance();

endif;

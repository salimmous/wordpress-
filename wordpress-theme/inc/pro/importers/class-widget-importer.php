<?php
/**
 * Class for importing widgets
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class for importing widgets
 */
class CityClub_Widget_Importer {

	/**
	 * Import widgets from a WIE file
	 *
	 * @param string $file Path to the WIE file.
	 * @return true|WP_Error True on success, WP_Error on failure.
	 */
	public function import( $file ) {
		if ( ! file_exists( $file ) ) {
			return new WP_Error( 'file_not_found', __( 'Widgets file not found.', 'cityclub' ) );
		}

		// Get file contents.
		$file_contents = file_get_contents( $file );
		if ( ! $file_contents ) {
			return new WP_Error( 'file_read_error', __( 'Error reading widgets file.', 'cityclub' ) );
		}

		// Decode JSON.
		$data = json_decode( $file_contents, true );
		if ( null === $data ) {
			return new WP_Error( 'json_decode_error', __( 'Error decoding widgets JSON.', 'cityclub' ) );
		}

		// Import widgets.
		$this->import_widgets( $data );

		return true;
	}

	/**
	 * Import widgets
	 *
	 * @param array $data Widgets data.
	 */
	private function import_widgets( $data ) {
		// Get all available widgets.
		global $wp_registered_widget_controls;
		$widget_controls = $wp_registered_widget_controls;

		// Get all active widgets.
		$active_widgets = get_option( 'sidebars_widgets' );

		// Loop through widgets data.
		foreach ( $data as $sidebar_id => $widgets ) {
			// Skip inactive widgets.
			if ( 'wp_inactive_widgets' === $sidebar_id ) {
				continue;
			}

			// Check if sidebar exists.
			if ( ! isset( $active_widgets[ $sidebar_id ] ) ) {
				$active_widgets[ $sidebar_id ] = array();
			}

			// Loop through sidebar widgets.
			foreach ( $widgets as $widget_instance_id => $widget ) {
				// Get widget instance ID base.
				$id_base = preg_replace( '/-[0-9]+$/', '', $widget_instance_id );

				// Check if widget exists.
				if ( ! isset( $widget_controls[ $id_base ] ) ) {
					continue;
				}

				// Get widget instances.
				$instances = get_option( 'widget_' . $id_base );
				if ( ! is_array( $instances ) ) {
					$instances = array();
				}

				// Get widget number.
				$widget_number = preg_replace( '/^' . $id_base . '-/', '', $widget_instance_id );

				// Add widget instance.
				$instances[ $widget_number ] = $widget;

				// Update widget instances.
				update_option( 'widget_' . $id_base, $instances );

				// Add widget to sidebar.
				$active_widgets[ $sidebar_id ][] = $widget_instance_id;
			}
		}

		// Remove duplicate widgets.
		foreach ( $active_widgets as $sidebar_id => $widgets ) {
			$active_widgets[ $sidebar_id ] = array_unique( $widgets );
		}

		// Update active widgets.
		update_option( 'sidebars_widgets', $active_widgets );
	}
}

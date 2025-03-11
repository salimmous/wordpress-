<?php
/**
 * Class for importing customizer settings
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class for importing customizer settings
 */
class CityClub_Customizer_Importer {

	/**
	 * Import customizer settings from a DAT file
	 *
	 * @param string $file Path to the DAT file.
	 * @return true|WP_Error True on success, WP_Error on failure.
	 */
	public function import( $file ) {
		if ( ! file_exists( $file ) ) {
			return new WP_Error( 'file_not_found', __( 'Customizer file not found.', 'cityclub' ) );
		}

		// Get file contents.
		$raw = file_get_contents( $file );
		if ( ! $raw ) {
			return new WP_Error( 'file_read_error', __( 'Error reading customizer file.', 'cityclub' ) );
		}

		// Unserialize data.
		$data = @unserialize( $raw );
		if ( ! $data ) {
			return new WP_Error( 'unserialize_error', __( 'Error unserializing customizer data.', 'cityclub' ) );
		}

		// Import customizer settings.
		$this->import_customizer_settings( $data );

		return true;
	}

	/**
	 * Import customizer settings
	 *
	 * @param array $data Customizer data.
	 */
	private function import_customizer_settings( $data ) {
		// Check if data is valid.
		if ( ! isset( $data['mods'] ) ) {
			return;
		}

		// Get current theme.
		$current_theme = get_stylesheet();

		// Check if data is for current theme.
		if ( isset( $data['template'] ) && $current_theme !== $data['template'] ) {
			// Data is for a different theme, update theme name.
			$data['template'] = $current_theme;
		}

		// Loop through mods.
		foreach ( $data['mods'] as $key => $value ) {
			// Skip non-scalar values.
			if ( ! is_scalar( $value ) ) {
				continue;
			}

			// Update theme mod.
			set_theme_mod( $key, $value );
		}

		// Import custom CSS.
		if ( isset( $data['wp_css'] ) && ! empty( $data['wp_css'] ) ) {
			wp_update_custom_css_post( $data['wp_css'] );
		}
	}
}

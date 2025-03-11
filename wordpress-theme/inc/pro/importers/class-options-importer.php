<?php
/**
 * Class for importing options
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class for importing options
 */
class CityClub_Options_Importer {

	/**
	 * Import options from a JSON file
	 *
	 * @param string $file Path to the JSON file.
	 * @return true|WP_Error True on success, WP_Error on failure.
	 */
	public function import( $file ) {
		if ( ! file_exists( $file ) ) {
			return new WP_Error( 'file_not_found', __( 'Options file not found.', 'cityclub' ) );
		}

		// Get file contents.
		$file_contents = file_get_contents( $file );
		if ( ! $file_contents ) {
			return new WP_Error( 'file_read_error', __( 'Error reading options file.', 'cityclub' ) );
		}

		// Decode JSON.
		$options = json_decode( $file_contents, true );
		if ( null === $options ) {
			return new WP_Error( 'json_decode_error', __( 'Error decoding options JSON.', 'cityclub' ) );
		}

		// Import options.
		foreach ( $options as $option_name => $option_value ) {
			update_option( $option_name, $option_value );
		}

		return true;
	}
}

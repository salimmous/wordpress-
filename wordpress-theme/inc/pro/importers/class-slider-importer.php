<?php
/**
 * Class for importing sliders
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class for importing sliders
 */
class CityClub_Slider_Importer {

	/**
	 * Import sliders from a ZIP file
	 *
	 * @param string $file Path to the ZIP file.
	 * @return true|WP_Error True on success, WP_Error on failure.
	 */
	public function import( $file ) {
		if ( ! file_exists( $file ) ) {
			return new WP_Error( 'file_not_found', __( 'Sliders file not found.', 'cityclub' ) );
		}

		// Check if Revolution Slider is active.
		if ( ! class_exists( 'RevSlider' ) ) {
			return new WP_Error( 'revslider_not_active', __( 'Revolution Slider plugin is not active.', 'cityclub' ) );
		}

		// Import sliders.
		try {
			$slider = new RevSlider();
			$slider->importSliderFromPost( true, true, $file );
		} catch ( Exception $e ) {
			return new WP_Error( 'revslider_import_error', $e->getMessage() );
		}

		return true;
	}
}

<?php
/**
 * Template for Elementor Footer
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// This template can be overridden by copying it to yourtheme/elementor-templates/footer.php

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
    get_template_part( 'template-parts/footer' );
}

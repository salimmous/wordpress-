<?php
/**
 * Template for Elementor Header
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// This template can be overridden by copying it to yourtheme/elementor-templates/header.php

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
    get_template_part( 'template-parts/header' );
}

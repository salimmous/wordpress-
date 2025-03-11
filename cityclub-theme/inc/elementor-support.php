<?php
/**
 * Elementor Support for CityClub Theme
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register Elementor support
 */
function cityclub_elementor_support() {
    // Add support for Elementor Pro locations
    add_theme_support( 'elementor-pro' );
    
    // Register Elementor locations
    if ( function_exists( 'elementor_theme_do_location' ) ) {
        add_action( 'cityclub_header', function() {
            elementor_theme_do_location( 'header' );
        }, 10 );
        
        add_action( 'cityclub_footer', function() {
            elementor_theme_do_location( 'footer' );
        }, 10 );
    }
}
add_action( 'after_setup_theme', 'cityclub_elementor_support' );

/**
 * Register Elementor widgets categories
 */
function cityclub_elementor_categories( $elements_manager ) {
    $elements_manager->add_category(
        'cityclub',
        [
            'title' => esc_html__( 'CityClub', 'cityclub' ),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'cityclub_elementor_categories' );

/**
 * Add custom CSS to Elementor editor
 */
function cityclub_elementor_editor_styles() {
    wp_enqueue_style( 'cityclub-elementor-editor', get_template_directory_uri() . '/assets/css/elementor-editor.css', [], CITYCLUB_VERSION );
}
add_action( 'elementor/editor/before_enqueue_scripts', 'cityclub_elementor_editor_styles' );

/**
 * Add custom fonts to Elementor
 */
function cityclub_elementor_fonts( $fonts ) {
    $custom_fonts = [
        'Poppins' => 'system',
    ];
    
    return array_merge( $fonts, $custom_fonts );
}
add_filter( 'elementor/fonts/additional_fonts', 'cityclub_elementor_fonts' );

/**
 * Add default Elementor templates
 */
function cityclub_add_elementor_template( $templates_manager ) {
    // This function can be expanded to include default templates
    // for your theme when needed
}
add_action( 'elementor/init', 'cityclub_add_elementor_template' );

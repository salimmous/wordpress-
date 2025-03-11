<?php
/**
 * CityClub Theme Customizer
 *
 * @package CityClub
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cityclub_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add Theme Options Panel
	$wp_customize->add_panel( 'cityclub_theme_options', array(
		'title'       => __( 'CityClub Theme Options', 'cityclub' ),
		'description' => __( 'Configure theme settings and options', 'cityclub' ),
		'priority'    => 130,
	) );

	// Add Color Settings Section
	$wp_customize->add_section( 'cityclub_colors', array(
		'title'    => __( 'Theme Colors', 'cityclub' ),
		'panel'    => 'cityclub_theme_options',
		'priority' => 10,
	) );

	// Primary Color
	$wp_customize->add_setting( 'cityclub_primary_color', array(
		'default'           => '#f26f21',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_primary_color', array(
		'label'    => __( 'Primary Color', 'cityclub' ),
		'section'  => 'cityclub_colors',
		'settings' => 'cityclub_primary_color',
	) ) );

	// Secondary Color
	$wp_customize->add_setting( 'cityclub_secondary_color', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_secondary_color', array(
		'label'    => __( 'Secondary Color', 'cityclub' ),
		'section'  => 'cityclub_colors',
		'settings' => 'cityclub_secondary_color',
	) ) );

	// Text Color
	$wp_customize->add_setting( 'cityclub_text_color', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_text_color', array(
		'label'    => __( 'Text Color', 'cityclub' ),
		'section'  => 'cityclub_colors',
		'settings' => 'cityclub_text_color',
	) ) );

	// Light Color
	$wp_customize->add_setting( 'cityclub_light_color', array(
		'default'           => '#f8f8f8',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_light_color', array(
		'label'    => __( 'Light Color', 'cityclub' ),
		'section'  => 'cityclub_colors',
		'settings' => 'cityclub_light_color',
	) ) );

	// Dark Color
	$wp_customize->add_setting( 'cityclub_dark_color', array(
		'default'           => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_dark_color', array(
		'label'    => __( 'Dark Color', 'cityclub' ),
		'section'  => 'cityclub_colors',
		'settings' => 'cityclub_dark_color',
	) ) );

	// Layout Settings Section
	$wp_customize->add_section( 'cityclub_layout', array(
		'title'    => __( 'Layout Settings', 'cityclub' ),
		'panel'    => 'cityclub_theme_options',
		'priority' => 20,
	) );

	// Show Breadcrumbs
	$wp_customize->add_setting( 'cityclub_show_breadcrumbs', array(
		'default'           => true,
		'sanitize_callback' => 'cityclub_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'cityclub_show_breadcrumbs', array(
		'label'    => __( 'Show Breadcrumbs', 'cityclub' ),
		'section'  => 'cityclub_layout',
		'type'     => 'checkbox',
	) );

	// Show Back to Top Button
	$wp_customize->add_setting( 'cityclub_show_back_to_top', array(
		'default'           => true,
		'sanitize_callback' => 'cityclub_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'cityclub_show_back_to_top', array(
		'label'    => __( 'Show Back to Top Button', 'cityclub' ),
		'section'  => 'cityclub_layout',
		'type'     => 'checkbox',
	) );

	// Footer Settings Section
	$wp_customize->add_section( 'cityclub_footer', array(
		'title'    => __( 'Footer Settings', 'cityclub' ),
		'panel'    => 'cityclub_theme_options',
		'priority' => 30,
	) );

	// Footer Text
	$wp_customize->add_setting( 'cityclub_footer_text', array(
		'default'           => __( '© 2023 CityClub. Tous droits réservés.', 'cityclub' ),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'cityclub_footer_text', array(
		'label'    => __( 'Footer Text', 'cityclub' ),
		'section'  => 'cityclub_footer',
		'type'     => 'textarea',
	) );

	// Header Settings Section
	$wp_customize->add_section( 'cityclub_header', array(
		'title'    => __( 'Header Settings', 'cityclub' ),
		'panel'    => 'cityclub_theme_options',
		'priority' => 40,
	) );

	// Show Search in Menu
	$wp_customize->add_setting( 'cityclub_show_search_in_menu', array(
		'default'           => true,
		'sanitize_callback' => 'cityclub_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'cityclub_show_search_in_menu', array(
		'label'    => __( 'Show Search in Menu', 'cityclub' ),
		'section'  => 'cityclub_header',
		'type'     => 'checkbox',
	) );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'cityclub_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'cityclub_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'cityclub_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cityclub_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cityclub_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cityclub_customize_preview_js() {
	wp_enqueue_script( 'cityclub-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), CITYCLUB_VERSION, true );
}
add_action( 'customize_preview_init', 'cityclub_customize_preview_js' );

/**
 * Sanitize checkbox values.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function cityclub_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Generate CSS from customizer settings.
 */
function cityclub_customizer_css() {
	$primary_color = get_theme_mod( 'cityclub_primary_color', '#f26f21' );
	$secondary_color = get_theme_mod( 'cityclub_secondary_color', '#000000' );
	$text_color = get_theme_mod( 'cityclub_text_color', '#333333' );
	$light_color = get_theme_mod( 'cityclub_light_color', '#f8f8f8' );
	$dark_color = get_theme_mod( 'cityclub_dark_color', '#222222' );
	
	$css = ''
		. ':root {'
		. '--primary-color: ' . esc_attr( $primary_color ) . ';'
		. '--secondary-color: ' . esc_attr( $secondary_color ) . ';'
		. '--text-color: ' . esc_attr( $text_color ) . ';'
		. '--light-color: ' . esc_attr( $light_color ) . ';'
		. '--dark-color: ' . esc_attr( $dark_color ) . ';'
		. '}'
		. 'a { color: ' . esc_attr( $primary_color ) . '; }'
		. 'a:hover { color: ' . esc_attr( $secondary_color ) . '; }'
		. '.btn-primary, .wp-block-button__link { background-color: ' . esc_attr( $primary_color ) . '; }'
		. '.btn-primary:hover, .wp-block-button__link:hover { background-color: ' . esc_attr( $secondary_color ) . '; }'
		. '.site-header { background-color: ' . esc_attr( $dark_color ) . '; }'
		. '.site-footer { background-color: ' . esc_attr( $dark_color ) . '; color: ' . esc_attr( $light_color ) . '; }';
	
	wp_add_inline_style( 'cityclub-style', $css );
}
add_action( 'wp_enqueue_scripts', 'cityclub_customizer_css' );

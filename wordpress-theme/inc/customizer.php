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
		'description' => __( 'Theme Options for CityClub', 'cityclub' ),
		'priority'    => 30,
	) );

	// Add General Settings Section
	$wp_customize->add_section( 'cityclub_general_settings', array(
		'title'       => __( 'General Settings', 'cityclub' ),
		'description' => __( 'General theme settings', 'cityclub' ),
		'panel'       => 'cityclub_theme_options',
		'priority'    => 10,
	) );

	// Add Color Settings Section
	$wp_customize->add_section( 'cityclub_color_settings', array(
		'title'       => __( 'Color Settings', 'cityclub' ),
		'description' => __( 'Customize theme colors', 'cityclub' ),
		'panel'       => 'cityclub_theme_options',
		'priority'    => 20,
	) );

	// Add Header Settings Section
	$wp_customize->add_section( 'cityclub_header_settings', array(
		'title'       => __( 'Header Settings', 'cityclub' ),
		'description' => __( 'Customize header options', 'cityclub' ),
		'panel'       => 'cityclub_theme_options',
		'priority'    => 30,
	) );

	// Add Footer Settings Section
	$wp_customize->add_section( 'cityclub_footer_settings', array(
		'title'       => __( 'Footer Settings', 'cityclub' ),
		'description' => __( 'Customize footer options', 'cityclub' ),
		'panel'       => 'cityclub_theme_options',
		'priority'    => 40,
	) );

	// Add Social Media Settings Section
	$wp_customize->add_section( 'cityclub_social_settings', array(
		'title'       => __( 'Social Media Settings', 'cityclub' ),
		'description' => __( 'Add your social media links', 'cityclub' ),
		'panel'       => 'cityclub_theme_options',
		'priority'    => 50,
	) );

	// Add Contact Information Section
	$wp_customize->add_section( 'cityclub_contact_settings', array(
		'title'       => __( 'Contact Information', 'cityclub' ),
		'description' => __( 'Add your contact information', 'cityclub' ),
		'panel'       => 'cityclub_theme_options',
		'priority'    => 60,
	) );

	// Add URL Settings Section
	$wp_customize->add_section( 'cityclub_url_settings', array(
		'title'       => __( 'URL Settings', 'cityclub' ),
		'description' => __( 'Configure URLs for buttons and links', 'cityclub' ),
		'panel'       => 'cityclub_theme_options',
		'priority'    => 70,
	) );

	// Add Primary Color Setting
	$wp_customize->add_setting( 'cityclub_primary_color', array(
		'default'           => '#f26f21',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_primary_color', array(
		'label'    => __( 'Primary Color', 'cityclub' ),
		'section'  => 'cityclub_color_settings',
		'settings' => 'cityclub_primary_color',
	) ) );

	// Add Secondary Color Setting
	$wp_customize->add_setting( 'cityclub_secondary_color', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_secondary_color', array(
		'label'    => __( 'Secondary Color', 'cityclub' ),
		'section'  => 'cityclub_color_settings',
		'settings' => 'cityclub_secondary_color',
	) ) );

	// Add Text Color Setting
	$wp_customize->add_setting( 'cityclub_text_color', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_text_color', array(
		'label'    => __( 'Text Color', 'cityclub' ),
		'section'  => 'cityclub_color_settings',
		'settings' => 'cityclub_text_color',
	) ) );

	// Add Light Color Setting
	$wp_customize->add_setting( 'cityclub_light_color', array(
		'default'           => '#f8f8f8',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control(
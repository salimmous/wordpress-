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

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'cityclub_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'cityclub_customize_partial_blogdescription',
            )
        );
    }
    
    // Add Theme Options Panel
    $wp_customize->add_panel( 'cityclub_theme_options', array(
        'title'       => esc_html__( 'Theme Options', 'cityclub' ),
        'description' => esc_html__( 'Configure CityClub Theme Options', 'cityclub' ),
        'priority'    => 130,
    ) );
    
    // Add Header Section
    $wp_customize->add_section( 'cityclub_header_options', array(
        'title'       => esc_html__( 'Header Options', 'cityclub' ),
        'description' => esc_html__( 'Configure header options', 'cityclub' ),
        'panel'       => 'cityclub_theme_options',
    ) );
    
    // Add Footer Section
    $wp_customize->add_section( 'cityclub_footer_options', array(
        'title'       => esc_html__( 'Footer Options', 'cityclub' ),
        'description' => esc_html__( 'Configure footer options', 'cityclub' ),
        'panel'       => 'cityclub_theme_options',
    ) );
    
    // Add Homepage Section
    $wp_customize->add_section( 'cityclub_homepage_options', array(
        'title'       => esc_html__( 'Homepage Options', 'cityclub' ),
        'description' => esc_html__( 'Configure homepage options', 'cityclub' ),
        'panel'       => 'cityclub_theme_options',
    ) );
    
    // Add Social Media Section
    $wp_customize->add_section( 'cityclub_social_options', array(
        'title'       => esc_html__( 'Social Media', 'cityclub' ),
        'description' => esc_html__( 'Configure social media links', 'cityclub' ),
        'panel'       => 'cityclub_theme_options',
    ) );
    
    // Add Contact Information Section
    $wp_customize->add_section( 'cityclub_contact_options', array(
        'title'       => esc_html__( 'Contact Information', 'cityclub' ),
        'description' => esc_html__( 'Configure contact information', 'cityclub' ),
        'panel'       => 'cityclub_theme_options',
    ) );
    
    // Add Theme Colors Section
    $wp_customize->add_section( 'cityclub_colors_options', array(
        'title'       => esc_html__( 'Theme Colors', 'cityclub' ),
        'description' => esc_html__( 'Configure theme colors', 'cityclub' ),
        'panel'       => 'cityclub_theme_options',
    ) );
    
    // Add Primary Color Setting
    $wp_customize->add_setting( 'cityclub_primary_color', array(
        'default'           => '#f26f21',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_primary_color', array(
        'label'    => esc_html__( 'Primary Color', 'cityclub' ),
        'section'  => 'cityclub_colors_options',
        'settings' => 'cityclub_primary_color',
    ) ) );
    
    // Add Secondary Color Setting
    $wp_customize->add_setting( 'cityclub_secondary_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_secondary_color', array(
        'label'    => esc_html__( 'Secondary Color', 'cityclub' ),
        'section'  => 'cityclub_colors_options',
        'settings' => 'cityclub_secondary_color',
    ) ) );
    
    // Add Social Media Links
    $social_platforms = array(
        'facebook'  => esc_html__( 'Facebook URL', 'cityclub' ),
        'instagram' => esc_html__( 'Instagram URL', 'cityclub' ),
        'youtube'   => esc_html__( 'YouTube URL', 'cityclub' ),
        'linkedin'  => esc_html__( 'LinkedIn URL', 'cityclub' ),
    );
    
    foreach ( $social_platforms as $platform => $label ) {
        $wp_customize->add_setting( 'cityclub_' . $platform . '_url', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        
        $wp_customize->add_control( 'cityclub_' . $platform . '_url', array(
            'label'    => $label,
            'section'  => 'cityclub_social_options',
            'type'     => 'url',
        ) );
    }
    
    // Add Contact Information
    $wp_customize->add_setting( 'cityclub_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'cityclub_address', array(
        'label'    => esc_html__( 'Address', 'cityclub' ),
        'section'  => 'cityclub_contact_options',
        'type'     => 'text',
    ) );
    
    $wp_customize->add_setting( 'cityclub_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'cityclub_phone', array(
        'label'    => esc_html__( 'Phone Number', 'cityclub' ),
        'section'  => 'cityclub_contact_options',
        'type'     => 'text',
    ) );
    
    $wp_customize->add_setting( 'cityclub_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ) );
    
    $wp_customize->add_control( 'cityclub_email', array(
        'label'    => esc_html__( 'Email Address', 'cityclub' ),
        'section'  => 'cityclub_contact_options',
        'type'     => 'email',
    ) );
    
    // Add Footer Copyright Text
    $wp_customize->add_setting( 'cityclub_copyright_text', array(
        'default'           => sprintf( esc_html__( '© %s CityClub. Tous droits réservés.', 'cityclub' ), date('Y') ),
        'sanitize_callback' => 'wp_kses_post',
    ) );
    
    $wp_customize->add_control( 'cityclub_copyright_text', array(
        'label'    => esc_html__( 'Copyright Text', 'cityclub' ),
        'section'  => 'cityclub_footer_options',
        'type'     => 'textarea',
    ) );
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
    wp_enqueue_script( 'cityclub-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), CITYCLUB_VERSION, true );
}
add_action( 'customize_preview_init', 'cityclub_customize_preview_js' );

/**
 *
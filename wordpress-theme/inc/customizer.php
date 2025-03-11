<?php
/**
 * CityClub Modern Theme Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cityclub_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
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

    // Header Section
    $wp_customize->add_section('cityclub_header_section', array(
        'title'    => __('Header Options', 'cityclub-modern'),
        'priority' => 30,
    ));

    // CTA Button Text
    $wp_customize->add_setting('cityclub_cta_text', array(
        'default'           => "S'inscrire",
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('cityclub_cta_text', array(
        'label'    => __('CTA Button Text', 'cityclub-modern'),
        'section'  => 'cityclub_header_section',
        'type'     => 'text',
    ));

    // CTA Button URL
    $wp_customize->add_setting('cityclub_cta_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('cityclub_cta_url', array(
        'label'    => __('CTA Button URL', 'cityclub-modern'),
        'section'  => 'cityclub_header_section',
        'type'     => 'url',
    ));

    // Footer Section
    $wp_customize->add_section('cityclub_footer_section', array(
        'title'    => __('Footer Options', 'cityclub-modern'),
        'priority' => 90,
    ));

    // Footer Column 1 Title
    $wp_customize->add_setting('cityclub_footer_column1_title', array(
        'default'           => __('À propos', 'cityclub-modern'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('cityclub_footer_column1_title', array(
        'label'    => __('Footer Column 1 Title', 'cityclub-modern'),
        'section'  => 'cityclub_footer_section',
        'type'     => 'text',
    ));

    // Footer About Text
    $wp_customize->add_setting('cityclub_footer_about_text', array(
        'default'           => __('Le plus grand réseau de fitness au Maroc avec plus de 50 clubs à travers le pays.', 'cityclub-modern'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('cityclub_footer_about_text', array(
        'label'    => __('Footer About Text', 'cityclub-modern'),
        'section'  => 'cityclub_footer_section',
        'type'     => 'textarea',
    ));

    // Footer Column 2 Title
    $wp_customize->add_setting('cityclub_footer_column2_title', array(
        'default'           => __('Liens Rapides', 'cityclub-modern'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('cityclub_footer_column2_title', array(
        'label'    => __('Footer Column 2 Title', 'cityclub-modern'),
        'section'  => 'cityclub_footer_section',
        'type'     => 'text',
    ));

    // Footer Column 3 Title
    $wp_customize->add_setting('cityclub_footer_column3_title', array(
        'default'           => __('Horaires d\'ouverture', 'cityclub-modern'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('cityclub_footer_column3_title', array(
        'label'    => __('Footer Column 3 Title', 'cityclub-modern'),
        'section'  => 'cityclub_footer_section',
        'type'     => 'text',
    ));

    // Footer Column 4 Title
    $wp_customize->add_setting('cityclub_footer_column4_title', array(
        'default'           => __('Contact', 'cityclub-modern'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('cityclub_footer_column4_title', array(
        'label'    => __('Footer Column 4 Title', 'cityclub-modern'),
        'section'  => 'cityclub_footer_section',
        'type'     => 'text',
    ));

    // Copyright Text
    $wp_customize->add_setting('cityclub_copyright_text', array(
        'default'           => '© ' . date('Y') . ' CityClub. Tous droits réservés.',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('cityclub_copyright_text', array(
        'label'    => __('Copyright Text', 'cityclub-modern'),
        'section'  => 'cityclub_footer_section',
        'type'     => 'textarea',
    ));

    // Social Media Section
    $wp_customize->add_section('cityclub_social_section', array(
        'title'    => __('Social Media', 'cityclub-modern'),
        'priority' => 100,
    ));

    // Facebook
    $wp_customize->add_setting('cityclub_social_facebook', array(
        'default'           => 'https://facebook.com/cityclub',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('cityclub_social_facebook', array(
        'label'    => __('Facebook URL', 'cityclub-modern'),
        'section'  => 'cityclub_social_section',
        'type'     => 'url',
    ));

    // Twitter
    $wp_customize->add_setting('cityclub_social_twitter', array(
        'default'           => 'https://twitter.com/cityclub',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('cityclub_social_twitter', array(
        'label'    => __('Twitter URL', 'cityclub-modern'),
        'section'  => 'cityclub_social_section',
        'type'     => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('cityclub_social_instagram', array(
        'default'           => 'https://instagram.com/cityclub',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('cityclub_social_instagram', array(
        'label'    => __('Instagram URL', 'cityclub-modern'),
        'section'  => 'cityclub_social_section',
        'type'     => 'url',
    ));

    // YouTube
    $wp_customize->add_setting('cityclub_social_youtube', array(
        'default'           => 'https://youtube.com/cityclub',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('cityclub_social_youtube', array(
        'label'    => __('YouTube URL', 'cityclub-modern'),
        'section'  => 'cityclub_social_section',
        'type'     => 'url',
    ));

    // Contact Information Section
    $wp_customize->add_section('cityclub_contact_section', array(
        'title'    => __('Contact Information', 'cityclub-modern'),
        'priority' => 110,
    ));

    // Phone
    $wp_customize->add_setting('cityclub_contact_phone', array(
        'default'           => '+212 522 123 456',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cityclub_contact_phone', array(
        'label'    => __('Phone Number', 'cityclub-modern'),
        'section'  => 'cityclub_contact_section',
        'type'     => 'text',
    ));

    // Email
    $wp_customize->add_setting('cityclub_contact_email', array(
        'default'           => 'contact@cityclub.ma',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('cityclub_contact_email', array(
        'label'    => __('Email Address', 'cityclub-modern'),
        'section'  => 'cityclub_contact_section',
        'type'     => 'email',
    ));

    // Address
    $wp_customize->add_setting('cityclub_contact_address', array(
        'default'           => '123 Boulevard Mohammed V, Casablanca, Maroc',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cityclub_contact_address', array(
        'label'    => __('Address', 'cityclub-modern'),
        'section'  => 'cityclub_contact_section',
        'type'     => 'textarea',
    ));

    // Opening Hours Section
    $wp_customize->add_section('cityclub_hours_section', array(
        'title'    => __('Opening Hours', 'cityclub-modern'),
        'priority' => 120,
    ));

    // Weekdays
    $wp_customize->add_setting('cityclub_hours_weekdays', array(
        'default'           => '6h - 23h',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cityclub_hours_weekdays', array(
        'label'    => __('Monday - Friday', 'cityclub-modern'),
        'section'  => 'cityclub_hours_section',
        'type'     => 'text',
    ));

    // Saturday
    $wp_customize->add_setting('cityclub_hours_saturday', array(
        'default'           => '8h - 22h',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cityclub_hours_saturday', array(
        'label'    => __('Saturday', 'cityclub-modern'),
        'section'  => 'cityclub_hours_section',
        'type'     => 'text',
    ));

    // Sunday
    $wp_customize->add_setting('cityclub_hours_sunday', array(
        'default'           => '8h - 20h',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cityclub_hours_sunday', array(
        'label'    => __('Sunday', 'cityclub-modern'),
        'section'  => 'cityclub_hours_section',
        'type'     => 'text',
    ));

    // Holidays
    $wp_customize->add_setting('cityclub_hours_holidays', array(
        'default'           => '10h - 18h',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cityclub_hours_holidays', array(
        'label'    => __('Holidays', 'cityclub-modern'),
        'section'  => 'cityclub_hours_section',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'cityclub_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cityclub_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cityclub_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cityclub_customize_preview_js() {
    wp_enqueue_script('cityclub-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), CITYCLUB_VERSION, true);
}
add_action('customize_preview_init', 'cityclub_customize_preview_js');

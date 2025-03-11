<?php
/**
 * Theme Options for CityClub Theme
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Add Theme Options page to the admin menu
 */
function cityclub_add_theme_options_page() {
    add_theme_page(
        esc_html__( 'CityClub Options', 'cityclub' ),
        esc_html__( 'CityClub Options', 'cityclub' ),
        'manage_options',
        'cityclub-options',
        'cityclub_theme_options_page'
    );
}
add_action( 'admin_menu', 'cityclub_add_theme_options_page' );

/**
 * Register Theme Options settings
 */
function cityclub_register_settings() {
    // Register settings
    register_setting( 'cityclub_options', 'cityclub_theme_options', 'cityclub_validate_options' );
    
    // Add sections
    add_settings_section(
        'cityclub_general_section',
        esc_html__( 'General Settings', 'cityclub' ),
        'cityclub_general_section_callback',
        'cityclub-options'
    );
    
    add_settings_section(
        'cityclub_colors_section',
        esc_html__( 'Color Settings', 'cityclub' ),
        'cityclub_colors_section_callback',
        'cityclub-options'
    );
    
    add_settings_section(
        'cityclub_header_section',
        esc_html__( 'Header Settings', 'cityclub' ),
        'cityclub_header_section_callback',
        'cityclub-options'
    );
    
    add_settings_section(
        'cityclub_footer_section',
        esc_html__( 'Footer Settings', 'cityclub' ),
        'cityclub_footer_section_callback',
        'cityclub-options'
    );
    
    // Add fields
    
    // General Settings
    add_settings_field(
        'cityclub_logo',
        esc_html__( 'Logo', 'cityclub' ),
        'cityclub_logo_callback',
        'cityclub-options',
        'cityclub_general_section'
    );
    
    add_settings_field(
        'cityclub_favicon',
        esc_html__( 'Favicon', 'cityclub' ),
        'cityclub_favicon_callback',
        'cityclub-options',
        'cityclub_general_section'
    );
    
    // Color Settings
    add_settings_field(
        'cityclub_primary_color',
        esc_html__( 'Primary Color', 'cityclub' ),
        'cityclub_primary_color_callback',
        'cityclub-options',
        'cityclub_colors_section'
    );
    
    add_settings_field(
        'cityclub_secondary_color',
        esc_html__( 'Secondary Color', 'cityclub' ),
        'cityclub_secondary_color_callback',
        'cityclub-options',
        'cityclub_colors_section'
    );
    
    add_settings_field(
        'cityclub_text_color',
        esc_html__( 'Text Color', 'cityclub' ),
        'cityclub_text_color_callback',
        'cityclub-options',
        'cityclub_colors_section'
    );
    
    // Header Settings
    add_settings_field(
        'cityclub_sticky_header',
        esc_html__( 'Sticky Header', 'cityclub' ),
        'cityclub_sticky_header_callback',
        'cityclub-options',
        'cityclub_header_section'
    );
    
    add_settings_field(
        'cityclub_header_button_text',
        esc_html__( 'Header Button Text', 'cityclub' ),
        'cityclub_header_button_text_callback',
        'cityclub-options',
        'cityclub_header_section'
    );
    
    add_settings_field(
        'cityclub_header_button_url',
        esc_html__( 'Header Button URL', 'cityclub' ),
        'cityclub_header_button_url_callback',
        'cityclub-options',
        'cityclub_header_section'
    );
    
    // Footer Settings
    add_settings_field(
        'cityclub_footer_copyright',
        esc_html__( 'Footer Copyright Text', 'cityclub' ),
        'cityclub_footer_copyright_callback',
        'cityclub-options',
        'cityclub_footer_section'
    );
    
    add_settings_field(
        'cityclub_footer_columns',
        esc_html__( 'Footer Columns', 'cityclub' ),
        'cityclub_footer_columns_callback',
        'cityclub-options',
        'cityclub_footer_section'
    );
}
add_action( 'admin_init', 'cityclub_register_settings' );

/**
 * Section callbacks
 */
function cityclub_general_section_callback() {
    echo '<p>' . esc_html__( 'General settings for your theme.', 'cityclub' ) . '</p>';
}

function cityclub_colors_section_callback() {
    echo '<p>' . esc_html__( 'Customize the colors of your theme.', 'cityclub' ) . '</p>';
}

function cityclub_header_section_callback() {
    echo '<p>' . esc_html__( 'Customize the header section.', 'cityclub' ) . '</p>';
}

function cityclub_footer_section_callback() {
    echo '<p>' . esc_html__( 'Customize the footer section.', 'cityclub' ) . '</p>';
}

/**
 * Field callbacks
 */
function cityclub_logo_callback() {
    $options = get_option( 'cityclub_theme_options' );
    $logo = isset( $options['logo'] ) ? $options['logo'] : '';
    
    echo '<input type="hidden" id="cityclub_logo" name="cityclub_theme_options[logo]" value="' . esc_attr( $logo ) . '" />';
    echo '<input id="upload_logo_button" type="button" class="button" value="' . esc_attr__( 'Upload Logo', 'cityclub' ) . '" />';
    
    if ( ! empty( $logo ) ) {
        echo '<div id="logo_preview"><img src="' . esc_url( $logo ) . '" style="max-width:300px;" /><br/>';
        echo '<input id="remove_logo_button" type="button" class="button" value="' . esc_attr__( 'Remove Logo', 'cityclub' ) . '" /></div>';
    } else {
        echo '<div id="logo_preview"></div>';
    }
}

function cityclub_favicon_callback() {
    $options = get_option( 'cityclub_theme_options' );
    $favicon = isset( $options['favicon'] ) ? $options['favicon'] : '';
    
    echo '<input type="hidden" id="cityclub_favicon" name="cityclub_theme_options[favicon]" value="' . esc_attr( $favicon ) . '" />';
    echo '<input id="upload_favicon_button" type="button" class="button" value="' . esc_attr__( 'Upload Favicon', 'cityclub' ) . '" />';
    
    if ( ! empty( $favicon ) ) {
        echo '<div id="favicon_preview"><img src="' . esc_url( $favicon ) . '" style="max-width:64px;" /><br/>';
        echo '<input id="remove_favicon_button" type="button" class="button" value="' . esc_attr__( 'Remove Favicon', 'cityclub' ) . '" /></div>';
    } else {
        echo '<div id="favicon_preview"></div>';
    }
}

function cityclub_primary_color_callback() {
    $options = get_option( 'cityclub_theme_options' );
    $primary_color = isset( $options['primary_color'] ) ? $options['primary_color'] : '#f26f21';
    
    echo '<input type="text" id="cityclub_primary_color" name="cityclub_theme_options[primary_color]" value="' . esc_attr( $primary_color ) . '" class="cityclub-color-picker" />';
}

function cityclub_secondary_color_callback() {
    $options = get_option( 'cityclub_theme_options' );
    $secondary_color = isset( $options['secondary_color'] ) ? $options['secondary_color'] : '#000000';
    
    echo '<input type="text" id="cityclub_secondary_color" name="cityclub_theme_options[secondary_color]" value="' . esc_attr( $secondary_color ) . '" class="cityclub-color-picker" />';
}

function cityclub_text_color_callback() {
    $options = get_option( 'cityclub_theme_options' );
    $text_color = isset( $options['text_color'] ) ? $options['text_color'] : '#333333';
    
    echo '<input type="text" id="cityclub_text_color" name="cityclub_theme_options[text_color]" value="' . esc_attr( $text_color ) . '" class="cityclub-color-picker" />';
}

function cityclub_sticky_header_callback() {
    $options = get_option( 'cityclub_theme_options' );
    $sticky_header = isset( $options['sticky_header'] ) ? $options['sticky_header'] : 1;
    
    echo '<input type="checkbox" id="cityclub_sticky_header" name="cityclub_theme_options[sticky_header]" value="1" ' . checked( 1, $sticky_header, false ) . ' />';
    echo '<label for="cityclub_sticky_header">' . esc_html__( 'Enable sticky header', 'cityclub' ) . '</label>';
}

function cityclub_header_button_text_callback() {
    $options = get_option( 'cityclub_theme_options' );
    $header_button_text = isset( $options['header_button_text'] ) ? $options['header_button_text'] : esc_html__( 'S\'inscrire', 'cityclub' );
    
    echo '<input type="text" id="cityclub_header_button_text" name="cityclub_theme_options[header_button_text]" value="' . esc_attr( $header_button_text ) . '" class="regular-text" />';
}

function cityclub_header_button_url_callback() {
    $options = get_option( 'cityclub_theme_options' );
    $header_button_url = isset( $options['header_button_url'] ) ? $options['header_button_url'] : '#';
    
    echo '<input type="text" id="cityclub_header_button_url" name="cityclub_theme_options[header_button_url]" value="' . esc_attr( $header_button_url ) . '" class="regular-text" />';
}

function cityclub_footer_copyright_callback() {
    $options = get_option( 'cityclub_theme_options' );
    $footer_copyright = isset( $options['footer_copyright'] ) ? $options['footer_copyright'] : '© ' . date('Y') . ' CityClub. ' . esc_html__( 'Tous droits réservés.', 'cityclub' );
    
    echo '<textarea id="cityclub_footer_copyright" name="cityclub_theme_options[footer_copyright]" rows="3" cols="50">' . esc_textarea( $footer_copyright ) . '</textarea>';
}

function cityclub_footer_columns_callback() {
    $options = get_option( 'cityclub_theme_options' );
    $footer_columns = isset( $options['footer_columns'] ) ? $options['footer_columns'] : 3;
    
    echo '<select id="cityclub_footer_columns" name="cityclub_theme_options[footer_columns]">';
    echo '<option value="1" ' . selected( 1, $footer_columns, false ) . '>1</option>';
    echo '<option value="2" ' . selected( 2, $footer_columns, false ) . '>2</option>';
    echo '<option value="3" ' . selected( 3, $footer_columns, false ) . '>3</option>';
    echo '<option value="4" ' . selected( 4, $footer_columns, false ) . '>4</option>';
    echo '</select>';
}

/**
 * Validate options
 */
function cityclub_validate_options( $input ) {
    $valid = [];
    
    // Validate Logo
    $valid['logo'] = esc_url_raw( $input['logo'] );
    
    // Validate Favicon
    $valid['favicon'] = esc_url_raw( $input['favicon'] );
    
    // Validate Primary Color
    $valid['primary_color'] = sanitize_hex_color( $input['primary_color'] );
    
    // Validate Secondary Color
    $valid['secondary_color'] = sanitize_hex_color( $input['secondary_color'] );
    
    // Validate Text Color
    $valid['text_color'] = sanitize_hex_color( $input['text_color'] );
    
    // Validate Sticky Header
    $valid['sticky_header'] = isset( $input['sticky_header'] ) ? 1 : 0;
    
    // Validate Header Button Text
    $valid['header_button_text'] = sanitize_text_field( $input['header_button_text'] );
    
    // Validate Header Button URL
    $valid['header_button_url'] = esc_url_raw( $input['header_button_url'] );
    
    // Validate Footer Copyright
    $valid['footer_copyright'] = wp_kses_post( $input['footer_copyright'] );
    
    // Validate Footer Columns
    $valid['footer_columns'] = absint( $input['footer_columns'] );
    if ( $valid['footer_columns'] > 4 ) {
        $valid['footer_columns'] = 4;
    } elseif ( $valid['footer_columns'] < 1 ) {
        $valid['footer_columns'] = 1;
    }
    
    return $valid;
}

/**
 * Theme Options page callback
 */
function cityclub_theme_options_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'cityclub_options' );
            do_settings_sections( 'cityclub-options' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
 * Enqueue admin scripts and styles
 */
function cityclub_admin_scripts( $hook ) {
    if ( 'appearance_page_cityclub-options' !== $hook ) {
        return;
    }
    
    // Add color picker
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
    
    // Add media uploader
    wp_enqueue_media();
    
    // Add custom admin script
    wp_enqueue_script( 'cityclub-admin-script', get_template_directory_uri() . '/js/admin.js', array( 'jquery', 'wp-color-picker' ), CITYCLUB_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'cityclub_admin_scripts' );

/**
 * Apply theme options to the front-end
 */
function cityclub_apply_theme_options() {
    $options = get_option( 'cityclub_theme_options' );
    
    if ( ! $options ) {
        return;
    }
    
    $primary_color = isset( $options['primary_color'] ) ? $options['primary_color'] : '#f26f21';
    $secondary_color = isset( $options['secondary_color'] ) ? $options['secondary_color'] : '#000000';
    $text_color = isset( $options['text_color'] ) ? $options['text_color'] : '#333333';
    
    $custom_css = "\n";
    $custom_css .= ":root {\n";
    $custom_css .= "  --primary-color: {$primary_color};\n";
    $custom_css .= "  --secondary-color: {$secondary_color};\n";
    $custom_css .= "  --text-color: {$text_color};\n";
    $custom_css .= "}\n";
    
    $custom_css .= "a, .site-logo span.city, .site-logo sup, .main-navigation a:hover, .feature-content h4, .stats span, .section-subtitle { color: {$primary_color}; }\n";
    $custom_css .= ".btn, .feature-icon, .promo-badge { background-color: {$primary_color}; }\n";
    $custom_css .= ".location-finder { border-color: {$primary_color}; }\n";
    $custom_css .= ".site-logo span.club { color: {$secondary_color}; }\n";
    $custom_css .= "body { color: {$text_color}; }\n";
    
    // Add sticky header CSS if enabled
    if ( isset( $options['sticky_header'] ) && $options['sticky_header'] ) {
        $custom_css .= ".site-header { position: sticky; top: 0; z-index: 100; }\n";
    } else {
        $custom_css .= ".site-header { position: relative; }\n";
    }
    
    wp_add_inline_style( 'cityclub-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'cityclub_apply_theme_options', 20 );

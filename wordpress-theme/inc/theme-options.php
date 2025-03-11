<?php
/**
 * Theme Options for CityClub Modern
 */

// Create Theme Options Page
function cityclub_theme_options_page() {
    add_theme_page(
        __('Theme Options', 'cityclub-modern'),
        __('Theme Options', 'cityclub-modern'),
        'edit_theme_options',
        'cityclub-theme-options',
        'cityclub_theme_options_page_html'
    );
}
add_action('admin_menu', 'cityclub_theme_options_page');

// Theme Options Page HTML
function cityclub_theme_options_page_html() {
    // Check user capabilities
    if (!current_user_can('edit_theme_options')) {
        return;
    }

    // Add error/update messages
    if (isset($_GET['settings-updated'])) {
        add_settings_error('cityclub_messages', 'cityclub_message', __('Settings Saved', 'cityclub-modern'), 'updated');
    }

    // Show error/update messages
    settings_errors('cityclub_messages');
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <p><?php _e('Welcome to CityClub Modern Theme Options. Here you can configure additional theme settings.', 'cityclub-modern'); ?></p>
        
        <form action="options.php" method="post">
            <?php
            // Output security fields for the registered setting
            settings_fields('cityclub_options');
            // Output setting sections and their fields
            do_settings_sections('cityclub-theme-options');
            // Output save settings button
            submit_button(__('Save Settings', 'cityclub-modern'));
            ?>
        </form>
    </div>
    <?php
}

// Register Settings
function cityclub_register_settings() {
    // Register a new setting for "cityclub-theme-options" page
    register_setting('cityclub_options', 'cityclub_theme_options');

    // Register a new section in the "cityclub-theme-options" page
    add_settings_section(
        'cityclub_general_section',
        __('General Settings', 'cityclub-modern'),
        'cityclub_general_section_callback',
        'cityclub-theme-options'
    );

    // Register fields
    add_settings_field(
        'cityclub_primary_color',
        __('Primary Color', 'cityclub-modern'),
        'cityclub_color_field_callback',
        'cityclub-theme-options',
        'cityclub_general_section',
        [
            'label_for' => 'cityclub_primary_color',
            'class' => 'cityclub-color-field',
            'default' => '#f26f21',
        ]
    );

    add_settings_field(
        'cityclub_google_maps_api',
        __('Google Maps API Key', 'cityclub-modern'),
        'cityclub_text_field_callback',
        'cityclub-theme-options',
        'cityclub_general_section',
        [
            'label_for' => 'cityclub_google_maps_api',
            'class' => 'cityclub-text-field',
            'description' => __('Enter your Google Maps API key for the club location finder.', 'cityclub-modern'),
        ]
    );

    add_settings_field(
        'cityclub_analytics_code',
        __('Analytics Code', 'cityclub-modern'),
        'cityclub_textarea_field_callback',
        'cityclub-theme-options',
        'cityclub_general_section',
        [
            'label_for' => 'cityclub_analytics_code',
            'class' => 'cityclub-textarea-field',
            'description' => __('Enter your Google Analytics or other tracking code.', 'cityclub-modern'),
        ]
    );
}
add_action('admin_init', 'cityclub_register_settings');

// Section callback function
function cityclub_general_section_callback($args) {
    ?>
    <p id="<?php echo esc_attr($args['id']); ?>"><?php _e('Configure general theme settings.', 'cityclub-modern'); ?></p>
    <?php
}

// Color field callback function
function cityclub_color_field_callback($args) {
    $options = get_option('cityclub_theme_options');
    $value = isset($options[$args['label_for']]) ? $options[$args['label_for']] : $args['default'];
    ?>
    <input type="text" 
           id="<?php echo esc_attr($args['label_for']); ?>"
           name="cityclub_theme_options[<?php echo esc_attr($args['label_for']); ?>]"
           value="<?php echo esc_attr($value); ?>"
           class="cityclub-color-picker" />
    <?php
}

// Text field callback function
function cityclub_text_field_callback($args) {
    $options = get_option('cityclub_theme_options');
    $value = isset($options[$args['label_for']]) ? $options[$args['label_for']] : '';
    ?>
    <input type="text" 
           id="<?php echo esc_attr($args['label_for']); ?>"
           name="cityclub_theme_options[<?php echo esc_attr($args['label_for']); ?>]"
           value="<?php echo esc_attr($value); ?>"
           class="regular-text" />
    <?php if (isset($args['description'])) : ?>
        <p class="description"><?php echo esc_html($args['description']); ?></p>
    <?php endif; ?>
    <?php
}

// Textarea field callback function
function cityclub_textarea_field_callback($args) {
    $options = get_option('cityclub_theme_options');
    $value = isset($options[$args['label_for']]) ? $options[$args['label_for']] : '';
    ?>
    <textarea 
        id="<?php echo esc_attr($args['label_for']); ?>"
        name="cityclub_theme_options[<?php echo esc_attr($args['label_for']); ?>]"
        rows="5"
        class="large-text"><?php echo esc_textarea($value); ?></textarea>
    <?php if (isset($args['description'])) : ?>
        <p class="description"><?php echo esc_html($args['description']); ?></p>
    <?php endif; ?>
    <?php
}

// Enqueue color picker
function cityclub_admin_enqueue_scripts() {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('cityclub-admin', get_template_directory_uri() . '/assets/js/admin.js', array('jquery', 'wp-color-picker'), CITYCLUB_VERSION, true);
}
add_action('admin_enqueue_scripts', 'cityclub_admin_enqueue_scripts');

// Get theme option
function cityclub_get_theme_option($option, $default = '') {
    $options = get_option('cityclub_theme_options');
    return isset($options[$option]) ? $options[$option] : $default;
}

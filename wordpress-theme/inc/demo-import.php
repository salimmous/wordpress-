<?php
/**
 * Demo Import functionality for CityClub Modern Theme
 */

// Include the main demo importer class
require_once get_template_directory() . '/inc/class-cityclub-demo-importer.php';

/**
 * Register demo import menu
 */
function cityclub_demo_import_menu() {
    add_theme_page(
        __('Import Demo Data', 'cityclub-modern'),
        __('Import Demo Data', 'cityclub-modern'),
        'edit_theme_options',
        'cityclub-demo-import',
        'cityclub_demo_import_page'
    );
}
add_action('admin_menu', 'cityclub_demo_import_menu');

/**
 * Demo import page callback
 */
function cityclub_demo_import_page() {
    ?>
    <div class="wrap cityclub-demo-import-wrap">
        <h1><?php esc_html_e('CityClub Demo Import', 'cityclub-modern'); ?></h1>
        
        <div class="cityclub-demo-import-intro">
            <p><?php esc_html_e('Choose one of the pre-built demo layouts below to import. The import process will create pages, posts, menus, and widgets as shown in the demo.', 'cityclub-modern'); ?></p>
        </div>
        
        <?php if (!class_exists('Elementor\Plugin')) : ?>
            <div class="notice notice-warning">
                <p><?php esc_html_e('Elementor Page Builder is required for the full demo experience. Please install and activate Elementor before importing the demo.', 'cityclub-modern'); ?> <a href="<?php echo esc_url(admin_url('plugin-install.php?s=elementor&tab=search&type=term')); ?>" class="button button-primary"><?php esc_html_e('Install Elementor', 'cityclub-modern'); ?></a></p>
            </div>
        <?php endif; ?>
        
        <?php if (!class_exists('ElementorPro\Plugin')) : ?>
            <div class="notice notice-info">
                <p><?php esc_html_e('Elementor Pro is recommended for the full demo experience. Some features may not be available without Elementor Pro.', 'cityclub-modern'); ?> <a href="https://elementor.com/pro/" target="_blank" class="button"><?php esc_html_e('Get Elementor Pro', 'cityclub-modern'); ?></a></p>
            </div>
        <?php endif; ?>
        
        <h2><?php esc_html_e('Demo Preview', 'cityclub-modern'); ?></h2>
        
        <div class="cityclub-demos-container">
            <!-- Main Demo -->
            <div class="cityclub-demo-item">
                <div class="cityclub-demo-preview">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/demo/home-preview.jpg'); ?>" alt="<?php esc_attr_e('Main Demo', 'cityclub-modern'); ?>">
                    <div class="cityclub-demo-actions">
                        <a href="https://cityclub.ma/demo" target="_blank" class="button"><?php esc_html_e('Preview', 'cityclub-modern'); ?></a>
                        <button class="button button-primary cityclub-import-demo-button" data-demo-id="main"><?php esc_html_e('Import', 'cityclub-modern'); ?></button>
                    </div>
                </div>
                <h3><?php esc_html_e('Main Demo', 'cityclub-modern'); ?></h3>
                <p><?php esc_html_e('Standard fitness club layout with all features.', 'cityclub-modern'); ?></p>
            </div>
            
            <!-- Dark Demo -->
            <div class="cityclub-demo-item">
                <div class="cityclub-demo-preview">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/demo/about-preview.jpg'); ?>" alt="<?php esc_attr_e('Dark Demo', 'cityclub-modern'); ?>">
                    <div class="cityclub-demo-actions">
                        <a href="https://cityclub.ma/demo-dark" target="_blank" class="button"><?php esc_html_e('Preview', 'cityclub-modern'); ?></a>
                        <button class="button button-primary cityclub-import-demo-button" data-demo-id="dark"><?php esc_html_e('Import', 'cityclub-modern'); ?></button>
                    </div>
                </div>
                <h3><?php esc_html_e('Dark Demo', 'cityclub-modern'); ?></h3>
                <p><?php esc_html_e('Dark theme variation with modern design.', 'cityclub-modern'); ?></p>
            </div>
            
            <!-- Lady Demo -->
            <div class="cityclub-demo-item">
                <div class="cityclub-demo-preview">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/demo/classes-preview.jpg'); ?>" alt="<?php esc_attr_e('Lady Demo', 'cityclub-modern'); ?>">
                    <div class="cityclub-demo-actions">
                        <a href="https://cityclub.ma/demo-lady" target="_blank" class="button"><?php esc_html_e('Preview', 'cityclub-modern'); ?></a>
                        <button class="button button-primary cityclub-import-demo-button" data-demo-id="lady"><?php esc_html_e('Import', 'cityclub-modern'); ?></button>
                    </div>
                </div>
                <h3><?php esc_html_e('Lady Demo', 'cityclub-modern'); ?></h3>
                <p><?php esc_html_e('Female-focused fitness club layout.', 'cityclub-modern'); ?></p>
            </div>
        </div>
        
        <div class="cityclub-demo-import-steps">
            <h3><?php esc_html_e('Import Steps', 'cityclub-modern'); ?></h3>
            <ol>
                <li><?php esc_html_e('Choose a demo layout and click Import.', 'cityclub-modern'); ?></li>
                <li><?php esc_html_e('Wait for the import process to complete. This may take a few minutes.', 'cityclub-modern'); ?></li>
                <li><?php esc_html_e('After import, you may need to set up the menu locations and homepage settings.', 'cityclub-modern'); ?></li>
                <li><?php esc_html_e('Customize the theme options to match your brand.', 'cityclub-modern'); ?></li>
            </ol>
        </div>
    </div>
    
    <!-- Import Modal -->
    <div class="cityclub-import-modal" style="display: none;">
        <div class="cityclub-import-modal-content">
            <span class="cityclub-import-modal-close">&times;</span>
            <h2><?php esc_html_e('Importing Demo Content', 'cityclub-modern'); ?></h2>
            <p><?php esc_html_e('Please wait while we import the demo content. This may take a few minutes.', 'cityclub-modern'); ?></p>
            
            <div class="cityclub-import-progress">
                <div class="cityclub-import-progress-bar" style="width: 0%"></div>
                <div class="cityclub-import-progress-message"><?php esc_html_e('Preparing import...', 'cityclub-modern'); ?></div>
            </div>
            
            <div class="cityclub-import-complete" style="display: none;">
                <h3><?php esc_html_e('Import Complete!', 'cityclub-modern'); ?></h3>
                <p><?php esc_html_e('The demo content has been imported successfully.', 'cityclub-modern'); ?></p>
                <div class="cityclub-import-actions">
                    <a href="<?php echo esc_url(admin_url('customize.php')); ?>" class="button button-primary"><?php esc_html_e('Customize Theme', 'cityclub-modern'); ?></a>
                    <a href="<?php echo esc_url(home_url()); ?>" class="button"><?php esc_html_e('View Site', 'cityclub-modern'); ?></a>
                    <button class="button cityclub-import-close-button"><?php esc_html_e('Close', 'cityclub-modern'); ?></button>
                </div>
            </div>
            
            <div class="cityclub-import-error" style="display: none;">
                <h3><?php esc_html_e('Import Error', 'cityclub-modern'); ?></h3>
                <p class="cityclub-import-error-message"></p>
                <div class="cityclub-import-actions">
                    <button class="button cityclub-import-close-button"><?php esc_html_e('Close', 'cityclub-modern'); ?></button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Enqueue demo import scripts and styles
 */
function cityclub_demo_import_scripts($hook) {
    if ('appearance_page_cityclub-demo-import' !== $hook) {
        return;
    }
    
    wp_enqueue_style('cityclub-demo-import', get_template_directory_uri() . '/assets/css/admin/demo-import.css', array(), CITYCLUB_VERSION);
    wp_enqueue_script('cityclub-demo-import', get_template_directory_uri() . '/assets/js/admin/demo-import.js', array('jquery'), CITYCLUB_VERSION, true);
    
    wp_localize_script('cityclub-demo-import', 'cityclubDemoImport', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('cityclub_demo_import_nonce'),
        'importing' => __('Importing...', 'cityclub-modern'),
        'imported' => __('Import complete!', 'cityclub-modern'),
        'error' => __('Error', 'cityclub-modern'),
        'installing' => __('Installing...', 'cityclub-modern'),
        'activating' => __('Activating...', 'cityclub-modern'),
        'activated' => __('Activated', 'cityclub-modern'),
    ));
}
add_action('admin_enqueue_scripts', 'cityclub_demo_import_scripts');

/**
 * Ajax handler for importing demo content
 */
function cityclub_import_demo_ajax() {
    // Check nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'cityclub_demo_import_nonce')) {
        wp_send_json_error(array('message' => __('Invalid nonce.', 'cityclub-modern')));
    }
    
    // Check if demo ID is set
    if (!isset($_POST['demo_id'])) {
        wp_send_json_error(array('message' => __('No demo specified.', 'cityclub-modern')));
    }
    
    $demo_id = sanitize_text_field($_POST['demo_id']);
    
    // Initialize the importer
    $importer = new CityClub_Demo_Importer();
    
    // Import the demo
    $result = $importer->import_demo($demo_id);
    
    if (is_wp_error($result)) {
        wp_send_json_error(array('message' => $result->get_error_message()));
    }
    
    wp_send_json_success(array('message' => __('Demo imported successfully!', 'cityclub-modern')));
}
add_action('wp_ajax_cityclub_import_demo', 'cityclub_import_demo_ajax');

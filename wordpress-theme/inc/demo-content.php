<?php
/**
 * Demo Content functionality for CityClub Modern Theme
 */

/**
 * Add demo content preview page
 */
function cityclub_demo_content_preview_page() {
    add_theme_page(
        __('Demo Content Preview', 'cityclub-modern'),
        __('Demo Content Preview', 'cityclub-modern'),
        'edit_theme_options',
        'cityclub-demo-preview',
        'cityclub_demo_content_preview_page_html'
    );
}
add_action('admin_menu', 'cityclub_demo_content_preview_page');

/**
 * Demo content preview page callback
 */
function cityclub_demo_content_preview_page_html() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('CityClub Demo Content Preview', 'cityclub-modern'); ?></h1>
        
        <div class="cityclub-demo-preview">
            <h3><?php esc_html_e('Preview of Demo Content', 'cityclub-modern'); ?></h3>
            <p><?php esc_html_e('Here\'s a preview of what you\'ll get after importing the demo content.', 'cityclub-modern'); ?></p>
            
            <div class="cityclub-demo-screenshots">
                <div class="cityclub-screenshot">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/demo/home-preview.jpg'); ?>" alt="<?php esc_attr_e('Home Page', 'cityclub-modern'); ?>">
                    <span><?php esc_html_e('Home Page', 'cityclub-modern'); ?></span>
                </div>
                <div class="cityclub-screenshot">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/demo/about-preview.jpg'); ?>" alt="<?php esc_attr_e('About Page', 'cityclub-modern'); ?>">
                    <span><?php esc_html_e('About Page', 'cityclub-modern'); ?></span>
                </div>
                <div class="cityclub-screenshot">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/demo/classes-preview.jpg'); ?>" alt="<?php esc_attr_e('Classes Page', 'cityclub-modern'); ?>">
                    <span><?php esc_html_e('Classes Page', 'cityclub-modern'); ?></span>
                </div>
                <div class="cityclub-screenshot">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/demo/trainers-preview.jpg'); ?>" alt="<?php esc_attr_e('Trainers Page', 'cityclub-modern'); ?>">
                    <span><?php esc_html_e('Trainers Page', 'cityclub-modern'); ?></span>
                </div>
            </div>
            
            <p><?php esc_html_e('To import this demo content, go to Appearance > Import Demo Data.', 'cityclub-modern'); ?></p>
            <a href="<?php echo esc_url(admin_url('themes.php?page=cityclub-demo-import')); ?>" class="button button-primary"><?php esc_html_e('Go to Demo Import', 'cityclub-modern'); ?></a>
        </div>
    </div>
    <?php
}

/**
 * Enqueue demo content preview scripts and styles
 */
function cityclub_demo_content_preview_scripts($hook) {
    if ('appearance_page_cityclub-demo-preview' !== $hook) {
        return;
    }
    
    wp_enqueue_style('cityclub-demo-content-preview', get_template_directory_uri() . '/assets/css/admin/demo-content-preview.css', array(), CITYCLUB_VERSION);
    wp_enqueue_script('cityclub-demo-content-preview', get_template_directory_uri() . '/assets/js/admin/demo-content-preview.js', array('jquery'), CITYCLUB_VERSION, true);
}
add_action('admin_enqueue_scripts', 'cityclub_demo_content_preview_scripts');

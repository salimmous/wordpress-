<?php
/**
 * CityClub Demo Importer Class
 */

class CityClub_Demo_Importer {
    /**
     * Demo data directory
     */
    private $demo_dir;

    /**
     * Constructor
     */
    public function __construct() {
        $this->demo_dir = get_template_directory() . '/inc/demo-data/';
    }

    /**
     * Import demo content
     *
     * @param string $demo_id The demo ID to import
     * @return bool|WP_Error True on success, WP_Error on failure
     */
    public function import_demo($demo_id) {
        // Validate demo ID
        if (!in_array($demo_id, array('main', 'dark', 'lady'))) {
            return new WP_Error('invalid_demo', __('Invalid demo ID.', 'cityclub-modern'));
        }

        // Check if required plugins are active
        if (!$this->check_required_plugins()) {
            return new WP_Error('missing_plugins', __('Required plugins are not active.', 'cityclub-modern'));
        }

        // Import content
        $content_file = $this->demo_dir . 'demo-content.xml';
        if ($demo_id !== 'main') {
            $content_file = $this->demo_dir . 'demo-content-' . $demo_id . '.xml';
        }

        if (!file_exists($content_file)) {
            return new WP_Error('missing_content', __('Demo content file not found.', 'cityclub-modern'));
        }

        // Import content using WordPress importer
        $result = $this->import_content($content_file);
        if (is_wp_error($result)) {
            return $result;
        }

        // Import widgets
        $this->import_widgets($demo_id);

        // Import customizer settings
        $this->import_customizer($demo_id);

        // Set up menus
        $this->setup_menus();

        // Set up homepage
        $this->setup_homepage();

        return true;
    }

    /**
     * Check if required plugins are active
     *
     * @return bool True if all required plugins are active, false otherwise
     */
    private function check_required_plugins() {
        // Check for Elementor
        if (!class_exists('Elementor\Plugin')) {
            return false;
        }

        return true;
    }

    /**
     * Import content using WordPress importer
     *
     * @param string $file Path to the content file
     * @return bool|WP_Error True on success, WP_Error on failure
     */
    private function import_content($file) {
        // Check if WordPress importer is available
        if (!class_exists('WP_Import')) {
            // Include WordPress importer
            if (!file_exists(ABSPATH . 'wp-admin/includes/import.php')) {
                return new WP_Error('missing_import', __('WordPress importer not found.', 'cityclub-modern'));
            }

            require_once ABSPATH . 'wp-admin/includes/import.php';

            if (!class_exists('WP_Import')) {
                $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
                if (file_exists($class_wp_importer)) {
                    require_once $class_wp_importer;
                }
            }

            $importer_error = __('WordPress importer not found.', 'cityclub-modern');

            // Check if we have the importer class
            if (!class_exists('WP_Import')) {
                return new WP_Error('missing_import', $importer_error);
            }
        }

        // Create the importer instance
        $importer = new WP_Import();

        // Set up import options
        $options = array(
            'fetch_attachments' => true,
            'default_author' => get_current_user_id(),
        );

        // Run the import
        $result = $importer->import($file, $options);

        if (is_wp_error($result)) {
            return $result;
        }

        return true;
    }

    /**
     * Import widgets
     *
     * @param string $demo_id The demo ID
     */
    private function import_widgets($demo_id) {
        $widgets_file = $this->demo_dir . 'widgets.wie';
        if ($demo_id !== 'main') {
            $widgets_file = $this->demo_dir . 'widgets-' . $demo_id . '.wie';
        }

        if (!file_exists($widgets_file)) {
            return;
        }

        // Get widgets data
        $widgets_data = file_get_contents($widgets_file);
        $widgets_data = json_decode($widgets_data, true);

        if (empty($widgets_data) || !is_array($widgets_data)) {
            return;
        }

        // Get all available widgets
        global $wp_registered_widget_controls;
        $widget_controls = $wp_registered_widget_controls;

        // Get all active widgets
        $active_widgets = get_option('sidebars_widgets');

        // Loop through widget data
        foreach ($widgets_data as $sidebar_id => $widgets) {
            // Skip inactive widgets (should not be in export file)
            if ('wp_inactive_widgets' === $sidebar_id) {
                continue;
            }

            // Check if sidebar exists
            if (!isset($active_widgets[$sidebar_id]) || !is_array($active_widgets[$sidebar_id])) {
                $active_widgets[$sidebar_id] = array();
            }

            // Loop through widgets
            foreach ($widgets as $widget_instance_id => $widget) {
                // Get widget name
                $widget_name = $widget['id_base'];

                // Get widget instance settings
                $widget_settings = isset($widget['settings']) ? $widget['settings'] : array();

                // Get existing widget instances
                $widget_instances = get_option('widget_' . $widget_name, array());

                // Add new instance
                $single_widget_instances = $widget_instances;
                $single_widget_instances[] = $widget_settings;

                // Get the key for the new instance
                end($single_widget_instances);
                $new_instance_id = key($single_widget_instances);

                // If key is 0, make it 1
                if ('0' === strval($new_instance_id)) {
                    $new_instance_id = 1;
                    $single_widget_instances[$new_instance_id] = $single_widget_instances[0];
                    unset($single_widget_instances[0]);
                }

                // Move array index to match widget ID base
                if (isset($single_widget_instances['_multiwidget'])) {
                    $multiwidget = $single_widget_instances['_multiwidget'];
                    unset($single_widget_instances['_multiwidget']);
                    $single_widget_instances['_multiwidget'] = $multiwidget;
                }

                // Update option with new widget
                update_option('widget_' . $widget_name, $single_widget_instances);

                // Add widget instance to sidebar
                $active_widgets[$sidebar_id][] = $widget_name . '-' . $new_instance_id;
            }
        }

        // Update sidebars_widgets option
        update_option('sidebars_widgets', $active_widgets);
    }

    /**
     * Import customizer settings
     *
     * @param string $demo_id The demo ID
     */
    private function import_customizer($demo_id) {
        $customizer_file = $this->demo_dir . 'customizer.dat';
        if ($demo_id !== 'main') {
            $customizer_file = $this->demo_dir . 'customizer-' . $demo_id . '.dat';
        }

        if (!file_exists($customizer_file)) {
            return;
        }

        // Get customizer data
        $customizer_data = file_get_contents($customizer_file);
        $customizer_data = unserialize($customizer_data);

        if (empty($customizer_data) || !is_array($customizer_data)) {
            return;
        }

        // Loop through customizer data and update options
        foreach ($customizer_data as $key => $value) {
            set_theme_mod($key, $value);
        }
    }

    /**
     * Set up menus
     */
    private function setup_menus() {
        // Get all registered menu locations
        $locations = get_registered_nav_menus();

        // Get all created menus
        $menus = wp_get_nav_menus();

        if (empty($menus)) {
            return;
        }

        $menu_locations = array();

        // Assign menus to locations
        foreach ($menus as $menu) {
            if ('Primary Menu' === $menu->name) {
                $menu_locations['primary'] = $menu->term_id;
            } elseif ('Footer Menu' === $menu->name) {
                $menu_locations['footer'] = $menu->term_id;
            }
        }

        // Set menu locations
        set_theme_mod('nav_menu_locations', $menu_locations);
    }

    /**
     * Set up homepage
     */
    private function setup_homepage() {
        // Get the page with template "template-home.php"
        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'template-home.php',
        ));

        if (!empty($pages)) {
            $homepage_id = $pages[0]->ID;

            // Set as homepage
            update_option('page_on_front', $homepage_id);
            update_option('show_on_front', 'page');
        }
    }
}

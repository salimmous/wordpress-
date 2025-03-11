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

        // No plugin check needed
        $this->check_required_plugins();

        // Import content without requiring a file
        $result = $this->import_content(null);
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
        // No plugins required for basic import
        return true;
    }

    /**
     * Import content using WordPress importer
     *
     * @param string $file Path to the content file
     * @return bool|WP_Error True on success, WP_Error on failure
     */
    private function import_content($file) {
        // Simplified import process that doesn't require WordPress Importer
        // Just create a sample page to demonstrate the import worked
        $page_title = 'CityClub Demo Home';
        $page_content = 'This is a demo home page created by the CityClub theme importer. You can customize this page or create new pages as needed.';
        
        // Check if the page already exists
        $existing_page = get_page_by_title($page_title);
        
        if (!$existing_page) {
            // Create a new page
            $page_data = array(
                'post_title'    => $page_title,
                'post_content'  => $page_content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
                'post_author'   => get_current_user_id(),
            );
            
            $page_id = wp_insert_post($page_data);
            
            if (is_wp_error($page_id)) {
                return $page_id;
            }
            
            // Set as front page
            update_option('page_on_front', $page_id);
            update_option('show_on_front', 'page');
            
            // Set page template
            update_post_meta($page_id, '_wp_page_template', 'template-home.php');
        }
        
        // Create a few sample posts for activities
        $activities = array(
            array(
                'title' => 'Musculation',
                'content' => 'Développez votre force et sculptez votre corps avec nos programmes de musculation adaptés à tous les niveaux.',
            ),
            array(
                'title' => 'Cardio',
                'content' => 'Améliorez votre endurance et brûlez des calories avec nos équipements cardio de dernière génération.',
            ),
            array(
                'title' => 'Yoga',
                'content' => 'Retrouvez équilibre et sérénité avec nos cours de yoga pour tous les niveaux.',
            ),
        );
        
        foreach ($activities as $activity) {
            $existing = get_page_by_title($activity['title'], OBJECT, 'post');
            
            if (!$existing) {
                wp_insert_post(array(
                    'post_title'    => $activity['title'],
                    'post_content'  => $activity['content'],
                    'post_status'   => 'publish',
                    'post_type'     => 'post',
                    'post_author'   => get_current_user_id(),
                ));
            }
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

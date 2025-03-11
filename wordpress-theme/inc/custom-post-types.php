<?php
/**
 * Custom Post Types for CityClub Modern Theme
 */

// Register Custom Post Types
function cityclub_register_post_types() {
    // Activity Post Type
    register_post_type('activity', array(
        'labels' => array(
            'name'               => _x('Activities', 'post type general name', 'cityclub-modern'),
            'singular_name'      => _x('Activity', 'post type singular name', 'cityclub-modern'),
            'menu_name'          => _x('Activities', 'admin menu', 'cityclub-modern'),
            'name_admin_bar'     => _x('Activity', 'add new on admin bar', 'cityclub-modern'),
            'add_new'            => _x('Add New', 'activity', 'cityclub-modern'),
            'add_new_item'       => __('Add New Activity', 'cityclub-modern'),
            'new_item'           => __('New Activity', 'cityclub-modern'),
            'edit_item'          => __('Edit Activity', 'cityclub-modern'),
            'view_item'          => __('View Activity', 'cityclub-modern'),
            'all_items'          => __('All Activities', 'cityclub-modern'),
            'search_items'       => __('Search Activities', 'cityclub-modern'),
            'parent_item_colon'  => __('Parent Activities:', 'cityclub-modern'),
            'not_found'          => __('No activities found.', 'cityclub-modern'),
            'not_found_in_trash' => __('No activities found in Trash.', 'cityclub-modern')
        ),
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-universal-access',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'activities'),
        'show_in_rest'        => true,
    ));

    // Club Post Type
    register_post_type('club', array(
        'labels' => array(
            'name'               => _x('Clubs', 'post type general name', 'cityclub-modern'),
            'singular_name'      => _x('Club', 'post type singular name', 'cityclub-modern'),
            'menu_name'          => _x('Clubs', 'admin menu', 'cityclub-modern'),
            'name_admin_bar'     => _x('Club', 'add new on admin bar', 'cityclub-modern'),
            'add_new'            => _x('Add New', 'club', 'cityclub-modern'),
            'add_new_item'       => __('Add New Club', 'cityclub-modern'),
            'new_item'           => __('New Club', 'cityclub-modern'),
            'edit_item'          => __('Edit Club', 'cityclub-modern'),
            'view_item'          => __('View Club', 'cityclub-modern'),
            'all_items'          => __('All Clubs', 'cityclub-modern'),
            'search_items'       => __('Search Clubs', 'cityclub-modern'),
            'parent_item_colon'  => __('Parent Clubs:', 'cityclub-modern'),
            'not_found'          => __('No clubs found.', 'cityclub-modern'),
            'not_found_in_trash' => __('No clubs found in Trash.', 'cityclub-modern')
        ),
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-location',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'clubs'),
        'show_in_rest'        => true,
    ));

    // Coach Post Type
    register_post_type('coach', array(
        'labels' => array(
            'name'               => _x('Coaches', 'post type general name', 'cityclub-modern'),
            'singular_name'      => _x('Coach', 'post type singular name', 'cityclub-modern'),
            'menu_name'          => _x('Coaches', 'admin menu', 'cityclub-modern'),
            'name_admin_bar'     => _x('Coach', 'add new on admin bar', 'cityclub-modern'),
            'add_new'            => _x('Add New', 'coach', 'cityclub-modern'),
            'add_new_item'       => __('Add New Coach', 'cityclub-modern'),
            'new_item'           => __('New Coach', 'cityclub-modern'),
            'edit_item'          => __('Edit Coach', 'cityclub-modern'),
            'view_item'          => __('View Coach', 'cityclub-modern'),
            'all_items'          => __('All Coaches', 'cityclub-modern'),
            'search_items'       => __('Search Coaches', 'cityclub-modern'),
            'parent_item_colon'  => __('Parent Coaches:', 'cityclub-modern'),
            'not_found'          => __('No coaches found.', 'cityclub-modern'),
            'not_found_in_trash' => __('No coaches found in Trash.', 'cityclub-modern')
        ),
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-groups',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'coaches'),
        'show_in_rest'        => true,
    ));
}
add_action('init', 'cityclub_register_post_types');

// Register Custom Meta Boxes
function cityclub_register_meta_boxes() {
    // Activity Meta Box
    add_meta_box(
        'activity_details',
        __('Activity Details', 'cityclub-modern'),
        'cityclub_activity_meta_box_callback',
        'activity',
        'normal',
        'high'
    );

    // Club Meta Box
    add_meta_box(
        'club_details',
        __('Club Details', 'cityclub-modern'),
        'cityclub_club_meta_box_callback',
        'club',
        'normal',
        'high'
    );

    // Coach Meta Box
    add_meta_box(
        'coach_details',
        __('Coach Details', 'cityclub-modern'),
        'cityclub_coach_meta_box_callback',
        'coach',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'cityclub_register_meta_boxes');

// Activity Meta Box Callback
function cityclub_activity_meta_box_callback($post) {
    wp_nonce_field('cityclub_activity_meta_box', 'cityclub_activity_meta_box_nonce');

    $activity_level = get_post_meta($post->ID, 'activity_level', true);
    $activity_duration = get_post_meta($post->ID, 'activity_duration', true);
    $activity_calories = get_post_meta($post->ID, 'activity_calories', true);
    
    ?>
    <p>
        <label for="activity_level"><?php _e('Level:', 'cityclub-modern'); ?></label>
        <select id="activity_level" name="activity_level" class="widefat">
            <option value=""><?php _e('Select Level', 'cityclub-modern'); ?></option>
            <option value="Débutant" <?php selected($activity_level, 'Débutant'); ?>><?php _e('Débutant', 'cityclub-modern'); ?></option>
            <option value="Intermédiaire" <?php selected($activity_level, 'Intermédiaire'); ?>><?php _e('Intermédiaire', 'cityclub-modern'); ?></option>
            <option value="Avancé" <?php selected($activity_level, 'Avancé'); ?>><?php _e('Avancé', 'cityclub-modern'); ?></option>
            <option value="Tous niveaux" <?php selected($activity_level, 'Tous niveaux'); ?>><?php _e('Tous niveaux', 'cityclub-modern'); ?></option>
        </select>
    </p>
    <p>
        <label for="activity_duration"><?php _e('Duration (minutes):', 'cityclub-modern'); ?></label>
        <input type="number" id="activity_duration" name="activity_duration" class="widefat" value="<?php echo esc_attr($activity_duration); ?>">
    </p>
    <p>
        <label for="activity_calories"><?php _e('Calories Burned (approx):', 'cityclub-modern'); ?></label>
        <input type="number" id="activity_calories" name="activity_calories" class="widefat" value="<?php echo esc_attr($activity_calories); ?>">
    </p>
    <?php
}

// Club Meta Box Callback
function cityclub_club_meta_box_callback($post) {
    wp_nonce_field('cityclub_club_meta_box', 'cityclub_club_meta_box_nonce');

    $club_type = get_post_meta($post->ID, 'club_type', true);
    $club_address = get_post_meta($post->ID, 'club_address', true);
    $club_phone = get_post_meta($post->ID, 'club_phone', true);
    $club_email = get_post_meta($post->ID, 'club_email', true);
    $club_hours = get_post_meta($post->ID, 'club_hours', true);
    
    ?>
    <p>
        <label for="club_type"><?php _e('Club Type:', 'cityclub-modern'); ?></label>
        <select id="club_type" name="club_type" class="widefat">
            <option value=""><?php _e('Select Type', 'cityclub-modern'); ?></option>
            <option value="CityClub Standard" <?php selected($club_type, 'CityClub Standard'); ?>><?php _e('CityClub Standard', 'cityclub-modern'); ?></option>
            <option value="CityClub Premium" <?php selected($club_type, 'CityClub Premium'); ?>><?php _e('CityClub Premium', 'cityclub-modern'); ?></option>
            <option value="CityLady" <?php selected($club_type, 'CityLady'); ?>><?php _e('CityLady (100% Femmes)', 'cityclub-modern'); ?></option>
        </select>
    </p>
    <p>
        <label for="club_address"><?php _e('Address:', 'cityclub-modern'); ?></label>
        <input type="text" id="club_address" name="club_address" class="widefat" value="<?php echo esc_attr($club_address); ?>">
    </p>
    <p>
        <label for="club_phone"><?php _e('Phone:', 'cityclub-modern'); ?></label>
        <input type="text" id="club_phone" name="club_phone" class="widefat" value="<?php echo esc_attr($club_phone); ?>">
    </p>
    <p>
        <label for="club_email"><?php _e('Email:', 'cityclub-modern'); ?></label>
        <input type="email" id="club_email" name="club_email" class="widefat" value="<?php echo esc_attr($club_email); ?>">
    </p>
    <p>
        <label for="club_hours"><?php _e('Opening Hours:', 'cityclub-modern'); ?></label>
        <textarea id="club_hours" name="club_hours" class="widefat" rows="4"><?php echo esc_textarea($club_hours); ?></textarea>
    </p>
    <?php
}

// Coach Meta Box Callback
function cityclub_coach_meta_box_callback($post) {
    wp_nonce_field('cityclub_coach_meta_box', 'cityclub_coach_meta_box_nonce');

    $coach_role = get_post_meta($post->ID, 'coach_role', true);
    $coach_expertise = get_post_meta($post->ID, 'coach_expertise', true);
    $coach_experience = get_post_meta($post->ID, 'coach_experience', true);
    
    ?>
    <p>
        <label for="coach_role"><?php _e('Role:', 'cityclub-modern'); ?></label>
        <input type="text" id="coach_role" name="coach_role" class="widefat" value="<?php echo esc_attr($coach_role); ?>" placeholder="<?php _e('e.g. Coach de musculation', 'cityclub-modern'); ?>">
    </p>
    <p>
        <label for="coach_expertise"><?php _e('Expertise (comma separated):', 'cityclub-modern'); ?></label>
        <input type="text" id="coach_expertise" name="coach_expertise" class="widefat" value="<?php echo esc_attr($coach_expertise); ?>" placeholder="<?php _e('e.g. Musculation, Nutrition, Perte de poids', 'cityclub-modern'); ?>">
    </p>
    <p>
        <label for="coach_experience"><?php _e('Experience:', 'cityclub-modern'); ?></label>
        <input type="text" id="coach_experience" name="coach_experience" class="widefat" value="<?php echo esc_attr($coach_experience); ?>" placeholder="<?php _e('e.g. 5 ans', 'cityclub-modern'); ?>">
    </p>
    <?php
}

// Save Meta Box Data
function cityclub_save_meta_box_data($post_id) {
    // Check if our nonce is set for each post type
    if (isset($_POST['cityclub_activity_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['cityclub_activity_meta_box_nonce'], 'cityclub_activity_meta_box')) {
            return;
        }
        
        // Activity fields
        if (isset($_POST['activity_level'])) {
            update_post_meta($post_id, 'activity_level', sanitize_text_field($_POST['activity_level']));
        }
        if (isset($_POST['activity_duration'])) {
            update_post_meta($post_id, 'activity_duration', sanitize_text_field($_POST['activity_duration']));
        }
        if (isset($_POST['activity_calories'])) {
            update_post_meta($post_id, 'activity_calories', sanitize_text_field($_POST['activity_calories']));
        }
    }
    
    if (isset($_POST['cityclub_club_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['cityclub_club_meta_box_nonce'], 'cityclub_club_meta_box')) {
            return;
        }
        
        // Club fields
        if (isset($_POST['club_type'])) {
            update_post_meta($post_id, 'club_type', sanitize_text_field($_POST['club_type']));
        }
        if (isset($_POST['club_address'])) {
            update_post_meta($post_id, 'club_address', sanitize_text_field($_POST['club_address']));
        }
        if (isset($_POST['club_phone'])) {
            update_post_meta($post_id, 'club_phone', sanitize_text_field($_POST['club_phone']));
        }
        if (isset($_POST['club_email'])) {
            update_post_meta($post_id, 'club_email', sanitize_email($_POST['club_email']));
        }
        if (isset($_POST['club_hours'])) {
            update_post_meta($post_id, 'club_hours', sanitize_textarea_field($_POST['club_hours']));
        }
    }
    
    if (isset($_POST['cityclub_coach_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['cityclub_coach_meta_box_nonce'], 'cityclub_coach_meta_box')) {
            return;
        }
        
        // Coach fields
        if (isset($_POST['coach_role'])) {
            update_post_meta($post_id, 'coach_role', sanitize_text_field($_POST['coach_role']));
        }
        if (isset($_POST['coach_expertise'])) {
            update_post_meta($post_id, 'coach_expertise', sanitize_text_field($_POST['coach_expertise']));
        }
        if (isset($_POST['coach_experience'])) {
            update_post_meta($post_id, 'coach_experience', sanitize_text_field($_POST['coach_experience']));
        }
    }
}
add_action('save_post', 'cityclub_save_meta_box_data');

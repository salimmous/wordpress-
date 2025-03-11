<?php
/**
 * CityClub functions and definitions
 *
 * @package CityClub
 */

if ( ! defined( 'CITYCLUB_VERSION' ) ) {
	// Replace the version number as needed
	define( 'CITYCLUB_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function cityclub_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'cityclub' ),
			'footer'  => esc_html__( 'Footer Menu', 'cityclub' ),
		)
	);

	// Switch default core markup to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add custom image sizes
	add_image_size( 'cityclub-hero', 1920, 1080, true );
	add_image_size( 'cityclub-activity', 600, 400, true );
	add_image_size( 'cityclub-trainer', 400, 400, true );
	add_image_size( 'cityclub-gallery', 600, 400, true );
}
add_action( 'after_setup_theme', 'cityclub_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function cityclub_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cityclub_content_width', 1200 );
}
add_action( 'after_setup_theme', 'cityclub_content_width', 0 );

/**
 * Register widget area.
 */
function cityclub_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cityclub' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cityclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'cityclub' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'cityclub' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'cityclub' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'cityclub' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add footer widgets here.', 'cityclub' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'cityclub_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cityclub_scripts() {
	// Enqueue Google Fonts
	wp_enqueue_style( 'cityclub-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap', array(), null );

	// Enqueue Font Awesome
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4' );

	// Enqueue main stylesheet
	wp_enqueue_style( 'cityclub-style', get_stylesheet_uri(), array(), CITYCLUB_VERSION );

	// Enqueue AOS animation library
	wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
	wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true );

	// Enqueue custom scripts
	wp_enqueue_script( 'cityclub-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), CITYCLUB_VERSION, true );
	wp_enqueue_script( 'cityclub-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery', 'aos-js'), CITYCLUB_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cityclub_scripts' );

/**
 * Register Custom Post Types
 */
function cityclub_register_post_types() {
    // Register Trainers CPT
    register_post_type('trainer', array(
        'labels' => array(
            'name'               => _x('Coachs', 'post type general name', 'cityclub'),
            'singular_name'      => _x('Coach', 'post type singular name', 'cityclub'),
            'menu_name'          => _x('Coachs', 'admin menu', 'cityclub'),
            'name_admin_bar'     => _x('Coach', 'add new on admin bar', 'cityclub'),
            'add_new'            => _x('Ajouter', 'trainer', 'cityclub'),
            'add_new_item'       => __('Ajouter un nouveau coach', 'cityclub'),
            'new_item'           => __('Nouveau coach', 'cityclub'),
            'edit_item'          => __('Modifier le coach', 'cityclub'),
            'view_item'          => __('Voir le coach', 'cityclub'),
            'all_items'          => __('Tous les coachs', 'cityclub'),
            'search_items'       => __('Rechercher des coachs', 'cityclub'),
            'parent_item_colon'  => __('Coachs parents:', 'cityclub'),
            'not_found'          => __('Aucun coach trouvé.', 'cityclub'),
            'not_found_in_trash' => __('Aucun coach trouvé dans la corbeille.', 'cityclub')
        ),
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-groups',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'coachs'),
        'show_in_rest'        => true,
    ));

    // Register Activities CPT
    register_post_type('activity', array(
        'labels' => array(
            'name'               => _x('Activités', 'post type general name', 'cityclub'),
            'singular_name'      => _x('Activité', 'post type singular name', 'cityclub'),
            'menu_name'          => _x('Activités', 'admin menu', 'cityclub'),
            'name_admin_bar'     => _x('Activité', 'add new on admin bar', 'cityclub'),
            'add_new'            => _x('Ajouter', 'activity', 'cityclub'),
            'add_new_item'       => __('Ajouter une nouvelle activité', 'cityclub'),
            'new_item'           => __('Nouvelle activité', 'cityclub'),
            'edit_item'          => __('Modifier l\'activité', 'cityclub'),
            'view_item'          => __('Voir l\'activité', 'cityclub'),
            'all_items'          => __('Toutes les activités', 'cityclub'),
            'search_items'       => __('Rechercher des activités', 'cityclub'),
            'parent_item_colon'  => __('Activités parentes:', 'cityclub'),
            'not_found'          => __('Aucune activité trouvée.', 'cityclub'),
            'not_found_in_trash' => __('Aucune activité trouvée dans la corbeille.', 'cityclub')
        ),
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-universal-access',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'activites'),
        'show_in_rest'        => true,
    ));

    // Register Clubs CPT
    register_post_type('club', array(
        'labels' => array(
            'name'               => _x('Clubs', 'post type general name', 'cityclub'),
            'singular_name'      => _x('Club', 'post type singular name', 'cityclub'),
            'menu_name'          => _x('Clubs', 'admin menu', 'cityclub'),
            'name_admin_bar'     => _x('Club', 'add new on admin bar', 'cityclub'),
            'add_new'            => _x('Ajouter', 'club', 'cityclub'),
            'add_new_item'       => __('Ajouter un nouveau club', 'cityclub'),
            'new_item'           => __('Nouveau club', 'cityclub'),
            'edit_item'          => __('Modifier le club', 'cityclub'),
            'view_item'          => __('Voir le club', 'cityclub'),
            'all_items'          => __('Tous les clubs', 'cityclub'),
            'search_items'       => __('Rechercher des clubs', 'cityclub'),
            'parent_item_colon'  => __('Clubs parents:', 'cityclub'),
            'not_found'          => __('Aucun club trouvé.', 'cityclub'),
            'not_found_in_trash' => __('Aucun club trouvé dans la corbeille.', 'cityclub')
        ),
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-location',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'clubs'),
        'show_in_rest'        => true,
    ));

    // Register Testimonials CPT
    register_post_type('testimonial', array(
        'labels' => array(
            'name'               => _x('Témoignages', 'post type general name', 'cityclub'),
            'singular_name'      => _x('Témoignage', 'post type singular name', 'cityclub'),
            'menu_name'          => _x('Témoignages', 'admin menu', 'cityclub'),
            'name_admin_bar'     => _x('Témoignage', 'add new on admin bar', 'cityclub'),
            'add_new'            => _x('Ajouter', 'testimonial', 'cityclub'),
            'add_new_item'       => __('Ajouter un nouveau témoignage', 'cityclub'),
            'new_item'           => __('Nouveau témoignage', 'cityclub'),
            'edit_item'          => __('Modifier le témoignage', 'cityclub'),
            'view_item'          => __('Voir le témoignage', 'cityclub'),
            'all_items'          => __('Tous les témoignages', 'cityclub'),
            'search_items'       => __('Rechercher des témoignages', 'cityclub'),
            'parent_item_colon'  => __('Témoignages parents:', 'cityclub'),
            'not_found'          => __('Aucun témoignage trouvé.', 'cityclub'),
            'not_found_in_trash' => __('Aucun témoignage trouvé dans la corbeille.', 'cityclub')
        ),
        'public'              => true,
        'has_archive'         => false,
        'menu_icon'           => 'dashicons-format-quote',
        'supports'            => array('title', 'editor', 'thumbnail'),
        'rewrite'             => array('slug' => 'temoignages'),
        'show_in_rest'        => true,
    ));
}
add_action('init', 'cityclub_register_post_types');

/**
 * Register custom taxonomies
 */
function cityclub_register_taxonomies() {
    // Register Expertise taxonomy for Trainers
    register_taxonomy('expertise', 'trainer', array(
        'labels' => array(
            'name'              => _x('Expertises', 'taxonomy general name', 'cityclub'),
            'singular_name'     => _x('Expertise', 'taxonomy singular name', 'cityclub'),
            'search_items'      => __('Rechercher des expertises', 'cityclub'),
            'all_items'         => __('Toutes les expertises', 'cityclub'),
            'parent_item'       => __('Expertise parente', 'cityclub'),
            'parent_item_colon' => __('Expertise parente:', 'cityclub'),
            'edit_item'         => __('Modifier l\'expertise', 'cityclub'),
            'update_item'       => __('Mettre à jour l\'expertise', 'cityclub'),
            'add_new_item'      => __('Ajouter une nouvelle expertise', 'cityclub'),
            'new_item_name'     => __('Nom de la nouvelle expertise', 'cityclub'),
            'menu_name'         => __('Expertises', 'cityclub'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'expertise'),
        'show_in_rest'      => true,
    ));

    // Register Activity Type taxonomy for Activities
    register_taxonomy('activity_type', 'activity', array(
        'labels' => array(
            'name'              => _x('Types d\'activité', 'taxonomy general name', 'cityclub'),
            'singular_name'     => _x('Type d\'activité', 'taxonomy singular name', 'cityclub'),
            'search_items'      => __('Rechercher des types d\'activité', 'cityclub'),
            'all_items'         => __('Tous les types d\'activité', 'cityclub'),
            'parent_item'       => __('Type d\'activité parent', 'cityclub'),
            'parent_item_colon' => __('Type d\'activité parent:', 'cityclub'),
            'edit_item'         => __('Modifier le type d\'activité', 'cityclub'),
            'update_item'       => __('Mettre à jour le type d\'activité', 'cityclub'),
            'add_new_item'      => __('Ajouter un nouveau type d\'activité', 'cityclub'),
            'new_item_name'     => __('Nom du nouveau type d\'activité', 'cityclub'),
            'menu_name'         => __('Types d\'activité', 'cityclub'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'type-activite'),
        'show_in_rest'      => true,
    ));

    // Register City taxonomy for Clubs
    register_taxonomy('city', 'club', array(
        'labels' => array(
            'name'              => _x('Villes', 'taxonomy general name', 'cityclub'),
            'singular_name'     => _x('Ville', 'taxonomy singular name', 'cityclub'),
            'search_items'      => __('Rechercher des villes', 'cityclub'),
            'all_items'         => __('Toutes les villes', 'cityclub'),
            'parent_item'       => __('Ville parente', 'cityclub'),
            'parent_item_colon' => __('Ville parente:', 'cityclub'),
            'edit_item'         => __('Modifier la ville', 'cityclub'),
            'update_item'       => __('Mettre à jour la ville', 'cityclub'),
            'add_new_item'      => __('Ajouter une nouvelle ville', 'cityclub'),
            'new_item_name'     => __('Nom de la nouvelle ville', 'cityclub'),
            'menu_name'         => __('Villes', 'cityclub'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'ville'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'cityclub_register_taxonomies');

/**
 * Add custom meta boxes for our custom post types
 */
function cityclub_add_meta_boxes() {
    // Trainer meta box
    add_meta_box(
        'cityclub_trainer_details',
        __('Détails du coach', 'cityclub'),
        'cityclub_trainer_details_callback',
        'trainer',
        'normal',
        'high'
    );

    // Activity meta box
    add_meta_box(
        'cityclub_activity_details',
        __('Détails de l\'activité', 'cityclub'),
        'cityclub_activity_details_callback',
        'activity',
        'normal',
        'high'
    );

    // Club meta box
    add_meta_box(
        'cityclub_club_details',
        __('Détails du club', 'cityclub'),
        'cityclub_club_details_callback',
        'club',
        'normal',
        'high'
    );

    // Testimonial meta box
    add_meta_box(
        'cityclub_testimonial_details',
        __('Détails du témoignage', 'cityclub'),
        'cityclub_testimonial_details_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'cityclub_add_meta_boxes');

/**
 * Trainer details meta box callback
 */
function cityclub_trainer_details_callback($post) {
    wp_nonce_field('cityclub_trainer_details', 'cityclub_trainer_details_nonce');

    $role = get_post_meta($post->ID, '_cityclub_trainer_role', true);
    $experience = get_post_meta($post->ID, '_cityclub_trainer_experience', true);
    $email = get_post_meta($post->ID, '_cityclub_trainer_email', true);
    $phone = get_post_meta($post->ID, '_cityclub_trainer_phone', true);
    $social_facebook = get_post_meta($post->ID, '_cityclub_trainer_facebook', true);
    $social_instagram = get_post_meta($post->ID, '_cityclub_trainer_instagram', true);
    $social_twitter = get_post_meta($post->ID, '_cityclub_trainer_twitter', true);
    
    ?>
    <div class="cityclub-meta-box">
        <p>
            <label for="cityclub_trainer_role"><?php esc_html_e('Rôle', 'cityclub'); ?></label>
            <input type="text" id="cityclub_trainer_role" name="cityclub_trainer_role" value="<?php echo esc_attr($role); ?>" class="widefat">
            <span class="description"><?php esc_html_e('Ex: Coach de musculation', 'cityclub'); ?></span>
        </p>
        <p>
            <label for="cityclub_trainer_experience"><?php esc_html_e('Expérience', 'cityclub'); ?></label>
            <input type="text" id="cityclub_trainer_experience" name="cityclub_trainer_experience" value="<?php echo esc_attr($experience); ?>" class="widefat">
            <span class="description"><?php esc_html_e('Ex: 5 ans', 'cityclub'); ?></span>
        </p>
        <p>
            <label for="cityclub_trainer_email"><?php esc_html_e('Email', 'cityclub'); ?></label>
            <input type="email" id="cityclub_trainer_email" name="cityclub_trainer_email" value="<?php echo esc_attr($email); ?>" class="widefat">
        </p>
        <p>
            <label for="cityclub_trainer_phone"><?php esc_html_e('Téléphone', 'cityclub'); ?></label>
            <input type="text" id="cityclub_trainer_phone" name="cityclub_trainer_phone" value="<?php echo esc_attr($phone); ?>" class="widefat">
        </p>
        <p>
            <label for="cityclub_trainer_facebook"><?php esc_html_e('Facebook', 'cityclub'); ?></label>
            <input type="url" id="cityclub_trainer_facebook" name="cityclub_trainer_facebook" value="<?php echo esc_url($social_facebook); ?>" class="widefat">
        </p>
        <p>
            <label for="cityclub_trainer_instagram"><?php esc_html_e('Instagram', 'cityclub'); ?></label>
            <input type="url" id="cityclub_trainer_instagram" name="cityclub_trainer_instagram" value="<?php echo esc_url($social_instagram); ?>" class="widefat">
        </p>
        <p>
            <label for="cityclub_trainer_twitter"><?php esc_html_e('Twitter', 'cityclub'); ?></label>
            <input type="url" id="cityclub_trainer_twitter" name="cityclub_trainer_twitter" value="<?php echo esc_url($social_twitter); ?>" class="widefat">
        </p>
    </div>
    <?php
}

/**
 * Activity details meta box callback
 */
function cityclub_activity_details_callback($post) {
    wp_nonce_field('cityclub_activity_details', 'cityclub_activity_details_nonce');

    $icon = get_post_meta($post->ID, '_cityclub_activity_icon', true);
    $color = get_post_meta($post->ID, '_cityclub_activity_color', true);
    $level = get_post_meta($post->ID, '_cityclub_activity_level', true);
    $duration = get_post_meta($post->ID, '_cityclub_activity_duration', true);
    $calories = get_post_meta($post->ID, '_cityclub_activity_calories', true);
    
    ?>
    <div class="cityclub-meta-box">
        <p>
            <label for="cityclub_activity_icon"><?php esc_html_e('Icône', 'cityclub'); ?></label>
            <input type="text" id="cityclub_activity_icon" name="cityclub_activity_icon" value="<?php echo esc_attr($icon); ?>" class="widefat">
            <span class="description"><?php esc_html_e('Classe d\'icône (ex: fas fa-dumbbell)', 'cityclub'); ?></span>
        </p>
        <p>
            <label for="cityclub_activity_color"><?php esc_html_e('Couleur', 'cityclub'); ?></label>
            <input type="text" id="cityclub_activity_color" name="cityclub_activity_color" value="<?php echo esc_attr($color); ?>" class="widefat">
            <span class="description"><?php esc_html_e('Classe de couleur (ex: from-red-600 to-red-800)', 'cityclub'); ?></span>
        </p>
        <p>
            <label for="cityclub_activity_level"><?php esc_html_e('Niveau', 'cityclub'); ?></label>
            <select id="cityclub_activity_level" name="cityclub_activity_level" class="widefat">
                <option value=""><?php esc_html_e('Sélectionner un niveau', 'cityclub'); ?></option>
                <option value="beginner" <?php selected($level, 'beginner'); ?>><?php esc_html_e('Débutant', 'cityclub'); ?></option>
                <option value="intermediate" <?php selected($level, 'intermediate'); ?>><?php esc_html_e('Intermédiaire', 'cityclub'); ?></option>
                <option value="advanced" <?php selected($level, 'advanced'); ?>><?php esc_html_e('Avancé', 'cityclub'); ?></option>
                <option value="all" <?php selected($level, 'all'); ?>><?php esc_html_e('Tous niveaux', 'cityclub'); ?></option>
            </select>
        </p>
        <p>
            <label for="cityclub_activity_duration"><?php esc_html_e('Durée', 'cityclub'); ?></label>
            <input type="text" id="cityclub_activity_duration" name="cityclub_activity_duration" value="<?php echo esc_attr($duration); ?>" class="widefat">
            <span class="description"><?php esc_html_e('Ex: 45 minutes', 'cityclub'); ?></span>
        </p>
        <p>
            <label for="cityclub_activity_calories"><?php esc_html_e('Calories brûlées (estimation)', 'cityclub'); ?></label>
            <input type="text" id="cityclub_activity_calories" name="cityclub_activity_calories" value="<?php echo esc_attr($calories); ?>" class="widefat">
            <span class="description"><?php esc_html_e('Ex: 350-450', 'cityclub'); ?></span>
        </p>
    </div>
    <?php
}

/**
 * Club details meta box callback
 */
function cityclub_club_details_callback($post) {
    wp_nonce_field('cityclub_club_details', 'cityclub_club_details_nonce');

    $address = get_post_meta($post->ID, '_cityclub_club_address', true);
    $phone = get_post_meta($post->ID, '_cityclub_club_phone', true);
    $email = get_post_meta($post->ID, '_cityclub_club_email', true);
    $hours = get_post_meta($post->ID, '_cityclub_club_hours', true);
    $lat = get_post_meta($post->ID, '_cityclub_club_lat', true);
    $lng = get_post_meta($post->ID, '_cityclub_club_lng', true);
    $features = get_post_meta($post->ID, '_cityclub_club_features', true);
    
    ?>
    <div class="cityclub-meta-box">
        <p>
            <label for="cityclub_club_address"><?php esc_html_e('Adresse', 'cityclub'); ?></label>
            <input type="text" id="cityclub_club_address" name="cityclub_club_address" value="<?php echo esc_attr($address); ?>" class="widefat">
        </p>
        <p>
            <label for="cityclub_club_phone"><?php esc_html_e('Téléphone', 'cityclub'); ?></label>
            <input type="text" id="cityclub_club_phone" name="cityclub_club_phone" value="<?php echo esc_attr($phone); ?>" class="widefat">
        </p>
        <p>
            <label for="cityclub_club_email"><?php esc_html_e('Email', 'cityclub'); ?></label>
            <input type="email" id="cityclub_club_email" name="cityclub_club_email" value="<?php echo esc_attr($email); ?>" class="widefat">
        </p>
        <p>
            <label for="cityclub_club_hours"><?php esc_html_e('Horaires d\'ouverture', 'cityclub'); ?></label>
            <textarea id="cityclub_club_hours" name="cityclub_club_hours" class="widefat" rows="5"><?php echo esc_textarea($hours); ?></textarea>
            <span class="description"><?php esc_html_e('Ex: Lundi - Vendredi: 6h - 23h', 'cityclub'); ?></span>
        </p>
        <p>
            <label for="cityclub_club_lat"><?php esc_html_e('Latitude', 'cityclub'); ?></label>
            <input type="text" id="cityclub_club_lat" name="cityclub_club_lat" value="<?php echo esc_attr($lat); ?>" class="widefat">
        </p>
        <p>
            <label for="cityclub_club_lng"><?php esc_html_e('Longitude', 'cityclub'); ?></label>
            <input type="text" id="cityclub_club_lng" name="cityclub_club_lng" value="<?php echo esc_attr($lng); ?>" class="widefat">
        </p>
        <p>
            <label for="cityclub_club_features"><?php esc_html_e('Caractéristiques', 'cityclub'); ?></label>
            <textarea id="cityclub_club_features" name="cityclub_club_features" class="widefat" rows="5"><?php echo esc_textarea($features); ?></textarea>
            <span class="description"><?php esc_html_e('Une caractéristique par ligne (ex: Piscine, Sauna, etc.)', 'cityclub'); ?></span>
        </p>
    </div>
    <?php
}

/**
 * Testimonial details meta box callback
 */
function cityclub_testimonial_details_callback($post) {
    wp_nonce_field('cityclub_testimonial_details', 'cityclub_testimonial_details_nonce');

    $role = get_post_meta($post->ID, '_cityclub_testimonial_role', true);
    $rating = get_post_meta($post->ID, '_cityclub_testimonial_rating', true);
    
    ?>
    <div class="cityclub-meta-box">
        <p>
            <label for="cityclub_testimonial_role"><?php esc_html_e('Rôle/Description', 'cityclub'); ?></label>
            <input type="text" id="cityclub_testimonial_role" name="cityclub_testimonial_role" value="<?php echo esc_attr($role); ?>" class="widefat">
            <span class="description"><?php esc_html_e('Ex: Membre depuis 2 ans', 'cityclub'); ?></span>
        </p>
        <p>
            <label for="cityclub_testimonial_rating"><?php esc_html_e('Note (1-5)', 'cityclub'); ?></label>
            <select id="cityclub_testimonial_rating" name="cityclub_testimonial_rating" class="widefat">
                <option value=""><?php esc_html_e('Sélectionner une note', 'cityclub'); ?></option>
                <option value="5" <?php selected($rating, '5'); ?>>5 - <?php esc_html_e('Excellent', 'cityclub'); ?></option>
                <option value="4" <?php selected($rating, '4'); ?>>4 - <?php esc_html_e('Très bien', 'cityclub'); ?></option>
                <option value="3" <?php selected($rating, '3'); ?>>3 - <?php esc_html_e('Bien', 'cityclub'); ?></option>
                <option value="2" <?php selected($rating, '2'); ?>>2 - <?php esc_html_e('Moyen', 'cityclub'); ?></option>
                <option value="1" <?php selected($rating, '1'); ?>>1 - <?php esc_html_e('Faible', 'cityclub'); ?></option>
            </select>
        </p>
    </div>
    <?php
}

/**
 * Save meta box data
 */
function cityclub_save_meta_box_data($post_id) {
    // Check if our nonce is set.
    if (!isset($_POST['cityclub_trainer_details_nonce']) && 
        !isset($_POST['cityclub_activity_details_nonce']) && 
        !isset($_POST['cityclub_club_details_nonce']) && 
        !isset($_POST['cityclub_testimonial_details_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if ((isset($_POST['cityclub_trainer_details_nonce']) && !wp_verify_nonce($_POST['cityclub_trainer_details_nonce'], 'cityclub_trainer_details')) ||
        (isset($_POST['cityclub_activity_details_nonce']) && !wp_verify_nonce($_POST['cityclub_activity_details_nonce'], 'cityclub_activity_details')) ||
        (isset($_POST['cityclub_club_details_nonce']) && !wp_verify_nonce($_POST['cityclub_club_details_nonce'], 'cityclub_club_details')) ||
        (isset($_POST['cityclub_testimonial_details_nonce']) && !wp_verify_nonce($_POST['cityclub_testimonial_details_nonce'], 'cityclub_testimonial_details'))) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (isset($_POST['post_type'])) {
        if ('trainer' === $_POST['post_type']) {
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        } elseif ('activity' === $_POST['post_type']) {
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        } elseif ('club' === $_POST['post_type']) {
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        } elseif ('testimonial' === $_POST['post_type']) {
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        }
    }

    // Save trainer meta
    if (isset($_POST['cityclub_trainer_role'])) {
        update_post_meta($post_id, '_cityclub_trainer_role', sanitize_text_field($_POST['cityclub_trainer_role']));
    }
    if (isset($_POST['cityclub_trainer_experience'])) {
        update_post_meta($post_id, '_cityclub_trainer_experience', sanitize_text_field($_POST['cityclub_trainer_experience']));
    }
    if (isset($_POST['cityclub_trainer_email'])) {
        update_post_meta($post_id, '_cityclub_trainer_email', sanitize_email($_POST['cityclub_trainer_email']));
    }
    if (isset($_POST['cityclub_trainer_phone'])) {
        update_post_meta($post_id, '_cityclub_trainer_phone', sanitize_text_field($_POST['cityclub_trainer_phone']));
    }
    if (isset($_POST['cityclub_trainer_facebook'])) {
        update_post_meta($post_id, '_cityclub_trainer_facebook', esc_url_raw($_POST['cityclub_trainer_facebook']));
    }
    if (isset($_POST['cityclub_trainer_instagram'])) {
        update_post_meta($post_id, '_cityclub_trainer_instagram', esc_url_raw($_POST['cityclub_trainer_instagram']));
    }
    if (isset($_POST['cityclub_trainer_twitter'])) {
        update_post_meta($post_id, '_cityclub_trainer_twitter', esc_url_raw($_POST['cityclub_trainer_twitter']));
    }

    // Save activity meta
    if (isset($_POST['cityclub_activity_icon'])) {
        update_post_meta($post_id, '_cityclub_activity_icon', sanitize_text_field($_POST['cityclub_activity_icon']));
    }
    if (isset($_POST['cityclub_activity_color'])) {
        update_post_meta($post_id, '_cityclub_activity_color', sanitize_text_field($_POST['cityclub_activity_color']));
    }
    if (isset($_POST['cityclub_activity_level'])) {
        update_post_meta($post_id, '_cityclub_activity_level', sanitize_text_field($_POST['cityclub_activity_level']));
    }
    if (isset($_POST['cityclub_activity_duration'])) {
        update_post_meta($post_id, '_cityclub_activity_duration', sanitize_text_field($_POST['cityclub_activity_duration']));
    }
    if (isset($_POST['cityclub_activity_calories'])) {
        update_post_meta($post_id, '_cityclub_activity_calories', sanitize_text_field($_POST['cityclub_activity_calories']));
    }

    // Save club meta
    if (isset($_POST['cityclub_club_address'])) {
        update_post_meta($post_id, '_cityclub_club_address', sanitize_text_field($_POST['cityclub_club_address']));
    }
    if (isset($_POST['cityclub_club_phone'])) {
        update_post_meta($post_id, '_cityclub_club_phone', sanitize_text_field($_POST['cityclub_club_phone']));
    }
    if (isset($_POST['cityclub_club_email'])) {
        update_post_meta($post_id, '_cityclub_club_email', sanitize_email($_POST['cityclub_club_email']));
    }
    if (isset($_POST['cityclub_club_hours'])) {
        update_post_meta($post_id, '_cityclub_club_hours', sanitize_textarea_field($_POST['cityclub_club_hours']));
    }
    if (isset($_POST['cityclub_club_lat'])) {
        update_post_meta($post_id, '_cityclub_club_lat', sanitize_text_field($_POST['cityclub_club_lat']));
    }
    if (isset($_POST['cityclub_club_lng'])) {
        update_post_meta($post_id, '_cityclub_club_lng', sanitize_text_field($_POST['cityclub_club_lng']));
    }
    if (isset($_POST['cityclub_club_features'])) {
        update_post_meta($post_id, '_cityclub_club_features', sanitize_textarea_field($_POST['cityclub_club_features']));
    }

    // Save testimonial meta
    if (isset($_POST['cityclub_testimonial_role'])) {
        update_post_meta($post_id, '_cityclub_testimonial_role', sanitize_text_field($_POST['cityclub_testimonial_role']));
    }
    if (isset($_POST['cityclub_testimonial_rating'])) {
        update_post_meta($post_id, '_cityclub_testimonial_rating', sanitize_text_field($_POST['cityclub_testimonial_rating']));
    }
}
add_action('save_post', 'cityclub_save_meta_box_data');

/**
 * Add custom template for the home page
 */
function cityclub_add_page_templates($templates) {
    $templates['template-home.php'] = 'Home Page Template';
    return $templates;
}
add_filter('theme_page_templates', 'cityclub_add_page_templates');

/**
 * Add custom body classes
 * 
 * @see inc/template-functions.php for more body classes
 */
if (!function_exists('cityclub_body_classes')) {
    function cityclub_body_classes($classes) {
        // Add a class if we're on the home page
        if (is_front_page()) {
            $classes[] = 'cityclub-home';
        }
        
        return $classes;
    }
    add_filter('body_class', 'cityclub_body_classes');
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

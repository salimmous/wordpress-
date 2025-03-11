<?php
/**
 * Custom Post Types for CityClub Theme
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register custom post types
 */
function cityclub_register_post_types() {
    
    // Register Gym Locations Post Type
    $labels = array(
        'name'                  => _x( 'Gym Locations', 'Post Type General Name', 'cityclub' ),
        'singular_name'         => _x( 'Gym Location', 'Post Type Singular Name', 'cityclub' ),
        'menu_name'             => __( 'Gym Locations', 'cityclub' ),
        'name_admin_bar'        => __( 'Gym Location', 'cityclub' ),
        'archives'              => __( 'Gym Archives', 'cityclub' ),
        'attributes'            => __( 'Gym Attributes', 'cityclub' ),
        'parent_item_colon'     => __( 'Parent Gym:', 'cityclub' ),
        'all_items'             => __( 'All Gym Locations', 'cityclub' ),
        'add_new_item'          => __( 'Add New Gym Location', 'cityclub' ),
        'add_new'               => __( 'Add New', 'cityclub' ),
        'new_item'              => __( 'New Gym Location', 'cityclub' ),
        'edit_item'             => __( 'Edit Gym Location', 'cityclub' ),
        'update_item'           => __( 'Update Gym Location', 'cityclub' ),
        'view_item'             => __( 'View Gym Location', 'cityclub' ),
        'view_items'            => __( 'View Gym Locations', 'cityclub' ),
        'search_items'          => __( 'Search Gym Location', 'cityclub' ),
        'not_found'             => __( 'Not found', 'cityclub' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'cityclub' ),
        'featured_image'        => __( 'Featured Image', 'cityclub' ),
        'set_featured_image'    => __( 'Set featured image', 'cityclub' ),
        'remove_featured_image' => __( 'Remove featured image', 'cityclub' ),
        'use_featured_image'    => __( 'Use as featured image', 'cityclub' ),
        'insert_into_item'      => __( 'Insert into gym', 'cityclub' ),
        'uploaded_to_this_item' => __( 'Uploaded to this gym', 'cityclub' ),
        'items_list'            => __( 'Gyms list', 'cityclub' ),
        'items_list_navigation' => __( 'Gyms list navigation', 'cityclub' ),
        'filter_items_list'     => __( 'Filter gyms list', 'cityclub' ),
    );
    $args = array(
        'label'                 => __( 'Gym Location', 'cityclub' ),
        'description'           => __( 'Gym locations across Morocco', 'cityclub' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'gym_category', 'gym_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-location',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'gym-locations' ),
    );
    register_post_type( 'gym_location', $args );
    
    // Register Trainers Post Type
    $labels = array(
        'name'                  => _x( 'Trainers', 'Post Type General Name', 'cityclub' ),
        'singular_name'         => _x( 'Trainer', 'Post Type Singular Name', 'cityclub' ),
        'menu_name'             => __( 'Trainers', 'cityclub' ),
        'name_admin_bar'        => __( 'Trainer', 'cityclub' ),
        'archives'              => __( 'Trainer Archives', 'cityclub' ),
        'attributes'            => __( 'Trainer Attributes', 'cityclub' ),
        'parent_item_colon'     => __( 'Parent Trainer:', 'cityclub' ),
        'all_items'             => __( 'All Trainers', 'cityclub' ),
        'add_new_item'          => __( 'Add New Trainer', 'cityclub' ),
        'add_new'               => __( 'Add New', 'cityclub' ),
        'new_item'              => __( 'New Trainer', 'cityclub' ),
        'edit_item'             => __( 'Edit Trainer', 'cityclub' ),
        'update_item'           => __( 'Update Trainer', 'cityclub' ),
        'view_item'             => __( 'View Trainer', 'cityclub' ),
        'view_items'            => __( 'View Trainers', 'cityclub' ),
        'search_items'          => __( 'Search Trainer', 'cityclub' ),
        'not_found'             => __( 'Not found', 'cityclub' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'cityclub' ),
        'featured_image'        => __( 'Trainer Photo', 'cityclub' ),
        'set_featured_image'    => __( 'Set trainer photo', 'cityclub' ),
        'remove_featured_image' => __( 'Remove trainer photo', 'cityclub' ),
        'use_featured_image'    => __( 'Use as trainer photo', 'cityclub' ),
        'insert_into_item'      => __( 'Insert into trainer', 'cityclub' ),
        'uploaded_to_this_item' => __( 'Uploaded to this trainer', 'cityclub' ),
        'items_list'            => __( 'Trainers list', 'cityclub' ),
        'items_list_navigation' => __( 'Trainers list navigation', 'cityclub' ),
        'filter_items_list'     => __( 'Filter trainers list', 'cityclub' ),
    );
    $args = array(
        'label'                 => __( 'Trainer', 'cityclub' ),
        'description'           => __( 'Gym trainers and coaches', 'cityclub' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'trainer_expertise' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'trainers' ),
    );
    register_post_type( 'trainer', $args );
    
    // Register Classes Post Type
    $labels = array(
        'name'                  => _x( 'Classes', 'Post Type General Name', 'cityclub' ),
        'singular_name'         => _x( 'Class', 'Post Type Singular Name', 'cityclub' ),
        'menu_name'             => __( 'Classes', 'cityclub' ),
        'name_admin_bar'        => __( 'Class', 'cityclub' ),
        'archives'              => __( 'Class Archives', 'cityclub' ),
        'attributes'            => __( 'Class Attributes', 'cityclub' ),
        'parent_item_colon'     => __( 'Parent Class:', 'cityclub' ),
        'all_items'             => __( 'All Classes', 'cityclub' ),
        'add_new_item'          => __( 'Add New Class', 'cityclub' ),
        'add_new'               => __( 'Add New', 'cityclub' ),
        'new_item'              => __( 'New Class', 'cityclub' ),
        'edit_item'             => __( 'Edit Class', 'cityclub' ),
        'update_item'           => __( 'Update Class', 'cityclub' ),
        'view_item'             => __( 'View Class', 'cityclub' ),
        'view_items'            => __( 'View Classes', 'cityclub' ),
        'search_items'          => __( 'Search Class', 'cityclub' ),
        'not_found'             => __( 'Not found', 'cityclub' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'cityclub' ),
        'featured_image'        => __( 'Class Image', 'cityclub' ),
        'set_featured_image'    => __( 'Set class image', 'cityclub' ),
        'remove_featured_image' => __( 'Remove class image', 'cityclub' ),
        'use_featured_image'    => __( 'Use as class image', 'cityclub' ),
        'insert_into_item'      => __( 'Insert into class', 'cityclub' ),
        'uploaded_to_this_item' => __( 'Uploaded to this class', 'cityclub' ),
        'items_list'            => __( 'Classes list', 'cityclub' ),
        'items_list_navigation' => __( 'Classes list navigation', 'cityclub' ),
        'filter_items_list'     => __( 'Filter classes list', 'cityclub' ),
    );
    $args = array(
        'label'                 => __( 'Class', 'cityclub' ),
        'description'           => __( 'Fitness classes and activities', 'cityclub' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'class_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-calendar-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'classes' ),
    );
    register_post_type( 'class', $args );
    
    // Register Testimonials Post Type
    $labels = array(
        'name'                  => _x( 'Testimonials', 'Post Type General Name', 'cityclub' ),
        'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'cityclub' ),
        'menu_name'             => __( 'Testimonials', 'cityclub' ),
        'name_admin_bar'        => __( 'Testimonial', 'cityclub' ),
        'archives'              => __( 'Testimonial Archives', 'cityclub' ),
        'attributes'            => __( 'Testimonial Attributes', 'cityclub' ),
        'parent_item_colon'     => __( 'Parent Testimonial:', 'cityclub' ),
        'all_items'             => __( 'All Testimonials', 'cityclub' ),
        'add_new_item'          => __( 'Add New Testimonial', 'cityclub' ),
        'add_new'               => __( 'Add New', 'cityclub' ),
        'new_item'              => __( 'New Testimonial', 'cityclub' ),
        'edit_item'             => __( 'Edit Testimonial', 'cityclub' ),
        'update_item'           => __( 'Update Testimonial', 'cityclub' ),
        'view_item'             => __( 'View Testimonial', 'cityclub' ),
        'view_items'            => __( 'View Testimonials', 'cityclub' ),
        'search_items'          => __( 'Search Testimonial', 'cityclub' ),
        'not_found'             => __( 'Not found', 'cityclub' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'cityclub' ),
        'featured_image'        => __( 'Client Photo', 'cityclub' ),
        'set_featured_image'    => __( 'Set client photo', 'cityclub' ),
        'remove_featured_image' => __( 'Remove client photo', 'cityclub' ),
        'use_featured_image'    => __( 'Use as client photo', 'cityclub' ),
        'insert_into_item'      => __( 'Insert into testimonial', 'cityclub' ),
        'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'cityclub' ),
        'items_list'            => __( 'Testimonials list', 'cityclub' ),
        'items_list_navigation' => __( 'Testimonials list navigation', 'cityclub' ),
        'filter_items_list'     => __( 'Filter testimonials list', 'cityclub' ),
    );
    $args = array(
        'label'                 => __( 'Testimonial', 'cityclub' ),
        'description'           => __( 'Client testimonials', 'cityclub' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-format-quote',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'testimonials' ),
    );
    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'cityclub_register_post_types' );

/**
 * Register custom taxonomies
 */
function cityclub_register_taxonomies() {
    
    // Register Gym Category Taxonomy
    $labels = array(
        'name'                       => _x( 'Gym Categories', 'Taxonomy General Name', 'cityclub' ),
        'singular_name'              => _x( 'Gym Category', 'Taxonomy Singular Name', 'cityclub' ),
        'menu_name'                  => __( 'Gym Categories', 'cityclub' ),
        'all_items'                  => __( 'All Gym Categories', 'cityclub' ),
        'parent_item'                => __( 'Parent Gym Category', 'cityclub' ),
        'parent_item_colon'          => __( 'Parent Gym Category:', 'cityclub' ),
        'new_item_name'              => __( 'New Gym Category Name', 'cityclub' ),
        'add_new_item'               => __( 'Add New Gym Category', 'cityclub' ),
        'edit_item'                  => __( 'Edit Gym Category', 'cityclub' ),
        'update_item'                => __( 'Update Gym Category', 'cityclub' ),
        'view_item'                  => __( 'View Gym Category', 'cityclub' ),
        'separate_items_with_commas' => __( 'Separate gym categories with commas', 'cityclub' ),
        'add_or_remove_items'        => __( 'Add or remove gym categories', 'cityclub' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'cityclub' ),
        'popular_items'              => __( 'Popular Gym Categories', 'cityclub' ),
        'search_items'               => __( 'Search Gym Categories', 'cityclub' ),
        'not_found'                  => __( 'Not Found', 'cityclub' ),
        'no_terms'                   => __( 'No gym categories', 'cityclub' ),
        'items_list'                 => __( 'Gym Categories list', 'cityclub' ),
        'items_list_navigation'      => __( 'Gym Categories list navigation', 'cityclub' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'gym_category', array( 'gym_location' ), $args );
    
    // Register Trainer Expertise Taxonomy
    $labels = array(
        'name'                       => _x( 'Expertise', 'Taxonomy General Name', 'cityclub' ),
        'singular_name'              => _x( 'Expertise', 'Taxonomy Singular Name', 'cityclub' ),
        'menu_name'                  => __( 'Expertise', 'cityclub' ),
        'all_items'                  => __( 'All Expertise', 'cityclub' ),
        'parent_item'                => __( 'Parent Expertise', 'cityclub' ),
        'parent_item_colon'          => __( 'Parent Expertise:', 'cityclub' ),
        'new_item_name'              => __( 'New Expertise Name', 'cityclub' ),
        'add_new_item'               => __( 'Add New Expertise', 'cityclub' ),
        'edit_item'                  => __( 'Edit Expertise', 'cityclub' ),
        'update_item'                => __( 'Update Expertise', 'cityclub' ),
        'view_item'                  => __( 'View Expertise', 'cityclub' ),
        'separate_items_with_commas' => __( 'Separate expertise with commas', 'cityclub' ),
        'add_or_remove_items'        => __( 'Add or remove expertise', 'cityclub' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'cityclub' ),
        'popular_items'              => __( 'Popular Expertise', 'cityclub' ),
        'search_items'               => __( 'Search Expertise', 'cityclub' ),
        'not_found'                  => __( 'Not Found', 'cityclub' ),
        'no_terms'                   => __( 'No expertise', 'cityclub' ),
        'items_list'                 => __( 'Expertise list', 'cityclub' ),
        'items_list_navigation'      => __( 'Expertise list navigation', 'cityclub' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'trainer_expertise', array( 'trainer' ), $args );
    
    // Register Class Category Taxonomy
    $labels = array(
        'name'                       => _x( 'Class Categories', 'Taxonomy General Name', 'cityclub' ),
        'singular_name'              => _x( 'Class Category', 'Taxonomy Singular Name', 'cityclub' ),
        'menu_name'                  => __( 'Class Categories', 'cityclub' ),
        'all_items'                  => __( 'All Class Categories', 'cityclub' ),
        'parent_item'                => __( 'Parent Class Category', 'cityclub' ),
        'parent_item_colon'          => __( 'Parent Class Category:', 'cityclub' ),
        'new_item_name'              => __( 'New Class Category Name', 'cityclub' ),
        'add_new_item'               => __( 'Add New Class Category', 'cityclub' ),
        'edit_item'                  => __( 'Edit Class Category', 'cityclub' ),
        'update_item'                => __( 'Update Class Category', 'cityclub' ),
        'view_item'                  => __( 'View Class Category', 'cityclub' ),
        'separate_items_with_commas' => __( 'Separate class categories with commas', 'cityclub' ),
        'add_or_remove_items'        => __( 'Add or remove class categories', 'cityclub' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'cityclub' ),
        'popular_items'              => __( 'Popular Class Categories', 'cityclub' ),
        'search_items'               => __( 'Search Class Categories', 'cityclub' ),
        'not_found'                  => __( 'Not Found', 'cityclub' ),
        'no_terms'                   => __( 'No class categories', 'cityclub' ),
        'items_list'                 => __( 'Class Categories list', 'cityclub' ),
        'items_list_navigation'      => __( 'Class Categories list navigation', 'cityclub' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'class_category', array( 'class' ), $args );
}
add_action( 'init', 'cityclub_register_taxonomies' );

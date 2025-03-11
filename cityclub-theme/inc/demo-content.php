<?php
/**
 * Demo Content Creation
 *
 * @package CityClub
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Import Elementor templates
 */
function cityclub_import_elementor_templates() {
	if ( ! class_exists( '\Elementor\Plugin' ) ) {
		return;
	}
	
	// Check if Elementor templates are already imported
	if ( get_option( 'cityclub_elementor_templates_imported' ) ) {
		return;
	}
	
	// Import header template
	$header_template = array(
		'title' => 'CityClub Header',
		'type' => 'header',
		'content' => file_get_contents( get_template_directory() . '/elementor-templates/header.php' ),
		'status' => 'publish',
	);
	
	// Import footer template
	$footer_template = array(
		'title' => 'CityClub Footer',
		'type' => 'footer',
		'content' => file_get_contents( get_template_directory() . '/elementor-templates/footer.php' ),
		'status' => 'publish',
	);
	
	// Create templates
	$header_id = cityclub_create_elementor_template( $header_template );
	$footer_id = cityclub_create_elementor_template( $footer_template );
	
	// Set default header and footer
	if ( $header_id && $footer_id ) {
		update_option( 'elementor_active_kit', $header_id );
		update_option( 'cityclub_elementor_templates_imported', true );
	}
}

/**
 * Create Elementor template
 *
 * @param array $template Template data
 * @return int|false Template ID or false on failure
 */
function cityclub_create_elementor_template( $template ) {
	// Create post
	$post_id = wp_insert_post( array(
		'post_title' => $template['title'],
		'post_status' => $template['status'],
		'post_type' => 'elementor_library',
	) );
	
	if ( is_wp_error( $post_id ) ) {
		return false;
	}
	
	// Set template type
	update_post_meta( $post_id, '_elementor_template_type', $template['type'] );
	
	// Add content
	update_post_meta( $post_id, '_elementor_data', wp_slash( $template['content'] ) );
	update_post_meta( $post_id, '_elementor_edit_mode', 'builder' );
	
	return $post_id;
}

/**
 * Create demo pages
 */
function cityclub_create_demo_pages() {
	$demo_pages = array(
		'home' => array(
			'title' => 'Home',
			'template' => 'template-home.php',
			'content' => '',
		),
		'about' => array(
			'title' => 'About Us',
			'template' => 'page.php',
			'content' => '<h2>About CityClub Fitness Network</h2><p>Founded in 2010, CityClub has grown to become Morocco\'s premier fitness network with over 20 locations across the country. Our mission is to provide accessible, high-quality fitness experiences for everyone.</p><h3>Our Vision</h3><p>To create a healthier Morocco by making fitness accessible, enjoyable, and effective for people of all ages and fitness levels.</p><h3>Our Values</h3><ul><li><strong>Excellence:</strong> We strive for excellence in everything we do, from our facilities to our programs and staff.</li><li><strong>Community:</strong> We build strong communities within our clubs, fostering connections and support among members.</li><li><strong>Innovation:</strong> We continuously innovate to provide the latest in fitness technology and programming.</li><li><strong>Inclusivity:</strong> We welcome everyone, regardless of fitness level or background.</li></ul>',
		),
		'classes' => array(
			'title' => 'Classes',
			'template' => 'page.php',
			'content' => '<h2>Our Fitness Classes</h2><p>CityClub offers a wide variety of group fitness classes designed to meet the needs of all fitness levels and interests. From high-intensity workouts to mindful movement, we have something for everyone.</p><h3>Class Categories</h3><ul><li><strong>Cardio:</strong> HIIT, Cycling, Zumba, Cardio Kickboxing</li><li><strong>Strength:</strong> BodyPump, Circuit Training, Functional Training</li><li><strong>Mind-Body:</strong> Yoga, Pilates, Meditation</li><li><strong>Specialty:</strong> Boxing, TRX, Barre, Martial Arts</li><li><strong>Aquatic:</strong> Aqua Aerobics, Swim Lessons, Hydro Circuit</li></ul>',
		),
		'trainers' => array(
			'title' => 'Trainers',
			'template' => 'page.php',
			'content' => '<h2>Our Expert Trainers</h2><p>Our certified fitness professionals are passionate about helping you achieve your goals. With diverse specializations and years of experience, they provide personalized guidance for all fitness levels.</p><h3>Meet Our Team</h3><p>Our trainers hold certifications from internationally recognized organizations and regularly participate in continuing education to stay at the forefront of fitness science and techniques.</p>',
		),
		'locations' => array(
			'title' => 'Locations',
			'template' => 'page.php',
			'content' => '<h2>Our Locations</h2><p>With over 20 clubs across Morocco, there\'s always a CityClub near you. Each location offers state-of-the-art equipment, expert staff, and a welcoming atmosphere.</p><h3>Find Your Club</h3><p>Use our location finder to discover the CityClub nearest to you and explore the facilities and amenities available at each location.</p>',
		),
		'membership' => array(
			'title' => 'Membership',
			'template' => 'page.php',
			'content' => '<h2>Membership Options</h2><p>CityClub offers flexible membership options to suit your lifestyle and fitness goals. All memberships include access to state-of-the-art equipment, group fitness classes, and expert guidance.</p><h3>Membership Tiers</h3><ul><li><strong>Basic:</strong> Access to your home club, standard hours</li><li><strong>Plus:</strong> Access to all clubs, standard hours</li><li><strong>Premium:</strong> Access to all clubs, 24/7 hours, guest passes, and exclusive perks</li><li><strong>Corporate:</strong> Special rates for businesses with 5+ employees</li><li><strong>Student/Senior:</strong> Discounted rates with valid ID</li></ul>',
		),
		'contact' => array(
			'title' => 'Contact Us',
			'template' => 'page.php',
			'content' => '<h2>Get in Touch</h2><p>We\'d love to hear from you! Contact us with any questions about our clubs, memberships, or services.</p><h3>General Inquiries</h3><p>Email: info@cityclub.ma<br>Phone: +212-5XX-XXXXXX</p><h3>Membership Services</h3><p>Email: members@cityclub.ma<br>Phone: +212-5XX-XXXXXX</p><h3>Corporate Partnerships</h3><p>Email: corporate@cityclub.ma<br>Phone: +212-5XX-XXXXXX</p>',
		),
	);
	
	foreach ( $demo_pages as $slug => $page_data ) {
		// Check if page already exists
		$existing_page = get_page_by_title( $page_data['title'] );
		
		if ( ! $existing_page ) {
			// Create page
			$page_id = wp_insert_post( array(
				'post_title' => $page_data['title'],
				'post_name' => $slug,
				'post_content' => $page_data['content'],
				'post_status' => 'publish',
				'post_type' => 'page',
			) );
			
			if ( ! is_wp_error( $page_id ) ) {
				// Set page template
				update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
			}
		}
	}
}

/**
 * Show success notice after import
 */
function cityclub_import_success_notice() {
	?>
	<div class="notice notice-success is-dismissible">
		<p><?php esc_html_e( 'Demo content imported successfully! Your site now has all pages with complete designs, styles, and sections ready to use.', 'cityclub' ); ?></p>
		<p><a href="<?php echo esc_url( home_url() ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'View Your Site', 'cityclub' ); ?></a></p>
	</div>
	<?php
}

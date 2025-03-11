<?php
/**
 * Template Name: Home Page
 *
 * @package CityClub
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	// Hero Section
	get_template_part( 'template-parts/home/hero' );

	// Stats Section
	get_template_part( 'template-parts/home/stats' );

	// Activities Section
	get_template_part( 'template-parts/home/activities' );

	// Club Map Section
	get_template_part( 'template-parts/home/club-map' );

	// Membership Plans Section
	get_template_part( 'template-parts/home/membership-plans' );

	// Coach Section
	get_template_part( 'template-parts/home/coach-section' );

	// Medical Assessment Section
	get_template_part( 'template-parts/home/medical-assessment' );

	// Gallery Section
	get_template_part( 'template-parts/home/gallery' );

	// Mobile App Section
	get_template_part( 'template-parts/home/mobile-app' );

	// Special Offer Section
	get_template_part( 'template-parts/home/special-offer' );

	// Testimonials Section
	get_template_part( 'template-parts/home/testimonials' );

	// FAQ Section
	get_template_part( 'template-parts/home/faq' );

	// Partners Section
	get_template_part( 'template-parts/home/partners' );

	// Location Finder Section
	get_template_part( 'template-parts/home/location-finder' );

	// Newsletter Section
	get_template_part( 'template-parts/home/newsletter' );
	?>

</main><!-- #main -->

<?php
get_footer();

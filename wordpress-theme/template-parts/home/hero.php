<?php
/**
 * Template part for displaying the hero section on the home page
 *
 * @package CityClub
 */

// Get hero slides from theme options
$slides = array();

// Default slide if no slides are set in theme options
if ( empty( $slides ) ) {
	$slides = array(
		array(
			'title'    => __( 'TRANSFORMEZ VOTRE CORPS, TRANSFORMEZ VOTRE VIE', 'cityclub' ),
			'subtitle' => __( 'Rejoignez le plus grand réseau de fitness au Maroc', 'cityclub' ),
			'cta'      => __( 'COMMENCER MAINTENANT', 'cityclub' ),
			'image'    => get_template_directory_uri() . '/assets/images/hero-1.jpg',
			'offer'    => __( 'OFFRE SPÉCIALE: 50% DE RÉDUCTION SUR L\'ABONNEMENT ANNUEL', 'cityclub' ),
		),
		array(
			'title'    => __( 'PLUS DE 50 CLUBS À TRAVERS LE MAROC', 'cityclub' ),
			'subtitle' => __( 'Entraînez-vous où que vous soyez avec une seule carte d\'adhésion', 'cityclub' ),
			'cta'      => __( 'TROUVER UN CLUB', 'cityclub' ),
			'image'    => get_template_directory_uri() . '/assets/images/hero-2.jpg',
			'offer'    => __( 'NOUVEAU: OUVERTURE DE 5 CLUBS EN 2023', 'cityclub' ),
		),
		array(
			'title'    => __( 'DES COACHS CERTIFIÉS À VOTRE SERVICE', 'cityclub' ),
			'subtitle' => __( 'Bénéficiez d\'un accompagnement personnalisé pour atteindre vos objectifs', 'cityclub' ),
			'cta'      => __( 'RÉSERVER UN COACH', 'cityclub' ),
			'image'    => get_template_directory_uri() . '/assets/images/hero-3.jpg',
			'offer'    => __( 'OFFRE DÉCOUVERTE: PREMIÈRE SÉANCE GRATUITE', 'cityclub' ),
		),
	);
}

// Generate a unique ID for the hero slider
$slider_id = 'cityclub-hero-slider';
?>

<section class="hero-section relative h-screen overflow-hidden">
	<?php foreach ( $slides as $index => $slide ) : ?>
		<div class="hero-slide absolute inset-0 transition-opacity duration-1000 <?php echo 0 === $index ? 'opacity-100 z-10' : 'opacity-0 z-0'; ?>" data-slide="<?php echo esc_attr( $index ); ?>">
			<div class="absolute inset-0 bg-gradient-to-r from-black/80 to-black/40 z-10"></div>
			<img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" class="absolute inset-0 w-full h-full object-cover transition-transform duration-10000 ease-out scale-105 hero-slide-image">
			
			<div class="relative z-20 container mx-auto px-6 h-full flex flex-col justify-center">
				<div class="max-w-3xl">
					<div class="inline-block bg-[#f26f21] text-white px-4 py-1 rounded-full text-sm font-bold mb-6 animate-pulse">
						<?php echo esc_html( $slide['offer'] ); ?>
					</div>
					<h2 class="text-5xl md:text-7xl font-black text-white leading-tight mb-6">
						<?php
						$words = explode( ' ', $slide['title'] );
						foreach ( $words as $i => $word ) {
							if ( 0 === $i % 3 ) {
								echo '<span class="text-[#f26f21]">' . esc_html( $word ) . '</span> ';
							} else {
								echo esc_html( $word ) . ' ';
							}
						}
						?>
					</h2>
					<p class="text-xl text-white/80 mb-10 max-w-2xl">
						<?php echo esc_html( $slide['subtitle'] ); ?>
					</p>
					<div class="flex flex-col sm:flex-row gap-4">
						<button class="hero-cta-button bg-[#f26f21] text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-[#e05a10] transition-all shadow-xl shadow-[#f26f21]/20 group">
							<?php echo esc_html( $slide['cta'] ); ?>
							<span class="ml-2 inline-block transition-transform group-hover:translate-x-1">
								→
							</span>
						</button>
						<button class="bg-white/10 backdrop-blur-sm text-white border border-white/30 px-8 py-4 rounded-full font-bold text-lg hover:bg-white/20 transition-all">
							<?php esc_html_e( 'EN SAVOIR PLUS', 'cityclub' ); ?>
						</button>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	
	<!-- Navigation arrows -->
	<button class="hero-prev absolute left-4 top-1/2 transform -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white w-12 h-12 rounded-full flex items-center justify-center transition-colors" aria-label="<?php esc_attr_e( 'Previous slide', 'cityclub' ); ?>">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
		</svg>
	</button>
	
	<button class="hero-next absolute right-4 top-1/2 transform -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white w-12 h-12 rounded-full flex items-center justify-center transition-colors" aria-label="<?php esc_attr_e( 'Next slide', 'cityclub' ); ?>">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
		</svg>
	</button>
	
	<!-- Dots navigation -->
	<div class="absolute bottom-10 left-0 right-0 z-30 flex justify-center space-x-3">
		<?php foreach ( $slides as $index => $slide ) : ?>
			<button class="hero-dot w-3 h-3 rounded-full <?php echo 0 === $index ? 'bg-[#f26f21]' : 'bg-white/50 hover:bg-white/80'; ?>"
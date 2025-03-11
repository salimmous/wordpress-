<?php
/**
 * CityClub Hero Widget for Elementor
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * CityClub Hero Widget
 */
class CityClub_Hero_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'cityclub_hero';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'CityClub Hero', 'cityclub' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-banner';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'cityclub' ];
	}

	/**
	 * Register widget controls.
	 */
	protected function register_controls() {
		// Content Section
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'TRANSFORMEZ VOTRE CORPS, TRANSFORMEZ VOTRE VIE', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'Rejoignez le plus grand réseau de fitness au Maroc', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Button Text', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'COMMENCER MAINTENANT', 'cityclub' ),
			]
		);

		$repeater->add_control(
			'cta_link',
			[
				'label'       => __( 'CTA Button Link', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'cityclub' ),
				'default'     => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$repeater->add_control(
			'background_image',
			[
				'label'   => __( 'Background Image', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'offer_text',
			[
				'label'       => __( 'Offer Text', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'OFFRE SPÉCIALE: 50% DE RÉDUCTION SUR L\'ABONNEMENT ANNUEL', 'cityclub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'slides',
			[
				'label'       => __( 'Slides', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title'            => __( 'TRANSFORMEZ VOTRE CORPS, TRANSFORMEZ VOTRE VIE', 'cityclub' ),
						'subtitle'         => __( 'Rejoignez le plus grand réseau de fitness au Maroc', 'cityclub' ),
						'cta_text'         => __( 'COMMENCER MAINTENANT', 'cityclub' ),
						'offer_text'        => __( 'OFFRE SPÉCIALE: 50% DE RÉDUCTION SUR L\'ABONNEMENT ANNUEL', 'cityclub' ),
					],
					[
						'title'            => __( 'PLUS DE 50 CLUBS À TRAVERS LE MAROC', 'cityclub' ),
						'subtitle'         => __( 'Entraînez-vous où que vous soyez avec une seule carte d\'adhésion', 'cityclub' ),
						'cta_text'         => __( 'TROUVER UN CLUB', 'cityclub' ),
						'offer_text'        => __( 'NOUVEAU: OUVERTURE DE 5 CLUBS EN 2023', 'cityclub' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'show_secondary_button',
			[
				'label'        => __( 'Show Secondary Button', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'cityclub' ),
				'label_off'    => __( 'No', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'secondary_button_text',
			[
				'label'     => __( 'Secondary Button Text', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => __( 'EN SAVOIR PLUS', 'cityclub' ),
				'condition' => [
					'show_secondary_button' => 'yes',
				],
			]
		);

		$this->add_control(
			'secondary_button_link',
			[
				'label'       => __( 'Secondary Button Link', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'cityclub' ),
				'default'     => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
				'condition'   => [
					'show_secondary_button' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_promo_modal',
			[
				'label'        => __( 'Show Promo Modal', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'cityclub' ),
				'label_off'    => __( 'No', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->end_controls_section();

		// Style Section
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'highlight_color',
			[
				'label'     => __( 'Highlight Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f26f21',
				'selectors' => [
					'{{WRAPPER}} .hero-title span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hero-offer'      => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .hero-cta-button' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .hero-dot.active' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'cityclub' ),
				'selector' => '{{WRAPPER}} .hero-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typography',
				'label'    => __( 'Subtitle Typography', 'cityclub' ),
				'selector' => '{{WRAPPER}} .hero-subtitle',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$slides   = $settings['slides'];
		?>
		<section class="relative h-screen overflow-hidden hero-section">
			<?php foreach ( $slides as $index => $slide ) : ?>
				<div class="hero-slide absolute inset-0 transition-opacity duration-1000 <?php echo $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'; ?>">
					<div class="absolute inset-0 bg-gradient-to-r from-black/80 to-black/40 z-10"></div>
					<img src="<?php echo esc_url( $slide['background_image']['url'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" class="hero-slide-image absolute inset-0 w-full h-full object-cover transition-transform duration-10000 ease-out scale-105" style="transform: <?php echo $index === 0 ? 'scale(1)' : 'scale(1.05)'; ?>">

					<div class="relative z-20 container mx-auto px-6 h-full flex flex-col justify-center">
						<div class="max-w-3xl">
							<div class="inline-block bg-[#f26f21] text-white px-4 py-1 rounded-full text-sm font-bold mb-6 animate-pulse hero-offer">
								<?php echo esc_html( $slide['offer_text'] ); ?>
							</div>
							<h2 class="text-5xl md:text-7xl font-black text-white leading-tight mb-6 hero-title">
								<?php 
								$words = explode(' ', $slide['title']);
								foreach ($words as $i => $word) {
									if ($i % 3 === 0) {
										echo '<span>' . esc_html($word) . '</span> ';
									} else {
										echo esc_html($word) . ' ';
									}
								}
								?>
							</h2>
							<p class="text-xl text-white/80 mb-10 max-w-2xl hero-subtitle">
								<?php echo esc_html( $slide['subtitle'] ); ?>
							</p>
							<div class="flex flex-col sm:flex-row gap-4">
								<a href="<?php echo esc_url( $slide['cta_link']['url'] ); ?>" class="hero-cta-button bg-[#f26f21] text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-[#e05a10] transition-all shadow-xl shadow-[#f26f21]/20 group" <?php echo $slide['cta_link']['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $slide['cta_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
									<?php echo esc_html( $slide['cta_text'] ); ?>
									<span class="ml-2 inline-block transition-transform group-hover:translate-x-1">→</span>
								</a>
								<?php if ( 'yes' === $settings['show_secondary_button'] ) : ?>
									<a href="<?php echo esc_url( $settings['secondary_button_link']['url'] ); ?>" class="bg-white/10 backdrop-blur-sm text-white border border-white/30 px-8 py-4 rounded-full font-bold text-lg hover:bg-white/20 transition-all" <?php echo $settings['secondary_button_link']['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $settings['secondary_button_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
										<?php echo esc_html( $settings['secondary_button_text'] ); ?>
									</a>
								<?php endif; ?>
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
					<button class="hero-dot w-3 h-3 rounded-full transition-colors <?php echo $index === 0 ? 'bg-[#f26f21] active' : 'bg-white/50 hover:bg-white/80'; ?>" aria-label="<?php printf( esc_attr__( 'Go to slide %d', 'cityclub' ), $index + 1 ); ?>"></button>
				<?php endforeach; ?>
			</div>
		</section>

		<?php if ( 'yes' === $settings['show_promo_modal'] ) : ?>
		<!-- Promo Modal -->
		<div id="promo-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 hidden">
			<div class="bg-white rounded-2xl p-8 max-w-md w-full relative">
				<button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700 transition-colors">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>

				<div class="bg-[#f26f21] text-white px-4 py-2 rounded-lg text-sm font-bold mb-6 inline-block">
					<?php esc_html_e( 'OFFRE LIMITÉE', 'cityclub' ); ?>
				</div>

				<h3 class="text-2xl font-bold mb-2">
					<?php esc_html_e( 'Profitez de notre offre spéciale', 'cityclub' ); ?>
				</h3>
				<p class="text-gray-600 mb-6">
					<?php esc_html_e( 'Inscrivez-vous maintenant et bénéficiez de 50% de réduction sur votre abonnement annuel!', 'cityclub' ); ?>
				</p>

				<form class="space-y-4">
					<div>
						<label class="block text-sm font-medium text-gray-700 mb-1">
							<?php esc_html_e( 'Nom complet', 'cityclub' ); ?>
						</label>
						<input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none" placeholder="<?php esc_attr_e( 'Votre nom et prénom', 'cityclub' ); ?>">
					</div>

					<div>
						<label class="block text-sm font-medium text-gray-700 mb-1">
							<?php esc_html_e( 'Email', 'cityclub' ); ?>
						</label>
						<input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none" placeholder="<?php esc_attr_e( 'votre.email@exemple.com', 'cityclub' ); ?>">
					</div>

					<div>
						<label class="block text-sm font-medium text-gray-700 mb-1">
							<?php esc_html_e( 'Téléphone', 'cityclub' ); ?>
						</label>
						<input type="tel" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none" placeholder="<?php esc_attr_e( '+212 6XX XXX XXX', 'cityclub' ); ?>">
					</div>

					<div>
						<label class="block text-sm font-medium text-gray-700 mb-1">
							<?php esc_html_e( 'Club le plus proche', 'cityclub' ); ?>
						</label>
						<select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none">
							<option value=""><?php esc_html_e( 'Sélectionnez une ville', 'cityclub' ); ?></option>
							<option value="casablanca"><?php esc_html_e( 'Casablanca', 'cityclub' ); ?></option>
							<option value="rabat"><?php esc_html_e( 'Rabat', 'cityclub' ); ?></option>
							<option value="marrakech"><?php esc_html_e( 'Marrakech', 'cityclub' ); ?></option>
							<option value="tanger"><?php esc_html_e( 'Tanger', 'cityclub' ); ?></option>
							<option value="agadir"><?php esc_html_e( 'Agadir', 'cityclub' ); ?></option>
						</select>
					</div>

					<div class="flex items-start mt-4">
						<input type="checkbox" id="terms" class="mt-1 mr-2">
						<label for="terms" class="text-sm text-gray-600">
							<?php esc_html_e( 'J\'accepte les', 'cityclub' ); ?> 
							<a href="#" class="text-[#f26f21] hover:underline">
								<?php esc_html_e( 'conditions d\'utilisation', 'cityclub' ); ?>
							</a> 
							<?php esc_html_e( 'et la', 'cityclub' ); ?> 
							<a href="#" class="text-[#f26f21] hover:underline">
								<?php esc_html_e( 'politique de confidentialité', 'cityclub' ); ?>
							</a>
						</label>
					</div>

					<button type="submit" class="w-full bg-[#f26f21] text-white py-3 rounded-md font-semibold hover:bg-[#e05a10] transition-all mt-2">
						<?php esc_html_e( 'RÉSERVER MON OFFRE', 'cityclub' ); ?>
					</button>
				</form>

				<p class="text-xs text-gray-500 mt-4 text-center">
					<?php esc_html_e( '* Offre valable pour les nouveaux membres uniquement. Voir conditions en club.', 'cityclub' ); ?>
				</p>
			</div>
		</div>
		<?php endif; ?>
		<?php
	}
}

<?php
/**
 * Template part for displaying the hero section on the home page
 *
 * @package CityClub
 */

// Get slides from theme options or use defaults
$slides = array(
    array(
        'title'    => __( 'TRANSFORMEZ VOTRE CORPS, TRANSFORMEZ VOTRE VIE', 'cityclub' ),
        'subtitle' => __( 'Rejoignez le plus grand réseau de fitness au Maroc', 'cityclub' ),
        'cta'      => __( 'COMMENCER MAINTENANT', 'cityclub' ),
        'image'    => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1920&q=80',
        'offer'    => __( 'OFFRE SPÉCIALE: 50% DE RÉDUCTION SUR L\'ABONNEMENT ANNUEL', 'cityclub' ),
    ),
    array(
        'title'    => __( 'PLUS DE 50 CLUBS À TRAVERS LE MAROC', 'cityclub' ),
        'subtitle' => __( 'Entraînez-vous où que vous soyez avec une seule carte d\'adhésion', 'cityclub' ),
        'cta'      => __( 'TROUVER UN CLUB', 'cityclub' ),
        'image'    => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=1920&q=80',
        'offer'    => __( 'NOUVEAU: OUVERTURE DE 5 CLUBS EN 2023', 'cityclub' ),
    ),
    array(
        'title'    => __( 'DES COACHS CERTIFIÉS À VOTRE SERVICE', 'cityclub' ),
        'subtitle' => __( 'Bénéficiez d\'un accompagnement personnalisé pour atteindre vos objectifs', 'cityclub' ),
        'cta'      => __( 'RÉSERVER UN COACH', 'cityclub' ),
        'image'    => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=1920&q=80',
        'offer'    => __( 'OFFRE DÉCOUVERTE: PREMIÈRE SÉANCE GRATUITE', 'cityclub' ),
    ),
);
?>

<section class="relative h-screen overflow-hidden hero-section">
    <?php foreach ( $slides as $index => $slide ) : ?>
        <div class="hero-slide absolute inset-0 transition-opacity duration-1000 <?php echo $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'; ?>">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 to-black/40 z-10"></div>
            <img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" class="hero-slide-image absolute inset-0 w-full h-full object-cover transition-transform duration-10000 ease-out scale-105" style="transform: <?php echo $index === 0 ? 'scale(1)' : 'scale(1.05)'; ?>">

            <div class="relative z-20 container mx-auto px-6 h-full flex flex-col justify-center">
                <div class="max-w-3xl">
                    <div class="inline-block bg-[#f26f21] text-white px-4 py-1 rounded-full text-sm font-bold mb-6 animate-pulse">
                        <?php echo esc_html( $slide['offer'] ); ?>
                    </div>
                    <h2 class="text-5xl md:text-7xl font-black text-white leading-tight mb-6">
                        <?php 
                        $words = explode(' ', $slide['title']);
                        foreach ($words as $i => $word) {
                            if ($i % 3 === 0) {
                                echo '<span class="text-[#f26f21]">' . esc_html($word) . '</span> ';
                            } else {
                                echo esc_html($word) . ' ';
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
                            <span class="ml-2 inline-block transition-transform group-hover:translate-x-1">→</span>
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
            <button class="hero-dot w-3 h-3 rounded-full transition-colors <?php echo $index === 0 ? 'bg-[#f26f21]' : 'bg-white/50 hover:bg-white/80'; ?>" aria-label="<?php printf( esc_attr__( 'Go to slide %d', 'cityclub' ), $index + 1 ); ?>"></button>
        <?php endforeach; ?>
    </div>
</section>

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

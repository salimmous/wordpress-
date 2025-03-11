<?php
/**
 * Template part for displaying the membership plans section on the home page
 *
 * @package CityClub
 */

// Get membership plans from theme options or use defaults
$plans = array(
    array(
        'name'     => __( 'BASIC', 'cityclub' ),
        'price'    => '199',
        'period'   => __( 'DH/mois', 'cityclub' ),
        'features' => array(
            array( 'text' => __( 'Accès à votre club d\'inscription', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès aux machines cardio et musculation', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès aux cours collectifs (planning standard)', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Casier journalier gratuit', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès à tous les clubs CityClub', 'cityclub' ), 'included' => false ),
            array( 'text' => __( 'Séances avec coach personnel', 'cityclub' ), 'included' => false ),
            array( 'text' => __( 'Accès aux espaces privilèges', 'cityclub' ), 'included' => false ),
        ),
        'color'    => 'bg-gradient-to-r from-gray-700 to-gray-900',
        'popular'  => false,
        'badge'    => '',
    ),
    array(
        'name'     => __( 'PREMIUM', 'cityclub' ),
        'price'    => '299',
        'period'   => __( 'DH/mois', 'cityclub' ),
        'features' => array(
            array( 'text' => __( 'Accès à votre club d\'inscription', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès aux machines cardio et musculation', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès aux cours collectifs (planning standard)', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Casier journalier gratuit', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès à tous les clubs CityClub', 'cityclub' ), 'included' => true ),
            array( 'text' => __( '1 séance avec coach personnel offerte/mois', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès aux espaces privilèges', 'cityclub' ), 'included' => true ),
        ),
        'color'    => 'bg-gradient-to-r from-[#f26f21] to-[#e05a10]',
        'popular'  => true,
        'badge'    => __( 'PLUS POPULAIRE', 'cityclub' ),
    ),
    array(
        'name'     => __( 'VIP', 'cityclub' ),
        'price'    => '499',
        'period'   => __( 'DH/mois', 'cityclub' ),
        'features' => array(
            array( 'text' => __( 'Accès à votre club d\'inscription', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès aux machines cardio et musculation', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès aux cours collectifs (planning standard)', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Casier journalier gratuit', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès à tous les clubs CityClub', 'cityclub' ), 'included' => true ),
            array( 'text' => __( '4 séances avec coach personnel offertes/mois', 'cityclub' ), 'included' => true ),
            array( 'text' => __( 'Accès illimité aux espaces privilèges', 'cityclub' ), 'included' => true ),
        ),
        'color'    => 'bg-gradient-to-r from-black to-gray-900',
        'popular'  => false,
        'badge'    => __( 'PREMIUM', 'cityclub' ),
    ),
);
?>

<section class="py-24 bg-gray-900" id="memberships">
    <div class="container mx-auto px-6">
        <div class="mb-16 text-center">
            <span class="inline-block text-[#f26f21] font-semibold text-lg mb-2 relative">
                <?php esc_html_e( 'NOS ABONNEMENTS', 'cityclub' ); ?>
                <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-[#f26f21]"></span>
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mt-4 mb-4 leading-tight">
                <?php esc_html_e( 'Choisissez l\'Offre Qui Vous Convient', 'cityclub' ); ?>
            </h2>
            <p class="text-white/80 max-w-2xl mx-auto">
                <?php esc_html_e( 'Des formules adaptées à tous les budgets et à tous les objectifs, avec des avantages exclusifs pour chaque niveau d\'abonnement', 'cityclub' ); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ( $plans as $plan ) : ?>
                <div class="rounded-2xl overflow-hidden <?php echo $plan['popular'] ? 'transform scale-105 shadow-2xl z-10' : 'shadow-xl'; ?> transition-all hover:shadow-2xl relative">
                    <?php if ( ! empty( $plan['badge'] ) ) : ?>
                        <div class="absolute top-0 right-0 bg-white text-[#f26f21] text-xs font-bold uppercase px-4 py-1 rounded-bl-lg z-10">
                            <?php echo esc_html( $plan['badge'] ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="<?php echo esc_attr( $plan['color'] ); ?> p-8 text-white relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full"></div>
                        <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-white/5 rounded-full"></div>

                        <h3 class="text-2xl font-bold mb-2 relative z-10"><?php echo esc_html( $plan['name'] ); ?></h3>
                        <div class="flex items-baseline relative z-10">
                            <span class="text-5xl font-black"><?php echo esc_html( $plan['price'] ); ?></span>
                            <span class="ml-2 text-white/80"><?php echo esc_html( $plan['period'] ); ?></span>
                        </div>

                        <div class="mt-4 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg inline-block relative z-10">
                            <span class="text-sm"><?php esc_html_e( 'Engagement 12 mois', 'cityclub' ); ?></span>
                        </div>
                    </div>

                    <div class="bg-white p-8">
                        <ul class="space-y-4">
                            <?php foreach ( $plan['features'] as $feature ) : ?>
                                <li class="flex items-start">
                                    <?php if ( $feature['included'] ) : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#f26f21] mr-3 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    <?php else : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 mr-3 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    <?php endif; ?>
                                    <span class="<?php echo $feature['included'] ? 'text-gray-700' : 'text-gray-400'; ?>">
                                        <?php echo esc_html( $feature['text'] ); ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="mt-8">
                            <a href="<?php echo esc_url( get_theme_mod( 'cityclub_membership_url', '#' ) ); ?>" class="block w-full py-4 rounded-lg font-semibold <?php echo $plan['popular'] ? 'bg-[#f26f21] hover:bg-[#e05a10] text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-800'; ?> transition-colors text-center">
                                <?php esc_html_e( 'CHOISIR CE FORFAIT', 'cityclub' ); ?>
                            </a>

                            <p class="text-xs text-gray-500 mt-4 text-center">
                                <?php esc_html_e( '* Frais d\'inscription de 300 DH. Voir conditions en club.', 'cityclub' ); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-16 bg-white/5 backdrop-blur-sm p-8 rounded-2xl border border-white/10 text-center">
            <h3 class="text-2xl font-bold text-white mb-4">
                <?php esc_html_e( 'Vous avez des questions sur nos abonnements?', 'cityclub' ); ?>
            </h3>
            <p class="text-white/80 mb-6 max-w-2xl mx-auto">
                <?php esc_html_e( 'Nos conseillers sont disponibles pour vous aider à choisir l\'abonnement qui correspond le mieux à vos besoins et objectifs.', 'cityclub' ); ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo esc_url( get_theme_mod( 'cityclub_contact_url', '#' ) ); ?>" class="bg-white text-gray-900 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors inline-flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <?php esc_html_e( 'NOUS CONTACTER', 'cityclub' ); ?>
                </a>
                <a href="<?php echo esc_url( get_theme_mod( 'cityclub_booking_url', '#' ) ); ?>" class="bg-[#f26f21] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors inline-flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <?php esc_html_e( 'RÉSERVER UNE VISITE', 'cityclub' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

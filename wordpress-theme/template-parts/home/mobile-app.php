<?php
/**
 * Template part for displaying the mobile app section on the home page
 *
 * @package CityClub
 */

// Get features from theme options or use defaults
$features = array(
    array(
        'title'       => __( 'Réservation de cours', 'cityclub' ),
        'description' => __( 'Réservez vos places dans les cours collectifs directement depuis l\'application', 'cityclub' ),
        'icon'        => 'fas fa-calendar-alt',
    ),
    array(
        'title'       => __( 'Suivi de progression', 'cityclub' ),
        'description' => __( 'Suivez vos performances et votre évolution avec des graphiques détaillés', 'cityclub' ),
        'icon'        => 'fas fa-chart-line',
    ),
    array(
        'title'       => __( 'Programmes personnalisés', 'cityclub' ),
        'description' => __( 'Accédez à vos programmes d\'entraînement personnalisés créés par nos coachs', 'cityclub' ),
        'icon'        => 'fas fa-clipboard-list',
    ),
    array(
        'title'       => __( 'Communauté CityClub', 'cityclub' ),
        'description' => __( 'Rejoignez des défis et partagez vos réussites avec la communauté CityClub', 'cityclub' ),
        'icon'        => 'fas fa-users',
    ),
);
?>

<section class="py-20 bg-gradient-to-br from-black to-gray-900 text-white" id="app">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-[#f26f21] font-semibold text-lg">
                    <?php esc_html_e( 'APPLICATION MOBILE', 'cityclub' ); ?>
                </span>
                <h2 class="text-4xl font-bold mt-2 mb-6">
                    <?php esc_html_e( 'Votre Coach Personnel Dans Votre Poche', 'cityclub' ); ?>
                </h2>
                <p class="text-white/80 mb-8">
                    <?php esc_html_e( 'L\'application CityClub vous permet de gérer votre expérience fitness où que vous soyez. Réservez des cours, suivez vos progrès et accédez à des programmes d\'entraînement personnalisés, le tout depuis votre smartphone.', 'cityclub' ); ?>
                </p>

                <div class="space-y-6">
                    <?php foreach ( $features as $feature ) : ?>
                        <div class="flex">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-[#f26f21]/20 rounded-lg flex items-center justify-center text-[#f26f21]">
                                    <i class="<?php echo esc_attr( $feature['icon'] ); ?>"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2"><?php echo esc_html( $feature['title'] ); ?></h3>
                                <p class="text-white/70"><?php echo esc_html( $feature['description'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-10 flex space-x-4">
                    <a href="#" class="bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold flex items-center hover:bg-gray-100 transition-colors">
                        <i class="fab fa-apple mr-2 text-xl"></i>
                        <?php esc_html_e( 'App Store', 'cityclub' ); ?>
                    </a>
                    <a href="#" class="bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold flex items-center hover:bg-gray-100 transition-colors">
                        <i class="fab fa-google-play mr-2 text-xl"></i>
                        <?php esc_html_e( 'Google Play', 'cityclub' ); ?>
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-[#f26f21]/20 rounded-full filter blur-3xl"></div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-[#f26f21]/20 rounded-full filter blur-3xl"></div>

                <div class="relative z-10 flex justify-center">
                    <div class="relative w-64 h-[500px] bg-black rounded-[40px] border-[8px] border-gray-800 shadow-2xl overflow-hidden">
                        <div class="absolute top-0 left-0 right-0 h-6 bg-black rounded-t-[32px] z-10"></div>
                        <img src="https://images.unsplash.com/photo-1605296867304-46d5465a13f1?w=400&q=80" alt="<?php esc_attr_e( 'CityClub App', 'cityclub' ); ?>" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute bottom-2 left-0 right-0 flex justify-center">
                            <div class="w-32 h-1 bg-white/30 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

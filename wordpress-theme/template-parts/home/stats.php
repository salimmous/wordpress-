<?php
/**
 * Template part for displaying the stats section on the home page
 *
 * @package CityClub
 */

// Get stats from theme options or use defaults
$stats = array(
    array(
        'number'      => '50+',
        'label'       => __( 'CLUBS', 'cityclub' ),
        'description' => __( 'À travers tout le Maroc, accessibles avec une seule carte d\'adhésion', 'cityclub' ),
        'icon'        => 'fas fa-building',
    ),
    array(
        'number'      => '600+',
        'label'       => __( 'COACHS CERTIFIÉS', 'cityclub' ),
        'description' => __( 'Experts qualifiés pour vous accompagner dans votre parcours fitness', 'cityclub' ),
        'icon'        => 'fas fa-users',
    ),
    array(
        'number'      => '230K+',
        'label'       => __( 'ADHÉRENTS', 'cityclub' ),
        'description' => __( 'Une communauté active et motivée qui s\'entraîne dans nos clubs', 'cityclub' ),
        'icon'        => 'fas fa-user-friends',
    ),
    array(
        'number'      => '24/7',
        'label'       => __( 'ACCÈS', 'cityclub' ),
        'description' => __( 'Entraînez-vous quand vous voulez, selon votre emploi du temps', 'cityclub' ),
        'icon'        => 'fas fa-clock',
    ),
);
?>

<section class="py-24 bg-gradient-to-b from-black to-gray-900" id="stats">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block text-[#f26f21] font-semibold text-lg mb-2 relative">
                <?php esc_html_e( 'NOS CHIFFRES', 'cityclub' ); ?>
                <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-[#f26f21]"></span>
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mt-4 mb-4">
                <?php esc_html_e( 'CityClub en Chiffres', 'cityclub' ); ?>
            </h2>
            <p class="text-white/70 max-w-2xl mx-auto">
                <?php esc_html_e( 'Découvrez pourquoi nous sommes le réseau de fitness leader au Maroc avec une présence nationale et une communauté grandissante', 'cityclub' ); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ( $stats as $stat ) : ?>
                <div class="relative overflow-hidden group">
                    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-8 border border-white/10 h-full transform transition-all duration-300 group-hover:translate-y-[-10px] group-hover:shadow-xl group-hover:shadow-[#f26f21]/10">
                        <div class="absolute -right-4 -top-4 w-20 h-20 bg-[#f26f21]/10 rounded-full blur-xl group-hover:bg-[#f26f21]/20 transition-all duration-300"></div>
                        
                        <div class="flex items-center mb-4">
                            <div class="mr-4 text-[#f26f21]">
                                <i class="<?php echo esc_attr( $stat['icon'] ); ?> text-3xl"></i>
                            </div>
                            <div class="text-[#f26f21] text-5xl font-black"><?php echo esc_html( $stat['number'] ); ?></div>
                        </div>
                        
                        <h3 class="text-white text-xl font-bold mb-3"><?php echo esc_html( $stat['label'] ); ?></h3>
                        <p class="text-white/70"><?php echo esc_html( $stat['description'] ); ?></p>
                        
                        <div class="absolute bottom-0 left-0 h-1 bg-gradient-to-r from-[#f26f21] to-[#f26f21]/0 w-0 group-hover:w-full transition-all duration-300"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

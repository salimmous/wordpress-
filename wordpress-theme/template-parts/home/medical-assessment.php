<?php
/**
 * Template part for displaying the medical assessment section on the home page
 *
 * @package CityClub
 */

// Get steps from theme options or use defaults
$steps = array(
    array(
        'number'      => '01',
        'title'       => __( 'DEMANDEZ VOTRE BILAN', 'cityclub' ),
        'description' => __( 'Approchez votre coach dans l\'espace dédié au Bilan Médico-Sportif et demandez de remplir votre planning de réservation digitalisé.', 'cityclub' ),
        'icon'        => 'fas fa-calendar-alt',
    ),
    array(
        'number'      => '02',
        'title'       => __( 'PASSEZ VOS TESTS', 'cityclub' ),
        'description' => __( 'En vous faisant assister et évaluer par le coach, passez l\'ensemble des tests physiques chronométrés du programme.', 'cityclub' ),
        'icon'        => 'fas fa-shield-alt',
    ),
    array(
        'number'      => '03',
        'title'       => __( 'RECEVEZ VOTRE PROGRAMME', 'cityclub' ),
        'description' => __( 'Sur la base des résultats de votre test médico-sportif, recevez vos programmes personnalisés sur place et par email.', 'cityclub' ),
        'icon'        => 'fas fa-clipboard-list',
    ),
);
?>

<section class="py-24 bg-[#0d5e63] text-white" id="bilan">
    <div class="container mx-auto px-6">
        <div class="mb-16 text-center">
            <span class="inline-block text-[#f26f21] font-semibold text-lg mb-2 relative">
                <?php esc_html_e( 'BILAN MÉDICO-SPORTIF', 'cityclub' ); ?>
                <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-[#f26f21]"></span>
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mt-4 mb-4 leading-tight">
                <?php esc_html_e( 'Reprenez en Main Votre Santé', 'cityclub' ); ?>
            </h2>
            <p class="text-white/80 max-w-2xl mx-auto">
                <?php esc_html_e( 'Notre bilan médico-sportif vous permet d\'obtenir un programme d\'entraînement personnalisé adapté à votre condition physique et à vos objectifs', 'cityclub' ); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/5 rounded-full filter blur-3xl"></div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/5 rounded-full filter blur-3xl"></div>
                
                <div class="relative z-10">
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/medical-assessment.jpg' ); ?>" alt="<?php esc_attr_e( 'Bilan Médico-Sportif', 'cityclub' ); ?>" class="w-full h-auto">
                    </div>
                    
                    <div class="absolute -bottom-8 -right-8 bg-[#f26f21] text-white p-6 rounded-2xl shadow-xl">
                        <div class="text-3xl font-black">600+</div>
                        <div class="text-sm font-medium"><?php esc_html_e( 'COACHS CERTIFIÉS', 'cityclub' ); ?></div>
                    </div>
                </div>
            </div>
            
            <div>
                <div class="space-y-8">
                    <?php foreach ( $steps as $index => $step ) : ?>
                        <div class="flex">
                            <div class="mr-6 flex-shrink-0">
                                <div class="w-12 h-12 rounded-full bg-[#f26f21] flex items-center justify-center text-white font-bold">
                                    <?php echo esc_html( $step['number'] ); ?>
                                </div>
                                <?php if ( $index < count( $steps ) - 1 ) : ?>
                                    <div class="w-0.5 h-16 bg-[#f26f21]/30 mx-auto my-2"></div>
                                <?php endif; ?>
                            </div>
                            
                            <div>
                                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-[#f26f21]/20 p-2 rounded-lg text-white mr-3">
                                            <i class="<?php echo esc_attr( $step['icon'] ); ?>"></i>
                                        </div>
                                        <h3 class="text-xl font-bold"><?php echo esc_html( $step['title'] ); ?></h3>
                                    </div>
                                    <p class="text-white/80"><?php echo esc_html( $step['description'] ); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="mt-12 flex gap-6">
                    <a href="<?php echo esc_url( get_theme_mod( 'cityclub_bilan_url', '#' ) ); ?>" class="bg-[#f26f21] hover:bg-[#e05a10] text-white px-8 py-4 rounded-lg font-semibold transition-colors shadow-lg shadow-[#f26f21]/20 flex-1 text-center">
                        <?php esc_html_e( 'RÉSERVER MON BILAN', 'cityclub' ); ?>
                    </a>
                    <a href="<?php echo esc_url( get_theme_mod( 'cityclub_bilan_info_url', '#' ) ); ?>" class="bg-white/10 backdrop-blur-sm border border-white/30 text-white px-8 py-4 rounded-lg font-semibold hover:bg-white/20 transition-colors flex-1 text-center">
                        <?php esc_html_e( 'EN SAVOIR PLUS', 'cityclub' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

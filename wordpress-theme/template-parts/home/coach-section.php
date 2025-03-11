<?php
/**
 * Template part for displaying the coach section on the home page
 *
 * @package CityClub
 */

// Get trainers from custom post type or use defaults
$trainers_args = array(
    'post_type'      => 'trainer',
    'posts_per_page' => 4,
);

$trainers_query = new WP_Query( $trainers_args );

// If no trainers found, use defaults
$has_trainers = $trainers_query->have_posts();

if ( ! $has_trainers ) {
    $default_trainers = array(
        array(
            'name'       => __( 'Karim Benali', 'cityclub' ),
            'role'       => __( 'Coach de musculation', 'cityclub' ),
            'image'      => 'https://api.dicebear.com/7.x/avataaars/svg?seed=karim&backgroundColor=f26f21',
            'expertise'  => array( __( 'Musculation', 'cityclub' ), __( 'Nutrition', 'cityclub' ), __( 'Perte de poids', 'cityclub' ) ),
            'experience' => __( '8 ans', 'cityclub' ),
        ),
        array(
            'name'       => __( 'Leila Tazi', 'cityclub' ),
            'role'       => __( 'Coach de yoga', 'cityclub' ),
            'image'      => 'https://api.dicebear.com/7.x/avataaars/svg?seed=leila&backgroundColor=1a73e8',
            'expertise'  => array( __( 'Yoga', 'cityclub' ), __( 'Méditation', 'cityclub' ), __( 'Stretching', 'cityclub' ) ),
            'experience' => __( '6 ans', 'cityclub' ),
        ),
        array(
            'name'       => __( 'Youssef Alami', 'cityclub' ),
            'role'       => __( 'Coach de cardio', 'cityclub' ),
            'image'      => 'https://api.dicebear.com/7.x/avataaars/svg?seed=youssef&backgroundColor=34a853',
            'expertise'  => array( __( 'Cardio', 'cityclub' ), __( 'HIIT', 'cityclub' ), __( 'Endurance', 'cityclub' ) ),
            'experience' => __( '5 ans', 'cityclub' ),
        ),
        array(
            'name'       => __( 'Samira Idrissi', 'cityclub' ),
            'role'       => __( 'Coach de pilates', 'cityclub' ),
            'image'      => 'https://api.dicebear.com/7.x/avataaars/svg?seed=samira&backgroundColor=673ab7',
            'expertise'  => array( __( 'Pilates', 'cityclub' ), __( 'Posture', 'cityclub' ), __( 'Réhabilitation', 'cityclub' ) ),
            'experience' => __( '7 ans', 'cityclub' ),
        ),
    );
}

// Coach features
$coach_features = array(
    array(
        'title'       => __( 'FORMATIONS CONTINUES', 'cityclub' ),
        'description' => __( 'Nos coachs suivent 8 formations par an pour vous accompagner', 'cityclub' ),
        'icon'        => 'fas fa-graduation-cap',
    ),
    array(
        'title'       => __( 'COACHS SPÉCIALISÉS', 'cityclub' ),
        'description' => __( 'Faites vous coacher par activité selon vos objectifs', 'cityclub' ),
        'icon'        => 'fas fa-shield-alt',
    ),
    array(
        'title'       => __( 'CONSEILS DIÉTÉTIQUES', 'cityclub' ),
        'description' => __( 'Faites vous conseiller par des experts de la nutrition', 'cityclub' ),
        'icon'        => 'fas fa-apple-alt',
    ),
    array(
        'title'       => __( 'COACHS POUR LES 100% FEMMES', 'cityclub' ),
        'description' => __( 'Des coachs femmes pour des centres City Lady 100% femmes', 'cityclub' ),
        'icon'        => 'fas fa-female',
    ),
);
?>

<section class="py-24 bg-white" id="coaching">
    <div class="container mx-auto px-6">
        <div class="mb-16 text-center">
            <span class="inline-block text-[#f26f21] font-semibold text-lg mb-2 relative">
                <?php esc_html_e( 'NOS EXPERTS', 'cityclub' ); ?>
                <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-[#f26f21]"></span>
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-4 mb-4 leading-tight">
                <?php esc_html_e( 'Plus de 600 Coachs Certifiés', 'cityclub' ); ?>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                <?php esc_html_e( 'Nos coachs certifiés possèdent une expertise approfondie dans divers domaines du fitness et de la santé', 'cityclub' ); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-16">
            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <?php foreach ( $coach_features as $feature ) : ?>
                        <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-shadow">
                            <div class="bg-[#f26f21]/10 w-12 h-12 rounded-lg flex items-center justify-center text-[#f26f21] mb-4">
                                <i class="<?php echo esc_attr( $feature['icon'] ); ?>"></i>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html( $feature['title'] ); ?></h3>
                            <p class="text-gray-600 text-sm"><?php echo esc_html( $feature['description'] ); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8 p-6 bg-[#f26f21]/5 rounded-xl border border-[#f26f21]/20">
                    <div class="flex items-start">
                        <div class="bg-[#f26f21] rounded-full p-2 text-white mr-4 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2"><?php esc_html_e( 'Coaching Personnalisé', 'cityclub' ); ?></h3>
                            <p class="text-gray-600 mb-4">
                                <?php esc_html_e( 'Nos coachs élaborent des programmes personnalisés adaptés à vos objectifs spécifiques, que ce soit pour perdre du poids, gagner en masse musculaire ou améliorer votre condition physique.', 'cityclub' ); ?>
                            </p>
                            <a href="<?php echo esc_url( get_theme_mod( 'cityclub_coaching_url', '#' ) ); ?>" class="text-[#f26f21] font-semibold hover:text-[#e05a10] transition-colors flex items-center">
                                <?php esc_html_e( 'Réserver une séance', 'cityclub' ); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-[#f26f21]/10 rounded-full filter blur-3xl"></div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-[#f26f21]/10 rounded-full filter blur-3xl"></div>

                <div class="relative z-10 grid grid-cols-2 gap-6">
                    <?php 
                    if ( $has_trainers ) :
                        while ( $trainers_query->have_posts() ) :
                            $trainers_query->the_post();
                            
                            $role = get_post_meta( get_the_ID(), '_cityclub_trainer_role', true );
                            $experience = get_post_meta( get_the_ID(), '_cityclub_trainer_experience', true );
                            $expertise_terms = get_the_terms( get_the_ID(), 'expertise' );
                            ?>
                            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-100">
                                <div class="relative h-48 overflow-hidden bg-gradient-to-br from-[#f26f21]/80 to-[#e05a10]/80">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <img src="<?php the_post_thumbnail_url( 'cityclub-trainer' ); ?>" alt="<?php the_title_attribute(); ?>" class="h-32 w-32 rounded-full border-4 border-white group-hover:scale-110 transition-transform duration-300">
                                        <?php else : ?>
                                            <div class="h-32 w-32 rounded-full border-4 border-white bg-gray-300 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="p-4 text-center">
                                    <h3 class="text-lg font-bold text-gray-900"><?php the_title(); ?></h3>
                                    <?php if ( ! empty( $role ) ) : ?>
                                        <p class="text-[#f26f21] font-medium text-sm mb-2"><?php echo esc_html( $role ); ?></p>
                                    <?php endif; ?>

                                    <div class="flex justify-center gap-2 mb-3">
                                        <?php
                                        if ( ! empty( $expertise_terms ) && ! is_wp_error( $expertise_terms ) ) :
                                            $count = 0;
                                            foreach ( $expertise_terms as $term ) :
                                                if ( $count < 3 ) : // Limit to 3 expertise areas
                                                    ?>
                                                    <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">
                                                        <?php echo esc_html( $term->name ); ?>
                                                    </span>
                                                    <?php
                                                    $count++;
                                                endif;
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>

                                    <?php if ( ! empty( $experience ) ) : ?>
                                        <div class="text-xs text-gray-500">
                                            <?php esc_html_e( 'Expérience:', 'cityclub' ); ?> <?php echo esc_html( $experience ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Display default trainers
                        foreach ( $default_trainers as $trainer ) :
                        ?>
                            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-100">
                                <div class="relative h-48 overflow-hidden bg-gradient-to-br from-[#f26f21]/80 to-[#e05a10]/80">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <img src="<?php echo esc_url( $trainer['image'] ); ?>" alt="<?php echo esc_attr( $trainer['name'] ); ?>" class="h-32 w-32 rounded-full border-4 border-white group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                </div>

                                <div class="p-4 text-center">
                                    <h3 class="text-lg font-bold text-gray-900"><?php echo esc_html( $trainer['name'] ); ?></h3>
                                    <p class="text-[#f26f21] font-medium text-sm mb-2"><?php echo esc_html( $trainer['role'] ); ?></p>
                                    <div class="flex justify-center gap-2 mb-3">
                                        <?php foreach ( $trainer['expertise'] as $skill ) : ?>
                                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">
                                                <?php echo esc_html( $skill ); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        <?php esc_html_e( 'Expérience:', 'cityclub' ); ?> <?php echo esc_html( $trainer['experience'] ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'trainer' ) ); ?>" class="inline-block bg-[#f26f21] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors shadow-lg shadow-[#f26f21]/20">
                <?php esc_html_e( 'DÉCOUVRIR TOUS NOS COACHS', 'cityclub' ); ?>
            </a>
        </div>
    </div>
</section>

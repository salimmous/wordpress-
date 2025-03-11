<?php
/**
 * Template part for displaying the testimonial carousel section on the home page
 *
 * @package CityClub
 */

// Get testimonials from custom post type or use defaults
$testimonials_args = array(
    'post_type'      => 'testimonial',
    'posts_per_page' => 3,
);

$testimonials_query = new WP_Query( $testimonials_args );

// If no testimonials found, use defaults
$has_testimonials = $testimonials_query->have_posts();

if ( ! $has_testimonials ) {
    $default_testimonials = array(
        array(
            'id'      => 1,
            'name'    => __( 'Zakaria', 'cityclub' ),
            'role'    => __( 'Membre depuis 1 an', 'cityclub' ),
            'image'   => 'https://api.dicebear.com/7.x/avataaars/svg?seed=zakaria',
            'quote'   => __( 'Les programmes que j\'ai reçu correspondent bien à ma structure corporelle, je suis très content de pouvoir suivre mon évolution.', 'cityclub' ),
        ),
        array(
            'id'      => 2,
            'name'    => __( 'Leila', 'cityclub' ),
            'role'    => __( 'Membre depuis 6 mois', 'cityclub' ),
            'image'   => 'https://api.dicebear.com/7.x/avataaars/svg?seed=leila',
            'quote'   => __( 'J\'adore l\'espace 100% femmes, c\'est très confortable et les coachs sont vraiment à l\'écoute de nos besoins.', 'cityclub' ),
        ),
        array(
            'id'      => 3,
            'name'    => __( 'Karim', 'cityclub' ),
            'role'    => __( 'Membre depuis 2 ans', 'cityclub' ),
            'image'   => 'https://api.dicebear.com/7.x/avataaars/svg?seed=karim',
            'quote'   => __( 'Grâce au bilan médico-sportif, j\'ai pu avoir un programme adapté à mes objectifs et j\'ai déjà perdu 15kg en 6 mois!', 'cityclub' ),
        ),
    );
}
?>

<section class="py-16 bg-[#f26f21]" id="testimonials">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-white mb-4">
                <?php esc_html_e( 'REJOIGNEZ UNE COMMUNAUTÉ DE PLUS DE', 'cityclub' ); ?> 
                <span class="font-black"><?php esc_html_e( '200.000 ADHÉRENTS ACTIFS !', 'cityclub' ); ?></span>
            </h2>
            <p class="text-white/80 max-w-2xl mx-auto">
                <?php esc_html_e( 'Découvrez les témoignages de nos membres qui ont transformé leur vie grâce à CityClub', 'cityclub' ); ?>
            </p>
        </div>

        <div class="max-w-4xl mx-auto testimonial-carousel">
            <div class="bg-white rounded-xl overflow-hidden shadow-xl">
                <?php 
                if ( $has_testimonials ) :
                    $index = 0;
                    while ( $testimonials_query->have_posts() ) :
                        $testimonials_query->the_post();
                        $role = get_post_meta( get_the_ID(), '_cityclub_testimonial_role', true );
                        ?>
                        <div class="testimonial-slide p-8" <?php echo $index === 0 ? '' : 'style="display: none;"'; ?>>
                            <div class="flex items-center mb-6">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="<?php the_title_attribute(); ?>" class="w-16 h-16 rounded-full mr-4 border-2 border-[#f26f21]">
                                <?php else : ?>
                                    <div class="w-16 h-16 rounded-full mr-4 border-2 border-[#f26f21] bg-gray-200 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900"><?php the_title(); ?></h3>
                                    <?php if ( ! empty( $role ) ) : ?>
                                        <p class="text-[#f26f21]"><?php echo esc_html( $role ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <blockquote class="text-gray-700 italic text-lg mb-6">
                                "<?php the_content(); ?>"
                            </blockquote>
                        </div>
                        <?php
                        $index++;
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Display default testimonials
                    foreach ( $default_testimonials as $index => $testimonial ) :
                        ?>
                        <div class="testimonial-slide p-8" <?php echo $index === 0 ? '' : 'style="display: none;"'; ?>>
                            <div class="flex items-center mb-6">
                                <img src="<?php echo esc_url( $testimonial['image'] ); ?>" alt="<?php echo esc_attr( $testimonial['name'] ); ?>" class="w-16 h-16 rounded-full mr-4 border-2 border-[#f26f21]">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900"><?php echo esc_html( $testimonial['name'] ); ?></h3>
                                    <p class="text-[#f26f21]"><?php echo esc_html( $testimonial['role'] ); ?></p>
                                </div>
                            </div>

                            <blockquote class="text-gray-700 italic text-lg mb-6">
                                "<?php echo esc_html( $testimonial['quote'] ); ?>"
                            </blockquote>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>

                <div class="flex justify-between items-center p-8 pt-0">
                    <div class="flex space-x-2">
                        <?php 
                        $total_testimonials = $has_testimonials ? $testimonials_query->post_count : count( $default_testimonials );
                        for ( $i = 0; $i < $total_testimonials; $i++ ) : 
                        ?>
                            <button class="testimonial-dot w-3 h-3 rounded-full <?php echo $i === 0 ? 'bg-[#f26f21]' : 'bg-gray-300'; ?>" aria-label="<?php printf( esc_attr__( 'Go to slide %d', 'cityclub' ), $i + 1 ); ?>"></button>
                        <?php endfor; ?>
                    </div>

                    <div class="flex space-x-2">
                        <button class="testimonial-prev bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-colors" aria-label="<?php esc_attr_e( 'Previous testimonial', 'cityclub' ); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="testimonial-next bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-colors" aria-label="<?php esc_attr_e( 'Next testimonial', 'cityclub' ); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

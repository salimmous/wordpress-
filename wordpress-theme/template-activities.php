<?php
/**
 * Template Name: Activities Page
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Page Header -->
    <section class="page-header bg-gradient-to-r from-[#f26f21] to-[#e05a10] text-white py-16">
        <div class="container">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4"><?php the_title(); ?></h1>
            <?php if (function_exists('yoast_breadcrumb')) : ?>
                <?php yoast_breadcrumb('<p id="breadcrumbs" class="text-white/80">', '</p>'); ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Activities Grid -->
    <section class="py-16 bg-white">
        <div class="container">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold mb-4"><?php echo esc_html__('Découvrez Nos Activités', 'cityclub-modern'); ?></h2>
                <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html__('Explorez notre large gamme d\'activités conçues pour tous les niveaux et tous les objectifs', 'cityclub-modern'); ?></p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $activities = new WP_Query(array(
                    'post_type' => 'activity',
                    'posts_per_page' => -1,
                ));

                if ($activities->have_posts()) :
                    while ($activities->have_posts()) : $activities->the_post();
                        ?>
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-100">
                            <div class="relative h-56 overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="absolute inset-0 bg-gradient-to-r from-[#f26f21] to-[#e05a10] opacity-90 z-10"></div>
                                    <?php the_post_thumbnail('large', array('class' => 'absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500')); ?>
                                <?php else : ?>
                                    <div class="absolute inset-0 bg-gradient-to-r from-[#f26f21] to-[#e05a10] opacity-90 z-10"></div>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.jpg'); ?>" alt="<?php the_title_attribute(); ?>" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                <?php endif; ?>
                                <div class="absolute inset-0 flex items-center justify-center z-20">
                                    <div class="text-white text-center p-6">
                                        <div class="bg-white/20 backdrop-blur-sm p-3 rounded-full inline-block mb-4">
                                            <div class="text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="text-2xl font-bold"><?php the_title(); ?></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6">
                                <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <div class="flex justify-between items-center">
                                    <a href="<?php the_permalink(); ?>" class="text-[#f26f21] font-semibold hover:text-[#e05a10] transition-colors flex items-center">
                                        <?php echo esc_html__('Découvrir', 'cityclub-modern'); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                    <span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full">
                                        <?php
                                        $level = get_post_meta(get_the_ID(), 'activity_level', true);
                                        echo esc_html($level ? $level : __('Tous niveaux', 'cityclub-modern'));
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <div class="col-span-full text-center py-12">
                        <p><?php echo esc_html__('Aucune activité trouvée.', 'cityclub-modern'); ?></p>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gray-100">
        <div class="container">
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <div class="text-center">
                    <h2 class="text-3xl font-bold mb-4"><?php echo esc_html__('Prêt à Commencer Votre Parcours Fitness?', 'cityclub-modern'); ?></h2>
                    <p class="text-gray-600 mb-8 max-w-2xl mx-auto"><?php echo esc_html__('Rejoignez CityClub aujourd\'hui et accédez à toutes nos activités avec une seule carte d\'adhésion', 'cityclub-modern'); ?></p>
                    <a href="#" class="inline-block bg-[#f26f21] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors shadow-lg shadow-[#f26f21]/20">
                        <?php echo esc_html__('COMMENCER MAINTENANT', 'cityclub-modern'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->

<?php
get_footer();

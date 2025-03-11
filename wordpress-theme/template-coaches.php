<?php
/**
 * Template Name: Coaches Page
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

    <!-- Coaches Filter -->
    <section class="py-16 bg-white">
        <div class="container">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold mb-4"><?php echo esc_html__('Nos Coachs Professionnels', 'cityclub-modern'); ?></h2>
                <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html__('Découvrez notre équipe de coachs certifiés, prêts à vous accompagner dans votre parcours fitness', 'cityclub-modern'); ?></p>
            </div>

            <div class="mb-12 flex flex-wrap justify-center gap-4">
                <button class="bg-[#f26f21] text-white px-6 py-2 rounded-full font-medium hover:bg-[#e05a10] transition-colors">
                    <?php echo esc_html__('Tous', 'cityclub-modern'); ?>
                </button>
                <button class="bg-gray-100 text-gray-800 px-6 py-2 rounded-full font-medium hover:bg-gray-200 transition-colors">
                    <?php echo esc_html__('Musculation', 'cityclub-modern'); ?>
                </button>
                <button class="bg-gray-100 text-gray-800 px-6 py-2 rounded-full font-medium hover:bg-gray-200 transition-colors">
                    <?php echo esc_html__('Cardio', 'cityclub-modern'); ?>
                </button>
                <button class="bg-gray-100 text-gray-800 px-6 py-2 rounded-full font-medium hover:bg-gray-200 transition-colors">
                    <?php echo esc_html__('Yoga', 'cityclub-modern'); ?>
                </button>
                <button class="bg-gray-100 text-gray-800 px-6 py-2 rounded-full font-medium hover:bg-gray-200 transition-colors">
                    <?php echo esc_html__('Pilates', 'cityclub-modern'); ?>
                </button>
                <button class="bg-gray-100 text-gray-800 px-6 py-2 rounded-full font-medium hover:bg-gray-200 transition-colors">
                    <?php echo esc_html__('Boxe & MMA', 'cityclub-modern'); ?>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $coaches = new WP_Query(array(
                    'post_type' => 'coach',
                    'posts_per_page' => -1,
                ));

                if ($coaches->have_posts()) :
                    while ($coaches->have_posts()) : $coaches->the_post();
                        ?>
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-100">
                            <div class="relative h-48 overflow-hidden bg-gradient-to-br from-[#f26f21]/80 to-[#e05a10]/80">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium', array('class' => 'h-32 w-32 rounded-full border-4 border-white group-hover:scale-110 transition-transform duration-300')); ?>
                                    <?php else : ?>
                                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=<?php echo esc_attr(get_the_title()); ?>&backgroundColor=f26f21" alt="<?php the_title_attribute(); ?>" class="h-32 w-32 rounded-full border-4 border-white group-hover:scale-110 transition-transform duration-300">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="p-4 text-center">
                                <h3 class="text-lg font-bold text-gray-900"><?php the_title(); ?></h3>
                                <?php
                                $coach_role = get_post_meta(get_the_ID(), 'coach_role', true);
                                if ($coach_role) :
                                    ?>
                                    <p class="text-[#f26f21] font-medium text-sm mb-2"><?php echo esc_html($coach_role); ?></p>
                                <?php endif; ?>

                                <?php
                                $coach_expertise = get_post_meta(get_the_ID(), 'coach_expertise', true);
                                if ($coach_expertise) :
                                    $expertise_array = explode(',', $coach_expertise);
                                    ?>
                                    <div class="flex justify-center gap-2 mb-3 flex-wrap">
                                        <?php foreach ($expertise_array as $skill) : ?>
                                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">
                                                <?php echo esc_html(trim($skill)); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php
                                $coach_experience = get_post_meta(get_the_ID(), 'coach_experience', true);
                                if ($coach_experience) :
                                    ?>
                                    <div class="text-xs text-gray-500 mb-4">
                                        <?php echo esc_html__('Expérience:', 'cityclub-modern'); ?> <?php echo esc_html($coach_experience); ?>
                                    </div>
                                <?php endif; ?>

                                <a href="<?php the_permalink(); ?>" class="block w-full bg-[#f26f21] text-white py-2 rounded-md font-medium hover:bg-[#e05a10] transition-all mt-2">
                                    <?php echo esc_html__('VOIR PROFIL', 'cityclub-modern'); ?>
                                </a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <div class="col-span-full text-center py-12">
                        <p><?php echo esc_html__('Aucun coach trouvé.', 'cityclub-modern'); ?></p>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Coach Features -->
    <section class="py-16 bg-gray-50">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-white p-6 rounded-xl hover:shadow-md transition-shadow">
                            <div class="bg-[#f26f21]/10 w-12 h-12 rounded-lg flex items-center justify-center text-[#f26f21] mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html__('FORMATIONS CONTINUES', 'cityclub-modern'); ?></h3>
                            <p class="text-gray-600 text-sm"><?php echo esc_html__('Nos coachs suivent 8 formations par an pour vous accompagner', 'cityclub-modern'); ?></p>
                        </div>

                        <div class="bg-white p-6 rounded-xl hover:shadow-md transition-shadow">
                            <div class="bg-[#f26f21]/10 w-12 h-12 rounded-lg flex items-center justify-center text-[#f26f21] mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html__('COACHS SPÉCIALISÉS', 'cityclub-modern'); ?></h3>
                            <p class="text-gray-600 text-sm"><?php echo esc_html__('Faites vous coacher par activité selon vos objectifs', 'cityclub-modern'); ?></p>
                        </div>

                        <div class="bg-white p-6 rounded-xl hover:shadow-md transition-shadow">
                            <div class="bg-[#f26f21]/10 w-12 h-12 rounded-lg flex items-center justify-center text-[#f26f21] mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html__('CONSEILS DIÉTÉTIQUES', 'cityclub-modern'); ?></h3>
                            <p class="text-gray-600 text-sm"><?php echo esc_html__('Faites vous conseiller par des experts de la nutrition', 'cityclub-modern'); ?></p>
                        </div>

                        <div class="bg-white p-6 rounded-xl hover:shadow-md transition-shadow">
                            <div class="bg-[#f26f21]/10 w-12 h-12 rounded-lg flex items-center justify-center text-[#f26f21] mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html__('COACHS POUR LES 100% FEMMES', 'cityclub-modern'); ?></h3>
                            <p class="text-gray-600 text-sm"><?php echo esc_html__('Des coachs femmes pour des centres City Lady 100% femmes', 'cityclub-modern'); ?></p>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-3xl font-bold mb-6"><?php echo esc_html__('Coaching Personnalisé', 'cityclub-modern'); ?></h2>
                    <p class="text-gray-600 mb-8">
                        <?php echo esc_html__('Nos coachs élaborent des programmes personnalisés adaptés à vos objectifs spécifiques, que ce soit pour perdre du poids, gagner en masse musculaire ou améliorer votre condition physique.', 'cityclub-modern'); ?>
                    </p>
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <h3 class="text-xl font-bold mb-4"><?php echo esc_html__('Réservez une séance avec un coach', 'cityclub-modern'); ?></h3>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo esc_html__('Votre nom', 'cityclub-modern'); ?></label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo esc_html__('Email', 'cityclub-modern'); ?></label>
                                <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo esc_html__('Téléphone', 'cityclub-modern'); ?></label>
                                <input type="tel" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo esc_html__('Type de coaching', 'cityclub-modern'); ?></label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none">
                                    <option value=""><?php echo esc_html__('Sélectionnez une option', 'cityclub-modern'); ?></option>
                                    <option value="musculation"><?php echo esc_html__('Musculation', 'cityclub-modern'); ?></option>
                                    <option value="cardio"><?php echo esc_html__('Cardio', 'cityclub-modern'); ?></option>
                                    <option value="yoga"><?php echo esc_html__('Yoga', 'cityclub-modern'); ?></option>
                                    <option value="pilates"><?php echo esc_html__('Pilates', 'cityclub-modern'); ?></option>
                                    <option value="boxe"><?php echo esc_html__('Boxe & MMA', 'cityclub-modern'); ?></option>
                                </select>
                            </div>
                            <button type="submit" class="w-full bg-[#f26f21] text-white py-3 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors">
                                <?php echo esc_html__('RÉSERVER MAINTENANT', 'cityclub-modern'); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->

<?php
get_footer();

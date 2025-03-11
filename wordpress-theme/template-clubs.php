<?php
/**
 * Template Name: Clubs Page
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

    <!-- Club Finder -->
    <section class="py-16 bg-white">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white p-8 rounded-2xl shadow-lg h-full">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#f26f21] mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <?php echo esc_html__('Trouver un Club', 'cityclub-modern'); ?>
                        </h3>

                        <form class="club-finder-form">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo esc_html__('Sélectionnez votre ville', 'cityclub-modern'); ?></label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none">
                                    <option value=""><?php echo esc_html__('Choisir une ville', 'cityclub-modern'); ?></option>
                                    <option value="casablanca">Casablanca</option>
                                    <option value="rabat">Rabat</option>
                                    <option value="marrakech">Marrakech</option>
                                    <option value="tanger">Tanger</option>
                                    <option value="agadir">Agadir</option>
                                    <option value="fes">Fès</option>
                                    <option value="meknes">Meknès</option>
                                    <option value="oujda">Oujda</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo esc_html__('Type de club', 'cityclub-modern'); ?></label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none">
                                    <option value=""><?php echo esc_html__('Tous les types', 'cityclub-modern'); ?></option>
                                    <option value="standard">CityClub Standard</option>
                                    <option value="premium">CityClub Premium</option>
                                    <option value="lady">CityLady (100% Femmes)</option>
                                </select>
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo esc_html__('Équipements', 'cityclub-modern'); ?></label>
                                <div class="grid grid-cols-2 gap-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span><?php echo esc_html__('Piscine', 'cityclub-modern'); ?></span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span><?php echo esc_html__('Sauna', 'cityclub-modern'); ?></span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span><?php echo esc_html__('Parking', 'cityclub-modern'); ?></span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span><?php echo esc_html__('Cours collectifs', 'cityclub-modern'); ?></span>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-[#f26f21] text-white py-3 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors">
                                <?php echo esc_html__('RECHERCHER', 'cityclub-modern'); ?>
                            </button>
                        </form>

                        <div class="mt-8 bg-[#f26f21]/10 p-4 rounded-xl">
                            <div class="flex items-center mb-4">
                                <div class="bg-[#f26f21] p-2 rounded-full text-white mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h4 class="text-gray-900 font-bold">
                                    <?php echo esc_html__('Vous ne trouvez pas votre ville?', 'cityclub-modern'); ?>
                                </h4>
                            </div>
                            <p class="text-gray-600 mb-4">
                                <?php echo esc_html__('Nous ouvrons régulièrement de nouveaux clubs. Laissez-nous vos coordonnées pour être informé des prochaines ouvertures.', 'cityclub-modern'); ?>
                            </p>
                            <button class="w-full bg-[#f26f21] text-white py-3 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors">
                                <?php echo esc_html__('ÊTRE NOTIFIÉ', 'cityclub-modern'); ?>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3 relative rounded-2xl overflow-hidden shadow-xl h-[500px]">
                    <div class="absolute inset-0 bg-gray-200">
                        <img src="https://images.unsplash.com/photo-1580086319619-3ed498161c77?w=1200&q=80" alt="Carte des clubs" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent">
                            <div class="absolute bottom-0 left-0 right-0 p-8">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-white text-2xl font-bold mb-2"><?php echo esc_html__('Réseau National', 'cityclub-modern'); ?></h3>
                                        <p class="text-white/80"><?php echo esc_html__('Trouvez un club près de chez vous', 'cityclub-modern'); ?></p>
                                    </div>
                                    <div class="bg-[#f26f21] text-white px-4 py-2 rounded-lg font-bold">
                                        50+ <?php echo esc_html__('CLUBS', 'cityclub-modern'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Club Listing -->
    <section class="py-16 bg-gray-50">
        <div class="container">
            <h2 class="text-3xl font-bold mb-8 text-center"><?php echo esc_html__('Nos Clubs par Ville', 'cityclub-modern'); ?></h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $clubs = new WP_Query(array(
                    'post_type' => 'club',
                    'posts_per_page' => -1,
                ));

                if ($clubs->have_posts()) :
                    while ($clubs->have_posts()) : $clubs->the_post();
                        ?>
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="h-48 overflow-hidden">
                                    <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500')); ?>
                                </div>
                            <?php endif; ?>

                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2"><?php the_title(); ?></h3>
                                
                                <?php
                                $club_type = get_post_meta(get_the_ID(), 'club_type', true);
                                $club_address = get_post_meta(get_the_ID(), 'club_address', true);
                                $club_phone = get_post_meta(get_the_ID(), 'club_phone', true);
                                ?>
                                
                                <?php if ($club_type) : ?>
                                    <div class="mb-2">
                                        <span class="bg-[#f26f21]/10 text-[#f26f21] text-xs px-3 py-1 rounded-full">
                                            <?php echo esc_html($club_type); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($club_address) : ?>
                                    <div class="flex items-start mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="text-gray-600 text-sm"><?php echo esc_html($club_address); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($club_phone) : ?>
                                    <div class="flex items-center mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <span class="text-gray-600 text-sm"><?php echo esc_html($club_phone); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="flex justify-between items-center">
                                    <a href="<?php the_permalink(); ?>" class="text-[#f26f21] font-semibold hover:text-[#e05a10] transition-colors flex items-center">
                                        <?php echo esc_html__('Voir les détails', 'cityclub-modern'); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                    <button class="bg-[#f26f21] text-white px-3 py-1 rounded text-sm hover:bg-[#e05a10] transition-colors">
                                        <?php echo esc_html__('Réserver', 'cityclub-modern'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <div class="col-span-full text-center py-12">
                        <p><?php echo esc_html__('Aucun club trouvé.', 'cityclub-modern'); ?></p>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-white">
        <div class="container">
            <div class="bg-gradient-to-r from-[#f26f21] to-[#e05a10] rounded-2xl p-12 text-white text-center">
                <h2 class="text-3xl font-bold mb-4"><?php echo esc_html__('Une Communauté de Plus de 230 000 Membres', 'cityclub-modern'); ?></h2>
                <p class="text-white/80 mb-8 max-w-2xl mx-auto"><?php echo esc_html__('Rejoignez la plus grande communauté fitness du Maroc et bénéficiez d\'un accès à tous nos clubs avec une seule carte d\'adhésion.', 'cityclub-modern'); ?></p>
                <a href="#" class="inline-block bg-white text-[#f26f21] px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors shadow-lg">
                    <?php echo esc_html__('REJOINDRE MAINTENANT', 'cityclub-modern'); ?>
                </a>
            </div>
        </div>
    </section>
</main><!-- #main -->

<?php
get_footer();

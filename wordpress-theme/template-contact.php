<?php
/**
 * Template Name: Contact Page
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

    <!-- Contact Section -->
    <section class="py-16 bg-white">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl font-bold mb-6"><?php echo esc_html__('Contactez-Nous', 'cityclub-modern'); ?></h2>
                    <p class="text-gray-600 mb-8">
                        <?php echo esc_html__('Vous avez des questions sur nos services, nos abonnements ou nos clubs? N\'hésitez pas à nous contacter. Notre équipe est à votre disposition pour vous aider.', 'cityclub-modern'); ?>
                    </p>

                    <div class="space-y-6 mb-8">
                        <div class="flex items-start">
                            <div class="bg-[#f26f21]/10 w-12 h-12 rounded-lg flex items-center justify-center text-[#f26f21] mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html__('Adresse', 'cityclub-modern'); ?></h3>
                                <p class="text-gray-600">
                                    <?php echo esc_html(get_theme_mod('cityclub_contact_address', '123 Boulevard Mohammed V, Casablanca, Maroc')); ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-[#f26f21]/10 w-12 h-12 rounded-lg flex items-center justify-center text-[#f26f21] mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html__('Téléphone', 'cityclub-modern'); ?></h3>
                                <p class="text-gray-600">
                                    <?php echo esc_html(get_theme_mod('cityclub_contact_phone', '+212 522 123 456')); ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-[#f26f21]/10 w-12 h-12 rounded-lg flex items-center justify-center text-[#f26f21] mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html__('Email', 'cityclub-modern'); ?></h3>
                                <p class="text-gray-600">
                                    <?php echo esc_html(get_theme_mod('cityclub_contact_email', 'contact@cityclub.ma')); ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-[#f26f21]/10 w-12 h-12 rounded-lg flex items-center justify-center text-[#f26f21] mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html__('Horaires d\'ouverture', 'cityclub-modern'); ?></h3>
                                <p class="text-gray-600">
                                    <?php echo esc_html__('Lundi - Vendredi:', 'cityclub-modern'); ?> <?php echo esc_html(get_theme_mod('cityclub_hours_weekdays', '6h - 23h')); ?><br>
                                    <?php echo esc_html__('Samedi:', 'cityclub-modern'); ?> <?php echo esc_html(get_theme_mod('cityclub_hours_saturday', '8h - 22h')); ?><br>
                                    <?php echo esc_html__('Dimanche:', 'cityclub-modern'); ?> <?php echo esc_html(get_theme_mod('cityclub_hours_sunday', '8h - 20h')); ?><br>
                                    <?php echo esc_html__('Jours fériés:', 'cityclub-modern'); ?> <?php echo esc_html(get_theme_mod('cityclub_hours_holidays', '10h - 18h')); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <?php if (get_theme_mod('cityclub_social_facebook')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('cityclub_social_facebook')); ?>" class="bg-[#f26f21] text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-[#e05a10] transition-colors" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('cityclub_social_twitter')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('cityclub_social_twitter')); ?>" class="bg-[#f26f21] text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-[#e05a10] transition-colors" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('cityclub_social_instagram')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('cityclub_social_instagram')); ?>" class="bg-[#f26f21] text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-[#e05a10] transition-colors" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <div class="bg-white p-8 rounded-xl shadow-lg">
                        <h3 class="text-2xl font-bold mb-6"><?php echo esc_html__('Envoyez-nous un message', 'cityclub-modern'); ?></h3>
                        <form class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo esc_html__('Nom', 'cityclub-modern'); ?></label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo esc_html__('Prénom', 'cityclub-modern'); ?></label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#
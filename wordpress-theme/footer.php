<?php
/**
 * The template for displaying the footer
 */
?>

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-widgets">
                <div class="footer-widget">
                    <h3 class="footer-widget-title"><?php echo esc_html(get_theme_mod('cityclub_footer_column1_title', 'À propos')); ?></h3>
                    <div class="footer-about">
                        <h3 class="site-logo">
                            <span class="city">City</span><span class="club">Club</span><sup>+</sup>
                        </h3>
                        <p><?php echo esc_html(get_theme_mod('cityclub_footer_about_text', 'Le plus grand réseau de fitness au Maroc avec plus de 50 clubs à travers le pays.')); ?></p>
                        <div class="footer-social">
                            <?php if (get_theme_mod('cityclub_social_facebook')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('cityclub_social_facebook')); ?>" class="footer-social-icon" target="_blank" rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('cityclub_social_twitter')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('cityclub_social_twitter')); ?>" class="footer-social-icon" target="_blank" rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('cityclub_social_instagram')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('cityclub_social_instagram')); ?>" class="footer-social-icon" target="_blank" rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="footer-widget">
                    <h3 class="footer-widget-title"><?php echo esc_html(get_theme_mod('cityclub_footer_column2_title', 'Liens Rapides')); ?></h3>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu',
                            'depth'          => 1,
                            'fallback_cb'    => '__return_false',
                        )
                    );
                    ?>
                </div>
                
                <div class="footer-widget">
                    <h3 class="footer-widget-title"><?php echo esc_html(get_theme_mod('cityclub_footer_column3_title', "Horaires d'Ouverture")); ?></h3>
                    <ul class="footer-hours">
                        <li><?php esc_html_e('Lundi - Vendredi:', 'cityclub-modern'); ?> <span><?php echo esc_html(get_theme_mod('cityclub_hours_weekdays', '6h - 23h')); ?></span></li>
                        <li><?php esc_html_e('Samedi:', 'cityclub-modern'); ?> <span><?php echo esc_html(get_theme_mod('cityclub_hours_saturday', '8h - 22h')); ?></span></li>
                        <li><?php esc_html_e('Dimanche:', 'cityclub-modern'); ?> <span><?php echo esc_html(get_theme_mod('cityclub_hours_sunday', '8h - 20h')); ?></span></li>
                        <li><?php esc_html_e('Jours fériés:', 'cityclub-modern'); ?> <span><?php echo esc_html(get_theme_mod('cityclub_hours_holidays', '10h - 18h')); ?></span></li>
                    </ul>
                    <p class="footer-hours-note"><?php esc_html_e('* Les horaires peuvent varier selon les clubs', 'cityclub-modern'); ?></p>
                </div>
                
                <div class="footer-widget">
                    <h3 class="footer-widget-title"><?php echo esc_html(get_theme_mod('cityclub_footer_column4_title', 'Contact')); ?></h3>
                    <ul class="footer-contact">
                        <?php if (get_theme_mod('cityclub_contact_address')) : ?>
                            <li class="footer-address">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span><?php echo esc_html(get_theme_mod('cityclub_contact_address')); ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if (get_theme_mod('cityclub_contact_phone')) : ?>
                            <li class="footer-phone">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <span><?php echo esc_html(get_theme_mod('cityclub_contact_phone')); ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if (get_theme_mod('cityclub_contact_email')) : ?>
                            <li class="footer-email">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span><?php echo esc_html(get_theme_mod('cityclub_contact_email')); ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-copyright">
                    <?php echo wp_kses_post(get_theme_mod('cityclub_copyright_text', '© ' . date('Y') . ' CityClub. Tous droits réservés.')); ?>
                </div>
                <div class="footer-links">
                    <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php esc_html_e('Politique de confidentialité', 'cityclub-modern'); ?></a>
                    <a href="#"><?php esc_html_e("Conditions d'utilisation", 'cityclub-modern'); ?></a>
                    <a href="#"><?php esc_html_e('FAQ', 'cityclub-modern'); ?></a>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

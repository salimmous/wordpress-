<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CityClub
 */

?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="footer-widgets-grid">
                    <div class="footer-widget">
                        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        <?php else : ?>
                            <h3 class="widget-title"><?php esc_html_e( 'About CityClub', 'cityclub' ); ?></h3>
                            <p><?php esc_html_e( 'CityClub est le plus grand réseau de clubs de fitness au Maroc avec plus de 50 clubs dans tout le royaume.', 'cityclub' ); ?></p>
                            <div class="social-icons">
                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="footer-widget">
                        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        <?php else : ?>
                            <h3 class="widget-title"><?php esc_html_e( 'Liens Rapides', 'cityclub' ); ?></h3>
                            <ul class="footer-links">
                                <li><a href="<?php echo esc_url( home_url( '/clubs' ) ); ?>"><?php esc_html_e( 'Nos Clubs', 'cityclub' ); ?></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/activites' ) ); ?>"><?php esc_html_e( 'Activités', 'cityclub' ); ?></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/coaching' ) ); ?>"><?php esc_html_e( 'Coaching', 'cityclub' ); ?></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/plannings' ) ); ?>"><?php esc_html_e( 'Plannings', 'cityclub' ); ?></a></li>
                                <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact', 'cityclub' ); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                    
                    <div class="footer-widget">
                        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-3' ); ?>
                        <?php else : ?>
                            <h3 class="widget-title"><?php esc_html_e( 'Contact', 'cityclub' ); ?></h3>
                            <ul class="contact-info">
                                <li><i class="fas fa-map-marker-alt"></i> <?php esc_html_e( 'Siège social: 123 Avenue Mohammed V, Casablanca', 'cityclub' ); ?></li>
                                <li><i class="fas fa-phone"></i> <?php esc_html_e( '+212 522 123 456', 'cityclub' ); ?></li>
                                <li><i class="fas fa-envelope"></i> <?php esc_html_e( 'contact@cityclub.ma', 'cityclub' ); ?></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="site-info">
            <div class="container">
                <div class="copyright">
                    <?php
                    /* translators: %s: CityClub. */
                    printf( esc_html__( '© %s CityClub. Tous droits réservés.', 'cityclub' ), date('Y') );
                    ?>
                </div>
                <div class="footer-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'container'      => false,
                            'depth'          => 1,
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

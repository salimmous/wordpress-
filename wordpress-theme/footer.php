<?php
/**
 * The template for displaying the footer
 *
 * @package CityClub
 */

?>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-widgets">
				<div class="footer-widget">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<?php dynamic_sidebar( 'footer-1' ); ?>
					<?php else : ?>
						<h4 class="footer-widget-title"><?php esc_html_e( 'À propos de CityClub', 'cityclub' ); ?></h4>
						<p><?php esc_html_e( 'CityClub est le plus grand réseau de fitness au Maroc avec plus de 50 clubs à travers le pays. Notre mission est de rendre le fitness accessible à tous.', 'cityclub' ); ?></p>
					<?php endif; ?>
				</div>
				
				<div class="footer-widget">
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<?php dynamic_sidebar( 'footer-2' ); ?>
					<?php else : ?>
						<h4 class="footer-widget-title"><?php esc_html_e( 'Liens rapides', 'cityclub' ); ?></h4>
						<ul>
							<li><a href="#"><?php esc_html_e( 'Nos clubs', 'cityclub' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Activités', 'cityclub' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Abonnements', 'cityclub' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Coachs', 'cityclub' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Bilan médico-sportif', 'cityclub' ); ?></a></li>
						</ul>
					<?php endif; ?>
				</div>
				
				<div class="footer-widget">
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<?php dynamic_sidebar( 'footer-3' ); ?>
					<?php else : ?>
						<h4 class="footer-widget-title"><?php esc_html_e( 'Horaires d\'ouverture', 'cityclub' ); ?></h4>
						<ul>
							<li><?php esc_html_e( 'Lundi - Vendredi: 6h - 23h', 'cityclub' ); ?></li>
							<li><?php esc_html_e( 'Samedi: 8h - 22h', 'cityclub' ); ?></li>
							<li><?php esc_html_e( 'Dimanche: 8h - 20h', 'cityclub' ); ?></li>
							<li><?php esc_html_e( 'Jours fériés: 10h - 18h', 'cityclub' ); ?></li>
						</ul>
					<?php endif; ?>
				</div>
				
				<div class="footer-widget">
					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<?php dynamic_sidebar( 'footer-4' ); ?>
					<?php else : ?>
						<h4 class="footer-widget-title"><?php esc_html_e( 'Contact', 'cityclub' ); ?></h4>
						<ul>
							<li><i class="fas fa-map-marker-alt"></i> <?php esc_html_e( 'Siège social: 123 Avenue Mohammed V, Casablanca', 'cityclub' ); ?></li>
							<li><i class="fas fa-phone"></i> <?php esc_html_e( 'Téléphone: +212 522 123 456', 'cityclub' ); ?></li>
							<li><i class="fas fa-envelope"></i> <?php esc_html_e( 'Email: contact@cityclub.ma', 'cityclub' ); ?></li>
						</ul>
					<?php endif; ?>
				</div>
			</div>
			
			<div class="footer-bottom">
				<div class="footer-copyright">
					<?php
					/* translators: %s: Current year and site name */
					printf( esc_html__( '© %s CityClub. Tous droits réservés.', 'cityclub' ), date_i18n( 'Y' ) );
					?>
				</div>
				
				<div class="footer-social">
					<a href="#" class="footer-social-icon"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="footer-social-icon"><i class="fab fa-instagram"></i></a>
					<a href="#" class="footer-social-icon"><i class="fab fa-twitter"></i></a>
					<a href="#" class="footer-social-icon"><i class="fab fa-youtube"></i></a>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

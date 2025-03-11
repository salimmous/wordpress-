<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package CityClub
 */

?>

<section class="no-results not-found">
	<div class="container py-16">
		<header class="page-header mb-8">
			<h1 class="page-title text-3xl font-bold"><?php esc_html_e( 'Rien trouvé', 'cityclub' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :

				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Prêt à publier votre premier article? <a href="%1$s">Commencez ici</a>.', 'cityclub' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

			elseif ( is_search() ) :
				?>

				<p class="mb-8"><?php esc_html_e( 'Désolé, mais rien ne correspond à vos termes de recherche. Veuillez réessayer avec des mots-clés différents.', 'cityclub' ); ?></p>
				<?php
				get_search_form();

			else :
				?>

				<p class="mb-8"><?php esc_html_e( 'Il semble que nous ne puissions pas trouver ce que vous cherchez. Peut-être qu\'une recherche peut aider.', 'cityclub' ); ?></p>
				<?php
				get_search_form();

			endif;
			?>
		</div><!-- .page-content -->
	</div>
</section><!-- .no-results -->

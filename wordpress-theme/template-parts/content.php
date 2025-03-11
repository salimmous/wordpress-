<?php
/**
 * Template part for displaying posts
 *
 * @package CityClub
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('medium_large', array('class' => 'w-full h-64 object-cover')); ?>
		</a>
	</div>
	<?php endif; ?>

	<div class="p-6">
		<header class="entry-header mb-4">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title text-2xl font-bold">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title text-xl font-bold"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta text-sm text-gray-500 mt-2">
					<?php
					cityclub_posted_on();
					cityclub_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			if ( is_singular() ) :
				the_content(
					sprinf(
						/* translators: %s: Name of current post. Only visible to screen readers */
						esc_html__( 'Continue reading %s', 'cityclub' ),
						'<span class="screen-reader-text">' . get_the_title() . '</span>'
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cityclub' ),
						'after'  => '</div>',
					)
				);
			else :
				the_excerpt();
				?>
				<a href="<?php the_permalink(); ?>" class="text-[#f26f21] font-semibold hover:text-[#e05a10] transition-colors flex items-center mt-4">
					<?php esc_html_e( 'Lire la suite', 'cityclub' ); ?>
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
					</svg>
				</a>
				<?php
			endif;
			?>
		</div><!-- .entry-content -->

		<?php if ( is_singular() ) : ?>
		<footer class="entry-footer mt-6 pt-4 border-t border-gray-200">
			<?php cityclub_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

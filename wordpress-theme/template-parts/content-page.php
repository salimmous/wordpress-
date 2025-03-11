<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package CityClub
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="page-header relative">
		<div class="absolute inset-0 bg-gradient-to-r from-black/80 to-black/40 z-10"></div>
		<?php the_post_thumbnail('full', array('class' => 'w-full h-64 md:h-96 object-cover')); ?>
		<div class="container relative z-20 flex items-center h-full">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title text-4xl md:text-5xl font-extrabold text-white">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		</div>
	</div>
	<?php else : ?>
	<div class="container py-12">
		<header class="entry-header mb-8">
			<?php the_title( '<h1 class="entry-title text-4xl font-bold">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>
	<?php endif; ?>

	<div class="container py-12">
		<div class="entry-content prose max-w-none">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cityclub' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer mt-8 pt-4 border-t border-gray-200">
				<?php
				edit_post_link(
					sprinf(
						/* translators: %s: Name of current post. Only visible to screen readers */
						esc_html__( 'Edit %s', 'cityclub' ),
						'<span class="screen-reader-text">' . get_the_title() . '</span>'
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * CityClub Testimonials Widget
 *
 * @package CityClub
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * CityClub Testimonials Widget Class
 */
class CityClub_Testimonials_Widget extends WP_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct(
			'cityclub_testimonials_widget',
			__( 'CityClub - Testimonials', 'cityclub' ),
			array(
				'description' => __( 'Display testimonials in a carousel.', 'cityclub' ),
			)
		);
	}

	/**
	 * Widget output
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 3;

		$testimonials_query = new WP_Query(
			array(
				'post_type'      => 'testimonial',
				'posts_per_page' => $number,
			)
		);

		if ( $testimonials_query->have_posts() ) :
			// Generate a unique ID for this widget instance
			$widget_id = 'cityclub-testimonials-' . $this->id;
			?>
			<div class="cityclub-testimonials-widget py-12 bg-[#f26f21] text-white rounded-xl">
				<div class="container mx-auto px-6">
					<?php if ( ! empty( $instance['subtitle'] ) || ! empty( $instance['description'] ) ) : ?>
						<div class="text-center mb-12">
							<?php if ( ! empty( $instance['subtitle'] ) ) : ?>
								<h2 class="text-3xl font-bold text-white mb-4">
									<?php echo esc_html( $instance['subtitle'] ); ?>
								</h2>
							<?php endif; ?>
							<?php if ( ! empty( $instance['description'] ) ) : ?>
								<p class="text-white/80 max-w-2xl mx-auto">
									<?php echo esc_html( $instance['description'] ); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					
					<div class="max-w-4xl mx-auto">
						<div id="<?php echo esc_attr( $widget_id ); ?>" class="testimonials-carousel bg-white rounded-xl overflow-hidden shadow-xl">
							<div class="testimonials-slides relative">
								<?php
								$slide_index = 0;
								while ( $testimonials_query->have_posts() ) :
									$testimonials_query->the_post();
									$role = get_post_meta( get_the_ID(), '_cityclub_testimonial_role', true );
									?>
									<div class="testimonial-slide p-8" data-slide="<?php echo esc_attr( $slide_index ); ?>" style="<?php echo $slide_index === 0 ? 'display: block;' : 'display: none;'; ?>">
										<div class="flex items-center mb-6">
											<?php if ( has_post_thumbnail() ) : ?>
												<img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="<?php the_title_attribute(); ?>" class="w-16 h-16 rounded-full mr-4 border-2 border-[#f26f21]">
											<?php else : ?>
												<div class="w-16 h-16 rounded-full mr-4 border-2 border-[#f26f21] bg-gray-200 flex items-center justify-center">
													<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
													</svg>
												</div>
											<?php endif; ?>
											<div>
												<h3 class="text-xl font-bold text-gray-900"><?php the_title(); ?></h3>
												<?php if ( ! empty( $role ) ) : ?>
													<p class="text-[#f26f21]"><?php echo esc_html( $role ); ?></p>
												<?php endif; ?>
											</div>
										</div>
										
										<blockquote class="text-gray-700 italic text-lg mb-6">
											"<?php echo wp_kses_post( get_the_content() ); ?>"
										</blockquote>
									</div>
									<?php
									$slide_index++;
								endwhile;
								?>
							</div>
							
							<div class="flex justify-between items-center p-4 border-t border-gray-200">
								<div class="flex space-x-2">
									<?php for ( $i = 0; $i < $slide_index; $i++ ) : ?>
										<button 
											class="testimonial-dot w-3 h-3 rounded-full <?php echo $i === 0 ? 'bg-[#f26f21]' : 'bg-gray-300'; ?>" 
											data-slide="<?php echo esc_attr( $i ); ?>"
											aria-label="<?php printf( esc_attr__( 'Go to slide %d', 'cityclub' ), $i + 1 ); ?>"
										></button>
									<?php endfor; ?>
								</div>
								
								<div class="flex space-x-2">
									<button 
										class="testimonial-prev bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-colors" 
										aria-label="<?php esc_attr_e( 'Previous testimonial', 'cityclub' ); ?>"
									>
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
											<path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
										</svg>
									</button>
									<button 
										class="testimonial-next bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-colors" 
										aria-label="<?php esc_attr_e( 'Next testimonial', 'cityclub' ); ?>"
									>
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
											<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
										</svg>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script>
			(function() {
				document.addEventListener('DOMContentLoaded', function() {
					var carousel = document.getElementById('<?php echo esc_js( $widget_id ); ?>');
					if (!carousel) return;

					var slides = carousel.querySelectorAll('.testimonial-slide');
					var dots = carousel.querySelectorAll('.testimonial-dot');
					var prevBtn = carousel.querySelector('.testimonial-prev');
					var nextBtn = carousel.querySelector('.testimonial-next');
					var currentSlide = 0;
					var slideCount = slides.length;

					function showSlide(index) {
						// Hide all slides
						slides.forEach(function(slide) {
							slide.style.display = 'none';
						});

						// Remove active class from all dots
						dots.forEach(function(dot) {
							dot.classList.remove('bg-[#f26f21]');
							dot.classList.add('bg-gray-300');
						});

						// Show the current slide
						slides[index].style.display = 'block';

						// Add active class to current dot
						dots[index].classList.remove('bg-gray-300');
						dots[index].classList.add('bg-[#f26f21]');

						// Update current slide index
						currentSlide = index;
					}

					// Next slide
					function nextSlide() {
						showSlide((currentSlide + 1) % slideCount);
					}

					// Previous slide
					function prevSlide() {
						showSlide((currentSlide - 1 + slideCount) % slideCount);
					}

					// Add click event to dots
					dots.forEach(function(dot, index) {
						dot.addEventListener('click', function() {
							showSlide(index);
						});
					});

					// Add click event to prev button
					prevBtn.addEventListener('click', prevSlide);

					// Add click event to next button
					nextBtn.addEventListener('click', nextSlide);

					// Auto slide (optional)
					var autoSlide = setInterval(nextSlide, 5000);

					// Pause auto slide on hover
					carousel.addEventListener('mouseenter', function() {
						clearInterval(autoSlide);
					});

					// Resume auto slide on mouse leave
					carousel.addEventListener('mouseleave', function() {
						autoSlide = setInterval(nextSlide, 5000);
					});
				});
			})();
			</script>
			<?php
			wp_reset_postdata();
		endif;

		echo $args['after_widget'];
	}

	/**
	 * Widget form
	 *
	 * @param array $instance Widget instance.
	 */
	public function form( $instance ) {
		$title       = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle    = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';
		$number      = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 3;
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'cityclub' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_html_e( 'Subtitle:', 'cityclub' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Description:', 'cityclub' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" rows="3"><?php echo esc_textarea( $description ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of testimonials to show:', 'cityclub' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3">
		</p>
		<?php
	}

	/**
	 * Widget update
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $old_instance Old widget instance.
	 * @return array Updated widget instance.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? sanitize_textarea_field( $new_instance['description'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? absint( $new_instance['number'] ) : 3;

		return $instance;
	}
}

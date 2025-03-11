<?php
/**
 * CityClub Trainers Widget
 *
 * @package CityClub
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * CityClub Trainers Widget Class
 */
class CityClub_Trainers_Widget extends WP_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct(
			'cityclub_trainers_widget',
			__( 'CityClub - Trainers', 'cityclub' ),
			array(
				'description' => __( 'Display trainers in a grid layout.', 'cityclub' ),
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

		$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 4;
		$expertise = ! empty( $instance['expertise'] ) ? sanitize_text_field( $instance['expertise'] ) : '';

		$trainers_args = array(
			'post_type'      => 'trainer',
			'posts_per_page' => $number,
		);

		// Add expertise taxonomy query if specified
		if ( ! empty( $expertise ) ) {
			$trainers_args['tax_query'] = array(
				array(
					'taxonomy' => 'expertise',
					'field'    => 'slug',
					'terms'    => $expertise,
				),
			);
		}

		$trainers_query = new WP_Query( $trainers_args );

		if ( $trainers_query->have_posts() ) :
			?>
			<div class="cityclub-trainers-widget">
				<?php if ( ! empty( $instance['subtitle'] ) ) : ?>
					<span class="text-[#f26f21] font-semibold text-lg block mb-2"><?php echo esc_html( $instance['subtitle'] ); ?></span>
				<?php endif; ?>

				<?php if ( ! empty( $instance['description'] ) ) : ?>
					<p class="text-gray-600 mb-8"><?php echo esc_html( $instance['description'] ); ?></p>
				<?php endif; ?>

				<div class="trainers-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
					<?php
					while ( $trainers_query->have_posts() ) :
						$trainers_query->the_post();

						$role = get_post_meta( get_the_ID(), '_cityclub_trainer_role', true );
						$experience = get_post_meta( get_the_ID(), '_cityclub_trainer_experience', true );
						?>
						<div class="trainer-card bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-100">
							<div class="relative h-48 overflow-hidden bg-gradient-to-br from-[#f26f21]/80 to-[#e05a10]/80">
								<div class="absolute inset-0 flex items-center justify-center">
									<?php if ( has_post_thumbnail() ) : ?>
										<img src="<?php the_post_thumbnail_url( 'cityclub-trainer' ); ?>" alt="<?php the_title_attribute(); ?>" class="h-32 w-32 rounded-full border-4 border-white group-hover:scale-110 transition-transform duration-300">
									<?php else : ?>
										<div class="h-32 w-32 rounded-full border-4 border-white bg-gray-300 flex items-center justify-center">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
											</svg>
										</div>
									<?php endif; ?>
								</div>
							</div>

							<div class="p-4 text-center">
								<h3 class="text-lg font-bold text-gray-900"><?php the_title(); ?></h3>
								<?php if ( ! empty( $role ) ) : ?>
									<p class="text-[#f26f21] font-medium text-sm mb-2"><?php echo esc_html( $role ); ?></p>
								<?php endif; ?>

								<div class="flex justify-center gap-2 mb-3">
									<?php
									$expertise_terms = get_the_terms( get_the_ID(), 'expertise' );
									if ( ! empty( $expertise_terms ) && ! is_wp_error( $expertise_terms ) ) :
										$count = 0;
										foreach ( $expertise_terms as $term ) :
											if ( $count < 3 ) : // Limit to 3 expertise areas
												?>
												<span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">
													<?php echo esc_html( $term->name ); ?>
												</span>
												<?php
												$count++;
											endif;
										endforeach;
									endif;
									?>
								</div>

								<?php if ( ! empty( $experience ) ) : ?>
									<div class="text-xs text-gray-500">
										<?php esc_html_e( 'Expérience:', 'cityclub' ); ?> <?php echo esc_html( $experience ); ?>
									</div>
								<?php endif; ?>

								<a href="<?php the_permalink(); ?>" class="mt-3 inline-block text-[#f26f21] font-semibold hover:text-[#e05a10] transition-colors text-sm">
									<?php esc_html_e( 'Voir le profil', 'cityclub' ); ?>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>

				<?php if ( ! empty( $instance['view_all_text'] ) && ! empty( $instance['view_all_url'] ) ) : ?>
					<div class="mt-8 text-center">
						<a href="<?php echo esc_url( $instance['view_all_url'] ); ?>" class="inline-block bg-[#f26f21] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors shadow-lg shadow-[#f26f21]/20">
							<?php echo esc_html( $instance['view_all_text'] ); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
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
		$title        = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle     = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$description  = ! empty( $instance['description'] ) ? $instance['description'] : '';
		$number       = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 4;
		$expertise    = ! empty( $instance['expertise'] ) ? $instance['expertise'] : '';
		$view_all_text = ! empty( $instance['view_all_text'] ) ? $instance['view_all_text'] : __( 'DÉCOUVRIR TOUS NOS COACHS', 'cityclub' );
		$view_all_url  = ! empty( $instance['view_all_url'] ) ? $instance['view_all_url'] : '';
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of trainers to show:', 'cityclub' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'expertise' ) ); ?>"><?php esc_html_e( 'Filter by expertise (slug):', 'cityclub' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'expertise' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'expertise' ) ); ?>" type="text" value="<?php echo esc_attr( $expertise ); ?>">
			<small><?php esc_html_e( 'Leave empty to show all trainers.', 'cityclub' ); ?></small>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'view_all_text' ) ); ?>"><?php esc_html_e( 'View All Text:', 'cityclub' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'view_all_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'view_all_text' ) ); ?>" type="text" value="<?php echo esc_attr( $view_all_text ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'view_all_url' ) ); ?>"><?php esc_html_e( 'View All URL:', 'cityclub' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'view_all_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'view_all_url' ) ); ?>" type="url" value="<?php echo esc_url( $view_all_url ); ?>">
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
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? absint( $new_instance['number'] ) : 4;
		$instance['expertise'] = ( ! empty( $new_instance['expertise'] ) ) ? sanitize_text_field( $new_instance['expertise'] ) : '';
		$instance['view_all_text'] = ( ! empty( $new_instance['view_all_text'] ) ) ? sanitize_text_field( $new_instance['view_all_text'] ) : '';
		$instance['view_all_url'] = ( ! empty( $new_instance['view_all_url'] ) ) ? esc_url_raw( $new_instance['view_all_url'] ) : '';

		return $instance;
	}
}

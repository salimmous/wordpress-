<?php
/**
 * CityClub Activities Widget
 *
 * @package CityClub
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * CityClub Activities Widget Class
 */
class CityClub_Activities_Widget extends WP_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct(
			'cityclub_activities_widget',
			__( 'CityClub - Activities', 'cityclub' ),
			array(
				'description' => __( 'Display activities in a grid layout.', 'cityclub' ),
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

		$activities_query = new WP_Query(
			array(
				'post_type'      => 'activity',
				'posts_per_page' => $number,
			)
		);

		if ( $activities_query->have_posts() ) :
			?>
			<div class="cityclub-activities-widget">
				<div class="activities-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
					<?php
					while ( $activities_query->have_posts() ) :
						$activities_query->the_post();

						$color = get_post_meta( get_the_ID(), '_cityclub_activity_color', true );
						if ( empty( $color ) ) {
							$color = 'from-red-600 to-red-800';
						}

						$icon = get_post_meta( get_the_ID(), '_cityclub_activity_icon', true );
						?>
						<div class="activity-card bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-100">
							<div class="relative h-56 overflow-hidden">
								<div class="absolute inset-0 bg-gradient-to-r <?php echo esc_attr( $color ); ?> opacity-90 z-10"></div>
								<?php if ( has_post_thumbnail() ) : ?>
									<img src="<?php the_post_thumbnail_url( 'cityclub-activity' ); ?>" alt="<?php the_title_attribute(); ?>" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
								<?php endif; ?>
								<div class="absolute inset-0 flex items-center justify-center z-20">
									<div class="text-white text-center p-6">
										<div class="bg-white/20 backdrop-blur-sm p-3 rounded-full inline-block mb-4">
											<div class="text-white">
												<?php if ( ! empty( $icon ) ) : ?>
													<i class="<?php echo esc_attr( $icon ); ?>"></i>
												<?php else : ?>
													<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
													</svg>
												<?php endif; ?>
											</div>
										</div>
										<h3 class="text-2xl font-bold"><?php the_title(); ?></h3>
									</div>
								</div>
							</div>

							<div class="p-6">
								<p class="text-gray-600 mb-4"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
								<div class="flex justify-between items-center">
									<a href="<?php the_permalink(); ?>" class="text-[#f26f21] font-semibold hover:text-[#e05a10] transition-colors flex items-center">
										<?php esc_html_e( 'Découvrir', 'cityclub' ); ?>
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
										</svg>
									</a>
									<?php
									$level = get_post_meta( get_the_ID(), '_cityclub_activity_level', true );
									if ( ! empty( $level ) ) :
										$level_text = '';
										switch ( $level ) {
											case 'beginner':
												$level_text = __( 'Débutant', 'cityclub' );
												break;
											case 'intermediate':
												$level_text = __( 'Intermédiaire', 'cityclub' );
												break;
											case 'advanced':
												$level_text = __( 'Avancé', 'cityclub' );
												break;
											default:
												$level_text = __( 'Tous niveaux', 'cityclub' );
										}
										?>
										<span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full">
											<?php echo esc_html( $level_text ); ?>
										</span>
									<?php endif; ?>
								</div>
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
		$number       = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 3;
		$view_all_text = ! empty( $instance['view_all_text'] ) ? $instance['view_all_text'] : __( 'VOIR TOUTES NOS ACTIVITÉS', 'cityclub' );
		$view_all_url  = ! empty( $instance['view_all_url'] ) ? $instance['view_all_url'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'cityclub' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of activities to show:', 'cityclub' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3">
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
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? absint( $new_instance['number'] ) : 3;
		$instance['view_all_text'] = ( ! empty( $new_instance['view_all_text'] ) ) ? sanitize_text_field( $new_instance['view_all_text'] ) : '';
		$instance['view_all_url'] = ( ! empty( $new_instance['view_all_url'] ) ) ? esc_url_raw( $new_instance['view_all_url'] ) : '';

		return $instance;
	}
}

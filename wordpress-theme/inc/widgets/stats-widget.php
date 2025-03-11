<?php
/**
 * CityClub Stats Widget
 *
 * @package CityClub
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * CityClub Stats Widget Class
 */
class CityClub_Stats_Widget extends WP_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct(
			'cityclub_stats_widget',
			__( 'CityClub - Stats', 'cityclub' ),
			array(
				'description' => __( 'Display statistics in a grid layout.', 'cityclub' ),
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

		// Get stats from instance
		$stats = array();
		for ( $i = 1; $i <= 4; $i++ ) {
			if ( ! empty( $instance["stat{$i}_number"] ) && ! empty( $instance["stat{$i}_label"] ) ) {
				$stats[] = array(
					'number'      => $instance["stat{$i}_number"],
					'label'       => $instance["stat{$i}_label"],
					'description' => ! empty( $instance["stat{$i}_description"] ) ? $instance["stat{$i}_description"] : '',
					'icon'        => ! empty( $instance["stat{$i}_icon"] ) ? $instance["stat{$i}_icon"] : '',
				);
			}
		}

		if ( ! empty( $stats ) ) :
			?>
			<div class="cityclub-stats-widget py-12 bg-gradient-to-b from-black to-gray-900 text-white rounded-xl">
				<div class="container mx-auto px-6">
					<?php if ( ! empty( $instance['subtitle'] ) ) : ?>
						<div class="text-center mb-8">
							<span class="inline-block text-[#f26f21] font-semibold text-lg mb-2 relative">
								<?php echo esc_html( $instance['subtitle'] ); ?>
								<span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-[#f26f21]"></span>
							</span>
							<?php if ( ! empty( $instance['description'] ) ) : ?>
								<p class="text-white/70 max-w-2xl mx-auto mt-4">
									<?php echo esc_html( $instance['description'] ); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-<?php echo count( $stats ); ?> gap-8">
						<?php foreach ( $stats as $stat ) : ?>
							<div class="relative overflow-hidden group">
								<div class="bg-white/5 backdrop-blur-md rounded-2xl p-8 border border-white/10 h-full transform transition-all duration-300 group-hover:translate-y-[-10px] group-hover:shadow-xl group-hover:shadow-[#f26f21]/10">
									<div class="absolute -right-4 -top-4 w-20 h-20 bg-[#f26f21]/10 rounded-full blur-xl group-hover:bg-[#f26f21]/20 transition-all duration-300"></div>
									
									<div class="flex items-center mb-4">
										<?php if ( ! empty( $stat['icon'] ) ) : ?>
											<div class="mr-4 text-[#f26f21]">
												<i class="<?php echo esc_attr( $stat['icon'] ); ?> text-3xl"></i>
											</div>
										<?php endif; ?>
										<div class="text-[#f26f21] text-5xl font-black"><?php echo esc_html( $stat['number'] ); ?></div>
									</div>
									
									<h3 class="text-white text-xl font-bold mb-3"><?php echo esc_html( $stat['label'] ); ?></h3>
									<?php if ( ! empty( $stat['description'] ) ) : ?>
										<p class="text-white/70"><?php echo esc_html( $stat['description'] ); ?></p>
									<?php endif; ?>
									
									<div class="absolute bottom-0 left-0 h-1 bg-gradient-to-r from-[#f26f21] to-[#f26f21]/0 w-0 group-hover:w-full transition-all duration-300"></div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php
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

		<hr>

		<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
			<p>
				<strong><?php printf( esc_html__( 'Stat %d', 'cityclub' ), $i ); ?></strong>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( "stat{$i}_number" ) ); ?>"><?php esc_html_e( 'Number:', 'cityclub' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "stat{$i}_number" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "stat{$i}_number" ) ); ?>" type="text" value="<?php echo esc_attr( ! empty( $instance["stat{$i}_number"] ) ? $instance["stat{$i}_number"] : '' ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( "stat{$i}_label" ) ); ?>"><?php esc_html_e( 'Label:', 'cityclub' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "stat{$i}_label" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "stat{$i}_label" ) ); ?>" type="text" value="<?php echo esc_attr( ! empty( $instance["stat{$i}_label"] ) ? $instance["stat{$i}_label"] : '' ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( "stat{$i}_description" ) ); ?>"><?php esc_html_e( 'Description:', 'cityclub' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "stat{$i}_description" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "stat{$i}_description" ) ); ?>" type="text" value="<?php echo esc_attr( ! empty( $instance["stat{$i}_description"] ) ? $instance["stat{$i}_description"] : '' ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( "stat{$i}_icon" ) ); ?>"><?php esc_html_e( 'Icon Class:', 'cityclub' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "stat{$i}_icon" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "stat{$i}_icon" ) ); ?>" type="text" value="<?php echo esc_attr( ! empty( $instance["stat{$i}_icon"] ) ? $instance["stat{$i}_icon"] : '' ); ?>">
				<small><?php esc_html_e( 'Font Awesome class, e.g. fas fa-dumbbell', 'cityclub' ); ?></small>
			</p>
			<?php if ( $i < 4 ) : ?>
				<hr>
			<?php endif; ?>
		<?php endfor; ?>
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

		// Save stats
		for ( $i = 1; $i <= 4; $i++ ) {
			$instance["stat{$i}_number"] = ( ! empty( $new_instance["stat{$i}_number"] ) ) ? sanitize_text_field( $new_instance["stat{$i}_number"] ) : '';
			$instance["stat{$i}_label"] = ( ! empty( $new_instance["stat{$i}_label"] ) ) ? sanitize_text_field( $new_instance["stat{$i}_label"] ) : '';
			$instance["stat{$i}_description"] = ( ! empty( $new_instance["stat{$i}_description"] ) ) ? sanitize_text_field( $new_instance["stat{$i}_description"] ) : '';
			$instance["stat{$i}_icon"] = ( ! empty( $new_instance["stat{$i}_icon"] ) ) ? sanitize_text_field( $new_instance["stat{$i}_icon"] ) : '';
		}

		return $instance;
	}
}

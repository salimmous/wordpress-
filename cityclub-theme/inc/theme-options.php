<?php
/**
 * Theme Options
 *
 * @package CityClub
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add theme options page to the admin menu
 */
function cityclub_add_theme_options_page() {
	add_theme_page(
		__( 'Theme Options', 'cityclub' ),
		__( 'Theme Options', 'cityclub' ),
		'manage_options',
		'cityclub-options',
		'cityclub_theme_options_page'
	);
}
add_action( 'admin_menu', 'cityclub_add_theme_options_page' );

/**
 * Register theme options settings
 */
function cityclub_register_settings() {
	// Register settings
	register_setting( 'cityclub_options', 'cityclub_options', 'cityclub_validate_options' );

	// Add sections
	add_settings_section(
		'cityclub_general_section',
		__( 'General Settings', 'cityclub' ),
		'cityclub_general_section_callback',
		'cityclub-options'
	);

	add_settings_section(
		'cityclub_header_section',
		__( 'Header Settings', 'cityclub' ),
		'cityclub_header_section_callback',
		'cityclub-options'
	);

	add_settings_section(
		'cityclub_footer_section',
		__( 'Footer Settings', 'cityclub' ),
		'cityclub_footer_section_callback',
		'cityclub-options'
	);

	add_settings_section(
		'cityclub_social_section',
		__( 'Social Media Settings', 'cityclub' ),
		'cityclub_social_section_callback',
		'cityclub-options'
	);

	// Add fields
	// General settings
	add_settings_field(
		'cityclub_logo',
		__( 'Logo', 'cityclub' ),
		'cityclub_logo_callback',
		'cityclub-options',
		'cityclub_general_section'
	);

	add_settings_field(
		'cityclub_favicon',
		__( 'Favicon', 'cityclub' ),
		'cityclub_favicon_callback',
		'cityclub-options',
		'cityclub_general_section'
	);

	add_settings_field(
		'cityclub_primary_color',
		__( 'Primary Color', 'cityclub' ),
		'cityclub_primary_color_callback',
		'cityclub-options',
		'cityclub_general_section'
	);

	add_settings_field(
		'cityclub_secondary_color',
		__( 'Secondary Color', 'cityclub' ),
		'cityclub_secondary_color_callback',
		'cityclub-options',
		'cityclub_general_section'
	);

	// Header settings
	add_settings_field(
		'cityclub_sticky_header',
		__( 'Sticky Header', 'cityclub' ),
		'cityclub_sticky_header_callback',
		'cityclub-options',
		'cityclub_header_section'
	);

	add_settings_field(
		'cityclub_header_cta_text',
		__( 'Header CTA Text', 'cityclub' ),
		'cityclub_header_cta_text_callback',
		'cityclub-options',
		'cityclub_header_section'
	);

	add_settings_field(
		'cityclub_header_cta_url',
		__( 'Header CTA URL', 'cityclub' ),
		'cityclub_header_cta_url_callback',
		'cityclub-options',
		'cityclub_header_section'
	);

	// Footer settings
	add_settings_field(
		'cityclub_footer_logo',
		__( 'Footer Logo', 'cityclub' ),
		'cityclub_footer_logo_callback',
		'cityclub-options',
		'cityclub_footer_section'
	);

	add_settings_field(
		'cityclub_copyright_text',
		__( 'Copyright Text', 'cityclub' ),
		'cityclub_copyright_text_callback',
		'cityclub-options',
		'cityclub_footer_section'
	);

	// Social media settings
	add_settings_field(
		'cityclub_facebook',
		__( 'Facebook URL', 'cityclub' ),
		'cityclub_facebook_callback',
		'cityclub-options',
		'cityclub_social_section'
	);

	add_settings_field(
		'cityclub_twitter',
		__( 'Twitter URL', 'cityclub' ),
		'cityclub_twitter_callback',
		'cityclub-options',
		'cityclub_social_section'
	);

	add_settings_field(
		'cityclub_instagram',
		__( 'Instagram URL', 'cityclub' ),
		'cityclub_instagram_callback',
		'cityclub-options',
		'cityclub_social_section'
	);

	add_settings_field(
		'cityclub_youtube',
		__( 'YouTube URL', 'cityclub' ),
		'cityclub_youtube_callback',
		'cityclub-options',
		'cityclub_social_section'
	);
}
add_action( 'admin_init', 'cityclub_register_settings' );

/**
 * Get theme options
 *
 * @return array Theme options
 */
function cityclub_get_options() {
	$defaults = cityclub_get_default_options();
	$options = get_option( 'cityclub_options', $defaults );

	return wp_parse_args( $options, $defaults );
}

/**
 * Get default theme options
 *
 * @return array Default theme options
 */
function cityclub_get_default_options() {
	$defaults = array(
		'logo'              => '',
		'favicon'           => '',
		'primary_color'     => '#f26f21',
		'secondary_color'   => '#000000',
		'sticky_header'     => 1,
		'header_cta_text'   => 'Join Now',
		'header_cta_url'    => '#',
		'footer_logo'       => '',
		'copyright_text'    => '&copy; ' . date( 'Y' ) . ' CityClub Fitness Network. All rights reserved.',
		'facebook'          => '#',
		'twitter'           => '#',
		'instagram'         => '#',
		'youtube'           => '#',
	);

	return apply_filters( 'cityclub_default_options', $defaults );
}

/**
 * Validate theme options
 *
 * @param array $input Input values
 * @return array Validated values
 */
function cityclub_validate_options( $input ) {
	$valid = cityclub_get_default_options();

	// Logo
	$valid['logo'] = esc_url_raw( $input['logo'] );

	// Favicon
	$valid['favicon'] = esc_url_raw( $input['favicon'] );

	// Primary color
	$valid['primary_color'] = sanitize_hex_color( $input['primary_color'] );

	// Secondary color
	$valid['secondary_color'] = sanitize_hex_color( $input['secondary_color'] );

	// Sticky header
	$valid['sticky_header'] = absint( $input['sticky_header'] );

	// Header CTA text
	$valid['header_cta_text'] = sanitize_text_field( $input['header_cta_text'] );

	// Header CTA URL
	$valid['header_cta_url'] = esc_url_raw( $input['header_cta_url'] );

	// Footer logo
	$valid['footer_logo'] = esc_url_raw( $input['footer_logo'] );

	// Copyright text
	$valid['copyright_text'] = wp_kses_post( $input['copyright_text'] );

	// Social media URLs
	$valid['facebook'] = esc_url_raw( $input['facebook'] );
	$valid['twitter'] = esc_url_raw( $input['twitter'] );
	$valid['instagram'] = esc_url_raw( $input['instagram'] );
	$valid['youtube'] = esc_url_raw( $input['youtube'] );

	return $valid;
}

/**
 * Render theme options page
 */
function cityclub_theme_options_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'CityClub Theme Options', 'cityclub' ); ?></h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'cityclub_options' );
			do_settings_sections( 'cityclub-options' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Section callbacks
 */
function cityclub_general_section_callback() {
	echo '<p>' . esc_html__( 'General theme settings.', 'cityclub' ) . '</p>';
}

function cityclub_header_section_callback() {
	echo '<p>' . esc_html__( 'Header settings.', 'cityclub' ) . '</p>';
}

function cityclub_footer_section_callback() {
	echo '<p>' . esc_html__( 'Footer settings.', 'cityclub' ) . '</p>';
}

function cityclub_social_section_callback() {
	echo '<p>' . esc_html__( 'Social media settings.', 'cityclub' ) . '</p>';
}

/**
 * Field callbacks
 */
function cityclub_logo_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_logo" name="cityclub_options[logo]" value="<?php echo esc_url( $options['logo'] ); ?>" class="regular-text" />
	<input type="button" id="upload_logo_button" class="button" value="<?php esc_attr_e( 'Upload Logo', 'cityclub' ); ?>" />
	<p class="description"><?php esc_html_e( 'Upload or select a logo for your site.', 'cityclub' ); ?></p>
	<div id="logo_preview">
		<?php if ( ! empty( $options['logo'] ) ) : ?>
			<img src="<?php echo esc_url( $options['logo'] ); ?>" style="max-width:300px;" /><br/>
			<input id="remove_logo_button" type="button" class="button" value="<?php esc_attr_e( 'Remove Logo', 'cityclub' ); ?>" />
		<?php endif; ?>
	</div>
	<?php
}

function cityclub_favicon_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_favicon" name="cityclub_options[favicon]" value="<?php echo esc_url( $options['favicon'] ); ?>" class="regular-text" />
	<input type="button" id="upload_favicon_button" class="button" value="<?php esc_attr_e( 'Upload Favicon', 'cityclub' ); ?>" />
	<p class="description"><?php esc_html_e( 'Upload or select a favicon for your site.', 'cityclub' ); ?></p>
	<div id="favicon_preview">
		<?php if ( ! empty( $options['favicon'] ) ) : ?>
			<img src="<?php echo esc_url( $options['favicon'] ); ?>" style="max-width:64px;" /><br/>
			<input id="remove_favicon_button" type="button" class="button" value="<?php esc_attr_e( 'Remove Favicon', 'cityclub' ); ?>" />
		<?php endif; ?>
	</div>
	<?php
}

function cityclub_primary_color_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_primary_color" name="cityclub_options[primary_color]" value="<?php echo esc_attr( $options['primary_color'] ); ?>" class="cityclub-color-picker" />
	<p class="description"><?php esc_html_e( 'Select primary color for your site.', 'cityclub' ); ?></p>
	<?php
}

function cityclub_secondary_color_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_secondary_color" name="cityclub_options[secondary_color]" value="<?php echo esc_attr( $options['secondary_color'] ); ?>" class="cityclub-color-picker" />
	<p class="description"><?php esc_html_e( 'Select secondary color for your site.', 'cityclub' ); ?></p>
	<?php
}

function cityclub_sticky_header_callback() {
	$options = cityclub_get_options();
	?>
	<label>
		<input type="checkbox" id="cityclub_sticky_header" name="cityclub_options[sticky_header]" value="1" <?php checked( 1, $options['sticky_header'] ); ?> />
		<?php esc_html_e( 'Enable sticky header', 'cityclub' ); ?>
	</label>
	<?php
}

function cityclub_header_cta_text_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_header_cta_text" name="cityclub_options[header_cta_text]" value="<?php echo esc_attr( $options['header_cta_text'] ); ?>" class="regular-text" />
	<p class="description"><?php esc_html_e( 'Text for the header call-to-action button.', 'cityclub' ); ?></p>
	<?php
}

function cityclub_header_cta_url_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_header_cta_url" name="cityclub_options[header_cta_url]" value="<?php echo esc_url( $options['header_cta_url'] ); ?>" class="regular-text" />
	<p class="description"><?php esc_html_e( 'URL for the header call-to-action button.', 'cityclub' ); ?></p>
	<?php
}

function cityclub_footer_logo_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_footer_logo" name="cityclub_options[footer_logo]" value="<?php echo esc_url( $options['footer_logo'] ); ?>" class="regular-text" />
	<input type="button" id="upload_footer_logo_button" class="button" value="<?php esc_attr_e( 'Upload Logo', 'cityclub' ); ?>" />
	<p class="description"><?php esc_html_e( 'Upload or select a logo for the footer.', 'cityclub' ); ?></p>
	<div id="footer_logo_preview">
		<?php if ( ! empty( $options['footer_logo'] ) ) : ?>
			<img src="<?php echo esc_url( $options['footer_logo'] ); ?>" style="max-width:200px;" /><br/>
			<input id="remove_footer_logo_button" type="button" class="button" value="<?php esc_attr_e( 'Remove Logo', 'cityclub' ); ?>" />
		<?php endif; ?>
	</div>
	<?php
}

function cityclub_copyright_text_callback() {
	$options = cityclub_get_options();
	?>
	<textarea id="cityclub_copyright_text" name="cityclub_options[copyright_text]" rows="3" class="large-text"><?php echo esc_textarea( $options['copyright_text'] ); ?></textarea>
	<p class="description"><?php esc_html_e( 'Copyright text for the footer.', 'cityclub' ); ?></p>
	<?php
}

function cityclub_facebook_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_facebook" name="cityclub_options[facebook]" value="<?php echo esc_url( $options['facebook'] ); ?>" class="regular-text" />
	<p class="description"><?php esc_html_e( 'Enter your Facebook page URL.', 'cityclub' ); ?></p>
	<?php
}

function cityclub_twitter_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_twitter" name="cityclub_options[twitter]" value="<?php echo esc_url( $options['twitter'] ); ?>" class="regular-text" />
	<p class="description"><?php esc_html_e( 'Enter your Twitter profile URL.', 'cityclub' ); ?></p>
	<?php
}

function cityclub_instagram_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_instagram" name="cityclub_options[instagram]" value="<?php echo esc_url( $options['instagram'] ); ?>" class="regular-text" />
	<p class="description"><?php esc_html_e( 'Enter your Instagram profile URL.', 'cityclub' ); ?></p>
	<?php
}

function cityclub_youtube_callback() {
	$options = cityclub_get_options();
	?>
	<input type="text" id="cityclub_youtube" name="cityclub_options[youtube]" value="<?php echo esc_url( $options['youtube'] ); ?>" class="regular-text" />
	<p class="description"><?php esc_html_e( 'Enter your YouTube channel URL.', 'cityclub' ); ?></p>
	<?php
}

// Admin scripts are already enqueued in functions.php

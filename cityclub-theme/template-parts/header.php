<?php
/**
 * Template part for displaying the header
 *
 * @package CityClub
 */

// Get theme options
$options = get_option( 'cityclub_theme_options' );
$header_button_text = isset( $options['header_button_text'] ) ? $options['header_button_text'] : esc_html__( 'S\'inscrire', 'cityclub' );
$header_button_url = isset( $options['header_button_url'] ) ? $options['header_button_url'] : '#';
$logo = isset( $options['logo'] ) ? $options['logo'] : '';
?>

<header id="masthead" class="site-header">
    <div class="container">
        <div class="header-container">
            <div class="site-branding">
                <?php
                if ( ! empty( $logo ) ) :
                ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="custom-logo">
                    </a>
                <?php
                elseif ( has_custom_logo() ) :
                    the_custom_logo();
                else :
                ?>
                    <div class="site-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <span class="city">City</span><span class="club">Club</span><sup>+</sup>
                        </a>
                    </div>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                    )
                );
                ?>
                <a href="<?php echo esc_url( $header_button_url ); ?>" class="btn"><?php echo esc_html( $header_button_text ); ?></a>
            </nav><!-- #site-navigation -->
        </div>
    </div>
</header><!-- #masthead -->

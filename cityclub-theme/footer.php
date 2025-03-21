<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CityClub
 */

?>

    </div><!-- #content -->

    <?php
    /**
     * Hook for Elementor Pro footer location
     */
    do_action( 'cityclub_footer' );
    ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

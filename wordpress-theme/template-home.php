<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <?php get_template_part('template-parts/home/hero'); ?>

    <!-- Stats Section -->
    <?php get_template_part('template-parts/home/stats'); ?>

    <!-- Activities Section -->
    <?php get_template_part('template-parts/home/activities'); ?>

    <!-- Club Map Section -->
    <?php get_template_part('template-parts/home/club-map'); ?>

    <!-- Membership Plans Section -->
    <?php get_template_part('template-parts/home/membership-plans'); ?>

    <!-- Coach Section -->
    <?php get_template_part('template-parts/home/coach-section'); ?>

    <!-- Medical Assessment Section -->
    <?php get_template_part('template-parts/home/medical-assessment'); ?>

    <!-- Gallery Section -->
    <?php get_template_part('template-parts/home/gallery'); ?>

    <!-- Mobile App Section -->
    <?php get_template_part('template-parts/home/mobile-app'); ?>

    <!-- Special Offer Section -->
    <?php get_template_part('template-parts/home/special-offer'); ?>

    <!-- Testimonial Carousel Section -->
    <?php get_template_part('template-parts/home/testimonial-carousel'); ?>

    <!-- FAQ Section -->
    <?php get_template_part('template-parts/home/faq'); ?>

    <!-- Partners Section -->
    <?php get_template_part('template-parts/home/partners'); ?>

    <!-- Newsletter Section -->
    <?php get_template_part('template-parts/home/newsletter'); ?>
</main><!-- #main -->

<?php
get_footer();

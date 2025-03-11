<?php
/**
 * Template part for displaying the gallery section on the home page
 *
 * @package CityClub
 */

// Get gallery images from theme options or use defaults
$images = array(
    array(
        'src' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=600&q=80',
        'alt' => __( 'Salle de musculation', 'cityclub' ),
        'span' => 'col-span-1',
    ),
    array(
        'src' => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=600&q=80',
        'alt' => __( 'Cours collectif', 'cityclub' ),
        'span' => 'col-span-2',
    ),
    array(
        'src' => 'https://images.unsplash.com/photo-1540497077202-7c8a3999166f?w=600&q=80',
        'alt' => __( 'Équipement de cardio', 'cityclub' ),
        'span' => 'col-span-1',
    ),
    array(
        'src' => 'https://images.unsplash.com/photo-1574680096145-d05b474e2155?w=600&q=80',
        'alt' => __( 'Espace détente', 'cityclub' ),
        'span' => 'col-span-1',
    ),
    array(
        'src' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?w=600&q=80',
        'alt' => __( 'Cours de spinning', 'cityclub' ),
        'span' => 'col-span-1',
    ),
);
?>

<section class="py-16 bg-white" id="gallery">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <span class="text-[#f26f21] font-semibold text-lg"><?php esc_html_e( 'GALERIE', 'cityclub' ); ?></span>
            <h2 class="text-4xl font-bold text-gray-900 mt-2 mb-4">
                <?php esc_html_e( 'Découvrez Nos Installations', 'cityclub' ); ?>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                <?php esc_html_e( 'Explorez nos clubs modernes équipés des dernières machines et technologies pour une expérience fitness optimale', 'cityclub' ); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php foreach ( $images as $image ) : ?>
                <div class="<?php echo esc_attr( $image['span'] ); ?> overflow-hidden rounded-lg group relative">
                    <img src="<?php echo esc_url( $image['src'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-4 w-full">
                            <h3 class="text-white font-bold"><?php echo esc_html( $image['alt'] ); ?></h3>
                            <div class="w-10 h-1 bg-[#f26f21] mt-2"></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-10 text-center">
            <a href="#" class="inline-block bg-[#f26f21] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors">
                <?php esc_html_e( 'VOIR PLUS DE PHOTOS', 'cityclub' ); ?>
            </a>
        </div>
    </div>
</section>

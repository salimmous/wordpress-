<?php
/**
 * Template part for displaying the partners section on the home page
 *
 * @package CityClub
 */

// Get partners from theme options or use defaults
$partners = array(
    array(
        'name' => 'Adidas',
        'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg',
    ),
    array(
        'name' => 'Nike',
        'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg',
    ),
    array(
        'name' => 'Under Armour',
        'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/e8/Under_armour_logo.svg',
    ),
    array(
        'name' => 'Technogym',
        'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Technogym_logo.svg',
    ),
    array(
        'name' => 'Life Fitness',
        'logo' => 'https://upload.wikimedia.org/wikipedia/commons/8/83/Life_Fitness_logo.svg',
    ),
    array(
        'name' => 'Reebok',
        'logo' => 'https://upload.wikimedia.org/wikipedia/commons/0/02/Reebok_logo.svg',
    ),
);
?>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <span class="text-[#f26f21] font-semibold text-lg">
                <?php esc_html_e( 'NOS PARTENAIRES', 'cityclub' ); ?>
            </span>
            <h2 class="text-4xl font-bold text-gray-900 mt-2 mb-4">
                <?php esc_html_e( 'Ils Nous Font Confiance', 'cityclub' ); ?>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                <?php esc_html_e( 'CityClub collabore avec les meilleures marques pour vous offrir une expérience fitness de qualité supérieure', 'cityclub' ); ?>
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            <?php foreach ( $partners as $partner ) : ?>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow flex items-center justify-center h-32">
                    <img src="<?php echo esc_url( $partner['logo'] ); ?>" alt="<?php echo esc_attr( $partner['name'] ); ?>" class="max-h-16 max-w-full grayscale hover:grayscale-0 transition-all duration-300">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 text-center">
            <p class="text-gray-600">
                <?php esc_html_e( 'Intéressé par un partenariat avec CityClub?', 'cityclub' ); ?> 
                <a href="#" class="text-[#f26f21] font-medium hover:underline">
                    <?php esc_html_e( 'Contactez-nous', 'cityclub' ); ?>
                </a>
            </p>
        </div>
    </div>
</section>

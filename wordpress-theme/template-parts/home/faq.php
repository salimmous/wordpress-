<?php
/**
 * Template part for displaying the FAQ section on the home page
 *
 * @package CityClub
 */

// Get FAQs from theme options or use defaults
$faqs = array(
    array(
        'question' => __( 'Avez-Vous Un Espace 100% Femmes ?', 'cityclub' ),
        'answer'   => __( 'Oui, City Club propose un espace entièrement dédié aux femmes, offrant un environnement confortable et privé pour s\'entraîner.', 'cityclub' ),
    ),
    array(
        'question' => __( 'Quels Sont Vos Horaires D\'ouverture ?', 'cityclub' ),
        'answer'   => __( 'Nos clubs sont ouverts 7j/7 avec des horaires étendus : Lundi-Vendredi de 6h à 23h, Samedi de 8h à 22h, Dimanche de 8h à 20h et jours fériés de 10h à 18h.', 'cityclub' ),
    ),
    array(
        'question' => __( 'Offrez-Vous Des Programmes D\'entraînement Personnalisés ?', 'cityclub' ),
        'answer'   => __( 'Oui, nos coachs certifiés élaborent des programmes personnalisés adaptés à vos objectifs spécifiques, que ce soit pour perdre du poids, gagner en masse musculaire ou améliorer votre condition physique.', 'cityclub' ),
    ),
    array(
        'question' => __( 'Quels Types D\'équipements Proposez-Vous ?', 'cityclub' ),
        'answer'   => __( 'Nos clubs sont équipés de machines cardio et de musculation haut de gamme, d\'espaces de poids libres, de zones fonctionnelles, et de studios pour les cours collectifs.', 'cityclub' ),
    ),
    array(
        'question' => __( 'Avez-Vous Des Piscines Et Des Terrains ?', 'cityclub' ),
        'answer'   => __( 'Certains de nos clubs premium disposent de piscines, de terrains de squash, et d\'espaces dédiés aux sports collectifs comme le basketball et le football en salle.', 'cityclub' ),
    ),
);
?>

<section class="py-16 bg-white" id="faq">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row gap-12">
            <div class="md:w-1/3">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4">
                    <?php esc_html_e( 'FOIRE AUX', 'cityclub' ); ?> <span class="text-[#f26f21]"><?php esc_html_e( 'QUESTIONS !', 'cityclub' ); ?></span>
                </h2>
                <p class="text-gray-600 mb-6">
                    <?php esc_html_e( 'Trouvez rapidement des réponses à vos questions les plus fréquentes sur nos services et installations.', 'cityclub' ); ?>
                </p>
            </div>

            <div class="md:w-2/3">
                <div class="space-y-4">
                    <?php foreach ( $faqs as $index => $faq ) : ?>
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <button class="faq-question w-full flex justify-between items-center p-4 text-left font-medium text-gray-900 hover:bg-gray-50 transition-colors">
                                <span><?php echo esc_html( $faq['question'] ); ?></span>
                                <span class="text-[#f26f21] faq-icon">
                                    <?php if ( $index === 0 ) : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    <?php else : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                    <?php endif; ?>
                                </span>
                            </button>
                            <div class="faq-answer p-4 bg-gray-50 border-t border-gray-200" <?php echo $index === 0 ? '' : 'style="display: none;"'; ?>>
                                <p class="text-gray-600"><?php echo esc_html( $faq['answer'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

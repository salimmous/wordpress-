<?php
/**
 * Template part for displaying the special offer section on the home page
 *
 * @package CityClub
 */
?>

<section class="py-16 bg-black relative overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <img src="https://images.unsplash.com/photo-1571388208497-71bedc66e932?w=1200&q=80" alt="<?php esc_attr_e( 'Background', 'cityclub' ); ?>" class="w-full h-full object-cover">
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block bg-[#f26f21] text-white px-6 py-2 rounded-full text-lg font-bold mb-6 animate-pulse">
                <?php esc_html_e( 'OFFRE SPÉCIALE LIMITÉE', 'cityclub' ); ?>
            </div>

            <h2 class="text-5xl md:text-6xl font-black text-white mb-6">
                <span class="text-[#f26f21]"><?php esc_html_e( '3 MOIS', 'cityclub' ); ?></span> <?php esc_html_e( 'OFFERTS', 'cityclub' ); ?>
            </h2>

            <p class="text-xl text-white/80 mb-8">
                <?php esc_html_e( 'Pour toute souscription à un abonnement annuel, bénéficiez de 3 mois supplémentaires gratuits. Offre valable jusqu\'au 31 mars.', 'cityclub' ); ?>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
                    <div class="text-4xl font-black text-[#f26f21] mb-2">50%</div>
                    <p class="text-white">
                        <?php esc_html_e( 'de réduction sur les frais d\'inscription', 'cityclub' ); ?>
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
                    <div class="text-4xl font-black text-[#f26f21] mb-2">3+3</div>
                    <p class="text-white">
                        <?php esc_html_e( 'mois offerts pour tout abonnement annuel', 'cityclub' ); ?>
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
                    <div class="text-4xl font-black text-[#f26f21] mb-2">1</div>
                    <p class="text-white"><?php esc_html_e( 'bilan médico-sportif gratuit', 'cityclub' ); ?></p>
                </div>
            </div>

            <button class="bg-[#f26f21] hover:bg-[#e05a10] text-white px-10 py-4 rounded-full text-xl font-bold transition-all shadow-lg shadow-[#f26f21]/20 hero-cta-button">
                <?php esc_html_e( 'JE PROFITE DE L\'OFFRE', 'cityclub' ); ?>
            </button>
        </div>
    </div>
</section>

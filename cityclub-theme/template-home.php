<?php
/**
 * Template Name: Home Page
 *
 * @package CityClub
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="hero-section">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg.jpg' ); ?>" alt="CityClub Fitness" class="hero-bg">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <?php esc_html_e( 'Reprenez en main', 'cityclub' ); ?>
                    <span><?php esc_html_e( 'votre santé', 'cityclub' ); ?></span>
                </h1>
                <p class="hero-description">
                    <?php esc_html_e( 'Rejoignez une communauté de plus de 230,000 adhérents au Maroc. Accédez à plus de 50 clubs dans tout le royaume avec une seule carte.', 'cityclub' ); ?>
                </p>
                <div class="hero-buttons">
                    <a href="<?php echo esc_url( home_url( '/inscription' ) ); ?>" class="btn">
                        <?php esc_html_e( 'S\'inscrire maintenant', 'cityclub' ); ?>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/clubs' ) ); ?>" class="btn btn-outline">
                        <?php esc_html_e( 'Trouver un club', 'cityclub' ); ?>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Promo Badge -->
        <div class="promo-badge">
            <div class="promo-badge-title">8 MARS</div>
            <div class="promo-badge-subtitle"><?php esc_html_e( 'Journée de la Femme', 'cityclub' ); ?></div>
            <div class="promo-badge-text"><?php esc_html_e( '3 mois offerts pour toutes les nouvelles inscriptions', 'cityclub' ); ?></div>
        </div>
    </section>

    <!-- Club Showcase Section -->
    <section class="section section-gray">
        <div class="container">
            <div class="grid">
                <div>
                    <h3 class="section-subtitle"><?php esc_html_e( 'PLUS DE 6 CLUBS', 'cityclub' ); ?></h3>
                    <h2 class="section-title"><?php esc_html_e( 'CITÉ DES SPORTS', 'cityclub' ); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e( 'MÉGA CLUBS d\'une superficie allant jusqu\'à 6000m² ! Offrent toutes les activités, espaces Football, Basketball, MMA, en plus du CITYLADY exclusivement féminin.', 'cityclub' ); ?>
                    </p>
                    <a href="<?php echo esc_url( home_url( '/visite' ) ); ?>" class="btn">
                        <?php esc_html_e( 'PROGRAMMER UNE VISITE', 'cityclub' ); ?>
                    </a>
                </div>
                <div class="club-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cite-des-sports.jpg' ); ?>" alt="<?php esc_attr_e( 'Cité des Sports', 'cityclub' ); ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- City Club Network Section -->
    <section class="section">
        <div class="container">
            <div class="grid">
                <div class="club-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/city-club.jpg' ); ?>" alt="<?php esc_attr_e( 'City Club', 'cityclub' ); ?>">
                </div>
                <div>
                    <h3 class="section-subtitle"><?php esc_html_e( 'PLUS DE 42', 'cityclub' ); ?></h3>
                    <h2 class="section-title"><?php esc_html_e( 'CITY CLUB', 'cityclub' ); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e( 'Le club de fitness le plus connu au Maroc. Disposant de machines High-Tech, de coachs certifiés et ouvert dans plus de 10 villes au Maroc.', 'cityclub' ); ?>
                    </p>
                    <a href="<?php echo esc_url( home_url( '/visite' ) ); ?>" class="btn">
                        <?php esc_html_e( 'PROGRAMMER UNE VISITE', 'cityclub' ); ?>
                    </a>
                </div>
            </div>

            <div class="grid" style="margin-top: 80px;">
                <div>
                    <div class="location-finder">
                        <h3 class="location-finder-title">
                            <?php esc_html_e( 'VOUS RECHERCHEZ', 'cityclub' ); ?> <span><?php esc_html_e( 'UN CLUB ?', 'cityclub' ); ?></span>
                        </h3>
                        <div class="map-container">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/morocco-map.jpg' ); ?>" alt="<?php esc_attr_e( 'Morocco Map', 'cityclub' ); ?>">
                        </div>
                        <div class="stats">
                            <span>230,000</span> <?php esc_html_e( 'ADHÉRENTS AU MAROC', 'cityclub' ); ?>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="section-subtitle"><?php esc_html_e( 'UN RÉSEAU NATIONAL DE', 'cityclub' ); ?></h3>
                    <h2 class="section-title"><?php esc_html_e( 'PLUS DE 50 CLUBS', 'cityclub' ); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e( 'Avec une seule carte, accédez à un réseau national de plus de 50 clubs dans toutes les grandes villes du Royaume. Entraînez-vous là où vous êtes sans avoir à prendre d\'abonnement supplémentaire. Un luxe que SEULE City Club vous procure.', 'cityclub' ); ?>
                    </p>
                    <a href="<?php echo esc_url( home_url( '/visite' ) ); ?>" class="btn">
                        <?php esc_html_e( 'PROGRAMMER UNE VISITE', 'cityclub' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section class="activity-section">
        <!-- Aquagym Activity -->
        <div class="activity-block activity-blue">
            <div class="container">
                <div class="grid">
                    <div>
                        <h2 class="section-title"><?php esc_html_e( 'AQUAGYM', 'cityclub' ); ?></h2>
                        <p class="section-description">
                            <?php esc_html_e( 'L\'ACTIVITÉ PHYSIQUE AUX MULTIPLES BIENFAITS', 'cityclub' ); ?>
                        </p>
                        <a href="<?php echo esc_url( home_url( '/activites/aquagym' ) ); ?>" class="btn">
                            <?php esc_html_e( 'ESSAYER L\'ACTIVITÉ', 'cityclub' ); ?>
                        </a>
                    </div>
                    <div class="activity-image">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/aquagym.jpg' ); ?>" alt="<?php esc_attr_e( 'Aquagym', 'cityclub' ); ?>">
                        <div class="activity-overlay">
                            <h3 class="activity-name"><?php esc_html_e( 'AQUA STRETCH', 'cityclub' ); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Boxing Activity -->
        <div class="activity-block activity-red">
            <div class="container">
                <div class="grid">
                    <div>
                        <h2 class="section-title"><?php esc_html_e( 'BOXE & MMA', 'cityclub' ); ?></h2>
                        <p class="section-description">
                            <?php esc_html_e( 'COACHING - COURS COLLECTIFS - COURS INDIVIDUELS - APPRENTISSAGE', 'cityclub' ); ?>
                        </p>
                        <a href="<?php echo esc_url( home_url( '/activites/boxe-mma' ) ); ?>" class="btn">
                            <?php esc_html_e( 'ESSAYER L\'ACTIVITÉ', 'cityclub' ); ?>
                        </a>
                    </div>
                    <div class="activity-image">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/boxing.jpg' ); ?>" alt="<?php esc_attr_e( 'Boxing & MMA', 'cityclub' ); ?>">
                        <div class="activity-overlay">
                            <h3 class="activity-name"><?php esc_html_e( 'MMA', 'cityclub' ); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- More activities can be added here following the same pattern -->
    </section>

    <!-- Coaches Section -->
    <section class="section">
        <div class="container">
            <div class="grid">
                <div>
                    <h3 class="section-subtitle"><?php esc_html_e( 'PLUS DE 600', 'cityclub' ); ?></h3>
                    <h2 class="section-title"><?php esc_html_e( 'COACHS CERTIFIÉS', 'cityclub' ); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e( 'Nos coachs certifiés possèdent une expertise approfondie dans divers domaines du fitness et de la santé. Ils sont dédiés à fournir un entraînement personnalisé et efficace, adapté à vos objectifs personnels.', 'cityclub' ); ?>
                    </p>
                    
                    <div class="coach-features">
                        <div class="coach-feature">
                            <div class="feature-icon"><span>●</span></div>
                            <div class="feature-content">
                                <h4><?php esc_html_e( 'EXPERTISE VARIÉE', 'cityclub' ); ?></h4>
                                <p><?php esc_html_e( 'Nos coachs sont spécialisés dans différentes disciplines: musculation, cardio, yoga, pilates, et plus encore.', 'cityclub' ); ?></p>
                            </div>
                        </div>
                        
                        <div class="coach-feature">
                            <div class="feature-icon"><span>●</span></div>
                            <div class="feature-content">
                                <h4><?php esc_html_e( 'CERTIFICATIONS INTERNATIONALES', 'cityclub' ); ?></h4>
                                <p><?php esc_html_e( 'Tous nos coachs possèdent des certifications reconnues internationalement.', 'cityclub' ); ?></p>
                            </div>
                        </div>
                        
                        <div class="coach-feature">
                            <div class="feature-icon"><span>●</span></div>
                            <div class="feature-content">
                                <h4><?php esc_html_e( 'SUIVI PERSONNALISÉ', 'cityclub' ); ?></h4>
                                <p><?php esc_html_e( 'Bénéficiez d\'un programme d\'entraînement sur mesure et d\'un suivi régulier pour atteindre vos objectifs.', 'cityclub' ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/coach.jpg' ); ?>" alt="<?php esc_attr_e( 'Coach CityClub', 'cityclub' ); ?>" style="border-radius: 8px; margin-bottom: 30px;">
                    
                    <a href="<?php echo esc_url( home_url( '/coachs' ) ); ?>" class="btn">
                        <?php esc_html_e( 'DÉCOUVRIR NOS COACHS', 'cityclub' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();

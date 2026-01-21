<?php
/*
Template Name: Ville SEO Local
*/

/**
 * Template pour pages SEO locales
 * Exemple d'utilisation : /opticien-freelance-paris
 * 
 * Variables à configurer via Custom Fields ou directement dans la page :
 * - ville_nom : "Paris"
 * - ville_code : "75"
 * - ville_region : "Île-de-France"
 */

include 'header-inc.php';

// Get city data from post meta or page slug
global $post;
$ville_nom = get_post_meta($post->ID, 'ville_nom', true) ?: 'Paris';
$ville_code = get_post_meta($post->ID, 'ville_code', true) ?: '75';
$ville_region = get_post_meta($post->ID, 'ville_region', true) ?: 'Île-de-France';
$ville_nb_magasins = get_post_meta($post->ID, 'ville_nb_magasins', true) ?: '450+';
$ville_nb_opticiens = get_post_meta($post->ID, 'ville_nb_opticiens', true) ?: '2 300+';
$ville_taux_jour_min = get_post_meta($post->ID, 'ville_taux_jour_min', true) ?: '280';
$ville_taux_jour_max = get_post_meta($post->ID, 'ville_taux_jour_max', true) ?: '350';
?>

<!-- Hero Section -->
<section class="pt-32 pb-20 bg-gradient-to-br from-orange-50 via-white to-violet-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto">
            <!-- Breadcrumbs -->
            <nav class="text-sm text-gray-500 mb-6">
                <a href="<?php echo home_url('/'); ?>" class="hover:text-oblink-orange">Accueil</a>
                <span class="mx-2">→</span>
                <a href="<?php echo home_url('/emploi-opticien'); ?>" class="hover:text-oblink-orange">Emploi
                    Opticien</a>
                <span class="mx-2">→</span>
                <span class="text-oblink-gray font-semibold">
                    <?php echo esc_html($ville_nom); ?>
                </span>
            </nav>

            <!-- Main Title -->
            <h1 class="text-5xl md:text-6xl font-bold mb-6 font-display text-oblink-gray">
                Opticien Freelance à <span class="text-oblink-orange">
                    <?php echo esc_html($ville_nom); ?>
                </span>
            </h1>

            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                Trouvez des missions pour professionnels de l'optique à
                <?php echo esc_html($ville_nom); ?> et en
                <?php echo esc_html($ville_region); ?>.
                OBLINK connecte les opticiens, vendeurs, monteurs, audioprothésistes et tous les professionnels de
                l'optique aux meilleurs magasins de la région.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="<?php echo home_url('/inscription-opticien'); ?>"
                    class="px-8 py-4 bg-oblink-orange text-white rounded-lg font-bold hover:bg-oblink-orange/90 transition shadow-lg">
                    <i class="fas fa-user-plus mr-2"></i>Créer mon profil gratuit
                </a>
                <a href="<?php echo home_url('/emploi-opticien'); ?>"
                    class="px-8 py-4 bg-white text-oblink-gray border-2 border-gray-200 rounded-lg font-bold hover:border-oblink-orange transition">
                    <i class="fas fa-search mr-2"></i>Voir les missions
                </a>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                    <div class="text-3xl font-bold text-oblink-orange mb-2">
                        <?php echo esc_html($ville_nb_magasins); ?>
                    </div>
                    <div class="text-sm text-gray-600">Magasins d'optique</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                    <div class="text-3xl font-bold text-oblink-blue mb-2">
                        <?php echo esc_html($ville_nb_opticiens); ?>
                    </div>
                    <div class="text-sm text-gray-600">Professionnels actifs</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                    <div class="text-3xl font-bold text-oblink-violet mb-2">
                        <?php echo esc_html($ville_taux_jour_min); ?>-
                        <?php echo esc_html($ville_taux_jour_max); ?>€
                    </div>
                    <div class="text-sm text-gray-600">Taux journalier</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                    <div class="text-3xl font-bold text-green-600 mb-2">48h</div>
                    <div class="text-sm text-gray-600">Réponse moyenne</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Missions Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-oblink-gray mb-12 text-center font-display">
            🎯 Missions disponibles à
            <?php echo esc_html($ville_nom); ?>
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <!-- Mission Card 1 -->
            <div
                class="bg-gradient-to-br from-orange-50 to-white p-6 rounded-2xl border border-orange-100 hover:shadow-xl transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-oblink-orange/10 flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-oblink-orange text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-oblink-gray">Remplacements congés</h3>
                        <p class="text-sm text-gray-500">
                            <?php echo esc_html($ville_nom); ?> Centre
                        </p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mb-4">Missions été 2026, durée 2-4 semaines. Équipe sympathique,
                    quartier dynamique.</p>
                <div class="flex items-center justify-between">
                    <span class="text-oblink-orange font-bold">
                        <?php echo esc_html($ville_taux_jour_min); ?>€/jour
                    </span>
                    <a href="<?php echo home_url('/emploi-opticien'); ?>"
                        class="text-sm text-oblink-blue hover:underline">
                        Voir détails →
                    </a>
                </div>
            </div>

            <!-- Mission Card 2 -->
            <div
                class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-2xl border border-blue-100 hover:shadow-xl transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-oblink-blue/10 flex items-center justify-center">
                        <i class="fas fa-briefcase text-oblink-blue text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-oblink-gray">CDD 3-6 mois</h3>
                        <p class="text-sm text-gray-500">
                            <?php echo esc_html($ville_nom); ?>
                            <?php echo esc_html($ville_code); ?>
                        </p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mb-4">Magasin premium, clientèle haut de gamme. Verres Essilor,
                    lentilles CooperVision.</p>
                <div class="flex items-center justify-between">
                    <span class="text-oblink-blue font-bold">
                        <?php echo esc_html($ville_taux_jour_max); ?>€/jour
                    </span>
                    <a href="<?php echo home_url('/emploi-opticien'); ?>"
                        class="text-sm text-oblink-blue hover:underline">
                        Voir détails →
                    </a>
                </div>
            </div>

            <!-- Mission Card 3 -->
            <div
                class="bg-gradient-to-br from-violet-50 to-white p-6 rounded-2xl border border-violet-100 hover:shadow-xl transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-oblink-violet/10 flex items-center justify-center">
                        <i class="fas fa-clock text-oblink-violet text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-oblink-gray">Missions week-end</h3>
                        <p class="text-sm text-gray-500">Plusieurs arrondissements</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mb-4">Samedi et/ou dimanche. Idéal complément activité. Flexibilité
                    horaire.</p>
                <div class="flex items-center justify-between">
                    <span class="text-oblink-violet font-bold">300€/jour</span>
                    <a href="<?php echo home_url('/emploi-opticien'); ?>"
                        class="text-sm text-oblink-blue hover:underline">
                        Voir détails →
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="<?php echo home_url('/emploi-opticien'); ?>"
                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-oblink-orange to-oblink-violet text-white rounded-xl font-bold hover:shadow-xl transition">
                <i class="fas fa-search mr-2"></i>
                Voir toutes les missions à
                <?php echo esc_html($ville_nom); ?>
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Marché Local Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-oblink-gray mb-6 font-display">
                    📊 Marché de l'optique à
                    <?php echo esc_html($ville_nom); ?>
                </h2>

                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 rounded-full bg-oblink-orange/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-store text-oblink-orange text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-2">
                                <?php echo esc_html($ville_nb_magasins); ?> magasins d'optique
                            </h3>
                            <p class="text-gray-600">Grande concentration de magasins indépendants et enseignes
                                nationales. Forte demande de professionnels qualifiés.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 rounded-full bg-oblink-blue/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-users text-oblink-blue text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-2">
                                <?php echo esc_html($ville_nb_opticiens); ?> opticiens en
                                <?php echo esc_html($ville_region); ?>
                            </h3>
                            <p class="text-gray-600">Marché dynamique avec de nombreuses opportunités pour opticiens
                                freelances et indépendants.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-euro-sign text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-2">Taux journalier moyen :
                                <?php echo esc_html($ville_taux_jour_min); ?>-
                                <?php echo esc_html($ville_taux_jour_max); ?>€/jour
                            </h3>
                            <p class="text-gray-600">Rémunération attractive, parmi les plus élevées de France. Nombreux
                                quartiers premium.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                <h3 class="text-2xl font-bold text-oblink-gray mb-6">Secteurs recherchés</h3>
                <div class="grid grid-cols-2 gap-4">
                    <?php
                    // Quartiers populaires par défaut (peut être personnalisé par ville)
                    $quartiers = ['Centre', 'Nord', 'Sud', 'Est', 'Ouest', 'Périphérie'];
                    foreach ($quartiers as $quartier):
                        ?>
                        <div class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-map-marker-alt text-oblink-orange"></i>
                            <span class="font-semibold">
                                <?php echo esc_html($ville_nom); ?>
                                <?php echo esc_html($quartier); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="text-sm text-gray-500 mt-6">+ Banlieue proche et département
                    <?php echo esc_html($ville_code); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Pourquoi OBLINK Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-oblink-gray mb-12 text-center font-display">
            💼 Pourquoi choisir OBLINK à
            <?php echo esc_html($ville_nom); ?> ?
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gradient-to-br from-orange-50 to-white p-6 rounded-2xl border border-orange-100 text-center">
                <div class="w-16 h-16 rounded-full bg-oblink-orange/10 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-building text-oblink-orange text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Meilleures enseignes</h3>
                <p class="text-gray-600 text-sm">Accès aux magasins premium de
                    <?php echo esc_html($ville_nom); ?>
                </p>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-2xl border border-blue-100 text-center">
                <div class="w-16 h-16 rounded-full bg-oblink-blue/10 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map-marked-alt text-oblink-blue text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Tous arrondissements</h3>
                <p class="text-gray-600 text-sm">Missions dans toute la ville et périphérie</p>
            </div>

            <div class="bg-gradient-to-br from-violet-50 to-white p-6 rounded-2xl border border-violet-100 text-center">
                <div class="w-16 h-16 rounded-full bg-oblink-violet/10 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-handshake text-oblink-violet text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Accompagnement local</h3>
                <p class="text-gray-600 text-sm">Support transport & hébergement si besoin</p>
            </div>

            <div class="bg-gradient-to-br from-green-50 to-white p-6 rounded-2xl border border-green-100 text-center">
                <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bolt text-green-600 text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Paiement rapide</h3>
                <p class="text-gray-600 text-sm">Règlement sous 48h après mission</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-24 bg-gradient-to-br from-oblink-gray via-gray-800 to-gray-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-oblink-orange rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-oblink-violet rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-bold mb-6 font-display">
            Prêt à trouver votre prochaine mission à
            <?php echo esc_html($ville_nom); ?> ?
        </h2>
        <p class="text-xl text-gray-300 mb-10">
            Rejoignez +500 professionnels de l'optique qui font confiance à OBLINK pour trouver les meilleures
            opportunités.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo home_url('/inscription-opticien'); ?>"
                class="px-8 py-4 bg-oblink-orange text-white rounded-lg font-bold hover:bg-oblink-orange/90 transition shadow-lg">
                <i class="fas fa-user-plus mr-2"></i>Créer mon profil gratuit
            </a>
            <a href="<?php echo home_url('/emploi-opticien'); ?>"
                class="px-8 py-4 bg-white text-oblink-gray rounded-lg font-bold hover:bg-gray-100 transition">
                <i class="fas fa-search mr-2"></i>Parcourir les missions
            </a>
        </div>

        <p class="text-gray-400 text-sm mt-8">
            <i class="fas fa-lock mr-1"></i> Inscription 100% gratuite • Sans engagement • Validation en 48h
        </p>
    </div>
</section>

<?php include get_template_directory() . "/footer-content.php"; ?>
<?php wp_footer(); ?>
</body>

</html>
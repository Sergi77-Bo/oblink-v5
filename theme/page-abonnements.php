<?php
/*
Template Name: Page Abonnements
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold font-display text-oblink-gray mb-6">
                Des tarifs simples et <span class="text-oblink-blue">transparents</span>
            </h1>
            <p class="text-xl text-gray-500 max-w-3xl mx-auto">
                Choisissez la formule adaptée à votre besoin de recrutement. Sans engagement,
                annulable à tout moment.
            </p>
        </div>

        <!-- Pricing Cards -->
        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">

            <!-- Plan Découverte -->
            <div
                class="bg-white rounded-3xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition hover:-translate-y-1 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gray-50 rounded-bl-full -mr-16 -mt-16 z-0"></div>

                <h3 class="text-2xl font-bold text-oblink-gray mb-2 relative z-10">Découverte</h3>
                <p class="text-gray-400 text-sm mb-6 relative z-10">Pour tester la plateforme.</p>

                <div class="flex items-baseline mb-8 relative z-10">
                    <span class="text-5xl font-black text-oblink-gray">0€</span>
                </div>

                <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                    class="block w-full py-3 bg-gray-100 text-oblink-gray font-bold text-center rounded-xl hover:bg-gray-200 transition mb-8">
                    Commencer
                </a>

                <ul class="space-y-4 text-sm text-gray-600 relative z-10">
                    <li class="flex items-center gap-3">
                        <i class="fas fa-check text-green-500"></i>
                        <span>1 Offre d'emploi active</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Visibilité standard</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Commission standard (15%)</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-400">
                        <i class="fas fa-times"></i>
                        <span class="line-through">Accès CV-thèque</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-400">
                        <i class="fas fa-times"></i>
                        <span class="line-through">Support prioritaire</span>
                    </li>
                </ul>
            </div>

            <!-- Plan Premium (Featured) -->
            <div
                class="bg-oblink-gray text-white rounded-3xl p-8 border border-oblink-gray shadow-2xl relative transform md:scale-110 z-10">
                <div
                    class="absolute top-0 right-0 bg-oblink-orange text-white text-xs font-bold px-3 py-1 rounded-bl-xl uppercase tracking-wider">
                    Populaire</div>

                <h3 class="text-2xl font-bold mb-2">Premium</h3>
                <p class="text-white/60 text-sm mb-6">Pour les recrutements réguliers.</p>

                <div class="flex items-baseline mb-8">
                    <span class="text-6xl font-black text-white">49€</span>
                    <span class="text-white/60 ml-2">/mois</span>
                </div>

                <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                    class="block w-full py-4 bg-gradient-to-r from-oblink-blue to-oblink-violet text-white font-bold text-center rounded-xl hover:shadow-lg transition hover:scale-105 mb-8">
                    Choisir Premium
                </a>

                <ul class="space-y-4 text-sm text-gray-300">
                    <li class="flex items-center gap-3">
                        <div class="w-6 h-6 rounded-full bg-oblink-blue flex items-center justify-center text-xs"><i
                                class="fas fa-check text-white"></i></div>
                        <span class="font-bold text-white">Offres Illimitées</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="w-6 h-6 rounded-full bg-oblink-blue flex items-center justify-center text-xs"><i
                                class="fas fa-check text-white"></i></div>
                        <span class="font-bold text-white">Accès complet CV-thèque</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="w-6 h-6 rounded-full bg-oblink-blue flex items-center justify-center text-xs"><i
                                class="fas fa-check text-white"></i></div>
                        <span>Commission réduite (10%)</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="w-6 h-6 rounded-full bg-oblink-blue flex items-center justify-center text-xs"><i
                                class="fas fa-check text-white"></i></div>
                        <span>Badge "Recruteur Vérifié"</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="w-6 h-6 rounded-full bg-oblink-blue flex items-center justify-center text-xs"><i
                                class="fas fa-check text-white"></i></div>
                        <span>Support dédié 7j/7</span>
                    </li>
                </ul>
            </div>

            <!-- Plan Corporate -->
            <div
                class="bg-white rounded-3xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition hover:-translate-y-1 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-32 h-32 bg-oblink-blue/5 rounded-br-full -ml-16 -mt-16 z-0"></div>

                <h3 class="text-2xl font-bold text-oblink-gray mb-2 relative z-10">Corporate</h3>
                <p class="text-gray-400 text-sm mb-6 relative z-10">Pour les réseaux > 5 magasins.</p>

                <div class="flex items-baseline mb-8 relative z-10">
                    <span class="text-4xl font-black text-oblink-gray">Sur Mesure</span>
                </div>

                <a href="<?php echo home_url('/contact'); ?>"
                    class="block w-full py-3 bg-white border-2 border-oblink-gray text-oblink-gray font-bold text-center rounded-xl hover:bg-oblink-gray hover:text-white transition mb-8">
                    Contactez-nous
                </a>

                <ul class="space-y-4 text-sm text-gray-600 relative z-10">
                    <li class="flex items-center gap-3">
                        <i class="fas fa-check text-oblink-blue"></i>
                        <span>Compte Multi-utilisateurs</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-check text-oblink-blue"></i>
                        <span>Facturation centralisée</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-check text-oblink-blue"></i>
                        <span>API de connexion RH</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-check text-oblink-blue"></i>
                        <span>Account Manager dédié</span>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</div>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>
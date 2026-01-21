<?php
/*
Template Name: Pour Entreprises
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-white">

    <!-- Hero Section -->
    <div class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="text-center max-w-4xl mx-auto">
            <span
                class="inline-block py-1 px-3 rounded-full bg-oblink-blue/10 text-oblink-blue font-bold text-sm mb-6 uppercase tracking-wider">
                Pour les Magasins & Enseignes
            </span>
            <h1 class="text-5xl md:text-7xl font-black font-display text-oblink-gray mb-8 leading-tight">
                Recrutez un opticien <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-oblink-blue to-oblink-violet">en 24
                    heures.</span>
            </h1>
            <p class="text-xl text-gray-500 mb-10 max-w-2xl mx-auto font-light leading-relaxed">
                Accédez à la plus grande base de freelances qualifiés et disponibles immédiatement. Fini les fermetures
                de magasin par manque de personnel.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                    class="px-8 py-4 bg-oblink-blue text-white font-bold rounded-xl shadow-lg hover:shadow-blue-500/30 hover:-translate-y-1 transition text-lg">
                    Publier une mission
                </a>
                <a href="<?php echo home_url('/recherche-opticiens'); ?>"
                    class="px-8 py-4 bg-gray-100 text-oblink-gray font-bold rounded-xl hover:bg-gray-200 transition text-lg flex items-center justify-center gap-2">
                    <i class="fas fa-search text-oblink-blue"></i> Consulter les CVs
                </a>
            </div>
        </div>
    </div>

    <!-- Benefits Grid -->
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <!-- Card 1 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition hover:-translate-y-1">
                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-oblink-blue text-2xl mb-6">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="text-xl font-bold text-oblink-gray mb-3 font-display">Réactivité Immédiate</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Un arrêt maladie imprévu ? Trouvez un remplaçant opérationnel pour le lendemain matin. Nos
                        freelances sont notifiés en temps réel.
                    </p>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition hover:-translate-y-1">
                    <div
                        class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-oblink-violet text-2xl mb-6">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h3 class="text-xl font-bold text-oblink-gray mb-3 font-display">Profils Vérifiés</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Diplômes et identité contrôlés. Vous recrutez des professionnels de confiance, évalués par la
                        communauté.
                    </p>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition hover:-translate-y-1">
                    <div
                        class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-green-600 text-2xl mb-6">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <h3 class="text-xl font-bold text-oblink-gray mb-3 font-display">Juridique Sécurisé</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Générez un contrat de prestation blindé en un clic. Évitez les risques de requalification grâce
                        à nos outils conformes.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="py-20 px-4">
        <div
            class="max-w-5xl mx-auto bg-gray-900 rounded-3xl p-8 md:p-16 text-center transform hover:scale-[1.01] transition duration-500 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full opacity-20">
                <div class="absolute right-0 top-0 w-64 h-64 bg-oblink-blue rounded-full blur-3xl"></div>
                <div class="absolute left-0 bottom-0 w-64 h-64 bg-oblink-violet rounded-full blur-3xl"></div>
            </div>

            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-black font-display text-white mb-6">
                    Ne perdez plus de chiffre d'affaires.
                </h2>
                <p class="text-xl text-gray-400 mb-10 max-w-2xl mx-auto font-light">
                    Le coût d'un magasin fermé une journée est de 1500€. Un freelance vous coûte 3x moins cher.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                        class="px-8 py-4 bg-white text-oblink-gray font-bold rounded-xl shadow-lg hover:bg-gray-100 transition text-lg">
                        Créer un compte Magasin
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include get_template_directory() . "/footer-content.php"; wp_footer(); ?>
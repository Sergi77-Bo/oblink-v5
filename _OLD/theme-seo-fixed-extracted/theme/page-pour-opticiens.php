<?php
/*
Template Name: Pour Opticiens
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-white">

    <!-- Hero Section -->
    <div class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="text-center max-w-4xl mx-auto">
            <span
                class="inline-block py-1 px-3 rounded-full bg-oblink-orange/10 text-oblink-orange font-bold text-sm mb-6 uppercase tracking-wider">
                Pour les Opticiens & optométristes
            </span>
            <h1 class="text-5xl md:text-7xl font-black font-display text-oblink-gray mb-8 leading-tight">
                Votre carrière, <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-oblink-orange to-oblink-violet">vos
                    règles.</span>
            </h1>
            <p class="text-xl text-gray-500 mb-10 max-w-2xl mx-auto font-light leading-relaxed">
                Reprenez le contrôle de votre temps et de vos revenus. Devenez freelance et doublez votre salaire en
                choisissant vos missions.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="<?php echo home_url('/inscription-opticien'); ?>"
                    class="px-8 py-4 bg-oblink-orange text-white font-bold rounded-xl shadow-lg hover:shadow-orange-500/30 hover:-translate-y-1 transition text-lg">
                    Devenir Freelance
                </a>
                <a href="<?php echo home_url('/simulateur'); ?>"
                    class="px-8 py-4 bg-gray-100 text-oblink-gray font-bold rounded-xl hover:bg-gray-200 transition text-lg flex items-center justify-center gap-2">
                    <i class="fas fa-calculator text-oblink-orange"></i> Simuler mes revenus
                </a>
            </div>
        </div>
    </div>

    <!-- Key Stats Section (Social Proof) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 bg-oblink-gray text-white p-8 rounded-3xl shadow-2xl">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-black text-oblink-orange mb-1">380+</div>
                <div class="text-sm opacity-70 uppercase tracking-widest">Missions Dispo</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-black text-white mb-1">450€</div>
                <div class="text-sm opacity-70 uppercase tracking-widest">TJM Moyen</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-black text-oblink-violet mb-1">1200</div>
                <div class="text-sm opacity-70 uppercase tracking-widest">Certifications</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-black text-oblink-blue mb-1">48h</div>
                <div class="text-sm opacity-70 uppercase tracking-widest">Délai placement</div>
            </div>
        </div>
    </div>

    <!-- Academy Boost Message -->
    <div class="max-w-4xl mx-auto px-4 mb-20">
        <div
            class="bg-gradient-to-r from-oblink-violet/10 to-oblink-blue/10 border border-oblink-violet/20 rounded-2xl p-6 flex flex-col md:flex-row items-center gap-6">
            <div
                class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl shadow-sm flex-shrink-0 text-oblink-violet">
                <i class="fas fa-rocket"></i>
            </div>
            <div class="flex-1 text-center md:text-left">
                <h3 class="font-bold text-lg text-oblink-gray mb-1">Augmentez votre valeur</h3>
                <p class="text-gray-600 text-sm">Un profil certifié OBLINK (Expert Cosium) gagne <strong>15% de
                        plus</strong>. Testez vos compétences gratuitement.</p>
            </div>
            <a href="<?php echo home_url('/formation-erp'); ?>"
                class="px-6 py-3 bg-white text-oblink-violet font-bold rounded-xl shadow-sm hover:shadow-md transition text-sm whitespace-nowrap">
                Passer la certification <i class="fas fa-arrow-right ml-2"></i>
            </a>
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
                        class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center text-oblink-orange text-2xl mb-6">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-oblink-gray mb-3 font-display">Liberté Totale</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Choisissez vos jours, vos horaires et vos zones géographiques. Vous êtes seul maître de votre
                        emploi du temps.
                    </p>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition hover:-translate-y-1">
                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-oblink-blue text-2xl mb-6">
                        <i class="fas fa-euro-sign"></i>
                    </div>
                    <h3 class="text-xl font-bold text-oblink-gray mb-3 font-display">Revenus Boostés & <span
                            class="text-oblink-orange">0% de Commission</span></h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Fixez votre TJM sans intermédiaire. Contrairement aux agences d'intérim, <strong>OBLINK ne prend
                            aucune commission sur vos missions.</strong>
                        <br><br>
                        Ce que vous négociez est ce que vous touchez : <strong>100% de la somme va dans votre
                            poche.</strong>
                    </p>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition hover:-translate-y-1">
                    <div
                        class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-oblink-violet text-2xl mb-6">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-oblink-gray mb-3 font-display">Zéro Administratif</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Contrats, factures, relances... OBLINK gère tout pour vous avec son <a
                            href="<?php echo home_url('/generateur-contrat'); ?>"
                            class="text-oblink-blue underline">outil dédié</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profils Recherchés Section -->
    <div class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black font-display text-oblink-gray mb-6">
                    Tous les profils de l'optique
                </h2>
                <p class="text-xl text-gray-500 max-w-3xl mx-auto">
                    Notre plateforme accueille <strong>tous les professionnels</strong> du secteur optique,
                    quel que soit votre métier ou votre statut.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Colonne 1: En Magasin -->
                <div class="bg-orange-50 rounded-2xl p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-oblink-orange rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-store"></i>
                        </div>
                        <h3 class="text-xl font-bold text-oblink-gray">En Magasin</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li><i class="fas fa-check text-oblink-orange mr-2"></i>Opticien collaborateur</li>
                        <li><i class="fas fa-check text-oblink-orange mr-2"></i>Opticien remplaçant</li>
                        <li><i class="fas fa-check text-oblink-orange mr-2"></i>Opticien en alternance</li>
                        <li><i class="fas fa-check text-oblink-orange mr-2"></i>Vendeur optique</li>
                        <li><i class="fas fa-check text-oblink-orange mr-2"></i>Monteur-vendeur</li>
                        <li><i class="fas fa-check text-oblink-orange mr-2"></i>Conseiller solaires</li>
                        <li><i class="fas fa-check text-oblink-orange mr-2"></i>Audioprothésiste</li>
                        <li><i class="fas fa-check text-oblink-orange mr-2"></i>Assistant audioprothésiste</li>
                        <li><i class="fas fa-check text-oblink-orange mr-2"></i>Adaptateur lentilles</li>
                    </ul>
                </div>

                <!-- Colonne 2: Nomades / Terrain -->
                <div class="bg-blue-50 rounded-2xl p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-oblink-blue rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-road"></i>
                        </div>
                        <h3 class="text-xl font-bold text-oblink-gray">Nomades</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li><i class="fas fa-check text-oblink-blue mr-2"></i>Opticien à domicile</li>
                        <li><i class="fas fa-check text-oblink-blue mr-2"></i>Agent VRP</li>
                        <li><i class="fas fa-check text-oblink-blue mr-2"></i>Commercial secteur</li>
                        <li><i class="fas fa-check text-oblink-blue mr-2"></i>Animateur réseau</li>
                        <li><i class="fas fa-check text-oblink-blue mr-2"></i>Responsable de secteur</li>
                    </ul>
                </div>

                <!-- Colonne 3: Experts / Management -->
                <div class="bg-purple-50 rounded-2xl p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-oblink-violet rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="text-xl font-bold text-oblink-gray">Experts</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li><i class="fas fa-check text-oblink-violet mr-2"></i>Opticien directeur</li>
                        <li><i class="fas fa-check text-oblink-violet mr-2"></i>Responsable technique</li>
                        <li><i class="fas fa-check text-oblink-violet mr-2"></i>Optométriste</li>
                        <li><i class="fas fa-check text-oblink-violet mr-2"></i>Opticien tiers payant</li>
                        <li><i class="fas fa-check text-oblink-violet mr-2"></i>Directeur des ventes</li>
                        <li><i class="fas fa-check text-oblink-violet mr-2"></i>Chef de produits</li>
                    </ul>
                </div>

                <!-- Colonne 4: Autres Professions -->
                <div class="bg-gray-100 rounded-2xl p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-oblink-gray rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                        <h3 class="text-xl font-bold text-oblink-gray">Autres</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li><i class="fas fa-check text-oblink-gray mr-2"></i>Orthoptiste</li>
                        <li><i class="fas fa-check text-oblink-gray mr-2"></i>AMO (Assistant médical)</li>
                        <li><i class="fas fa-check text-oblink-gray mr-2"></i>Enseignant optique</li>
                        <li><i class="fas fa-check text-oblink-gray mr-2"></i>... et bien d'autres !</li>
                    </ul>
                </div>
            </div>

            <div class="text-center mt-12">
                <p class="text-gray-500 text-lg">
                    Vous ne trouvez pas votre profil ? <a href="<?php echo home_url('/inscription-opticien'); ?>"
                        class="text-oblink-orange font-bold hover:underline">Inscrivez-vous quand même !</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="py-20 px-4">
        <div
            class="max-w-5xl mx-auto bg-oblink-gray rounded-3xl p-8 md:p-16 text-center transform hover:scale-[1.01] transition duration-500 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full opacity-10">
                <div class="absolute right-0 top-0 w-64 h-64 bg-oblink-orange rounded-full blur-3xl"></div>
                <div class="absolute left-0 bottom-0 w-64 h-64 bg-oblink-blue rounded-full blur-3xl"></div>
            </div>

            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-black font-display text-white mb-6">
                    Prêt à changer de vie ?
                </h2>
                <p class="text-xl text-gray-400 mb-10 max-w-2xl mx-auto font-light">
                    Rejoignez les 500+ opticiens qui ont déjà franchi le pas. Lancez-vous sans risque.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="<?php echo home_url('/inscription-opticien'); ?>"
                        class="px-8 py-4 bg-gradient-to-r from-oblink-orange to-oblink-violet text-white font-bold rounded-xl shadow-lg hover:shadow-orange-500/30 hover:-translate-y-1 transition text-lg">
                        Créer mon compte Freelance
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- GLOBAL HARDCODED FOOTER REUSE -->
<div class="footer-wrapper">
    <?php include get_template_directory() . '/footer-content.php'; ?>
</div>
<?php wp_footer(); ?>
</body>

</html>
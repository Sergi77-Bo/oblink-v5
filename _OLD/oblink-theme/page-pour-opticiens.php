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
                    <h3 class="text-xl font-bold text-oblink-gray mb-3 font-display">Revenus Boostés</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Fixez votre TJM (Taux Journalier) sans intermédiaire. En moyenne, nos freelances gagnent 30% de
                        plus qu'en salariat.
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
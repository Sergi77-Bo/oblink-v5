<?php
/*
Template Name: Observatoire
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-gray-50 pt-24 pb-12">

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="text-center max-w-3xl mx-auto">
            <span class="text-oblink-orange font-bold tracking-wider uppercase text-sm mb-2 block">Market
                Intelligence</span>
            <h1 class="text-4xl md:text-5xl font-bold font-display text-oblink-gray mb-6">Baromètre du Marché <span
                    class="text-oblink-blue">2026</span></h1>
            <p class="text-xl text-gray-500 mb-8">Les chiffres clés de l'optique pour négocier vos tarifs et choisir vos
                missions. Données mises à jour mensuellement.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#tjm"
                    class="px-6 py-3 bg-white text-oblink-gray font-bold rounded-xl border border-gray-200 hover:border-oblink-blue hover:text-oblink-blue transition">
                    <i class="fas fa-chart-line mr-2"></i>Voir les TJM
                </a>
                <a href="#roi"
                    class="px-6 py-3 bg-oblink-blue text-white font-bold rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                    <i class="fas fa-calculator mr-2"></i>Calculateur ROI
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- TJM Section -->
        <div id="tjm" class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- PRIX MOYEN -->
            <div
                class="bg-white rounded-3xl p-8 shadow-lg shadow-gray-200/50 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-6 opacity-10">
                    <i class="fas fa-euro-sign text-8xl text-oblink-orange"></i>
                </div>
                <h2 class="text-2xl font-bold font-display text-oblink-gray mb-6">Taux Journalier Moyen (TJM)</h2>

                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-bold text-gray-600">Île-de-France</span>
                            <span class="font-bold text-oblink-orange">380 € / jour</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3">
                            <div class="bg-oblink-orange h-3 rounded-full" style="width: 85%"></div>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Varie de 350€ à 450€ selon urgence</p>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-bold text-gray-600">Province (Grandes Villes)</span>
                            <span class="font-bold text-oblink-blue">320 € / jour</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3">
                            <div class="bg-oblink-blue h-3 rounded-full" style="width: 70%"></div>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Lyon, Bordeaux, Nantes... (+ Frais souvent inclus)</p>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-bold text-gray-600">Zones Rurales</span>
                            <span class="font-bold text-oblink-violet">400 € / jour</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3">
                            <div class="bg-oblink-violet h-3 rounded-full" style="width: 90%"></div>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Prime à la mobilité forte</p>
                    </div>
                </div>
            </div>

            <!-- LOGICIELS -->
            <div class="bg-white rounded-3xl p-8 shadow-lg shadow-gray-200/50 border border-gray-100">
                <h2 class="text-2xl font-bold font-display text-oblink-gray mb-6">Logiciels les plus demandés</h2>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-16 text-right font-bold text-gray-400">60%</div>
                        <div
                            class="flex-1 bg-gray-100 rounded-r-xl h-10 flex items-center px-4 relative overflow-hidden group">
                            <div
                                class="absolute left-0 top-0 bottom-0 bg-oblink-gray/10 w-[60%] group-hover:bg-oblink-gray/20 transition">
                            </div>
                            <span class="relative z-10 font-bold text-oblink-gray">Cosium</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-16 text-right font-bold text-gray-400">25%</div>
                        <div
                            class="flex-1 bg-gray-100 rounded-r-xl h-10 flex items-center px-4 relative overflow-hidden group">
                            <div
                                class="absolute left-0 top-0 bottom-0 bg-oblink-blue/10 w-[25%] group-hover:bg-oblink-blue/20 transition">
                            </div>
                            <span class="relative z-10 font-bold text-oblink-gray">Montéeristo</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-16 text-right font-bold text-gray-400">10%</div>
                        <div
                            class="flex-1 bg-gray-100 rounded-r-xl h-10 flex items-center px-4 relative overflow-hidden group">
                            <div
                                class="absolute left-0 top-0 bottom-0 bg-oblink-orange/10 w-[10%] group-hover:bg-oblink-orange/20 transition">
                            </div>
                            <span class="relative z-10 font-bold text-oblink-gray">WinOptics</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-16 text-right font-bold text-gray-400">5%</div>
                        <div
                            class="flex-1 bg-gray-100 rounded-r-xl h-10 flex items-center px-4 relative overflow-hidden group">
                            <div
                                class="absolute left-0 top-0 bottom-0 bg-gray-200 w-[5%] group-hover:bg-gray-300 transition">
                            </div>
                            <span class="relative z-10 font-bold text-oblink-gray">Autres</span>
                        </div>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-blue-50 rounded-xl border border-blue-100 flex gap-3 text-sm text-blue-800">
                    <i class="fas fa-lightbulb mt-1"></i>
                    <p><strong>Conseil :</strong> Formez-vous à Cosium pour accéder à 6 missions sur 10. <a
                            href="<?php echo home_url('/formation-erp'); ?>" class="underline font-bold">Voir la
                            formation.</a></p>
                </div>
            </div>
        </div>

        <!-- ROI Calculator -->
        <div id="roi"
            class="bg-oblink-gray text-white rounded-3xl p-8 lg:p-12 shadow-2xl mb-12 relative overflow-hidden">
            <div
                class="absolute top-0 right-0 w-96 h-96 bg-oblink-orange/20 rounded-full blur-[100px] pointer-events-none">
            </div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold font-display mb-4">Salarié vs Freelance ?</h2>
                    <p class="text-gray-400 mb-8">Ne comparez pas des pommes et des poires. Calculez votre "Liberté
                        Financière" en comparant votre salaire net actuel avec le potentiel freelance.</p>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-400 mb-2">Votre Salaire Net Mensuel
                                (CDI)</label>
                            <div class="relative">
                                <input type="number" id="roi-salary" value="2200"
                                    class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-white font-bold focus:outline-none focus:border-oblink-orange transition">
                                <span class="absolute right-4 top-3 text-gray-400">€</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-400 mb-2">Votre TJM Estimé
                                (Freelance)</label>
                            <div class="relative">
                                <input type="number" id="roi-tjm" value="350"
                                    class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-white font-bold focus:outline-none focus:border-oblink-blue transition">
                                <span class="absolute right-4 top-3 text-gray-400">€</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 text-center">
                    <p class="text-lg font-medium text-gray-300 mb-2">Pour gagner la même chose, vous devez travailler :
                    </p>
                    <div class="flex items-center justify-center gap-2 mb-4">
                        <span id="roi-days" class="text-6xl font-black text-oblink-orange">6.3</span>
                        <span class="text-xl text-left leading-tight font-bold text-gray-400">Jours<br>par mois</span>
                    </div>
                    <p class="text-sm text-gray-400 mb-6">Soit <span class="text-white font-bold"
                            id="roi-rest">15</span> jours de temps libre en plus (ou de gain supplémentaire).</p>

                    <button onclick="window.location.href='<?php echo home_url('/inscription-opticien'); ?>'"
                        class="w-full py-3 bg-white text-oblink-gray font-bold rounded-xl hover:bg-oblink-orange hover:text-white transition">
                        Devenir Freelance
                    </button>
                </div>
            </div>
        </div>

        <!-- Lead Magnet -->
        <div class="bg-gradient-to-r from-oblink-blue to-blue-600 rounded-3xl p-8 lg:p-12 text-white text-center">
            <div class="max-w-2xl mx-auto">
                <i class="fas fa-file-pdf text-4xl mb-4 text-blue-200"></i>
                <h2 class="text-3xl font-bold font-display mb-4">Téléchargez l'Étude Complète 2026</h2>
                <p class="text-blue-100 mb-8">Accédez aux détails par région, aux grilles de salaires détaillées et aux
                    prévisions de recrutement des grandes enseignes.</p>

                <form onsubmit="event.preventDefault(); alert('L\'étude vous a été envoyée par email !');"
                    class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <input type="email" placeholder="Votre email pro" required
                        class="flex-1 px-4 py-3 rounded-xl text-gray-800 focus:outline-none focus:ring-4 focus:ring-white/30">
                    <button type="submit"
                        class="px-6 py-3 bg-oblink-orange font-bold rounded-xl hover:bg-orange-500 transition shadow-lg">
                        Recevoir le PDF
                    </button>
                </form>
                <p class="text-xs text-blue-200 mt-4"><i class="fas fa-lock mr-1"></i> Vos données restent
                    confidentielles.</p>
            </div>
        </div>

    </div>
</div>

<script>
    // Simple ROI Logic
    const salaryInput = document.getElementById('roi-salary');
    const tjmInput = document.getElementById('roi-tjm');
    const daysDisplay = document.getElementById('roi-days');
    const restDisplay = document.getElementById('roi-rest');

    function calculateROI() {
        const salary = parseFloat(salaryInput.value) || 0;
        const tjm = parseFloat(tjmInput.value) || 1;

        // Calcul simpliste : Salaire Net / (TJM * 0.76 pour approx charges micro-social/frais) 
        // Ou brut pour brut. 
        // Pour simplifier l'argumentaire freelance : on va dire que le TJM affiché est ce qui rentre avant impôt, 
        // et le salaire est net. Un Raccourci marketing assumé pour l'instant, ou on compare Brut vs CA.
        // LE PLUS PARLANT : Combien de jours de facturation pour égaler le salaire NET ?
        // Hypothèse : 25% charges URSSAF en micro. Donc Net = TJM * 0.75.

        const netPerDay = tjm * 0.75;
        const daysNeeded = salary / netPerDay;
        const workingDaysInMonth = 21; // Approx

        daysDisplay.innerText = daysNeeded.toFixed(1);

        const rest = workingDaysInMonth - daysNeeded;
        restDisplay.innerText = rest > 0 ? rest.toFixed(1) : 0;
    }

    salaryInput.addEventListener('input', calculateROI);
    tjmInput.addEventListener('input', calculateROI);

    // Init
    calculateROI();
</script>

<?php
include get_template_directory() . "/footer-content.php";
wp_footer();
?>
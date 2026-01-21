<?php
/*
Template Name: Page Simulateur v3 - Advanced
*/
include 'header-inc.php';
require_once get_template_directory() . '/inc/simulator-email.php';
?>


<!-- Simulator Hero -->
<div
    class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-oblink-orange/5 to-transparent skew-x-12 transform pointer-events-none">
</div>
<div class="absolute bottom-0 left-0 w-64 h-64 bg-oblink-violet/5 rounded-full filter blur-3xl pointer-events-none">
</div>

<div class="max-w-6xl mx-auto px-4 relative z-10">

    <!-- Header Section -->
    <div class="text-center mb-12">
        <span
            class="inline-block py-1 px-3 rounded-full bg-oblink-orange/10 text-oblink-orange font-bold text-sm mb-4 uppercase tracking-wider">
            Simulateur Opticien
        </span>
        <h1 class="text-4xl md:text-6xl font-black font-display text-oblink-gray mb-6">
            Calculez votre <span
                class="bg-gradient-to-r from-oblink-orange to-oblink-violet bg-clip-text text-transparent">net
                réel</span>
        </h1>
        <p class="text-xl text-oblink-gray/70 max-w-2xl mx-auto font-body">
            Mission freelance ou salaire en contrat : découvrez combien vous toucherez réellement.
        </p>
    </div>

    <!-- Mode Toggle -->
    <div class="flex justify-center mb-8">
        <div class="inline-flex rounded-xl bg-white p-1 shadow-lg border border-gray-100">
            <button id="mode-freelance" class="mode-toggle-btn active px-6 py-3 rounded-lg font-bold transition-all">
                <i class="fas fa-briefcase mr-2"></i>
                Freelance
            </button>
            <button id="mode-contrat" class="mode-toggle-btn px-6 py-3 rounded-lg font-bold transition-all">
                <i class="fas fa-file-contract mr-2"></i>
                Contrat/Salarié
            </button>
        </div>
    </div>

    <!-- Simulator Container -->
    <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-white/50 backdrop-blur-xl md:flex min-h-[600px]"
        id="simulator-app">

        <!-- Left Panel: Inputs -->
        <div class="w-full md:w-1/2 p-8 md:p-12 border-r border-gray-100">
            <h2 class="text-2xl font-bold font-display text-oblink-gray mb-8 flex items-center gap-3">
                <span
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-oblink-orange text-white text-lg">1</span>
                <span id="panel-title">Paramètres Mission</span>
            </h2>

            <!-- Freelance Inputs -->
            <div id="freelance-inputs">
                <div class="mb-10 relative">
                    <label class="block text-sm font-bold text-oblink-gray mb-4 uppercase tracking-wide">
                        Taux Journalier (TJM)
                    </label>
                    <div class="flex items-center gap-4 mb-2">
                        <span class="text-3xl font-black text-oblink-orange" id="tjm-display">350 €</span>
                    </div>
                    <input type="range" id="tjm-slider" min="200" max="800" step="10" value="350"
                        class="w-full h-4 bg-gray-200 rounded-full appearance-none cursor-pointer range-slider accent-oblink-orange">
                    <div class="flex justify-between text-xs text-gray-400 mt-2 font-body">
                        <span>200€</span>
                        <span>800€</span>
                    </div>
                </div>

                <div class="mb-10 relative">
                    <label class="block text-sm font-bold text-oblink-gray mb-4 uppercase tracking-wide">
                        Durée de la mission (Jours)
                    </label>
                    <div class="flex items-center gap-4 mb-2">
                        <span class="text-3xl font-black text-oblink-blue" id="days-display">5</span>
                        <span class="text-sm text-gray-500 font-medium">jours</span>
                    </div>
                    <input type="range" id="days-slider" min="1" max="30" step="1" value="5"
                        class="w-full h-4 bg-gray-200 rounded-full appearance-none cursor-pointer range-slider-blue accent-oblink-blue">
                    <div class="flex justify-between text-xs text-gray-400 mt-2 font-body">
                        <span>1 jour</span>
                        <span>1 mois (30j)</span>
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-oblink-gray mb-4 uppercase tracking-wide">
                        Statut Juridique
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <button class="status-btn active group" data-status="micro">
                            <span class="block font-bold">Micro-Ent.</span>
                            <span class="text-xs opacity-70">Remplaçant ponctuel</span>
                        </button>
                        <button class="status-btn group" data-status="eurl">
                            <span class="block font-bold">Société (EURL)</span>
                            <span class="text-xs opacity-70">Remplaçant régulier</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Contrat Inputs -->
            <div id="contrat-inputs" class="hidden">
                <div class="mb-10 relative">
                    <label class="block text-sm font-bold text-oblink-gray mb-4 uppercase tracking-wide">
                        Salaire Brut Mensuel
                    </label>
                    <div class="flex items-center gap-4 mb-2">
                        <span class="text-3xl font-black text-oblink-orange" id="salaire-display">2500 €</span>
                    </div>
                    <input type="range" id="salaire-slider" min="1500" max="5000" step="50" value="2500"
                        class="w-full h-4 bg-gray-200 rounded-full appearance-none cursor-pointer range-slider accent-oblink-orange">
                    <div class="flex justify-between text-xs text-gray-400 mt-2 font-body">
                        <span>1500€</span>
                        <span>5000€</span>
                    </div>
                </div>

                <!-- Cadre / Non-Cadre -->
                <div class="mb-8">
                    <label class="block text-sm font-bold text-oblink-gray mb-4 uppercase tracking-wide">
                        Statut
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <button class="cadre-btn group" data-cadre="false">
                            <span class="block font-bold">Non-Cadre</span>
                            <span class="text-xs opacity-70">~22% charges</span>
                        </button>
                        <button class="cadre-btn active group" data-cadre="true">
                            <span class="block font-bold">Cadre</span>
                            <span class="text-xs opacity-70">~25% charges</span>
                        </button>
                    </div>
                </div>

                <!-- Heures/semaine -->
                <div class="mb-8">
                    <label class="block text-sm font-bold text-oblink-gray mb-4 uppercase tracking-wide">
                        Temps de travail
                    </label>
                    <div class="grid grid-cols-3 gap-2">
                        <button class="heures-btn active group" data-heures="35">
                            <span class="block font-bold">35h</span>
                            <span class="text-xs opacity-70">Temps plein</span>
                        </button>
                        <button class="heures-btn group" data-heures="39">
                            <span class="block font-bold">39h</span>
                            <span class="text-xs opacity-70">Heures sup</span>
                        </button>
                        <button class="heures-btn group" data-heures="forfait">
                            <span class="block font-bold">Forfait</span>
                            <span class="text-xs opacity-70">Cadre</span>
                        </button>
                    </div>
                </div>

                <!-- Vue Entreprise Toggle -->
                <div class="mb-8">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" id="vue-entreprise"
                            class="w-5 h-5 text-oblink-orange rounded focus:ring-oblink-orange">
                        <span class="text-sm font-bold text-oblink-gray">
                            👔 Vue Entreprise (Coût employeur)
                        </span>
                    </label>
                </div>

                <!-- Type Contrat -->
                <div class="mb-8">
                    <label class="block text-sm font-bold text-oblink-gray mb-4 uppercase tracking-wide">
                        Type de Contrat
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <button class="contrat-btn active group" data-type="cdd">
                            <span class="block font-bold">CDD</span>
                            <span class="text-xs opacity-70">Durée déterminée</span>
                        </button>
                        <button class="contrat-btn group" data-type="cdi">
                            <span class="block font-bold">CDI</span>
                            <span class="text-xs opacity-70">Indéterminée</span>
                        </button>
                    </div>
                </div>
            </div>

            <button id="calculate-btn"
                class="w-full py-4 bg-gradient-to-r from-oblink-orange to-oblink-violet text-white font-black text-lg rounded-xl shadow-lg hover:shadow-2xl hover:scale-[1.02] transition-all transform flex items-center justify-center gap-2">
                <span id="btn-text">Calculer mon Net</span>
                <i class="fas fa-calculator"></i>
            </button>
        </div>

        <!-- Right Panel: Results -->
        <div
            class="w-full md:w-1/2 bg-oblink-gray text-white p-8 md:p-12 flex flex-col justify-center relative overflow-hidden">
            <div class="absolute top-10 right-10 w-32 h-32 bg-oblink-orange rounded-full filter blur-[80px] opacity-20">
            </div>
            <div
                class="absolute bottom-10 left-10 w-40 h-40 bg-oblink-blue rounded-full filter blur-[100px] opacity-20">
            </div>

            <h2 class="text-2xl font-bold font-display mb-8 text-center md:text-left text-white/90">
                <span
                    class="w-10 h-10 rounded-full bg-white/10 inline-flex items-center justify-center mr-2 text-sm backdrop-blur">2</span>
                Vos Résultats
            </h2>

            <!-- Email Gate -->
            <div id="email-gate" class="hidden mb-6">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <p class="text-center text-white font-bold mb-4">
                        <i class="fas fa-lock mr-2"></i>
                        Entrez votre email pour voir vos résultats
                    </p>
                    <input type="email" id="user-email" placeholder="votre.email@exemple.com"
                        class="w-full px-4 py-3 rounded-lg bg-white/90 text-oblink-gray font-medium placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-oblink-orange mb-3">
                    <button id="reveal-btn"
                        class="w-full py-3 bg-oblink-orange text-white font-bold rounded-lg hover:bg-oblink-orange/90 transition">
                        Dévoiler les Résultats 🔓
                    </button>
                    <p class="text-xs text-white/50 text-center mt-2">
                        Vous recevrez aussi vos résultats par email
                    </p>
                </div>
            </div>

            <!-- Results Container -->
            <div id="results-container">
                <div class="glass-dark rounded-3xl p-8 mb-8 text-center border border-white/10 shadow-2xl transform transition-all duration-500"
                    id="result-card">
                    <p class="text-oblink-orange font-bold uppercase tracking-widest text-sm mb-2">Net dans votre poche
                    </p>
                    <div class="text-6xl md:text-7xl font-black font-display mb-2 tracking-tight text-white"
                        id="net-monthly">-- €</div>
                    <p class="text-white/50 text-sm" id="result-subtitle">Calculez pour voir</p>
                </div>

                <!-- Details Grid -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-white/5 p-4 rounded-xl border border-white/5">
                        <p class="text-xs uppercase text-gray-400 font-bold mb-1" id="label-1">Total Facturé</p>
                        <p class="text-xl font-bold font-display" id="gross-value">-- €</p>
                    </div>
                    <div class="bg-white/5 p-4 rounded-xl border border-white/5">
                        <p class="text-xs uppercase text-gray-400 font-bold mb-1">Charges</p>
                        <p class="text-xl font-bold font-display text-red-400" id="total-charges">-- €</p>
                    </div>
                </div>

                <!-- Taux Horaires (Hidden for Freelance, shown for Contrat) -->
                <div id="taux-horaires" class="hidden mb-6">
                    <div class="bg-white/5 p-4 rounded-xl border border-white/5">
                        <p class="text-xs uppercase text-gray-400 font-bold mb-2">Taux Horaires</p>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">Brut/heure</span>
                            <span class="font-bold" id="taux-brut-h">-- €</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm">Net/heure</span>
                            <span class="font-bold text-oblink-orange" id="taux-net-h">-- €</span>
                        </div>
                    </div>
                </div>

                <!-- Coût Employeur (Hidden unless vue entreprise) -->
                <div id="cout-employeur" class="hidden mb-6">
                    <div class="bg-white/10 p-4 rounded-xl border border-white/20">
                        <p class="text-xs uppercase text-gray-400 font-bold mb-2">👔 Coût Total Employeur</p>
                        <div class="text-3xl font-black text-white mb-1" id="cout-total">-- €</div>
                        <p class="text-xs text-white/60">Charges patronales incluses (+42%)</p>
                    </div>
                </div>

                <!-- CTA Results -->
                <div class="mt-auto">
                    <p class="text-center text-white/60 text-sm mb-4">Intéressé par ce revenu ?</p>
                    <a href="<?php echo home_url('/inscription-opticien'); ?>"
                        class="w-full py-3 bg-white text-oblink-gray font-bold rounded-xl hover:bg-oblink-orange-claire hover:text-oblink-orange transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-user-plus"></i>
                        M'inscrire comme Opticien
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<style>
    .range-slider {
        -webkit-appearance: none;
        height: 12px;
        background: #EAEBC4;
        border-radius: 10px;
        outline: none;
    }

    .range-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #FF6600;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(255, 102, 0, 0.4);
        border: 4px solid white;
        transition: transform 0.1s;
    }

    .range-slider::-webkit-slider-thumb:hover {
        transform: scale(1.1);
    }

    .range-slider-blue::-webkit-slider-thumb {
        background: #0099FF;
        box-shadow: 0 4px 10px rgba(0, 153, 255, 0.4);
    }

    .status-btn,
    .contrat-btn,
    .cadre-btn,
    .heures-btn,
    .mode-toggle-btn {
        padding: 1rem;
        border-radius: 1rem;
        border: 2px solid #f3f4f6;
        background: white;
        text-align: left;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        color: #303030;
    }

    .heures-btn {
        padding: 0.75rem 0.5rem;
        text-align: center;
    }

    .mode-toggle-btn {
        border: none;
        color: #9CA3AF;
    }

    .mode-toggle-btn.active {
        background: #FF6600;
        color: white;
        box-shadow: 0 4px 15px rgba(255, 102, 0, 0.3);
    }

    .status-btn:hover,
    .contrat-btn:hover,
    .cadre-btn:hover,
    .heures-btn:hover {
        border-color: #EAEBC4;
        background: #FFF7ed;
        transform: translateY(-2px);
    }

    .status-btn.active,
    .contrat-btn.active,
    .cadre-btn.active,
    .heures-btn.active {
        border-color: #FF6600;
        background: #FFF7ed;
        box-shadow: 0 4px 15px rgba(255, 102, 0, 0.15);
        color: #FF6600;
    }

    .blur-results {
        filter: blur(8px);
        pointer-events: none;
        user-select: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Elements
        const modeFreelance = document.getElementById('mode-freelance');
        const modeContrat = document.getElementById('mode-contrat');
        const freelanceInputs = document.getElementById('freelance-inputs');
        const contratInputs = document.getElementById('contrat-inputs');
        const panelTitle = document.getElementById('panel-title');
        const calculateBtn = document.getElementById('calculate-btn');
        const btnText = document.getElementById('btn-text');
        const emailGate = document.getElementById('email-gate');
        const resultsContainer = document.getElementById('results-container');
        const revealBtn = document.getElementById('reveal-btn');
        const userEmailInput = document.getElementById('user-email');

        // Freelance
        const tjmSlider = document.getElementById('tjm-slider');
        const tjmDisplay = document.getElementById('tjm-display');
        const daysSlider = document.getElementById('days-slider');
        const daysDisplay = document.getElementById('days-display');
        const statusBtns = document.querySelectorAll('.status-btn');

        // Contrat
        const salaireSlider = document.getElementById('salaire-slider');
        const salaireDisplay = document.getElementById('salaire-display');
        const contratBtns = document.querySelectorAll('.contrat-btn');
        const cadreBtns = document.querySelectorAll('.cadre-btn');
        const heuresBtns = document.querySelectorAll('.heures-btn');
        const vueEntrepriseCheckbox = document.getElementById('vue-entreprise');

        // Results
        const netMonthly = document.getElementById('net-monthly');
        const grossValue = document.getElementById('gross-value');
        const totalCharges = document.getElementById('total-charges');
        const resultSubtitle = document.getElementById('result-subtitle');
        const label1 = document.getElementById('label-1');
        const tauxHoraires = document.getElementById('taux-horaires');
        const tauxBrutH = document.getElementById('taux-brut-h');
        const tauxNetH = document.getElementById('taux-net-h');
        const coutEmployeur = document.getElementById('cout-employeur');
        const coutTotal = document.getElementById('cout-total');

        let currentMode = 'freelance';
        let currentStatus = 'micro';
        let currentContrat = 'cdd';
        let currentCadre = true;
        let currentHeures = 35;
        let vueEntreprise = false;
        let calculatedResults = null;
        let hasCalculated = false;
        let emailSubmitted = false;

        // Mode Toggle
        modeFreelance.addEventListener('click', () => switchMode('freelance'));
        modeContrat.addEventListener('click', () => switchMode('contrat'));

        function switchMode(mode) {
            currentMode = mode;

            if (mode === 'freelance') {
                modeFreelance.classList.add('active');
                modeContrat.classList.remove('active');
                freelanceInputs.classList.remove('hidden');
                contratInputs.classList.add('hidden');
                panelTitle.textContent = 'Paramètres Mission';
                label1.textContent = 'Total Facturé (HT)';
                tauxHoraires.classList.add('hidden');
                coutEmployeur.classList.add('hidden');
            } else {
                modeContrat.classList.add('active');
                modeFreelance.classList.remove('active');
                contratInputs.classList.remove('hidden');
                freelanceInputs.classList.add('hidden');
                panelTitle.textContent = 'Paramètres Salaire';
                label1.textContent = 'Salaire Brut';
                tauxHoraires.classList.remove('hidden');
            }

            resetResults();
            hasCalculated = false;
            emailSubmitted = false;
        }

        // Freelance listeners
        tjmSlider.addEventListener('input', function () {
            tjmDisplay.textContent = this.value + ' €';
            if (hasCalculated && !emailSubmitted) calculate(true);
        });

        daysSlider.addEventListener('input', function () {
            daysDisplay.textContent = this.value;
            if (hasCalculated && !emailSubmitted) calculate(true);
        });

        statusBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                statusBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentStatus = this.getAttribute('data-status');
                if (hasCalculated && !emailSubmitted) calculate(true);
            });
        });

        // Contrat listeners
        salaireSlider.addEventListener('input', function () {
            salaireDisplay.textContent = this.value + ' €';
            if (hasCalculated && !emailSubmitted) calculate(true);
        });

        contratBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                contratBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentContrat = this.getAttribute('data-type');
                if (hasCalculated && !emailSubmitted) calculate(true);
            });
        });

        cadreBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                cadreBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentCadre = this.getAttribute('data-cadre') === 'true';
                if (hasCalculated && !emailSubmitted) calculate(true);
            });
        });

        heuresBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                heuresBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const heures = this.getAttribute('data-heures');
                currentHeures = heures === 'forfait' ? 'forfait' : parseInt(heures);
                if (hasCalculated && !emailSubmitted) calculate(true);
            });
        });

        vueEntrepriseCheckbox.addEventListener('change', function () {
            vueEntreprise = this.checked;
            if (vueEntreprise) {
                coutEmployeur.classList.remove('hidden');
            } else {
                coutEmployeur.classList.add('hidden');
            }
            if (hasCalculated && !emailSubmitted) calculate(true);
        });

        // Calculate Button
        calculateBtn.addEventListener('click', () => {
            if (!hasCalculated) {
                calculate(false);
                hasCalculated = true;
                showEmailGate();
            } else if (!emailSubmitted) {
                showEmailGate();
            }
        });

        // Reveal Button
        revealBtn.addEventListener('click', async () => {
            const email = userEmailInput.value.trim();
            if (!email || !validateEmail(email)) {
                alert('Veuillez entrer une adresse email valide');
                return;
            }

            // Save lead & send email
            await saveLead(email);

            // Reveal results
            emailSubmitted = true;
            emailGate.classList.add('hidden');
            resultsContainer.classList.remove('blur-results');
            btnText.textContent = 'Recalculer';
        });

        function showEmailGate() {
            emailGate.classList.remove('hidden');
            resultsContainer.classList.add('blur-results');
            btnText.textContent = 'Voir les Résultats 🔓';
        }

        function calculate(silent = false) {
            let results = {};

            if (currentMode === 'freelance') {
                results = calculateFreelance();
            } else {
                results = calculateContrat();
            }

            calculatedResults = results;

            if (!silent) {
                updateDisplay(results);
            } else {
                netMonthly.textContent = Math.floor(results.net).toLocaleString('fr-FR') + ' €';
                grossValue.textContent = Math.floor(results.gross).toLocaleString('fr-FR') + ' €';
                totalCharges.textContent = '-' + Math.floor(results.charges).toLocaleString('fr-FR') + ' €';

                if (currentMode === 'contrat') {
                    tauxBrutH.textContent = results.tauxHoraireBrut.toFixed(2) + ' €';
                    tauxNetH.textContent = results.tauxHoraireNet.toFixed(2) + ' €';
                    if (vueEntreprise && results.coutEmployeur) {
                        coutTotal.textContent = Math.floor(results.coutEmployeur).toLocaleString('fr-FR') + ' €';
                    }
                }
            }
        }

        function calculateFreelance() {
            const tjm = parseInt(tjmSlider.value);
            const days = parseInt(daysSlider.value);
            const ca = tjm * days;

            // Charges 2026 : 21.2% Social + 0.2% CFP (Micro-BNC)
            // EURL : ~35-40% (simplifié à 35% pour simu)
            let rateSocial = currentStatus === 'micro' ? 0.212 : 0.35;
            let rateCFP = currentStatus === 'micro' ? 0.002 : 0; // 0.2% CFP

            // Impôt (Versement libératoire optionnel 2.2% ou barème)
            // On simplifie pour la démo en mettant une estimation prudente
            let rateTax = currentStatus === 'micro' ? 0.022 : 0.05;

            const totalSocial = ca * (rateSocial + rateCFP);
            const totalTax = ca * rateTax;
            const totalCost = totalSocial + totalTax;
            const netPocket = ca - totalCost;

            return {
                gross: ca,
                charges: totalCost,
                net: netPocket,
                subtitle: `Pour ${days} jours de travail (Charges ~${Math.round((rateSocial + rateCFP) * 100)}%)`,
                isFreelance: true
            };
        }

        function calculateContrat() {
            const salaireBrut = parseInt(salaireSlider.value);

            // Charges salariales selon cadre/non-cadre
            const tauxChargesSalariales = currentCadre ? 0.25 : 0.22;
            const chargesSalariales = salaireBrut * tauxChargesSalariales;
            const salaireNet = salaireBrut - chargesSalariales;

            // Impôt simplifié
            let tauxImpot = 0.10;
            if (salaireNet > 2000) tauxImpot = 0.12;
            if (salaireNet > 3000) tauxImpot = 0.15;

            const impot = salaireNet * tauxImpot;
            const netApresImpot = salaireNet - impot;

            // Taux horaires
            let heuresMois = currentHeures === 'forfait' ? 151.67 : (currentHeures * 4.33);
            const tauxHoraireBrut = salaireBrut / heuresMois;
            const tauxHoraireNet = netApresImpot / heuresMois;

            // Coût employeur (charges patronales ~42%)
            const chargesPatronales = salaireBrut * 0.42;
            const coutEmployeur = salaireBrut + chargesPatronales;

            return {
                gross: salaireBrut,
                charges: chargesSalariales + impot,
                net: netApresImpot,
                subtitle: 'Net après impôt (mensuel)',
                tauxHoraireBrut,
                tauxHoraireNet,
                coutEmployeur: vueEntreprise ? coutEmployeur : null,
                isFreelance: false
            };
        }

        function updateDisplay(results) {
            animateValue(netMonthly, results.net, ' €');
            grossValue.textContent = Math.floor(results.gross).toLocaleString('fr-FR') + ' €';
            totalCharges.textContent = '-' + Math.floor(results.charges).toLocaleString('fr-FR') + ' €';
            resultSubtitle.textContent = results.subtitle;

            // Reset dynamic elements if re-calculating
            const oldBoost = document.getElementById('boost-msg');
            if (oldBoost) oldBoost.remove();

            if (results.isFreelance && emailSubmitted) {
                // Feature: Boost message after email
                const resultsBox = document.getElementById('result-card');
                const boostMsg = document.createElement('div');
                boostMsg.id = 'boost-msg';
                boostMsg.className = 'mt-4 bg-white/10 p-3 rounded-lg border border-white/20 text-sm animate-pulse';
                boostMsg.innerHTML = `
                    <div class="font-bold text-oblink-orange flex items-center justify-center gap-2">
                        <i class="fas fa-rocket"></i> Boostez ce revenu !
                    </div>
                    <div class="text-white/80 text-xs mt-1">
                        Les experts certifiés OBLINK facturent <strong>+15%</strong>.
                        <br>Potentiel : <strong>${Math.floor(results.net * 1.15).toLocaleString('fr-FR')} €</strong>
                    </div>
                `;
                resultsBox.appendChild(boostMsg);

                // Update CTA
                const ctaBtn = document.querySelector('#results-container a');
                if (ctaBtn) {
                    ctaBtn.innerHTML = `<i class="fas fa-search"></i> Voir les missions à ${tjmSlider.value}€`;
                    // We could update href to include query params if needed
                }
            }

            if (currentMode === 'contrat') {
                tauxBrutH.textContent = results.tauxHoraireBrut.toFixed(2) + ' €';
                tauxNetH.textContent = results.tauxHoraireNet.toFixed(2) + ' €';

                if (vueEntreprise && results.coutEmployeur) {
                    coutTotal.textContent = Math.floor(results.coutEmployeur).toLocaleString('fr-FR') + ' €';
                }
            }
        }

        function animateValue(obj, end, suffix) {
            let startTimestamp = null;
            const duration = 500;
            const start = parseFloat(obj.textContent.replace(/[^\d.-]/g, '')) || 0;

            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.innerHTML = Math.floor(progress * (end - start) + start).toLocaleString('fr-FR') + suffix;
                if (progress < 1) window.requestAnimationFrame(step);
            };
            window.requestAnimationFrame(step);
        }

        function resetResults() {
            netMonthly.textContent = '-- €';
            grossValue.textContent = '-- €';
            totalCharges.textContent = '-- €';
            resultSubtitle.textContent = 'Calculez pour voir';
            emailGate.classList.add('hidden');
            resultsContainer.classList.remove('blur-results');
            btnText.textContent = 'Calculer mon Net';
        }

        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        async function saveLead(email) {
            const leadData = {
                email: email,
                type: 'simulateur',
                mode: currentMode,
                data: currentMode === 'freelance'
                    ? { tjm: tjmSlider.value, days: daysSlider.value, status: currentStatus }
                    : { salaire: salaireSlider.value, contrat: currentContrat, cadre: currentCadre, heures: currentHeures },
                resultat: calculatedResults.net,
                created_at: new Date().toISOString()
            };

            // Send to WordPress endpoint to save & email
            try {
                const response = await fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'save_simulator_lead',
                        email: email,
                        mode: currentMode,
                        data: JSON.stringify(leadData.data),
                        results: JSON.stringify(calculatedResults)
                    })
                });

                const result = await response.json();
                if (result.success) {
                    console.log('Lead saved and email sent!');
                }
            } catch (error) {
                console.error('Error saving lead:', error);
            }
        }
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>
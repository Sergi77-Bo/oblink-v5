<?php
/*
Template Name: Page Simulateur
*/
include 'header-inc.php';
?>

<!-- Simulator Hero -->
<section class="min-h-screen bg-oblink-orange-claire/30 pt-32 pb-20 relative overflow-hidden">

    <!-- Background Accents -->
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
                Que ce soit pour une mission d'un jour ou un mois complet, estimez précisément ce qui rentre dans votre
                poche.
            </p>
        </div>

        <!-- Simulator Container -->
        <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-white/50 backdrop-blur-xl md:flex min-h-[600px]"
            id="simulator-app">

            <!-- Left Panel: Inputs -->
            <div class="w-full md:w-1/2 p-8 md:p-12 border-r border-gray-100">
                <h2 class="text-2xl font-bold font-display text-oblink-gray mb-8 flex items-center gap-3">
                    <span
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-oblink-orange text-white text-lg">1</span>
                    Paramètres Mission
                </h2>

                <!-- TJM Slider -->
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

                <!-- Jours Travaillés Slider -->
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

                <!-- Statut Selection -->
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

                <!-- Action Button -->
                <button id="calculate-btn"
                    class="w-full py-4 bg-gradient-to-r from-oblink-orange to-oblink-violet text-white font-black text-lg rounded-xl shadow-lg hover:shadow-2xl hover:scale-[1.02] transition-all transform flex items-center justify-center gap-2">
                    Calculer mon Net
                    <i class="fas fa-calculator"></i>
                </button>
            </div>

            <!-- Right Panel: Results -->
            <div
                class="w-full md:w-1/2 bg-oblink-gray text-white p-8 md:p-12 flex flex-col justify-center relative overflow-hidden">

                <!-- Decor Circles -->
                <div
                    class="absolute top-10 right-10 w-32 h-32 bg-oblink-orange rounded-full filter blur-[80px] opacity-20">
                </div>
                <div
                    class="absolute bottom-10 left-10 w-40 h-40 bg-oblink-blue rounded-full filter blur-[100px] opacity-20">
                </div>

                <h2 class="text-2xl font-bold font-display mb-8 text-center md:text-left text-white/90">
                    <span
                        class="w-10 h-10 rounded-full bg-white/10 inline-flex items-center justify-center mr-2 text-sm backdrop-blur">2</span>
                    Vos Résultats
                </h2>

                <!-- Main Result Card -->
                <div class="glass-dark rounded-3xl p-8 mb-8 text-center border border-white/10 shadow-2xl transform transition-all duration-500"
                    id="result-card">
                    <p class="text-oblink-orange font-bold uppercase tracking-widest text-sm mb-2">Net dans votre poche
                    </p>
                    <div class="text-6xl md:text-7xl font-black font-display mb-2 tracking-tight text-white"
                        id="net-monthly">-- €</div>
                    <p class="text-white/50 text-sm">Pour <span id="days-result-label">X</span> jours de travail</p>
                </div>

                <!-- Details Grid -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-white/5 p-4 rounded-xl border border-white/5">
                        <p class="text-xs uppercase text-gray-400 font-bold mb-1">Total Facturé (HT)</p>
                        <p class="text-xl font-bold font-display" id="gross-annual">-- €</p>
                    </div>
                    <div class="bg-white/5 p-4 rounded-xl border border-white/5">
                        <p class="text-xs uppercase text-gray-400 font-bold mb-1">Charges Estimées</p>
                        <p class="text-xl font-bold font-display text-red-400" id="total-charges">-- €</p>
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
</section>

<style>
    /* Custom Range Slider Styling */
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

    /* Status Buttons */
    .status-btn {
        padding: 1rem;
        border-radius: 1rem;
        border: 2px solid #f3f4f6;
        background: white;
        text-align: left;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        color: #303030;
    }

    .status-btn:hover {
        border-color: #EAEBC4;
        background: #FFF7ed;
        transform: translateY(-2px);
    }

    .status-btn.active {
        border-color: #FF6600;
        background: #FFF7ed;
        box-shadow: 0 4px 15px rgba(255, 102, 0, 0.15);
        color: #FF6600;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tjmSlider = document.getElementById('tjm-slider');
        const tjmDisplay = document.getElementById('tjm-display');
        const daysSlider = document.getElementById('days-slider');
        const daysDisplay = document.getElementById('days-display');
        const statusBtns = document.querySelectorAll('.status-btn');
        const calculateBtn = document.getElementById('calculate-btn');

        const netMonthly = document.getElementById('net-monthly');
        const grossAnnual = document.getElementById('gross-annual');
        const totalCharges = document.getElementById('total-charges');
        const daysResultLabel = document.getElementById('days-result-label');

        let currentStatus = 'micro';

        // Update displays
        tjmSlider.addEventListener('input', function () {
            tjmDisplay.textContent = this.value + ' €';
            calculate();
        });

        daysSlider.addEventListener('input', function () {
            daysDisplay.textContent = this.value;
            calculate();
        });

        statusBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                statusBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentStatus = this.getAttribute('data-status');
                calculate();
            });
        });

        function calculate() {
            const tjm = parseInt(tjmSlider.value);
            const days = parseInt(daysSlider.value);
            const ca = tjm * days;

            // Simplified Logic for Missions
            let rateSocial = 0;
            let rateTax = 0;

            switch (currentStatus) {
                case 'micro':
                    rateSocial = 0.22;
                    rateTax = 0.02;
                    break;
                case 'eurl':
                    rateSocial = 0.35;
                    rateTax = 0.05;
                    break;
            }

            const totalSocial = ca * rateSocial;
            const totalTax = ca * rateTax;
            const totalCost = totalSocial + totalTax;
            const netPocket = ca - totalCost;

            animateValue(netMonthly, netPocket, ' €');
            grossAnnual.textContent = ca.toLocaleString('fr-FR') + ' €';
            totalCharges.textContent = '-' + totalCost.toLocaleString('fr-FR', { maximumFractionDigits: 0 }) + ' €';
            daysResultLabel.textContent = days;
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

        calculate();
    });
</script>

<?php include get_template_directory() . "/footer-content.php"; wp_footer(); ?>
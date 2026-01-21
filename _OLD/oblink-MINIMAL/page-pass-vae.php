<?php
/*
Template Name: Pass Examen VAE (Landing)
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-gray-50 pt-32 pb-12">
    <div class="max-w-5xl mx-auto px-4">

        <!-- Header Targeted VAE -->
        <div class="text-center mb-16">
            <span
                class="bg-indigo-100 text-indigo-800 font-bold text-sm px-4 py-2 rounded-full uppercase tracking-wider mb-6 inline-block">
                Validation des Acquis de l'Expérience
            </span>
            <h1 class="text-4xl md:text-5xl font-black font-display text-gray-900 mb-6 leading-tight">
                Validez votre VAE Opticien <br>
                <span class="text-oblink-orange">du premier coup.</span>
            </h1>
            <p class="text-xl text-gray-500 max-w-3xl mx-auto mb-8 font-light">
                Ne laissez pas une seule question théorique gâcher 10 ans d'expérience. <br>
                Préparez uniquement ce qui tombe à l'oral.
            </p>

            <!-- Lead Magnet CTA -->
            <button
                onclick="window.open('<?php echo get_template_directory_uri(); ?>/assets/guides/guide-vae-opticien.html', '_blank')"
                class="bg-white text-gray-900 border-2 border-gray-200 px-8 py-4 rounded-xl font-bold hover:border-gray-900 transition flex items-center gap-3 mx-auto shadow-sm">
                <i class="fas fa-file-download text-oblink-orange"></i>
                Télécharger : Les 10 Questions Pièges du Jury 2025
            </button>
        </div>

        <!-- The 3 VAE Steps (Official Process) -->
        <div class="mb-20">
            <h2 class="text-3xl font-black text-center text-gray-900 mb-12">
                Les 3 Étapes de votre VAE Opticien
            </h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Step 1: Livret 1 -->
                <div class="relative">
                    <div class="bg-white p-8 rounded-3xl shadow-sm border-2 border-indigo-100 hover:border-indigo-300 transition group">
                        <div class="absolute -top-4 left-8 bg-indigo-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-black text-xl shadow-lg">
                            1
                        </div>
                        <div class="w-14 h-14 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 text-2xl mb-6 mt-4 group-hover:bg-indigo-600 group-hover:text-white transition">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Livret 1 : Recevabilité</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Dossier CERFA + justificatifs d'expérience. Nous vous aidons à préparer tous les documents requis.
                        </p>
                        <div class="text-xs text-indigo-600 font-bold">
                            ✓ Checklist interactive incluse
                        </div>
                    </div>
                    <!-- Arrow -->
                    <div class="hidden md:block absolute top-1/2 -right-4 transform -translate-y-1/2 text-indigo-300 text-3xl">
                        →
                    </div>
                </div>

                <!-- Step 2: Livret 2 -->
                <div class="relative">
                    <div class="bg-white p-8 rounded-3xl shadow-sm border-2 border-orange-100 hover:border-orange-300 transition group">
                        <div class="absolute -top-4 left-8 bg-orange-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-black text-xl shadow-lg">
                            2
                        </div>
                        <div class="w-14 h-14 bg-orange-50 rounded-xl flex items-center justify-center text-orange-500 text-2xl mb-6 mt-4 group-hover:bg-orange-500 group-hover:text-white transition">
                            <i class="fas fa-magic"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Livret 2 : Rédaction IA</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Transformez votre expérience terrain en vocabulaire académique avec notre assistant IA.
                        </p>
                        <div class="text-xs text-orange-500 font-bold">
                            ✓ Assistant rédactionnel intelligent
                        </div>
                    </div>
                    <!-- Arrow -->
                    <div class="hidden md:block absolute top-1/2 -right-4 transform -translate-y-1/2 text-orange-300 text-3xl">
                        →
                    </div>
                </div>

                <!-- Step 3: Oral Jury -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border-2 border-green-100 hover:border-green-300 transition group">
                    <div class="absolute -top-4 left-8 bg-green-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-black text-xl shadow-lg">
                        3
                    </div>
                    <div class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center text-green-600 text-2xl mb-6 mt-4 group-hover:bg-green-600 group-hover:text-white transition">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Oral Jury : Préparation</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        27 ans d'oraux analysés. Révisez uniquement les questions qui tombent vraiment.
                    </p>
                    <div class="text-xs text-green-600 font-bold">
                        ✓ Simulateur d'entretien inclus
                    </div>
                </div>
            </div>
        </div>

        <!-- PRICING / PRODUCT -->
        <div class="bg-gray-900 rounded-3xl overflow-hidden shadow-2xl relative">

            <!-- Decorative Blur -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-oblink-violet/30 rounded-full blur-3xl -mr-20 -mt-20"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-oblink-orange/20 rounded-full blur-3xl -ml-20 -mb-20">
            </div>

            <div class="relative z-10 md:flex items-center">
                <div class="p-10 md:w-2/3">
                    <h2 class="text-3xl font-bold text-white mb-4">Pack Réussite VAE</h2>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center text-gray-300">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i> Accès illimité aux 27 ans d'annales
                            corrigées
                        </li>
                        <li class="flex items-center text-gray-300">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i> Assistant IA Rédaction Livret 2
                        </li>
                        <li class="flex items-center text-gray-300">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i> Mode "Révision Express" (Fiches
                            synthèse)
                        </li>
                    </ul>
                    <div class="flex items-center gap-4">
                        <button
                            class="add-to-cart-btn bg-oblink-orange text-white px-8 py-3 rounded-xl font-bold hover:bg-white hover:text-oblink-orange transition border-2 border-oblink-orange"
                            data-id="pass-vae" data-name="Pack Réussite VAE" data-price="29" data-category="B2C - VAE">
                            <i class="fas fa-shopping-cart mr-2"></i>Ajouter au panier
                        </button>
                        <span class="text-2xl font-bold text-white">29€ <span
                                class="text-sm font-normal text-gray-400">/ mois</span></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function downloadMagnet() {
        alert("Le téléchargement du PDF '10 Questions Pièges' va démarrer... (Lead Magnet Simulation)");
    }
</script>

<?php include 'footer.php'; ?>
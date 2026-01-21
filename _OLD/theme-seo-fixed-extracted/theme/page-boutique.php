<?php
/*
Template Name: Boutique Partenaires (Demo)
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-gray-50 pt-32 pb-12">
    <div class="max-w-5xl mx-auto px-4">

        <!-- Header -->
        <div class="text-center mb-12">
            <span
                class="bg-blue-100 text-blue-800 font-bold text-sm px-4 py-2 rounded-full uppercase tracking-wider mb-4 inline-block">
                Matériel & Équipement
            </span>
            <h1 class="text-4xl font-bold font-display text-oblink-gray mb-4">
                Les Indispensables de l'<span class="text-oblink-orange">Opticien</span>
            </h1>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Étudiant ou Freelance, équipez-vous avec du matériel approuvé par les pros. <br>
                Nous avons sélectionné les meilleurs rapports qualité/prix.
            </p>
        </div>

        <!-- Segments Grid -->
        <div class="grid md:grid-cols-2 gap-8 mb-16">

            <!-- ETUDIANT BTS (AMAZON PACK) -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition group">
                <div
                    class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600 text-2xl font-bold mb-6">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Pack Rentrée BTS Opticien</h3>
                <p class="text-gray-500 mb-6 text-sm">
                    Ne perdez pas de temps. La liste complète du matériel obligatoire pour vos examens et ateliers.
                </p>

                <div class="space-y-3 mb-8 bg-gray-50 p-6 rounded-2xl">
                    <h4 class="font-bold text-gray-700 text-sm mb-2 uppercase tracking-wide">Dans le pack :</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center justify-between text-sm text-gray-600">
                            <span><i class="fas fa-check text-green-500 mr-2"></i> Pince à border</span>
                            <span class="font-bold">24,90 €</span>
                        </li>
                        <li class="flex items-center justify-between text-sm text-gray-600">
                            <span><i class="fas fa-check text-green-500 mr-2"></i> Tournevis Précision</span>
                            <span class="font-bold">12,50 €</span>
                        </li>
                        <li class="flex items-center justify-between text-sm text-gray-600">
                            <span><i class="fas fa-check text-green-500 mr-2"></i> Réglette & Calibre</span>
                            <span class="font-bold">15,00 €</span>
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between items-center">
                        <span class="text-sm font-bold text-gray-500">Total estimé</span>
                        <span class="text-2xl font-bold text-gray-900">~52 €</span>
                    </div>
                </div>

                <a href="#" onclick="toggleModal('amazon')"
                    class="flex items-center justify-center gap-2 w-full py-4 bg-[#FF9900] text-white rounded-xl font-bold hover:bg-[#ff8c00] transition shadow-lg">
                    <i class="fab fa-amazon"></i> Voir le Pack sur Amazon
                </a>
                <p class="text-center text-xs text-gray-400 mt-3">Lien affilié (Soutenez OBLINK)</p>
            </div>

            <!-- OPTICIEN NOMADE / DOMICILE (B2B) -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition group">
                <div
                    class="w-16 h-16 rounded-2xl bg-oblink-orange/20 flex items-center justify-center text-oblink-orange text-2xl font-bold mb-6">
                    <i class="fas fa-car-side"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Kit Opticien à Domicile</h3>
                <p class="text-gray-500 mb-6 text-sm">
                    Lancez votre activité nomade. Matériel portable professionnel et valises de montures.
                </p>

                <div class="space-y-3 mb-8 bg-gray-50 p-6 rounded-2xl">
                    <h4 class="font-bold text-gray-700 text-sm mb-2 uppercase tracking-wide">Les indispensables Pro :
                    </h4>
                    <ul class="space-y-2">
                        <li class="flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check text-oblink-orange"></i> Frontofocomètre Portable
                        </li>
                        <li class="flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check text-oblink-orange"></i> Valise Essai (200 pièces)
                        </li>
                        <li class="flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check text-oblink-orange"></i> Mallette Montures (x60)
                        </li>
                    </ul>
                    <div class="mt-4 bg-orange-100 text-orange-800 px-3 py-2 rounded-lg text-sm text-center font-bold">
                        -10% avec le code OBLINK_PRO
                    </div>
                </div>

                <a href="#" onclick="toggleModal('b2b')"
                    class="flex items-center justify-center gap-2 w-full py-4 bg-gray-900 text-white rounded-xl font-bold hover:bg-gray-800 transition shadow-lg">
                    <i class="fas fa-file-pdf"></i> Demander le Catalogue
                </a>
                <p class="text-center text-xs text-gray-400 mt-3">Partenariat Breitfeld & Schliekert</p>
            </div>

        </div>

    </div>
</div>

<!-- DEMO MODAL -->
<div id="demo-modal"
    class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-3xl max-w-md w-full p-8 text-center relative transform scale-90 transition-transform duration-300"
        id="demo-modal-content">
        <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <i class="fas fa-times text-xl"></i>
        </button>

        <div
            class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 text-green-500 text-3xl">
            <i class="fas fa-shopping-cart"></i>
        </div>

        <h3 class="text-2xl font-bold text-oblink-gray mb-2">Redirection Partenaire</h3>
        <p class="text-gray-500 mb-6">
            <span id="modal-text">Vous allez être redirigé vers Amazon.</span>
        </p>

        <div class="bg-gray-50 p-4 rounded-xl mb-6 text-left">
            <p class="text-xs text-gray-400 uppercase font-bold mb-2">Simulation Business</p>
            <div class="flex items-center gap-3 text-sm text-gray-600 mt-2">
                <i class="fas fa-coins text-yellow-500"></i>
                <span id="modal-commission">Commission générée : ~3.50 €</span>
            </div>
        </div>

        <button onclick="closeModal()"
            class="w-full py-3 bg-oblink-orange text-white rounded-xl font-bold hover:bg-orange-600 transition">
            Fermer la démo
        </button>
    </div>
</div>

<script>
    function toggleModal(type) {
        const modal = document.getElementById('demo-modal');
        const content = document.getElementById('demo-modal-content');
        const text = document.getElementById('modal-text');
        const comm = document.getElementById('modal-commission');

        if (type === 'amazon') {
            text.innerText = "Vous allez être redirigé vers le panier Amazon pré-rempli.";
            comm.innerText = "Commission Affiliation (7%) : ~3.64 €";
        } else {
            text.innerText = "Votre demande de catalogue a été envoyée au fournisseur.";
            comm.innerText = "Lead B2B qualifié : ~50.00 €";
        }

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-90');
            content.classList.add('scale-100');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('demo-modal');
        const content = document.getElementById('demo-modal-content');

        modal.classList.add('opacity-0');
        content.classList.remove('scale-100');
        content.classList.add('scale-90');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>

<?php include 'footer.php'; ?>
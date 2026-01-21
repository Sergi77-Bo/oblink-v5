<?php
/*
Template Name: Page Partenaires (Demo)
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-gray-50 pt-32 pb-12">
    <div class="max-w-4xl mx-auto px-4">

        <!-- Header -->
        <div class="text-center mb-12">
            <span
                class="bg-oblink-orange/10 text-oblink-orange font-bold text-sm px-4 py-2 rounded-full uppercase tracking-wider mb-4 inline-block">
                Offres Partenaires
            </span>
            <h1 class="text-4xl font-bold font-display text-oblink-gray mb-4">
                Boostez votre activité avec nos <span class="text-oblink-orange">Avantages Exclusifs</span>
            </h1>
            <p class="text-gray-500 max-w-2xl mx-auto">
                En tant que membre OBLINK, vous bénéficiez de tarifs négociés auprès des meilleurs services pour
                freelances.
            </p>
        </div>

        <!-- Partners Grid -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">

            <!-- ALAN (Assurance) -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-green-50 rounded-bl-full -mr-10 -mt-10 transition group-hover:scale-110">
                </div>
                <div
                    class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-green-600 text-2xl font-bold mb-6">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">RC Pro Santé (Stello/Wemind)</h3>
                <p class="text-gray-500 mb-6 text-sm">
                    L'assurance indispensable pour exercer en toute sérénité. Couverture complète pour opticiens
                    remplaçants.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fas fa-check text-green-500"></i> Responsabilité Civile Pro
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fas fa-check text-green-500"></i> Protection Juridique Inclus
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fas fa-tag text-oblink-orange font-bold"></i> -20% pour les membres OBLINK
                    </li>
                </ul>
                <button onclick="toggleModal('modal-alan')"
                    class="w-full py-4 bg-gray-900 text-white rounded-xl font-bold hover:bg-gray-800 transition shadow-lg">
                    Voir l'offre (-20%)
                </button>
            </div>

            <!-- SHINE (Banque) -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-yellow-50 rounded-bl-full -mr-10 -mt-10 transition group-hover:scale-110">
                </div>
                <div
                    class="w-16 h-16 rounded-2xl bg-yellow-100 flex items-center justify-center text-yellow-600 text-2xl font-bold mb-6">
                    <i class="fas fa-university"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Compte Pro (Shine/Qonto)</h3>
                <p class="text-gray-500 mb-6 text-sm">
                    Gérez vos revenus de freelance simplement. Factures, encaissements et comptabilité simplifiée.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fas fa-check text-green-500"></i> IBAN Français
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fas fa-check text-green-500"></i> Carte Mastercard Business
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fas fa-tag text-oblink-orange font-bold"></i> 6 mois offerts via OBLINK
                    </li>
                </ul>
                <button onclick="toggleModal('modal-shine')"
                    class="w-full py-4 bg-gray-900 text-white rounded-xl font-bold hover:bg-gray-800 transition shadow-lg">
                    Ouvrir un compte (6 mois offerts)
                </button>
            </div>

        </div>

        <!-- Trust -->
        <div class="text-center text-gray-400 text-sm">
            <p>Ces offres sont négociées exclusivement pour la communauté OBLINK.</p>
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
            <i class="fas fa-check-circle"></i>
        </div>

        <h3 class="text-2xl font-bold text-oblink-gray mb-2">Intérêt enregistré !</h3>
        <p class="text-gray-500 mb-6">
            Cette intégration partenaire sera disponible dans la prochaine version (V2). <br>
            Nous vous notifierons dès l'activation de l'avantage.
        </p>

        <div class="bg-gray-50 p-4 rounded-xl mb-6 text-left">
            <p class="text-xs text-gray-400 uppercase font-bold mb-2">Prochaines étapes (Simulation)</p>
            <div class="flex items-center gap-3 text-sm text-gray-600">
                <i class="fas fa-share text-oblink-orange"></i>
                <span>Redirection vers le site partenaire...</span>
            </div>
            <div class="flex items-center gap-3 text-sm text-gray-600 mt-2">
                <i class="fas fa-euro-sign text-green-500"></i>
                <span>Commission "Apporteur" générée.</span>
            </div>
        </div>

        <button onclick="closeModal()"
            class="w-full py-3 bg-oblink-orange text-white rounded-xl font-bold hover:bg-orange-600 transition">
            Retour au Dashboard
        </button>
    </div>
</div>

<script>
    function toggleModal(type) {
        const modal = document.getElementById('demo-modal');
        const content = document.getElementById('demo-modal-content');

        modal.classList.remove('hidden');
        // Small delay for animation
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
<?php
/*
Template Name: Checkout
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-gradient-to-br from-oblink-beige/10 to-white pt-32 pb-20">

    <div class="max-w-4xl mx-auto px-4">

        <h1 class="text-4xl md:text-5xl font-bold font-display text-oblink-gray mb-2 text-center">
            <span class="text-oblink-blue">Finalisation</span> de la commande
        </h1>
        <p class="text-center text-gray-600 mb-12">
            <i class="fas fa-info-circle text-oblink-orange mr-2"></i>
            <strong>Démo Jury:</strong> Le paiement Stripe sera intégré prochainement
        </p>

        <div class="grid md:grid-cols-2 gap-8">

            <!-- Order Summary -->
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 border border-white/50 shadow-lg">
                <h3 class="text-2xl font-bold text-oblink-gray mb-6 flex items-center gap-2">
                    <i class="fas fa-shopping-bag text-oblink-orange"></i>
                    Votre commande
                </h3>

                <div id="checkout-items" class="space-y-4 mb-6">
                    <!-- Items injected by JS -->
                </div>

                <div class="border-t pt-4 space-y-2">
                    <div class="flex justify-between text-gray-600">
                        <span>Sous-total HT</span>
                        <span id="checkout-subtotal" class="font-bold">0,00 €</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>TVA (20%)</span>
                        <span id="checkout-tva" class="font-bold">0,00 €</span>
                    </div>
                    <div class="flex justify-between text-2xl font-bold text-oblink-orange pt-2">
                        <span>Total TTC</span>
                        <span id="checkout-total">0,00 €</span>
                    </div>
                </div>
            </div>

            <!-- Payment Demo -->
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 border border-white/50 shadow-lg">
                <h3 class="text-2xl font-bold text-oblink-gray mb-6 flex items-center gap-2">
                    <i class="fas fa-credit-card text-oblink-blue"></i>
                    Paiement
                </h3>

                <!-- Demo Payment Form -->
                <form id="demo-payment-form" class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                        <input type="email" required
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oblink-blue outline-none"
                            placeholder="votre@email.com">
                    </div>

                    <!-- Stripe Placeholder -->
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50">
                        <i class="fab fa-stripe text-6xl text-indigo-600 mb-4"></i>
                        <h4 class="font-bold text-gray-700 mb-2">Stripe Payment Integration</h4>
                        <p class="text-sm text-gray-500">Le module de paiement Stripe sera intégré après la soutenance
                        </p>
                    </div>

                    <div class="space-y-3 pt-4">
                        <button type="submit"
                            class="w-full py-4 bg-oblink-blue text-white rounded-xl font-bold hover:bg-oblink-gray transition shadow-lg flex items-center justify-center gap-2">
                            <i class="fas fa-lock"></i>
                            Simuler le paiement (Démo)
                        </button>

                        <a href="<?php echo home_url('/panier'); ?>"
                            class="block w-full py-3 border-2 border-gray-300 text-gray-700 text-center rounded-xl font-bold hover:bg-gray-50 transition">
                            <i class="fas fa-arrow-left mr-2"></i>Retour au panier
                        </a>
                    </div>
                </form>

                <!-- Trust Badges -->
                <div class="mt-8 pt-6 border-t space-y-3">
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <i class="fas fa-shield-alt text-green-600 text-lg"></i>
                        <span>Paiement sécurisé SSL</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <i class="fas fa-lock text-oblink-blue text-lg"></i>
                        <span>Données cryptées</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        renderCheckoutSummary();

        function renderCheckoutSummary() {
            const cart = oblinkCart.cart;
            const checkoutItems = document.getElementById('checkout-items');

            if (cart.length === 0) {
                window.location.href = '<?php echo home_url("/panier"); ?>';
                return;
            }

            checkoutItems.innerHTML = cart.map(item => `
            <div class="flex justify-between items-center py-3 border-b">
                <div>
                    <h5 class="font-bold text-gray-800">${item.name}</h5>
                    <span class="text-xs text-gray-500">Quantité: ${item.quantity}</span>
                </div>
                <span class="font-bold text-oblink-orange">${(item.price * item.quantity).toFixed(2)} €</span>
            </div>
        `).join('');

            updateCheckoutSummary();
        }

        function updateCheckoutSummary() {
            const subtotal = oblinkCart.getTotal();
            const tva = subtotal * 0.20;
            const total = subtotal + tva;

            document.getElementById('checkout-subtotal').textContent = subtotal.toFixed(2).replace('.', ',') + ' €';
            document.getElementById('checkout-tva').textContent = tva.toFixed(2).replace('.', ',') + ' €';
            document.getElementById('checkout-total').textContent = total.toFixed(2).replace('.', ',') + ' €';
        }

        // Handle demo payment
        document.getElementById('demo-payment-form').addEventListener('submit', function (e) {
            e.preventDefault();

            // Show success message
            const total = (oblinkCart.getTotal() * 1.20).toFixed(2);

            alert(`✅ DÉMO RÉUSSIE !\n\nCommande simulée pour ${total} €\n\n📌 Note pour le jury:\nL'intégration Stripe sera effectuée après la soutenance.\n\nFonctionnalités démontrées:\n✓ Panier fonctionnel\n✓ Calcul automatique TVA\n✓ Flow d'achat complet`);

            // Clear cart
            oblinkCart.clearCart();

            // Redirect to confirmation
            window.location.href = '<?php echo home_url("/produits?success=demo"); ?>';
        });
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>
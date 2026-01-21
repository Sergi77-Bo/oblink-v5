<?php
/*
Template Name: Panier
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-gradient-to-br from-oblink-beige/10 to-white pt-32 pb-20">

    <div class="max-w-6xl mx-auto px-4">

        <h1 class="text-4xl md:text-5xl font-bold font-display text-oblink-gray mb-8 text-center">
            Mon <span class="text-oblink-orange">Panier</span>
        </h1>

        <!-- Empty Cart Message -->
        <div id="empty-cart" class="hidden text-center py-20">
            <i class="fas fa-shopping-cart text-8xl text-gray-300 mb-6"></i>
            <h2 class="text-2xl font-bold text-gray-400 mb-4">Votre panier est vide</h2>
            <a href="<?php echo home_url('/produits'); ?>"
                class="inline-block px-8 py-4 bg-oblink-orange text-white rounded-xl font-bold hover:bg-oblink-gray transition">
                Découvrir nos services
            </a>
        </div>

        <!-- Cart Content -->
        <div id="cart-content" class="grid lg:grid-cols-3 gap-8">

            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div id="cart-items" class="space-y-4">
                    <!-- Items will be injected here by JavaScript -->
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div
                    class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 border border-white/50 shadow-lg sticky top-24">
                    <h3 class="text-xl font-bold text-oblink-gray mb-6">Récapitulatif</h3>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>Sous-total</span>
                            <span id="subtotal" class="font-bold">0,00 €</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>TVA (20%)</span>
                            <span id="tva" class="font-bold">0,00 €</span>
                        </div>
                        <div class="border-t pt-4 flex justify-between text-xl font-bold text-oblink-orange">
                            <span>Total TTC</span>
                            <span id="total" class="font-bold">0,00 €</span>
                        </div>
                    </div>

                    <a href="<?php echo home_url('/checkout'); ?>" id="checkout-btn"
                        class="block w-full py-4 bg-oblink-orange text-white text-center rounded-xl font-bold hover:bg-oblink-gray transition shadow-lg mb-3">
                        <i class="fas fa-lock mr-2"></i>Passer la commande
                    </a>

                    <a href="<?php echo home_url('/produits'); ?>"
                        class="block w-full py-3 border-2 border-oblink-blue text-oblink-blue text-center rounded-xl font-bold hover:bg-oblink-blue hover:text-white transition">
                        Continuer mes achats
                    </a>

                    <!-- Trust Badges -->
                    <div class="mt-6 pt-6 border-t space-y-3">
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-shield-alt text-green-600"></i>
                            <span>Paiement sécurisé</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-undo text-oblink-blue"></i>
                            <span>Satisfait ou remboursé 30j</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-headset text-oblink-violet"></i>
                            <span>Support 7j/7</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        renderCart();

        function renderCart() {
            const cart = oblinkCart.cart;
            const cartItemsContainer = document.getElementById('cart-items');
            const emptyCart = document.getElementById('empty-cart');
            const cartContent = document.getElementById('cart-content');

            if (cart.length === 0) {
                emptyCart.classList.remove('hidden');
                cartContent.classList.add('hidden');
                return;
            }

            emptyCart.classList.add('hidden');
            cartContent.classList.remove('hidden');

            cartItemsContainer.innerHTML = cart.map(item => `
            <div class="bg-white/80 backdrop-blur-xl rounded-xl p-6 border border-white/50 shadow-lg flex flex-col md:flex-row gap-6">
                <div class="flex-1">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <h4 class="font-bold text-lg text-oblink-gray">${item.name}</h4>
                            <span class="text-xs text-gray-500 uppercase">${item.category}</span>
                        </div>
                        <button onclick="removeFromCart('${item.id}')" 
                            class="text-red-500 hover:text-red-700 transition">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="flex items-center gap-4 mt-4">
                        <div class="flex items-center border rounded-lg">
                            <button onclick="updateQuantity('${item.id}', ${item.quantity - 1})" 
                                class="px-3 py-2 hover:bg-gray-100 transition">
                                <i class="fas fa-minus text-sm"></i>
                            </button>
                            <span class="px-4 py-2 font-bold">${item.quantity}</span>
                            <button onclick="updateQuantity('${item.id}', ${item.quantity + 1})" 
                                class="px-3 py-2 hover:bg-gray-100 transition">
                                <i class="fas fa-plus text-sm"></i>
                            </button>
                        </div>
                        <div class="text-right flex-1">
                            <span class="text-2xl font-bold text-oblink-orange">${(item.price * item.quantity).toFixed(2)} €</span>
                            <div class="text-xs text-gray-500">${item.price.toFixed(2)} € × ${item.quantity}</div>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');

            updateSummary();
        }

        function updateSummary() {
            const subtotal = oblinkCart.getTotal();
            const tva = subtotal * 0.20;
            const total = subtotal + tva;

            document.getElementById('subtotal').textContent = subtotal.toFixed(2).replace('.', ',') + ' €';
            document.getElementById('tva').textContent = tva.toFixed(2).replace('.', ',') + ' €';
            document.getElementById('total').textContent = total.toFixed(2).replace('.', ',') + ' €';
        }

        // Global functions for cart actions
        window.removeFromCart = function (itemId) {
            if (confirm('Retirer cet article du panier ?')) {
                oblinkCart.removeItem(itemId);
                renderCart();
            }
        };

        window.updateQuantity = function (itemId, newQuantity) {
            if (newQuantity >= 1) {
                oblinkCart.updateQuantity(itemId, newQuantity);
                renderCart();
            }
        };
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>
<?php
/**
 * Template Name: Panier
 * 
 * Page du panier d'achat
 */

// Initialize session for cart
if (!session_id()) {
    session_start();
}

get_header();
?>

<div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold mb-8">Panier</h1>
    
    <?php
    $cart = isset($_SESSION['oblink_cart']) ? $_SESSION['oblink_cart'] : [];
    $total = 0;
    ?>
    
    <?php if (empty($cart)): ?>
        <div class="bg-gray-100 rounded-lg p-8 text-center">
            <i class="fas fa-shopping-cart text-4xl text-gray-400 mb-4"></i>
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Votre panier est vide</h2>
            <p class="text-gray-600 mb-6">Découvrez nos formations et abonnements</p>
            <a href="<?php echo home_url('/produits'); ?>" class="inline-block px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                Voir nos produits
            </a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-3 gap-8">
            <!-- Panier Items -->
            <div class="col-span-2">
                <div class="space-y-4">
                    <?php foreach ($cart as $cart_key => $item): 
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <div class="bg-white border border-gray-200 rounded-lg p-6 flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900"><?php echo esc_html($item['name']); ?></h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    <span class="bg-gray-100 px-2 py-1 rounded">
                                        <?php echo ucfirst($item['type']); ?>
                                    </span>
                                </p>
                                <p class="text-orange-500 font-bold mt-2">
                                    <?php echo number_format($item['price'], 2, ',', ' '); ?> €
                                </p>
                            </div>
                            
                            <div class="flex items-center space-x-4">
                                <!-- Quantity -->
                                <div class="flex items-center border border-gray-300 rounded">
                                    <button class="px-3 py-2 text-gray-600 hover:bg-gray-100 update-quantity" data-cart-key="<?php echo esc_attr($cart_key); ?>" data-action="decrease">−</button>
                                    <input type="number" class="w-12 text-center border-0 quantity-input" value="<?php echo $item['quantity']; ?>" data-cart-key="<?php echo esc_attr($cart_key); ?>" min="1">
                                    <button class="px-3 py-2 text-gray-600 hover:bg-gray-100 update-quantity" data-cart-key="<?php echo esc_attr($cart_key); ?>" data-action="increase">+</button>
                                </div>
                                
                                <!-- Subtotal -->
                                <div class="w-20 text-right">
                                    <p class="font-semibold text-gray-900">
                                        <?php echo number_format($subtotal, 2, ',', ' '); ?> €
                                    </p>
                                </div>
                                
                                <!-- Remove -->
                                <button class="text-red-500 hover:text-red-700 remove-from-cart" data-cart-key="<?php echo esc_attr($cart_key); ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Résumé commande -->
            <div class="col-span-1">
                <div class="bg-gray-50 rounded-lg p-6 sticky top-20">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Résumé</h3>
                    
                    <div class="space-y-3 border-b border-gray-200 pb-4 mb-4">
                        <div class="flex justify-between text-gray-600">
                            <span><?php echo count($cart); ?> article<?php echo count($cart) > 1 ? 's' : ''; ?></span>
                            <span><?php echo number_format($total, 2, ',', ' '); ?> €</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between text-lg font-bold text-gray-900 mb-6">
                        <span>Total</span>
                        <span class="text-orange-500"><?php echo number_format($total, 2, ',', ' '); ?> €</span>
                    </div>
                    
                    <a href="<?php echo home_url('/checkout'); ?>" class="block w-full px-4 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 text-center font-semibold mb-3">
                        Procéder au paiement
                    </a>
                    
                    <a href="<?php echo home_url('/formations'); ?>" class="block w-full px-4 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 text-center font-semibold">
                        Continuer shopping
                    </a>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <p class="text-xs text-gray-500 mb-3">✓ Paiement sécurisé</p>
                        <p class="text-xs text-gray-500 mb-3">✓ Accès immédiat après paiement</p>
                        <p class="text-xs text-gray-500">✓ Garantie de 30 jours</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Remove from cart
    document.querySelectorAll('.remove-from-cart').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const cartKey = this.dataset.cartKey;
            
            fetch(oblink_cart.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=oblink_remove_from_cart&cart_key=' + cartKey + '&nonce=' + oblink_cart.nonce
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        });
    });
    
    // Update quantity
    document.querySelectorAll('.update-quantity').forEach(btn => {
        btn.addEventListener('click', function() {
            const cartKey = this.dataset.cartKey;
            const input = document.querySelector('[data-cart-key="' + cartKey + '"].quantity-input');
            let quantity = parseInt(input.value);
            
            if (this.dataset.action === 'increase') {
                quantity++;
            } else if (this.dataset.action === 'decrease' && quantity > 1) {
                quantity--;
            }
            
            fetch(oblink_cart.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=oblink_update_cart_quantity&cart_key=' + cartKey + '&quantity=' + quantity + '&nonce=' + oblink_cart.nonce
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        });
    });
});
</script>

</div>
<?php
get_footer();

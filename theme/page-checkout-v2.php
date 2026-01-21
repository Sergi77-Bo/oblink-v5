<?php
/**
 * Template Name: Checkout
 * 
 * Page de paiement (sans gateway pour le moment)
 */

// Initialize session
if (!session_id()) {
    session_start();
}

get_header();
?>

<div class="max-w-4xl mx-auto px-4">
    <h1 class="text-4xl font-bold mb-8">Finaliser votre commande</h1>
    
    <?php
    $cart = isset($_SESSION['oblink_cart']) ? $_SESSION['oblink_cart'] : [];
    $total = 0;
    
    if (empty($cart)) {
        echo '<div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-yellow-800">
                Votre panier est vide. <a href="' . home_url('/produits') . '" class="font-bold">Retour aux produits</a>
              </div>';
        get_footer();
        return;
    }
    
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    ?>
    
    <div class="grid grid-cols-3 gap-8">
        <!-- Formulaire -->
        <div class="col-span-2">
            <form id="checkout-form" class="space-y-8">
                <!-- Informations Client -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-6">Vos informations</h2>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Prénom</label>
                            <input type="text" name="first_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nom</label>
                            <input type="text" name="last_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Téléphone</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Entreprise (optionnel)</label>
                        <input type="text" name="company" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>
                </div>
                
                <!-- Adresse de facturation -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-6">Adresse de facturation</h2>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Adresse</label>
                        <input type="text" name="address" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Code Postal</label>
                            <input type="text" name="postal_code" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Ville</label>
                            <input type="text" name="city" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
                
                <!-- Conditions d'utilisation -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <label class="flex items-start">
                        <input type="checkbox" name="terms" required class="mt-1">
                        <span class="ml-3 text-sm text-gray-700">
                            J'accepte les <a href="<?php echo home_url('/cgu'); ?>" class="text-blue-600 hover:underline">conditions générales d'utilisation</a> et la <a href="<?php echo home_url('/privacy'); ?>" class="text-blue-600 hover:underline">politique de confidentialité</a>
                        </span>
                    </label>
                </div>
                
                <button type="submit" class="w-full px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 font-bold text-lg">
                    Valider la commande
                </button>
            </form>
        </div>
        
        <!-- Résumé commande -->
        <div class="col-span-1">
            <div class="bg-gray-50 rounded-lg p-6 sticky top-20">
                <h3 class="text-lg font-bold text-gray-900 mb-6">Résumé de commande</h3>
                
                <div class="space-y-4 border-b border-gray-200 pb-4 mb-4">
                    <?php foreach ($cart as $item): 
                        $subtotal = $item['price'] * $item['quantity'];
                    ?>
                        <div>
                            <p class="text-sm text-gray-700"><?php echo esc_html($item['name']); ?></p>
                            <div class="flex justify-between text-xs text-gray-600 mt-1">
                                <span><?php echo $item['quantity']; ?> × <?php echo number_format($item['price'], 2, ',', ' '); ?> €</span>
                                <span class="font-semibold"><?php echo number_format($subtotal, 2, ',', ' '); ?> €</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="space-y-2 mb-6">
                    <div class="flex justify-between text-gray-600">
                        <span>Sous-total</span>
                        <span><?php echo number_format($total, 2, ',', ' '); ?> €</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Frais de port</span>
                        <span class="text-green-600 font-semibold">Gratuit</span>
                    </div>
                </div>
                
                <div class="flex justify-between text-lg font-bold text-gray-900 bg-orange-50 p-4 rounded-lg">
                    <span>TOTAL</span>
                    <span class="text-orange-500"><?php echo number_format($total, 2, ',', ' '); ?> €</span>
                </div>
                
                <div class="mt-6 pt-6 border-t border-gray-200 space-y-2 text-xs text-gray-600">
                    <p>✓ Paiement 100% sécurisé</p>
                    <p>✓ Accès immédiat après validation</p>
                    <p>✓ Pas de frais cachés</p>
                    <p>✓ Facture automatique par email</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('checkout-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Collect form data
    const formData = new FormData(this);
    const data = {
        first_name: formData.get('first_name'),
        last_name: formData.get('last_name'),
        email: formData.get('email'),
        phone: formData.get('phone'),
        company: formData.get('company'),
        address: formData.get('address'),
        postal_code: formData.get('postal_code'),
        city: formData.get('city'),
        cart_total: '<?php echo $total; ?>',
    };
    
    // For now, just show success and clear cart
    // In the future, you can add payment gateway integration here
    
    alert('Commande validée ! Vous recevrez une confirmation par email.');
    
    // Optionally clear cart
    // fetch(oblink_cart.ajax_url, {
    //     method: 'POST',
    //     body: 'action=oblink_clear_cart&nonce=' + oblink_cart.nonce
    // }).then(() => {
    //     window.location.href = '<?php echo home_url('/'); ?>';
    // });
});
</script>

</div>
<?php
get_footer();

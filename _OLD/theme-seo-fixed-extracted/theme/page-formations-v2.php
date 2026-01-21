<?php
/**
 * Template Name: Formations
 * 
 * Catalogue des formations
 */

// Initialize session for cart
if (!session_id()) {
    session_start();
}

get_header();

// Sample formations data from OBLINK
$formations = [
    [
        'id' => 1,
        'name' => 'Pass Examen BTS',
        'description' => '27 ans d\'annales corrigées avec IA',
        'price' => 29,
        'original_price' => 99,
        'duration' => 'Accès illimité',
        'level' => 'BTS Opticien',
        'icon' => 'fas fa-graduation-cap',
    ],
    [
        'id' => 2,
        'name' => 'Pack Réussite VAE',
        'description' => 'Préparation complète à la VAE',
        'price' => 29,
        'original_price' => 99,
        'duration' => 'Accès illimité',
        'level' => 'VAE Opticien',
        'icon' => 'fas fa-certificate',
    ],
    [
        'id' => 3,
        'name' => 'Formation ERP Silhouette',
        'description' => 'Maîtrisez le système ERP complet',
        'price' => 199,
        'original_price' => 499,
        'duration' => '8 semaines',
        'level' => 'Intermédiaire',
        'icon' => 'fas fa-cogs',
    ],
    [
        'id' => 4,
        'name' => 'Certif. Verres Progressifs',
        'description' => 'Spécialisation verres progressifs',
        'price' => 79,
        'original_price' => 199,
        'duration' => '4 semaines',
        'level' => 'Avancé',
        'icon' => 'fas fa-eye',
    ],
];
?>

<div class="max-w-6xl mx-auto">
    <div class="mb-12">
        <h1 class="text-4xl font-bold mb-4">Nos Formations</h1>
        <p class="text-xl text-gray-600">Développez vos compétences en optique avec nos formations certifiantes</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
        <?php foreach ($formations as $formation): 
            $discount = round((($formation['original_price'] - $formation['price']) / $formation['original_price']) * 100);
        ?>
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 h-32 flex items-center justify-center relative">
                    <i class="<?php echo $formation['icon']; ?> text-white text-4xl"></i>
                    <?php if ($discount > 0): ?>
                        <div class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            -<?php echo $discount; ?>%
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo $formation['name']; ?></h3>
                    <p class="text-gray-600 text-sm mb-4"><?php echo $formation['description']; ?></p>
                    
                    <div class="flex justify-between items-center text-xs text-gray-500 mb-4 pb-4 border-b border-gray-100">
                        <span><i class="fas fa-clock mr-1"></i><?php echo $formation['duration']; ?></span>
                        <span><i class="fas fa-chart-line mr-1"></i><?php echo $formation['level']; ?></span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <div>
                            <?php if ($formation['original_price'] > $formation['price']): ?>
                                <p class="text-xs text-gray-400 line-through"><?php echo number_format($formation['original_price'], 2, ',', ' '); ?> €</p>
                            <?php endif; ?>
                            <p class="text-2xl font-bold text-orange-500"><?php echo number_format($formation['price'], 2, ',', ' '); ?> €</p>
                        </div>
                        
                        <button class="add-to-cart px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition" 
                                data-product-id="<?php echo $formation['id']; ?>"
                                data-type="formation"
                                data-name="<?php echo esc_attr($formation['name']); ?>"
                                data-price="<?php echo $formation['price']; ?>">
                            <i class="fas fa-shopping-cart mr-2"></i>Ajouter
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const type = this.dataset.type;
            const name = this.dataset.name;
            const price = this.dataset.price;
            
            fetch(oblink_cart.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=oblink_add_to_cart&product_id=' + productId + '&type=' + type + '&name=' + encodeURIComponent(name) + '&price=' + price + '&quantity=1&nonce=' + oblink_cart.nonce
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    alert('✓ ' + data.data.message + ' (' + data.data.cart_count + ' article' + (data.data.cart_count > 1 ? 's' : '') + ')');
                    // Redirect to cart after adding item
                    setTimeout(() => {
                        window.location.href = '<?php echo home_url('/panier'); ?>';
                    }, 500);
                }
            });
        });
    });
});
</script>

</div>
<?php
get_footer();

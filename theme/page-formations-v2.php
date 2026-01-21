<?php
/*
Template Name: Formations
*/
get_header();
?>

<div class="min-h-screen bg-gradient-to-br from-oblink-beige/10 to-white pt-32 pb-20">

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 mb-12">
        <div class="text-center mb-8">
            <span
                class="inline-block px-4 py-2 bg-oblink-orange/10 text-oblink-orange font-bold text-sm rounded-full mb-4 uppercase tracking-wider">
                <i class="fas fa-store mr-2"></i>Notre Catalogue
            </span>
            <h1 class="text-4xl md:text-5xl font-bold font-display text-oblink-gray mb-4">
                Nos <span class="text-oblink-blue">Formations</span> & Produits
            </h1>
            <p class="text-lg text-oblink-gray/70 max-w-2xl mx-auto">
                Des solutions pensées pour les professionnels de l'optique : formations, certifications et outils pour développer vos compétences.
            </p>
        </div>

        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-8">
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" id="product-search"
                    class="w-full pl-12 pr-4 py-4 rounded-2xl border-2 border-oblink-beige focus:border-oblink-blue outline-none transition"
                    placeholder="Rechercher un service...">
            </div>
        </div>

        <!-- Category Filters -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button
                class="filter-btn active bg-gradient-to-r from-oblink-orange to-oblink-violet text-white px-6 py-3 rounded-xl font-bold transition hover:shadow-lg"
                data-category="all">
                <i class="fas fa-th-large mr-2"></i>Tous
            </button>
            <button
                class="filter-btn bg-white/60 backdrop-blur-xl border border-white/40 text-oblink-gray px-6 py-3 rounded-xl font-bold transition hover:shadow-lg"
                data-category="formation">
                <i class="fas fa-graduation-cap mr-2"></i>Formations
            </button>
            <button
                class="filter-btn bg-white/60 backdrop-blur-xl border border-white/40 text-oblink-gray px-6 py-3 rounded-xl font-bold transition hover:shadow-lg"
                data-category="certification">
                <i class="fas fa-award mr-2"></i>Certifications
            </button>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="max-w-7xl mx-auto px-4">
        <div id="products-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Pass Examen BTS -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="formation">
                <div class="h-48 bg-gradient-to-br from-oblink-orange/20 to-yellow-200 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-6xl text-oblink-orange"></i>
                </div>
                <div class="p-6">
                    <span class="inline-block px-3 py-1 bg-oblink-orange/10 text-oblink-orange text-xs font-bold rounded-full mb-3">Préparation Examen</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Pass Examen BTS</h3>
                    <p class="text-sm text-gray-600 mb-4">27 ans d'annales corrigées + Chatbot Tuteur IA illimité pour réussir votre BTS.</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-3xl font-bold text-oblink-orange">29€</span>
                        <span class="text-gray-500">TTC</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-orange mt-0.5"></i>Annales 27 ans</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-orange mt-0.5"></i>Chatbot Tuteur IA</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-orange mt-0.5"></i>Accès 24/7</li>
                    </ul>
                    <button class="add-to-cart-btn w-full py-3 bg-oblink-orange text-white rounded-xl font-bold hover:bg-oblink-gray transition shadow-lg"
                        data-id="pass-bts" data-name="Pass Examen BTS" data-price="29" data-category="Formation">
                        <i class="fas fa-shopping-cart mr-2"></i>Ajouter au panier
                    </button>
                </div>
            </div>

            <!-- Pack Réussite VAE -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="formation">
                <div class="h-48 bg-gradient-to-br from-indigo-200 to-oblink-blue/20 flex items-center justify-center">
                    <i class="fas fa-certificate text-6xl text-indigo-600"></i>
                </div>
                <div class="p-6">
                    <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 text-xs font-bold rounded-full mb-3">Validation des Acquis</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Pack Réussite VAE</h3>
                    <p class="text-sm text-gray-600 mb-4">Aide rédaction Livret 2 avec IA + préparation aux questions du Jury.</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-3xl font-bold text-indigo-600">29€</span>
                        <span class="text-gray-500">TTC</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-indigo-600 mt-0.5"></i>Livret 2 assisté IA</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-indigo-600 mt-0.5"></i>Questions pièges</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-indigo-600 mt-0.5"></i>Suivi personnalisé</li>
                    </ul>
                    <button class="add-to-cart-btn w-full py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-oblink-gray transition shadow-lg"
                        data-id="pack-vae" data-name="Pack Réussite VAE" data-price="29" data-category="Formation">
                        <i class="fas fa-shopping-cart mr-2"></i>Ajouter au panier
                    </button>
                </div>
            </div>

            <!-- Formation ERP Silhouette -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="certification">
                <div class="h-48 bg-gradient-to-br from-green-200 to-oblink-blue/20 flex items-center justify-center">
                    <i class="fas fa-award text-6xl text-green-600"></i>
                </div>
                <div class="p-6">
                    <span class="inline-block px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full mb-3">Certification Pro</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Formation ERP Silhouette</h3>
                    <p class="text-sm text-gray-600 mb-4">Validez vos compétences sur le logiciel leader du marché optique.</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-3xl font-bold text-green-600">49€</span>
                        <span class="text-gray-500">TTC</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-600 mt-0.5"></i>Modules complets</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-600 mt-0.5"></i>Test validé</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-600 mt-0.5"></i>Badge profil</li>
                    </ul>
                    <button class="add-to-cart-btn w-full py-3 bg-green-600 text-white rounded-xl font-bold hover:bg-oblink-gray transition shadow-lg"
                        data-id="formation-erp" data-name="Formation ERP Silhouette" data-price="49" data-category="Certification">
                        <i class="fas fa-shopping-cart mr-2"></i>Ajouter au panier
                    </button>
                </div>
            </div>

            <!-- Formation Cosium -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="certification">
                <div class="h-48 bg-gradient-to-br from-blue-200 to-oblink-violet/20 flex items-center justify-center">
                    <i class="fas fa-laptop text-6xl text-blue-600"></i>
                </div>
                <div class="p-6">
                    <span class="inline-block px-3 py-1 bg-blue-100 text-blue-600 text-xs font-bold rounded-full mb-3">Certification Pro</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Formation Cosium</h3>
                    <p class="text-sm text-gray-600 mb-4">Maîtrisez le logiciel Cosium pour optimiser votre activité optique.</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-3xl font-bold text-blue-600">49€</span>
                        <span class="text-gray-500">TTC</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-blue-600 mt-0.5"></i>Formation complète</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-blue-600 mt-0.5"></i>Support inclus</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-blue-600 mt-0.5"></i>Certificat</li>
                    </ul>
                    <button class="add-to-cart-btn w-full py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-oblink-gray transition shadow-lg"
                        data-id="formation-cosium" data-name="Formation Cosium" data-price="49" data-category="Certification">
                        <i class="fas fa-shopping-cart mr-2"></i>Ajouter au panier
                    </button>
                </div>
            </div>

            <!-- Certification Multi-Logiciels -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="certification">
                <div class="h-48 bg-gradient-to-br from-purple-200 to-oblink-violet/20 flex items-center justify-center">
                    <i class="fas fa-certificate text-6xl text-purple-600"></i>
                </div>
                <div class="p-6">
                    <span class="inline-block px-3 py-1 bg-purple-100 text-purple-600 text-xs font-bold rounded-full mb-3">Certification Pro</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Certification Multi-Logiciels</h3>
                    <p class="text-sm text-gray-600 mb-4">Validez vos compétences sur les principaux logiciels optiques du marché.</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-3xl font-bold text-purple-600">79€</span>
                        <span class="text-gray-500">TTC</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-purple-600 mt-0.5"></i>3 logiciels couverts</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-purple-600 mt-0.5"></i>Accès illimité</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-purple-600 mt-0.5"></i>Support expert</li>
                    </ul>
                    <button class="add-to-cart-btn w-full py-3 bg-purple-600 text-white rounded-xl font-bold hover:bg-oblink-gray transition shadow-lg"
                        data-id="cert-multi" data-name="Certification Multi-Logiciels" data-price="79" data-category="Certification">
                        <i class="fas fa-shopping-cart mr-2"></i>Ajouter au panier
                    </button>
                </div>
            </div>

        </div>

        <!-- No Results Message -->
        <div id="no-results" class="hidden text-center py-20">
            <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
            <p class="text-xl text-gray-400">Aucun service trouvé</p>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const productCards = document.querySelectorAll('.product-card');
        const searchInput = document.getElementById('product-search');
        const noResults = document.getElementById('no-results');

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                const category = this.getAttribute('data-category');
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-gradient-to-r', 'from-oblink-orange', 'to-oblink-violet', 'text-white');
                    btn.classList.add('bg-white/60', 'backdrop-blur-xl', 'border', 'border-white/40', 'text-oblink-gray');
                });
                this.classList.add('active', 'bg-gradient-to-r', 'from-oblink-orange', 'to-oblink-violet', 'text-white');
                this.classList.remove('bg-white/60', 'backdrop-blur-xl', 'border', 'border-white/40', 'text-oblink-gray');
                filterProducts(category, searchInput.value);
            });
        });

        const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function () {
                const item = {
                    id: this.getAttribute('data-id'),
                    name: this.getAttribute('data-name'),
                    price: parseFloat(this.getAttribute('data-price')),
                    category: this.getAttribute('data-category')
                };

                let cart = JSON.parse(localStorage.getItem('oblink_cart')) || [];
                const existingItem = cart.find(i => i.id === item.id);
                
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    item.quantity = 1;
                    cart.push(item);
                }
                
                localStorage.setItem('oblink_cart', JSON.stringify(cart));
                window.location.href = '<?php echo home_url('/panier'); ?>';
            });
        });

        searchInput.addEventListener('input', function () {
            const activeCategory = document.querySelector('.filter-btn.active').getAttribute('data-category');
            filterProducts(activeCategory, this.value);
        });

        function filterProducts(category, searchTerm) {
            let visibleCount = 0;
            searchTerm = searchTerm.toLowerCase();

            productCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                const cardText = card.textContent.toLowerCase();

                const matchesCategory = category === 'all' || cardCategory === category;
                const matchesSearch = searchTerm === '' || cardText.includes(searchTerm);

                if (matchesCategory && matchesSearch) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 50);
                    visibleCount++;
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });

            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        }
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>
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

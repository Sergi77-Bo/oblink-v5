<?php
/*
Template Name: Nos Offres
*/
include 'header-inc.php';
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
                Nos <span class="text-oblink-blue">Offres</span> OBLINK
            </h1>
            <p class="text-lg text-oblink-gray/70 max-w-2xl mx-auto">
                Des solutions pensées pour les professionnels de l'optique : abonnements recruteurs,
                outils de formation, et services partenaires pour développer votre activité.
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
                <i class="fas fa-th-large mr-2"></i>Toutes nos offres
            </button>
            <button
                class="filter-btn bg-white/60 backdrop-blur-xl border border-white/40 text-oblink-gray px-6 py-3 rounded-xl font-bold transition hover:shadow-lg"
                data-category="b2b">
                <i class="fas fa-building mr-2"></i>Recruteurs (B2B)
            </button>
            <button
                class="filter-btn bg-white/60 backdrop-blur-xl border border-white/40 text-oblink-gray px-6 py-3 rounded-xl font-bold transition hover:shadow-lg"
                data-category="b2c">
                <i class="fas fa-graduation-cap mr-2"></i>Étudiants & Pros (B2C)
            </button>
            <button
                class="filter-btn bg-white/60 backdrop-blur-xl border border-white/40 text-oblink-gray px-6 py-3 rounded-xl font-bold transition hover:shadow-lg"
                data-category="partenaires">
                <i class="fas fa-handshake mr-2"></i>Services Partenaires
            </button>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="max-w-7xl mx-auto px-4">
        <div id="products-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- B2B: Abonnement Premium -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="b2b">
                <div
                    class="h-48 bg-gradient-to-br from-oblink-blue/20 to-oblink-violet/20 flex items-center justify-center relative">
                    <i class="fas fa-crown text-6xl text-oblink-blue"></i>
                    <span
                        class="absolute top-4 right-4 bg-oblink-orange text-white text-xs font-bold px-3 py-1 rounded-full">MRR</span>
                </div>
                <div class="p-6">
                    <span
                        class="inline-block px-3 py-1 bg-oblink-blue/10 text-oblink-blue text-xs font-bold rounded-full mb-3">Abonnement Recruteur</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Abonnement Premium</h3>
                    <p class="text-sm text-gray-600 mb-4">Publiez des offres illimitées et accédez à tous les profils d'opticiens qualifiés.
                    </p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-3xl font-bold text-oblink-blue">49€</span>
                        <span class="text-gray-500">/mois HT</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-blue mt-0.5"></i>Offres
                            d'emploi illimitées</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-blue mt-0.5"></i>Profils
                            défloutés (CV-thèque)</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-blue mt-0.5"></i>Badge
                            "Recruteur Vérifié"</li>
                    </ul>
                    <a href="<?php echo home_url('/abonnements'); ?>"
                        class="block w-full py-3 border-2 border-oblink-blue text-oblink-blue text-center rounded-xl font-bold hover:bg-oblink-blue hover:text-white transition mb-2">
                        En savoir plus
                    </a>
                    <button
                        class="add-to-cart-btn w-full py-3 bg-oblink-blue text-white rounded-xl font-bold hover:bg-oblink-gray transition shadow-lg"
                        data-id="premium-b2b" data-name="Abonnement Premium" data-price="49"
                        data-category="B2B - Magasins">
                        <i class="fas fa-shopping-cart mr-2"></i>Ajouter au panier
                    </button>
                </div>
            </div>

            <!-- B2B: Offre Corporate -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="b2b">
                <div class="h-48 bg-gradient-to-br from-oblink-violet/20 to-gray-300 flex items-center justify-center">
                    <i class="fas fa-building text-6xl text-oblink-violet"></i>
                </div>
                <div class="p-6">
                    <span
                        class="inline-block px-3 py-1 bg-oblink-violet/10 text-oblink-violet text-xs font-bold rounded-full mb-3">Grandes Enseignes</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Offre Corporate</h3>
                    <p class="text-sm text-gray-600 mb-4">API RH, facturation centralisée, gestion multi-magasins pour les groupes.</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-2xl font-bold text-oblink-violet">Sur devis</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-violet mt-0.5"></i>API RH
                            (Krys, Afflelou)</li>
                        <li class="flex items-start gap-2"><i
                                class="fas fa-check text-oblink-violet mt-0.5"></i>Facturation centralisée</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-violet mt-0.5"></i>Gestion
                            multi-comptes</li>
                    </ul>
                    <a href="<?php echo home_url('/contact'); ?>"
                        class="mt-4 block w-full py-3 bg-oblink-violet text-white text-center rounded-xl font-bold hover:bg-oblink-gray transition">
                        Demander un devis
                    </a>
                </div>
            </div>

            <!-- B2C: Pass Examen BTS -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="b2c">
                <div
                    class="h-48 bg-gradient-to-br from-oblink-orange/20 to-yellow-200 flex items-center justify-center relative">
                    <i class="fas fa-graduation-cap text-6xl text-oblink-orange"></i>
                    <span
                        class="absolute top-4 right-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">🔥
                        Lancement</span>
                </div>
                <div class="p-6">
                    <span
                        class="inline-block px-3 py-1 bg-oblink-orange/10 text-oblink-orange text-xs font-bold rounded-full mb-3">Préparation Examen</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Pass Examen BTS</h3>
                    <p class="text-sm text-gray-600 mb-4">27 ans d'annales corrigées + Chatbot Tuteur IA illimité pour réussir votre BTS.</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-3xl font-bold text-oblink-orange">29€</span>
                        <span class="text-gray-500">TTC</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-orange mt-0.5"></i>Annales
                            27 ans corrigées</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-orange mt-0.5"></i>Chatbot
                            Tuteur IA illimité</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-oblink-orange mt-0.5"></i>Accès
                            immédiat 24/7</li>
                    </ul>
                    <a href="<?php echo home_url('/pass-examen'); ?>"
                        class="mt-4 block w-full py-3 bg-oblink-orange text-white text-center rounded-xl font-bold hover:bg-oblink-gray transition">
                        Acheter maintenant
                    </a>
                </div>
            </div>

            <!-- B2C: Pack Réussite VAE -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="b2c">
                <div class="h-48 bg-gradient-to-br from-indigo-200 to-oblink-blue/20 flex items-center justify-center">
                    <i class="fas fa-certificate text-6xl text-indigo-600"></i>
                </div>
                <div class="p-6">
                    <span
                        class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 text-xs font-bold rounded-full mb-3">Validation des Acquis</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Pack Réussite VAE</h3>
                    <p class="text-sm text-gray-600 mb-4">Aide rédaction Livret 2 avec IA + préparation aux questions du Jury.</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-3xl font-bold text-indigo-600">29€ - 49€</span>
                        <span class="text-gray-500">TTC</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-indigo-600 mt-0.5"></i>Rédaction
                            Livret 2 assistée IA</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-indigo-600 mt-0.5"></i>Questions
                            pièges Jury</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-indigo-600 mt-0.5"></i>Suivi
                            personnalisé</li>
                    </ul>
                    <a href="<?php echo home_url('/pass-vae'); ?>"
                        class="mt-4 block w-full py-3 bg-indigo-600 text-white text-center rounded-xl font-bold hover:bg-oblink-gray transition">
                        Découvrir
                    </a>
                </div>
            </div>

            <!-- B2C: Certification Logiciel -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="b2c">
                <div class="h-48 bg-gradient-to-br from-green-200 to-oblink-blue/20 flex items-center justify-center">
                    <i class="fas fa-award text-6xl text-green-600"></i>
                </div>
                <div class="p-6">
                    <span
                        class="inline-block px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full mb-3">Certification Pro</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Certification Logiciel</h3>
                    <p class="text-sm text-gray-600 mb-4">Validez vos compétences (Cosium, Optistya...) et affichez le badge sur votre profil.</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-3xl font-bold text-green-600">49€</span>
                        <span class="text-gray-500">/module TTC</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-600 mt-0.5"></i>Test de
                            compétence validé</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-600 mt-0.5"></i>Badge
                            "Certifié" sur profil</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-600 mt-0.5"></i>Meilleure
                            visibilité recruteurs</li>
                    </ul>
                    <a href="<?php echo home_url('/formation-erp'); ?>"
                        class="mt-4 block w-full py-3 bg-green-600 text-white text-center rounded-xl font-bold hover:bg-oblink-gray transition">
                        Se certifier
                    </a>
                </div>
            </div>

            <!-- Partenaires: Services Gratuits -->
            <div class="product-card bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/50 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105"
                data-category="partenaires">
                <div class="h-48 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center relative">
                    <i class="fas fa-handshake text-6xl text-gray-600"></i>
                    <span
                        class="absolute top-4 right-4 bg-purple-500 text-white text-xs font-bold px-3 py-1 rounded-full">GRATUIT</span>
                </div>
                <div class="p-6">
                    <span
                        class="inline-block px-3 py-1 bg-gray-200 text-gray-700 text-xs font-bold rounded-full mb-3">Outils Freelance</span>
                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Services Partenaires</h3>
                    <p class="text-sm text-gray-600 mb-4">Compte Pro (Qonto), Assurance RC (Hiscox), Comptabilité, Création Société.</p>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-3xl font-bold text-purple-600">0€</span>
                        <span class="text-gray-500">pour vous</span>
                    </div>
                    <ul class="text-xs text-gray-600 space-y-2 mb-4">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-purple-600 mt-0.5"></i>Compte Pro
                            (Qonto, Shine)</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-purple-600 mt-0.5"></i>Assurance
                            RC Pro</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-purple-600 mt-0.5"></i>Logiciel
                            compta, Création société</li>
                    </ul>
                    <a href="<?php echo home_url('/guide-creation-entreprise'); ?>"
                        class="mt-4 block w-full py-3 bg-purple-600 text-white text-center rounded-xl font-bold hover:bg-oblink-gray transition">
                        Voir les partenaires
                    </a>
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

        // Filter by category
        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                const category = this.getAttribute('data-category');

                // Update active button
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-gradient-to-r', 'from-oblink-orange', 'to-oblink-violet', 'text-white');
                    btn.classList.add('bg-white/60', 'backdrop-blur-xl', 'border', 'border-white/40', 'text-oblink-gray');
                });
                this.classList.add('active', 'bg-gradient-to-r', 'from-oblink-orange', 'to-oblink-violet', 'text-white');
                this.classList.remove('bg-white/60', 'backdrop-blur-xl', 'border', 'border-white/40', 'text-oblink-gray');

                filterProducts(category, searchInput.value);
            });
        });

        // Search functionality
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

            // Show/hide no results message
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
<?php
/*
Template Name: Produit - Verres Progressifs
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-gradient-to-br from-oblink-beige/10 to-white pt-32 pb-20">

    <div class="max-w-6xl mx-auto px-4">

        <!-- Breadcrumb -->
        <div class="mb-8">
            <a href="<?php echo home_url('/'); ?>" class="text-oblink-blue hover:underline">Accueil</a>
            <span class="mx-2 text-gray-400">/</span>
            <a href="<?php echo home_url('/produits'); ?>" class="text-oblink-blue hover:underline">Produits</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-600">Verres Progressifs</span>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">

            <!-- Product Image -->
            <div
                class="bg-gradient-to-br from-oblink-blue/20 to-oblink-violet/20 rounded-3xl flex items-center justify-center p-12 backdrop-blur-xl border border-white/50">
                <i class="fas fa-glasses text-9xl text-oblink-blue"></i>
            </div>

            <!-- Product Info -->
            <div>
                <span
                    class="inline-block px-4 py-2 bg-oblink-blue/10 text-oblink-blue text-sm font-bold rounded-full mb-4">Verres</span>

                <h1 class="text-4xl font-bold text-oblink-gray mb-4">Verres Progressifs Haute Définition</h1>

                <p class="text-lg text-gray-600 mb-6">
                    Nos verres progressifs offrent une vision parfaite à toutes les distances. Technologie de pointe
                    pour un confort visuel optimal.
                </p>

                <!-- Price -->
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 mb-6 border border-white/50">
                    <div class="flex items-baseline gap-3 mb-2">
                        <span class="text-4xl font-bold text-oblink-orange">À partir de 150€</span>
                        <span class="text-gray-500 line-through">200€</span>
                    </div>
                    <p class="text-sm text-green-600 font-semibold">
                        <i class="fas fa-check-circle mr-1"></i>Prix incluant le montage
                    </p>
                </div>

                <!-- Features -->
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 mb-6 border border-white/50">
                    <h3 class="text-xl font-bold text-oblink-gray mb-4">Caractéristiques</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check text-oblink-blue mt-1"></i>
                            <span class="text-gray-700">Technologie Vision HD pour une clarté exceptionnelle</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check text-oblink-blue mt-1"></i>
                            <span class="text-gray-700">Traitement anti-reflets multi-couches</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check text-oblink-blue mt-1"></i>
                            <span class="text-gray-700">Protection UV 100%</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check text-oblink-blue mt-1"></i>
                            <span class="text-gray-700">Traitement anti-rayures et hydrophobe</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check text-oblink-blue mt-1"></i>
                            <span class="text-gray-700">Adaptation rapide garantie</span>
                        </li>
                    </ul>
                </div>

                <!-- CTA Buttons -->
                <div class="space-y-3">
                    <a href="<?php echo home_url('/contact'); ?>"
                        class="block w-full py-4 bg-oblink-blue text-white text-center rounded-xl font-bold text-lg hover:bg-oblink-gray transition shadow-lg">
                        <i class="fas fa-envelope mr-2"></i>Demander un devis
                    </a>
                    <a href="<?php echo home_url('/produits'); ?>"
                        class="block w-full py-4 border-2 border-oblink-blue text-oblink-blue text-center rounded-xl font-bold hover:bg-oblink-blue hover:text-white transition">
                        <i class="fas fa-arrow-left mr-2"></i>Retour aux produits
                    </a>
                </div>
            </div>

        </div>

        <!-- Additional Info Tabs -->
        <div class="mt-16">
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 border border-white/50">
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-oblink-blue/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shipping-fast text-2xl text-oblink-blue"></i>
                        </div>
                        <h4 class="font-bold text-oblink-gray mb-2">Livraison Rapide</h4>
                        <p class="text-sm text-gray-600">Sous 7 jours ouvrés</p>
                    </div>
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-oblink-orange/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-2xl text-oblink-orange"></i>
                        </div>
                        <h4 class="font-bold text-oblink-gray mb-2">Garantie 2 ans</h4>
                        <p class="text-sm text-gray-600">Satisfaction assurée</p>
                    </div>
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-oblink-violet/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-headset text-2xl text-oblink-violet"></i>
                        </div>
                        <h4 class="font-bold text-oblink-gray mb-2">Support Expert</h4>
                        <p class="text-sm text-gray-600">Assistance 7j/7</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>
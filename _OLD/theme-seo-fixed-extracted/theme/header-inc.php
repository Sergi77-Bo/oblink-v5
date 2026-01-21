<?php
// OBLINK - Header Universel (Inc)
// Ce fichier est inclus manuellement dans chaque page pour garantir l'affichage du menu
// peu importe la configuration WordPress.
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    // Load SEO Meta System
    require_once get_template_directory() . '/inc/seo-meta.php';

    // Output SEO Meta Tags (title, description, OG, Twitter)
    oblink_output_seo_meta();

    // Output JSON-LD Structured Data
    oblink_output_json_ld();
    ?>

    <?php wp_head(); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'oblink-orange': '#FF6600',
                        'oblink-blue': '#0099FF',
                        'oblink-violet': '#9A48D0',
                        'oblink-gray': '#303030',
                    },
                    fontFamily: {
                        'display': ['Overpass', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Overpass:wght@700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Dropdown Menu Animation */
        .group:hover .group-hover\:visible {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
        }

        /* Mobile Menu Animation */
        #mobile-menu {
            display: none;
            /* Hidden by default */
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #mobile-menu.open {
            display: block;
            /* Show when open */
            max-height: 100vh;
            opacity: 1;
        }
    </style>
</head>

<body <?php body_class('bg-white text-oblink-gray font-body'); ?>>

    <!-- HEADER UNIVERSEL (INCRUSTÉ) -->
    <header class="fixed w-full top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- LOGO (Image PNG) -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="<?php echo home_url('/'); ?>" class="flex items-center group no-underline">
                        <!-- Utilisation du logo image généré -->
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="OBLINK"
                            class="h-12 w-auto object-contain hover:scale-105 transition-transform duration-300">
                    </a>
                </div>

                <!-- DESKTOP NAV -->
                <nav class="hidden md:flex space-x-8 items-center">
                    <a href="<?php echo home_url('/'); ?>"
                        class="text-oblink-gray hover:text-oblink-orange font-medium">Accueil</a>
                    <!-- Dropdown Candidat -->
                    <div class="relative group">
                        <button class="text-oblink-gray hover:text-oblink-orange font-medium flex items-center py-5">
                            Je cherche un job <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <!-- Correction Z-Index et Position -->
                        <div
                            class="absolute left-0 mt-0 w-96 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-200 z-50 top-full transform translate-y-2 group-hover:translate-y-0">
                            <div class="p-4 space-y-2">
                                <a href="<?php echo home_url('/opticien-2'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 text-oblink-blue flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Découvrir nos services</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Tout savoir sur OBLINK pour
                                            opticiens.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/emploi-opticien'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Trouver une mission</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Accédez à des centaines
                                            d'offres de remplacement.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/inscription-opticien'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Créer mon compte</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Rejoignez la communauté OBLINK.
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Dropdown Entreprise -->
                    <div class="relative group">
                        <button class="text-oblink-gray hover:text-oblink-blue font-medium flex items-center py-5">
                            Je recrute <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-96 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-200 z-50 top-full transform translate-y-2 group-hover:translate-y-0">
                            <div class="p-4 space-y-2">
                                <a href="<?php echo home_url('/pour-entreprise'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-blue-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Découvrir nos solutions</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Toutes les offres pour recruter
                                            efficacement.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/publier-offre'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-blue-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 text-oblink-blue flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Déposer une offre</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Publiez une annonce en quelques
                                            clics.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-blue-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Créer un compte</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Inscrivez votre établissement.
                                        </p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/recherche-opticiens'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-blue-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 text-oblink-blue flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Explorer les profils</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Accédez directement aux
                                            meilleurs profils disponibles.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/abonnements'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-blue-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 text-oblink-blue flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Tarifs</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Des solutions flexibles
                                            adaptées à tous vos besoins.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>


                    <!-- NEW: Dropdown Ressources -->
                    <div class="relative group">
                        <button class="text-oblink-gray hover:text-oblink-violet font-medium flex items-center py-5">
                            Ressources <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-96 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-200 z-50 top-full transform translate-y-2 group-hover:translate-y-0">
                            <div class="p-4 space-y-2">
                                <a href="<?php echo home_url('/blog'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-violet-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-violet-100 text-oblink-violet flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Blog</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Actualités et conseils pour
                                            professionnels.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/observatoire'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-violet-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-violet-100 text-oblink-violet flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Baromètre Salaires 2026</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Étude complète des
                                            rémunérations.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/simulateur'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-violet-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-violet-100 text-oblink-violet flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-calculator"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Simulateur revenus</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Estimez vos revenus nets.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/comparatif-verres'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-violet-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-violet-100 text-oblink-violet flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-glasses"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Comparatif Verres</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Analysez les gammes de verres.
                                        </p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/formation-erp'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-violet-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-violet-100 text-oblink-violet flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Académie Oblink</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Formations certifiantes et
                                            tutoriels.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/pass-vae'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-indigo-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Pass VAE</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Validation des Acquis de
                                            l'Expérience.
                                        </p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/contactologie'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-violet-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-violet-100 text-oblink-violet flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Contactologie</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Guides lentilles de contact.
                                        </p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/guide-creation-entreprise'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-violet-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-violet-100 text-oblink-violet flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Guide Création Entreprise</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Les étapes clés pour se lancer.
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Produits Link -->
                    <a href="<?php echo home_url('/produits'); ?>"
                        class="text-oblink-gray hover:text-oblink-blue font-medium">Produits</a>
                </nav>

                <!-- SEARCH + CART + ACTIONS (JS INJECTED via Supabase) -->
                <div id="header-auth-actions" class="hidden md:flex items-center space-x-4">
                    <!-- Cart Button -->
                    <a href="<?php echo home_url('/panier'); ?>"
                        class="relative text-oblink-gray hover:text-oblink-orange transition" aria-label="Panier">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span id="cart-badge"
                            class="absolute -top-2 -right-2 bg-oblink-orange text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center hidden">
                            0
                        </span>
                    </a>
                    <!-- Search Button -->
                    <button type="button" id="search-btn" class="text-oblink-gray hover:text-oblink-orange transition"
                        aria-label="Rechercher">
                        <i class="fas fa-search text-xl"></i>
                    </button>
                    <!-- Default State (Loading or Guest) -->
                    <a href="<?php echo home_url('/login?redirect=' . urlencode($_SERVER['REQUEST_URI'])); ?>"
                        class="text-sm font-semibold text-oblink-gray hover:text-oblink-orange">Connexion</a>

                    <!-- S'inscrire Dropdown -->
                    <div class="relative group z-50">
                        <button
                            class="px-5 py-2.5 bg-oblink-orange text-white rounded-lg font-bold shadow hover:bg-oblink-orange/90 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                            S'inscrire <i
                                class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                        </button>
                        <div
                            class="absolute right-0 top-full w-64 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-200 transform origin-top-right z-[9999]">
                            <div class="bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden mt-2">
                                <div class="p-3 space-y-2">
                                    <a href="<?php echo home_url('/inscription-opticien'); ?>"
                                        class="flex items-start p-3 rounded-lg hover:bg-orange-50 transition group/link">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-3 group-hover/link:scale-110 transition-transform">
                                            <i class="fas fa-user-md"></i>
                                        </div>
                                        <div>
                                            <span class="block text-sm font-bold text-gray-900">Je suis Opticien</span>
                                            <span class="block text-xs text-gray-500">Trouvez des missions</span>
                                        </div>
                                    </a>
                                    <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                                        class="flex items-start p-3 rounded-lg hover:bg-blue-50 transition group/link">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 text-oblink-blue flex items-center justify-center mr-3 group-hover/link:scale-110 transition-transform">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div>
                                            <span class="block text-sm font-bold text-gray-900">Je suis
                                                Entreprise</span>
                                            <span class="block text-xs text-gray-500">Recrutez des talents</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MOBILE MENU BUTTON -->
            <div class="flex md:hidden">
                <button type="button" id="mobile-menu-btn"
                    class="text-oblink-gray hover:text-oblink-orange focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
        </div>

        <!-- MOBILE MENU CONTENT -->
        <div id="mobile-menu"
            class="bg-white border-t border-gray-100 md:hidden shadow-xl absolute w-full left-0 top-20 max-h-[calc(100vh-5rem)] overflow-y-auto">
            <!-- Close Button -->
            <button type="button" onclick="closeMobileMenu()"
                class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition z-50">
                <i class="fas fa-times text-gray-600"></i>
            </button>
            <div class="px-4 pt-2 pb-6 space-y-1">
                <!-- Search Button Mobile -->
                <button type="button" id="search-btn-mobile"
                    class="w-full flex items-center gap-3 px-3 py-3 rounded-md text-base font-medium text-white bg-oblink-orange hover:bg-oblink-orange/90 transition shadow-md">
                    <i class="fas fa-search text-lg"></i>
                    <span>Rechercher sur le site</span>
                </button>

                <!-- Accueil -->
                <a href="<?php echo home_url('/'); ?>"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-orange hover:bg-orange-50"><i
                        class="fas fa-home mr-2"></i>Accueil</a>

                <!-- Je cherche un job -->
                <button type="button"
                    class="accordion-toggle w-full flex items-center justify-between px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider hover:text-oblink-orange transition">
                    <span>Je cherche un job</span>
                    <i class="fas fa-chevron-down text-xs transition-transform"></i>
                </button>
                <div class="accordion-content hidden">
                    <a href="<?php echo home_url('/opticien-2'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-orange hover:bg-orange-50"><i
                            class="fas fa-info-circle mr-2"></i>Découvrir nos services</a>
                    <a href="<?php echo home_url('/emploi-opticien'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-orange hover:bg-orange-50"><i
                            class="fas fa-search mr-2"></i>Trouver une mission</a>
                    <a href="<?php echo home_url('/inscription-opticien'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-orange hover:bg-orange-50"><i
                            class="fas fa-user-plus mr-2"></i>Créer mon compte</a>
                </div>

                <!-- Je recrute -->
                <button type="button"
                    class="accordion-toggle w-full flex items-center justify-between px-3 py-2 mt-4 text-xs font-semibold text-gray-400 uppercase tracking-wider hover:text-oblink-blue transition">
                    <span>Je recrute</span>
                    <i class="fas fa-chevron-down text-xs transition-transform"></i>
                </button>
                <div class="accordion-content hidden">
                    <a href="<?php echo home_url('/pour-entreprise'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-blue hover:bg-blue-50"><i
                            class="fas fa-info-circle mr-2"></i>Découvrir nos solutions</a>
                    <a href="<?php echo home_url('/publier-offre'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-blue hover:bg-blue-50"><i
                            class="fas fa-briefcase mr-2"></i>Publier une offre</a>
                    <a href="<?php echo home_url('/recherche-opticiens'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-blue hover:bg-blue-50"><i
                            class="fas fa-users mr-2"></i>Profils disponibles</a>
                    <a href="<?php echo home_url('/abonnements'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-blue hover:bg-blue-50"><i
                            class="fas fa-tags mr-2"></i>Tarifs</a>
                </div>

                <!-- Ressources -->
                <button type="button"
                    class="accordion-toggle w-full flex items-center justify-between px-3 py-2 mt-4 text-xs font-semibold text-gray-400 uppercase tracking-wider hover:text-oblink-violet transition">
                    <span>Ressources</span>
                    <i class="fas fa-chevron-down text-xs transition-transform"></i>
                </button>
                <div class="accordion-content hidden">
                    <a href="<?php echo home_url('/blog'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-violet hover:bg-violet-50"><i
                            class="fas fa-newspaper mr-2"></i>Blog</a>
                    <a href="<?php echo home_url('/observatoire'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-violet hover:bg-violet-50"><i
                            class="fas fa-chart-line mr-2"></i>Baromètre Salaires 2026</a>
                    <a href="<?php echo home_url('/simulateur'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-violet hover:bg-violet-50"><i
                            class="fas fa-calculator mr-2"></i>Simulateur revenus</a>
                    <a href="<?php echo home_url('/comparatif-verres'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-violet hover:bg-violet-50"><i
                            class="fas fa-glasses mr-2"></i>Comparatif Verres</a>
                    <a href="<?php echo home_url('/formation-erp'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-violet hover:bg-violet-50"><i
                            class="fas fa-graduation-cap mr-2"></i>Académie Oblink</a>
                    <a href="<?php echo home_url('/contactologie'); ?>"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-violet hover:bg-violet-50"><i
                            class="fas fa-eye mr-2"></i>Contactologie</a>
                </div>

                <!-- Produits Link -->
                <a href="<?php echo home_url('/produits'); ?>"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-blue hover:bg-blue-50 mt-4"><i
                        class="fas fa-shopping-bag mr-2"></i>Produits</a>

                <!-- Actions -->
                <div class="border-t border-gray-100 my-4 pt-4">
                    <a href="<?php echo home_url('/login?redirect=' . urlencode($_SERVER['REQUEST_URI'])); ?>"
                        class="block w-full text-center px-4 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 mb-3">Connexion</a>
                    <a href="<?php echo home_url('/inscription-opticien'); ?>"
                        class="block w-full text-center px-4 py-3 bg-oblink-orange text-white rounded-lg font-bold shadow-md mb-2">S'inscrire
                        Candidat</a>
                    <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                        class="block w-full text-center px-4 py-3 bg-oblink-blue text-white rounded-lg font-bold shadow-md">S'inscrire
                        Entreprise</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Search Modal -->
    <div id="search-modal"
        class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[100] hidden items-center justify-center">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full mx-4 overflow-hidden transform transition-all">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-oblink-gray">Rechercher</h3>
                    <button type="button" id="close-search" class="text-gray-400 hover:text-oblink-orange transition">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                <form action="<?php echo home_url('/'); ?>" method="get" class="relative">
                    <input type="search" name="s"
                        class="w-full px-6 py-4 pr-14 border-2 border-gray-200 rounded-xl focus:border-oblink-orange focus:outline-none text-lg transition"
                        placeholder="Rechercher des offres, articles, ressources..." autofocus>
                    <button type="submit"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-oblink-orange hover:text-oblink-gray transition">
                        <i class="fas fa-search text-xl"></i>
                    </button>
                </form>
                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="text-sm text-gray-500">Suggestions:</span>
                    <a href="<?php echo home_url('/emploi-opticien'); ?>"
                        class="text-sm px-3 py-1 bg-orange-50 text-oblink-orange rounded-full hover:bg-orange-100 transition">Offres
                        d'emploi</a>
                    <a href="<?php echo home_url('/blog'); ?>"
                        class="text-sm px-3 py-1 bg-violet-50 text-oblink-violet rounded-full hover:bg-violet-100 transition">Blog</a>
                    <a href="<?php echo home_url('/simulateur'); ?>"
                        class="text-sm px-3 py-1 bg-blue-50 text-oblink-blue rounded-full hover:bg-blue-100 transition">Simulateur</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Auth Dynamic Script -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/header-auth.js"></script>

    <!-- Mobile Menu Toggle Script -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('mobile-menu-overlay');
            menu.classList.toggle('open');
            overlay.classList.toggle('hidden');
        }

        function closeMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('mobile-menu-overlay');
            menu.classList.remove('open');
            overlay.classList.add('hidden');
        }

        // Toggle menu on button click
        document.getElementById('mobile-menu-btn').addEventListener('click', toggleMobileMenu);

        // Close menu when clicking on any link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // Search Modal Toggle
        const searchBtn = document.getElementById('search-btn');
        const searchBtnMobile = document.getElementById('search-btn-mobile');
        const searchModal = document.getElementById('search-modal');
        const closeSearch = document.getElementById('close-search');

        if (searchBtn) {
            searchBtn.addEventListener('click', function () {
                searchModal.classList.remove('hidden');
                searchModal.classList.add('flex');
            });
        }

        if (searchBtnMobile) {
            searchBtnMobile.addEventListener('click', function () {
                closeMobileMenu();
                searchModal.classList.remove('hidden');
                searchModal.classList.add('flex');
            });
        }

        if (closeSearch) {
            closeSearch.addEventListener('click', function () {
                searchModal.classList.add('hidden');
                searchModal.classList.remove('flex');
            });
        }

        // Mobile Menu Accordions
        document.querySelectorAll('.accordion-toggle').forEach(button => {
            button.addEventListener('click', function () {
                const content = this.nextElementSibling;
                const icon = this.querySelector('i');

                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });


        // Close modal on ESC key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && searchModal.classList.contains('flex')) {
                searchModal.classList.add('hidden');
                searchModal.classList.remove('flex');
            }
        });

        // Close modal on backdrop click
        searchModal.addEventListener('click', function (e) {
            if (e.target === searchModal) {
                searchModal.classList.add('hidden');
                searchModal.classList.remove('flex');
            }
        });
    </script>

    <div class="h-20"></div> <!-- Spacer for fixed header -->
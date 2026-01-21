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
    <title>OBLINK - Un opticien en un clin d'œil</title>
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
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #mobile-menu.open {
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
                    <!-- Dropdown Opticien -->
                    <div class="relative group">
                        <button class="text-oblink-gray hover:text-oblink-orange font-medium flex items-center py-5">
                            Pour Opticiens <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <!-- Correction Z-Index et Position -->
                        <div
                            class="absolute left-0 mt-0 w-96 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-200 z-50 top-full transform translate-y-2 group-hover:translate-y-0">
                            <div class="p-4 space-y-2">
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
                                <a href="<?php echo home_url('/simulateur'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-calculator"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Simulateur Revenus</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Estimez vos revenus nets
                                            freelance.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/comparatif-verres'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-glasses"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Comparatif Verres</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Analysez et comparez les gammes
                                            de verres.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/formation-erp'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Académie Oblink</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Maîtrisez les logiciels de
                                            gestion.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/contactologie'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Calculateur Lentilles</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Outil technique pour vos
                                            adaptations.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/generateur-de-contrat'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-file-contract"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Générateur de Contrat</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Créez vos contrats en quelques
                                            clics.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Dropdown Entreprise -->
                    <div class="relative group">
                        <button class="text-oblink-gray hover:text-oblink-blue font-medium flex items-center py-5">
                            Pour Entreprises <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-96 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-200 z-50 top-full transform translate-y-2 group-hover:translate-y-0">
                            <div class="p-4 space-y-2">
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

                    <a href="<?php echo home_url('/blog'); ?>"
                        class="text-oblink-gray hover:text-oblink-orange font-medium">Blog</a>
                </nav>

                <!-- ACTIONS (JS INJECTED via Supabase) -->
                <div id="header-auth-actions" class="hidden md:flex items-center space-x-4">
                    <!-- Default State (Loading or Guest) -->
                    <a href="<?php echo home_url('/login'); ?>"
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
                <button type="button" class="text-oblink-gray hover:text-oblink-orange focus:outline-none"
                    onclick="document.getElementById('mobile-menu').classList.toggle('open')">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
        </div>

        <!-- MOBILE MENU CONTENT -->
        <div id="mobile-menu"
            class="bg-white border-t border-gray-100 md:hidden shadow-xl absolute w-full left-0 top-20">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <p class="px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pour Opticiens</p>
                <a href="<?php echo home_url('/inscription-opticien'); ?>"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-orange hover:bg-orange-50">Trouver
                    une mission</a>
                <a href="<?php echo home_url('/comparatif-verres'); ?>"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-orange hover:bg-orange-50">Comparatif
                    Verres</a>

                <p class="px-3 py-2 mt-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pour Entreprises
                </p>
                <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-blue hover:bg-blue-50">Recruter</a>

                <div class="border-t border-gray-100 my-4 pt-4">
                    <a href="<?php echo home_url('/login'); ?>"
                        class="block w-full text-center px-4 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 mb-3">Connexion</a>
                    <a href="<?php echo home_url('/inscription-opticien'); ?>"
                        class="block w-full text-center px-4 py-3 bg-oblink-orange text-white rounded-lg font-bold shadow-md mb-2">S'inscrire
                        Opticien</a>
                    <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                        class="block w-full text-center px-4 py-3 bg-oblink-blue text-white rounded-lg font-bold shadow-md">S'inscrire
                        Entreprise</a>
                </div>
            </div>
        </div>
    </header>
    <div class="h-20"></div> <!-- Spacer for fixed header -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
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

        /* Glassmorphism Header */
        .header-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>

<body <?php body_class('bg-white text-oblink-gray font-body'); ?>>

    <!-- Smart Header -->
    <header class="fixed w-full top-0 z-50 transition-all duration-300 header-glass shadow-sm" id="main-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- 1. LEFT: LOGO -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="<?php echo home_url('/'); ?>" class="flex items-center group no-underline">
                        <!-- Logo mimicking the official image: Orange Background, White Text -->
                        <div
                            class="px-3 py-1 bg-oblink-orange rounded flex items-center justify-center transform group-hover:scale-105 transition-transform duration-300">
                            <span class="text-white font-bold text-xl tracking-wide"
                                style="font-family: 'Overpass', sans-serif;">OBLINK</span>
                        </div>
                    </a>
                </div>

                <!-- 2. CENTER: NAVIGATION (Desktop) -->
                <nav class="hidden md:flex space-x-10">

                    <!-- Dropdown: Pour Opticiens -->
                    <div class="relative group">
                        <button
                            class="text-oblink-gray group-hover:text-oblink-orange font-medium flex items-center transition outline-none py-5">
                            <span>Je suis Opticien</span>
                            <i class="fas fa-chevron-down ml-2 text-xs transition-transform group-hover:rotate-180"></i>
                        </button>
                        <!-- Dropdown Content -->
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 mt-0 w-96 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:visible transition-all duration-200 z-50 top-full">

                            <div class="p-4 space-y-2">
                                <a href="<?php echo home_url('/inscription-opticien'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Trouver une mission</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Accédez à des centaines
                                            d'offres de remplacement et postulez en un clic.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/simulateur'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-calculator"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Simulateur revenus</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Estimez vos revenus nets et
                                            optimisez votre activité freelance.</p>
                                    </div>
                                </a>
                                <a href="<?php echo home_url('/formation-erp'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-orange-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 text-oblink-orange flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Formation ERP</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Maîtrisez les logiciels de
                                            gestion pour être opérationnel de suite.</p>
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
                                            de verres avec notre IA.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Dropdown: Pour Entreprises -->
                    <div class="relative group">
                        <button
                            class="text-oblink-gray group-hover:text-oblink-blue font-medium flex items-center transition outline-none py-5">
                            <span>Je suis Entreprise</span>
                            <i class="fas fa-chevron-down ml-2 text-xs transition-transform group-hover:rotate-180"></i>
                        </button>
                        <!-- Dropdown Content -->
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 mt-0 w-96 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:visible transition-all duration-200 z-50 top-full">

                            <div class="p-4 space-y-2">
                                <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                                    class="group/item block px-4 py-3 rounded-lg hover:bg-blue-50 transition flex items-start">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 text-oblink-blue flex items-center justify-center mr-4 mt-1 group-hover/item:scale-110 transition-transform">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 mb-0.5">Recruter</p>
                                        <p class="text-xs text-gray-500 leading-relaxed">Diffusez vos annonces auprès de
                                            notre communauté d'opticiens.</p>
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
                        class="text-oblink-gray hover:text-oblink-orange font-medium transition">Blog</a>
                </nav>

                <!-- 3. RIGHT: ACTIONS (Login/Register) -->
                <div class="hidden md:flex items-center space-x-4">
                    <?php if (is_user_logged_in()): ?>
                        <!-- USER LOGGED IN -->
                        <?php $current_user = wp_get_current_user(); ?>
                        <div class="flex items-center space-x-4">
                            <a href="<?php echo home_url('/dashboard'); ?>"
                                class="text-sm font-semibold text-oblink-gray hover:text-oblink-orange">
                                Bonjour, <?php echo $current_user->display_name; ?>
                            </a>
                            <a href="<?php echo home_url('/dashboard'); ?>"
                                class="w-10 h-10 rounded-full bg-oblink-orange text-white flex items-center justify-center font-bold hover:bg-oblink-gray transition shadow-md">
                                <?php echo substr($current_user->display_name, 0, 1); ?>
                            </a>
                        </div>
                    <?php else: ?>
                        <!-- GUEST -->
                        <a href="<?php echo home_url('/login'); ?>"
                            class="text-sm font-semibold text-oblink-gray hover:text-oblink-orange transition">
                            Connexion
                        </a>
                        <!-- Dropdown S'inscrire -->
                        <div class="relative group z-50">
                            <button
                                class="px-5 py-2.5 bg-oblink-orange text-white rounded-lg font-bold shadow hover:bg-oblink-orange/90 transition transform hover:-translate-y-0.5 flex items-center gap-2 group-hover:rounded-b-none">
                                S'inscrire <i
                                    class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                            </button>
                            <div
                                class="absolute right-0 top-full pt-2 w-64 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-300 transform origin-top-right z-[60]">
                                <div class="bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden">
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
                    <?php endif; ?>
                </div>

                <!-- MOBILE MENU BUTTON -->
                <div class="flex md:hidden">
                    <button type="button" class="text-oblink-gray hover:text-oblink-orange focus:outline-none"
                        id="mobile-menu-btn" aria-label="Menu">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- MOBILE MENU CONTENT -->
        <div id="mobile-menu" class="bg-white border-t border-gray-100 md:hidden shadow-xl">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <p class="px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pour Opticiens</p>
                <a href="<?php echo home_url('/inscription-opticien'); ?>"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-orange hover:bg-orange-50">Trouver
                    une mission</a>
                <a href="<?php echo home_url('/simulateur'); ?>"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-orange hover:bg-orange-50">Simulateur
                    revenus</a>

                <p class="px-3 py-2 mt-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pour Entreprises
                </p>
                <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-blue hover:bg-blue-50">Recruter</a>
                <a href="<?php echo home_url('/recherche-opticiens'); ?>"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-oblink-blue hover:bg-blue-50">CV-thèque</a>

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

    <!-- Spacer to prevent content overlap -->
    <div class="h-20"></div>

    <script>
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('open');
        });
    </script>

    <main>
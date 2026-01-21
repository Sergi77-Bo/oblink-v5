<?php header('Content-Type: text/html; charset=utf-8'); ?>
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

    <?php
    $current_role = oblink_get_user_role();
    $user_display_name = is_user_logged_in() ? wp_get_current_user()->display_name : '';
    $user_avatar_initial = $user_display_name ? substr($user_display_name, 0, 1) : '?';
    ?>

    <!-- Smart Header -->
    <header class="fixed w-full top-0 z-50 transition-all duration-300 header-glass shadow-sm" id="main-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- 1. LEFT: LOGO (Constant) -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="<?php echo home_url('/'); ?>" class="flex items-center group no-underline">
                        <div
                            class="px-3 py-1 bg-oblink-orange rounded flex items-center justify-center transform group-hover:scale-105 transition-transform duration-300">
                            <span class="text-white font-bold text-xl tracking-wide"
                                style="font-family: 'Overpass', sans-serif;">OBLINK</span>
                        </div>
                        <?php if ($current_role !== 'visitor'): ?>
                            <span
                                class="ml-3 text-xs font-bold uppercase tracking-widest text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full border border-gray-200">
                                <?php
                                switch ($current_role) {
                                    case 'student':
                                        echo 'Étudiant';
                                        break;
                                    case 'freelance':
                                        echo 'Expert Certifié';
                                        break;
                                    case 'recruiter':
                                        echo 'Recruteur';
                                        break;
                                }
                                ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </div>

                <!-- 2. CENTER: NAVIGATION (Dynamic) -->
                <nav class="hidden md:flex space-x-8">

                    <?php if ($current_role === 'visitor'): ?>
                        <!-- === VISITOR MENU === -->

                        <!-- Académie Dropdown -->
                        <div class="relative group">
                            <button
                                class="text-oblink-gray group-hover:text-oblink-orange font-medium flex items-center transition outline-none py-5">
                                <span>Académie</span>
                                <i class="fas fa-chevron-down ml-2 text-xs transition-transform group-hover:rotate-180"></i>
                            </button>
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 mt-0 w-80 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:visible transition-all duration-200 z-50 top-full">
                                <div class="p-3 space-y-2">
                                    <a href="<?php echo home_url('/pass-examen'); ?>"
                                        class="block px-4 py-3 rounded-lg hover:bg-orange-50 transition">
                                        <p class="text-sm font-bold text-gray-900">Pass Examen BTS</p>
                                        <p class="text-xs text-gray-500">Quiz IA & Annales 2026</p>
                                    </a>
                                    <a href="<?php echo home_url('/formation-erp'); ?>"
                                        class="block px-4 py-3 rounded-lg hover:bg-orange-50 transition">
                                        <p class="text-sm font-bold text-gray-900">Formations ERP</p>
                                        <p class="text-xs text-gray-500">Devenez Expert Cosium</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <a href="<?php echo home_url('/simulateur'); ?>"
                            class="text-oblink-gray hover:text-oblink-orange font-medium transition">Simulateur Salaire</a>
                        <a href="<?php echo home_url('/abonnements'); ?>"
                            class="text-oblink-gray hover:text-oblink-orange font-medium transition">Tarifs</a>


                    <?php elseif ($current_role === 'student'): ?>
                        <!-- === STUDENT MENU === -->
                        <a href="<?php echo home_url('/dashboard'); ?>"
                            class="text-oblink-gray hover:text-oblink-orange font-medium transition flex items-center gap-2">
                            <i class="fas fa-chart-pie text-gray-400"></i> Dashboard
                        </a>
                        <a href="<?php echo home_url('/academie'); ?>"
                            class="text-oblink-gray hover:text-oblink-orange font-medium transition flex items-center gap-2">
                            <i class="fas fa-brain text-gray-400"></i> Outils IA
                        </a>
                        <!-- "Passer Expert" Promo Link -->
                        <a href="<?php echo home_url('/formation-erp'); ?>"
                            class="text-oblink-violet font-bold hover:text-oblink-violet/80 transition flex items-center gap-2 animate-pulse">
                            <i class="fas fa-certificate"></i> Devenir Expert
                        </a>

                    <?php elseif ($current_role === 'freelance'): ?>
                        <!-- === FREELANCE MENU === -->
                        <a href="<?php echo home_url('/missions'); ?>"
                            class="text-oblink-gray hover:text-oblink-orange font-medium transition flex items-center gap-2">
                            <i class="fas fa-briefcase text-gray-400"></i> Trouver une mission
                        </a>
                        <a href="<?php echo home_url('/mes-certifications'); ?>"
                            class="text-oblink-gray hover:text-oblink-orange font-medium transition flex items-center gap-2">
                            <i class="fas fa-award text-gray-400"></i> Mes Certifs
                        </a>
                        <a href="<?php echo home_url('/formation-erp'); ?>"
                            class="text-oblink-gray hover:text-oblink-orange font-medium transition flex items-center gap-2">
                            <i class="fas fa-graduation-cap text-gray-400"></i> Se former
                        </a>

                    <?php elseif ($current_role === 'recruiter'): ?>
                        <!-- === RECRUITER MENU === -->
                        <a href="<?php echo home_url('/admin-dashboard'); ?>"
                            class="text-oblink-gray hover:text-oblink-blue font-medium transition flex items-center gap-2">
                            <i class="fas fa-tachometer-alt text-gray-400"></i> Pilotage
                        </a>
                        <a href="<?php echo home_url('/recherche-opticiens'); ?>"
                            class="text-oblink-gray hover:text-oblink-blue font-medium transition flex items-center gap-2">
                            <i class="fas fa-search text-gray-400"></i> CV-thèque
                        </a>
                        <a href="<?php echo home_url('/mes-annonces'); ?>"
                            class="text-oblink-gray hover:text-oblink-blue font-medium transition flex items-center gap-2">
                            <i class="fas fa-bullhorn text-gray-400"></i> Mes Annonces
                        </a>
                    <?php endif; ?>

                </nav>

                <!-- 3. RIGHT: ACTIONS (Dynamic) -->
                <div class="hidden md:flex items-center space-x-4">

                    <?php if ($current_role === 'visitor'): ?>
                        <!-- Visitor Actions -->
                        <a href="<?php echo home_url('/login'); ?>"
                            class="text-sm font-semibold text-gray-500 hover:text-oblink-orange transition">Connexion</a>
                        <a href="<?php echo home_url('/inscription-opticien'); ?>"
                            class="px-5 py-2.5 bg-oblink-orange text-white rounded-lg font-bold shadow hover:bg-oblink-orange/90 transition transform hover:-translate-y-0.5">
                            Accès Membre
                        </a>

                    <?php else: ?>
                        <!-- Logged In Actions (Shared Structure with Role specifics) -->
                        <div class="flex items-center space-x-4 relative group">
                            <button class="flex items-center space-x-2 focus:outline-none">
                                <div class="text-right hidden lg:block">
                                    <p class="text-sm font-bold text-gray-900 leading-none">
                                        <?php echo $user_display_name; ?>
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        <?php echo ucfirst($current_role); ?>
                                    </p>
                                </div>
                                <div
                                    class="w-10 h-10 rounded-full bg-gradient-to-br from-oblink-orange to-orange-400 text-white flex items-center justify-center font-bold shadow-md ring-2 ring-white">
                                    <?php echo $user_avatar_initial; ?>
                                </div>
                            </button>
                            <!-- User Dropdown -->
                            <div
                                class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:visible transition-all duration-200 z-50">
                                <a href="<?php echo home_url('/profil'); ?>"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Mon Profil</a>
                                <a href="<?php echo home_url('/compte'); ?>"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Réglages</a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <a href="<?php echo wp_logout_url(home_url()); ?>"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Déconnexion</a>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- MOBILE MENU BUTTON -->
                <div class="flex md:hidden">
                    <button type="button" class="text-oblink-gray hover:text-oblink-orange focus:outline-none"
                        id="mobile-menu-btn">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- MOBILE MENU (Simplified for V1) -->
        <div id="mobile-menu" class="bg-white border-t border-gray-100 md:hidden shadow-xl">
            <div class="px-4 pt-4 pb-6 space-y-2">

                <?php if ($current_role === 'visitor'): ?>
                    <a href="<?php echo home_url('/pass-examen'); ?>"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-md">Pass
                        Examen</a>
                    <a href="<?php echo home_url('/simulateur'); ?>"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-md">Simulateur</a>
                    <div class="border-t border-gray-100 my-2"></div>
                    <a href="<?php echo home_url('/login'); ?>"
                        class="block px-3 py-2 text-base font-medium text-oblink-orange">Connexion</a>

                <?php elseif ($current_role === 'student'): ?>
                    <a href="<?php echo home_url('/dashboard'); ?>"
                        class="block px-3 py-2 text-base font-medium text-gray-700">Dashboard</a>
                    <a href="<?php echo home_url('/academie'); ?>"
                        class="block px-3 py-2 text-base font-medium text-gray-700">Quiz IA</a>
                    <a href="<?php echo home_url('/formation-erp'); ?>"
                        class="block px-3 py-2 text-base font-bold text-oblink-violet">Devenir Expert</a>

                <?php elseif ($current_role === 'freelance'): ?>
                    <a href="<?php echo home_url('/missions'); ?>"
                        class="block px-3 py-2 text-base font-medium text-gray-700">Missions</a>
                    <a href="<?php echo home_url('/mes-certifications'); ?>"
                        class="block px-3 py-2 text-base font-medium text-gray-700">Certifications</a>

                <?php elseif ($current_role === 'recruiter'): ?>
                    <a href="<?php echo home_url('/admin-dashboard'); ?>"
                        class="block px-3 py-2 text-base font-bold text-oblink-blue">Pilotage</a>
                    <a href="<?php echo home_url('/recherche-opticiens'); ?>"
                        class="block px-3 py-2 text-base font-medium text-gray-700">CV-thèque</a>
                <?php endif; ?>

                <?php if ($current_role !== 'visitor'): ?>
                    <div class="border-t border-gray-100 my-2 pt-2">
                        <a href="<?php echo wp_logout_url(home_url()); ?>" class="block px-3 py-2 text-sm text-red-600">Se
                            déconnecter</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Spacer -->
    <div class="h-20"></div>

    <!-- Scripts -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('open');
        });
    </script>
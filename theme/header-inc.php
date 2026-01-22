<?php
// OBLINK - Header Universel (Inc)
// Version V5 : Dynamic Menu "Principal" + Dropdown Support
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require_once get_template_directory() . '/inc/seo-meta.php';
    oblink_output_seo_meta();
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
        /* --- STYLES MENU WORDPRESS --- */
        .wp-custom-menu {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none !important;
            margin: 0;
            padding: 0;
        }

        .wp-custom-menu a {
            text-decoration: none;
            color: #303030;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.2s;
            white-space: nowrap;
        }

        .wp-custom-menu a:hover {
            color: #FF6600;
        }

        .wp-custom-menu li {
            position: relative;
            list-style: none !important;
        }

        /* --- FIX DROPDOWN (Sous-menu) --- */
        .wp-custom-menu .sub-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 260px;
            /* Un peu plus large pour le confort */
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
            padding: 0.5rem 0;
            z-index: 100;
            border: 1px solid #f3f4f6;
            margin-top: 0.5rem;
        }

        .wp-custom-menu li:hover>.sub-menu {
            display: block;
            animation: fadeIn 0.2s ease-in-out;
        }

        .wp-custom-menu .sub-menu li {
            width: 100%;
        }

        .wp-custom-menu .sub-menu a {
            display: block;
            padding: 0.75rem 1.5rem;
            color: #4b5563;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .wp-custom-menu .sub-menu a:hover {
            background-color: #fff7ed;
            color: #FF6600;
            padding-left: 1.75rem;
            /* Petit effet de glissement */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* --- LOGO --- */
        .custom-logo-link img {
            max-width: 150px;
            height: auto;
        }

        #mobile-menu {
            display: none;
        }

        #mobile-menu.open {
            display: block;
        }
    </style>
</head>

<body <?php body_class('bg-white text-oblink-gray font-body'); ?>>

    <header class="fixed w-full top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- LOGO DYNAMIQUE -->
                <div class="flex-shrink-0 flex items-center">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<a href="' . home_url('/') . '" class="text-2xl font-bold text-oblink-orange no-underline">OBLINK</a>';
                    }
                    ?>
                </div>

                <!-- DESKTOP NAV DYNAMIQUE -->
                <nav class="hidden md:flex space-x-8 items-center">
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'Principal',
                        'container' => false,
                        'menu_class' => 'wp-custom-menu',
                        'fallback_cb' => false,
                        'depth' => 3, // Autorise les sous-menus
                    ));
                    ?>
                </nav>

                <!-- ACTIONS RAPIDES (Panier / Login) -->
                <div class="hidden md:flex items-center space-x-6">
                    <!-- Panier -->
                    <a href="<?php echo home_url('/panier'); ?>"
                        class="text-oblink-gray hover:text-oblink-orange relative">
                        <i class="fas fa-shopping-cart text-xl"></i>
                    </a>

                    <!-- Connexion -->
                    <a href="https://oblink-frontend-aj43j14ru-sergios-projects-c3d8c609.vercel.app/login"
                        class="px-5 py-2.5 bg-oblink-orange text-white rounded-lg font-bold shadow hover:bg-oblink-orange/90 transition transform hover:-translate-y-0.5">
                        Connexion
                    </a>
                </div>

                <!-- MOBILE BURGER -->
                <div class="flex md:hidden">
                    <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('open')"
                        class="text-oblink-gray hover:text-oblink-orange focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- MOBILE NAV -->
        <div id="mobile-menu"
            class="bg-white border-t border-gray-100 md:hidden shadow-xl absolute w-full left-0 top-20 p-4 max-h-[80vh] overflow-y-auto">
            <?php
            wp_nav_menu(array(
                'menu' => 'Principal',
                'container' => false,
                'menu_class' => 'flex flex-col space-y-4 font-bold text-gray-700 pb-10',
                'fallback_cb' => false
            ));
            ?>
        </div>
    </header>

    <div class="h-20"></div>

    <!-- Script Panier Simple -->
    <script>
        // Si tu veux un badge panier dynamique plus tard, on pourra le remettre ici
    </script>
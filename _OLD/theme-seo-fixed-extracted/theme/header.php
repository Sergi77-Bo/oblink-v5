<?php
// Header with Tailwind styling and Logo
if (!session_id()) {
    session_start();
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white text-gray-900'); ?>>
    <?php wp_body_open(); ?>
    
    <!-- Header Navigation -->
    <header class="fixed w-full top-0 z-50 bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="<?php echo home_url('/'); ?>" class="flex items-center no-underline">
                        <div class="px-3 py-1 bg-orange-500 rounded">
                            <span class="text-white font-bold text-xl">OBLINK</span>
                        </div>
                    </a>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="hidden md:flex space-x-8">
                    <a href="<?php echo home_url('/'); ?>" class="text-gray-600 hover:text-orange-500">Accueil</a>
                    <a href="<?php echo home_url('/produits'); ?>" class="text-gray-600 hover:text-orange-500 font-semibold text-orange-600">Produits</a>
                    <a href="<?php echo home_url('/pour-opticiens'); ?>" class="text-gray-600 hover:text-orange-500">Pour Opticiens</a>
                    <a href="<?php echo home_url('/pour-entreprises'); ?>" class="text-gray-600 hover:text-orange-500">Pour Entreprises</a>
                    <a href="<?php echo home_url('/blog'); ?>" class="text-gray-600 hover:text-orange-500">Blog</a>
                    <a href="<?php echo home_url('/contact'); ?>" class="text-gray-600 hover:text-orange-500">Contact</a>
                </nav>
                
                <!-- User Menu & Cart -->
                <div class="flex items-center space-x-4">
                    <!-- Cart Icon -->
                    <a href="<?php echo home_url('/panier'); ?>" class="relative text-gray-600 hover:text-orange-500 text-xl">
                        <i class="fas fa-shopping-cart"></i>
                        <?php 
                        $cart_count = 0;
                        if (session_id() && isset($_SESSION['oblink_cart'])) {
                            foreach ($_SESSION['oblink_cart'] as $item) {
                                $cart_count += $item['quantity'];
                            }
                        }
                        if ($cart_count > 0):
                        ?>
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                                <?php echo $cart_count; ?>
                            </span>
                        <?php endif; ?>
                    </a>
                    
                    <?php if (is_user_logged_in()): ?>
                        <span class="text-sm text-gray-600"><?php echo wp_get_current_user()->display_name; ?></span>
                        <a href="<?php echo wp_logout_url(); ?>" class="text-sm text-red-500 hover:text-red-700">Déconnexion</a>
                    <?php else: ?>
                        <a href="<?php echo wp_login_url(); ?>" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">Connexion</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main Content (with padding for fixed header) -->
    <div class="pt-20">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

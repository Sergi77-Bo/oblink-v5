<?php
/**
 * OBLINK Theme - Minimal Working Version
 * All features disabled to isolate the error
 */

// Disable all plugins-style debugging
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Register WordPress features
function oblink_minimal_setup()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'oblink_minimal_setup');

// Enqueue CSS and JS
function oblink_minimal_enqueue()
{
    wp_enqueue_style('oblink-style', get_stylesheet_uri());

    // Add Tailwind CSS
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), '3.4.0', false);

    // Add Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // EXPLICITLY Enqueue Theme Scripts (with cache busting)
    $version = time(); // Force reload for presentation

    wp_enqueue_script('oblink-app', get_template_directory_uri() . '/js/app.js', array(), $version, true);
    wp_enqueue_script('oblink-header-auth', get_template_directory_uri() . '/js/header-auth.js', array(), $version, true);
    wp_enqueue_script('oblink-cart', get_template_directory_uri() . '/js/cart.js', array(), $version, true);

    // Localize variables for JS
    wp_localize_script('oblink-app', 'oblink_vars', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => home_url('/'),
        'nonce' => wp_create_nonce('oblink_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'oblink_minimal_enqueue');

// Simple user role function
function oblink_get_user_role()
{
    if (!is_user_logged_in()) {
        return 'visitor';
    }
    if (current_user_can('manage_options')) {
        return 'recruiter';
    }
    return 'student';
}

// Load Cart System
require_once get_template_directory() . '/inc/cart-system.php';

// Auto-create pages
require_once get_template_directory() . '/inc/auto-create-pages.php';

// -- SUPABASE INTEGRATION --
function oblink_enqueue_supabase()
{
    // 1. Supabase SDK (CDN)
    wp_enqueue_script('supabase-js', 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/dist/umd/supabase.js', [], '2.0.0', false);

    // 2. Init Script
    wp_enqueue_script('oblink-supabase-init', get_template_directory_uri() . '/js/supabase-config.js', ['supabase-js'], '1.0', true);

    // 3. Inject Credentials
    wp_localize_script('oblink-supabase-init', 'oblink_vars', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('oblink_nonce'),
        'supabase_url' => 'https://kqpjohxtzyprqvhijjet.supabase.co',
        'supabase_key' => 'sb_publishable_bkZHMMqGz23jmskNgqx7BA_aKHQdCQU',
        'home_url' => home_url()
    ]);
}
add_action('wp_enqueue_scripts', 'oblink_enqueue_supabase');

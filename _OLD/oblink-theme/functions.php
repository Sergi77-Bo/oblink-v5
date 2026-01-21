<?php
// Function file for OBLINK Theme - V60 RESTORE (Pre-Messaging) - STABLE

function oblink_scripts()
{
    // 1. Charger Tailwind CSS (CDN)
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), '3.4.0', false);

    // 2. Config Tailwind (Injected inline)
    $tailwind_config = "
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
    ";
    wp_add_inline_script('tailwindcss', $tailwind_config);

    // 3. Styles
    wp_enqueue_style('fontawesome', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Overpass:wght@400;600;700;800;900&display=swap');
    wp_enqueue_style('oblink-style', get_stylesheet_uri());

    // 4. Custom App JS
    wp_enqueue_script('oblink-app', get_template_directory_uri() . '/js/app.js', array(), '1.1', true);
}
add_action('wp_enqueue_scripts', 'oblink_scripts');

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

// -- EMBED SUPPORT (YouTube, etc.) --
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// Enable oEmbed for YouTube and other providers
add_filter('oembed_discovery_links', '__return_true');

// Wrap embeds in responsive container
function oblink_embed_html($html, $url)
{
    if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
        return '<div class="video-container" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;max-width:100%;margin:2rem 0;"><div style="position:absolute;top:0;left:0;width:100%;height:100%;">' . $html . '</div></div>';
    }
    return '<div class="embed-container" style="margin:2rem 0;">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'oblink_embed_html', 10, 2);

// -- Email System (Gardé pour l'instant) --
require_once get_template_directory() . '/inc/emails.php'; // On pourra le migrer sur Supabase Edge Functions plus tard

// -- Messaging System --
require_once get_template_directory() . '/inc/messaging.php';

// -- DEPRECATED WP DB SYSTEMS (Removed for Supabase) --
// User Registration via WP DB -> REMOVED
// Admin Columns -> REMOVED

// -- REDIRECTIONS: DEFERRED (Also causes issues) --
?>
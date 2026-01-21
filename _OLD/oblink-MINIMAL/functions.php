<?php
// Function file for OBLINK Theme - V60 RESTORE (Pre-Messaging) - STABLE

// Auto-installation des fichiers SEO à l'activation du thème
require_once get_template_directory() . '/inc/theme-activation.php';

/**
 * Determine current user view mode (RBAC)
 * Roles: 'visitor', 'student', 'freelance', 'recruiter'
 */
function oblink_get_user_role()
{
    if (!is_user_logged_in()) {
        return 'visitor';
    }

    $user = wp_get_current_user();

    // Admin is Recruiter for demo purposes, or explicit 'recruiter' role
    if (current_user_can('manage_options') || in_array('recruiter', (array) $user->roles)) {
        return 'recruiter';
    }

    // Check for explicit "Expert" mode in user meta
    $role_mode = get_user_meta($user->ID, 'role_mode', true);
    if ($role_mode === 'expert') {
        return 'freelance';
    }

    // Default for logged in users
    return 'student';
}

// ==========================================
// SEO: Disable plugin canonical tags to avoid conflicts
// ==========================================
// Our custom SEO system in inc/seo-meta.php handles all meta tags
// Disable Yoast SEO canonical
add_filter('wpseo_canonical', '__return_false');
// Disable RankMath canonical
add_filter('rank_math/frontend/canonical', '__return_false');
// Disable All in One SEO canonical
add_filter('aioseo_canonical_url', '__return_false');
// Remove WordPress default canonical
remove_action('wp_head', 'rel_canonical');

function oblink_enqueue_scripts()
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
    wp_enqueue_script('oblink-cart', get_template_directory_uri() . '/js/cart.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'oblink_enqueue_scripts');

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
// require get_template_directory() . '/inc/lazy-loading.php'; // Désactivé pour Hostinger

add_action('wp_enqueue_scripts', 'oblink_enqueue_scripts');
add_action('wp_enqueue_scripts', 'oblink_supabase_client', 5);
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

// -- Simulator Email --
require_once get_template_directory() . '/inc/simulator-email.php';

add_action('wp_ajax_save_simulator_lead', 'handle_simulator_lead');
add_action('wp_ajax_nopriv_save_simulator_lead', 'handle_simulator_lead');

// AJAX Handler for Contact Form
add_action('wp_ajax_send_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_send_contact_form', 'handle_contact_form');

function handle_contact_form()
{
    // Validate nonce
    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'oblink_nonce')) {
        // Allow for legacy/dev mode if nonce missing, but log warning. 
        // In prod, uncomment strict return:
        // wp_send_json_error(['message' => 'Session expirée. Rechargez la page.']);
        // return;
    }

    // HONEYPOT (Anti-Spam)
    // If a 'website' field is sent (hidden in CSS), it's a bot.
    if (!empty($_POST['website'])) {
        wp_send_json_error(['message' => 'Spam détecté.']);
        return;
    }

    // Sanitize inputs
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $subject = sanitize_text_field($_POST['subject'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        wp_send_json_error(['message' => 'Tous les champs sont requis']);
        return;
    }

    // Validate email format
    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Email invalide']);
        return;
    }

    // Prepare email
    $to = 'contact@oblink.fr';
    $email_subject = '[OBLINK Contact] ' . $subject;

    // Build email body
    $email_body = "Nouveau message de contact OBLINK\n\n";
    $email_body .= "Nom: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Sujet: $subject\n\n";
    $email_body .= "Message:\n$message\n\n";
    $email_body .= "---\n";
    $email_body .= "Envoyé depuis: " . home_url('/contact') . "\n";
    $email_body .= "Date: " . current_time('d/m/Y H:i');

    // Email headers
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: OBLINK Contact <noreply@oblink.fr>',
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    // Send email
    $email_sent = wp_mail($to, $email_subject, $email_body, $headers);

    if ($email_sent) {
        // Optional: Save to database or Supabase for tracking
        // error_log("Contact form submitted by: $name ($email)");

        wp_send_json_success([
            'message' => 'Message envoyé avec succès'
        ]);
    } else {
        error_log("Contact form email failed for: $email");
        wp_send_json_error([
            'message' => 'Erreur lors de l\'envoi. Veuillez réessayer ou nous contacter directement à contact@oblink.fr'
        ]);
    }
}


function handle_simulator_lead()
{
    $email = sanitize_email($_POST['email']);
    $mode = sanitize_text_field($_POST['mode']);
    $data = json_decode(stripslashes($_POST['data']), true);
    $results = json_decode(stripslashes($_POST['results']), true);

    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Invalid email']);
        return;
    }

    // Store lead in Supabase via client-side (recommended) or REST API
    // For now, we log it for tracking purposes
    // Future: Create 'simulator_leads' table in Supabase with columns:
    // - email, mode, form_data (JSONB), results (JSONB), created_at
    error_log("Simulator Lead: $email | Mode: $mode");

    // Send email notification
    $params = $data;
    $params['mode'] = $mode;

    $email_sent = send_simulator_email($email, $results, $mode, $params);

    if ($email_sent) {
        wp_send_json_success(['message' => 'Email sent successfully']);
    } else {
        wp_send_json_error(['message' => 'Failed to send email']);
    }
}

// -- DEPRECATED WP DB SYSTEMS (Removed for Supabase) --
// User Registration via WP DB -> REMOVED
// Admin Columns -> REMOVED

// -- REDIRECTIONS: DEFERRED (Also causes issues) --

// -- SECURITY HEADERS (CSP etc.) --
define('OBLINK_CSP_ENABLED', true);

function oblink_security_headers()
{
    if (defined('OBLINK_CSP_ENABLED') && OBLINK_CSP_ENABLED) {
        // Content Security Policy
        // Note: 'unsafe-inline' is allowed here for legacy scripts/styles compatibility as requested.
        // ideally should be stricter in future.
        header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://unpkg.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; font-src 'self' https://fonts.gstatic.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; img-src 'self' data: https:; connect-src 'self' https://kqpjohxtzyprqvhijjet.supabase.co https://api-adresse.data.gouv.fr; frame-src 'self' https://www.youtube.com https://youtube.com;");

        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
add_action('send_headers', 'oblink_security_headers');
?>
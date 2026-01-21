<?php
/**
 * Fix Mentions Légales - Routing WordPress
 * 
 * Ce script diagnostique et corrige le problème de routing
 * qui redirige /mentions-legales vers le blog.
 * 
 * Upload ce fichier à la racine WordPress et accédez-y via navigateur.
 */

require_once('wp-load.php');

if (!current_user_can('manage_options')) {
    die('❌ Accès refusé. Administrateur requis.');
}

echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fix Routing Mentions Légales</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, sans-serif; max-width: 900px; margin: 50px auto; padding: 20px; background: #f5f5f5; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #FF6600; }
        .success { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .error { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .info { background: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 5px; margin: 10px 0; }
        pre { background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto; }
        .btn { display: inline-block; background: #FF6600; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin: 10px 5px 0 0; }
        .btn:hover { background: #cc5200; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 Fix Routing Mentions Légales</h1>';

// ====================
// DIAGNOSTIC
// ====================
echo '<h2>📊 Diagnostic</h2>';

$page = get_page_by_path('mentions-legales');

if (!$page) {
    echo '<div class="error">❌ La page n\'existe PAS dans la base de données !</div>';
    echo '<div class="info">Solution : Créez la page manuellement ou utilisez setup-pages.php</div>';
    exit;
}

echo '<div class="success">✓ Page trouvée (ID: ' . $page->ID . ')</div>';

// Check status
if ($page->post_status !== 'publish') {
    echo '<div class="error">❌ Statut: ' . $page->post_status . ' (doit être "publish")</div>';

    if (isset($_GET['fix'])) {
        wp_update_post(['ID' => $page->ID, 'post_status' => 'publish']);
        echo '<div class="success">✓ Statut changé en "publish"</div>';
        $page = get_post($page->ID); // Refresh
    }
} else {
    echo '<div class="success">✓ Statut: publish</div>';
}

// Check slug
if ($page->post_name !== 'mentions-legales') {
    echo '<div class="error">❌ Slug incorrect: "' . $page->post_name . '" (doit être "mentions-legales")</div>';

    if (isset($_GET['fix'])) {
        wp_update_post(['ID' => $page->ID, 'post_name' => 'mentions-legales']);
        echo '<div class="success">✓ Slug corrigé</div>';
        $page = get_post($page->ID);
    }
} else {
    echo '<div class="success">✓ Slug: mentions-legales</div>';
}

// Check permalink structure
$permalink_structure = get_option('permalink_structure');
echo '<div class="info"><strong>Structure Permalinks:</strong> ' . ($permalink_structure ?: 'Plain (par défaut)') . '</div>';

// ====================
// REWRITE RULES
// ====================
echo '<h2>🔍 Règles de Réécriture</h2>';

global $wp_rewrite;
$wp_rewrite->init();

// Get page rewrite rules
$page_rules = [];
foreach ($wp_rewrite->rules as $pattern => $replacement) {
    if (strpos($pattern, 'mentions') !== false || strpos($replacement, $page->ID) !== false) {
        $page_rules[$pattern] = $replacement;
    }
}

if (empty($page_rules)) {
    echo '<div class="error">❌ Aucune règle de réécriture trouvée pour cette page !</div>';
    echo '<div class="info">Cela explique pourquoi WordPress ne trouve pas la page.</div>';
} else {
    echo '<div class="success">✓ Règles de réécriture trouvées:</div>';
    echo '<pre>' . print_r($page_rules, true) . '</pre>';
}

// ====================
// FIX ACTION
// ====================
if (isset($_GET['fix'])) {
    echo '<h2>🔨 Application du Fix</h2>';

    // 1. Flush rewrite rules
    flush_rewrite_rules(true);
    echo '<div class="success">✓ Règles de réécriture vidées et régénérées</div>';

    // 2. Force update page
    wp_update_post([
        'ID' => $page->ID,
        'post_status' => 'publish',
        'post_name' => 'mentions-legales',
    ]);
    echo '<div class="success">✓ Page mise à jour</div>';

    // 3. Clear any cache
    if (function_exists('wp_cache_flush')) {
        wp_cache_flush();
        echo '<div class="success">✓ Cache WordPress vidé</div>';
    }

    // 4. Test URL
    $test_url = home_url('/mentions-legales');
    echo '<div class="info"><strong>Testez maintenant:</strong> <a href="' . esc_url($test_url) . '" target="_blank">' . esc_html($test_url) . '</a></div>';

    echo '<a href="?" class="btn">Relancer Diagnostic</a>';

} else {
    echo '<h2>🔨 Action Requise</h2>';
    echo '<div class="info">Cliquez ci-dessous pour appliquer le fix automatique.</div>';
    echo '<a href="?fix=yes" class="btn">Appliquer le Fix</a>';
}

// ====================
// ADDITIONAL DEBUG
// ====================
echo '<h2>🐛 Informations Debug</h2>';
echo '<pre>';
echo '<strong>Page ID:</strong> ' . $page->ID . "\n";
echo '<strong>Post Name (slug):</strong> ' . $page->post_name . "\n";
echo '<strong>Post Status:</strong> ' . $page->post_status . "\n";
echo '<strong>Post Type:</strong> ' . $page->post_type . "\n";
echo '<strong>Post Parent:</strong> ' . $page->post_parent . "\n";
echo '<strong>Template:</strong> ' . get_post_meta($page->ID, '_wp_page_template', true) . "\n";
echo '<strong>Permalink:</strong> ' . get_permalink($page->ID) . "\n";
echo '<strong>Home URL:</strong> ' . home_url() . "\n";
echo '<strong>Site URL:</strong> ' . site_url() . "\n";
echo '</pre>';

// Check .htaccess
$htaccess_path = ABSPATH . '.htaccess';
if (file_exists($htaccess_path)) {
    $htaccess_content = file_get_contents($htaccess_path);
    if (strpos($htaccess_content, 'mentions') !== false) {
        echo '<div class="error">⚠️ Le fichier .htaccess contient "mentions" - vérifiez les redirections manuelles</div>';
        echo '<pre>' . esc_html($htaccess_content) . '</pre>';
    } else {
        echo '<div class="success">✓ Fichier .htaccess OK (pas de redirection mentions-legales)</div>';
    }
} else {
    echo '<div class="info">ℹ️ Fichier .htaccess n\'existe pas</div>';
}

echo '    </div>
</body>
</html>';
?>
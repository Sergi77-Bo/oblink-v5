<?php
/**
 * OBLINK - Fix Mentions Légales Page
 * 
 * This script diagnoses and fixes the /mentions-legales redirect issue.
 * Upload this file to your WordPress root directory and access it via browser.
 * 
 * Usage: https://your-site.com/fix-mentions-legales.php
 */

// Load WordPress
require_once('wp-load.php');

// Security check - only allow admins
if (!current_user_can('manage_options')) {
    die('❌ Access denied. Administrator privileges required.');
}

echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fix Mentions Légales - OBLINK</title>
    <style>
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; 
            max-width: 800px; 
            margin: 50px auto; 
            padding: 20px;
            background: #f5f5f5;
        }
        .container { 
            background: white; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { color: #FF6600; }
        h2 { 
            color: #303030; 
            border-bottom: 2px solid #FF6600; 
            padding-bottom: 10px;
            margin-top: 30px;
        }
        .success { 
            background: #d4edda; 
            color: #155724; 
            padding: 15px; 
            border-radius: 5px; 
            border-left: 4px solid #28a745;
            margin: 10px 0;
        }
        .error { 
            background: #f8d7da; 
            color: #721c24; 
            padding: 15px; 
            border-radius: 5px; 
            border-left: 4px solid #dc3545;
            margin: 10px 0;
        }
        .warning { 
            background: #fff3cd; 
            color: #856404; 
            padding: 15px; 
            border-radius: 5px; 
            border-left: 4px solid #ffc107;
            margin: 10px 0;
        }
        .info { 
            background: #d1ecf1; 
            color: #0c5460; 
            padding: 15px; 
            border-radius: 5px; 
            border-left: 4px solid #17a2b8;
            margin: 10px 0;
        }
        code { 
            background: #f4f4f4; 
            padding: 2px 6px; 
            border-radius: 3px;
            font-family: monospace;
        }
        .button {
            display: inline-block;
            background: #FF6600;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }
        .button:hover { background: #cc5200; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #f8f9fa;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 Fix Mentions Légales Page</h1>
        <p><strong>OBLINK WordPress Configuration Tool</strong></p>';

// ==================================================
// STEP 1: DIAGNOSTIC
// ==================================================
echo '<h2>📊 Step 1: Diagnostic</h2>';

// Check if page exists
$page = get_page_by_path('mentions-legales');

if ($page) {
    echo '<div class="info">✓ Page "Mentions Légales" found in database (ID: ' . $page->ID . ')</div>';

    echo '<table>';
    echo '<tr><th>Property</th><th>Value</th></tr>';
    echo '<tr><td>Page ID</td><td>' . $page->ID . '</td></tr>';
    echo '<tr><td>Title</td><td>' . esc_html($page->post_title) . '</td></tr>';
    echo '<tr><td>Slug</td><td><code>' . esc_html($page->post_name) . '</code></td></tr>';
    echo '<tr><td>Status</td><td>' . esc_html($page->post_status) . '</td></tr>';

    $current_template = get_post_meta($page->ID, '_wp_page_template', true);
    echo '<tr><td>Template</td><td><code>' . esc_html($current_template) . '</code></td></tr>';

    $permalink = get_permalink($page->ID);
    echo '<tr><td>Permalink</td><td><a href="' . esc_url($permalink) . '" target="_blank">' . esc_html($permalink) . '</a></td></tr>';
    echo '</table>';

    // Check if template is correct
    if ($current_template !== 'page-mentions-legales.php') {
        echo '<div class="error">❌ PROBLEM FOUND: Template is set to <code>' . esc_html($current_template) . '</code> instead of <code>page-mentions-legales.php</code></div>';
        $needs_fix = true;
    } else {
        echo '<div class="success">✓ Template assignment is correct</div>';
        $needs_fix = false;
    }

    // Check if template file exists
    $template_path = get_template_directory() . '/page-mentions-legales.php';
    if (file_exists($template_path)) {
        echo '<div class="success">✓ Template file exists: <code>page-mentions-legales.php</code></div>';
    } else {
        echo '<div class="error">❌ Template file missing: <code>page-mentions-legales.php</code></div>';
    }

} else {
    echo '<div class="error">❌ PROBLEM FOUND: Page "Mentions Légales" does not exist in database</div>';
    $needs_fix = true;
}

// ==================================================
// STEP 2: FIX
// ==================================================
if (isset($_GET['fix']) && $_GET['fix'] === 'yes') {
    echo '<h2>🔨 Step 2: Applying Fix</h2>';

    if (!$page) {
        // Create the page
        $page_id = wp_insert_post([
            'post_title' => 'Mentions Légales',
            'post_content' => '', // Content is in the template
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => 'mentions-legales',
        ]);

        if ($page_id && !is_wp_error($page_id)) {
            echo '<div class="success">✓ Created page "Mentions Légales" (ID: ' . $page_id . ')</div>';
            update_post_meta($page_id, '_wp_page_template', 'page-mentions-legales.php');
            echo '<div class="success">✓ Assigned template <code>page-mentions-legales.php</code></div>';
        } else {
            echo '<div class="error">❌ Failed to create page</div>';
        }
    } else {
        // Update existing page
        $current_template = get_post_meta($page->ID, '_wp_page_template', true);

        if ($current_template !== 'page-mentions-legales.php') {
            update_post_meta($page->ID, '_wp_page_template', 'page-mentions-legales.php');
            echo '<div class="success">✓ Updated template from <code>' . esc_html($current_template) . '</code> to <code>page-mentions-legales.php</code></div>';
        }

        // Ensure it's published
        if ($page->post_status !== 'publish') {
            wp_update_post([
                'ID' => $page->ID,
                'post_status' => 'publish'
            ]);
            echo '<div class="success">✓ Changed status to "publish"</div>';
        }
    }

    // Flush rewrite rules
    flush_rewrite_rules();
    echo '<div class="success">✓ Flushed permalink cache</div>';

    echo '<div class="info"><strong>Fix applied!</strong> Please test the page now: <a href="' . home_url('/mentions-legales') . '" target="_blank">' . home_url('/mentions-legales') . '</a></div>';

    echo '<a href="?" class="button">Run Diagnostic Again</a>';

} else if (isset($needs_fix) && $needs_fix) {
    echo '<h2>🔨 Step 2: Fix Available</h2>';
    echo '<div class="warning">A problem was detected. Click the button below to fix it automatically.</div>';
    echo '<a href="?fix=yes" class="button">Fix Now</a>';
} else {
    echo '<h2>✅ No Fix Needed</h2>';
    echo '<div class="success">Everything looks good! The page should be working correctly.</div>';
    echo '<p>Test the page: <a href="' . home_url('/mentions-legales') . '" target="_blank">' . home_url('/mentions-legales') . '</a></p>';
}

// ==================================================
// ADDITIONAL INFO
// ==================================================
echo '<h2>ℹ️ Additional Information</h2>';
echo '<p><strong>Theme:</strong> ' . esc_html(wp_get_theme()->get('Name')) . ' (Version ' . esc_html(wp_get_theme()->get('Version')) . ')</p>';
echo '<p><strong>Template Directory:</strong> <code>' . esc_html(get_template_directory()) . '</code></p>';
echo '<p><strong>Home URL:</strong> <code>' . esc_html(home_url()) . '</code></p>';

// List all available page templates
echo '<h3>Available Page Templates:</h3>';
$templates = wp_get_theme()->get_page_templates();
if (!empty($templates)) {
    echo '<ul>';
    foreach ($templates as $template_file => $template_name) {
        echo '<li><code>' . esc_html($template_file) . '</code> - ' . esc_html($template_name) . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>No custom page templates found.</p>';
}

echo '    </div>
</body>
</html>';
?>
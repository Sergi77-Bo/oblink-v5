<?php
/**
 * OBLINK - Sitemap Generator
 * 
 * Generates dynamic XML sitemap for all public pages and posts.
 * Can be run manually or via cron job.
 * 
 * Usage: Upload to WordPress root and access via /generate-sitemap.php
 */

// Load WordPress
require_once('wp-load.php');

// Set XML header
header('Content-Type: application/xml; charset=utf-8');

// Start XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Homepage
echo '  <url>' . "\n";
echo '    <loc>' . esc_url(home_url('/')) . '</loc>' . "\n";
echo '    <lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
echo '    <changefreq>daily</changefreq>' . "\n";
echo '    <priority>1.0</priority>' . "\n";
echo '  </url>' . "\n";

// Get all published pages
$pages = get_pages([
    'post_status' => 'publish',
    'sort_column' => 'post_modified',
]);

foreach ($pages as $page) {
    $permalink = get_permalink($page->ID);
    $lastmod = date('Y-m-d', strtotime($page->post_modified));

    // Determine priority based on page
    $priority = '0.8';
    if (in_array($page->post_name, ['pour-opticiens', 'pour-entreprises', 'emploi-opticien'])) {
        $priority = '0.9';
    }

    // Determine changefreq
    $changefreq = 'monthly';
    if (in_array($page->post_name, ['emploi-opticien', 'blog'])) {
        $changefreq = 'daily';
    } elseif (strpos($page->post_name, 'opticien-freelance-') === 0) {
        // Pages villes
        $changefreq = 'weekly';
    }

    echo '  <url>' . "\n";
    echo '    <loc>' . esc_url($permalink) . '</loc>' . "\n";
    echo '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
    echo '    <changefreq>' . $changefreq . '</changefreq>' . "\n";
    echo '    <priority>' . $priority . '</priority>' . "\n";
    echo '  </url>' . "\n";
}

// Get all published posts (blog articles)
$posts = get_posts([
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => -1,
    'orderby' => 'modified',
]);

foreach ($posts as $post) {
    $permalink = get_permalink($post->ID);
    $lastmod = date('Y-m-d', strtotime($post->post_modified));

    echo '  <url>' . "\n";
    echo '    <loc>' . esc_url($permalink) . '</loc>' . "\n";
    echo '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
    echo '    <changefreq>monthly</changefreq>' . "\n";
    echo '    <priority>0.7</priority>' . "\n";
    echo '  </url>' . "\n";
}

// Close XML
echo '</urlset>';

// Optionally save to file
if (isset($_GET['save']) && $_GET['save'] === 'true') {
    $xml_content = ob_get_clean();
    file_put_contents(ABSPATH . 'sitemap.xml', $xml_content);
    echo "Sitemap saved to /sitemap.xml\n";
    echo '<a href="' . home_url('/sitemap.xml') . '">View Sitemap</a>';
}
?>
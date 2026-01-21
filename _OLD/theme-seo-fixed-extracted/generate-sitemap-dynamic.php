<?php
/**
 * OBLINK - Dynamic Sitemap Generator
 * 
 * Generates a sitemap.xml file compliant with Google standards
 * Can be run via command line: php generate-sitemap-dynamic.php
 * Or integrated into WordPress as a scheduled task
 */

// Load WordPress
require_once(__DIR__ . '/wp-load.php');

// Configuration
$site_url = get_site_url();
$sitemap_file = __DIR__ . '/sitemap.xml';

// Start XML
$xml = new DOMDocument('1.0', 'UTF-8');
$xml->formatOutput = true;

$urlset = $xml->createElement('urlset');
$urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
$urlset->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
$urlset->setAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
$xml->appendChild($urlset);

/**
 * Helper function to add URL to sitemap
 */
function add_url_to_sitemap($xml, $urlset, $loc, $lastmod = null, $changefreq = 'weekly', $priority = '0.5')
{
    $url = $xml->createElement('url');

    // Location
    $loc_elem = $xml->createElement('loc', htmlspecialchars($loc));
    $url->appendChild($loc_elem);

    // Last modified
    if ($lastmod) {
        $lastmod_elem = $xml->createElement('lastmod', $lastmod);
        $url->appendChild($lastmod_elem);
    }

    // Change frequency
    $changefreq_elem = $xml->createElement('changefreq', $changefreq);
    $url->appendChild($changefreq_elem);

    // Priority
    $priority_elem = $xml->createElement('priority', $priority);
    $url->appendChild($priority_elem);

    $urlset->appendChild($url);
}

// 1. Homepage (highest priority)
add_url_to_sitemap($xml, $urlset, $site_url, date('Y-m-d'), 'daily', '1.0');

// 2. Static Pages (high priority)
$high_priority_pages = [
    'pour-opticiens' => ['changefreq' => 'weekly', 'priority' => '0.9'],
    'pour-entreprises' => ['changefreq' => 'weekly', 'priority' => '0.9'],
    'emploi-opticien' => ['changefreq' => 'daily', 'priority' => '0.9'],
    'inscription-opticien' => ['changefreq' => 'weekly', 'priority' => '0.8'],
    'inscription-entreprise' => ['changefreq' => 'weekly', 'priority' => '0.8'],
    'simulateur' => ['changefreq' => 'monthly', 'priority' => '0.8'],
    'abonnements' => ['changefreq' => 'monthly', 'priority' => '0.8'],
];

foreach ($high_priority_pages as $slug => $params) {
    $page = get_page_by_path($slug);
    if ($page) {
        $lastmod = date('Y-m-d', strtotime($page->post_modified));
        add_url_to_sitemap($xml, $urlset, get_permalink($page), $lastmod, $params['changefreq'], $params['priority']);
    }
}

// 3. Medium Priority Pages
$medium_priority_pages = [
    'blog' => '0.7',
    'a-propos' => '0.6',
    'comment-ca-marche' => '0.7',
    'recherche-opticiens' => '0.8',
    'observatoire' => '0.6',
    'pass-examen' => '0.7',
    'pass-vae' => '0.7',
    'formation-erp' => '0.7',
];

foreach ($medium_priority_pages as $slug => $priority) {
    $page = get_page_by_path($slug);
    if ($page) {
        $lastmod = date('Y-m-d', strtotime($page->post_modified));
        add_url_to_sitemap($xml, $urlset, get_permalink($page), $lastmod, 'weekly', $priority);
    }
}

// 4. SEO Landing Pages (geo-targeted)
$seo_pages = [
    'opticien-freelance-paris',
    'opticien-freelance-lyon',
    'opticien-freelance-marseille',
];

foreach ($seo_pages as $slug) {
    $page = get_page_by_path($slug);
    if ($page) {
        $lastmod = date('Y-m-d', strtotime($page->post_modified));
        add_url_to_sitemap($xml, $urlset, get_permalink($page), $lastmod, 'monthly', '0.7');
    }
}

// 5. Blog Posts (dynamic, higher frequency)
$blog_posts = get_posts([
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => -1,
    'orderby' => 'modified',
    'order' => 'DESC'
]);

foreach ($blog_posts as $post) {
    $lastmod = date('Y-m-d', strtotime($post->post_modified));
    add_url_to_sitemap($xml, $urlset, get_permalink($post), $lastmod, 'monthly', '0.6');
}

// 6. Legal Pages (low priority, rarely change)
$legal_pages = [
    'mentions-legales' => '0.3',
    'cgu' => '0.3',
    'politique-confidentialite' => '0.3',
];

foreach ($legal_pages as $slug => $priority) {
    $page = get_page_by_path($slug);
    if ($page) {
        $lastmod = date('Y-m-d', strtotime($page->post_modified));
        add_url_to_sitemap($xml, $urlset, get_permalink($page), $lastmod, 'yearly', $priority);
    }
}

// 7. Additional Product/Service Pages
$product_pages = [
    'produits' => '0.7',
    'panier' => '0.4',  // Lower priority (transactional)
    'checkout' => '0.4',
];

foreach ($product_pages as $slug => $priority) {
    $page = get_page_by_path($slug);
    if ($page) {
        $lastmod = date('Y-m-d', strtotime($page->post_modified));
        add_url_to_sitemap($xml, $urlset, get_permalink($page), $lastmod, 'weekly', $priority);
    }
}

// Save sitemap
$xml->save($sitemap_file);

// Output results
if (php_sapi_name() === 'cli') {
    // Command line
    echo "✅ Sitemap généré avec succès !\n";
    echo "📍 Emplacement : $sitemap_file\n";
    echo "📊 URLs incluses : " . $urlset->childNodes->length . "\n";
    echo "\n";
    echo "Prochaines étapes :\n";
    echo "1. Télécharger le sitemap vers la racine du site\n";
    echo "2. Soumettre à Google Search Console : https://search.google.com/search-console/sitemaps\n";
    echo "3. Vérifier le robots.txt : doit contenir 'Sitemap: {$site_url}/sitemap.xml'\n";
} else {
    // Web access
    header('Content-Type: text/xml');
    echo $xml->saveXML();
}
?>
<?php
require_once('../../../wp-load.php');

if (!current_user_can('manage_options')) {
    die('Admin rights required.');
}

echo "<h1>Diagnostic des Pages WordPress</h1>";
echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
echo "<tr><th>ID</th><th>Titre</th><th>Slug (URL)</th><th>Template</th><th>Status</th></tr>";

$pages = get_pages(['post_type' => 'page', 'post_status' => 'publish,private,draft']);

foreach ($pages as $page) {
    $template = get_post_meta($page->ID, '_wp_page_template', true);

    $highlight = '';
    if ($page->post_name === 'facture' || $page->post_name === 'facturation') {
        $highlight = 'background-color: #ffffcc; font-weight:bold;';
    }

    echo "<tr style='$highlight'>";
    echo "<td>{$page->ID}</td>";
    echo "<td>{$page->post_title}</td>";
    echo "<td><a href='" . get_permalink($page->ID) . "'>{$page->post_name}</a></td>";
    echo "<td>{$template}</td>";
    echo "<td>{$page->post_status}</td>";
    echo "</tr>";
}
echo "</table>";

echo "<h2>Test Permalink '/facture'</h2>";
$test = get_page_by_path('facture');
if ($test) {
    echo "La page '/facture' EXISTE (ID: {$test->ID}). <a href='" . get_permalink($test->ID) . "'>Voir</a>";
} else {
    echo "<span style='color:red'>La page '/facture' N'EXISTE PAS.</span>";
}
?>
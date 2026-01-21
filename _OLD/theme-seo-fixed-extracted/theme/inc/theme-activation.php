<?php
/**
 * OBLINK - Activation du thème
 * Copie automatiquement les fichiers nécessaires à la racine WordPress
 */

function oblink_theme_activation()
{
    $theme_dir = get_template_directory();
    $root_dir = ABSPATH;

    // Copier generate-sitemap.php
    $sitemap_source = $theme_dir . '/setup/generate-sitemap.php';
    $sitemap_dest = $root_dir . 'generate-sitemap.php';

    if (file_exists($sitemap_source) && !file_exists($sitemap_dest)) {
        copy($sitemap_source, $sitemap_dest);
    }

    // Copier robots.txt
    $robots_source = $theme_dir . '/setup/robots.txt';
    $robots_dest = $root_dir . 'robots.txt';

    if (file_exists($robots_source) && !file_exists($robots_dest)) {
        copy($robots_source, $robots_dest);
    }

    // Générer le sitemap initial
    if (file_exists($sitemap_dest)) {
        // Trigger sitemap generation
        $response = wp_remote_get(home_url('/generate-sitemap.php?save=true'));
    }
}

// Hook sur le switch de thème
add_action('after_switch_theme', 'oblink_theme_activation');
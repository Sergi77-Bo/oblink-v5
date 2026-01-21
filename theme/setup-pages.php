<?php
// Script d'Initialisation Automatique d'OBLINK
// Crée toutes les pages nécessaires et assigne les bons Templates PHP.

require_once('../../../wp-load.php');

if (!current_user_can('manage_options')) {
    die('Accès refusé. Admin requis.');
}

// Mapping : Titre de la page => [Slug, Nom du fichier Template]
$pages_to_create = [
    'Accueil' => ['home', 'front-page.php'],
    'Espace Candidats' => ['candidats', 'page-pour-opticiens.php'],
    'Pour Entreprises' => ['pour-entreprises', 'page-pour-entreprises.php'],
    'Inscription Opticien' => ['inscription-opticien', 'page-inscription-opticien.php'],
    'Inscription Entreprise' => ['inscription-entreprise', 'page-inscription-entreprise.php'],
    'Tableau de Bord Opticien' => ['dashboard-opticien', 'page-dashboard-opticien.php'],
    'Tableau de Bord Entreprise' => ['dashboard-entreprise', 'page-dashboard-entreprise.php'],
    'Observatoire' => ['observatoire', 'page-observatoire.php'],
    'Offres Partenaires' => ['partenaires', 'page-partenaires.php'],
    'Boutique' => ['boutique', 'page-boutique.php'],
    'Pass VAE' => ['pass-vae', 'page-pass-vae.php'],
    'Simulateur Revenus' => ['simulateur', 'page-simulateur.php'],
    'Recherche Opticiens' => ['recherche-opticiens', 'page-recherche-opticiens.php'],
    'Abonnements & Tarifs' => ['abonnements', 'page-abonnements.php'],
    'Formation ERP' => ['formation-erp', 'page-formation-erp.php'],
    'Générateur de Contrat' => ['generateur-de-contrat', 'page-generateur-contrat.php'],
    'Connexion' => ['login', 'page-login.php'],
    'Comment ça marche' => ['comment-ca-marche', 'page-comment-ca-marche.php'],
    'À Propos' => ['a-propos', 'page-a-propos.php'],
    'Devis' => ['devis', 'page-devis.php'],
    'Facture' => ['facture', 'page-facture.php'],
    'Nouvelle facture' => ['nouvelle-facture', 'page-facture.php'],
    'Comparatif Verres' => ['comparatif-verres', 'page-comparatif-verres.php'],
    'Mentions Légales' => ['mentions-legales', 'page-mentions-legales.php'],
    'CGU & CGV' => ['cgu', 'page-cgu.php'],
    'Politique de Confidentialité' => ['confidentialite', 'page-confidentialite.php'],
    'Guide Création Entreprise' => ['guide-creation-entreprise', 'page-guide-creation-entreprise.php']
];

echo "<h1>Initialisation du Site OBLINK</h1>";
echo "<ul>";

foreach ($pages_to_create as $title => $props) {
    $slug = $props[0];
    $template_file = $props[1];

    // 1. Vérifier si la page existe
    $page = get_page_by_path($slug);
    $page_id = 0;

    if ($page) {
        $page_id = $page->ID;
        echo "<li style='color:orange'>La page <strong>$title</strong> (/$slug) existe déjà.</li>";
    } else {
        // 2. Créer la page
        $page_id = wp_insert_post([
            'post_title' => $title,
            'post_content' => '', // Contenu vide car géré par le template PHP
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => $slug,
        ]);

        if ($page_id) {
            echo "<li style='color:green'>Création de <strong>$title</strong> (/$slug) : SUCCÈS.</li>";
        } else {
            echo "<li style='color:red'>Erreur création <strong>$title</strong>.</li>";
        }
    }

    // 3. Assigner le Template
    if ($page_id) {
        $current_template = get_post_meta($page_id, '_wp_page_template', true);
        if ($current_template != $template_file) {
            update_post_meta($page_id, '_wp_page_template', $template_file);
            echo " -> Template assigné : <em>$template_file</em><br>";
        } else {
            echo " -> Template déjà OK.<br>";
        }
    }
}

// Spécial : Définir la page d'accueil
$home_page = get_page_by_path('home');
if ($home_page) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home_page->ID);
    echo "<br><strong>Configuration :</strong> La page 'Accueil' a été définie comme page d'accueil du site.";
}

// Force Flush Permalinks
flush_rewrite_rules();
echo "<p style='color:green; font-weight:bold;'>Permaliens actualisés (Rewrite Rules Flushed).</p>";

echo "</ul>";
echo "<h2>Configuration Terminée !</h2>";
echo "<p>Vos liens devraient maintenant fonctionner correctement. <a href='/'>Retour au site</a></p>";
?>
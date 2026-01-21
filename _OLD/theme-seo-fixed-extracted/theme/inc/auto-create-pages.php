<?php
/**
 * OBLINK - Auto-create required pages on theme activation
 */

function oblink_create_required_pages() {
    // Pages to create
    $pages_to_create = [
        [
            'post_title' => 'Formations',
            'post_name' => 'formations',
            'post_content' => '[oblink-formations]',
            'post_type' => 'page',
            'post_status' => 'publish',
            'page_template' => 'page-formations-v2.php',
        ],
        [
            'post_title' => 'Produits',
            'post_name' => 'produits',
            'post_content' => '[oblink-formations]',
            'post_type' => 'page',
            'post_status' => 'publish',
            'page_template' => 'page-formations-v2.php',
        ],
        [
            'post_title' => 'Formation ERP',
            'post_name' => 'formation-erp',
            'post_content' => '[oblink-formations]',
            'post_type' => 'page',
            'post_status' => 'publish',
            'page_template' => 'page-formations-v2.php',
        ],
        [
            'post_title' => 'Panier',
            'post_name' => 'panier',
            'post_content' => '[oblink-cart]',
            'post_type' => 'page',
            'post_status' => 'publish',
            'page_template' => 'page-panier-v2.php',
        ],
        [
            'post_title' => 'Checkout',
            'post_name' => 'checkout',
            'post_content' => '[oblink-checkout]',
            'post_type' => 'page',
            'post_status' => 'publish',
            'page_template' => 'page-checkout-v2.php',
        ],
        [
            'post_title' => 'Pour Opticiens',
            'post_name' => 'pour-opticiens',
            'post_content' => 'Page pour les opticiens',
            'post_type' => 'page',
            'post_status' => 'publish',
            'page_template' => 'page-pour-opticiens.php',
        ],
        [
            'post_title' => 'Pour Entreprises',
            'post_name' => 'pour-entreprises',
            'post_content' => 'Page pour les entreprises',
            'post_type' => 'page',
            'post_status' => 'publish',
            'page_template' => 'page-pour-entreprises.php',
        ],
    ];

    foreach ($pages_to_create as $page) {
        // Check if page already exists
        $existing_page = get_page_by_path($page['post_name'], OBJECT, 'page');
        
        if (!$existing_page) {
            $page_id = wp_insert_post([
                'post_title' => $page['post_title'],
                'post_name' => $page['post_name'],
                'post_content' => $page['post_content'],
                'post_type' => $page['post_type'],
                'post_status' => $page['post_status'],
            ]);
            
            if ($page_id && isset($page['page_template'])) {
                update_post_meta($page_id, '_wp_page_template', $page['page_template']);
            }
        }
    }
}

// Hook to create pages on theme activation
add_action('after_switch_theme', 'oblink_create_required_pages');

// Also run on init (first time only) to be sure
function oblink_ensure_pages_exist() {
    $formations_page = get_page_by_path('formations', OBJECT, 'page');
    if (!$formations_page) {
        oblink_create_required_pages();
    }
}
add_action('init', 'oblink_ensure_pages_exist', 999);

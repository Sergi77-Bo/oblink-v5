<?php
/**
 * OBLINK Cart System
 * Gestion du panier avec formations et abonnements
 */

// Initialize session
if (!session_id()) {
    session_start();
}

/**
 * Get cart items
 */
function oblink_get_cart() {
    if (!isset($_SESSION['oblink_cart'])) {
        $_SESSION['oblink_cart'] = [];
    }
    return $_SESSION['oblink_cart'];
}

/**
 * Add item to cart
 */
function oblink_add_to_cart($product_id, $type, $name, $price, $quantity = 1) {
    if (!session_id()) session_start();
    
    if (!isset($_SESSION['oblink_cart'])) {
        $_SESSION['oblink_cart'] = [];
    }
    
    $cart_key = $type . '_' . $product_id;
    
    if (isset($_SESSION['oblink_cart'][$cart_key])) {
        $_SESSION['oblink_cart'][$cart_key]['quantity'] += $quantity;
    } else {
        $_SESSION['oblink_cart'][$cart_key] = [
            'product_id' => $product_id,
            'type' => $type,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
        ];
    }
}

/**
 * Remove item from cart
 */
function oblink_remove_from_cart($cart_key) {
    if (!session_id()) session_start();
    
    if (isset($_SESSION['oblink_cart'][$cart_key])) {
        unset($_SESSION['oblink_cart'][$cart_key]);
    }
}

/**
 * Update quantity
 */
function oblink_update_cart_quantity($cart_key, $quantity) {
    if (!session_id()) session_start();
    
    if (isset($_SESSION['oblink_cart'][$cart_key])) {
        if ($quantity <= 0) {
            unset($_SESSION['oblink_cart'][$cart_key]);
        } else {
            $_SESSION['oblink_cart'][$cart_key]['quantity'] = $quantity;
        }
    }
}

/**
 * Clear cart
 */
function oblink_clear_cart() {
    if (!session_id()) session_start();
    $_SESSION['oblink_cart'] = [];
}

/**
 * Get cart total
 */
function oblink_get_cart_total() {
    $cart = oblink_get_cart();
    $total = 0;
    
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    
    return $total;
}

/**
 * Get cart count
 */
function oblink_get_cart_count() {
    $cart = oblink_get_cart();
    $count = 0;
    
    foreach ($cart as $item) {
        $count += $item['quantity'];
    }
    
    return $count;
}

/**
 * AJAX: Add to cart
 */
function oblink_ajax_add_to_cart() {
    check_ajax_referer('oblink_cart_nonce', 'nonce');
    
    $product_id = sanitize_text_field($_POST['product_id']);
    $type = sanitize_text_field($_POST['type']); // 'formation' ou 'subscription'
    $name = sanitize_text_field($_POST['name']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity'] ?? 1);
    
    oblink_add_to_cart($product_id, $type, $name, $price, $quantity);
    
    wp_send_json_success([
        'message' => 'Produit ajouté au panier',
        'cart_count' => oblink_get_cart_count(),
        'cart_total' => number_format(oblink_get_cart_total(), 2, ',', ' '),
    ]);
}
add_action('wp_ajax_oblink_add_to_cart', 'oblink_ajax_add_to_cart');
add_action('wp_ajax_nopriv_oblink_add_to_cart', 'oblink_ajax_add_to_cart');

/**
 * AJAX: Remove from cart
 */
function oblink_ajax_remove_from_cart() {
    check_ajax_referer('oblink_cart_nonce', 'nonce');
    
    $cart_key = sanitize_text_field($_POST['cart_key']);
    oblink_remove_from_cart($cart_key);
    
    wp_send_json_success([
        'message' => 'Produit supprimé',
        'cart_count' => oblink_get_cart_count(),
        'cart_total' => number_format(oblink_get_cart_total(), 2, ',', ' '),
    ]);
}
add_action('wp_ajax_oblink_remove_from_cart', 'oblink_ajax_remove_from_cart');
add_action('wp_ajax_nopriv_oblink_remove_from_cart', 'oblink_ajax_remove_from_cart');

/**
 * AJAX: Update quantity
 */
function oblink_ajax_update_cart_quantity() {
    check_ajax_referer('oblink_cart_nonce', 'nonce');
    
    $cart_key = sanitize_text_field($_POST['cart_key']);
    $quantity = intval($_POST['quantity']);
    
    oblink_update_cart_quantity($cart_key, $quantity);
    
    wp_send_json_success([
        'message' => 'Quantité mise à jour',
        'cart_count' => oblink_get_cart_count(),
        'cart_total' => number_format(oblink_get_cart_total(), 2, ',', ' '),
    ]);
}
add_action('wp_ajax_oblink_update_cart_quantity', 'oblink_ajax_update_cart_quantity');
add_action('wp_ajax_nopriv_oblink_update_cart_quantity', 'oblink_ajax_update_cart_quantity');

/**
 * Enqueue cart JS
 */
function oblink_enqueue_cart_script() {
    wp_localize_script('jquery', 'oblink_cart', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('oblink_cart_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'oblink_enqueue_cart_script');

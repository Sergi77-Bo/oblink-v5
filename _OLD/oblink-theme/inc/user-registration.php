<?php
// OBLINK - User Registration AJAX Handlers
// Handles Opticien registration via AJAX

// Register AJAX actions
add_action('wp_ajax_nopriv_oblink_register_opticien', 'oblink_register_opticien_handler');
add_action('wp_ajax_oblink_register_opticien', 'oblink_register_opticien_handler');

function oblink_register_opticien_handler()
{
    // Sanitize inputs
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $diploma = sanitize_text_field($_POST['diploma']);
    $experience = sanitize_text_field($_POST['experience']);
    $city = sanitize_text_field($_POST['city']);

    // Validation
    if (empty($email) || empty($password)) {
        wp_send_json_error(['message' => 'Email et mot de passe requis.']);
        return;
    }

    if (email_exists($email)) {
        wp_send_json_error(['message' => 'Cet email est déjà utilisé.']);
        return;
    }

    if (strlen($password) < 8) {
        wp_send_json_error(['message' => 'Le mot de passe doit contenir au moins 8 caractères.']);
        return;
    }

    // Create User
    $username = sanitize_user(strtolower($first_name . '.' . $last_name . rand(100, 999)));
    $user_id = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
        wp_send_json_error(['message' => $user_id->get_error_message()]);
        return;
    }

    // Update User Profile
    wp_update_user([
        'ID' => $user_id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'display_name' => $first_name . ' ' . $last_name,
        'role' => 'subscriber'
    ]);

    // Save User Meta (OBLINK specific)
    update_user_meta($user_id, 'oblink_user_type', 'opticien');
    update_user_meta($user_id, 'oblink_diploma', $diploma);
    update_user_meta($user_id, 'oblink_experience', $experience);
    update_user_meta($user_id, 'oblink_city', $city);
    update_user_meta($user_id, 'oblink_status', 'pending'); // pending, verified, premium
    update_user_meta($user_id, 'oblink_registered_at', current_time('mysql'));

    // Auto-login the user
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id, true);

    // Send Welcome Email (if email system is active)
    if (function_exists('oblink_send_mail')) {
        oblink_send_mail($email, 'Bienvenue sur OBLINK !', 'welcome-opticien', [
            'first_name' => $first_name
        ]);
    }

    // Success response
    wp_send_json_success([
        'message' => 'Compte créé avec succès !',
        'user_id' => $user_id,
        'redirect' => home_url('/dashboard-opticien')
    ]);
}
?>
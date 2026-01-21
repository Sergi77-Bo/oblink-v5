<?php
/**
 * OBLINK Transactional Email System
 */

/**
 * Send a styled transactional email
 *
 * @param string $to Recipient email
 * @param string $subject Email subject
 * @param string $template_name Template filename (without .php) in inc/emails/
 * @param array $data Data to pass to the template
 * @return bool True on success
 */
function oblink_send_mail($to, $subject, $template_name, $data = [])
{
    // 1. Load Template
    $template_path = get_template_directory() . '/inc/emails/' . $template_name . '.php';

    if (!file_exists($template_path)) {
        error_log("OBLINK EMAIL ERROR: Template $template_name not found.");
        return false;
    }

    // Extract data securely
    // extract($data); // INSECURE
    // Better: Helper variables or direct usage in template. 
    // For retro-compatibility with templates using $variables, we use extract but sanitizing keys could be better.
    // Compromise for this codebase:
    extract($data, EXTR_SKIP);

    // Rate Limiting on Emails (5 per minute per IP)
    $ip = $_SERVER['REMOTE_ADDR'];
    $rate_limit_key = 'oblink_email_limit_' . md5($ip);
    $current_count = get_transient($rate_limit_key);

    if ($current_count && $current_count > 5) {
        error_log("Email Rate Limit Exceeded for IP: $ip");
        return false;
    }

    set_transient($rate_limit_key, ($current_count ? $current_count + 1 : 1), 60);

    // Buffer output
    ob_start();

    // Header
    include get_template_directory() . '/inc/emails/header.php';

    // content
    include $template_path;

    // Footer
    include get_template_directory() . '/inc/emails/footer.php';

    $message = ob_get_clean();

    // 2. Headers
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'From: OBLINK <no-reply@oblink.com>';

    // 3. Send
    return wp_mail($to, $subject, $message, $headers);
}

// REGISTER AJAX ACTIONS FOR EMAILS (Simulated for Demo)

// 1. AJAX: Inscription Opticien
add_action('wp_ajax_nopriv_oblink_register_opticien', 'oblink_handle_register_opticien');
add_action('wp_ajax_oblink_register_opticien', 'oblink_handle_register_opticien');

function oblink_handle_register_opticien()
{
    // Simulate processing
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $name = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : 'Opticien';

    if ($email) {
        oblink_send_mail($email, 'Bienvenue sur OBLINK !', 'welcome-opticien', ['name' => $name]);
        wp_send_json_success(['message' => 'Inscription réussie']);
    } else {
        wp_send_json_error(['message' => 'Email invalide']);
    }
}

// 2. AJAX: Candidature (One Click Apply)
add_action('wp_ajax_nopriv_oblink_apply_job', 'oblink_handle_apply_job');
add_action('wp_ajax_oblink_apply_job', 'oblink_handle_apply_job');

function oblink_handle_apply_job()
{
    // Simulate
    $job_id = isset($_POST['job_id']) ? intval($_POST['job_id']) : 0;

    // In a real app we would get user email from session or post
    $user_email = 'opticien.demo@test.com'; // Mock current user
    $recruiter_email = 'recruteur.demo@test.com'; // Mock

    if ($job_id) {
        // Mail to Candidate
        oblink_send_mail($user_email, 'Candidature envoyée', 'application-confirm', ['job_id' => $job_id]);

        // Mail to Recruiter
        oblink_send_mail($recruiter_email, 'Nouvelle Candidature !', 'new-application', ['job_id' => $job_id]);

        wp_send_json_success(['message' => 'Candidature envoyée']);
    }
    wp_die();
}

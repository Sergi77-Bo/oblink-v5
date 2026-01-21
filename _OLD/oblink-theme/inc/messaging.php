<?php
/**
 * OBLINK Messaging System
 * Ultra-light sql based messaging.
 */

// 1. Create DataBase Table on Theme Activation (or check on init)
function oblink_install_messages_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'oblink_messages';

    // Check if table exists
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            sender_id bigint(20) NOT NULL,
            receiver_id bigint(20) NOT NULL,
            subject tinytext NOT NULL,
            message text NOT NULL,
            is_read tinyint(1) DEFAULT 0 NOT NULL,
            conversation_id varchar(50) NOT NULL, 
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
add_action('after_switch_theme', 'oblink_install_messages_table');
// We also hook to init to be sure in dev environment, but in prod 'after_switch_theme' is better
// For this dev session, I'll add a temporary init hook that runs ONCE then can be removed
// add_action('init', 'oblink_install_messages_table'); // DISABLED: Only run on switch theme to avoid critical error on frontend with dbDelta

// 2. SEND MESSAGE FUNCTION
function oblink_send_message($receiver_id, $subject, $message)
{
    global $wpdb;
    $sender_id = get_current_user_id();
    if (!$sender_id)
        return false;

    // Generate Conversation ID (Smaller_ID-Larger_ID) to group messages between 2 people
    $ids = [$sender_id, $receiver_id];
    sort($ids);
    $conversation_id = implode('-', $ids);

    $table_name = $wpdb->prefix . 'oblink_messages';

    $result = $wpdb->insert(
        $table_name,
        array(
            'time' => current_time('mysql'),
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'subject' => sanitize_text_field($subject),
            'message' => sanitize_textarea_field($message),
            'is_read' => 0,
            'conversation_id' => $conversation_id
        )
    );

    return $result;
}

// 3. GET CONVERSATIONS FOR CURRENT USER
function oblink_get_conversations()
{
    global $wpdb;
    $user_id = get_current_user_id();
    $table_name = $wpdb->prefix . 'oblink_messages';

    // Get latest message for each conversation involving the user
    // This is a bit complex SQL to group by conversation and get the LATEST entry
    /* 
       Logic: Find all unique conversation_ids where user is sender or receiver.
       Then get the last message details for that conversation.
    */

    $sql = "
        SELECT m1.*, 
               CASE 
                   WHEN m1.sender_id = $user_id THEN m1.receiver_id 
                   ELSE m1.sender_id 
               END as contact_id
        FROM $table_name m1
        JOIN (
            SELECT conversation_id, MAX(id) as last_msg_id
            FROM $table_name
            WHERE sender_id = $user_id OR receiver_id = $user_id
            GROUP BY conversation_id
        ) m2 ON m1.id = m2.last_msg_id
        ORDER BY m1.time DESC
    ";

    return $wpdb->get_results($sql);
}

// 4. GET MESSAGES IN A CONVERSATION
function oblink_get_messages($contact_id)
{
    global $wpdb;
    $user_id = get_current_user_id();
    $ids = [$user_id, $contact_id];
    sort($ids);
    $conversation_id = implode('-', $ids);

    $table_name = $wpdb->prefix . 'oblink_messages';

    // Mark as read when opening (simple logic)
    $wpdb->update(
        $table_name,
        ['is_read' => 1],
        ['conversation_id' => $conversation_id, 'receiver_id' => $user_id]
    );

    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE conversation_id = %s ORDER BY time ASC",
            $conversation_id
        )
    );

    return $results;
}

// 5. AJAX HANDLERS
add_action('wp_ajax_oblink_send_msg', 'oblink_ajax_send_msg');
function oblink_ajax_send_msg()
{
    check_ajax_referer('oblink_nonce', 'nonce');

    $receiver_id = intval($_POST['receiver_id']);
    $message = sanitize_textarea_field($_POST['message']);

    if (oblink_send_message($receiver_id, '', $message)) {
        wp_send_json_success(['message' => 'Envoyé']);
    } else {
        wp_send_json_error(['message' => 'Erreur envoi']);
    }
}

add_action('wp_ajax_oblink_load_chat', 'oblink_ajax_load_chat');
function oblink_ajax_load_chat()
{
    check_ajax_referer('oblink_nonce', 'nonce');
    $contact_id = intval($_GET['contact_id']);

    $messages = oblink_get_messages($contact_id);

    // Format HTML return
    ob_start();
    $current_user = get_current_user_id();
    foreach ($messages as $msg) {
        $is_me = $msg->sender_id == $current_user;
        ?>
        <div class="flex <?php echo $is_me ? 'justify-end' : 'justify-start'; ?> mb-4">
            <div
                class="<?php echo $is_me ? 'bg-oblink-blue text-white' : 'bg-gray-100 text-gray-800'; ?> rounded-2xl py-2 px-4 max-w-[80%] text-sm">
                <?php echo nl2br(esc_html($msg->message)); ?>
                <div class="text-[10px] <?php echo $is_me ? 'text-blue-100' : 'text-gray-400'; ?> mt-1 text-right">
                    <?php echo date_i18n('d M H:i', strtotime($msg->time)); ?>
                </div>
            </div>
        </div>
        <?php
    }
    $html = ob_get_clean();
    wp_send_json_success(['html' => $html]);
}

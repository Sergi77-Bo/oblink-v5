<?php
// OBLINK - Admin Columns Customization
// Adds custom columns to the Users list in WP Admin for better visibility

// 1. ADD COLUMNS
function oblink_add_user_columns($columns)
{
    // Remove "Posts" column (not useful for users)
    unset($columns['posts']);

    // Add new columns
    $columns['oblink_type'] = 'Type';
    $columns['oblink_info'] = 'Infos Pro';
    $columns['oblink_status'] = 'Statut';

    return $columns;
}
add_filter('manage_users_columns', 'oblink_add_user_columns');

// 2. FILL COLUMNS
function oblink_fill_user_columns($value, $column_name, $user_id)
{
    $type = get_user_meta($user_id, 'oblink_user_type', true);

    if ($column_name === 'oblink_type') {
        if ($type === 'opticien') {
            return '<span style="background:#0099FF; color:white; padding:3px 8px; border-radius:4px; font-weight:bold; font-size:11px;">Opticien</span>';
        } elseif ($type === 'entreprise') {
            return '<span style="background:#9A48D0; color:white; padding:3px 8px; border-radius:4px; font-weight:bold; font-size:11px;">Entreprise</span>';
        } else {
            return '<span style="color:#999;">-</span>';
        }
    }

    if ($column_name === 'oblink_info') {
        if ($type === 'opticien') {
            $diploma = get_user_meta($user_id, 'oblink_diploma', true);
            $exp = get_user_meta($user_id, 'oblink_experience', true);
            $city = get_user_meta($user_id, 'oblink_city', true);
            return "<strong>$diploma</strong><br><small>$exp</small><br><small>$city</small>";
        } elseif ($type === 'entreprise') {
            $company = get_user_meta($user_id, 'company_name', true);
            $siret = get_user_meta($user_id, 'siret', true);
            return "<strong>$company</strong><br><small>SIRET: $siret</small>";
        }
    }

    if ($column_name === 'oblink_status') {
        $status = get_user_meta($user_id, 'oblink_status', true);
        if ($status === 'verified') {
            return '<span style="color:green; font-weight:bold;">Vérifié ✅</span>';
        } elseif ($status === 'premium') {
            return '<span style="color:orange; font-weight:bold;">PREMIUM ⭐️</span>';
        } elseif ($status === 'pending') {
            return '<span style="color:gray;">En attente ⏳</span>';
        } else {
            return '-';
        }
    }

    return $value;
}
add_filter('manage_users_custom_column', 'oblink_fill_user_columns', 10, 3);
?>
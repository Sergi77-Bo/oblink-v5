<?php
/**
 * OBLINK Theme - Minimal Working Version
 * All features disabled to isolate the error
 */

// Disable all plugins-style debugging
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Register WordPress features
function oblink_minimal_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'oblink_minimal_setup');

// Enqueue minimal CSS
function oblink_minimal_enqueue() {
    wp_enqueue_style('oblink-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'oblink_minimal_enqueue');

// Simple user role function
function oblink_get_user_role() {
    if (!is_user_logged_in()) {
        return 'visitor';
    }
    if (current_user_can('manage_options')) {
        return 'recruiter';
    }
    return 'student';
}

// That's all for now

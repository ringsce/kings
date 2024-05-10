<?php
/**
 * If uninstall not called from WordPress, exit.
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

/**
 * Custom post types to unregister
 */
$post_types = ['book'];

/**
 * Delete options specific to this plugin
 */
$options = ['plugin_option_1', 'plugin_option_2']; // Add your option names here

/**
 * Custom tables to drop
 */
// $tables = ['custom_table_1', 'custom_table_2']; // Add custom tables if needed

// Unregister custom post types
foreach ($post_types as $post_type) {
    unregister_post_type($post_type);
}

// Delete custom options
foreach ($options as $option) {
    delete_option($option);
}

// Drop custom tables
global $wpdb;
// foreach ($tables as $table) {
//     $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}$table");
// }

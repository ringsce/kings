<?php
/*
 * Plugin Name:       My Basics Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Pedro Dias Vicente
 * Author URI:        https://ringscejs.gleentech.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       main
 * Domain Path:       /languages
 */

// Register the "book" custom post type
function pluginprefix_setup_post_type() {
    register_post_type('book', [
        'public' => true,
        'label' => 'Books',
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
}
add_action('init', 'pluginprefix_setup_post_type');

// Activate the plugin
function pluginprefix_activate() {
    pluginprefix_setup_post_type();
    flush_rewrite_rules(); // Ensure rewrite rules are updated
}
register_activation_hook(__FILE__, 'pluginprefix_activate');

// Deactivate the plugin
function pluginprefix_deactivate() {
    unregister_post_type('book');
    flush_rewrite_rules(); // Clear rewrite rules on deactivation
}
register_deactivation_hook(__FILE__, 'pluginprefix_deactivate');

// Admin-specific functionality
if (is_admin()) {
    require_once __DIR__ . '/admin/plugin-name-admin.php'; // Include admin-related code
}

// Rewrite rules to detect '/docs'
function custom_rewrite_rules() {
    add_rewrite_rule('^docs/?', 'index.php?pagename=your-docs-page', 'top');
    add_rewrite_rule('^docs/([^/]*)/?', 'index.php?pagename=documentation&doc_param=$matches[1]', 'top');
}
add_action('init', 'custom_rewrite_rules');

// Custom query variable for the rewrite rules
function add_custom_query_vars($vars) {
    $vars[] = 'doc_param'; // Allow custom query variable
    return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

// Redirect if URL contains '/docs'
function check_if_docs_in_url() {
    $request_uri = $_SERVER['REQUEST_URI'];

    if (strpos($request_uri, '/docs') !== false) {
        wp_redirect(home_url('/documentation-page')); // Redirect to a specific page
        exit;
    }
}
add_action('template_redirect', 'check_if_docs_in_url');

// Template handling based on custom query variable
function check_docs_param() {
    $doc_param = get_query_var('doc_param');

    if ($doc_param) {
        // You can use $doc_param to load specific content or take other actions
        echo "Documentation parameter: " . esc_html($doc_param);
        // You could load a specific template here if needed
    }
}
add_action('template_redirect', 'check_docs_param');

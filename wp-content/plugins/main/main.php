<?php
/*
 * Plugin Name:       ringsce
 * Plugin URI:        https://ringscejs.gleentech.com/plugins/the-wisdom/
 * Description:       Handles the deck builder as wp-plugin
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Pedro Dias Vicente
 * Author URI:        https://ringscejs.gleentech.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:         https://ringscejs.gleentech.com/plugins/the-wisdom/
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


/**
 * Shortcode to list files in a directory
 */
function directory_reader_shortcode($atts) {
    // Default attributes
    $atts = shortcode_atts(
        array(
            'path' => '/deck', // Default path to read
        ),
        $atts,
        'directory_reader'
    );

    // Get absolute path on the server
    $directory_path = realpath(WP_CONTENT_DIR . $atts['path']); // Ensure it's a valid path

    if (!$directory_path || !is_dir($directory_path)) {
        return 'Invalid directory path.';
    }

    // Get list of files in the directory
    $files = scandir($directory_path);
    if (!$files) {
        return 'No files found in the directory.';
    }

    // Build a list of files to display
    $output = '<ul>';
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue; // Skip current and parent directory links
        }

        // Create a link to the file (assuming the directory is accessible via URL)
        $file_url = content_url($atts['path'] . '/' . $file); // URL to access the file
        $output .= '<li><a href="' . esc_url($file_url) . '" target="_blank">' . esc_html($file) . '</a></li>';
    }
    $output .= '</ul>';

    return $output;
}
add_shortcode('directory_reader', 'directory_reader_shortcode');


/*
vuejs part and initialization
*/
// Enqueue Vue.js and your custom JavaScript
function enqueue_vuejs_scripts() {
    // Enqueue Vue.js from a CDN
    wp_enqueue_script('vuejs', 'https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js', [], '2.6.14', true);

    // Enqueue your custom JavaScript for Vue components
    wp_enqueue_script('my-vue-script', plugins_url('/assets/js/vue-script.js', __FILE__), ['vuejs'], '1.0.0', true);

    // Pass WordPress data to the Vue component if needed
    wp_localize_script('my-vue-script', 'MyPluginData', [
        'ajax_url' => admin_url('admin-ajax.php'), // URL for AJAX calls if needed
        'nonce' => wp_create_nonce('vuejs_nonce'), // Security nonce
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_vuejs_scripts');

// Shortcode to render a Vue component
function vuejs_shortcode() {
    // Output the div where Vue.js will mount the component
    return '<div id="vue-component"></div>';
}
add_shortcode('vuejs_component', 'vuejs_shortcode');
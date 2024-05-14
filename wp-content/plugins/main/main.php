<?php
/*
 * Plugin Name:       ringsce
 * Plugin URI:        https://ringscejs.gleentech.com/plugins/the-wisdom/
 * Description:       Handles the deck builder as a WordPress plugin.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Pedro Dias Vicente
 * Author URI:        https://ringscejs.gleentech.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://ringscejs.gleentech.com/plugins/the-wisdom/
 * Text Domain:       ringsce
 * Domain Path:       /languages
 */

// Register the "book" custom post type
function pluginprefix_setup_post_type() {
    register_post_type('book', [
        'public' => true,
        'label' => 'Books',
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'books'],
    ]);
}
add_action('init', 'pluginprefix_setup_post_type');

// Activate the plugin
function pluginprefix_activate() {
    pluginprefix_setup_post_type();
    flush_rewrite_rules(); // Only flush on activation
}
register_activation_hook(__FILE__, 'pluginprefix_activate');

// Deactivate the plugin
function pluginprefix_deactivate() {
    unregister_post_type('book');
    flush_rewrite_rules(); // Flush on deactivation
}
register_deactivation_hook(__FILE__, 'pluginprefix_deactivate');

// Admin-specific functionality
if (is_admin()) {
    require_once __DIR__ . '/admin/plugin-name-admin.php'; // Include admin-related code
}

// Custom rewrite rules
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
        wp_redirect(home_url('/documentation-page')); // Ensure this doesn't cause infinite loops or conflicts
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
    }
}
add_action('template_redirect', 'check_docs_param');

// Shortcode to list files in a directory
function directory_reader_shortcode($atts) {
    // Default attributes
    $atts = shortcode_atts(
        array(
            'path' => '/deck', // Ensure this path is valid and secure
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
        if ($file === '.' || '..') {
            continue;
        }

        $file_url = content_url($atts['path'] . '/' . $file);
        $output .= '<li><a href="' . esc_url($file_url) . '">' . esc_html($file) . '</a></li>';
    }
    $output .= '</ul>';

    return $output;
}
add_shortcode('directory_reader', 'directory_reader_shortcode');

// Enqueue Vue.js scripts and shortcode
function enqueue_vuejs_scripts() {
    wp_enqueue_script('vuejs', 'https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js', [], '2.6.14', true);

    // Enqueue Vue components
    wp_enqueue_script('my-vue-script', plugins_url('/assets/js/vue-script.js', __FILE__), ['vuejs'], '1.0.0', true);

    wp_localize_script('my-vue-script', 'MyPluginData', [
        'ajax_url' => admin_url('admin-ajax.php'), // URL for AJAX
        'nonce' => wp_create_nonce('vuejs_nonce'), // Security nonce
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_vuejs_scripts');

// Vue.js shortcode
function vuejs_shortcode() {
    return '<div id="vue-component"></div>';
}
add_shortcode('vuejs_component', 'vuejs_shortcode');

// Block editor assets for Markdown block
function markdown_block_assets() {
    // Enqueue block's JavaScript
    wp_enqueue_script(
        'markdown-block-script',
        plugin_dir_url(__FILE__) . 'block.js',
        ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-block-editor'],
        filemtime(plugin_dir_path(__FILE__) . 'block.js'),
        true
    );

    // Include marked.js
    wp_enqueue_script(
        'marked-js',
        'https://cdn.jsdelivr.net/npm/marked/marked.min.js',
        [],
        null,
        true
    );

    // Block's CSS
    wp_enqueue_style(
        'markdown-block-style',
        plugin_dir_url(__FILE__) . 'public/css/block.css',
        [],
        filemtime(plugin_dir_path(__FILE__) . 'block.css')
    );
}
add_action('enqueue_block_editor_assets', 'markdown_block_assets');

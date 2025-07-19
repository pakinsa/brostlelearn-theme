<?php
/**
 * BrostleLearn functions and definitions
 *
 * @package BrostleLearn
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Sets up theme defaults and registers support for various WordPress features
 */
function brostlelearn_setup() {
    // Make theme available for translation
    load_theme_textdomain('brostlelearn', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'brostlelearn'),
        )
    );

    // HTML5 markup support
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Custom background support
    add_theme_support(
        'custom-background',
        apply_filters(
            'brostlelearn_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Custom logo support
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 50,
            'width'       => 200,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    // Add theme support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'brostlelearn_setup');

/**
 * Enqueue scripts and styles
 */
function brostlelearn_scripts() {
    // Main stylesheet
    wp_enqueue_style(
        'brostlelearn-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        wp_get_theme()->get('Version')
    );

    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0'
    );

    // Main JavaScript file
    wp_enqueue_script(
        'brostlelearn-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script for AJAX
    wp_localize_script(
        'brostlelearn-main',
        'brostlelearn_vars',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('brostlelearn_nonce')
        )
    );

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'brostlelearn_scripts');

/**
 * Include theme files
 */
$theme_includes = array(
    '/inc/customizer.php',             // Customizer settings
    '/inc/class-brostlelearn-menu-walker.php', // Custom menu walker
    '/inc/template-tags.php',          // Custom template tags
    '/inc/template-functions.php',     // Theme functions
    '/inc/course-post-type.php',       // Course post type registration ★ Added
    '/inc/custom-header.php',          // Custom header (optional)
);

foreach ($theme_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'brostlelearn'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);

/**
 * Load Jetpack compatibility file if available
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Theme activation setup
 */
function brostlelearn_theme_activation() {
    // Set default options
    if (!get_theme_mod('primary_color')) {
        set_theme_mod('primary_color', '#aa4db5');
    }
    if (!get_theme_mod('secondary_color')) {
        set_theme_mod('secondary_color', '#8a3a94');
    }
    
    // Flush rewrite rules for custom post types
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'brostlelearn_theme_activation');

/**
 * Flush rewrite rules on deactivation
 */
function brostlelearn_theme_deactivation() {
    flush_rewrite_rules();
}
add_action('switch_theme', 'brostlelearn_theme_deactivation');
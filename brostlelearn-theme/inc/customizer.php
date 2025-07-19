<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * BrostleLearn Theme Customizer
 *
 * @package BrostleLearn
 */

function brostlelearn_customize_register($wp_customize) {
    // ========== Site Identity ========== //
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    
    // ========== Social Media Settings ========== //
    $wp_customize->add_section('brostlelearn_social_section', array(
        'title'    => __('Social Media Links', 'brostlelearn'),
        'priority' => 30,
    ));

    // WhatsApp
    $wp_customize->add_setting('whatsapp_url', array(
        'default'           => 'https://wa.me/447366517782',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('whatsapp_url', array(
        'label'    => __('WhatsApp URL', 'brostlelearn'),
        'section'  => 'brostlelearn_social_section',
        'type'     => 'url',
    ));

    // Facebook
    $wp_customize->add_setting('facebook_url', array(
        'default'           => 'https://web.facebook.com/brostlelearn',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('facebook_url', array(
        'label'    => __('Facebook URL', 'brostlelearn'),
        'section'  => 'brostlelearn_social_section',
        'type'     => 'url',
    ));

    // YouTube
    $wp_customize->add_setting('youtube_url', array(
        'default'           => 'https://www.youtube.com/@BrostleLearn',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('youtube_url', array(
        'label'    => __('YouTube URL', 'brostlelearn'),
        'section'  => 'brostlelearn_social_section',
        'type'     => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('instagram_url', array(
        'default'           => 'https://www.instagram.com/brostlelearn_/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label'    => __('Instagram URL', 'brostlelearn'),
        'section'  => 'brostlelearn_social_section',
        'type'     => 'url',
    ));

    // LinkedIn
    $wp_customize->add_setting('linkedin_url', array(
        'default'           => 'https://www.linkedin.com/company/brostlelearn/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label'    => __('LinkedIn URL', 'brostlelearn'),
        'section'  => 'brostlelearn_social_section',
        'type'     => 'url',
    ));

    // ========== Contact Information ========== //
    $wp_customize->add_section('brostlelearn_contact_section', array(
        'title'    => __('Contact Information', 'brostlelearn'),
        'priority' => 35,
    ));

    // Email Address
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'business@brostlelearn.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'    => __('Contact Email', 'brostlelearn'),
        'section'  => 'brostlelearn_contact_section',
        'type'     => 'email',
    ));

    // ========== Theme Colors ========== //
    $wp_customize->add_section('brostlelearn_colors', array(
        'title'    => __('Theme Colors', 'brostlelearn'),
        'priority' => 40,
    ));

    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#aa4db5',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Primary Color', 'brostlelearn'),
        'section'  => 'brostlelearn_colors',
    )));

    // Secondary Color
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#8a3a94',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('Secondary Color', 'brostlelearn'),
        'section'  => 'brostlelearn_colors',
    )));
}
add_action('customize_register', 'brostlelearn_customize_register');

/**
 * Generate dynamic CSS from Customizer settings
 */
function brostlelearn_customizer_css() {
    ?>
    <style type="text/css">
        :root {
            --primary: <?php echo esc_html(get_theme_mod('primary_color', '#aa4db5')); ?>;
            --secondary: <?php echo esc_html(get_theme_mod('secondary_color', '#8a3a94')); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'brostlelearn_customizer_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function brostlelearn_customize_preview_js() {
    wp_enqueue_script(
        'brostlelearn-customizer',
        get_template_directory_uri() . '/assets/js/customizer.js',
        array('customize-preview'),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('customize_preview_init', 'brostlelearn_customize_preview_js');
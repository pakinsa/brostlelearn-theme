<?php
if (!defined('ABSPATH')) exit;

function brostlelearn_register_course_post_type() {
    register_post_type('course', [
        'labels' => [
            'name' => __('Courses', 'brostlelearn'),
            'singular_name' => __('Course', 'brostlelearn')
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite' => ['slug' => 'courses'],
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_rest' => true
    ]);
}
add_action('init', 'brostlelearn_register_course_post_type');

// Add course categories
function brostlelearn_register_course_taxonomy() {
    register_taxonomy('course_category', 'course', [
        'label' => __('Course Categories', 'brostlelearn'),
        'hierarchical' => true,
        'show_admin_column' => true
    ]);
}
add_action('init', 'brostlelearn_register_course_taxonomy');
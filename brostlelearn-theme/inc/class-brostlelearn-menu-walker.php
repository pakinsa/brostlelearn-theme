<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Custom menu walker for BrostleLearn theme
 * 
 * @package BrostleLearn
 */
class BrostleLearn_Menu_Walker extends Walker_Nav_Menu {
    
    /**
     * Start the element output
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param WP_Post $item Menu item data object.
     * @param int $depth Depth of menu item.
     * @param stdClass $args An object of wp_nav_menu() arguments.
     * @param int $id Current item ID.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        
        // Build HTML output
        $output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr($class_names) . '">';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }
}
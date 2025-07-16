<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
    <nav>
        <div class="logo-container">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                echo '<a href="' . esc_url(home_url('/')) . '" rel="home">';
                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/brostlelogosmall.png') . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                echo '</a>';
            }
            ?>
        </div>
        
        <button class="mobile-menu-btn" aria-label="Toggle menu">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="nav-links">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'fallback_cb'    => false,
                'walker'         => new BrostleLearn_Menu_Walker()
            ));
            ?>
            <a href="#courses" class="browse-courses">Browse Courses</a>
        </div>
    </nav>
</header>
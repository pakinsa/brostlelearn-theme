<?php
/**
 * Front Page Template
 */
get_header();
?>

<!-- Hero Section -->
<section class="hero">
    <h1><?php echo esc_html(get_theme_mod('hero_title', 'Launch Your Tech Career with 1-on-1 Mentorship')); ?></h1>
    <p><?php echo esc_html(get_theme_mod('hero_subtitle', 'Get personalized training from industry experts and land your dream job in tech')); ?></p>
    <a href="#courses" class="btn btn-primary" style="background-color: var(--accent); border-color: var(--accent); margin-top: 1rem;">Explore Programs</a>
</section>

<!-- Dynamic Courses Section -->
<?php get_template_part('template-parts/courses-grid'); ?>

<?php get_footer(); ?>
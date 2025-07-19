<section id="courses" class="courses">
    <h2 class="section-title"><?php echo esc_html(get_theme_mod('courses_title', 'Our Featured Programs')); ?></h2>
    
    <div class="course-grid">
        <?php 
        $courses_query = new WP_Query([
            'post_type' => 'course',
            'posts_per_page' => 8,
            'orderby' => 'date',
            'order' => 'DESC'
        ]);
        
        while ($courses_query->have_posts()) : $courses_query->the_post();
            $fallback_image = get_template_directory_uri() . '/assets/images/course-fallback.jpg';
        ?>
            <div class="course-card">
                <img src="<?php echo has_post_thumbnail() ? esc_url(get_the_post_thumbnail_url()) : esc_url($fallback_image); ?>" alt="<?php the_title_attribute(); ?>">
                
                <div class="course-content">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        <?php 
        endwhile; 
        wp_reset_postdata();
        ?>
    </div>
</section>
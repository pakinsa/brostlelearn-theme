<footer>
    <div class="social-icons">
        <?php
        $social_links = array(
            'whatsapp' => get_theme_mod('whatsapp_url'),
            'facebook' => get_theme_mod('facebook_url'),
            'youtube'  => get_theme_mod('youtube_url'),
            'instagram'=> get_theme_mod('instagram_url'),
            'linkedin' => get_theme_mod('linkedin_url')
        );
        
        foreach ($social_links as $platform => $url) {
            if (!empty($url)) {
                echo '<a href="' . esc_url($url) . '" aria-label="' . esc_attr(ucfirst($platform)) . '">';
                echo '<i class="fab fa-' . esc_attr($platform) . '"></i>';
                echo '</a>';
            }
        }
        ?>
    </div>
    
    <div class="contact-info">
        <p>
            <?php 
            echo esc_html__('Contact:', 'brostlelearn') . ' ';
            $email = get_theme_mod('contact_email', 'business@brostlelearn.com');
            echo '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>';
            ?>
        </p>
    </div>
    
    <p>
        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 
        <?php esc_html_e('All rights reserved.', 'brostlelearn'); ?>
    </p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
<?php
/**
 * Footer Template
 * 
 * @package Extreme_Sports_Elite
 */
?>
    </main><!-- end main -->

    <footer class="site-footer">
        <div class="container">
            <!-- Footer Widgets -->
            <div class="footer-content">
                <?php
                // Footer Widget Areas
                if (is_active_sidebar('footer-widget-1')) {
                    echo '<div class="footer-widget">';
                    dynamic_sidebar('footer-widget-1');
                    echo '</div>';
                }
                
                if (is_active_sidebar('footer-widget-2')) {
                    echo '<div class="footer-widget">';
                    dynamic_sidebar('footer-widget-2');
                    echo '</div>';
                }
                
                if (is_active_sidebar('footer-widget-3')) {
                    echo '<div class="footer-widget">';
                    dynamic_sidebar('footer-widget-3');
                    echo '</div>';
                }
                
                // Default Footer Info
                if (!is_active_sidebar('footer-widget-1') && !is_active_sidebar('footer-widget-2') && !is_active_sidebar('footer-widget-3')) {
                    ?>
                    <div class="footer-widget">
                        <h4 class="footer-widget-title"><?php esc_html_e('About Us', 'extreme-sports'); ?></h4>
                        <p><?php bloginfo('description'); ?></p>
                    </div>
                    
                    <div class="footer-widget">
                        <h4 class="footer-widget-title"><?php esc_html_e('Quick Links', 'extreme-sports'); ?></h4>
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'extreme-sports'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('athletes')); ?>"><?php esc_html_e('Athletes', 'extreme-sports'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('events')); ?>"><?php esc_html_e('Events', 'extreme-sports'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('gear')); ?>"><?php esc_html_e('Gear', 'extreme-sports'); ?></a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-widget">
                        <h4 class="footer-widget-title"><?php esc_html_e('Latest Posts', 'extreme-sports'); ?></h4>
                        <ul>
                            <?php
                            $recent_posts = new WP_Query(array(
                                'posts_per_page' => 3,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            ));
                            
                            while ($recent_posts->have_posts()) {
                                $recent_posts->the_post();
                                echo '<li><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></li>';
                            }
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Footer Info -->
            <div class="site-info" style="text-align: center; padding-top: 30px; border-top: 1px solid #444; margin-top: 30px; color: #999; font-size: 14px;">
                <p>
                    &copy; <?php echo esc_html(date('Y')); ?> 
                    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: #ff6b35; text-decoration: none;">
                        <?php bloginfo('name'); ?>
                    </a> 
                    - <?php esc_html_e('All rights reserved', 'extreme-sports'); ?>
                </p>
                <p><?php esc_html_e('Powered by WordPress & Extreme Sports Elite Theme', 'extreme-sports'); ?></p>
                
                <!-- Footer Menu -->
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'menu_class' => 'footer-menu',
                    'fallback_cb' => false,
                    'depth' => 1
                ));
                ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>

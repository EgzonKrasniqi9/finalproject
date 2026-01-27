<?php
/**
 * Prison Break Elite - Footer Template
 * 
 * @package Prison_Break_Elite
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
        </main>
        
        <footer id="colophon" class="site-footer">
            <div class="footer-content">
                <div class="footer-widgets">
                    <?php
                    if (is_active_sidebar('footer-widget-1')) {
                        echo '<div class="footer-widget-area footer-1">';
                        dynamic_sidebar('footer-widget-1');
                        echo '</div>';
                    }
                    
                    if (is_active_sidebar('footer-widget-2')) {
                        echo '<div class="footer-widget-area footer-2">';
                        dynamic_sidebar('footer-widget-2');
                        echo '</div>';
                    }
                    
                    if (is_active_sidebar('footer-widget-3')) {
                        echo '<div class="footer-widget-area footer-3">';
                        dynamic_sidebar('footer-widget-3');
                        echo '</div>';
                    }
                    ?>
                </div>
                
                <div class="footer-bottom">
                    <?php prison_break_site_info(); ?>
                </div>
            </div>
        </footer>
    </div>
    
    <?php wp_footer(); ?>
</body>
</html>

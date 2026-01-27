<?php
/**
 * 404 Error Page Template
 * 
 * Template for displaying 404 Not Found errors
 * 
 * @package Extreme_Sports_Elite
 */

get_header();
?>

<div class="container">
    <div class="error-404" style="padding: 60px 20px; text-align: center;">
        <div class="error-title" style="font-size: 5rem; color: #ff6b35; font-weight: bold; margin-bottom: 20px;">
            404
        </div>
        
        <div class="error-message" style="font-size: 1.8rem; color: #004e89; margin-bottom: 20px;">
            <?php esc_html_e('Page Not Found!', 'extreme-sports'); ?>
        </div>
        
        <div class="error-description" style="color: #666; margin-bottom: 40px; font-size: 1.1rem; max-width: 500px; margin-left: auto; margin-right: auto;">
            <?php esc_html_e('Sorry, the page you are looking for doesn\'t exist. It might have been moved or deleted. Please check the URL and try again, or use the search function to find what you\'re looking for.', 'extreme-sports'); ?>
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="error-button" style="display: inline-block; background: #ff6b35; color: white; padding: 15px 40px; border-radius: 5px; text-decoration: none; font-size: 1.1rem; transition: background 0.3s;">
                <?php esc_html_e('← Go to Homepage', 'extreme-sports'); ?>
            </a>
            
            <button onclick="history.back()" class="error-button" style="display: inline-block; background: #004e89; color: white; padding: 15px 40px; border-radius: 5px; text-decoration: none; font-size: 1.1rem; border: none; cursor: pointer; transition: background 0.3s;">
                <?php esc_html_e('← Go Back', 'extreme-sports'); ?>
            </button>
        </div>

        <!-- Search Form -->
        <div style="margin-bottom: 40px;">
            <h3 style="margin-bottom: 20px; color: #004e89;"><?php esc_html_e('Try searching for something:', 'extreme-sports'); ?></h3>
            <?php get_search_form(); ?>
        </div>

        <!-- Helpful Links -->
        <div style="margin-top: 40px; padding-top: 40px; border-top: 1px solid #e0e0e0;">
            <h3 style="margin-bottom: 20px; color: #004e89;"><?php esc_html_e('Popular Sections', 'extreme-sports'); ?></h3>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 20px;">
                <div>
                    <h4 style="margin-bottom: 10px; color: #ff6b35;">
                        <a href="<?php echo esc_url(home_url('/')); ?>" style="text-decoration: none; color: #ff6b35;">
                            <?php esc_html_e('Home', 'extreme-sports'); ?>
                        </a>
                    </h4>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 10px; color: #ff6b35;">
                        <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" style="text-decoration: none; color: #ff6b35;">
                            <?php esc_html_e('Latest Posts', 'extreme-sports'); ?>
                        </a>
                    </h4>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 10px; color: #ff6b35;">
                        <a href="<?php echo esc_url(get_post_type_archive_link('athletes')); ?>" style="text-decoration: none; color: #ff6b35;">
                            <?php esc_html_e('Athletes', 'extreme-sports'); ?>
                        </a>
                    </h4>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 10px; color: #ff6b35;">
                        <a href="<?php echo esc_url(get_post_type_archive_link('events')); ?>" style="text-decoration: none; color: #ff6b35;">
                            <?php esc_html_e('Events', 'extreme-sports'); ?>
                        </a>
                    </h4>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 10px; color: #ff6b35;">
                        <a href="<?php echo esc_url(get_post_type_archive_link('gear')); ?>" style="text-decoration: none; color: #ff6b35;">
                            <?php esc_html_e('Gear', 'extreme-sports'); ?>
                        </a>
                    </h4>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 10px; color: #ff6b35;">
                        <a href="<?php echo esc_url(get_post_type_archive_link('videos')); ?>" style="text-decoration: none; color: #ff6b35;">
                            <?php esc_html_e('Videos', 'extreme-sports'); ?>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

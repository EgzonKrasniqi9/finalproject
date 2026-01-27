<?php
/**
 * Prison Break Elite - 404 Not Found Template
 * 
 * @package Prison_Break_Elite
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container">
    <div class="error-404">
        <div class="error-content">
            <h1 class="error-code">404</h1>
            <h2 class="error-title"><?php esc_html_e('Escape Not Possible', 'prison-break'); ?></h2>
            <p class="error-message">
                <?php esc_html_e('The page you are looking for has disappeared without a trace. Like the perfect escape, this page cannot be found.', 'prison-break'); ?>
            </p>
            
            <a href="<?php echo esc_url(home_url('/')); ?>" class="error-button">
                <?php esc_html_e('Return to Freedom', 'prison-break'); ?>
            </a>
        </div>
        
        <div class="error-sidebar">
            <h3><?php esc_html_e('Recent Episodes', 'prison-break'); ?></h3>
            <ul class="recent-posts">
                <?php
                $recent_posts = get_posts(array(
                    'posts_per_page' => 5,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                foreach ($recent_posts as $post) {
                    echo '<li><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php
get_footer();

<?php
/**
 * Prison Break Elite - Sidebar Template
 * 
 * @package Prison_Break_Elite
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<aside id="secondary" class="primary-sidebar" role="complementary">
    <?php
    if (is_active_sidebar('primary-sidebar')) {
        dynamic_sidebar('primary-sidebar');
    } else {
        ?>
        <div class="widget">
            <h3 class="widget-title"><?php esc_html_e('Search the Site', 'prison-break'); ?></h3>
            <?php get_search_form(); ?>
        </div>
        
        <div class="widget">
            <h3 class="widget-title"><?php esc_html_e('Recent Posts', 'prison-break'); ?></h3>
            <ul>
                <?php
                $recent = new WP_Query(array(
                    'posts_per_page' => 5,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                if ($recent->have_posts()) {
                    while ($recent->have_posts()) {
                        $recent->the_post();
                        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }
                    wp_reset_postdata();
                }
                ?>
            </ul>
        </div>
        
        <div class="widget">
            <h3 class="widget-title"><?php esc_html_e('Categories', 'prison-break'); ?></h3>
            <ul>
                <?php wp_list_categories(array('title_li' => '')); ?>
            </ul>
        </div>
        <?php
    }
    ?>
</aside>

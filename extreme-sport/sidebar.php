<?php
/**
 * Sidebar Template
 * 
 * @package Extreme_Sports_Elite
 */

// Sidebar widgets are now displayed in index.php, single.php, archive.php, and search.php
// This is a fallback template for cases where sidebar needs to be included separately
?>
<aside class="sidebar">
    <?php
    if (is_active_sidebar('primary-sidebar')) {
        dynamic_sidebar('primary-sidebar');
    } else {
        // Default widgets if no widgets are registered
        ?>
        <div class="widget">
            <h3 class="widget-title"><?php esc_html_e('About', 'extreme-sports'); ?></h3>
            <p><?php bloginfo('description'); ?></p>
        </div>

        <div class="widget">
            <h3 class="widget-title"><?php esc_html_e('Categories', 'extreme-sports'); ?></h3>
            <ul>
                <?php wp_list_categories(array('show_count' => true)); ?>
            </ul>
        </div>

        <div class="widget">
            <h3 class="widget-title"><?php esc_html_e('Recent Posts', 'extreme-sports'); ?></h3>
            <ul>
                <?php
                $recent = new WP_Query(array(
                    'posts_per_page' => 5,
                    'orderby' => 'date'
                ));
                
                while ($recent->have_posts()) {
                    $recent->the_post();
                    echo '<li><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></li>';
                }
                wp_reset_postdata();
                ?>
            </ul>
        </div>

        <div class="widget">
            <h3 class="widget-title"><?php esc_html_e('Tags', 'extreme-sports'); ?></h3>
            <?php wp_tag_cloud(array('smallest' => 12, 'largest' => 18)); ?>
        </div>
        <?php
    }
    ?>
</aside>

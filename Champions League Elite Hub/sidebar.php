<?php
/**
 * Sidebar Template
 * 
 * Displays the primary sidebar with widgets.
 *
 * @package Champions_League_Elite_Hub
 */

if (!is_active_sidebar('primary-sidebar')) {
    return;
}
?>

<aside class="sidebar primary-sidebar" role="complementary" aria-label="<?php esc_attr_e('Primary Sidebar', 'champions-league'); ?>">
    <div class="sidebar-widgets">
        <?php
        // Display widgets from primary sidebar
        dynamic_sidebar('primary-sidebar');
        ?>

        <!-- Default Widgets if none configured -->
        <?php if (!is_active_sidebar('primary-sidebar')) : ?>
            <!-- Recent Posts Widget -->
            <div class="widget widget-recent-posts card mb-4">
                <div class="card-body">
                    <h3 class="widget-title card-title"><?php esc_html_e('Recent Posts', 'champions-league'); ?></h3>
                    <ul class="list-unstyled">
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 5,
                            'post_status' => 'publish'
                        ));
                        foreach ($recent_posts as $post) {
                            echo '<li class="mb-2"><a href="' . esc_url(get_permalink($post['ID'])) . '">' . esc_html($post['post_title']) . '</a></li>';
                        }
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="widget widget-categories card mb-4">
                <div class="card-body">
                    <h3 class="widget-title card-title"><?php esc_html_e('Categories', 'champions-league'); ?></h3>
                    <ul class="list-unstyled">
                        <?php
                        wp_list_categories(array(
                            'hide_empty' => false,
                            'format' => 'list',
                            'title_li' => '',
                            'walker' => new Custom_Category_Walker(),
                        ));
                        ?>
                    </ul>
                </div>
            </div>

            <!-- Tags Widget -->
            <div class="widget widget-tags card mb-4">
                <div class="card-body">
                    <h3 class="widget-title card-title"><?php esc_html_e('Tags', 'champions-league'); ?></h3>
                    <div class="tags-cloud">
                        <?php
                        wp_tag_cloud(array(
                            'smallest' => 12,
                            'largest' => 18,
                            'unit' => 'px',
                            'format' => 'flat',
                            'separator' => ' ',
                        ));
                        ?>
                    </div>
                </div>
            </div>

            <!-- Custom Post Types Widget -->
            <div class="widget widget-custom-post-types card mb-4">
                <div class="card-body">
                    <h3 class="widget-title card-title"><?php esc_html_e('Featured Matches', 'champions-league'); ?></h3>
                    <ul class="list-unstyled">
                        <?php
                        $featured_matches = new WP_Query(array(
                            'post_type' => 'match',
                            'posts_per_page' => 5,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ));

                        if ($featured_matches->have_posts()) {
                            while ($featured_matches->have_posts()) {
                                $featured_matches->the_post();
                                echo '<li class="mb-2">';
                                echo '<a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a>';
                                echo '<br><small class="text-muted">' . get_the_date() . '</small>';
                                echo '</li>';
                            }
                            wp_reset_postdata();
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- Search Widget -->
            <div class="widget widget-search card mb-4">
                <div class="card-body">
                    <h3 class="widget-title card-title"><?php esc_html_e('Search', 'champions-league'); ?></h3>
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</aside>

<?php
/**
 * Custom Category Walker for sidebar
 */
class Custom_Category_Walker extends Walker_Category {
    public function start_el(&$output, $category, $depth = 0, $args = null, $id = 0) {
        $cat_name = esc_attr($category->name);
        $link = '<a href="' . esc_url(get_category_link($category->term_id)) . '">';
        $link .= $cat_name . ' <span class="badge bg-secondary ms-1">' . absint($category->count) . '</span>';
        $link .= '</a>';

        if ('list' === $args['style']) {
            $output .= '<li class="cat-item mb-2">' . $link . "\n";
        } else {
            $output .= '<div class="cat-item mb-2">' . $link . "</div>\n";
        }
    }
}
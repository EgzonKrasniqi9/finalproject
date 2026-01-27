<?php
/**
 * Search Results Template
 * 
 * Template for displaying search results
 * 
 * @package Extreme_Sports_Elite
 */

get_header();
?>

<div class="container">
    <div style="display: grid; grid-template-columns: 1fr 300px; gap: 30px;">
        <!-- Main Content -->
        <div>
            <section class="posts-section">
                <div class="posts-header" style="margin-bottom: 30px;">
                    <h1 class="page-title">
                        <?php printf(esc_html__('Search Results for "%s"', 'extreme-sports'), get_search_query()); ?>
                    </h1>
                    <?php
                    global $wp_query;
                    printf(
                        '<p style="color: #666; margin-top: 10px;">%s</p>',
                        sprintf(
                            esc_html__('Found %d result(s) for your search.', 'extreme-sports'),
                            $wp_query->found_posts
                        )
                    );
                    ?>
                </div>

                <?php
                if (have_posts()) {
                    ?>
                    <!-- Search Results Grid -->
                    <div class="posts-grid">
                        <?php
                        while (have_posts()) {
                            the_post();
                            ?>
                            <article <?php post_class('post-card'); ?> id="post-<?php the_ID(); ?>">
                                <!-- Featured Image -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>" class="post-image-link">
                                            <?php the_post_thumbnail('extreme-sports-featured'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div style="padding: 20px;">
                                    <!-- Post Type Badge -->
                                    <span style="display: inline-block; background: #004e89; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px; margin-bottom: 10px;">
                                        <?php echo esc_html(get_post_type_object(get_post_type())->singular_name); ?>
                                    </span>

                                    <!-- Post Title -->
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            $title = get_the_title();
                                            $search_term = get_search_query();
                                            if ($search_term) {
                                                $title = str_ireplace($search_term, '<mark>' . $search_term . '</mark>', $title);
                                            }
                                            echo wp_kses_post($title);
                                            ?>
                                        </a>
                                    </h2>

                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <span class="meta-date">
                                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo get_the_date('F j, Y'); ?>
                                            </time>
                                        </span>
                                    </div>

                                    <!-- Post Excerpt -->
                                    <div class="post-excerpt" style="margin: 15px 0;">
                                        <?php
                                        $excerpt = get_the_excerpt();
                                        $search_term = get_search_query();
                                        if ($search_term) {
                                            $excerpt = str_ireplace($search_term, '<mark>' . $search_term . '</mark>', $excerpt);
                                        }
                                        echo wp_kses_post($excerpt);
                                        ?>
                                    </div>

                                    <!-- Read More Link -->
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        <?php esc_html_e('View Result →', 'extreme-sports'); ?>
                                    </a>
                                </div>
                            </article>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div style="margin-top: 50px;">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => esc_html__('← Previous', 'extreme-sports'),
                            'next_text' => esc_html__('Next →', 'extreme-sports'),
                        ));
                        ?>
                    </div>

                    <?php
                } else {
                    // No search results
                    ?>
                    <div style="background: #f0f0f0; padding: 40px; text-align: center; border-radius: 8px;">
                        <h2><?php esc_html_e('No Results Found', 'extreme-sports'); ?></h2>
                        <p><?php esc_html_e('We couldn\'t find anything matching your search. Try using different keywords.', 'extreme-sports'); ?></p>
                        
                        <!-- Search Form -->
                        <div style="margin-top: 30px;">
                            <?php get_search_form(); ?>
                        </div>

                        <!-- Related Links -->
                        <div style="margin-top: 30px;">
                            <h3><?php esc_html_e('Popular Posts', 'extreme-sports'); ?></h3>
                            <ul style="list-style: none; text-align: left; display: inline-block;">
                                <?php
                                $popular = new WP_Query(array(
                                    'posts_per_page' => 5,
                                    'orderby' => 'date',
                                    'order' => 'DESC'
                                ));
                                
                                while ($popular->have_posts()) {
                                    $popular->the_post();
                                    echo '<li style="padding: 5px 0;"><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></li>';
                                }
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </section>
        </div>

        <!-- Sidebar -->
        <aside class="sidebar">
            <?php
            if (is_active_sidebar('primary-sidebar')) {
                dynamic_sidebar('primary-sidebar');
            }
            ?>
        </aside>
    </div>
</div>

<?php
get_footer();

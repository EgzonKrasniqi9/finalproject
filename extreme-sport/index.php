<?php
/**
 * Main Index Template - Post Loop & Pagination
 * 
 * The main template file for displaying the blog/posts archive
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
                <?php
                if (have_posts()) {
                    ?>
                    <div class="posts-header" style="margin-bottom: 30px;">
                        <h1 class="page-title">
                            <?php
                            if (is_home()) {
                                esc_html_e('Latest Posts', 'extreme-sports');
                            } elseif (is_search()) {
                                printf(esc_html__('Search Results for "%s"', 'extreme-sports'), get_search_query());
                            } elseif (is_category()) {
                                single_cat_title();
                            } elseif (is_tag()) {
                                single_tag_title();
                            } else {
                                the_archive_title();
                            }
                            ?>
                        </h1>
                        <?php
                        if (is_search()) {
                            global $wp_query;
                            printf(
                                '<p style="color: #666; margin-top: 10px;">%s</p>',
                                sprintf(
                                    esc_html__('Found %d result(s) for your search.', 'extreme-sports'),
                                    $wp_query->found_posts
                                )
                            );
                        }
                        ?>
                    </div>

                    <!-- Posts Loop with Post Format Support -->
                    <div class="posts-grid">
                        <?php
                        while (have_posts()) {
                            the_post();
                            $post_format = get_post_format() ?: 'standard';
                            ?>
                            <article <?php post_class('post-card'); ?> id="post-<?php the_ID(); ?>">
                                <!-- Featured Image -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>" class="post-image-link">
                                            <?php the_post_thumbnail('extreme-sports-featured'); ?>
                                        </a>
                                        <?php if ($post_format !== 'standard') : ?>
                                            <span style="position: absolute; top: 10px; right: 10px; background: #ff6b35; color: white; padding: 5px 10px; border-radius: 3px; font-size: 12px; font-weight: bold;">
                                                <?php echo esc_html(ucfirst($post_format)); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div style="padding: 20px;">
                                    <!-- Post Title -->
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>

                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <span class="meta-date">
                                            <i style="margin-right: 5px;">📅</i>
                                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo get_the_date('F j, Y'); ?>
                                            </time>
                                        </span>
                                        <span class="meta-separator"> | </span>
                                        <span class="meta-author">
                                            <i style="margin-right: 5px;">👤</i>
                                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                <?php the_author(); ?>
                                            </a>
                                        </span>
                                        
                                        <?php if (has_category()) : ?>
                                            <span class="meta-separator"> | </span>
                                            <span class="meta-category">
                                                <i style="margin-right: 5px;">📁</i>
                                                <?php the_category(', '); ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php if (has_tag()) : ?>
                                            <span class="meta-separator"> | </span>
                                            <span class="meta-tags">
                                                <i style="margin-right: 5px;">🏷️</i>
                                                <?php the_tags('', ', '); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Post Excerpt -->
                                    <div class="post-excerpt" style="margin: 15px 0;">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <!-- Read More Link -->
                                    <div style="margin-top: 15px;">
                                        <a href="<?php the_permalink(); ?>" class="read-more">
                                            <?php esc_html_e('Read More →', 'extreme-sports'); ?>
                                        </a>
                                        <?php if (current_user_can('edit_posts')) : ?>
                                            <?php extreme_sports_edit_post_link(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div style="margin-top: 50px;">
                        <?php
                        if (function_exists('extreme_sports_pagination')) {
                            extreme_sports_pagination();
                        } else {
                            the_posts_pagination(array(
                                'mid_size' => 2,
                                'prev_text' => esc_html__('← Previous', 'extreme-sports'),
                                'next_text' => esc_html__('Next →', 'extreme-sports'),
                            ));
                        }
                        ?>
                    </div>

                    <?php
                } else {
                    // No posts found
                    ?>
                    <div style="background: #f0f0f0; padding: 40px; text-align: center; border-radius: 8px;">
                        <h2><?php esc_html_e('No Posts Found', 'extreme-sports'); ?></h2>
                        <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'extreme-sports'); ?></p>
                        <p>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="read-more">
                                <?php esc_html_e('Back to Home', 'extreme-sports'); ?>
                            </a>
                        </p>
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

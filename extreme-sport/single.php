<?php
/**
 * Single Post Template
 * 
 * Template for displaying single posts
 * 
 * @package Extreme_Sports_Elite
 */

get_header();
?>

<div class="container">
    <div style="display: grid; grid-template-columns: 1fr 300px; gap: 30px;">
        <!-- Main Content -->
        <div>
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    ?>
                    <article <?php post_class('single-post'); ?> id="post-<?php the_ID(); ?>">
                        <!-- Post Header -->
                        <div class="single-post-header">
                            <h1 class="single-post-title"><?php the_title(); ?></h1>
                            
                            <div class="single-post-meta">
                                <span>
                                    <strong><?php esc_html_e('Published:', 'extreme-sports'); ?></strong>
                                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                        <?php echo get_the_date('F j, Y \a\t g:i a'); ?>
                                    </time>
                                </span>
                                
                                <span>
                                    <strong><?php esc_html_e('By:', 'extreme-sports'); ?></strong>
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <?php the_author(); ?>
                                    </a>
                                </span>
                                
                                <?php if (has_category()) : ?>
                                    <span>
                                        <strong><?php esc_html_e('Category:', 'extreme-sports'); ?></strong>
                                        <?php the_category(', '); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <span>
                                    <strong><?php esc_html_e('Reading Time:', 'extreme-sports'); ?></strong>
                                    <?php
                                    $content = get_the_content();
                                    $word_count = str_word_count(strip_tags($content));
                                    $reading_time = ceil($word_count / 200);
                                    echo sprintf(esc_html__('%d min read', 'extreme-sports'), $reading_time);
                                    ?>
                                </span>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail" style="margin: 30px 0; border-radius: 8px; overflow: hidden;">
                                <?php the_post_thumbnail('extreme-sports-featured'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Post Content -->
                        <div class="single-post-content">
                            <?php
                            the_content();
                            
                            // Paginated posts
                            wp_link_pages(array(
                                'before' => '<div style="margin: 30px 0;"><strong>' . esc_html__('Pages:', 'extreme-sports') . '</strong> ',
                                'after' => '</div>',
                                'link_before' => '<span style="margin: 0 5px;">',
                                'link_after' => '</span>'
                            ));
                            ?>
                        </div>

                        <!-- Post Footer -->
                        <div class="single-post-footer">
                            <!-- Tags -->
                            <?php if (has_tag()) : ?>
                                <div class="post-tags" style="margin-bottom: 20px;">
                                    <strong style="display: block; width: 100%; margin-bottom: 10px;"><?php esc_html_e('Tags:', 'extreme-sports'); ?></strong>
                                    <?php the_tags('<span class="post-tag">', '</span><span class="post-tag">', '</span>'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Edit Link -->
                            <?php if (current_user_can('edit_posts')) : ?>
                                <div style="margin-bottom: 20px;">
                                    <?php extreme_sports_edit_post_link(); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Post Navigation -->
                            <div style="display: flex; gap: 20px; margin-top: 30px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
                                <div style="flex: 1;">
                                    <?php
                                    $prev_post = get_previous_post();
                                    if ($prev_post) {
                                        ?>
                                        <strong><?php esc_html_e('Previous:', 'extreme-sports'); ?></strong><br>
                                        <a href="<?php echo get_permalink($prev_post->ID); ?>" style="color: #ff6b35; text-decoration: none;">
                                            ← <?php echo esc_html($prev_post->post_title); ?>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div style="flex: 1; text-align: right;">
                                    <?php
                                    $next_post = get_next_post();
                                    if ($next_post) {
                                        ?>
                                        <strong><?php esc_html_e('Next:', 'extreme-sports'); ?></strong><br>
                                        <a href="<?php echo get_permalink($next_post->ID); ?>" style="color: #ff6b35; text-decoration: none;">
                                            <?php echo esc_html($next_post->post_title); ?> →
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Comments Section -->
                    <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>
                    <?php
                }
            }
            ?>
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

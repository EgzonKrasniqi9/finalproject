<?php
/**
 * Archive Template
 * 
 * Template for displaying archive pages (custom post types, categories, tags)
 * 
 * @package Extreme_Sports_Elite
 */

get_header();
?>

<div class="container">
    <!-- Archive Header -->
    <div class="archive-header">
        <h1 class="archive-title">
            <?php
            if (is_post_type_archive()) {
                $post_type_obj = get_post_type_object(get_post_type());
                if ($post_type_obj && isset($post_type_obj->label)) {
                    echo esc_html($post_type_obj->label);
                } else {
                    echo esc_html(ucfirst(get_post_type()));
                }
            } else {
                the_archive_title();
            }
            ?>
        </h1>
        <?php if (is_category() || is_tag()) : ?>
            <div class="archive-description">
                <?php echo term_description(); ?>
            </div>
        <?php endif; ?>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 300px; gap: 30px;">
        <!-- Main Content -->
        <div>
            <section class="posts-section">
                <?php
                if (have_posts()) {
                    ?>
                    <!-- Posts Grid -->
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
                                    <!-- Post Title -->
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>

                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <span class="meta-date">
                                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo get_the_date('F j, Y'); ?>
                                            </time>
                                        </span>
                                        <span class="meta-separator"> | </span>
                                        <span class="meta-author">
                                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                <?php the_author(); ?>
                                            </a>
                                        </span>
                                    </div>

                                    <!-- Post Excerpt -->
                                    <div class="post-excerpt" style="margin: 15px 0;">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <!-- Read More Link -->
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        <?php esc_html_e('Read More →', 'extreme-sports'); ?>
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

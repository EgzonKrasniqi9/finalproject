<?php
/**
 * Single Post Template
 * 
 * Displays individual posts and custom post types.
 *
 * @package Champions_League_Elite_Hub
 */

get_header();
?>

<div class="container mt-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <article <?php post_class('single-post'); ?> id="post-<?php the_ID(); ?>">
                <!-- Post Header -->
                <div class="post-header mb-4">
                    <h1 class="post-title mb-3"><?php the_title(); ?></h1>
                    
                    <!-- Post Meta -->
                    <div class="post-meta mb-3">
                        <span class="meta-date">
                            <i class="far fa-calendar"></i>
                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <?php echo get_the_date('F j, Y'); ?>
                            </time>
                        </span>
                        <span class="meta-separator"> | </span>
                        <span class="meta-author">
                            <i class="far fa-user"></i>
                            <?php esc_html_e('By', 'champions-league'); ?>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                <?php the_author(); ?>
                            </a>
                        </span>

                        <?php if (has_category()) : ?>
                            <span class="meta-separator"> | </span>
                            <span class="meta-category">
                                <i class="fas fa-folder"></i>
                                <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>

                        <?php if (comments_open()) : ?>
                            <span class="meta-separator"> | </span>
                            <span class="meta-comments">
                                <i class="far fa-comments"></i>
                                <?php
                                comments_popup_link(
                                    esc_html__('Leave a comment', 'champions-league'),
                                    esc_html__('1 comment', 'champions-league'),
                                    esc_html__('% comments', 'champions-league')
                                );
                                ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <!-- Edit Link -->
                    <?php if (current_user_can('edit_post')) : ?>
                        <div class="post-edit-link mb-3">
                            <?php echo wp_kses_post(champions_league_get_edit_link()); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-featured-image mb-4">
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                    </div>
                <?php endif; ?>

                <!-- Post Content -->
                <div class="post-content mb-4">
                    <?php
                    the_content(sprintf(
                        wp_kses(
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'champions-league'),
                            array('span' => array('class' => array()))
                        ),
                        wp_kses_post(get_the_title())
                    ));

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'champions-league'),
                        'after' => '</div>',
                    ));
                    ?>
                </div>

                <!-- Post Tags -->
                <?php if (has_tag()) : ?>
                    <div class="post-tags mb-4">
                        <strong><?php esc_html_e('Tags:', 'champions-league'); ?></strong>
                        <div class="tags-list">
                            <?php the_tags('<span class="badge bg-secondary">', '</span> <span class="badge bg-secondary">', '</span>'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Post Navigation -->
                <div class="post-navigation row mb-5">
                    <div class="col-md-6">
                        <?php
                        $prev_post = get_previous_post();
                        if ($prev_post) {
                            echo '<div class="nav-link-prev"><strong>' . esc_html__('Previous Post', 'champions-league') . '</strong><br>';
                            echo '<a href="' . esc_url(get_permalink($prev_post->ID)) . '">';
                            echo esc_html($prev_post->post_title);
                            echo '</a></div>';
                        }
                        ?>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <?php
                        $next_post = get_next_post();
                        if ($next_post) {
                            echo '<div class="nav-link-next"><strong>' . esc_html__('Next Post', 'champions-league') . '</strong><br>';
                            echo '<a href="' . esc_url(get_permalink($next_post->ID)) . '">';
                            echo esc_html($next_post->post_title);
                            echo '</a></div>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Related Posts -->
                <?php
                $related_args = array(
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand',
                );

                // Add category filter for related posts
                $post_categories = wp_get_post_categories(get_the_ID());
                if (!empty($post_categories)) {
                    $related_args['category__in'] = $post_categories;
                }

                $related_query = new WP_Query($related_args);

                if ($related_query->have_posts()) {
                    ?>
                    <div class="related-posts mb-5">
                        <h3 class="h4 mb-4"><?php esc_html_e('Related Posts', 'champions-league'); ?></h3>
                        <div class="row g-4">
                            <?php
                            while ($related_query->have_posts()) {
                                $related_query->the_post();
                                ?>
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                            </a>
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted small">
                                                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                            </p>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary w-100">
                                                <?php esc_html_e('Read More', 'champions-league'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <!-- Comments Section -->
                <div class="comments-section mt-5 pt-5 border-top">
                    <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <aside class="col-lg-4">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
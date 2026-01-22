<?php
/**
 * Main Index Template - Post Loop & Pagination
 * 
 * This template file displays the main blog/posts archive page.
 * It includes the post loop, pagination, and sidebar.
 *
 * @package Champions_League_Elite_Hub
 */

get_header();
?>

<div class="container mt-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <section class="posts-section">
                <?php
                if (have_posts()) {
                    ?>
                    <div class="posts-header mb-4">
                        <h1 class="page-title">
                            <?php
                            if (is_home()) {
                                esc_html_e('Latest Articles', 'champions-league');
                            } elseif (is_search()) {
                                printf(esc_html__('Search Results for "%s"', 'champions-league'), get_search_query());
                            } else {
                                the_archive_title();
                            }
                            ?>
                        </h1>
                        <?php
                        if (is_search()) {
                            printf(
                                '<p class="text-muted">%s</p>',
                                sprintf(
                                    esc_html__('We found %d results for your search.', 'champions-league'),
                                    $wp_query->found_posts
                                )
                            );
                        }
                        ?>
                    </div>

                    <!-- Posts Loop -->
                    <div class="posts-grid">
                        <?php
                        while (have_posts()) {
                            the_post();
                            ?>
                            <article <?php post_class('post-card card mb-4'); ?> id="post-<?php the_ID(); ?>">
                                <!-- Featured Image -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>" class="post-image-link">
                                            <?php the_post_thumbnail('large', array('class' => 'card-img-top')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="card-body">
                                    <!-- Post Title -->
                                    <h2 class="card-title post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>

                                    <!-- Post Meta -->
                                    <div class="post-meta text-muted mb-3">
                                        <span class="meta-date">
                                            <i class="far fa-calendar"></i>
                                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo get_the_date(); ?>
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
                                    </div>

                                    <!-- Post Excerpt -->
                                    <div class="post-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <!-- Post Tags -->
                                    <?php if (has_tag()) : ?>
                                        <div class="post-tags mb-3">
                                            <?php the_tags('<span class="badge bg-secondary">', '</span> <span class="badge bg-secondary">', '</span>'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Post Footer with Read More & Edit -->
                                    <div class="post-footer d-flex justify-content-between align-items-center">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-primary">
                                            <?php esc_html_e('Read More', 'champions-league'); ?> <i class="fas fa-arrow-right"></i>
                                        </a>

                                        <?php
                                        if (current_user_can('edit_post')) {
                                            echo wp_kses_post(champions_league_get_edit_link());
                                        }
                                        ?>
                                    </div>
                                </div>
                            </article>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Pagination -->
                    <?php champions_league_pagination(); ?>

                    <?php
                } else {
                    ?>
                    <div class="alert alert-info" role="alert">
                        <h2><?php esc_html_e('No posts found', 'champions-league'); ?></h2>
                        <p><?php esc_html_e('Sorry, no posts were found. Please try a different search.', 'champions-league'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                    <?php
                }
                ?>
            </section>
        </div>

        <!-- Sidebar -->
        <aside class="col-lg-4">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
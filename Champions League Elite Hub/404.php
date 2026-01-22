<?php
/**
 * 404 Not Found Template
 * 
 * Displays a custom 404 page when content is not found.
 *
 * @package Champions_League_Elite_Hub
 */

get_header();
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <section class="error-404-section text-center">
                <!-- Error Icon/Header -->
                <div class="error-404-header mb-4">
                    <h1 class="display-1 text-danger mb-0">404</h1>
                    <h2 class="h3 text-muted"><?php esc_html_e('Page Not Found', 'champions-league'); ?></h2>
                </div>

                <!-- Error Message -->
                <div class="error-404-message alert alert-warning" role="alert">
                    <p class="lead mb-0">
                        <?php esc_html_e('Sorry, the page you are looking for does not exist. It might have been moved or deleted.', 'champions-league'); ?>
                    </p>
                </div>

                <!-- Navigation Options -->
                <div class="error-404-actions my-5">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-lg btn-primary me-2 mb-2">
                        <i class="fas fa-home"></i> <?php esc_html_e('Back to Home', 'champions-league'); ?>
                    </a>
                    <button onclick="history.back()" class="btn btn-lg btn-outline-secondary mb-2">
                        <i class="fas fa-arrow-left"></i> <?php esc_html_e('Go Back', 'champions-league'); ?>
                    </button>
                </div>

                <!-- Search Form -->
                <div class="error-404-search mb-5">
                    <h3><?php esc_html_e('Try searching for what you need:', 'champions-league'); ?></h3>
                    <?php get_search_form(); ?>
                </div>

                <!-- Recent Posts -->
                <div class="error-404-recent mb-5">
                    <h3><?php esc_html_e('Recent Articles', 'champions-league'); ?></h3>
                    <div class="row mt-4">
                        <?php
                        $recent_posts = new WP_Query(array(
                            'posts_per_page' => 6,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ));

                        if ($recent_posts->have_posts()) {
                            while ($recent_posts->have_posts()) {
                                $recent_posts->the_post();
                                ?>
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card h-100">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="post-thumbnail">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h5>
                                            <p class="card-text small text-muted">
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
                        }
                        ?>
                    </div>
                </div>

                <!-- Site Navigation -->
                <div class="error-404-navigation card mt-5">
                    <div class="card-body">
                        <h3 class="card-title"><?php esc_html_e('Main Sections', 'champions-league'); ?></h3>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo esc_url(home_url('/matches')); ?>"><?php esc_html_e('Matches', 'champions-league'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/teams')); ?>"><?php esc_html_e('Teams', 'champions-league'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/players')); ?>"><?php esc_html_e('Players', 'champions-league'); ?></a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Blog', 'champions-league'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact', 'champions-league'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php esc_html_e('About', 'champions-league'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support Message -->
                <div class="error-404-support mt-5">
                    <p class="text-muted">
                        <?php printf(
                            esc_html__('Need help? Contact us at %s or use the search box above.', 'champions-league'),
                            '<a href="mailto:' . esc_attr(get_option('admin_email')) . '">' . esc_html(get_option('admin_email')) . '</a>'
                        ); ?>
                    </p>
                </div>
            </section>
        </div>
    </div>
</div>

<?php get_footer(); ?>
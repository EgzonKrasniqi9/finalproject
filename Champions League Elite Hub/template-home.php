<?php
/**
 * Template Name: Champions Home
 * 
 * Custom home page template for Champions League Elite Hub
 *
 * @package Champions_League_Elite_Hub
 */

get_header();
?>

<div class="champions-home">
    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-5 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-3 mb-3"><?php the_title(); ?></h1>
                    <p class="lead"><?php the_excerpt(); ?></p>
                    <a href="#featured-matches" class="btn btn-light btn-lg">
                        <?php esc_html_e('Explore Matches', 'champions-league'); ?> <i class="fas fa-arrow-down ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="hero-image">
                            <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Matches Section -->
    <section id="featured-matches" class="featured-matches-section mb-5">
        <div class="container">
            <div class="section-header mb-4">
                <h2 class="h1"><?php esc_html_e('Featured Matches', 'champions-league'); ?></h2>
                <p class="text-muted"><?php esc_html_e('Catch the latest matches from Champions League', 'champions-league'); ?></p>
            </div>

            <div class="matches-grid row g-4">
                <?php
                $matches_query = new WP_Query(array(
                    'post_type' => 'match',
                    'posts_per_page' => 4,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'meta_key' => '_featured',
                    'meta_value' => '1',
                ));

                if ($matches_query->have_posts()) {
                    while ($matches_query->have_posts()) {
                        $matches_query->the_post();
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="card match-card h-100 shadow-sm hover-shadow">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="match-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <div class="match-meta mb-2">
                                        <?php
                                        $competition = wp_get_post_terms(get_the_ID(), 'competition');
                                        if (!empty($competition)) {
                                            echo '<span class="badge bg-danger">' . esc_html($competition[0]->name) . '</span>';
                                        }
                                        ?>
                                    </div>
                                    <h3 class="card-title h5">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="card-text text-muted small">
                                        <i class="far fa-calendar"></i> <?php echo get_the_date(); ?>
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-top">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary w-100">
                                        <?php esc_html_e('View Match', 'champions-league'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo '<div class="col-12"><p class="text-muted">' . esc_html__('No featured matches found.', 'champions-league') . '</p></div>';
                }
                ?>
            </div>

            <div class="text-center mt-4">
                <a href="<?php echo esc_url(home_url('/matches')); ?>" class="btn btn-lg btn-primary">
                    <?php esc_html_e('View All Matches', 'champions-league'); ?> <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Teams Section -->
    <section class="teams-section mb-5 bg-light py-5">
        <div class="container">
            <div class="section-header mb-4">
                <h2 class="h1"><?php esc_html_e('Top Teams', 'champions-league'); ?></h2>
                <p class="text-muted"><?php esc_html_e('Featuring the best teams in Champions League', 'champions-league'); ?></p>
            </div>

            <div class="teams-grid row g-4">
                <?php
                $teams_query = new WP_Query(array(
                    'post_type' => 'team',
                    'posts_per_page' => 6,
                    'orderby' => 'rand',
                ));

                if ($teams_query->have_posts()) {
                    while ($teams_query->have_posts()) {
                        $teams_query->the_post();
                        ?>
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="card team-card h-100 text-center">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="team-logo p-3">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>

            <div class="text-center mt-4">
                <a href="<?php echo esc_url(home_url('/teams')); ?>" class="btn btn-lg btn-outline-primary">
                    <?php esc_html_e('Browse All Teams', 'champions-league'); ?> <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Players Section -->
    <section class="players-section mb-5">
        <div class="container">
            <div class="section-header mb-4">
                <h2 class="h1"><?php esc_html_e('Star Players', 'champions-league'); ?></h2>
                <p class="text-muted"><?php esc_html_e('Showcasing elite talent from around the world', 'champions-league'); ?></p>
            </div>

            <div class="players-grid row g-4">
                <?php
                $players_query = new WP_Query(array(
                    'post_type' => 'player',
                    'posts_per_page' => 6,
                    'orderby' => 'rand',
                ));

                if ($players_query->have_posts()) {
                    while ($players_query->have_posts()) {
                        $players_query->the_post();
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card player-card h-100">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="player-image position-relative">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                        </a>
                                        <?php
                                        $position = wp_get_post_terms(get_the_ID(), 'position');
                                        if (!empty($position)) {
                                            echo '<span class="position-badge badge bg-info position-absolute top-0 end-0 m-2">' . esc_html($position[0]->name) . '</span>';
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h3 class="card-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="card-text text-muted">
                                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                    </p>
                                </div>
                                <div class="card-footer bg-white">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary w-100">
                                        <?php esc_html_e('View Profile', 'champions-league'); ?>
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

            <div class="text-center mt-4">
                <a href="<?php echo esc_url(home_url('/players')); ?>" class="btn btn-lg btn-outline-primary">
                    <?php esc_html_e('View All Players', 'champions-league'); ?> <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="latest-news-section mb-5 bg-light py-5">
        <div class="container">
            <div class="section-header mb-4">
                <h2 class="h1"><?php esc_html_e('Latest News', 'champions-league'); ?></h2>
                <p class="text-muted"><?php esc_html_e('Stay updated with the latest football news', 'champions-league'); ?></p>
            </div>

            <div class="news-grid row g-4">
                <?php
                $news_query = new WP_Query(array(
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));

                if ($news_query->have_posts()) {
                    while ($news_query->have_posts()) {
                        $news_query->the_post();
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card news-card h-100">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h3 class="card-title h5">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="card-text text-muted small mb-2">
                                        <i class="far fa-calendar"></i> <?php echo get_the_date(); ?>
                                    </p>
                                    <p class="card-text">
                                        <?php the_excerpt(); ?>
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

            <div class="text-center mt-4">
                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn btn-lg btn-outline-primary">
                    <?php esc_html_e('View All News', 'champions-league'); ?> <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <section class="page-content mb-5">
        <div class="container">
            <?php the_content(); ?>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section bg-danger text-white py-5">
        <div class="container text-center">
            <h2 class="h1 mb-3"><?php esc_html_e('Join Our Community', 'champions-league'); ?></h2>
            <p class="lead mb-4">
                <?php esc_html_e('Subscribe to get the latest updates on matches, teams, and players.', 'champions-league'); ?>
            </p>
            <form class="cta-form d-flex justify-content-center gap-2 flex-wrap">
                <input 
                    type="email" 
                    class="form-control" 
                    style="max-width: 300px;" 
                    placeholder="<?php esc_attr_e('Enter your email', 'champions-league'); ?>" 
                    required
                >
                <button type="submit" class="btn btn-light btn-lg">
                    <?php esc_html_e('Subscribe', 'champions-league'); ?>
                </button>
            </form>
        </div>
    </section>
</div>

<?php get_footer(); ?>
<?php
/**
 * Archive Template - Custom Archive & Post Types
 * 
 * Displays archive pages for posts, custom post types, and taxonomies.
 *
 * @package Champions_League_Elite_Hub
 */

get_header();
?>

<div class="container mt-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <section class="archive-section">
                <!-- Archive Header -->
                <div class="archive-header mb-4">
                    <h1 class="page-title">
                        <?php
                        if (is_post_type_archive()) {
                            $post_type = get_post_type();
                            $post_type_obj = get_post_type_object($post_type);
                            echo esc_html($post_type_obj->labels->name);
                        } elseif (is_tax()) {
                            single_term_title();
                        } elseif (is_author()) {
                            printf(esc_html__('Posts by %s', 'champions-league'), get_the_author());
                        } elseif (is_date()) {
                            if (is_day()) {
                                echo get_the_date();
                            } elseif (is_month()) {
                                echo get_the_date('F Y');
                            } elseif (is_year()) {
                                echo get_the_date('Y');
                            }
                        }
                        ?>
                    </h1>

                    <!-- Archive Description -->
                    <?php
                    $term = get_queried_object();
                    if (!empty($term->description)) {
                        echo '<div class="archive-description alert alert-info">' . wp_kses_post($term->description) . '</div>';
                    }
                    ?>
                </div>

                <!-- Filter Options for Custom Post Types -->
                <?php if (is_post_type_archive('match')) : ?>
                    <div class="archive-filters mb-4">
                        <form method="get" class="archive-filter-form">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="competition-filter" class="form-label"><?php esc_html_e('Competition', 'champions-league'); ?></label>
                                    <?php
                                    wp_dropdown_categories(array(
                                        'taxonomy' => 'competition',
                                        'hide_empty' => true,
                                        'name' => 'competition',
                                        'id' => 'competition-filter',
                                        'class' => 'form-select',
                                        'show_option_all' => esc_html__('All Competitions', 'champions-league'),
                                        'selected' => isset($_GET['competition']) ? sanitize_text_field($_GET['competition']) : '',
                                    ));
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="season-filter" class="form-label"><?php esc_html_e('Season', 'champions-league'); ?></label>
                                    <?php
                                    wp_dropdown_categories(array(
                                        'taxonomy' => 'season',
                                        'hide_empty' => true,
                                        'name' => 'season',
                                        'id' => 'season-filter',
                                        'class' => 'form-select',
                                        'show_option_all' => esc_html__('All Seasons', 'champions-league'),
                                        'selected' => isset($_GET['season']) ? sanitize_text_field($_GET['season']) : '',
                                    ));
                                    ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">
                                <?php esc_html_e('Filter', 'champions-league'); ?>
                            </button>
                        </form>
                    </div>
                <?php endif; ?>

                <!-- Posts Loop -->
                <?php if (have_posts()) : ?>
                    <div class="archive-posts">
                        <?php
                        while (have_posts()) {
                            the_post();
                            ?>
                            <article <?php post_class('archive-post-card card mb-4'); ?> id="post-<?php the_ID(); ?>">
                                <div class="row g-0">
                                    <!-- Image -->
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="col-md-4">
                                            <a href="<?php the_permalink(); ?>" class="archive-post-image">
                                                <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded-start')); ?>
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                    <?php else : ?>
                                        <div class="col-12">
                                    <?php endif; ?>
                                        <div class="card-body">
                                            <!-- Title -->
                                            <h2 class="card-title h5">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>

                                            <!-- Meta -->
                                            <div class="archive-post-meta small text-muted mb-2">
                                                <span class="meta-date">
                                                    <i class="far fa-calendar"></i>
                                                    <?php echo get_the_date(); ?>
                                                </span>
                                                <span class="meta-separator"> | </span>
                                                <span class="meta-author">
                                                    <i class="far fa-user"></i>
                                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                        <?php the_author(); ?>
                                                    </a>
                                                </span>

                                                <!-- Custom Post Type Meta -->
                                                <?php if (get_post_type() === 'match') : ?>
                                                    <?php
                                                    $competition = wp_get_post_terms(get_the_ID(), 'competition');
                                                    if (!empty($competition)) {
                                                        echo '<span class="meta-separator"> | </span>';
                                                        echo '<span class="meta-competition"><i class="fas fa-trophy"></i> ' . esc_html($competition[0]->name) . '</span>';
                                                    }
                                                    ?>
                                                <?php elseif (get_post_type() === 'player') : ?>
                                                    <?php
                                                    $position = wp_get_post_terms(get_the_ID(), 'position');
                                                    if (!empty($position)) {
                                                        echo '<span class="meta-separator"> | </span>';
                                                        echo '<span class="meta-position"><i class="fas fa-person-hiking"></i> ' . esc_html($position[0]->name) . '</span>';
                                                    }
                                                    ?>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Excerpt -->
                                            <p class="card-text">
                                                <?php
                                                if (has_excerpt()) {
                                                    the_excerpt();
                                                } else {
                                                    echo wp_trim_words(get_the_content(), 20);
                                                }
                                                ?>
                                            </p>

                                            <!-- Tags -->
                                            <?php if (has_tag()) : ?>
                                                <div class="archive-post-tags mb-2">
                                                    <?php the_tags('<span class="badge bg-secondary">', '</span> <span class="badge bg-secondary">', '</span>'); ?>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Footer -->
                                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">
                                                <?php esc_html_e('View Details', 'champions-league'); ?> <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Pagination -->
                    <?php champions_league_pagination(); ?>

                <?php else : ?>
                    <!-- No Posts Found -->
                    <div class="alert alert-warning" role="alert">
                        <h3><?php esc_html_e('No posts found', 'champions-league'); ?></h3>
                        <p><?php esc_html_e('Sorry, there are no posts in this archive.', 'champions-league'); ?></p>
                    </div>
                <?php endif; ?>
            </section>
        </div>

        <!-- Sidebar -->
        <aside class="col-lg-4">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
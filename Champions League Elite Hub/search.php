<?php
/**
 * Search Results Template
 * 
 * Displays search results with pagination and filters.
 *
 * @package Champions_League_Elite_Hub
 */

get_header();
?>

<div class="container mt-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <section class="search-section">
                <!-- Search Header -->
                <div class="search-header mb-4">
                    <h1 class="page-title">
                        <?php printf(esc_html__('Search Results for "%s"', 'champions-league'), get_search_query()); ?>
                    </h1>
                    <p class="text-muted">
                        <?php printf(esc_html__('Found %d result(s)', 'champions-league'), $wp_query->found_posts); ?>
                    </p>
                </div>

                <!-- New Search Form -->
                <div class="search-form-wrapper mb-4">
                    <?php get_search_form(); ?>
                </div>

                <!-- Search Filters -->
                <div class="search-filters mb-4">
                    <form method="get" class="search-filter-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="post-type-filter" class="form-label"><?php esc_html_e('Post Type', 'champions-league'); ?></label>
                                <select name="post_type" id="post-type-filter" class="form-select">
                                    <option value=""><?php esc_html_e('All Types', 'champions-league'); ?></option>
                                    <option value="post" <?php selected('post', isset($_GET['post_type']) ? $_GET['post_type'] : ''); ?>>
                                        <?php esc_html_e('Posts', 'champions-league'); ?>
                                    </option>
                                    <option value="match" <?php selected('match', isset($_GET['post_type']) ? $_GET['post_type'] : ''); ?>>
                                        <?php esc_html_e('Matches', 'champions-league'); ?>
                                    </option>
                                    <option value="team" <?php selected('team', isset($_GET['post_type']) ? $_GET['post_type'] : ''); ?>>
                                        <?php esc_html_e('Teams', 'champions-league'); ?>
                                    </option>
                                    <option value="player" <?php selected('player', isset($_GET['post_type']) ? $_GET['post_type'] : ''); ?>>
                                        <?php esc_html_e('Players', 'champions-league'); ?>
                                    </option>
                                </select>
                                <input type="hidden" name="s" value="<?php echo get_search_query(); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="sort-filter" class="form-label"><?php esc_html_e('Sort By', 'champions-league'); ?></label>
                                <select name="orderby" id="sort-filter" class="form-select">
                                    <option value="relevance" <?php selected('relevance', isset($_GET['orderby']) ? $_GET['orderby'] : ''); ?>>
                                        <?php esc_html_e('Relevance', 'champions-league'); ?>
                                    </option>
                                    <option value="date" <?php selected('date', isset($_GET['orderby']) ? $_GET['orderby'] : ''); ?>>
                                        <?php esc_html_e('Newest First', 'champions-league'); ?>
                                    </option>
                                    <option value="date-asc" <?php selected('date-asc', isset($_GET['orderby']) ? $_GET['orderby'] : ''); ?>>
                                        <?php esc_html_e('Oldest First', 'champions-league'); ?>
                                    </option>
                                    <option value="title" <?php selected('title', isset($_GET['orderby']) ? $_GET['orderby'] : ''); ?>>
                                        <?php esc_html_e('Title (A-Z)', 'champions-league'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">
                            <?php esc_html_e('Apply Filters', 'champions-league'); ?>
                        </button>
                    </form>
                </div>

                <!-- Search Results -->
                <?php if (have_posts()) : ?>
                    <div class="search-results">
                        <?php
                        while (have_posts()) {
                            the_post();
                            $post_type = get_post_type();
                            $post_type_obj = get_post_type_object($post_type);
                            ?>
                            <article <?php post_class('search-result-item card mb-3'); ?> id="post-<?php the_ID(); ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Image -->
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="col-md-3 mb-3 mb-md-0">
                                                <a href="<?php the_permalink(); ?>" class="search-result-image d-block">
                                                    <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid rounded')); ?>
                                                </a>
                                            </div>
                                            <div class="col-md-9">
                                        <?php else : ?>
                                            <div class="col-12">
                                        <?php endif; ?>
                                                <!-- Title -->
                                                <h2 class="search-result-title h5 mb-2">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                        $title = get_the_title();
                                                        $search_query = get_search_query();
                                                        if ($search_query) {
                                                            $title = preg_replace(
                                                                '/(' . preg_quote($search_query, '/') . ')/i',
                                                                '<mark>$1</mark>',
                                                                $title
                                                            );
                                                        }
                                                        echo wp_kses_post($title);
                                                        ?>
                                                    </a>
                                                </h2>

                                                <!-- Meta -->
                                                <div class="search-result-meta small text-muted mb-2">
                                                    <span class="badge bg-primary">
                                                        <?php echo esc_html($post_type_obj->labels->singular_name); ?>
                                                    </span>
                                                    <span class="meta-date ms-2">
                                                        <i class="far fa-calendar"></i>
                                                        <?php echo get_the_date(); ?>
                                                    </span>
                                                </div>

                                                <!-- Excerpt with Highlighting -->
                                                <p class="search-result-excerpt mb-2">
                                                    <?php
                                                    $excerpt = get_the_excerpt();
                                                    if ($search_query) {
                                                        $excerpt = preg_replace(
                                                            '/(' . preg_quote($search_query, '/') . ')/i',
                                                            '<mark>$1</mark>',
                                                            $excerpt
                                                        );
                                                    }
                                                    echo wp_kses_post($excerpt);
                                                    ?>
                                                </p>

                                                <!-- Read More Link -->
                                                <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">
                                                    <?php esc_html_e('Read More', 'champions-league'); ?> <i class="fas fa-arrow-right"></i>
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
                    <!-- No Results Found -->
                    <div class="alert alert-warning" role="alert">
                        <h3><?php esc_html_e('No results found', 'champions-league'); ?></h3>
                        <p><?php esc_html_e('Sorry, no results were found for your search. Please try different keywords.', 'champions-league'); ?></p>

                        <!-- Suggestions -->
                        <div class="mt-3">
                            <h4><?php esc_html_e('Suggestions:', 'champions-league'); ?></h4>
                            <ul>
                                <li><?php esc_html_e('Check your spelling', 'champions-league'); ?></li>
                                <li><?php esc_html_e('Try different keywords', 'champions-league'); ?></li>
                                <li><?php esc_html_e('Try more general keywords', 'champions-league'); ?></li>
                                <li><?php esc_html_e('Check the post type filter', 'champions-league'); ?></li>
                            </ul>
                        </div>

                        <!-- Try Again -->
                        <div class="mt-4">
                            <h4><?php esc_html_e('Try searching again:', 'champions-league'); ?></h4>
                            <?php get_search_form(); ?>
                        </div>
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
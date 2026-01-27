<?php
/**
 * Prison Break Elite - Search Results Template
 * 
 * @package Prison_Break_Elite
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container">
    <div class="search-header">
        <h1 class="search-title">
            <?php printf(esc_html__('Search Results for: %s', 'prison-break'), '<span>' . get_search_query() . '</span>'); ?>
        </h1>
    </div>
    
    <div class="content-area">
        <div class="post-grid">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <div class="post-card-inner">
                            <?php
                            if (has_post_thumbnail()) {
                                ?>
                                <div class="post-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('prison-break-featured', array('alt' => get_the_title())); ?>
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                            
                            <div class="post-content">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <div class="post-meta">
                                    <span class="post-date">
                                        <i class="icon-calendar"></i> <?php echo get_the_date('F j, Y'); ?>
                                    </span>
                                </div>
                                
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php esc_html_e('Read More', 'prison-break'); ?> →
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php
                }
                
                // Pagination
                ?>
                <div class="pagination-wrapper">
                    <?php prison_break_pagination(); ?>
                </div>
                <?php
            } else {
                ?>
                <div class="no-posts">
                    <h2><?php esc_html_e('No Results Found', 'prison-break'); ?></h2>
                    <p><?php esc_html_e('Sorry, no posts match your search query.', 'prison-break'); ?></p>
                    <?php get_search_form(); ?>
                </div>
                <?php
            }
            ?>
        </div>
        
        <?php get_sidebar(); ?>
    </div>
</div>

<?php
get_footer();

<?php
/**
 * Prison Break Elite - Single Post Template
 * 
 * @package Prison_Break_Elite
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container">
    <div class="content-area single-post-area">
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
            <div class="post-inner">
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    
                    <div class="post-meta-single">
                        <span class="post-date">
                            <i class="icon-calendar"></i> <?php echo get_the_date('F j, Y'); ?>
                        </span>
                        <span class="post-author">
                            <i class="icon-user"></i> <?php the_author_posts_link(); ?>
                        </span>
                        <?php
                        if (get_the_category()) {
                            ?>
                            <span class="post-categories">
                                <?php the_category(', '); ?>
                            </span>
                            <?php
                        }
                        ?>
                    </div>
                </header>
                
                <?php
                if (has_post_thumbnail()) {
                    ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail('prison-break-featured', array('alt' => get_the_title())); ?>
                    </div>
                    <?php
                }
                ?>
                
                <div class="entry-content">
                    <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links">',
                        'after'  => '</div>'
                    ));
                    ?>
                </div>
                
                <footer class="entry-footer">
                    <?php
                    if (get_the_tags()) {
                        ?>
                        <div class="post-tags">
                            <strong><?php esc_html_e('Tags:', 'prison-break'); ?></strong>
                            <?php the_tags('', ', ', ''); ?>
                        </div>
                        <?php
                    }
                    
                    prison_break_edit_post_link();
                    ?>
                </footer>
            </div>
        </article>
        
        <!-- Navigation -->
        <nav class="post-navigation">
            <div class="nav-previous">
                <?php previous_post_link('%link', '← Previous Post'); ?>
            </div>
            <div class="nav-next">
                <?php next_post_link('Next Post →'); ?>
            </div>
        </nav>
        
        <!-- Comments Section -->
        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
        
        <?php get_sidebar(); ?>
    </div>
</div>

<?php
get_footer();

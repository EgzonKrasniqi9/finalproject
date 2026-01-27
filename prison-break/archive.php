<?php
/**
 * Prison Break Elite - Archive Template
 * 
 * @package Prison_Break_Elite
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container">
    <div class="archive-header">
        <?php
        if (is_post_type_archive()) {
            $post_type_object = get_post_type_object(get_post_type());
            if ($post_type_object) {
                echo '<h1 class="archive-title">' . esc_html($post_type_object->label) . '</h1>';
            }
        } elseif (is_category()) {
            echo '<h1 class="archive-title">' . single_cat_title('', false) . '</h1>';
            if (category_description()) {
                echo '<div class="archive-description">' . category_description() . '</div>';
            }
        } elseif (is_tag()) {
            echo '<h1 class="archive-title">' . single_tag_title('', false) . '</h1>';
            if (tag_description()) {
                echo '<div class="archive-description">' . tag_description() . '</div>';
            }
        } elseif (is_tax()) {
            echo '<h1 class="archive-title">' . single_term_title('', false) . '</h1>';
            if (term_description()) {
                echo '<div class="archive-description">' . term_description() . '</div>';
            }
        }
        ?>
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
                                    <span class="post-author">
                                        <i class="icon-user"></i> <?php the_author_posts_link(); ?>
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
                    <h2><?php esc_html_e('No Posts Found', 'prison-break'); ?></h2>
                    <p><?php esc_html_e('Sorry, no posts match your criteria.', 'prison-break'); ?></p>
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

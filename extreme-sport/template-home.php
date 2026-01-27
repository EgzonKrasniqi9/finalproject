<?php
/**
 * Page Template (Full Width)
 * 
 * Template Name: Full Width Page
 * 
 * @package Extreme_Sports_Elite
 */

get_header();
?>

<div class="container">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <article <?php post_class('single-post'); ?> id="post-<?php the_ID(); ?>">
                <div class="single-post-header">
                    <h1 class="single-post-title"><?php the_title(); ?></h1>
                    
                    <div class="single-post-meta">
                        <span>
                            <strong><?php esc_html_e('Last Updated:', 'extreme-sports'); ?></strong>
                            <time datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>">
                                <?php echo get_the_modified_date('F j, Y'); ?>
                            </time>
                        </span>
                        
                        <?php if (current_user_can('edit_posts')) : ?>
                            <span>
                                <?php extreme_sports_edit_post_link(); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail" style="margin: 30px 0; border-radius: 8px; overflow: hidden;">
                        <?php the_post_thumbnail('extreme-sports-featured'); ?>
                    </div>
                <?php endif; ?>

                <!-- Page Content -->
                <div class="single-post-content">
                    <?php
                    the_content();
                    
                    // Paginated content
                    wp_link_pages(array(
                        'before' => '<div style="margin: 30px 0;"><strong>' . esc_html__('Pages:', 'extreme-sports') . '</strong> ',
                        'after' => '</div>',
                        'link_before' => '<span style="margin: 0 5px;">',
                        'link_after' => '</span>'
                    ));
                    ?>
                </div>
            </article>

            <!-- Comments Section -->
            <?php
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>
            <?php
        }
    }
    ?>
</div>

<?php
get_footer();

<?php
/**
 * Prison Break Elite - Comments Template
 * 
 * @package Prison_Break_Elite
 */

if (!defined('ABSPATH')) {
    exit;
}

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    if (have_comments()) {
        ?>
        <h2 class="comments-title">
            <?php
            comments_number(
                esc_html__('No Comments', 'prison-break'),
                esc_html__('1 Comment', 'prison-break'),
                esc_html__('% Comments', 'prison-break')
            );
            ?>
        </h2>
        
        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 50
            ));
            ?>
        </ol>
        
        <?php
        if (get_comment_pages_count() > 1 && get_option('page_comments')) {
            ?>
            <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'prison-break'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(esc_html__('← Older Comments', 'prison-break')); ?></div>
                <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments →', 'prison-break')); ?></div>
            </nav>
            <?php
        }
    }
    
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) {
        ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'prison-break'); ?></p>
        <?php
    }
    
    comment_form(array(
        'title_reply' => esc_html__('Leave a Reply', 'prison-break'),
        'label_submit' => esc_html__('Post Comment', 'prison-break'),
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . esc_html__('Comment', 'prison-break') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'
    ));
    ?>
</div>

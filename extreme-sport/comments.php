<?php
/**
 * Comments Template
 * 
 * Template for displaying comments and comment form
 * 
 * @package Extreme_Sports_Elite
 */

// Exit if accessed directly
if (!post_password_required()) {
    ?>
    <div class="comments-section">
        <?php if (have_comments()) : ?>
            <h3 class="comments-title">
                <?php
                $comment_count = get_comments_number();
                printf(
                    esc_html(_n('%d Comment', '%d Comments', $comment_count, 'extreme-sports')),
                    $comment_count
                );
                ?>
            </h3>

            <!-- Comments List -->
            <ol class="comment-list">
                <?php
                wp_list_comments(array(
                    'style' => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 50,
                    'callback' => 'extreme_sports_comments_callback'
                ));
                ?>
            </ol>

            <!-- Comments Navigation -->
            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                <nav class="comment-pagination" style="margin: 30px 0; text-align: center;">
                    <?php
                    paginate_comments_links(array(
                        'prev_text' => esc_html__('← Older Comments', 'extreme-sports'),
                        'next_text' => esc_html__('Newer Comments →', 'extreme-sports')
                    ));
                    ?>
                </nav>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Comment Form -->
        <?php
        if (comments_open()) {
            $comment_form_args = array(
                'title_reply' => esc_html__('Leave a Comment', 'extreme-sports'),
                'title_reply_to' => esc_html__('Leave a Reply to %s', 'extreme-sports'),
                'label_submit' => esc_html__('Post Comment', 'extreme-sports'),
                'class_form' => 'comment-form',
                'class_submit' => 'read-more',
                'fields' => array(
                    'author' => '<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <input id="author" name="author" type="text" placeholder="' . esc_attr__('Name *', 'extreme-sports') . '" value="' . esc_attr($commenter['comment_author']) . '" required />',
                    'email' => '<input id="email" name="email" type="email" placeholder="' . esc_attr__('Email *', 'extreme-sports') . '" value="' . esc_attr($commenter['comment_author_email']) . '" required /></div>',
                    'url' => '<input id="url" name="url" type="url" placeholder="' . esc_attr__('Website', 'extreme-sports') . '" value="' . esc_attr($commenter['comment_author_url']) . '" />'
                ),
                'comment_field' => '<textarea id="comment" name="comment" placeholder="' . esc_attr__('Your comment...', 'extreme-sports') . '" rows="5" required></textarea>',
                'comment_notes_before' => '<p class="comment-notes">' . esc_html__('Your email address will not be published. Required fields are marked with *', 'extreme-sports') . '</p>',
                'comment_notes_after' => ''
            );
            
            comment_form($comment_form_args);
        } elseif (is_post_type_hierarchical(get_post_type()) && pings_open() && is_singular()) {
            ?>
            <p class="no-comments" style="padding: 20px; background: #f0f0f0; border-radius: 5px; text-align: center;">
                <?php esc_html_e('Comments are closed.', 'extreme-sports'); ?>
            </p>
            <?php
        }
        ?>
    </div>
    <?php
} else {
    // Post is password protected
    ?>
    <div style="padding: 20px; background: #fff3cd; border-radius: 5px; text-align: center;">
        <p><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'extreme-sports'); ?></p>
    </div>
    <?php
}

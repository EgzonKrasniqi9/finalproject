<?php
/**
 * Comments Template
 * 
 * Displays comments, comment form, and related comment functionality.
 *
 * @package Champions_League_Elite_Hub
 */

if (post_password_required()) {
    return;
}
?>

<div class="comments-wrapper">
    <?php if (have_comments()) : ?>
        <div class="comments-list mb-5">
            <h3 class="h4 mb-4">
                <i class="fas fa-comments"></i>
                <?php
                printf(
                    esc_html(_nx(
                        '%1$s thought on "%2$s"',
                        '%1$s thoughts on "%2$s"',
                        get_comments_number(),
                        'comments title',
                        'champions-league'
                    )),
                    number_format_i18n(get_comments_number()),
                    '<span>' . get_the_title() . '</span>'
                );
                ?>
            </h3>

            <ol class="comment-list list-unstyled">
                <?php
                wp_list_comments(
                    array(
                        'walker' => new Walker_Comment(),
                        'style' => 'ol',
                        'short_ping' => true,
                        'avatar_size' => 60,
                        'callback' => 'champions_league_comment_callback',
                    )
                );
                ?>
            </ol>

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                <nav class="comment-pagination mb-4">
                    <ul class="pagination">
                        <li class="page-item">
                            <?php previous_comments_link(
                                '<span class="page-link">&laquo; ' . esc_html__('Older Comments', 'champions-league') . '</span>'
                            ); ?>
                        </li>
                        <li class="page-item">
                            <?php next_comments_link(
                                '<span class="page-link">' . esc_html__('Newer Comments', 'champions-league') . ' &raquo;</span>'
                            ); ?>
                        </li>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) {
        ?>
        <p class="no-comments alert alert-info">
            <?php esc_html_e('Comments are closed.', 'champions-league'); ?>
        </p>
        <?php
    }
    ?>

    <?php
    if (comments_open()) {
        comment_form(
            array(
                'class_form' => 'comment-form',
                'class_submit' => 'btn btn-primary',
                'label_submit' => esc_html__('Post Comment', 'champions-league'),
                'comment_field' => '<div class="form-group mb-3">' .
                    '<label for="comment" class="form-label">' . esc_html__('Comment', 'champions-league') . ' <span class="text-danger">*</span></label>' .
                    '<textarea id="comment" name="comment" class="form-control" rows="5" required></textarea>' .
                    '</div>',
                'fields' => array(
                    'author' => '<div class="row mb-3">' .
                        '<div class="col-md-6">' .
                        '<label for="author" class="form-label">' . esc_html__('Name', 'champions-league') . ' <span class="text-danger">*</span></label>' .
                        '<input id="author" name="author" type="text" class="form-control" required />' .
                        '</div>' .
                        '<div class="col-md-6">' .
                        '<label for="email" class="form-label">' . esc_html__('Email', 'champions-league') . ' <span class="text-danger">*</span></label>' .
                        '<input id="email" name="email" type="email" class="form-control" required />' .
                        '</div>' .
                        '</div>',
                    'url' => '<div class="form-group mb-3">' .
                        '<label for="url" class="form-label">' . esc_html__('Website', 'champions-league') . '</label>' .
                        '<input id="url" name="url" type="url" class="form-control" />' .
                        '</div>',
                ),
            )
        );
    }
    ?>
</div>
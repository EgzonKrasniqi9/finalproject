<?php
/**
 * Champions League Elite Hub - Theme Functions
 * 
 * @package Champions_League_Elite_Hub
 * @version 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Bootstrap Nav Walker for proper menu rendering
 */
class Bootstrap_Nav_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $indent = '';
        } else {
            $indent = "\n" . str_repeat("\t", $depth + 1);
        }
        $output .= $indent . '<ul class="dropdown-menu">' . "\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $indent = '';
        } else {
            $indent = str_repeat("\t", $depth + 1);
        }

        $indent .= (!empty($item->menu_item_parent) && 0 === $depth) ? '' : '';

        $li_attributes = '';
        $class_names = array('nav-item');

        // Ensure item classes is an array
        $item_classes = isset($item->classes) && is_array($item->classes) ? $item->classes : array();

        if (in_array('current-menu-item', $item_classes)) {
            $class_names[] = 'active';
        }

        if (in_array('menu-item-has-children', $item_classes)) {
            $class_names[] = 'dropdown';
        }

        $li_attributes .= !empty($class_names) ? ' class="' . esc_attr(implode(' ', apply_filters('nav_menu_item_class', $class_names, $item, $args, $depth))) . '"' : '';

        $output .= $indent . '<li' . $li_attributes . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        if (in_array('menu-item-has-children', $item_classes)) {
            $atts['class'] = 'nav-link dropdown-toggle';
            $atts['data-bs-toggle'] = 'dropdown';
        } else {
            $atts['class'] = 'nav-link';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('nav_menu_item_title', $item->title, $item, $args, $depth);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        // Handle both object and array $args parameter
        $args_before = (is_object($args) && isset($args->before)) ? $args->before : (isset($args['before']) ? $args['before'] : '');
        $args_link_before = (is_object($args) && isset($args->link_before)) ? $args->link_before : (isset($args['link_before']) ? $args['link_before'] : '');
        $args_link_after = (is_object($args) && isset($args->link_after)) ? $args->link_after : (isset($args['link_after']) ? $args['link_after'] : '');
        $args_after = (is_object($args) && isset($args->after)) ? $args->after : (isset($args['after']) ? $args['after'] : '');

        $item_output = $args_before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args_link_before . $title . $args_link_after;
        $item_output .= '</a>';
        $item_output .= $args_after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * 1. Theme Setup - add_theme_support & Custom Menus
 */
function champions_league_theme_setup() {
    // Add theme support features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio'));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');

    // Load text domain for translations
    load_theme_textdomain('champions-league', get_template_directory() . '/languages');

    // Register custom menus
    register_nav_menus(array(
        'primary-menu' => esc_html__('Primary Menu', 'champions-league'),
        'footer-menu' => esc_html__('Footer Menu', 'champions-league'),
        'mobile-menu' => esc_html__('Mobile Menu', 'champions-league'),
    ));

    // Register widget areas
    register_sidebar(array(
        'name' => esc_html__('Primary Sidebar', 'champions-league'),
        'id' => 'primary-sidebar',
        'description' => esc_html__('Main sidebar for posts and pages', 'champions-league'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area', 'champions-league'),
        'id' => 'footer-widgets',
        'description' => esc_html__('Footer widget area', 'champions-league'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('after_setup_theme', 'champions_league_theme_setup');

/**
 * 2. Enqueue Styles and Scripts - Include CSS and JS
 */
function champions_league_enqueue_assets() {
    // Enqueue main stylesheet
    wp_enqueue_style('champions-league-style', get_stylesheet_uri(), array(), '1.0.0', 'all');
    
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0', 'all');
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0', 'all');

    // Enqueue jQuery (WordPress includes it by default)
    wp_enqueue_script('jquery');

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);

    // Enqueue custom JS
    wp_enqueue_script('champions-league-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);

    // Localize script for AJAX
    wp_localize_script('champions-league-script', 'championsLeague', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('champions_league_nonce'),
    ));

    // Load HTML5 Shiv for older IE
    wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', array(), '3.7.3');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
}
add_action('wp_enqueue_scripts', 'champions_league_enqueue_assets');

/**
 * 3. Add custom body classes - Body Class
 */
function champions_league_body_classes($classes) {
    // Add class if sidebar is active
    if (is_active_sidebar('primary-sidebar') && !is_page_template('template-fullwidth.php')) {
        $classes[] = 'has-sidebar';
    } else {
        $classes[] = 'no-sidebar';
    }

    // Add class for post types
    if (is_singular('match')) {
        $classes[] = 'single-match';
    }
    if (is_singular('team')) {
        $classes[] = 'single-team';
    }
    if (is_singular('player')) {
        $classes[] = 'single-player';
    }

    // Add class for pages
    if (is_page()) {
        $classes[] = 'page-' . get_the_ID();
    }

    // Add archive class
    if (is_archive()) {
        $classes[] = 'is-archive';
    }

    // Add search class
    if (is_search()) {
        $classes[] = 'is-search';
    }

    // Add mobile class
    if (wp_is_mobile()) {
        $classes[] = 'is-mobile';
    }

    return $classes;
}
add_filter('body_class', 'champions_league_body_classes');

/**
 * 4. Register Custom Post Types
 */
function champions_league_register_post_types() {
    // Match Post Type
    register_post_type('match', array(
        'labels' => array(
            'name' => esc_html__('Matches', 'champions-league'),
            'singular_name' => esc_html__('Match', 'champions-league'),
            'add_new_item' => esc_html__('Add New Match', 'champions-league'),
            'edit_item' => esc_html__('Edit Match', 'champions-league'),
            'view_item' => esc_html__('View Match', 'champions-league'),
        ),
        'description' => esc_html__('Football matches', 'champions-league'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'matches'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments'),
        'menu_icon' => 'dashicons-football',
        'show_in_rest' => true,
    ));

    // Team Post Type
    register_post_type('team', array(
        'labels' => array(
            'name' => esc_html__('Teams', 'champions-league'),
            'singular_name' => esc_html__('Team', 'champions-league'),
            'add_new_item' => esc_html__('Add New Team', 'champions-league'),
            'edit_item' => esc_html__('Edit Team', 'champions-league'),
            'view_item' => esc_html__('View Team', 'champions-league'),
        ),
        'description' => esc_html__('Football teams', 'champions-league'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'teams'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
        'menu_icon' => 'dashicons-groups',
        'show_in_rest' => true,
    ));

    // Player Post Type
    register_post_type('player', array(
        'labels' => array(
            'name' => esc_html__('Players', 'champions-league'),
            'singular_name' => esc_html__('Player', 'champions-league'),
            'add_new_item' => esc_html__('Add New Player', 'champions-league'),
            'edit_item' => esc_html__('Edit Player', 'champions-league'),
            'view_item' => esc_html__('View Player', 'champions-league'),
        ),
        'description' => esc_html__('Football players', 'champions-league'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'players'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
        'menu_icon' => 'dashicons-businessman',
        'show_in_rest' => true,
    ));
}
add_action('init', 'champions_league_register_post_types');

/**
 * 5. Register Custom Taxonomies
 */
function champions_league_register_taxonomies() {
    // Competition Taxonomy for matches
    register_taxonomy('competition', 'match', array(
        'labels' => array(
            'name' => esc_html__('Competitions', 'champions-league'),
            'singular_name' => esc_html__('Competition', 'champions-league'),
            'add_new_item' => esc_html__('Add New Competition', 'champions-league'),
            'edit_item' => esc_html__('Edit Competition', 'champions-league'),
        ),
        'description' => esc_html__('Tournament or competition', 'champions-league'),
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'competition'),
        'show_in_rest' => true,
    ));

    // Season Taxonomy
    register_taxonomy('season', array('match', 'team'), array(
        'labels' => array(
            'name' => esc_html__('Seasons', 'champions-league'),
            'singular_name' => esc_html__('Season', 'champions-league'),
            'add_new_item' => esc_html__('Add New Season', 'champions-league'),
        ),
        'description' => esc_html__('Match season', 'champions-league'),
        'hierarchical' => false,
        'public' => true,
        'rewrite' => array('slug' => 'season'),
        'show_in_rest' => true,
    ));

    // League Taxonomy for teams
    register_taxonomy('league', 'team', array(
        'labels' => array(
            'name' => esc_html__('Leagues', 'champions-league'),
            'singular_name' => esc_html__('League', 'champions-league'),
            'add_new_item' => esc_html__('Add New League', 'champions-league'),
        ),
        'description' => esc_html__('Team league', 'champions-league'),
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'league'),
        'show_in_rest' => true,
    ));

    // Position Taxonomy for players
    register_taxonomy('position', 'player', array(
        'labels' => array(
            'name' => esc_html__('Positions', 'champions-league'),
            'singular_name' => esc_html__('Position', 'champions-league'),
            'add_new_item' => esc_html__('Add New Position', 'champions-league'),
        ),
        'description' => esc_html__('Player position', 'champions-league'),
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'position'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'champions_league_register_taxonomies');

/**
 * 6. Customize excerpt length
 */
function champions_league_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'champions_league_excerpt_length');

/**
 * 7. Custom excerpt more text
 */
function champions_league_excerpt_more($more) {
    return '... <a href="' . get_permalink() . '" class="read-more btn btn-sm btn-primary mt-2">' . esc_html__('Read More', 'champions-league') . '</a>';
}
add_filter('excerpt_more', 'champions_league_excerpt_more');

/**
 * 8. Posts per page - WP_Query optimization
 */
function champions_league_posts_per_page($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if (is_archive() || is_home()) {
        $query->set('posts_per_page', 12);
    }
}
add_action('pre_get_posts', 'champions_league_posts_per_page');

/**
 * 9. Pagination function
 */
function champions_league_pagination() {
    global $wp_query;
    
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    
    $big = 999999999;
    $paginate_args = array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '<i class="fas fa-chevron-left"></i> ' . esc_html__('Previous', 'champions-league'),
        'next_text' => esc_html__('Next', 'champions-league') . ' <i class="fas fa-chevron-right"></i>',
        'type' => 'list',
        'before_page_number' => '<span class="page-number">',
        'after_page_number' => '</span>',
    );

    ?>
    <nav class="pagination-wrapper d-flex justify-content-center my-5">
        <ul class="pagination">
            <?php echo wp_kses_post(paginate_links($paginate_args)); ?>
        </ul>
    </nav>
    <?php
}

/**
 * 10. Comment form arguments - Post Forms
 */
function champions_league_comment_form_args($args) {
    $args['comment_notes_after'] = '';
    $args['comment_field'] = '<div class="mb-3">
        <label for="comment" class="form-label">' . esc_html__('Comment', 'champions-league') . ' <span class="text-danger">*</span></label>
        <textarea id="comment" name="comment" class="form-control" rows="4" required></textarea>
    </div>';
    return $args;
}
add_filter('comment_form_default_args', 'champions_league_comment_form_args');

/**
 * 11. Custom comment callback
 */
function champions_league_comment_callback($comment, $args, $depth) {
    $reply_link = get_comment_reply_link(array(
        'depth' => $depth,
        'max_depth' => $args['max_depth'],
        'reply_text' => esc_html__('Reply', 'champions-league'),
    ), $comment);
    ?>
    <div <?php comment_class('comment-item card mb-3'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="card-body">
            <div class="comment-header d-flex align-items-start mb-3">
                <?php echo wp_kses_post(get_avatar($comment, 60, '', '', array('class' => 'rounded-circle me-3'))); ?>
                <div class="flex-grow-1">
                    <strong class="d-block"><?php comment_author(); ?></strong>
                    <small class="text-muted"><?php comment_date('M d, Y'); ?> <?php esc_html_e('at', 'champions-league'); ?> <?php comment_time('g:i a'); ?></small>
                </div>
            </div>
            <div class="comment-content">
                <?php comment_text(); ?>
                <?php if ($comment->comment_approved == '0') : ?>
                    <div class="alert alert-info alert-sm mt-2"><?php esc_html_e('Your comment is awaiting moderation.', 'champions-league'); ?></div>
                <?php endif; ?>
            </div>
            <div class="comment-reply mt-3">
                <?php echo wp_kses_post($reply_link); ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * 12. Setup comments
 */
function champions_league_setup_comments() {
    if (!is_admin() && is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'champions_league_setup_comments');

/**
 * 13. Custom search form - Search Form & Search Result
 */
function champions_league_search_form($form) {
    $form = '
    <form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="' . esc_attr__('Search matches, teams, players...', 'champions-league') . '" value="' . get_search_query() . '" name="s" />
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> ' . esc_html__('Search', 'champions-league') . '
            </button>
        </div>
    </form>
    ';
    return $form;
}
add_filter('get_search_form', 'champions_league_search_form');

/**
 * 14. Edit links with nonce
 */
function champions_league_get_edit_link($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    if (!current_user_can('edit_post', $post_id)) {
        return '';
    }

    $url = get_edit_post_link($post_id);
    return '<a href="' . esc_url($url) . '" class="btn btn-sm btn-warning">' . esc_html__('Edit', 'champions-league') . '</a>';
}

/**
 * 15. Archive title filter
 */
function champions_league_archive_title($title) {
    if (is_post_type_archive()) {
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);
        return $post_type_obj->labels->name;
    }
    if (is_tax()) {
        return single_term_title('', false);
    }
    return $title;
}
add_filter('get_the_archive_title', 'champions_league_archive_title');

/**
 * 16. Blog info function
 */
function champions_league_blog_info($show = 'name') {
    return get_bloginfo($show);
}

/**
 * 17. Post meta display - Tags & Meta
 */
function champions_league_post_meta() {
    if (!is_singular()) {
        return;
    }

    echo '<div class="post-meta mb-3">';
    echo '<span class="meta-date"><i class="far fa-calendar"></i> ' . get_the_date() . '</span>';
    echo ' | ';
    echo '<span class="meta-author"><i class="far fa-user"></i> ';
    esc_html_e('By', 'champions-league');
    echo ' ' . wp_kses_post(get_the_author_meta('display_name')) . '</span>';
    
    if (has_tag()) {
        echo ' | ';
        echo '<span class="meta-tags"><i class="fas fa-tags"></i> ' . wp_kses_post(get_the_tag_list('', ', ')) . '</span>';
    }
    
    if (comments_open()) {
        echo ' | ';
        comments_popup_link(
            esc_html__('Leave a comment', 'champions-league'),
            esc_html__('1 comment', 'champions-league'),
            esc_html__('% comments', 'champions-league'),
            'comments-link',
            esc_html__('Comments closed', 'champions-league')
        );
    }

    echo '</div>';
}

/**
 * 18. Flush rewrite rules on theme activation
 */
function champions_league_activation() {
    champions_league_register_post_types();
    champions_league_register_taxonomies();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'champions_league_activation');

/**
 * Helper function to get theme option
 */
function champions_league_get_option($option, $default = '') {
    return get_theme_mod($option, $default);
}

/**
 * AJAX handler for custom functionality
 */
function champions_league_ajax_handler() {
    check_ajax_referer('champions_league_nonce', 'nonce');
    
    // Handle AJAX requests here
    wp_send_json_success();
}
add_action('wp_ajax_champions_league_action', 'champions_league_ajax_handler');
add_action('wp_ajax_nopriv_champions_league_action', 'champions_league_ajax_handler');
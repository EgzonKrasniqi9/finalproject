<?php
/**
 * Prison Break Elite - Theme Functions
 * 
 * @package Prison_Break_Elite
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/* ============================================
   INCLUDE CSS & JS
   ============================================ */

function prison_break_assets() {
    wp_enqueue_style('prison-break-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('prison-break-custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0');
    wp_enqueue_script('prison-break-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    wp_localize_script('prison-break-main', 'prisonBreakData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('prison_break_nonce'),
        'siteUrl' => home_url()
    ));
}
add_action('wp_enqueue_scripts', 'prison_break_assets');

/* ============================================
   THEME SUPPORT
   ============================================ */

function prison_break_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    add_theme_support('post-formats', array(
        'video',
        'gallery',
        'quote',
        'audio',
        'link'
    ));
    
    add_image_size('prison-break-featured', 800, 500, true);
    add_image_size('prison-break-thumbnail', 300, 200, true);
}
add_action('after_setup_theme', 'prison_break_theme_support');

/* ============================================
   CUSTOM MENUS
   ============================================ */

function prison_break_menus() {
    register_nav_menus(array(
        'primary-menu' => esc_html__('Primary Menu', 'prison-break'),
        'secondary-menu' => esc_html__('Secondary Menu', 'prison-break'),
        'footer-menu' => esc_html__('Footer Menu', 'prison-break')
    ));
}
add_action('init', 'prison_break_menus');

/* ============================================
   SIDEBAR & WIDGETS
   ============================================ */

function prison_break_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Primary Sidebar', 'prison-break'),
        'id' => 'primary-sidebar',
        'description' => esc_html__('Main sidebar for content', 'prison-break'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 1', 'prison-break'),
        'id' => 'footer-widget-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>'
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 2', 'prison-break'),
        'id' => 'footer-widget-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>'
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 3', 'prison-break'),
        'id' => 'footer-widget-3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'prison_break_widgets_init');

/* ============================================
   CUSTOM POST TYPES
   ============================================ */

function prison_break_custom_post_types() {
    // Cast Members
    register_post_type('cast', array(
        'labels' => array(
            'name' => esc_html__('Cast', 'prison-break'),
            'singular_name' => esc_html__('Cast Member', 'prison-break'),
            'add_new' => esc_html__('Add Cast Member', 'prison-break'),
            'add_new_item' => esc_html__('Add New Cast Member', 'prison-break'),
            'edit_item' => esc_html__('Edit Cast Member', 'prison-break'),
            'view_item' => esc_html__('View Cast Member', 'prison-break')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'cast'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-users',
        'show_in_rest' => true
    ));
    
    // Episodes
    register_post_type('episodes', array(
        'labels' => array(
            'name' => esc_html__('Episodes', 'prison-break'),
            'singular_name' => esc_html__('Episode', 'prison-break'),
            'add_new' => esc_html__('Add Episode', 'prison-break'),
            'add_new_item' => esc_html__('Add New Episode', 'prison-break'),
            'edit_item' => esc_html__('Edit Episode', 'prison-break'),
            'view_item' => esc_html__('View Episode', 'prison-break')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'episodes'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-film',
        'show_in_rest' => true
    ));
    
    // Seasons
    register_post_type('seasons', array(
        'labels' => array(
            'name' => esc_html__('Seasons', 'prison-break'),
            'singular_name' => esc_html__('Season', 'prison-break'),
            'add_new' => esc_html__('Add Season', 'prison-break'),
            'add_new_item' => esc_html__('Add New Season', 'prison-break'),
            'edit_item' => esc_html__('Edit Season', 'prison-break'),
            'view_item' => esc_html__('View Season', 'prison-break')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'seasons'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-video-alt3',
        'show_in_rest' => true
    ));
    
    // Quotes
    register_post_type('quotes', array(
        'labels' => array(
            'name' => esc_html__('Quotes', 'prison-break'),
            'singular_name' => esc_html__('Quote', 'prison-break'),
            'add_new' => esc_html__('Add Quote', 'prison-break'),
            'add_new_item' => esc_html__('Add New Quote', 'prison-break'),
            'edit_item' => esc_html__('Edit Quote', 'prison-break'),
            'view_item' => esc_html__('View Quote', 'prison-break')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'quotes'),
        'supports' => array('title', 'editor', 'excerpt'),
        'menu_icon' => 'dashicons-format-quote',
        'show_in_rest' => true
    ));
}
add_action('init', 'prison_break_custom_post_types');

/* ============================================
   CUSTOM TAXONOMIES
   ============================================ */

function prison_break_custom_taxonomies() {
    // Character Role
    register_taxonomy('character-role', 'cast', array(
        'label' => esc_html__('Character Role', 'prison-break'),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'character-role'),
        'show_in_rest' => true
    ));
    
    // Prison Location
    register_taxonomy('prison-location', 'episodes', array(
        'label' => esc_html__('Prison Location', 'prison-break'),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'prison-location'),
        'show_in_rest' => true
    ));
    
    // Story Arc
    register_taxonomy('story-arc', array('episodes', 'quotes'), array(
        'label' => esc_html__('Story Arc', 'prison-break'),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'story-arc'),
        'show_in_rest' => true
    ));
}
add_action('init', 'prison_break_custom_taxonomies');

/* ============================================
   BODY CLASS
   ============================================ */

function prison_break_body_class($classes) {
    if (is_singular()) {
        $classes[] = 'single-' . get_post_type();
    }
    
    if (is_archive()) {
        if (is_category()) {
            $classes[] = 'archive-category';
        } elseif (is_tag()) {
            $classes[] = 'archive-tag';
        } elseif (is_post_type_archive()) {
            $classes[] = 'archive-' . get_post_type();
        }
    }
    
    if (is_search()) {
        $classes[] = 'search-results';
    }
    
    if (is_404()) {
        $classes[] = 'page-not-found';
    }
    
    return $classes;
}
add_filter('body_class', 'prison_break_body_class');

/* ============================================
   EXCERPT HANDLING
   ============================================ */

function prison_break_excerpt_length() {
    return 30;
}
add_filter('excerpt_length', 'prison_break_excerpt_length');

function prison_break_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'prison_break_excerpt_more');

/* ============================================
   COMMENTS CALLBACK
   ============================================ */

function prison_break_comments_callback($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div class="comment-author">
            <?php echo get_avatar($comment, 50); ?>
            <?php comment_author_link(); ?>
        </div>
        <div class="comment-date">
            <?php echo get_comment_date('F j, Y \a\t g:i a'); ?>
        </div>
        <div class="comment-text">
            <?php comment_text(); ?>
        </div>
    </div>
    <?php
}

/* ============================================
   PAGINATION WITH WP_QUERY
   ============================================ */

function prison_break_pagination($wp_query = null) {
    if (!$wp_query) {
        global $wp_query;
    }
    
    $big = 999999999;
    $args = array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => esc_html__('← Previous', 'prison-break'),
        'next_text' => esc_html__('Next →', 'prison-break'),
        'type' => 'list'
    );
    
    echo paginate_links($args);
}

/* ============================================
   CUSTOM WP_QUERY HELPER
   ============================================ */

function prison_break_get_posts($post_type = 'post', $per_page = -1, $paged = 1) {
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => $per_page,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    return new WP_Query($args);
}

/* ============================================
   EDIT LINKS
   ============================================ */

function prison_break_edit_post_link() {
    edit_post_link(
        esc_html__('Edit Post', 'prison-break'),
        '<span class="edit-post">',
        '</span>'
    );
}

/* ============================================
   SEARCH FORM
   ============================================ */

function prison_break_search_form($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <input type="search" class="search-input" placeholder="' . esc_attr__('Search Prison Break...', 'prison-break') . '" value="' . get_search_query() . '" name="s" />
        <button type="submit" class="search-button">' . esc_html__('Search', 'prison-break') . '</button>
    </form>';
    
    return $form;
}
add_filter('get_search_form', 'prison_break_search_form');

/* ============================================
   SITE INFO
   ============================================ */

function prison_break_site_info() {
    ?>
    <div class="site-info">
        <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></p>
        <p><?php esc_html_e('Powered by Prison Break Elite Theme', 'prison-break'); ?></p>
    </div>
    <?php
}

/* ============================================
   CREATE DEFAULT CATEGORIES
   ============================================ */

function prison_break_create_default_categories() {
    $roles = array(
        'main-character' => 'Main Character',
        'supporting' => 'Supporting Character',
        'antagonist' => 'Antagonist',
        'guest-star' => 'Guest Star'
    );
    
    foreach ($roles as $slug => $name) {
        if (!term_exists($name, 'character-role')) {
            wp_insert_term($name, 'character-role', array('slug' => $slug));
        }
    }
    
    $prisons = array(
        'fox-river' => 'Fox River',
        'sona' => 'Sona',
        'gate' => 'Gate',
        'ogygia' => 'Ogygia'
    );
    
    foreach ($prisons as $slug => $name) {
        if (!term_exists($name, 'prison-location')) {
            wp_insert_term($name, 'prison-location', array('slug' => $slug));
        }
    }
}

add_action('after_switch_theme', 'prison_break_create_default_categories');
add_action('init', function() {
    if (!term_exists('Main Character', 'character-role')) {
        prison_break_create_default_categories();
    }
});

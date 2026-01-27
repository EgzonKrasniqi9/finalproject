<?php
/**
 * Extreme Sports Elite - Theme Functions
 * 
 * @package Extreme_Sports_Elite
 * @version 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/* ============================================
   INCLUDE CSS & JS
   ============================================ */

function extreme_sports_assets() {
    // Main CSS
    wp_enqueue_style('extreme-sports-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Custom CSS
    wp_enqueue_style('extreme-sports-custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0');
    
    // Main JS
    wp_enqueue_script('extreme-sports-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Add localized data
    wp_localize_script('extreme-sports-main', 'extremeSportsData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('extreme_sports_nonce'),
        'siteUrl' => home_url()
    ));
}
add_action('wp_enqueue_scripts', 'extreme_sports_assets');

/* ============================================
   THEME SUPPORT
   ============================================ */

function extreme_sports_theme_support() {
    // Add theme support features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Add post formats support
    add_theme_support('post-formats', array(
        'aside',
        'gallery',
        'video',
        'audio',
        'quote',
        'link'
    ));
    
    // Image sizes
    add_image_size('extreme-sports-featured', 800, 500, true);
    add_image_size('extreme-sports-thumbnail', 300, 200, true);
}
add_action('after_setup_theme', 'extreme_sports_theme_support');

/* ============================================
   CUSTOM MENUS
   ============================================ */

function extreme_sports_menus() {
    register_nav_menus(array(
        'primary-menu' => esc_html__('Primary Menu', 'extreme-sports'),
        'secondary-menu' => esc_html__('Secondary Menu', 'extreme-sports'),
        'footer-menu' => esc_html__('Footer Menu', 'extreme-sports')
    ));
}
add_action('init', 'extreme_sports_menus');

/* ============================================
   SIDEBAR & WIDGETS
   ============================================ */

function extreme_sports_widgets_init() {
    // Primary Sidebar
    register_sidebar(array(
        'name' => esc_html__('Primary Sidebar', 'extreme-sports'),
        'id' => 'primary-sidebar',
        'description' => esc_html__('Main sidebar for blog posts', 'extreme-sports'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    
    // Footer Widget 1
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 1', 'extreme-sports'),
        'id' => 'footer-widget-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>'
    ));
    
    // Footer Widget 2
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 2', 'extreme-sports'),
        'id' => 'footer-widget-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>'
    ));
    
    // Footer Widget 3
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 3', 'extreme-sports'),
        'id' => 'footer-widget-3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'extreme_sports_widgets_init');

/* ============================================
   CUSTOM POST TYPES
   ============================================ */

function extreme_sports_custom_post_types() {
    // Athletes Post Type
    register_post_type('athletes', array(
        'labels' => array(
            'name' => esc_html__('Athletes', 'extreme-sports'),
            'singular_name' => esc_html__('Athlete', 'extreme-sports'),
            'add_new' => esc_html__('Add New Athlete', 'extreme-sports'),
            'add_new_item' => esc_html__('Add New Athlete', 'extreme-sports'),
            'edit_item' => esc_html__('Edit Athlete', 'extreme-sports'),
            'view_item' => esc_html__('View Athlete', 'extreme-sports')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'athletes'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-users',
        'show_in_rest' => true
    ));
    
    // Events Post Type
    register_post_type('events', array(
        'labels' => array(
            'name' => esc_html__('Events', 'extreme-sports'),
            'singular_name' => esc_html__('Event', 'extreme-sports'),
            'add_new' => esc_html__('Add New Event', 'extreme-sports'),
            'add_new_item' => esc_html__('Add New Event', 'extreme-sports'),
            'edit_item' => esc_html__('Edit Event', 'extreme-sports'),
            'view_item' => esc_html__('View Event', 'extreme-sports')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'events'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-calendar-alt',
        'show_in_rest' => true
    ));
    
    // Gear/Equipment Post Type
    register_post_type('gear', array(
        'labels' => array(
            'name' => esc_html__('Gear', 'extreme-sports'),
            'singular_name' => esc_html__('Gear Item', 'extreme-sports'),
            'add_new' => esc_html__('Add New Gear', 'extreme-sports'),
            'add_new_item' => esc_html__('Add New Gear', 'extreme-sports'),
            'edit_item' => esc_html__('Edit Gear', 'extreme-sports'),
            'view_item' => esc_html__('View Gear', 'extreme-sports')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'gear'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-shield-alt',
        'show_in_rest' => true
    ));
    
    // Videos Post Type
    register_post_type('videos', array(
        'labels' => array(
            'name' => esc_html__('Videos', 'extreme-sports'),
            'singular_name' => esc_html__('Video', 'extreme-sports'),
            'add_new' => esc_html__('Add New Video', 'extreme-sports'),
            'add_new_item' => esc_html__('Add New Video', 'extreme-sports'),
            'edit_item' => esc_html__('Edit Video', 'extreme-sports'),
            'view_item' => esc_html__('View Video', 'extreme-sports')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'videos'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-video-alt3',
        'show_in_rest' => true
    ));
}
add_action('init', 'extreme_sports_custom_post_types');

/* ============================================
   CUSTOM TAXONOMIES
   ============================================ */

function extreme_sports_custom_taxonomies() {
    // Sport Categories
    register_taxonomy('sport-category', array('post', 'athletes', 'events'), array(
        'label' => esc_html__('Sport Categories', 'extreme-sports'),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'sport-category'),
        'show_in_rest' => true
    ));
    
    // Athlete Level
    register_taxonomy('athlete-level', 'athletes', array(
        'label' => esc_html__('Level', 'extreme-sports'),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'athlete-level'),
        'show_in_rest' => true
    ));
    
    // Event Type
    register_taxonomy('event-type', 'events', array(
        'label' => esc_html__('Event Type', 'extreme-sports'),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'event-type'),
        'show_in_rest' => true
    ));
    
    // Gear Type
    register_taxonomy('gear-type', 'gear', array(
        'label' => esc_html__('Gear Type', 'extreme-sports'),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'gear-type'),
        'show_in_rest' => true
    ));
}
add_action('init', 'extreme_sports_custom_taxonomies');

/* ============================================
   BODY CLASS
   ============================================ */

function extreme_sports_body_class($classes) {
    global $post;
    
    // Add post type to body class
    if (is_singular()) {
        $classes[] = 'single-' . get_post_type();
    }
    
    // Add archive type
    if (is_archive()) {
        if (is_category()) {
            $classes[] = 'archive-category';
        } elseif (is_tag()) {
            $classes[] = 'archive-tag';
        } elseif (is_post_type_archive()) {
            $classes[] = 'archive-' . get_post_type();
        }
    }
    
    // Add search class
    if (is_search()) {
        $classes[] = 'search-results';
    }
    
    // Add 404 class
    if (is_404()) {
        $classes[] = 'page-not-found';
    }
    
    return $classes;
}
add_filter('body_class', 'extreme_sports_body_class');

/* ============================================
   EXCERPT HANDLING
   ============================================ */

function extreme_sports_excerpt_length() {
    return 25;
}
add_filter('excerpt_length', 'extreme_sports_excerpt_length');

function extreme_sports_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'extreme_sports_excerpt_more');

/* ============================================
   PAGE TEMPLATES (add_theme_support)
   ============================================ */

// Page templates are handled via template files in the root or templates folder

/* ============================================
   COMMENTS
   ============================================ */

function extreme_sports_comment_form($args = array(), $post_id = null) {
    $args = wp_parse_args($args, array(
        'class_submit' => 'btn btn-primary',
        'comment_notes_before' => ''
    ));
    
    comment_form($args, $post_id);
}

function extreme_sports_comments_callback($comment, $args, $depth) {
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
        <?php if ($args['type'] == 'all' || $args['type'] == 'comment') : 
            comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); 
        endif; ?>
    </div>
    <?php
}

/* ============================================
   PAGINATION WITH WP_QUERY
   ============================================ */

function extreme_sports_pagination($wp_query = null) {
    if (!$wp_query) {
        global $wp_query;
    }
    
    $big = 999999999;
    $args = array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => esc_html__('← Previous', 'extreme-sports'),
        'next_text' => esc_html__('Next →', 'extreme-sports'),
        'type' => 'list',
        'before_page_number' => '<span>',
        'after_page_number' => '</span>'
    );
    
    echo paginate_links($args);
}

/* ============================================
   CUSTOM WP_QUERY HELPER
   ============================================ */

function extreme_sports_get_posts($post_type = 'post', $per_page = -1, $paged = 1) {
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

function extreme_sports_edit_post_link() {
    edit_post_link(
        esc_html__('Edit Post', 'extreme-sports'),
        '<span class="edit-post">',
        '</span>'
    );
}

/* ============================================
   SEARCH FORM
   ============================================ */

function extreme_sports_search_form($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <input type="search" class="search-input" placeholder="' . esc_attr__('Search...', 'extreme-sports') . '" value="' . get_search_query() . '" name="s" />
        <button type="submit" class="search-button">' . esc_html__('Search', 'extreme-sports') . '</button>
    </form>';
    
    return $form;
}
add_filter('get_search_form', 'extreme_sports_search_form');

/* ============================================
   BLOG INFO
   ============================================ */

function extreme_sports_site_info() {
    ?>
    <div class="site-info">
        <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?></p>
        <p><?php esc_html_e('Powered by WordPress & Extreme Sports Elite Theme', 'extreme-sports'); ?></p>
    </div>
    <?php
}

/* ============================================
   GET POSTS BY SPORT CATEGORY
   ============================================ */

function extreme_sports_get_posts_by_category($category_slug, $per_page = 5) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $per_page,
        'tax_query' => array(
            array(
                'taxonomy' => 'sport-category',
                'field' => 'slug',
                'terms' => $category_slug
            )
        )
    );
    
    return new WP_Query($args);
}

/* ============================================
   HELPER: GET POST FORMAT ICON
   ============================================ */

function extreme_sports_get_post_format_icon($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $format = get_post_format($post_id) ?: 'standard';
    
    $icons = array(
        'video' => '▶',
        'audio' => '♪',
        'gallery' => '🖼',
        'quote' => '"',
        'link' => '🔗',
        'standard' => '📄'
    );
    
    return $icons[$format] ?? '📄';
}

/* ============================================
   TEMPLATE FUNCTIONS
   ============================================ */

function extreme_sports_get_template($template_name, $args = array()) {
    extract($args);
    $template_path = get_template_directory() . '/templates/' . $template_name . '.php';
    
    if (file_exists($template_path)) {
        include $template_path;
    }
}

/* ============================================
   FLUSH REWRITE RULES ON ACTIVATION
   ============================================ */

function extreme_sports_flush_rewrite_rules() {
    extreme_sports_custom_post_types();
    extreme_sports_custom_taxonomies();
    flush_rewrite_rules();
}

// Uncomment to use during development
// register_activation_hook(__FILE__, 'extreme_sports_flush_rewrite_rules');
// register_deactivation_hook(__FILE__, 'flush_rewrite_rules');

/* ============================================
   CREATE DEFAULT SPORT CATEGORIES
   ============================================ */

function extreme_sports_create_default_categories() {
    $sports = array(
        'skateboarding' => 'Skateboarding',
        'skiing' => 'Skiing',
        'surfing' => 'Surfing',
        'racing' => 'Racing',
        'snowboarding' => 'Snowboarding',
        'bmx' => 'BMX',
        'skydiving' => 'Skydiving',
        'rock-climbing' => 'Rock Climbing',
        'mountain-biking' => 'Mountain Biking',
        'parkour' => 'Parkour',
        'kiteboarding' => 'Kiteboarding',
        'base-jumping' => 'BASE Jumping',
        'whitewater' => 'Whitewater Sports',
        'ufc-mma' => 'UFC/MMA'
    );
    
    foreach ($sports as $slug => $name) {
        // Check if category already exists
        $existing = term_exists($name, 'sport-category');
        
        if (!$existing) {
            wp_insert_term($name, 'sport-category', array(
                'slug' => $slug,
                'description' => sprintf('Posts about %s', $name)
            ));
        }
    }
}

// Create categories on theme activation
add_action('after_switch_theme', 'extreme_sports_create_default_categories');

// Also create on init if they don't exist
add_action('init', function() {
    if (!term_exists('Skateboarding', 'sport-category')) {
        extreme_sports_create_default_categories();
    }
});

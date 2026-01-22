<?php

/* Include CSS & JS */
function football_assets() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'football_assets');

/* Theme Support */
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('video','gallery','quote'));

/* Menus */
register_nav_menus(array(
    'main-menu' => 'Main Menu'
));

/* Sidebar & Widgets */
function football_sidebar() {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'sidebar-1'
    ));
}
add_action('widgets_init', 'football_sidebar');

/* Custom Post Type */
function football_players() {
    register_post_type('players', array(
        'labels' => array(
            'name' => 'Players'
        ),
        'public' => true,
        'supports' => array('title','editor','thumbnail')
    ));
}
add_action('init', 'football_players');

/* Custom Taxonomy */
function player_position() {
    register_taxonomy('position','players',array(
        'label' => 'Positions',
        'hierarchical' => true
    ));
}
add_action('init','player_position');

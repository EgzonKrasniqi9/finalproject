<?php
/**
 * Header Template
 * 
 * @package Extreme_Sports_Elite
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Skip to main content link for accessibility -->
    <a href="#main-content" class="skip-to-main-content"><?php esc_html_e('Skip to main content', 'extreme-sports'); ?></a>

    <header class="site-header">
        <!-- Header Top Info Bar -->
        <div class="header-top">
            <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 14px;">
                    <span class="blog-info">
                        <strong><?php bloginfo('name'); ?></strong>
                        <?php if (bloginfo('description')) : ?>
                            - <?php bloginfo('description'); ?>
                        <?php endif; ?>
                    </span>
                    <div>
                        <?php
                        if (is_user_logged_in()) {
                            $current_user = wp_get_current_user();
                            echo sprintf(esc_html__('Welcome, %s', 'extreme-sports'), esc_html($current_user->display_name)) . ' | ';
                            echo '<a href="' . esc_url(wp_logout_url(home_url())) . '">' . esc_html__('Logout', 'extreme-sports') . '</a>';
                        } else {
                            echo '<a href="' . esc_url(wp_login_url()) . '">' . esc_html__('Login', 'extreme-sports') . '</a> | ';
                            echo '<a href="' . esc_url(wp_registration_url()) . '">' . esc_html__('Register', 'extreme-sports') . '</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation Bar -->
        <nav class="site-nav">
            <div class="container" style="display: flex; justify-content: space-between; align-items: center; padding: 15px 0;">
                <!-- Logo & Site Title -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <?php
                    $custom_logo_id = get_custom_logo();
                    if ($custom_logo_id) {
                        echo wp_get_attachment_image($custom_logo_id, 'medium');
                    } else {
                        echo '<span style="font-size: 24px; font-weight: bold;">' . esc_html(get_bloginfo('name')) . '</span>';
                    }
                    ?>
                </a>

                <!-- Primary Menu -->
                <div class="nav-menu-container">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container' => false,
                        'menu_class' => 'site-nav',
                        'fallback_cb' => function() {
                            echo '<div class="site-nav">';
                            echo '<a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'extreme-sports') . '</a>';
                            echo '<a href="' . esc_url(get_post_type_archive_link('athletes')) . '">' . esc_html__('Athletes', 'extreme-sports') . '</a>';
                            echo '<a href="' . esc_url(get_post_type_archive_link('events')) . '">' . esc_html__('Events', 'extreme-sports') . '</a>';
                            echo '<a href="' . esc_url(get_post_type_archive_link('gear')) . '">' . esc_html__('Gear', 'extreme-sports') . '</a>';
                            echo '<a href="' . esc_url(get_post_type_archive_link('videos')) . '">' . esc_html__('Videos', 'extreme-sports') . '</a>';
                            echo '</div>';
                        },
                        'depth' => 2
                    ));
                    ?>
                </div>

                <!-- Search Form -->
                <div class="header-search">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </nav>
    </header>

    <main id="main-content" class="site-content">
        <!-- Hero/Banner Section for Home -->
        <?php if (is_home() || is_front_page()) : ?>
            <section class="hero-banner" style="background: linear-gradient(135deg, #ff6b35, #004e89); color: white; padding: 60px 0; margin-bottom: 40px; text-align: center;">
                <div class="container">
                    <h1 style="font-size: 3rem; margin-bottom: 20px;"><?php bloginfo('name'); ?></h1>
                    <p style="font-size: 1.3rem;"><?php bloginfo('description'); ?></p>
                </div>
            </section>
        <?php endif; ?>

        <!-- Breadcrumbs -->
        <?php if (!is_home() && !is_front_page()) : ?>
            <div class="breadcrumbs-wrapper" style="margin-bottom: 30px;">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <div class="breadcrumbs" style="display: flex; gap: 10px; flex-wrap: wrap;">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'extreme-sports'); ?></a>
                            <span>/</span>
                            <?php
                            if (is_page()) {
                                echo '<span>' . esc_html(get_the_title()) . '</span>';
                            } elseif (is_single()) {
                                echo '<a href="' . esc_url(home_url('/blog')) . '">' . esc_html__('Blog', 'extreme-sports') . '</a>';
                                echo '<span>/</span>';
                                echo '<span>' . esc_html(get_the_title()) . '</span>';
                            } elseif (is_post_type_archive()) {
                                $post_type_obj = get_post_type_object(get_post_type());
                                echo '<span>' . esc_html($post_type_obj && isset($post_type_obj->label) ? $post_type_obj->label : ucfirst(get_post_type())) . '</span>';
                            } elseif (is_archive()) {
                                echo '<span>' . get_the_archive_title() . '</span>';
                            } elseif (is_search()) {
                                echo '<span>' . sprintf(esc_html__('Search: "%s"', 'extreme-sports'), get_search_query()) . '</span>';
                            } elseif (is_404()) {
                                echo '<span>' . esc_html__('Page Not Found', 'extreme-sports') . '</span>';
                            }
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        <?php endif; ?>

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
    <a href="#main-content" class="skip-to-main-content"><?php esc_html_e('Skip to main content', 'champions-league'); ?></a>

    <header class="site-header">
        <div class="header-top bg-dark text-white py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <span class="blog-info"><?php esc_html_e('Welcome to', 'champions-league'); ?> <strong><?php bloginfo('name'); ?></strong></span>
                    </div>
                    <div class="col-md-6 text-end">
                        <?php
                        if (is_user_logged_in()) {
                            $current_user = wp_get_current_user();
                            echo '<span>' . sprintf(esc_html__('Hello, %s', 'champions-league'), esc_html($current_user->display_name)) . '</span> | ';
                            echo '<a href="' . esc_url(wp_logout_url(home_url())) . '">' . esc_html__('Logout', 'champions-league') . '</a>';
                        } else {
                            echo '<a href="' . esc_url(wp_login_url()) . '">' . esc_html__('Login', 'champions-league') . '</a> | ';
                            echo '<a href="' . esc_url(wp_registration_url()) . '">' . esc_html__('Register', 'champions-league') . '</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">
                <!-- Logo & Site Title -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">
                    <?php
                    $custom_logo_id = get_custom_logo();
                    if ($custom_logo_id) {
                        echo wp_get_attachment_image($custom_logo_id, 'medium');
                    } else {
                        echo '<span class="site-title">' . esc_html(get_bloginfo('name')) . '</span>';
                    }
                    ?>
                </a>

                <!-- Tagline -->
                <span class="tagline text-muted ms-3 d-none d-lg-inline">
                    <?php bloginfo('description'); ?>
                </span>

                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'champions-league'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container' => false,
                        'menu_class' => 'navbar-nav ms-auto',
                        'fallback_cb' => 'wp_page_menu',
                        'depth' => 2,
                        'walker' => new Bootstrap_Nav_Walker(),
                    ));
                    ?>

                    <!-- Search Form in Navigation -->
                    <div class="ms-lg-3 mt-3 mt-lg-0">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main id="main-content" class="site-content">
        <!-- Hero/Banner Section -->
        <?php if (is_home() || is_front_page()) : ?>
            <section class="hero-banner bg-primary text-white py-5 mb-5">
                <div class="container text-center">
                    <h1 class="display-4"><?php esc_html_e('Champions League Elite Hub', 'champions-league'); ?></h1>
                    <p class="lead"><?php esc_html_e('Your Ultimate Source for Football Excellence', 'champions-league'); ?></p>
                </div>
            </section>
        <?php endif; ?>

        <!-- Breadcrumbs -->
        <?php if (!is_home() && !is_front_page()) : ?>
            <div class="breadcrumbs-wrapper mb-4">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'champions-league'); ?></a>
                            </li>
                            <?php
                            if (is_page()) {
                                echo '<li class="breadcrumb-item active">' . esc_html(get_the_title()) . '</li>';
                            } elseif (is_single()) {
                                echo '<li class="breadcrumb-item"><a href="' . esc_url(home_url('/blog')) . '">' . esc_html__('Blog', 'champions-league') . '</a></li>';
                                echo '<li class="breadcrumb-item active">' . esc_html(get_the_title()) . '</li>';
                            } elseif (is_archive()) {
                                echo '<li class="breadcrumb-item active">' . get_the_archive_title() . '</li>';
                            } elseif (is_search()) {
                                echo '<li class="breadcrumb-item active">' . sprintf(esc_html__('Search Results for "%s"', 'champions-league'), get_search_query()) . '</li>';
                            } elseif (is_404()) {
                                echo '<li class="breadcrumb-item active">' . esc_html__('Page Not Found', 'champions-league') . '</li>';
                            }
                            ?>
                        </ol>
                    </nav>
                </div>
            </div>
        <?php endif; ?>
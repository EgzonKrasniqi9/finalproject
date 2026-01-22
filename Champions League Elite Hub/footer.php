    </main><!-- #main-content -->

    <footer class="site-footer bg-dark text-white mt-5">
        <!-- Footer Widgets -->
        <div class="footer-widgets py-5">
            <div class="container">
                <div class="row">
                    <?php
                    if (is_active_sidebar('footer-widgets')) {
                        dynamic_sidebar('footer-widgets');
                    } else {
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="footer-widget">
                                <h4 class="widget-title"><?php esc_html_e('About', 'champions-league'); ?></h4>
                                <p><?php bloginfo('description'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="footer-widget">
                                <h4 class="widget-title"><?php esc_html_e('Quick Links', 'champions-league'); ?></h4>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'champions-league'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/matches')); ?>"><?php esc_html_e('Matches', 'champions-league'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/teams')); ?>"><?php esc_html_e('Teams', 'champions-league'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/players')); ?>"><?php esc_html_e('Players', 'champions-league'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="footer-widget">
                                <h4 class="widget-title"><?php esc_html_e('Recent Posts', 'champions-league'); ?></h4>
                                <ul class="list-unstyled">
                                    <?php
                                    $recent_posts = wp_get_recent_posts(array(
                                        'numberposts' => 5,
                                        'post_status' => 'publish'
                                    ));
                                    foreach ($recent_posts as $post) {
                                        echo '<li><a href="' . esc_url(get_permalink($post['ID'])) . '">' . esc_html($post['post_title']) . '</a></li>';
                                    }
                                    wp_reset_postdata();
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Footer Menu -->
        <div class="footer-menu bg-darker py-3 border-top border-secondary">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <nav class="footer-navigation">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'container' => false,
                                'menu_class' => 'footer-nav-links',
                                'fallback_cb' => false,
                                'depth' => 1,
                            ));
                            ?>
                        </nav>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="footer-social">
                            <a href="#" title="Facebook" class="btn btn-sm btn-outline-light me-2">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" title="Twitter" class="btn btn-sm btn-outline-light me-2">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" title="Instagram" class="btn btn-sm btn-outline-light me-2">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" title="YouTube" class="btn btn-sm btn-outline-light">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom bg-darker py-3 border-top border-secondary text-center">
            <div class="container">
                <p class="mb-0">
                    &copy; <?php echo esc_html(date('Y')); ?> <strong><?php bloginfo('name'); ?></strong> - 
                    <?php
                    printf(
                        esc_html__('Powered by WordPress & %s Theme', 'champions-league'),
                        '<a href="' . esc_url(home_url('/')) . '" class="text-white">' . esc_html__('Champions League Elite Hub', 'champions-league') . '</a>'
                    );
                    ?>
                </p>
                <p class="mt-2 mb-0 small">
                    <a href="<?php echo esc_url(home_url('/privacy')); ?>"><?php esc_html_e('Privacy Policy', 'champions-league'); ?></a> | 
                    <a href="<?php echo esc_url(home_url('/terms')); ?>"><?php esc_html_e('Terms of Service', 'champions-league'); ?></a>
                </p>
            </div>
        </div>
    </footer><!-- #site-footer -->

    <?php wp_footer(); ?>
</body>
</html>
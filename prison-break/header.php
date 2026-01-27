<?php
/**
 * Prison Break Elite - Header Template
 * 
 * @package Prison_Break_Elite
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to main content', 'prison-break'); ?></a>
        
        <header id="masthead" class="site-header">
            <div class="header-top">
                <div class="header-container">
                    <div class="site-branding">
                        <div class="text-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="logo-link">
                                <span class="logo-text">PRISON</span>
                                <span class="logo-text-break">BREAK</span>
                            </a>
                        </div>
                        <p class="site-description"><?php bloginfo('description'); ?></p>
                    </div>
                    
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="hamburger"></span>
                    </button>
                </div>
            </div>
            
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <!-- Seasons Menu Items -->
                <ul id="primary-menu" class="menu">
                    <li class="season-menu-item">
                        <a href="#season-1" class="season-link">Season 1</a>
                        <div class="season-submenu">
                            <div class="season-content">
                                <h3>Season 1: Prison Break</h3>
                                <div class="trailer-section">
                                    <iframe width="100%" height="250" src="https://youtu.be/AL9zLctDJaU?si=PdZqJQrUU-s_FN8R" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="characters-section">
                                    <h4>Main Characters:</h4>
                                    <ul class="character-list">
                                        <li><strong>Michael Scofield:</strong> Prison architect who plans the escape</li>
                                        <li><strong>Lincoln Burrows:</strong> Death row inmate, Michael's brother</li>
                                        <li><strong>Sucre:</strong> Gang member and inmate</li>
                                        <li><strong>T-Bag:</strong> Dangerous criminal and inmate</li>
                                        <li><strong>Sara Tancredi:</strong> Prison doctor and love interest</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="season-menu-item">
                        <a href="#season-2" class="season-link">Season 2</a>
                        <div class="season-submenu">
                            <div class="season-content">
                                <h3>Season 2: Manhunt</h3>
                                <div class="trailer-section">
                                    <iframe width="100%" height="250" src="https://youtu.be/sDjfm5ioWMg?si=VqeF2sf4DC1bff25" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="characters-section">
                                    <h4>Featured Characters:</h4>
                                    <ul class="character-list">
                                        <li><strong>Michael Scofield:</strong> On the run with the escaped prisoners</li>
                                        <li><strong>Lincoln Burrows:</strong> Searching for the truth</li>
                                        <li><strong>Agent Mahone:</strong> Relentless FBI agent hunting them</li>
                                        <li><strong>T-Bag:</strong> Dangerous and unpredictable</li>
                                        <li><strong>Sara Tancredi:</strong> Fugitive with Michael</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="season-menu-item">
                        <a href="#season-3" class="season-link">Season 3</a>
                        <div class="season-submenu">
                            <div class="season-content">
                                <h3>Season 3: Sona</h3>
                                <div class="trailer-section">
                                    <iframe width="100%" height="250" src="https://youtu.be/0jJCRYtbduA?si=ltrghYC4JNveVHro" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="characters-section">
                                    <h4>Main Characters:</h4>
                                    <ul class="character-list">
                                        <li><strong>Michael Scofield:</strong> Imprisoned in Sona, Panama</li>
                                        <li><strong>Lincoln Burrows:</strong> In deep cover</li>
                                        <li><strong>Sucre:</strong> Reunites with Michael in Sona</li>
                                        <li><strong>T-Bag:</strong> Returns with vengeance</li>
                                        <li><strong>Bellick:</strong> Prison guard in Sona</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="season-menu-item">
                        <a href="#season-4" class="season-link">Season 4</a>
                        <div class="season-submenu">
                            <div class="season-content">
                                <h3>Season 4: Sequel</h3>
                                <div class="trailer-section">
                                    <iframe width="100%" height="250" src="https://youtu.be/d6BRWxsrcNA?si=Wz6Ukz_NhnyZzuet" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="characters-section">
                                    <h4>Featured Characters:</h4>
                                    <ul class="character-list">
                                        <li><strong>Michael Scofield:</strong> Free but caught in new conspiracy</li>
                                        <li><strong>Lincoln Burrows:</strong> Vice President's brother</li>
                                        <li><strong>Sucre:</strong> Loyal friend returns</li>
                                        <li><strong>Company Executive:</strong> New antagonists emerge</li>
                                        <li><strong>Sara Tancredi:</strong> Complex family secrets revealed</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="season-menu-item">
                        <a href="#season-5" class="season-link">Season 5</a>
                        <div class="season-submenu">
                            <div class="season-content">
                                <h3>Season 5: Resurrection & Final Break</h3>
                                <div class="trailer-section">
                                    <iframe width="100%" height="250" src="https://youtu.be/iABCLLOrzZA?si=4FuGXJ_TvRsHw0qg" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="characters-section">
                                    <h4>Main Characters:</h4>
                                    <ul class="character-list">
                                        <li><strong>Michael Scofield:</strong> Returns from the dead</li>
                                        <li><strong>Lincoln Burrows:</strong> President facing new threats</li>
                                        <li><strong>Sucre:</strong> Steadfast companion</li>
                                        <li><strong>Sara Tancredi:</strong> Emotional core of the story</li>
                                        <li><strong>Whip:</strong> New inmate with mysterious past</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        
        <!-- Breadcrumb Navigation -->
        <div class="breadcrumb-section">
            <div class="breadcrumb-container">
                <?php
                if (!is_home() && !is_front_page()) {
                    echo '<a href="' . esc_url(home_url('/')) . '">Home</a>';
                    
                    if (is_singular('cast')) {
                        echo ' / <span class="current">Cast Member</span>';
                    } elseif (is_singular('episodes')) {
                        echo ' / <span class="current">Episode</span>';
                    } elseif (is_singular('seasons')) {
                        echo ' / <span class="current">Season</span>';
                    } elseif (is_singular('quotes')) {
                        echo ' / <span class="current">Quote</span>';
                    } elseif (is_post_type_archive()) {
                        $post_type_object = get_post_type_object(get_post_type());
                        if ($post_type_object) {
                            echo ' / <span class="current">' . esc_html($post_type_object->label) . '</span>';
                        }
                    } elseif (is_category()) {
                        echo ' / <span class="current">' . single_cat_title('', false) . '</span>';
                    } elseif (is_tag()) {
                        echo ' / <span class="current">' . single_tag_title('', false) . '</span>';
                    } elseif (is_search()) {
                        echo ' / <span class="current">' . esc_html__('Search Results', 'prison-break') . '</span>';
                    } elseif (is_404()) {
                        echo ' / <span class="current">' . esc_html__('Page Not Found', 'prison-break') . '</span>';
                    } elseif (is_singular()) {
                        echo ' / <span class="current">' . get_the_title() . '</span>';
                    }
                }
                ?>
            </div>
        </div>
        
        <main id="main" class="site-main" role="main">

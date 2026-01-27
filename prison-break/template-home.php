<?php
/**
 * Prison Break Elite - Full Width Page Template
 * 
 * Template Name: Full Width Page
 * 
 * @package Prison_Break_Elite
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container full-width-container">
    <main id="main" class="site-main full-width-main" role="main">
        <?php
        while (have_posts()) {
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('full-width-page'); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                
                <?php
                if (has_post_thumbnail()) {
                    ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail('prison-break-featured', array('alt' => get_the_title())); ?>
                    </div>
                    <?php
                }
                ?>
                
                <div class="entry-content">
                    <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links">',
                        'after'  => '</div>'
                    ));
                    ?>
                </div>

                <!-- Main Characters Section -->
                <section class="characters-showcase">
                    <h2>Meet The Main Characters</h2>
                    <div class="characters-grid">
                        
                        <!-- Michael Scofield -->
                        <div class="character-card">
                            <div class="character-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/Michael_Scofield.png" alt="Michael Scofield">
                            </div>
                            <div class="character-header">
                                <h3>Michael Scofield</h3>
                                <span class="character-role">The Architect</span>
                            </div>
                            <div class="character-description">
                                <p>Michael Scofield is a highly intelligent structural engineer with a photographic memory. He designs and executes an elaborate escape plan from Fox River Penitentiary to save his innocent brother Lincoln from death row. His brilliant mind, meticulous planning, and unwavering determination make him the driving force behind the entire series.</p>
                                <ul class="character-traits">
                                    <li>Genius-level IQ</li>
                                    <li>Expert planner</li>
                                    <li>Prison architect</li>
                                    <li>Natural leader</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Lincoln Burrows -->
                        <div class="character-card">
                            <div class="character-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/Lincoln.png" alt="Lincoln Burrows">
                            </div>
                            <div class="character-header">
                                <h3>Lincoln Burrows</h3>
                                <span class="character-role">The Innocent</span>
                            </div>
                            <div class="character-description">
                                <p>Lincoln Burrows is Michael's older brother, wrongly convicted of murdering the Vice President's brother. Sentenced to death row, Lincoln becomes the central motivation for Michael's elaborate escape plan. Despite his circumstances, Lincoln remains principled and loyal, becoming a crucial member of the escape team and later facing new conspiracies alongside his brother.</p>
                                <ul class="character-traits">
                                    <li>Wrongfully convicted</li>
                                    <li>Death row inmate</li>
                                    <li>Loyal and principled</li>
                                    <li>Becomes Vice President</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Sucre -->
                        <div class="character-card">
                            <div class="character-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/sucre.png" alt="Fernando Sucre">
                            </div>
                            <div class="character-header">
                                <h3>Fernando Sucre</h3>
                                <span class="character-role">The Loyal Friend</span>
                            </div>
                            <div class="character-description">
                                <p>Fernando "Sucre" Sucre is a gang member and career criminal imprisoned at Fox River. Despite his criminal background, Sucre proves to be one of the most loyal and trustworthy members of the escape team. His street smarts, quick thinking, and unwavering loyalty to Michael and Lincoln make him invaluable throughout the series, and his desire to reunite with his daughter drives his motivations.</p>
                                <ul class="character-traits">
                                    <li>Gang background</li>
                                    <li>Street smarts</li>
                                    <li>Loyal to core</li>
                                    <li>Devoted father</li>
                                </ul>
                            </div>
                        </div>

                        <!-- T-Bag -->
                        <div class="character-card">
                            <div class="character-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/t-bag.png" alt="Theodore Bagwell">
                            </div>
                            <div class="character-header">
                                <h3>Theodore "T-Bag" Bagwell</h3>
                                <span class="character-role">The Psychopath</span>
                            </div>
                            <div class="character-description">
                                <p>Theodore Bagwell, known as T-Bag, is one of the most dangerous and unpredictable inmates at Fox River. A cunning manipulator with a sadistic streak, T-Bag joins the escape team while harboring his own sinister agenda. His twisted nature, combined with his intelligence and ruthlessness, makes him a constant threat and unpredictable wildcard throughout the series.</p>
                                <ul class="character-traits">
                                    <li>Highly dangerous</li>
                                    <li>Manipulative genius</li>
                                    <li>Sadistic nature</li>
                                    <li>Survival instinct</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Abruzzi -->
                        <div class="character-card">
                            <div class="character-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/abruci.png" alt="John Abruzzi">
                            </div>
                            <div class="character-header">
                                <h3>John Abruzzi</h3>
                                <span class="character-role">The Mob Boss</span>
                            </div>
                            <div class="character-description">
                                <p>John Abruzzi is a ruthless and powerful mafia boss imprisoned at Fox River for his criminal empire. Commanding respect through fear and violence, Abruzzi becomes a major antagonist in the series. His wealth, connections, and willingness to eliminate threats make him a formidable obstacle. His storyline explores themes of power, corruption, and the consequences of a life of crime.</p>
                                <ul class="character-traits">
                                    <li>Mafia kingpin</li>
                                    <li>Ruthless leader</li>
                                    <li>Wealthy & connected</li>
                                    <li>Primary antagonist</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Bellick -->
                        <div class="character-card">
                            <div class="character-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/bellik.jpg" alt="Brad Bellick">
                            </div>
                            <div class="character-header">
                                <h3>Brad Bellick</h3>
                                <span class="character-role">The Corrupt Guard</span>
                            </div>
                            <div class="character-description">
                                <p>Brad Bellick is a corrupt prison guard at Fox River Penitentiary and later a guard at Sona Prison in Panama. Initially appearing as a minor antagonist, Bellick becomes increasingly important to the plot as his own schemes and moral compromises spiral. His transformation from minor guard to desperate fugitive showcases the moral ambiguity of the series and his involvement in various escapes and conspiracies.</p>
                                <ul class="character-traits">
                                    <li>Corrupt guard</li>
                                    <li>Blackmail expert</li>
                                    <li>Desperate & scheming</li>
                                    <li>Morally compromised</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </section>
                
                <footer class="entry-footer">
                    <?php prison_break_edit_post_link(); ?>
                </footer>
            </article>
            
            <?php
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
        }
        ?>
    </main>
</div>

<?php
get_footer();

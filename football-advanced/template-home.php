<?php
/*
Template Name: Home Template
*/
get_header();
?>

<h2>Latest Players</h2>

<?php
$query = new WP_Query(array('post_type'=>'players'));
while($query->have_posts()): $query->the_post();
?>
<h3><?php the_title(); ?></h3>
<?php endwhile; wp_reset_postdata(); ?>

<?php get_footer(); ?>

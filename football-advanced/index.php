<?php get_header(); ?>

<div class="container">
<?php if(have_posts()):
    while(have_posts()): the_post(); ?>

    <article>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <p><?php the_tags(); ?></p>
        <?php edit_post_link('Edit'); ?>
    </article>

<?php endwhile; endif; ?>

<?php the_posts_pagination(); ?>
</div>

<?php get_footer(); ?>

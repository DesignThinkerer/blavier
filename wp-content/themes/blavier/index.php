<?php
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <h2>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <p><?php the_content(); ?></p>
    <?php endwhile;
else : ?>
    <p>No posts found.</p>
<?php endif;

get_footer();
<?php
// Notre thème implémente un système SPA (Single Page Application) en utilisant l'API Fetch de JavaScript pour charger dynamiquement le contenu des pages sans recharger la page entière, index.php est le point d'entrée de l'application. Seul ce fichier chargera le header et le footer.

get_header();

if (have_posts()) : ?>
    <?php while (have_posts()): the_post(); ?>
        <article>
            <?php if (has_post_thumbnail()) : ?>
                <figure>
                    <?php the_post_thumbnail('medium', ['alt'=>'']); ?>
                    <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
                </figure>
            <?php endif; ?>
            <hgroup>
                <h2><?php the_title(); ?></h2>
                <h3><?php the_category(); ?></h3>
            </hgroup>
            <p><?php the_content("En voir plus"); ?></p>
            <a href="<?php the_permalink() ?>">Voir plus</a>
        </article>
    <?php endwhile; ?>
<?php else : ?>
    <p>Pas d'articles.</p>
<?php endif;

get_footer();
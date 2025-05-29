<?php
$catalogue_title = "Nos modèles <em>d'inspiration</em>";

get_header();
?>
<header class="title-header">
    <h1><?php the_title(); ?></h1>
    <nav aria-label="Breadcrumb">
        <ol>
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/inspiration">Inspiration</a>
            </li>
            <li>
                <a href="" aria-current="page"><?php the_title(); ?></a>
            </li>
        </ol>
    </nav>
</header>
<section class="catalogue">
    
<a href="/demandez-votre-catalogue-gratuit/">
    
<hgroup>
<h1>Demandez votre catalogue gratuit ici</h1>
<h2>+ de 164 pages avec plus de  100 modèles, leur prix et leurs plans !</h2>
</hgroup>

<button class="bg-alert">
    catalogue gratuit ici
</button>
</a>
</section>

<section class="models">
    <ul class="models-list">
        <article>
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_theme_file_uri('/assets/images/placeholder.png'); ?>" alt="<?php the_title_attribute(); ?>">
            <p itemprop="price" content="<?php echo esc_attr(carbon_get_the_post_meta('price')); ?>">
                <?php echo esc_html(carbon_get_the_post_meta('price')); ?> €
            </p>
            <footer>
                <dl>
                    <dt>Chambres</dt>
                    <dd aria-label="chambres"><?php echo esc_html(carbon_get_the_post_meta('rooms')); ?></dd>
                    <dt>Salles de bain</dt>
                    <dd aria-label="salles de bain"><?php echo esc_html(carbon_get_the_post_meta('bathrooms')); ?></dd>
                </dl>
                <p>
                    <strong><?php the_title(); ?></strong>
                </p>
            </footer>
        </article>
    </ul>
</section>
<?php
get_footer();

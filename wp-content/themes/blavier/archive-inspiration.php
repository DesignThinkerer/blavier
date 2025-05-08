<?php

/**
 * Archive template pour l'affichage des inspirations.
 *
 */

function blavier_render_taxonomy_options($taxonomy, $selected = '') {
    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => true,
    ]);

    if (is_wp_error($terms) || empty($terms)) return;

    foreach ($terms as $term) {
        printf(
            '<option value="%s"%s>%s</option>',
            esc_attr($term->slug),
            selected($selected, $term->slug, false),
            esc_html($term->name)
        );
    }
}

global $wp_query;

$query_vars = $wp_query->query_vars;

if (($_GET['type_maison'] ?? false)) {
    $query_vars['tax_query'][] = [
        [
            'taxonomy' => 'type_maison',
            'field'    => 'slug',
            'terms'    => $_GET['type_maison'],
        ]
    ];
}

if ($_GET['prix_range'] ?? false) {
    $query_vars['meta_query'] = [
        'relation' => 'OR',
    ];
    $range = explode('-', ($_GET['prix_range'] ?? "-" ));
    if ($range[1] === 'inf' && is_numeric($range[0])) {
        $query_vars['meta_query'][] = [
            'key'     => 'price',
            'value'   => $range[0],
            'compare' => '>',
            'type'    => 'NUMERIC',
        ];
    }
    if (is_numeric($range[1]) && is_numeric($range[0])) {
        $query_vars['meta_query'][] = [
            'key'     => 'price',
            'value'   => $range,
            'compare' => 'BETWEEN',
            'type'    => 'NUMERIC',
        ];
    }
}

if ($_GET['rooms'] ?? false) {
    $query_vars['meta_query'][] = [
        'key'     => 'rooms',
        'value'   => intval($_GET['rooms']),
        'compare' => '=',
        'type'    => 'NUMERIC',
    ];
}

if ($_GET['bathrooms'] ?? false) {
    $query_vars['meta_query'][] = [
        'key'     => 'bathrooms',
        'value'   => intval($_GET['bathrooms']),
        'compare' => '=',
        'type'    => 'NUMERIC',
    ];
}

$wp_query = new WP_Query($query_vars);

$catalogue_title = "Nos modèles <em>d'inspiration</em>";

get_header();
?>

<header class="title-header">
    <h1><?php echo $catalogue_title; ?></h1>
    <nav class="breadcrumbs">
        <a href="/">Home</a><span class="current-page">Inspiration</span>
    </nav>
</header>

<section class="catalogue">
    <!-- TODO -->
    Demandez votre catalogue gratuit ici
</section>

<section class="models">
    <?php 
    
    // get_template_part('template-parts/form', 'search'); 
    
    ?>

<form method="GET">
        <label>
            <select name="type_maison">
                <option value=""><?php esc_html_e('Tous les types', 'textdomain'); ?></option>
                <?php
                    blavier_render_taxonomy_options('type_maison', esc_attr($_GET['type_maison'] ?? ''));
                ?>
            </select>
        </label>
        <label>
            <input type="number" name="rooms" min="1" placeholder="Chambres" value="<?php echo esc_attr($_GET['rooms'] ?? ''); ?>">
        </label>
        <label>
            <input type="number" name="bathrooms" min="1" placeholder="Salles de bain" value="<?php echo esc_attr($_GET['bathrooms'] ?? ''); ?>">
        </label>
        <label>
            <select name="prix_range">
                <option value=""><?php esc_html_e('Tous les prix', 'textdomain'); ?></option>   
                <option value="0-150000" <?php selected(esc_attr($_GET['prix_range']) ?? false, '1150000'); ?>>Moins de 150 000 €</option>
                <option value="150000-250000" <?php selected(esc_attr($_GET['prix_range']) ?? false, '250000'); ?>>150 000 € – 250 000 €</option>
                <option value="250000-350000" <?php selected(esc_attr($_GET['prix_range']) ?? false, '350000'); ?>>250 000 € – 350 000 €</option>
                <option value="350000-inf" <?php selected(esc_attr($_GET['prix_range']) ?? false, '350000'); ?>>Plus de 350 000 €</option>
            </select>
        </label>
        <button type="submit"><?php esc_html_e('Filtrer', 'textdomain'); ?></button>
    </form>

    <ul class="models-list">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
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
                </a>
            </li>
        <?php endwhile; else: ?>
            <li><?php esc_html_e('Aucune inspiration trouvée.', 'textdomain'); ?></li>
        <?php endif; ?>
    </ul>
</section>
<?php
get_footer();
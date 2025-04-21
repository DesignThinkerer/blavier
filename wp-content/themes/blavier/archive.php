<?php

/**
 * Archive template pour l'affichage des projets.
 *
 * @package Blavier
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

if(($_GET['type_bien'] ?? false) || ($_GET['region'] ?? false)){
    $query_vars['tax_query'] = [];
}

if ($_GET['type_bien'] ?? false) {
    $query_vars['tax_query'][] = [
        [
            'taxonomy' => 'type_bien',
            'field'    => 'slug',
            'terms'    => $_GET['type_bien'],
        ]
    ];
}

if ($_GET['region'] ?? false) {
    $query_vars['tax_query'][] = [
        [
            'taxonomy' => 'region',
            'field'    => 'slug',
            'terms'    => $_GET['region'],
        ]
    ];
}

if ($_GET['prix_range'] ?? false) {
    $query_vars['meta_query'] = [
        'relation' => 'OR',
    ];

    $range = explode('-', ($_GET['prix_range'] ?? "-" ));

    if($range[1] === 'inf' && is_numeric($range[0])) {
        $query_vars['meta_query'][] = [
            'key'     => 'price',
            'value'   => $range[0],
            'compare' => '>',
            'type'    => 'NUMERIC',
        ];
    }

    
    if(is_numeric($range[1]) && is_numeric($range[0])) {
        $query_vars['meta_query'][] = [
            'key'     => 'price',
            'value'   => $range,
            'compare' => 'BETWEEN',
            'type'    => 'NUMERIC',
        ];
    }
}


$wp_query = new WP_Query($query_vars);

get_header();

?>
<main id="main-content" role="main">
    <form method="GET" class="project-filters">
        <label>
            <select name="type_bien">
                <option value=""><?php esc_html_e('Tous les types', 'textdomain'); ?></option>
                <?php
                    blavier_render_taxonomy_options('type_bien', esc_attr($_GET['type_bien'] ?? ''));
                ?>
            </select>
        </label>


        <label>
            <select name="region">
                <option value=""><?php esc_html_e('Toutes les régions', 'textdomain'); ?></option>
                <?php
                    blavier_render_taxonomy_options('region', esc_attr($_GET['region'] ?? ''));
                ?>
            </select>
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



    <?php if (have_posts()) : ?>
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Projets', 'textdomain'); ?></h1>
        </header>

        <section class="project-cards">
            <?php
            while (have_posts()) : the_post();
                global $post;

                // Identifiants et méta
                $post_id = $post->ID;
                $title   = $post->post_title;
                $content = $post->post_content;
                $link    = get_permalink($post_id);
                $image   = get_the_post_thumbnail_url($post_id, 'large') ?: get_theme_file_uri('/assets/images/placeholder.png');
                $prix    = carbon_get_the_post_meta('price');

                // Taxonomies formatées (1 requête chacune si pas déjà en cache)
                $types   = get_the_term_list($post_id, 'type_bien', 'Type : ', ', ');
                $regions = get_the_term_list($post_id, 'region', 'Région : ', ', ');

                // Appel du template
                get_template_part(
                    'template-parts/card-project',
                    null,
                    [
                        'title'   => $title,
                        'content' => $content,
                        'image'   => $image,
                        'link'    => $link,
                        'types'   => $types,
                        'regions' => $regions,
                        'prix'    => $prix,
                    ]
                );
            endwhile; ?>
        </section>
    <?php else : ?>
        <p><?php esc_html_e('Pas d\'articles.', 'textdomain'); ?></p>
    <?php endif; ?>
</main>

<?php 

get_footer();

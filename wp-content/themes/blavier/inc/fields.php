<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', function () {
    // Options du thème
    Container::make('theme_options', 'Option du thème')
        ->add_fields([
            Field::make('text', 'tagline', 'Tagline du site'),
            // Repeater pour les membres de l'équipe
            Field::make('complex', 'team_members', 'Membres de l\'équipe')
                ->add_fields([
                    Field::make('text', 'name', 'Nom'),
                    Field::make('text', 'position', 'Poste'),
                    Field::make('image', 'photo', 'Photo'),
                    Field::make('rich_text', 'bio', 'Biographie'),
                ])
        ]);

    // Champs FAQ pour la page FAQ (qui est une page, pas un article)
    Container::make('post_meta', 'FAQ Fields')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-faq.php')
        ->add_fields([
            Field::make('complex', 'faq_items', 'FAQ Items')
                ->add_fields([
                    Field::make('text', 'question', 'Question'),
                    Field::make('textarea', 'answer', 'Answer'),
                ])
        ]);

    // Groupe de champs pour les projets à vendre
    Container::make('post_meta', 'Informations supplémentaires pour projet')
        ->where('post_type', '=', 'project')
        ->add_fields([
            Field::make('text', 'town', 'Ville'),
            Field::make('text', 'rooms', 'Nombre de chambres')
                ->set_attribute('type', 'number'),
            Field::make('text', 'bathrooms', 'Nombre de salles de bain')
                ->set_attribute('type', 'number'),
            Field::make('text', 'price', 'Prix (€)')
                ->set_attribute('type', 'number'),
            Field::make('select', 'property_type', 'Type de bien')
                ->add_options(function () {
                    $terms = get_terms([
                        'taxonomy'   => 'type_bien',
                        'hide_empty' => false,
                    ]);
                    $type_options = [];
                    if (!is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            $type_options[$term->slug] = $term->name;
                        }
                    }
                    return $type_options;
                })
                ->set_required(true),
                Field::make('select', 'property_region', 'Région')
                ->add_options(function () {
                    $terms = get_terms([
                        'taxonomy'   => 'region',
                        'hide_empty' => false,
                    ]);
                    $region_options = [];
                    if (!is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            $region_options[$term->slug] = $term->name;
                        }
                    }
                    return $region_options;
                })
                ->set_required(true)
        ]);
});

add_action('after_setup_theme', 'crb_load');
function crb_load() {
    require_once(ABSPATH . 'vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

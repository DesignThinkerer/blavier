<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', function () {
    // Champs pour la page d'accueil
    Container::make('post_meta', 'Sections de la page d\'accueil')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'page-home.php')
    ->add_fields([
        Field::make('complex', 'home_sections', 'Sections de la page d\'accueil')
            ->set_layout('tabbed-vertical')
            ->add_fields('hero', [
                Field::make('text', 'title', 'Titre'),
                Field::make('rich_text', 'content', 'Contenu'),
                Field::make('image', 'background', 'Image de fond'),
            ])
            ->add_fields('features', [
                Field::make('text', 'section_title', 'Titre de la section'),
                Field::make('complex', 'features_list', 'Liste des fonctionnalités')
                    ->add_fields([
                        Field::make('text', 'feature_title', 'Titre'),
                        Field::make('textarea', 'feature_desc', 'Description'),
                    ]),
            ])
            ->add_fields('testimonials', [
                Field::make('text', 'section_title', 'Titre de la section'),
                Field::make('complex', 'testimonials_list', 'Témoignages')
                    ->add_fields([
                        Field::make('text', 'author', 'Auteur'),
                        Field::make('textarea', 'content', 'Contenu'),
                    ]),
            ])
    ]);


    // Champs FAQ pour la page FAQ
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


     // Groupe de champs pour les modèles d'inspiration
    Container::make('post_meta', 'Informations supplémentaires pour inspiration')
    ->where('post_type', '=', 'inspiration')
    ->add_fields([
        Field::make('text', 'price', 'Prix (€)')
        ->set_attribute('type', 'number'),

        Field::make('text', 'rooms', 'Nombre de chambres')
        ->set_attribute('type', 'number'),

        Field::make('text', 'bathrooms', 'Nombre de salles de bain')
        ->set_attribute('type', 'number'),
    ]);
});

add_action('after_setup_theme', 'crb_load');
function crb_load() {
    require_once(ABSPATH . 'vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

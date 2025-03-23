<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', function () {
    Container::make('theme_options', 'Option du thème')
        ->add_fields([
            Field::make('text', 'tagline', 'Tagline du site'),
            // Repeater
            Field::make('complex', 'team_members', 'Membres de l\'équipe')
                ->add_fields([
                    Field::make('text', 'name', 'Nom'),
                    Field::make('text', 'position', 'Poste'),
                    Field::make('image', 'photo', 'Photo'),
                    Field::make('rich_text', 'bio', 'Biographie'),
                ])

        ]);
});

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once(ABSPATH . 'vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

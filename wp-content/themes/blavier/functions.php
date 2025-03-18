<?php

function action_wp_enqueue_files(): void
{
    // Open props
    wp_enqueue_style('open-props', '//unpkg.com/open-props');

    // Beercss
    wp_enqueue_style('beercss', '//cdn.jsdelivr.net/npm/beercss@3.9.7/dist/cdn/beer.min.css');
    wp_enqueue_script_module('beercss-script', '//cdn.jsdelivr.net/npm/beercss@3.9.7/dist/cdn/beer.min.js', [], '3.9.7', true);
    wp_enqueue_script_module('material-dynamic-colors', '//cdn.jsdelivr.net/npm/material-dynamic-colors@1.1.2/dist/cdn/material-dynamic-colors.min.js', [], '1.1.2', true);

    // Typography
    wp_enqueue_style('open-props', get_theme_file_uri('/styles/typetura.css'));

    // Base
    wp_enqueue_style('blavier_base_styles', get_stylesheet_uri());

    // Main
    wp_enqueue_style('blavier_main_styles', get_theme_file_uri('/styles/main.css'));
}

add_action('wp_enqueue_scripts', 'action_wp_enqueue_files');


function action_wp_features(): void
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme','action_wp_features');
<?php

add_action('wp_enqueue_scripts', 'action_wp_enqueue_files' );

/**
 * Fires when scripts and styles are enqueued.
 *
 */
function action_wp_enqueue_files() : void {
    wp_enqueue_style('blavier_main_styles',get_stylesheet_uri());
}
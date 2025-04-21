<?php 
namespace Blavier;

function theme_support(): void
{
    add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
}

function theme_register_assets(): void
{
	// Register files
	wp_register_style('theme_main_styles', get_theme_file_uri('/styles/main.css'), [], '1.0.0', 'all');
	wp_register_style('theme_faq_styles', get_theme_file_uri('/styles/faq.css'), [], '1.0.0', 'all');

	// Enqueue conditionally
	wp_enqueue_style('theme_main_styles');
	if (is_page('faq')) wp_enqueue_style('theme_faq_styles');
}

function theme_title_separator(): string{
	return '|';
}

function theme_setup(){
    register_nav_menus(
        array(
            'top-header' => 'Menu sur-entête',
            'main-header' => 'Menu principal',
            'footer-one' => 'Menu footer 1',
            'footer-two' => 'Menu footer 2',
        )
    );
}

/**
 * Register a custom post type called "project".
 *
 * @see get_post_type_labels() for label keys.
 */
function project_init() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Project', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Projects', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Project', 'textdomain' ),
		'new_item'              => __( 'New Project', 'textdomain' ),
		'edit_item'             => __( 'Edit Project', 'textdomain' ),
		'view_item'             => __( 'View Project', 'textdomain' ),
		'all_items'             => __( 'All Projects', 'textdomain' ),
		'search_items'          => __( 'Search Projects', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Projects:', 'textdomain' ),
		'not_found'             => __( 'No Projects found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No Projects found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projet' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies' => ['type_bien'],
	);

	register_post_type( 'project', $args );
}


function register_project_taxonomies() {
    $taxonomies = [
        'type_bien' => [
            'post_type' => 'project',
            'args' => [
                'labels' => [
                    'name'              => 'Types de biens',
                    'singular_name'     => 'Type de bien',
                    'search_items'      => 'Rechercher un type',
                    'all_items'         => 'Tous les types',
                    'edit_item'         => 'Modifier le type',
                    'update_item'       => 'Mettre à jour',
                    'add_new_item'      => 'Ajouter un nouveau type',
                    'new_item_name'     => 'Nom du nouveau type',
                    'menu_name'         => 'Type de bien',
                ],
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => ['slug' => 'type-bien'],
                'show_in_rest' => true,
                'meta_box_cb' => false,
            ],
        ],
        'region' => [
            'post_type' => 'project',
            'args' => [
                'labels' => [
                    'name'              => 'Régions',
                    'singular_name'     => 'Région',
                    'search_items'      => 'Rechercher une région',
                    'all_items'         => 'Toutes les régions',
                    'edit_item'         => 'Modifier la région',
                    'update_item'       => 'Mettre à jour',
                    'add_new_item'      => 'Ajouter une nouvelle région',
                    'new_item_name'     => 'Nom de la région',
                    'menu_name'         => 'Région',
                ],
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => ['slug' => 'region'],
                'show_in_rest' => true,
                'meta_box_cb' => false,
            ],
        ],
    ];

    foreach ($taxonomies as $taxonomy => $data) {
        register_taxonomy($taxonomy, $data['post_type'], $data['args']);
    }
}

add_action('init', 'Blavier\register_project_taxonomies');

add_action( 'init', 'Blavier\project_init' );


add_action('after_setup_theme','Blavier\theme_support');   
add_action('wp_enqueue_scripts', 'Blavier\theme_register_assets');
add_action( 'after_setup_theme', 'Blavier\theme_setup' );


add_filter('document_title_separator','Blavier\theme_title_separator');
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head() ?>
<link href="https://www.blavier.be/wp-content/uploads/2021/03/favicon.png" rel="shortcut icon">
</head>
<body  <?php body_class(); ?>>
<header>
<?php
    wp_nav_menu(
        [
            'theme_location' => 'top-header',
            'menu_class'     => 'secondary',
            'container'      => 'nav',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        ]
    );
    ?>
<nav class="primary">
        
<a tabindex="1" href="<?php echo site_url() ?>"><img src="<?php echo get_theme_file_uri('/images/logo-blavier.png');?>" alt="<?php echo site_url() ?>"/></a>
<!-- TODO: Fix the mobile nav -->
<?php
        wp_nav_menu(
            [
                'theme_location' => 'main-header',
                'menu_class'     => '',
                'container'      => '',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ]
        );
    ?>
</nav>
</header>
<main>
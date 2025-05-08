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
        
<a tabindex="1" href="/"><img src="<?php echo get_theme_file_uri('/images/logo-blavier.png');?>" alt="<?php echo site_url() ?>"/></a>

<!-- bug sur chrome..
<details>
  <summary>
    <span role="term" aria-details="menu-main-menu" class="visually-hidden">Afficher/Masquer le menu principal</span>
  </summary>
</details> -->

<button  role="toggle" aria-details="menu-main-menu">☰</button>

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
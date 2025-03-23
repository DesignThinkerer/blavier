<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head() ?>
</head>
<body  <?php body_class(); ?>>
<header class="fixed">
    <nav>
        <a href="<?php echo site_url() ?>"><h1>BLAVIER</h1></a>
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
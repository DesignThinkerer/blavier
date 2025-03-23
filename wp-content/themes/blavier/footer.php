</main>
<footer class="fixed">
    <a href="<?php echo site_url() ?>">Accueil</a>

    <h3>A propos de Blavier</h3>
    
    <?php
            wp_nav_menu(
              [
                  'theme_location' => 'footer-one',
                  'menu_class'     => '',
                  'container'      => '',
                  'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              ]
          );
    ?>

    <h3>Infos & contact</h3>
    <?php
            wp_nav_menu(
              [
                  'theme_location' => 'footer-two',
                  'menu_class'     => '',
                  'container'      => '',
                  'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              ]
          );
    ?>

    <?= carbon_get_theme_option('facebook_url') ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>
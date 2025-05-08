</main>
<footer>
    <section>
        <a href="<?php echo site_url() ?>"><img src="<?php echo get_theme_file_uri('/images/logo-blavier-30-jaar.png');?>" alt="<?php echo site_url() ?>"/></a>

        <ul class="socials">
            <li><a href="https://www.facebook.com/blavierBE"></a></li>
            <li><a href="https://www.instagram.com/blavier_BE/"></a></li>
            <li><a href="https://www.linkedin.com/company/maisons-blavier"></a></li>
        </ul>
    </section>
    <section>
    <?php
        wp_nav_menu(
            [
                'theme_location' => 'footer-one',
                'menu_class'     => '',
                'container'      => '',
                'items_wrap'     => '<h3>A propos de Blavier</h3><ul id="%1$s" class="%2$s">%3$s</ul>',
            ]
        );
        
        wp_nav_menu(
            [
                'theme_location' => 'footer-two',
                'menu_class'     => '',
                'container'      => '',
                'items_wrap'     => '<h3>Infos & contact</h3><ul id="%1$s" class="%2$s">%3$s</ul>',
            ]
        );
    ?>
    </section>
    <section>
      <hr>
        <p>© 2023 Maisons Blavier - Tous droits réservés</p>
    </section>
</footer>
<?php wp_footer(); ?>
</body>
</html>
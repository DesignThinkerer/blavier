</main>
<footer>
<section>
<a href="<?php echo site_url() ?>"><img src="<?php echo get_theme_file_uri('/images/logo-blavier-30-jaar.png');?>" alt="<?php echo site_url() ?>"/></a>
<a href="https://www.facebook.com/blavierBE">Facebook</a>
<a href="https://www.instagram.com/blavier_BE/">Instagram</a>
<a href="https://www.linkedin.com/company/maisons-blavier">Linkedin</a>
</section>
<section>
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
</section>
<section>
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
</section>
</footer>
<?php wp_footer(); ?>
</body>
</html>
<?php
get_header();
?>
<section style="text-align:center">
<h1>Erreur 404 – Page non trouvée</h1>
<p>Désolé, la page que vous recherchez n'existe pas ou a été déplacée.</p>

<p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="button">Retour à l’accueil</a>
</p>

<?php get_search_form(); ?>
</section>

<?php
get_footer();
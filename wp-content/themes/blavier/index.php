<?php
// Notre thème implémente un système SPA (Single Page Application) en utilisant l'API Fetch de JavaScript pour charger dynamiquement le contenu des pages sans recharger la page entière, index.php est le point d'entrée de l'application. Seul ce fichier chargera le header et le footer.

get_header();

?>

<section class="hero">
    <h1><?php echo esc_html(get_bloginfo('description')); ?></h1>
    <?php
    get_template_part('template-parts/card', 'article', [
        'title' => 'Ne manquez pas nos prochaines Journées Portes Ouvertes !',
        'content' => '
        <p>
            Nos conseillers en construction vous accueillent à l’occasion de nos journées portes ouvertes ces weekends du <strong>10-11 mai</strong> et du <strong>17-18 mai</strong> à <strong>Rhodes Saint-Genèse</strong>.
        </p>
        <p>
            Venez découvrir une réalisation Maisons Blavier, échangez avec nos conseillers, et avancez dans votre projet de construction.
        </p>
        <p>
            Inscrivez-vous en cliquant sur le bouton ci-dessous.
        </p>
        ',
        'link' => '/inscription-jpo',
        'cta' => 'Nos journées portes ouvertes',
        'cta_meta' => 'cta_text',
    ]);
    ?>
</section>
<section class="gallery">
    <?php
    if (have_posts()) : ?>
        <?php while (have_posts()): the_post(); ?>
            <article>
                <?php if (has_post_thumbnail()) : ?>
                    <figure>
                        <?php the_post_thumbnail('medium', ['alt' => '']); ?>
                        <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
                    </figure>
                <?php endif; ?>
                <h4><?php the_title(); ?></h4>
                <p><?php the_content("En voir plus"); ?></p>
                <a href="<?php the_permalink() ?>">Voir plus</a>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Pas d'articles.</p>
    <?php endif; ?>
</section>
<section class="services">
    <article>
        <h2>Une maison 100% sur mesure</h2>
        <p>Votre maison, vos choix. Chez Maisons Blavier, nous respectons vos besoins et désir pour que votre construction vous ressemble à 100% !</p>
    </article>
    <article>
        <h2>Un prix fixe durant la construction</h2>
        <p>S'assurer de maitriser votre budget fait partie de nos priorités. Le coüt de votre projet est fixe durant toute la construction</p>
    </article>
    <article>
        <h2>Un accompagnement de A à Z</h2>
        <p>Une seule personne de contact pour la réalisation de votre projet de A Z afin de vous assurer un excellent suivi durant tout le projet.</p>
    </article>
    <article>
        <h2>Plus de 30 ans d'expérience</h2>
        <p>Profitez d'une expertise accrue dans la réalisation de maison individuelle grace å une équipe expérimentée.</p>
    </article>
</section>
<section class="models">
    <h2>Inspirez-vous</h2>
    <search>
        <form>
            <label>
                <select name="price">
                    <option value="" disabled selected>Tranche de prix</option>
                    <option value="0-100000">0 - 100.000€</option>
                    <option value="100000-200000">100.000 - 200.000€</option>
                    <option value="200000-300000">200.000 - 300.000€</option>
                    <option value="300000-400000">300.000 - 400.000€</option>
                    <option value="400000-500000">400.000 - 500.000€</option>
                    <option value="500000+">500.000€+</option>
                </select>
            </label>
            <label>
                <select name="rooms">
                    <option value="" disabled selected>Nombre de chambres</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5+</option>
                </select>
            </label>
            <label>
                <select name="bathrooms">
                    <option value="" disabled selected>Nombre de sdb</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5+</option>
                </select>
            </label>
            <label>
                <select name="type">
                    <option value="" disabled selected>Type de maison</option>
                    <option value="2-3">2 et 3 façades</option>
                    <option value="4">4 façades</option>
                </select>
            </label>
            <fieldset>
                <input type="search" id="q" name="q" placeholder="Chercher un modèle">
                <button type="submit">OK</button>
            </fieldset>
        </form>
    </search>
    <ul class="models-list">
        <?php 
        foreach(
            [
                [
                    "src" => "https://www.blavier.be/wp-content/uploads/2024/07/BL576_facad.jpg",
                    "price" => "217.475 € HTVA",
                    "rooms" => 3,
                    "bathrooms" => 1,
                    "alt" => "maison BL571"
                ],
                [
                    "src" => "https://www.blavier.be/wp-content/uploads/2024/01/BL520B-front.jpg",
                    "price" => "217.475 € HTVA",
                    "rooms" => 3,
                    "bathrooms" => 1,
                    "alt" => "maison BL572"
                ],
                [
                    "src" => "https://www.blavier.be/wp-content/uploads/2023/09/BL631B_front.jpg",
                    "price" => "217.475 € HTVA",
                    "rooms" => 3,
                    "bathrooms" => 1,
                    "alt" => "maison BL573"
                ],
                [
                    "src" => "https://www.blavier.be/wp-content/uploads/2023/08/BL630_front.jpg",
                    "price" => "217.475 € HTVA",
                    "rooms" => 3,
                    "bathrooms" => 1,
                    "alt" => "maison BL574"
                ],
                [
                    "src" => "https://www.blavier.be/wp-content/uploads/2023/08/BL629_back.jpg",
                    "price" => "217.475 € HTVA",
                    "rooms" => 3,
                    "bathrooms" => 1,
                    "alt" => "maison BL575"
                ]
            ]
            as $model
            ) : ?>
            <li>
                <a href="inspiration/<?php echo trim($model['alt'],'maison ')?>">
                <article>
                    <img src="<?php echo $model['src']; ?>" alt="<?php echo $model['alt']; ?>">
                    <p><?php echo $model['price']; ?></p>
                    <footer>
                    <p><span><?php echo $model['rooms']; ?> 🛏️</span><span><?php echo $model['bathrooms']; ?> 🛁</span></p>
                    <p><?php echo trim($model['alt'],'maison ')?></p>
                    </footer>
                </article>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="" class="cta-button">Voir nos modèles d'inspiration</a>

    <figure><img src="https://www.blavier.be/wp-content/uploads/2025/02/carte-temoin_dec_2021.png" style="object-fit: contain;width:100%;" alt="Carte de la Belgique avec les agences Maisons Blavier"><figcaption><h4>Visitez une de nos 8 maisons témoins</h4><p>Visiter une maison témoin Maisons Blavier, c’est l’occasion parfaite pour découvrir la qualité de nos constructions, vous projeter dans votre futur chez-vous. Profitez de cette visite pour évaluer nos matériaux, comparer les styles et obtenir des conseils personnalisés pour concrétiser votre projet en toute confiance.</p><a href="" class="cta-button">Voir les maisons</a></figcaption></figure>
</section>

<section class="about">
  <header>
    <h2>
      Blavier, votre partenaire pour la construction<br>
      de votre maison sur mesure
    </h2>
    <hr>
  </header>

  <p>
    Vous envisagez de faire bâtir? Chez Maisons Blavier, vous avez frappé à la bonne porte ! Active partout en Belgique, notre entreprise de <strong>construction clé sur porte</strong> se targue de plus de vingt ans d’expérience. Nous prônons la qualité supérieure, des prix raisonnables, de la transparence et un excellent service clientèle. <strong>Nous réalisons exclusivement des projets de construction clé sur porte, sur mesure et adaptés à votre budget et vos préférences</strong>.
  </p>

  <p>
    Qu’il s’agisse de maisons de rangée, trois ou quatre façades, tout est possible ! Nous vous accompagnons de A à Z dans le processus jusqu’à ce que la maison de vos rêves soit fin prête. Vous n’avez pas d’idée précise pour votre futur nid douillet ? N’hésitez pas à jeter un œil à nos maisons d’inspiration et découvrez le style qui vous plaît le plus. Classique, champêtre, moderne, contemporain, vous n’avez que l’embarras du choix ! Sachez enfin que nous restons à votre disposition pour toutes vos questions à propos du terrain, du prêt hypothécaire ou des obligations légales. Nous vous apportons de précieux conseils et notre professionnalisme. Chez Maisons Blavier, votre projet se déroule sans le moindre souci !
  </p>

  <h3>Profitez de notre expertise</h3>
  <p>
    Notre entreprise de construction clé sur porte Maisons Blavier existe depuis plus de 30 ans et a réalisé plus de 6 500 réalisations de maisons clé sur porte. Notre équipe de conseillers en construction vous accompagne dans le développement de votre projet entièrement personnalisé. Que ce soit depuis un modèle d’inspiration ou en partant d’une feuille blanche, Maisons Blavier réalise votre construction de maison sur mesure. N’hésitez pas à <a href="#">demander un catalogue gratuitement ici</a>.
  </p>

  <h3>Des garanties solides</h3>
  <p>
    Maisons Blavier est une entreprise de construction de maisons clé sur porte reconnue comme l’une des meilleures en Belgique. L’expertise de notre équipe, combinée aux garanties légales telles que la loi Breyne ou le fait d’être membre de <a href="#">La Charte des constructeurs d’Habitations Individuelles</a>, sont quelques-uns des éléments qui vous offrent la garantie que votre projet de construction est entre de bonnes mains.
  </p>

  <h3>Faites le plein d’inspiration pour votre projet de construction</h3>
  <p>
    Chez Maisons Blavier, nous ne construisons pas de maison préfabriquée ou à partir d’un modèle de maison tout fait. Notre entreprise de construction ne réalise que des maisons entièrement sur mesure afin que chacun puisse réaliser la maison de ses rêves. Cela n’empêche pas de vous proposer des <a href="#">modèles d’inspiration</a> vous permettant de commencer votre réflexion pour la construction de votre maison. Libre à vous de modifier le modèle de maison tel que vous le souhaitez. Il est aussi possible de visiter l’une de nos <a href="#">9 maisons témoins</a> réparties partout en Belgique. Enfin, nous organisons régulièrement des journées portes ouvertes dans nos dernières constructions sur mesure. N’hésitez pas à venir les visiter !
  </p>
</section>

<?php
get_footer();

<?php
get_header();

// TODO: Remplacer par une fonction de récupération de contenu dynamique
$catalogue_title = "Nos réalisations";

$models = [
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
];
?>

<header class="title-header">
    <!-- TODO: transformer en composant -->
    <h1><?= $title_header ?></h1>
    <nav class="breadcrumbs">
        <a href="/">Home</a><span class="current-page">Nos réalisations</span>
    </nav>
</header>

<section class="catalogue">
    Demandez votre catalogue gratuit ici
</section>
<!-- TODO: Créer un template "realisations" qui sera utilisé par les pages enfants de "Nos réalisations" -->
<!-- TODO: Créer une variante de cette gallerie -->
<section class="models">
    <ul class="models-list">
        <?php foreach ($models as $model) : ?>
            <li>
                <a href="inspiration/<?php echo trim($model['alt'], 'maison ') ?>">
                    <article>
                        <img src="<?php echo $model['src']; ?>" alt="<?php echo $model['alt']; ?>">
                        <p itemprop="price" content="<?php echo esc_attr($model['price']); ?>"><?php echo esc_html($model['price']); ?></p>
                        <footer>
                            <dl>
                                <dt>Chambres</dt>
                                <dd aria-label="chambres"><?php echo $model['rooms']; ?></dd>
                                <dt>Salles de bain</dt>
                                <dd aria-label="salles de bain"><?php echo $model['bathrooms']; ?></dd>
                            </dl>
                            <p>
                                <strong><?php echo trim($model['alt'], 'maison '); ?></strong>
                            </p>
                        </footer>
                    </article>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<?php
get_footer();

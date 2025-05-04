<?php
/**
 * Template part pour l'affichage d'une carte projet.
 *
 * @package Blavier
 */
$title   = $args['title']   ?? get_the_title();
$content = $args['content'] ?? get_the_content();
$image   = $args['image']   ?? get_the_post_thumbnail_url(get_the_ID(), 'large');
$link    = $args['link']    ?? get_permalink();
$types   = $args['types']   ?? 'Aucun type';
$regions = $args['regions'] ?? 'Aucune région';
$prix    = $args['prix']    ?? 'Aucun prix';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('project-card'); ?>>
    <?php if ($image) :
        $caption = get_the_post_thumbnail_caption();
    ?>
        <figure class="project-image">
            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
            <?php if ($caption): ?>
                <figcaption><?php echo wp_kses_post($caption); ?></figcaption>
            <?php endif; ?>
        </figure>
    <?php endif; ?>

    <header class="project-header">
        <h2 class="project-title"><?php echo esc_html($title); ?></h2>
    </header>

    <div class="project-meta">
        <?php if ($types): ?>
            <p class="project-type"><?php echo wp_kses_post($types); ?></p>
        <?php endif; ?>

        <?php if ($regions): ?>
            <p class="project-region"><?php echo wp_kses_post($regions); ?></p>
        <?php endif; ?>

        <?php if ($prix): ?>
            <p class="project-price"><?php echo esc_html__('Prix : ', 'textdomain') . esc_html($prix); ?></p>
        <?php endif; ?>
    </div>

    <div class="project-content">
        <?php echo wp_kses_post(wpautop($content)); ?>
    </div>

    <footer class="project-footer">
        <a class="project-link" href="<?php echo esc_url($link); ?>">
            <?php esc_html_e('Voir plus', 'textdomain'); ?>
        </a>
    </footer>
</article>

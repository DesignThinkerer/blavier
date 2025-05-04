<?php
/**
 * Template part pour l'affichage d'une carte projet.
 *
 * @package Blavier
 */

$title   = $args['title']   ?? get_the_title();
$content = $args['content'] ?? get_the_content();
$link    = $args['link']    ?? get_permalink();

$cta_meta = get_post_meta(get_the_ID(), 'cta_text', true);
$cta      = $args['cta'] ?? ($cta_meta ? $cta_meta : __('Voir plus', 'blavier'));
$classes = $args['classes'] ?? '';
?>

<article role="group" aria-labelledby="card-title" <?php post_class('card-article ' . esc_attr($classes)); ?>>
  <h4 id="card-title"><?php echo esc_html($title); ?></h4>
  <p>
    <?php echo $content; ?>
  </p>
  <a href="<?php echo esc_url($link); ?>" class="cta-button">
    <?php echo esc_html($cta); ?>
  </a>
</article>

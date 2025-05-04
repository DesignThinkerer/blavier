<?php
/**
 * Template part pour l'affichage d'une carte highlight.
 *
 * @package Blavier
 */

$src    = $args['src'] ?? '';
$alt    = $args['alt'] ?? '';
$title  = $args['title'] ?? '';
$text   = $args['text'] ?? '';
$link   = $args['link'] ?? '';
?>

<article>
    <?php if ($src && $alt): ?>
        <img src="<?= $src ?>" alt="<?= $alt ?>">
    <?php endif; ?>
    <?php if ($title): ?>
        <h4><?= $title; ?></h4>
    <?php endif; ?>
    <?php if ($text): ?>
        <p><?= $text; ?></p>
    <?php endif; ?>
    <a href="<?= $link; ?>">Voir plus</a>
</article>
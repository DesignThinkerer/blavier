<?php
/**
 * Template part pour l'affichage d'une carte service.
 *
 * @package Blavier
 */
$title   = $args['title']   ?? '';
$content = $args['content'] ?? '';
?>
<article>
    <h2><?= $title ?></h2>
    <p><?= $content ?></p>
</article>
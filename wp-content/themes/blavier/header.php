<?php
$isSingle = get_query_var('isSingle', false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head() ?>
</head>
<body>
<header class="fixed">
  <nav>
    <?php if($isSingle) :?>
        <a href="http://blavier.local/">
        <button class="circle transparent">
        <i>arrow_back</i>
        </button>
        </a>
    <?php endif ?>
    <div class="max"></div>
    <button class="circle transparent">
      <i>search</i>
    </button>
  </nav>
  <?php if($isSingle) :?>
    <div class="medium-space"></div>
    <h5 class="small-padding">Headline medium</h5>
  <?php endif ?>
</header>
<main>
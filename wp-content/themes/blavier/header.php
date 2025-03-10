<?php
$isSingle = get_query_var('isSingle', false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head() ?>
</head>
<body>
<header>
  <nav>
    <?php if($isSingle) :?>
        <button class="circle transparent">
        <i>arrow_back</i>
        </button>
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
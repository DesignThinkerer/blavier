<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head() ?>
</head>
<body>
<header class="fixed">
  <nav>
    <a href="<?php echo site_url() ?>"><h1>BLAVIER</h1></a>
    <div class="max"></div>
    <ul>
      <li><a href="<?php echo site_url('/a-propos') ?>">A propos</a></li>
      <li><a href="<?php echo site_url('/privacy-policy') ?>">Privacy Policy</a></li>
    </ul>
    <button class="circle transparent">
      <i>search</i>
    </button>
  </nav>
</header>
<main>
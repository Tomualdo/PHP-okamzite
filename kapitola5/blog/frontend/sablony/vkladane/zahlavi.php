<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8" />
  <title>Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/blog/spolecne/css/bootstrap.min.css" rel="stylesheet"
    media="screen" />
  <link href="/blog/spolecne/css/blog.css" rel="stylesheet"
    media="screen" />
</head>
<body>
  <section class="container">
    <br />
    <?php require_once('spolecne/sablony/oznamovaci-oblast.php'); ?>

    <p>
      <a href="<?php echo $this->zaklad->url.'admin/'; ?>"
        class="btn btn-info">Přihlásit do administrace</a>
    </p>
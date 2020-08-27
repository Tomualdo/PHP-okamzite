<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8" />
  <title>Blog | Administrace</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/blog/spolecne/css/bootstrap.min.css" rel="stylesheet"
    media="screen" />
  <link href="/blog/spolecne/css/Markdown.css" rel="stylesheet"
    media="screen" />
  <link href="/blog/spolecne/css/blog.css" rel="stylesheet"
    media="screen" />
</head>
<body>
  <section class="container"><br />

  <?php if (!empty($navigace)): ?>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li<?php if ($navigace == 'prispevky'): ?> class="active"
            <?php endif; ?>>
            <a href="<?php echo $this->zaklad->url . 'prispevky.php'; ?>">
              <span class="glyphicon glyphicon-list"></span>
              Příspěvky</a></li>
          <li<?php if ($navigace == 'komentare'): ?> class="active"
            <?php endif; ?>>
            <a href="<?php echo $this->zaklad->url . 'komentare.php'; ?>">
              <span class="glyphicon glyphicon-comment"></span>
              Komentáře</a></li>
          <li>
            <a href="<?php echo $this->zaklad->url .
              'prihlaseni.php?stav=odhlasit'; ?>">
              <span class="glyphicon glyphicon-log-out"></span>
              Odhlásit</a></li>
        </ul>
      </div>
    </nav>
  <?php endif; ?>

  <?php require_once('../spolecne/sablony/oznamovaci-oblast.php'); ?>
<meta charset="UTF-8" />
<h1>Seznam příspěvků blogu</h1>
<?php foreach ($prispevky as $prispevek): ?>
  <h3>Příspěvek #<?php echo htmlspecialchars($prispevek['id']); ?></h3>
  <?php echo $prispevek['obsah']; ?>
  <a href="http://localhost/muj_projekt/prispevek.php?id=<?php
    echo htmlspecialchars($prispevek['id']); ?>">Podrobnosti</a>
  <hr/>
<?php endforeach; ?>

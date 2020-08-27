<meta charset="UTF-8" />
<?php foreach($prispevky as $prispevek): ?>
  <h1>Příspěvek #<?php echo htmlspecialchars($prispevek['id']); ?></h1>
  <hr/>
  <?php echo $prispevek['obsah']; ?>
  <a href="http://localhost/muj_projekt/prispevek.php">
    Zpět na seznam příspěvků</a>
<?php endforeach; ?>

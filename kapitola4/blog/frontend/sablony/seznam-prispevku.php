<?php require_once 'vkladane/zahlavi.php'; ?>
<?php foreach ($prispevky as $prispevek): ?>
  <h3><?php echo (!empty($prispevek['nadpis']) ?
    htmlspecialchars($prispevek['nadpis']) :
    'Příspěvek #' . $prispevek['id']); ?></h3>
  <p><?php echo implode(' ', array_slice(explode(' ',
    strip_tags($prispevek['obsah'])), 0, 10)); ?> [...]</p>
  <a href="<?php echo $this->zaklad->url."?id=".$prispevek['id']; ?>"
    class="btn btn-primary">Podrobnosti</a>
  <p>komentářů: <?php echo $prispevek['komentare']; ?></p>
  <hr/>
<?php endforeach; ?>
<?php require_once 'vkladane/zapati.php'; ?>
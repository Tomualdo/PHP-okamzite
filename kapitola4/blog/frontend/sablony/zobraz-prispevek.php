<?php require_once 'vkladane/zahlavi.php'; ?>
<p>
  <a href="<?php echo $this->zaklad->url; ?>" class="btn btn-primary">
    Zpět na seznam příspěvků</a>
</p>
<h3><?php echo (!empty($prispevek['nadpis']) ?
  htmlspecialchars($prispevek['nadpis']) :
  'Příspěvek #'.$prispevek['id']); ?></h3>
<?php echo $prispevek['obsah']; ?>
<hr/>
<?php require_once 'vkladane/zapati.php'; ?>
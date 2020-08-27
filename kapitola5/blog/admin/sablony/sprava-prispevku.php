<?php
$navigace = 'prispevky';
require_once('vkladane/zahlavi.php');
?>

<a href="<?php echo $this->zaklad->url . 'prispevky.php?akce=pridej'; ?>"
  class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span>
  Přidat příspěvek</a>

<table class="table table-striped">
  <thead>
    <tr>
      <td>Nadpis příspěvku</td>
      <td>Obsah příspěvku</td>
      <td>Akce</td>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($prispevky as $prispevek): ?>
    <tr>
      <td><h3><?php echo (!empty($prispevek['nadpis']) ?
        htmlspecialchars($prispevek['nadpis']) :
        'Příspěvek #' . $prispevek['id']); ?>
      </h3></td>
      <td><p><?php echo implode(' ', array_slice(explode(' ',
        strip_tags($prispevek['obsah'])), 0, 10)); ?> [...]</p></td>
      <td>
        <a href="<?php echo $this->zaklad->url . 'prispevky.php?id=' .
          $prispevek['id'] . '&akce=uprav'; ?>" class="btn btn-default">
          Upravit</a>
        <a href="<?php echo $this->zaklad->url . 'prispevky.php?id=' .
          $prispevek['id'] . '&akce=odstran'; ?>" class="btn btn-default">
          Odstranit</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php require_once('vkladane/zapati.php'); ?>
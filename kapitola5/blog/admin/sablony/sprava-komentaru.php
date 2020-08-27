<?php
$navigace = 'komentare';
require_once('vkladane/zahlavi.php');
?>

<table class="table table-striped">
  <thead>
    <tr>
      <td>ID příspěvku</td>
      <td>Komentátor</td>
      <td>E-mail</td>
      <td>Obsah komentáře</td>
      <td>Akce</td>
    </tr>
  </thead>
  <tbody>
  <?php foreach($komentare as $komentar): ?>
    <tr>
      <td><h4><?php echo $komentar['id_prispevku']; ?></h4></td>
      <td><p><?php echo htmlspecialchars($komentar['jmeno']); ?></p></td>
      <td><p><?php echo htmlspecialchars($komentar['email']); ?></p></td>
      <td><p><?php echo htmlspecialchars($komentar['obsah']); ?></p></td>
      <td><a href="<?php echo $this->zaklad->url . "komentare.php?id=" .
        $komentar['id'] . "&akce=odstran"; ?>" class="btn btn-default">
        Odstranit</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php require_once('vkladane/zapati.php'); ?>
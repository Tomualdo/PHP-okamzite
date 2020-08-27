<?php
$navigace = 'prispevky';
require_once('vkladane/zahlavi.php');
?>

<h3>Příspěvek</h3>
<form action="<?php echo $this->zaklad->url . 'prispevky.php?akce=uloz'; ?>"
    method="post" class="form-horizontal" role="form">
  <input type="hidden" name="prispevek[id]"
    value="<?php echo htmlspecialchars($prispevek['id']); ?>" />
  <div class="form-group">
    <div class="col-md-4">
      <label for="nadpis">Nadpis</label>
      <input type="text" name="prispevek[nadpis]" id="nadpis"
        value="<?php echo htmlspecialchars($prispevek['nadpis']); ?>"
        class="form-control" placeholder="Nadpis příspěvku" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4">
      <label for="obsah">Obsah</label>
      <textarea class="form-control" name="prispevek[obsah]"
        id="obsah"><?php echo $prispevek['obsah']; ?></textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-default">Uložit příspěvek</button>
</form>

<?php require_once('vkladane/zapati.php'); ?>
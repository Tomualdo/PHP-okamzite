<?php require_once('vkladane/zahlavi.php'); ?>
<h3>Přihlášení do administrace</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>"
    method="post" class="form-horizontal" role="form">
  <div class="form-group">
    <div class="col-md-4">
      <label for="jmeno">
        Uživatelské jméno</label>
      <input type="text" class="form-control" name="jmeno" id="jmeno"
        placeholder="Uživatelské jméno" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4">
      <label for="heslo">Heslo</label>
      <input type="password" class="form-control" name="heslo" id="heslo"
        placeholder="Heslo">
    </div>
  </div>
  <button type="submit" class="btn btn-default">Přihlásit</button>
</form>
<?php require_once('vkladane/zapati.php'); ?>
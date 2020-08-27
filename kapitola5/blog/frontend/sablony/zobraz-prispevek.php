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

<h3>Komentáře</h3>
<?php foreach ($komentarePrispevku as $komentar): ?>
  <section class="col-sm-3">
    <figure>
      <img src="http://www.gravatar.com/avatar/<?php
        echo md5($komentar['email']); ?>" alt="">
    </figure>
    <h4><?php echo htmlspecialchars($komentar['jmeno']); ?></h4>
    <p><small><?php echo htmlspecialchars($komentar['email']); ?></small></p>
  </section>
  <section class="col-sm-8">
    <p><?php echo htmlspecialchars($komentar['obsah']); ?></p>
  </section>
  <hr style="clear: both;" />
<?php endforeach; ?>
<br/>

<h3>Vložte komentář</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
    class="form-horizontal" role="form">
  <input type="hidden" value="<?php echo $prispevek['id']; ?>"
    name="komentar[idPrispevku]" />
  <div class="form-group">
    <div class="col-md-4">
      <label for="email">E-mail</label>
    	<input type="email" name="komentar[email]" id="email"
         class="form-control" placeholder="Váš e-mail" required />
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4">
      <label for="jmeno">Celé jméno</label>
      <input type="text" name="komentar[celeJmeno]" id="jmeno"
        class="form-control" placeholder="Vaše celé jméno" required />
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4">
      <label for="obsah">Komentář</label>
    	<textarea name="komentar[obsah]" id="obsah"
        class="form-control" required></textarea>
    </div>
  </div>
  <button type="submit" class="btn">Vložit komentář</button>
</form>

<?php require_once 'vkladane/zapati.php'; ?>
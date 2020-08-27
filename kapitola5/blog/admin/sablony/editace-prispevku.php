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
  <div class="row">
    <div class="col-md-7">
      <div class="form-group">
        <div class="col-md-4">
          <label for="wmd-input">Obsah</label>
          <div class="wmd-panel">
            <div id="wmd-button-bar"></div>
            <textarea class="wmd-input form-control" name="prispevek[obsah]"
              id="wmd-input"><?php echo $prispevek['obsah']; ?></textarea>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-default">Uložit příspěvek</button>
    </div>

    <div class="col-md-5"
        style="padding-left: 20px; border-left: 1px solid #eee;">
      <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
    </div>
  </div>
</form>

<script src="/blog/spolecne/js/Markdown.Converter.js"></script>
<script src="/blog/spolecne/js/Markdown.Editor.js"></script>
<script src="/blog/spolecne/js/Markdown.local.cs.js"></script>
<script src="/blog/spolecne/js/inicializuj-editor.js"></script>
<?php require_once('vkladane/zapati.php'); ?>
<?php
$db = new PDO("mysql:host=localhost;dbname=blog", "UZIVATEL", "HESLO");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
  $dotazText = "SELECT * FROM uzivatele";
  $dotaz = $db->prepare($dotazText);
  $dotaz->execute();
  while ($radek = $dotaz->fetch()) {
    echo $radek['id'] . ' - ' . $radek['jmeno'] . ' - ' . $radek['email'] .
      ' - ' . $radek['heslo'];
    echo '<br />';
  }
  $dotaz->closeCursor();
} catch (PDOException $e) {
  echo $e->getMessage();
}
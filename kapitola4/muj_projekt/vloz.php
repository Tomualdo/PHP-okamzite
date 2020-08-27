<?php
$db = new PDO("mysql:host=localhost;dbname=blog", "UZIVATEL", "HESLO");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dotazText = "INSERT INTO uzivatele(jmeno, heslo, email)
                VALUES ('admin', MD5('admin'), 'vasemail@domena.cz')";
try {
  $db->query($dotazText);
} catch (PDOException $e) {
  echo $e->getMessage();
}
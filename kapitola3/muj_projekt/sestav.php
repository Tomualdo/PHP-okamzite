<?php
$db = new PDO("mysql:host=localhost;dbname=blog", "UZIVATEL", "HESLO");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dotazText = "CREATE TABLE uzivatele (
                id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
                jmeno VARCHAR(40),
                heslo VARCHAR(100),
                email VARCHAR(150)
              )";
try {
  $db->query($dotazText);
} catch (PDOException $e) {
  echo $e->getMessage();
}
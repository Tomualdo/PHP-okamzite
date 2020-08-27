<?php
// Platnost vyprší za 30 dní od aktuálního času.
$expirace = time() + 60 * 60 * 24 * 30;
setcookie("osloveni", "Jane Veřejný", $expirace);
if (isset($_COOKIE["osloveni"])) {
  echo "Vítejte " . $_COOKIE["osloveni"] . "!";
} else {
  echo "Vítejte návštěvníku!";
}
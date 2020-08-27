<?php
session_start();
$_SESSION["uzivatelskeJmeno"] = "meuzivatelskejmeno";
echo "Uživatelské jméno = " .
  htmlspecialchars($_SESSION["uzivatelskeJmeno"]);
<?php
require_once('administrace.php');

class Prispevky extends Administrace {
  public function __construct() {
    parent::__construct();
  }

  public function vypisPrispevky() {
  }

  public function pridejPrispevek() {
  }

  public function upravPrispevek() {
  }

  public function ulozPrispevek() {
  }

  public function odstranPrispevek() {
  }
}

$adminPrispevky = new Prispevky();
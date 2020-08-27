<?php
require_once('administrace.php');

class Komentare extends Administrace {
  public function __construct() {
    parent::__construct();
  }

  public function vypisKomentare() {
  }

  public function odstranKomentar() {
  }
}

$adminKomentare = new Komentare();
<?php
require_once('komentare.php');

class Prispevky extends Blog {
  public $komentare;

  public function __construct() {
    parent::__construct();
  }

  public function vypisPrispevky() {
  }

  public function zobrazPrispevek($idPrispevku) {
  }
}
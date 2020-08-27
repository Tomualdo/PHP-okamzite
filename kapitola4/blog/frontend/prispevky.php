<?php
require_once('komentare.php');

class Prispevky extends Blog {
  public $komentare;

  public function __construct() {
    parent::__construct();
    $this->komentare = new Komentare();
    if (!empty($_GET['id'])) {
      $this->zobrazPrispevek($_GET['id']);
    } else {
      $this->vypisPrispevky();
    }
  }

  public function vypisPrispevky() {
    $prispevky = $this->db->vyber('prispevky', array('*'));
    foreach ($prispevky as $klic => $prispevek) {
      $prispevky[$klic]['komentare'] =
        $this->komentare->urciPocetKomentaru($prispevek['id']);
    }
    $sablona = 'seznam-prispevku.php';
    include_once 'frontend/sablony/' . $sablona;
  }

  public function zobrazPrispevek($idPrispevku) {
    $prispevky = $this->db->vyber('prispevky', array('*'),
      array('id' => $idPrispevku));
    $prispevek = $prispevky[0];
    $komentarePrispevku = $this->komentare->nactiKomentare($idPrispevku);
    $sablona = 'zobraz-prispevek.php';
    include_once 'frontend/sablony/' . $sablona;
  }
}
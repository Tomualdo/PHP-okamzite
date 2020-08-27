<?php
require_once('blog.php');

class Komentare extends Blog {
  public function __construct() {
    parent::__construct();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
        !empty($_POST['komentar'])) {
      $this->pridejKomentar();
    }
  }

  public function urciPocetKomentaru($idPrispevku) {
    $komentare = $this->db->vyber('komentare', array('id'),
      array('id_prispevku' => $idPrispevku));
    $pocet = count($komentare);
    return $pocet;
  }

  public function nactiKomentare($idPrispevku) {
    return $this->db->vyber('komentare', array('*'),
      array('id_prispevku' => $idPrispevku));
  }

  public function pridejKomentar() {
    $data = array();

    if (!empty($_POST['komentar'])) {
      $komentar = $_POST['komentar'];
    }

    if (!empty($komentar['celeJmeno'])) {
      $data['jmeno'] = $komentar['celeJmeno'];
    }
    if (!empty($komentar['email'])) {
      $data['email'] = $komentar['email'];
    }
    if (!empty($komentar['obsah'])) {
      $data['obsah'] = $komentar['obsah'];
    }
    if (!empty($komentar['idPrispevku'])) {
      $data['id_prispevku'] = $komentar['idPrispevku'];
    }

    $pridano = $this->db->vloz('komentare', $data);
    if ($pridano > 0) {
      $oznameni = 'Váš komentář byl úspěšně uložen.';
      header('Location: ' . $this->zaklad->url . '?id=' .
        $komentar['idPrispevku'] . '&oznameni=' . urlencode($oznameni));
      exit();
    } else {
      $chyba = 'Při ukládání komentáře došlo k chybě. ' .
        'Zkuste to prosím později.';
      header('Location: ' . $this->zaklad->url . '?id=' .
        $komentar['idPrispevku'] . '&chyba=' . urlencode($chyba));
      exit();
    }
  }
}
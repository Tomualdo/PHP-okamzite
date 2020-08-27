<?php
require_once('administrace.php');

class Komentare extends Administrace {
  public function __construct() {
    parent::__construct();
    if (!empty($_GET['akce']) && $_GET['akce'] == 'odstran') {
      $this->odstranKomentar();
    } else {
      $this->vypisKomentare();
    }
  }

  public function vypisKomentare() {
    $komentare = $this->db->vyber('komentare', array('*'));
    require_once('sablony/sprava-komentaru.php');
  }

  public function odstranKomentar() {
    if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
      $odstraneno = $this->db->odstran('komentare', array('id' => $_GET['id']));
      if ($odstraneno > 0) {
        $oznameni = 'Komentář byl odstraněn.';
        header('Location: ' . $this->zaklad->db . 'komentare.php?oznameni=' .
          urlencode($oznameni));
        exit();
      } else {
        $chyba = 'Nepodařilo se odstranit komentář. Zkuste to prosím později.';
        header('Location: ' . $this->zaklad->db . 'komentare.php?chyba=' .
          urlencode($chyba));
        exit();
      }
    }
  }
}

$adminKomentare = new Komentare();
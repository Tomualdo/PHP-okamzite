<?php
require_once('administrace.php');

class Prispevky extends Administrace {
  public function __construct() {
    parent::__construct();
    if (!empty($_GET['akce'])) {
      switch ($_GET['akce']) {
        case 'pridej':
          $this->pridejPrispevek();
          break;
        case 'uloz':
          $this->ulozPrispevek();
          break;
        default:
          $this->vypisPrispevky();
          break;
      }
    } else {
      $this->vypisPrispevky();
    }
  }

  public function vypisPrispevky() {
    $prispevky = $this->db->vyber('prispevky', array('*'));
    require_once 'sablony/sprava-prispevku.php';
  }

  public function pridejPrispevek() {
    $prispevek = array(
      'id' => 0,
      'nadpis' => '',
      'obsah' => ''
    );
    require_once 'sablony/editace-prispevku.php';
  }

  public function upravPrispevek() {
  }

  public function ulozPrispevek() {
    $data = array();
    $podminka = array();

    if (!empty($_POST['prispevek'])) {
      $prispevek = $_POST['prispevek'];
    }

    if (!empty($prispevek['id'])) {
      $podminka['id'] = $prispevek['id'];
    }
    if (!empty($prispevek['nadpis'])) {
      $data['nadpis'] = $prispevek['nadpis'];
    }
    if (!empty($prispevek['obsah'])) {
      $data['obsah'] = $prispevek['obsah'];
    }

    if (empty($podminka)) {
      $ulozeno = $this->db->vloz('prispevky', $data);
    } else {
      $ulozeno = $this->db->aktualizuj('prispevky', $data, $podminka);
    }

    if ($ulozeno !== false) {
      $oznameni = 'Příspěvek byl úspěšně uložen.';
      header('Location: ' . $this->zaklad->db . 'prispevky.php?oznameni=' .
        urlencode($oznameni));
      exit();
    } else {
      $chyba = 'Nepodařilo se odstranit příspěvek. ' +
        'Zkuste to prosím později.';
      require_once 'sablony/editace-prispevku.php';
    }
  }

  public function odstranPrispevek() {
  }
}

$adminPrispevky = new Prispevky();